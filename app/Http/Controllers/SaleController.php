<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Customer;
use App\Models\Detail;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Batch;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventas = Sale::orderBy('id','desc')->paginate(10);
        return view('admin.ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->get('check'))
        {
            $cliente = Customer::create([
                "name" => strtoupper($request->get('nombre_cliente')),
                "dni" => '-'
            ]);

            $request->merge([
                "customer_id" => $cliente->id,
                "seller" => Auth::user()->name
            ]);
            $venta = Sale::create($request->all());
        }
        else
        {
            $request->merge([
                "seller" => Auth::user()->name
            ]);

            $venta = Sale::create($request->all());
        }

        return redirect()->route('ventas.show',['id' => $venta->id]);
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
            'name' => 'required',
            'dni' => 'required'
        ]);

        $customer = Customer::create([
            'name' => $request->get('name'),
            'dni' => $request->get('dni')
        ]);

        $sale = Sale::create([
            'Ruc' => '-',
            'type' => 1,
            'code' => 'B'.$customer->id,
            'date' => $request->get('date'),
            'seller' => Auth::user()->name,
            'customer_id' => $customer->id,
            'igv'=> $request->get('igv'),
            'total_utility' => $request->get('total_utility'),
            'total_sale' => $request->get('total_sale')
        ]);

        $details = $request->get('detail');

        for($i=0; $i<count($details); $i++){
            if($details[$i]['unit_type']==1){
                $medicine = Medicine::find($details[$i]['medicine_id']);
                $detail = $medicine->details()->create([
                    'quantity' => $details[$i]['quantity'],
                    'unit_type' => $details[$i]['unit_type'],
                    'sale_id' => $sale->id,
                    'amount' => $details[$i]['partial_sale']
                ]);

                //Cantidad total del medicamento en Stock
                $stocks_med = $medicine->stocks;
                $cant_total = 0;

                $cost_stock = 0;
                foreach ($stocks_med as $stock_med){
                    foreach($stock_med->batches as $batch){
                        $cant_total += $batch->quantity_unit;
                    }
                }

                //return $cant_total;

                //Restar la cantidad de pedido al Stock

                $cant_pedido = $detail->quantity;

                foreach ($stocks_med as $stock_med){
                    if($cant_pedido != 0){
                        foreach($stock_med->batches as $batch){
                            if($batch->quantity_unit > $cant_pedido && $cant_pedido>0){
                                $batch->update([
                                    'quantity_unit' => $batch->quantity_unit - $cant_pedido,
                                ]);
                                $batch->details()->attach($detail->id,['quantity_sale' => $cant_pedido]);
                                $cant_pedido= 0;
                            }else{
                                $cant_pedido = $cant_pedido - $batch->quantity_unit;
                                $batch->details()->attach($detail->id,['quantity_sale' => $batch->quantity_unit]);
                                $batch->update([
                                    'quantity_unit' => 0
                                ]);
                            }
                        }
                    }
                }
/*
                $cant_pedido = $detail->quantity;

                while($cant_pedido>0){
                    if($cant_total>=$cant_pedido){
                    $cant_pedido = $batch_med->quantity_unit - $cant_pedido;
                    }else{
                    $cant_pedido = 0;
                    }
                } */

               /*   */

/*
                $total_stock=0;
                foreach($batches_med as $batch){
                    $total_stock = $total_stock + $batch->quantity_unit;
                }

                $resta = $total_stock - $detail->quantity; */
            }else{
                $article = Article::find($details[$i]['article_id']);
                $detail = $article->details()->create([
                    'quantity' => $details[$i]['quantity'],
                    'unit_type' => $details[$i]['unit_type'],
                    'sale_id' => $sale->id,
                    'amount' => $details[$i]['partial_sale']
                ]);

                //Cantidad total del medicamento en Stock
                $stocks_med = $article->stocks;
                $cant_total = 0;

                $cost_stock = 0;
                foreach ($stocks_med as $stock_med){
                    foreach($stock_med->batches as $batch){
                        $cant_total += $batch->quantity_unit;
                    }
                }

                //return $cant_total;

                //Restar la cantidad de pedido al Stock

                $cant_pedido = $detail->quantity;

                foreach ($stocks_med as $stock_med){
                    if($cant_pedido != 0){
                        foreach($stock_med->batches as $batch){
                            if($batch->quantity_unit > $cant_pedido && $cant_pedido>0){
                                $batch->update([
                                    'quantity_unit' => $batch->quantity_unit - $cant_pedido,
                                ]);
                                $batch->details()->attach($detail->id,['quantity_sale' => $cant_pedido]);
                                $cant_pedido= 0;
                            }else{
                                $cant_pedido = $cant_pedido - $batch->quantity_unit;
                                $batch->details()->attach($detail->id,['quantity_sale' => $batch->quantity_unit]);
                                $batch->update([
                                    'quantity_unit' => 0
                                ]);
                            }
                        }
                    }
                }
            }
        }
        return redirect(route('ventas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)->get();
        return view('admin.ventas.venta',compact('id','details','venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * Editar una nueva venta
         */
        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)->get();
        $cliente = Customer::where('id',$venta->customer_id)->first();
        $detalles = [];
        $total = 0;
        foreach ($details as $detail) {
            array_push($detalles, $detail->detailable);
            $total += $detail->amount;
        }
        
        return view('admin.ventas.edit_venta',compact('id','details','venta', 'cliente', 'detalles', 'total'));
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
        $details = Detail::where('sale_id',$id)->get();

        foreach($details as $detail)
        {
            $stock = Stock::where('stockable_id',$detail->detailable_id)->first();

            if($stock->quantity - $detail->quantity > 0)
            {
                $stock = Stock::where('id',$stock->id)->update(["quantity" => $stock->quantity - $detail->quantity]);
                echo " cantidad suplied no inhabilitar stock";
            }
            else if($stock->quantity - $detail->quantity == 0)
            {
                $stock = Stock::where('id',$stock->id)->update(["quantity" => $stock->quantity - $detail->quantity]);
                echo " cantidad suplied y stock inhabilitado";
            }
            else
            {
                $pedido = $detail->quantity - $stock->quantity;
                $stock = Stock::where('id',$stock->id)->update(["quantity" => 0]);

                while ($pedido > 0)
                {
                    $newstock = Stock::where('stockable_id', $detail->detailable_id)->first();
                    $pedido = $pedido - $newstock->quantity;

                    if($pedido > 0){
                        $newstock = Stock::where('id',$newstock->id)->update(["quantity" => 0]);
                        echo "traer otro stock";
                    }
                    else{
                        $newstock->update(["quantity" => $pedido*-1]);
                        echo " fin";
                        break;
                    }
                }
            }
        }

        $upd_med = Sale::where('id', $id)->update(['total_utility'=>$request->get('total_sale')]);
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id){

        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)->get();
        $cliente = Customer::where('id',$venta->customer_id)->first();

        return view('admin.ventas.invoice', compact('cliente', 'venta', 'details', 'id'));
    }

    public function vista($id)
    {
        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)->get();
        $cliente = Customer::where('id',$venta->customer_id)->first();

        return view('admin.ventas.pdf', compact('cliente', 'venta', 'details', 'id'));
    }

    public function generarPdf($id){
        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)
        ->with('detailable')
        ->with('detailable.price')
        ->get();

        $priceTotal = 0;
        foreach($details as $detail) {
            $priceTotal = $priceTotal + ($detail->detailable->price->sale_price * $detail->quantity);
        }

        $discount = $priceTotal - $venta->total_sale;

        $cliente = Customer::where('id',$venta->customer_id)->first();
        $pdf = PDF::loadView('admin.ventas.pdf', compact('cliente', 'venta', 'details', 'id', 'discount'));
        $pdf->setPaper('a5', 'landscape');

        return $pdf->stream('mi-archivo.pdf');

    }

    public function ticket($id)
    {
        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)->get();
        $cliente = Customer::where('id',$venta->customer_id)->first();
        return view('admin.ventas.ticket', compact('cliente', 'venta', 'details', 'id'));
    }

    public function generar_ticeketPdf($id){
        
        $venta = Sale::where('id',$id)->first();
        $details = Detail::where('sale_id', $id)->get();
        $cliente = Customer::where('id',$venta->customer_id)->first();
        $pdf = PDF::loadView('admin.ventas.ticket', compact('cliente', 'venta', 'details', 'id'));
        $pdf->setPaper('a7');

        return $pdf->stream('mi-ticket.pdf');

    }

    public function anular($id){
        $venta = Sale::where('id', $id)->first();
        $details = Detail::where('sale_id',$venta->id)->get();
        $venta->update(['code'=>$venta->code."_a"]);

        
        foreach($details as $detail){
            // if ($detail->detailable_id == ) {
    
            // }
            foreach($detail->batches as $batch){
                $batch->update([
                    'quantity_unit' => $batch->quantity_unit + $batch->pivot->quantity_sale
                ]);
            }
        }
        return redirect()->route('ventas.index');
    }

    public function destroy($id)
    {
    }

    public function insertarVendedor(Request $request){

    }

    public function getFechas () {

    }

}
