<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = User::where('id',session('LoggedUser'))->first();

        $medicamentos = Medicine::select('medicines.*','prices.sale_price',DB::raw('sum(stocks.quantity) as total'))
                                    ->leftJoin('prices','prices.priceable_id','=','medicines.id')
                                    ->leftJoin('stocks','stocks.stockable_id','=','medicines.id')
                                    ->where('stocks.quantity','!=',null)
                                    ->groupBy('stocks.stockable_id')
                                    ->orderBy('medicines.generic_name')
                                    ->get();

        return view('admin.inicio.index', compact('medicamentos','data'));
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

    public function all(Request $request)
    {
        $medicamentos = Medicine::select('medicamentos.*','precios.p_unitario','precios.utilidad',DB::raw('sum(stocks.cantidad) as total'))
                                    ->leftJoin('precios','precios.medicamento_id','=','medicamentos.id')
                                    ->leftJoin('stocks','stocks.medicamento_id','=','medicamentos.id')
                                    ->groupBy('stocks.medicamento_id')
                                    ->orderBy('medicamentos.n_generico')
                                    ->where('n_generico', 'like', '%' . $request->get('search') . '%')
                                    ->orWhere('n_comercial', 'like', '%' . $request->get('search') . '%')
                                    ->get();

        return json_encode($medicamentos);
    }


    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function save(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required'
        ]);

       $request->merge([
           'password' => Hash::make($request->get('password')),
           'email_verified_at' => now(),
           'remember_token' => Str::random(10)
       ]);

       $user = User::create($request->all());
       return redirect()->route('login');
    }

    public function check(Request $request){
        $credentials =  request()->only('email','password');
        if(Auth::attempt($credentials)){
            request()->session()->regenerate();

            return redirect()->route('inicio.index');
        };

        return redirect()->route('login')->with('info','Credenciales fallidas');
    }

    public function logout(Request $request){

        $request->session()->invalidate();
        $request->session()->regenerate();
        Auth::logout();
        return redirect()->route('login')->with('info','Hasta luego');

    }
}
