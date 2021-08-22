<?php

namespace App\Http\Controllers;

use App\Models\regiont;
use Illuminate\Http\Request;

class regiontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return [1];
        return regiont::get();
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
        return regiont::create([
            'name' => $request->input('name'),
            'emploie_id' => $request->input('emploie_id')

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\regiont  $regiont
     * @return \Illuminate\Http\Response
     */
    public function show(regiont $regiont)
    {
        return $regiont;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\regiont  $regiont
     * @return \Illuminate\Http\Response
     */
    public function edit(regiont $regiont)
    {
        return $regiont;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\regiont  $regiont
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, regiont $regiont)
    {
        return $regiont->update([
            'name' => $request->input('name'),
            'emploie_id' => $request->input('state')

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\regiont  $regiont
     * @return \Illuminate\Http\Response
     */
    public function destroy(regiont $regiont)
    {
        return $regiont->delete();
    }
     /**
     * search for a name
     *  @param  \App\Models\regiont  $regiont 
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return regiont::where('name','like','%'.$name.'%')->get();
    }
}
