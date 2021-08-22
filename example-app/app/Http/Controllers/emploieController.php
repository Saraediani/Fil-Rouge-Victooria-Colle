<?php

namespace App\Http\Controllers;

use App\Models\emploie;
use Illuminate\Http\Request;

class emploieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return emploie::get();
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
        return emploie::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone')

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function show(emploie $emploie)
    {
        return $emploie;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function edit(emploie $emploie)
    {
        return $emploie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, emploie $emploie)
    {
        return $emploie->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'phone' => $request->input('phone')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\emploie  $emploie
     * @return \Illuminate\Http\Response
     */
    public function destroy(emploie $emploie)
    {
        return $emploie->delete();
    }
    /**
     * search for a name
     *  @param  \App\Models\emploie  $emploie 
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return emploie::where('name','like','%'.$name.'%')->get();
    }
}
