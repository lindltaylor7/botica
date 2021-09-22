<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Detail;
use App\Models\Stock;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ventas=Venta::where('status',1)->orderBy('id','desc')->paginate(10);
        return view('admin.ventas.index', compact('ventas'));

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if($request->get('check')){

            $cliente = Cliente::create([
                "name" => strtoupper($request->get('nombre_cliente')),
                "dni" => '-'
            ]);

            $request->merge([
                "cliente_id" => $cliente->id,
                "vendedor" => Auth::user()->name
            ]);

        

            $venta = Venta::create($request->all());
        }else{

            $request->merge([
                "vendedor" => Auth::user()->name
            ]);

            $venta = Venta::create($request->all());

        }

        



        return redirect()->route('ventas.show',['id'=> $venta->id]);


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
        $venta = Venta::where('id',$id)->first();
        $details = Detail::where('venta_id', $id)->get();
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


       $details = Detail::where('venta_id',$id)->get();

       //return $details;

       foreach($details as $detail){

        $stock = Stock::where('medicamento_id', $detail->medicamento_id)->where('status',1)->orderBy('f_vencimiento')->first();


        if($stock->cantidad - $detail->cantidad > 0){


            $stock = Stock::where('id',$stock->id)->update(["cantidad" => $stock->cantidad - $detail->cantidad]);
            echo " cantidad suplied no inhabilitar stock";

        }else if($stock->cantidad - $detail->cantidad == 0){
            $stock = Stock::where('id',$stock->id)->update(["cantidad" => $stock->cantidad - $detail->cantidad, "status" => 0]);
            echo " cantidad suplied y stock inhabilitado";
        }
        else{

            $pedido = $detail->cantidad - $stock->cantidad;
            $stock = Stock::where('id',$stock->id)->update(["cantidad" => 0, "status" => 0]);

            while ($pedido > 0){

                $newstock = Stock::where('medicamento_id', $detail->medicamento_id)->where('status',1)->orderBy('f_vencimiento')->first();
                $pedido = $pedido - $newstock->cantidad;
                if($pedido > 0){
                    $newstock = Stock::where('id',$newstock->id)->update(["cantidad" => 0, "status" => 0]);
                    echo "traer otro stock";
                }else{
                    $newstock->update(["cantidad" => $pedido*-1]);
                    echo " fin";
                    break;
                }
            }

        }



       }



        $upd_med = Venta::where('id', $id)->update(['utilidad'=>$request->get('total'),'status'=>1]);
        return redirect()->route('ventas.index');


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


    public function invoice($id){

        $venta = Venta::where('id',$id)->first();
        $details = Detail::where('venta_id', $id)->get();
        $cliente = Cliente::where('id',$venta->cliente_id)->first();
        return view('admin.ventas.invoice', compact('cliente', 'venta', 'details', 'id'));
    }

    public function vista($id)
    {
        $venta = Venta::where('id',$id)->first();
        $details = Detail::where('venta_id', $id)->get();
        $cliente = Cliente::where('id',$venta->cliente_id)->first();
        return view('admin.ventas.pdf', compact('cliente', 'venta', 'details', 'id'));
    }

    public function generarPdf($id){
        $venta = Venta::where('id',$id)->first();
        $details = Detail::where('venta_id', $id)->get();
        $cliente = Cliente::where('id',$venta->cliente_id)->first();
        $pdf = PDF::loadView('admin.ventas.pdf', compact('cliente', 'venta', 'details', 'id'));
        $pdf->setPaper('a5', 'landscape');

        return $pdf->stream('mi-archivo.pdf');

    }


    public function ticket($id)
    {
        $venta = Venta::where('id',$id)->first();
        $details = Detail::where('venta_id', $id)->get();
        $cliente = Cliente::where('id',$venta->cliente_id)->first();
        return view('admin.ventas.ticket', compact('cliente', 'venta', 'details', 'id'));
    }

    public function generar_ticeketPdf($id){
        $venta = Venta::where('id',$id)->first();
        $details = Detail::where('venta_id', $id)->get();
        $cliente = Cliente::where('id',$venta->cliente_id)->first();
        $pdf = PDF::loadView('admin.ventas.ticket', compact('cliente', 'venta', 'details', 'id'));
        $pdf->setPaper('a7');
       
        return $pdf->stream('mi-ticket.pdf');

    }

    public function anular($id){
        $venta = Venta::where('id', $id)->first();

        $details = Detail::where('venta_id',$venta->id)->get();

        foreach($details as $detail){
            $last_stock = Stock::where('medicamento_id',$detail->medicamento_id)->orderBy('f_vencimiento','asc')->first();
            $last_stock->update(['cantidad' => $last_stock->cantidad+$detail->cantidad,'status'=>1]);
        }

        $venta = Venta::where('id', $id)->update(['status' => 0]);
        return redirect()->route('ventas.index');
    }

    public function insertarVendedor(Request $request){

        
    }


}
