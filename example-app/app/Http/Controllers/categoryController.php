<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use DB;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return category::get();
    }

    public function indexWithProducts(){
        return category::with(['product'])->get();
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
        return category::create([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'state' => 1

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return $category;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        return $category->update([
            'name' => $request->input('name'),
            'image' => $request->input('image'),
            'satate' => $request->input('state')

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        return $category->delete();
    }
     /**
     * search for a name
     *  @param  \App\Models\category  $category 
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return category::where('name','like','%'.$name.'%')->get();
    }
}
