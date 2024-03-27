<?php

namespace App\Http\Controllers;
use App\Events\MessageEvent;
use Illuminate\Http\Request;

class chatContoller extends Controller
{
 public function index()
 {
    return view('index');
 }
 public function messages(Request $request)
 {
    event(new MessageEvent($request->message,$request->user));
 }
}
