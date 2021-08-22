<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\newsletter;
class newsletterController extends Controller
{
    //


    public function join(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        $newletter =  newsletter::create([
            'email' => $request->email
        ]);
        return response($newletter,200);
    }
}
