<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Batch;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Article::all();
        $precios = Price::all();

        return view('admin.articles.index', compact('articulos','precios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            'tradename' => 'required',
            'trademark' => 'required',
            'presentation'   => 'required',
            'supplier'   => 'required',
            'number_box' => 'required',
            'cost_box' => 'required',
            'cost_price' => 'required',
            'utility' => 'required',
            'sale_price' => 'required',

    ]);

    $duplicate = Article::where('tradename', $request->get('tradename'))
                            ->where('trademark', $request->get('trademark'))
                            ->where('presentation', $request->get('presentation'))
                            ->where('supplier', $request->get('supplier'))
                            ->count();

    if($duplicate == 0){
        $articulo = Article::create($request->all());
        $articulo->price()->create([
            'cost_price' => $request->get('cost_price'),
            'utility' => $request->get('utility'),
            'sale_price' =>$request->get('sale_price')
        ]);
        $stock=$articulo->stocks()->create([
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

        if($request->file('fotoArticle')){
            $url = Storage::disk('public')->put('articles', $request->file('fotoArticle'));
            $articulo->image()->create([
                'url' => $url
            ]);
        }


    }else{
        return redirect()->back()->with('message','Este articulo ya ha sido registrado');
    }


    return redirect(route('articles.index'));
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
        $article= Article::where('id',$id)->first();
        $article->update($request->except(['_token','_method']));

        if ($request->file('fotoArticleupdate')) {
           $article->image()->delete();
           $url = Storage::disk('public')->put('articles', $request->file('fotoArticleupdate'));
           $article->image()->create([                
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
}
