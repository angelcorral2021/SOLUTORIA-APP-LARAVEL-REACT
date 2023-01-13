<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $products;
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
        $product = new Product();
        $product->nombreIndicador = $request->nombreIndicador;
        $product->codigoIndicador = $request->codigoIndicador;
        $product->unidadMedidaIndicador = $request->unidadMedidaIndicador;
        $product->valorIndicador = $request->valorIndicador;
        $product->fechaIndicador = $request->fechaIndicador;
        $product->tiempoIndicador = $request->tiempoIndicador;
        $product->origenIndicador = $request->origenIndicador;

        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product = Product::find($id);
       return $product;
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
        $product = Product::findorFail($request->id);
        $product->nombreIndicador = $request->nombreIndicador;
        $product->codigoIndicador = $request->codigoIndicador;
        $product->unidadMedidaIndicador = $request->unidadMedidaIndicador;
        $product->valorIndicador = $request->valorIndicador;
        $product->fechaIndicador = $request->fechaIndicador;
        $product->tiempoIndicador = $request->tiempoIndicador;
        $product->origenIndicador = $request->origenIndicador;

        $product->save();
        return $product;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $product = Product::destroy($id);
       return $product;
    }
}
