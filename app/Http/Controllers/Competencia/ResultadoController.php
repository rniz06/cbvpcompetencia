<?php

namespace App\Http\Controllers\Competencia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Establece los middleware necesarios para gestionar permisos
     * Se utilizan permisos específicos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:Resultados Listar', ['only' => ['index']]);
        $this->middleware('permission:Resultados Crear', ['only' => ['create']]);
    }

    public function index()
    {
        return view('competencias.resultados.index');    
    }

    public function create()
    {
        return view('competencias.resultados.create');    
    }
}
