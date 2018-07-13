<?php

namespace App\Http\Controllers\Book02;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Book02Controller extends Controller
{
  public function index($id='01'){
    return view('Book02/book02');
  }
}
