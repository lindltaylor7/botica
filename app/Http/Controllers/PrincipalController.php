<?php

namespace App\Http\Controllers;

use App\Models\Imagene;
use Illuminate\Http\Request;


class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagene=Imagene::all();
        return view('admin.principal.index', compact('imagene'));
    }

    public function editar_1()
    {
        return view('admin.principal.editar_1');
    }

    public function editar_2()
    {
        return view('admin.principal.editar_2');
    }


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
        $imagen = $request->all();
        if($request->hasFile('url')){
            $imagen['url']=$request->file('url')->getClientOriginalName();
            $request->file('url')->storeAs('imagenes', $imagen['url']);
            
        }
        Imagene::create($imagen);
        return redirect()->route('principal.index');
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
    public function edit(Imagene $imagen)
    {
        return view('admin.principal.edit', compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagene $imagen)
    {
        if($request->hasFile('url')){
            $imagen['url']=$request->file('url')->getClientOriginalName();
            $request->file('url')->storeAs('public/imagenes', $imagen['url']);
            if($imagen->url!=''){
                unlink(storage_path('app/public/imagenes'.$imagen->id.'/'.$imagen->url));
            }
        }
        Imagene::create($imagen);
        return redirect()->route('principal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
