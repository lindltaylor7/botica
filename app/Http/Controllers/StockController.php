<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Article;
use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Price;
use App\Models\Stock;
use Illuminate\Http\Request;



class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        $articles = Article::all();
        // $stocks = Stock::all();
        $cantidad = Stock::all();
        $precio = Price::all();
        // return $cantidad;
        return view('admin.stocks.index', compact('medicines', 'articles', 'cantidad', 'precio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicamentos=Medicine::all();
        $articles = Article::all();
        
        return view('admin.stocks.create', compact('medicamentos', 'articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stockId' => 'required',
            'shelf' => 'required',
            'cost_stock' => 'required'
        ]);

        if ($request->type == "1")
        {
            $request->type = "App\Models\Article";
        }
        else
        {
            $request->type = "App\Models\Medicine";
        }

        $stock = Stock::create([
            'shelf' => $request->get('shelf'),
            'cost_stock' => $request->get('cost_stock'),
            'stockable_id' => $request->get('stockId'),
            'stockable_type' => $request->type
        ]);

        $batch =  $stock->batches()->create([
            'code' => $request->get('code'),
            'entry_date' => $request->get('entry_date'),
            'expiry_date' => $request->get('expiry_date'),
            'quantity_box' => $request->get('quantity_box'),
            'quantity_unit' => $request->get('quantity_unit'),
            'stock_id' => $stock->id
        ]);
        
        return redirect(route('stock.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $upd_stock = Stock::where('id', $request->get('id_stock'))->update(request()->except(['_token','id_stock']));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function all(Request $request){
        $stocks=Stock::select('stocks.*','medicamentos.n_generico','medicamentos.n_comercial')
                        ->leftJoin('medicamentos', 'medicamentos.id', '=', 'stocks.medicamento_id')
                        ->where('n_generico','like', '%' . $request->get('search') . '%')
                        ->orderBy('medicamentos.n_generico', 'asc')
                        ->get();
        return json_encode($stocks);
    }

    public function delstock(Request $request){
        $stock = Stock::where('id','=',$request->get('id'))->delete();
        return $stock;
    }

    public function infoedit(Request $request){
        $stock = Stock::where('id',$request->get('id'))->get();
        return json_encode($stock);
    }
    
    public function export(){
        $fileName = 'Reporte_stock'.date('d-m-Y').'.xls';
        $arrayDetalle = Array();
        $items = Stock::select('stocks.*','medicamentos.n_generico','medicamentos.n_comercial','medicamentos.lab')
                        ->leftJoin('medicamentos', 'medicamentos.id', '=', 'stocks.medicamento_id')
                        ->orderBy('medicamentos.n_generico', 'asc')
                        ->get();
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        header("Content-type: application/vnd.ms-excel; charset=UTF-16LE");
        header("Content-Disposition: attachment; filename= $fileName");
        header("Expires: 0");
        header("Pragma: no-cache");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private", false);

       echo"<table>
        <tr>
            <th>Nombre Genérico</th>
            <th>Nombre Comercial</th>
            <th>Laboratorio</th>
            <th>Cantidad</th>
            <th>Fecha de Ingreso</th>
            <th>Fecha de Vencimiento</th>
        </tr>";

        foreach ($items as $item){
          echo"<tr>
           <td>" . mb_convert_encoding($item->n_generico, 'UTF-16LE', 'UTF-8') . "</td>
           <td>". mb_convert_encoding($item->n_comercial, 'UTF-16LE', 'UTF-8') ."</td>
           <td>". mb_convert_encoding($item->lab, 'UTF-16LE', 'UTF-8') ."</td>
           <td>$item->cantidad</td>
           <td>$item->f_ingreso</td>
           <td>$item->f_vencimiento</td>
       </tr>";
        }
       echo"</table>";

    }
}
