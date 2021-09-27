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
        $detail = Detail::select('details.*','sales.sale_price', 'medicines.number_box',DB::raw('sum(stocks.quantity) as total'))
                        ->leftJoin('sales','sales.id','=','details.sale_id')
                        ->leftJoin('medicines','medicines.id','=','details.detailable_id')
                        ->leftJoin('stocks','stocks.stockable_id','=','details.detailable_id')
                        ->groupBy('medicine.id')
                        ->where('details.id',$request->get('id'))
                        ->first();
        return json_encode($detail);
    }

}
