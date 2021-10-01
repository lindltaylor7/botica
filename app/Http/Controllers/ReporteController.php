<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Stock;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Sale::all();
        $stocks = Stock::all();
        return view('admin.reportes.index', compact('ventas','stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    public function top(){
        $tops1=Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Medicine')
                    ->groupBy('details.detailable_id');

        $tops=Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('articles','details.detailable_id','=','articles.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Article')
                    ->groupBy('details.detailable_id')
                    ->union($tops1)
                    ->orderBy('cantidad','desc')
                    ->get();

        return view('admin.reportes.top', compact('tops'));
    }

    public function bot(){
        $bots1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->groupBy('details.detailable_id');

        $bots = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->groupBy('details.detailable_id')
                            ->union($bots1)
                            ->orderBy('cantidad','asc')
                            ->get();

        return view('admin.reportes.bot', compact('bots'));
    }

    public function ven(){
        $vens=Stock::select('medicamentos.n_generico','medicamentos.n_comercial','medicamento_id','f_vencimiento')
                    ->leftJoin('medicamentos','stocks.medicamento_id','=','medicamentos.id')
                    ->where('f_vencimiento', '>', 'now()')
                    ->orderBy('f_vencimiento', 'asc')
                    ->get();
        return view('admin.reportes.ven', compact('vens'));
    }

    public function topDay(Request $request){
        if($request->get('id') == 1){
            $details1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->whereRaw('DATE(CURDATE()) = DATE(sales.created_at)')
                            ->groupBy('details.detailable_id');


            $details = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->whereRaw('DATE(CURDATE()) = DATE(sales.created_at)')
                            ->groupBy('details.detailable_id')
                            ->union($details1)
                            ->orderBy('cantidad','desc')
                            ->get();

        }else if($request->get('id') == 2){
            $details1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->whereRaw('MONTH(CURDATE()) = MONTH(sales.created_at)')
                            ->groupBy('details.detailable_id');


            $details = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->whereRaw('MONTH(CURDATE()) = MONTH(sales.created_at)')
                            ->groupBy('details.detailable_id')
                            ->union($details1)
                            ->orderBy('cantidad','desc')
                            ->get();

        }else{
            $details1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->whereRaw('YEAR(CURDATE()) = YEAR(sales.created_at)')
                            ->groupBy('details.detailable_id');


            $details = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->whereRaw('YEAR(CURDATE()) = YEAR(sales.created_at)')
                            ->groupBy('details.detailable_id')
                            ->union($details1)
                            ->orderBy('cantidad','desc')
                            ->get();
        }

        return $details;
    }

    public function botDay(Request $request){
        if($request->get('id') == 1){
            $details1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->whereRaw('DATE(CURDATE()) = DATE(sales.created_at)')
                            ->groupBy('details.detailable_id');


            $details = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->whereRaw('DATE(CURDATE()) = DATE(sales.created_at)')
                            ->groupBy('details.detailable_id')
                            ->union($details1)
                            ->orderBy('cantidad','asc')
                            ->get();

        }else if($request->get('id') == 2){
            $details1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->whereRaw('MONTH(CURDATE()) = MONTH(sales.created_at)')
                            ->groupBy('details.detailable_id');


            $details = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->whereRaw('MONTH(CURDATE()) = MONTH(sales.created_at)')
                            ->groupBy('details.detailable_id')
                            ->union($details1)
                            ->orderBy('cantidad','asc')
                            ->get();

        }else{
            $details1 = Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Medicine')
                            ->whereRaw('YEAR(CURDATE()) = YEAR(sales.created_at)')
                            ->groupBy('details.detailable_id');


            $details = Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                            ->leftJoin('articles','details.detailable_id','=','articles.id')
                            ->leftJoin('sales','details.sale_id','=','sales.id')
                            ->where('details.detailable_type','App\Models\Article')
                            ->whereRaw('YEAR(CURDATE()) = YEAR(sales.created_at)')
                            ->groupBy('details.detailable_id')
                            ->union($details1)
                            ->orderBy('cantidad','asc')
                            ->get();
        }

        return $details;
    }

    public function topFecha(Request $request){
        $tops1=Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Medicine')
                    ->where('sales.created_at', 'like', $request->get('fecha').'%')
                    ->groupBy('details.detailable_id');


        $tops=Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('articles','details.detailable_id','=','articles.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Article')
                    ->where('sales.created_at', 'like', $request->get('fecha').'%')
                    ->groupBy('details.detailable_id')
                    ->union($tops1)
                    ->orderBy('cantidad','desc')
                    ->get();

        return $tops;
    }

    public function sellsDay(Request $request){
        $tops1=Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Medicine')
                    ->where('sales.created_at', 'like', $request->get('fecha').'%')
                    ->groupBy('details.detailable_id');


        $tops=Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('articles','details.detailable_id','=','articles.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Article')
                    ->where('sales.created_at', 'like', $request->get('fecha').'%')
                    ->groupBy('details.detailable_id')
                    ->union($tops1)
                    ->orderBy('cantidad','desc')
                    ->get();

        return $tops;
    }

    public function export(){
        $fileName = 'Reporte'.date('d-m-Y').'.xls';
        $arrayDetalle = Array();

        $items1=Detail::select('medicines.generic_name','medicines.tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('medicines','details.detailable_id','=','medicines.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Medicine')
                    ->where('sales.created_at', 'like', date('Y-m-d').'%')
                    ->groupBy('details.detailable_id');

        $items=Detail::select('articles.tradename as generic_name','articles.trademark as tradename', DB::raw('SUM(details.quantity) as cantidad'), DB::raw('SUM(details.partial_sale) as total'))
                    ->leftJoin('articles','details.detailable_id','=','articles.id')
                    ->leftJoin('sales','details.sale_id','=','sales.id')
                    ->where('details.detailable_type','App\Models\Article')
                    ->where('sales.created_at', 'like', date('Y-m-d').'%')
                    ->groupBy('details.detailable_id')
                    ->union($items1)
                    ->orderBy('cantidad','desc')
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
            <th>".mb_convert_encoding('Nombre Genérico', 'UTF-16LE', 'UTF-8')."</th>
            <th>Nombre Comercial</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>";

        foreach ($items as $item){
          echo"<tr>
           <td>" . mb_convert_encoding($item->generic_name, 'UTF-16LE', 'UTF-8') . "</td>
           <td>$item->tradename</td>
           <td>$item->cantidad</td>
           <td>$item->total</td>
           <td>".$item->cantidad*$item->total."</td>
       </tr>";
        }
       echo"</table>";

    }

}
