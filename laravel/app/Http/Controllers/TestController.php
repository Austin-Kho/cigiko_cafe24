<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  public function __invoke(){
    return 'Test controller Invoke';
  }

  public function test(){
    return 'Test Controller test';
  }
}
