<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Medicine;
use App\Models\Price;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.medicamentos.index', compact('medicamentos'));
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
        
        $request->validate([
            'generic_name' => 'required',
            'tradename'   => 'required',
            'shelf'    => 'required',
            'cost_price' => 'required',
            'utility'    => 'required',
            'sale_price'     => 'required',
            'code'  => 'required',
            'entry_date'   => 'required',
            'expiry_date' => 'required'
      
        ]);

        if ($request->file('image')) {
            $url = Storage::put('medicines', $request->file('image'));
            /*  return $url; */
            $request->merge([
                'img' => $url
            ]);
        }

        $medicamento = Medicine::create($request->all());
        $request->merge([
            'stockable_id' => $medicamento->id,
            'stockable_type' => "App\Models\Medicine",
            'priceable_id' => $medicamento->id,
            'priceable_type' => "App\Models\Medicine"
        ]);
        $precio = Price::create($request->all());
        $stock = Stock::create($request->all());
        $batch = Batch::created($request->all());

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
}
