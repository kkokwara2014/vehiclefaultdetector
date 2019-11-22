<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimerController extends Controller
{
    public function index()
    {
        // $timeIt = '2019-08-29';
        // if ($timeIt > date('Y-m-d')) {
        return view('welcome');
        // } else {
        // }
    }

    public function calldeveloper()
    {
        return view('calldeveloper.callus');
    }
}
