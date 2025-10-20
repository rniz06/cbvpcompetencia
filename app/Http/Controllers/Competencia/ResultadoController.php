<?php

namespace App\Http\Controllers\Competencia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function index()
    {
        return view('competencias.resultados.index');    
    }
}
