<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class orderController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return order::get();
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
        return order::create([
            'code' => $request->input('code'),
            'total_price' => $request->input('total_price'),
            'state' => $request->input('state'),
            'regiont' => $request->input('regiont'),
            'ville' => $request->input('ville'),
            'codePostal' => $request->input('codePostal'),
            'phone' => $request->input('phone'),
            'user_id' => $request->input('user_id'),
            'regiont_id' => $request->input('regiont_id')

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return $order;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        return $order;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        return $order->update([
            'code' => $request->input('code'),
            'total_price' => $request->input('total_price'),
            'state' => $request->input('state'),
            'regiont' => $request->input('regiont'),
            'ville' => $request->input('ville'),
            'codePostal' => $request->input('codePostal'),
            'phone' => $request->input('phone'),
            'user_id' => $request->input('user_id'),
            'regiont_id' => $request->input('regiont_id')

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        return $order->delete();
    }
    /**
     * search for a name
     *  @param  \App\Models\order  $order 
     * @return \Illuminate\Http\Response
     */
       public function search($name)
     {
         return order::where('name','like','%'.$name.'%')->get();
     }
}
