<?php

namespace App\Http\Controllers;


use App\Models\Medicine;
use App\Models\User;
use App\Models\Sale;
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
        $medicamentos = Medicine::all();
        // $ventas1 = Sale::unique('date');

        $ventas = Sale::groupBy('date')->pluck('date');
        $ventasNum = Sale::select(DB::raw('sum(total_sale)'))->groupBy('date')->get();
        $arr = [];
        foreach ($ventasNum as $num) {
            array_push($arr,$num['sum(total_sale)']);
        }
        return view('admin.inicio.index', compact('medicamentos','data', 'ventas', 'arr'));
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
        $medicamentos = Medicine::all();

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
