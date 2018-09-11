<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriteController extends Controller
{

  public function index($id='1'){
    return view('write');
  }
}
