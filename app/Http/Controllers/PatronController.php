<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatronController extends Controller
{
    public function dashboard(){
        return view('patron.dashboard');
      }
}
