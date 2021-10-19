<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Article;
use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Price;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');

        $medicine=Medicine::select('medicines.id', 'stocks.stockable_type as type', 'medicines.generic_name','medicines.tradename', DB::raw('SUM(batches.quantity_unit) as cantidad'), 'medicines.laboratory', 'prices.sale_price')
                    ->leftJoin('stocks','stocks.stockable_id','=','medicines.id')
                    ->where('stocks.stockable_type','App\Models\Medicine')
                    ->leftJoin('batches','batches.stock_id','=', 'stocks.id')
                    ->leftJoin('prices','prices.priceable_id','=','medicines.id')
                    ->where('prices.priceable_type','App\Models\Medicine')
                    ->groupBy('stocks.stockable_id')
                    ->buscar($buscar);
                    
        $productos=Article::select('articles.id', 'stocks.stockable_type as type', 'articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(batches.quantity_unit) as cantidad'), 'articles.supplier as laboratory', 'prices.sale_price')
                    ->leftJoin('stocks','stocks.stockable_id','=','articles.id')
                    ->where('stocks.stockable_type','App\Models\Article')
                    ->leftJoin('batches','batches.stock_id','=', 'stocks.id')
                    ->leftJoin('prices','prices.priceable_id','=','articles.id')
                    ->where('prices.priceable_type','App\Models\Article')
                    ->groupBy('stocks.stockable_id')
                    ->buscar($buscar)
                    ->union($medicine)
                    ->paginate(8);

        $ms = Medicine::all();
        $as = Article::all();
        return view('admin.stocks.index', compact('productos', 'ms', 'as'));
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
        $medicine=Medicine::select('medicines.id', 'stocks.stockable_type as type', 'medicines.generic_name','medicines.tradename', DB::raw('SUM(batches.quantity_unit) as cantidad'), 'medicines.laboratory', 'prices.sale_price')
                    ->leftJoin('stocks','stocks.stockable_id','=','medicines.id')
                    ->where('stocks.stockable_type','App\Models\Medicine')
                    ->leftJoin('batches','batches.stock_id','=', 'stocks.id')
                    ->leftJoin('prices','prices.priceable_id','=','medicines.id')
                    ->where('prices.priceable_type','App\Models\Medicine')
                    ->groupBy('stocks.stockable_id');
                    
        $productos=Article::select('articles.id', 'stocks.stockable_type as type', 'articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(batches.quantity_unit) as cantidad'), 'articles.supplier as laboratory', 'prices.sale_price')
                    ->leftJoin('stocks','stocks.stockable_id','=','articles.id')
                    ->where('stocks.stockable_type','App\Models\Article')
                    ->leftJoin('batches','batches.stock_id','=', 'stocks.id')
                    ->leftJoin('prices','prices.priceable_id','=','articles.id')
                    ->where('prices.priceable_type','App\Models\Article')
                    ->groupBy('stocks.stockable_id')
                    ->union($medicine)
                    ->paginate(8);

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
        </tr>";

        foreach ($productos as $producto){
          echo"<tr>
           <td>" . mb_convert_encoding($producto->generic_name, 'UTF-16LE', 'UTF-8') . "</td>
           <td>". mb_convert_encoding($producto->tradename, 'UTF-16LE', 'UTF-8') ."</td>
           <td>". mb_convert_encoding($producto->laboratory, 'UTF-16LE', 'UTF-8') ."</td>
           <td>$producto->cantidad</td>
       </tr>";
        }
       echo"</table>";

    }

    public function buscar(Request $request){
        $buscar = $request->get('search_stock');

        $medicine=Medicine::select('medicines.id', 'stocks.stockable_type as type', 'medicines.generic_name','medicines.tradename', DB::raw('SUM(batches.quantity_unit) as cantidad'), 'medicines.laboratory', 'prices.sale_price')
                    ->leftJoin('stocks','stocks.stockable_id','=','medicines.id')
                    ->where('stocks.stockable_type','App\Models\Medicine')
                    ->leftJoin('batches','batches.stock_id','=', 'stocks.id')
                    ->leftJoin('prices','prices.priceable_id','=','medicines.id')
                    ->where('prices.priceable_type','App\Models\Medicine')
                    ->groupBy('stocks.stockable_id')
                    ->buscar($buscar);
                    
        $productos=Article::select('articles.id', 'stocks.stockable_type as type', 'articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(batches.quantity_unit) as cantidad'), 'articles.supplier as laboratory', 'prices.sale_price')
                    ->leftJoin('stocks','stocks.stockable_id','=','articles.id')
                    ->where('stocks.stockable_type','App\Models\Article')
                    ->leftJoin('batches','batches.stock_id','=', 'stocks.id')
                    ->leftJoin('prices','prices.priceable_id','=','articles.id')
                    ->where('prices.priceable_type','App\Models\Article')
                    ->groupBy('stocks.stockable_id')
                    ->buscar($buscar)
                    ->union($medicine)
                    ->paginate(8);

        $ms = Medicine::all();
        $as = Article::all();
        

        return view('admin.stocks.index', compact('productos', 'ms', 'as'));
    }
}
