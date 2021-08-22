<?php

namespace App\Http\Controllers;

use App\Models\orderproduct;
use Illuminate\Http\Request;

class orderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  orderProduct::get();
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
        return  orderProduct::create([
            'product_id' => $request->input('product_id'),
            'order_id' => $request->input('order_id')

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function show( orderProduct $orderProduct)
    {
        return $orderProduct;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function edit( orderProduct $orderProduct)
    {
        return $orderProduct;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  orderProduct $orderProduct)
    {
        return $orderProduct->update([
            'product_id' => $request->input('product_id'),
            'order_id' => $request->input('order_id')

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ orderProduct  $orderProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(orderProduct $orderProduct)
    {
        return $orderProduct->delete();
    }
}
