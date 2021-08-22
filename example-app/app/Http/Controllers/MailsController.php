<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\contactMail;
use App\Mail\OrderShipped;
use Mail;
class MailsController extends Controller
{
    //


    public function contact(Request $request){
        Mail::to('sara.pur187@gmail.com')->send(new contactMail(['Contact email',$request->message,'data'=>$request->all()]));
        return $request->all();
    }

    public function order(Request $request){
        Mail::to('sara.pur187@gmail.com')->send(new OrderShipped(['Order email',$request->message,'data'=>$request->all()]));
        return $request->all();
    }
}
