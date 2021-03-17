<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index (){
    	$usuario = 'Héctor Vega';
    	$edad = '24';

    	return view('index')->with('usuario', $usuario)->with('edad', $edad);
    }
}
