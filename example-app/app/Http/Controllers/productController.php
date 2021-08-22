<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Product::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Product::create([
            'name' => $request->input('name'),
            'qte' => $request->input('qte'),
            'price' => $request->input('price'),
            'admin_id' => $request->input('admin_id'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'image' => $request->input('image')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return $product;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        return $product->update([
            'name' => $request->input('name'),
            'qte' => $request->input('qte'),
            'price' => $request->input('price'),
            'admin_id' => $request->input('admin_id'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'image' => $request->input('image')

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        return $product->delete();
    }
    /**
     * search for a name
     *  @param  \App\Models\product  $product 
     * @return \Illuminate\Http\Response
     */
       public function search($name)
     {
         return Product::where('name','like','%'.$name.'%')->get();
     }
}

