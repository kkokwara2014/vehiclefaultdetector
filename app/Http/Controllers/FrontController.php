<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fault;

class FrontController extends Controller
{
    public function index(){

        $faults=Fault::orderBy('created_at','desc')->paginate(5);

        return view('welcome',compact('faults'));
    }
}
