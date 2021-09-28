<?php

namespace App\Http\Controllers;


use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Price;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function GuzzleHttp\Promise\all;

use App\Http\Requests\StoreMedicineRequest;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $medicamentos = Medicine::all();
        $precios = Price::all();

        return view('admin.medicamentos.index', compact('medicamentos','precios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $request->validate([
                'generic_name' => 'required',
                'tradename' => 'required',
                'concentration'   => 'required',
                'presentation'   => 'required',
                'laboratory'   => 'required',
                'number_box' => 'required',
                'number_blister' => 'required',
                'cost_box' => 'required',
                'cost_price' => 'required',
                'utility' => 'required',
                'sale_price' => 'required',

        ]);

        $duplicate = Medicine::where('generic_name', $request->get('generic_name'))
                                ->where('tradename', $request->get('tradename'))
                                ->where('concentration', $request->get('concentration'))
                                ->where('presentation', $request->get('presentation'))
                                ->where('laboratory', $request->get('laboratory'))
                                ->count();

        if($duplicate == 0){
            $medicamento = Medicine::create($request->all());
            $medicamento->price()->create([
                'cost_price' => $request->get('cost_price'),
                'utility' => $request->get('utility'),
                'sale_price' =>$request->get('sale_price')
            ]);
            $stock=$medicamento->stocks()->create([
                'shelf' => $request->get('shelf'),
                'cost_stock' => $request->get('cost_stock')
            ]);

            $batch =  Batch::create([
                'code' => $request->get('code'),
                'entry_date' => $request->get('entry_date'),
                'expiry_date' => $request->get('expiry_date'),
                'cost_box' => $request->get('cost_box'),
                'quantity_box' => $request->get('quantity_box'),
                'quantity_unit' => $request->get('quantity_unit'),
                'stock_id' => $stock->id
            ]);

            if($request->file('foto')){
                $url = Storage::disk('public')->put('medicines', $request->file('foto'));
                $medicamento->image()->create([
                    'url' => $url
                ]);
            }


        }else{
            return redirect()->back()->with('message','Este medicamento ya ha sido registrado');
        }








        /* if ($request->file('image')) {
            $url = Storage::put('medicines', $request->file('image'));
             return $url;

            $request->merge([
                'img' => $url
            ]);
        } */


       /*  $request->merge([
            'stockable_id' => $medicamento->id,
            'stockable_type' => "App\Models\Medicine",
            'priceable_id' => $medicamento->id,
            'priceable_type' => "App\Models\Medicine"
        ]);
        $precio = Price::create($request->all());
        $stock = Stock::create($request->all());
        $batch = Batch::created($request->all()); */

        return redirect(route('medicamentos.index'));
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
         $medicine= Medicine::where('id',$id)->first();
         $medicine->update($request->except(['_token','_method']));

         if ($request->file('imageMedicine')) {
            $medicine->image()->delete();
            $url = Storage::disk('public')->put('medicines', $request->file('imageMedicine'));
            $medicine->image()->create([
                'url' => $url
            ]);
        }


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

    public function all(Request $request)
    {
        $medicamentos = Medicine::where('generic_name', 'like', '%' . $request->get('search') . '%')
            ->orWhere('tradename', 'like', '%' . $request->get('search') . '%')
            ->get();
        return json_encode($medicamentos);
    }

    public function infoedit(Request $request)
    {
        $medicamentos = Medicine::where('id', $request->get('id'))->get();
        return json_encode($medicamentos);
    }

    public function delmedic(Request $request)
    {
        $del_med = Medicine::where('id', $request->get('id'))->delete();

        return $del_med;
    }
    public function medPrice(Request $request)
    {
        $medicamentos = Medicine::select('medicines.*', 'prices.sale_price', 'stocks.quantity', DB::raw('sum(stocks.quantity) as sumatoria'))
            ->leftJoin('prices', 'prices.priceable_id', '=', 'medicines.id')
            ->leftJoin('stocks', 'stocks.stockable_id', '=', 'medicines.id')
            ->where('generic_name', 'like', '%' . $request->get('search') . '%')
            ->orWhere('tradename', 'like', '%' . $request->get('search') . '%')
            ->groupBy('stocks.stockable_id')
            ->get();
        return json_encode($medicamentos);
    }
    public function precios(Request $request){
        $precios = Price::where('priceable_id',$request->get('id'))->first();

        return json_encode($precios);
    }

    public function preciosUpd(Request $request){

        $precio = Price::where('id',$request->get('id_precio'))->update(request()->except(['_token', 'id_precio']));

        return redirect(route('medicamentos.index'));
    }

    public function articleIndex(){
        $medicamentos = Medicine::paginate(10);
        return view('admin.articles.index', compact('medicamentos'));
    }
}
