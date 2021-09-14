<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request){
        //return $request;
        if($request->get('tipo')){
            $request->merge([
                'tipo' => 1
            ]);
        }else{
            $request->input('tipo', 0);
        }

        $detail = Detail::create($request->except(['_token']));
        return redirect()->back();
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
        $deatil = Detail::where('id', $request->get('detail_id'))->update(request()->except(['_token', 'detail_id']));
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
        $detail= Detail::find($id);
        $detail->delete();
        return redirect()->back();
        //Detail $detail
    }

    public function infoedit(Request $request){
        $detail = Detail::select('details.*','precios.p_unitario', 'precios.p_venta_caja','medicamentos.nro_caja',DB::raw('sum(stocks.cantidad) as total'))
                        ->leftJoin('precios','precios.medicamento_id','=','details.medicamento_id')
                        ->leftJoin('medicamentos','medicamentos.id','=','details.medicamento_id')
                        ->leftJoin('stocks','stocks.medicamento_id','=','details.medicamento_id')
                        ->groupBy('medicamento_id')
                        ->where('details.id',$request->get('id'))
                        ->first();
        return json_encode($detail);
    }

}
