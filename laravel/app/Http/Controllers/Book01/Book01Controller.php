<?php

namespace App\Http\Controllers\Book01;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Book01Controller extends Controller
{
  public function index($id='01'){
    return view('Book01/book01');
  }
}
