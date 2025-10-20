<?php

namespace App\Http\Controllers\Competencia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConcursanteController extends Controller
{
    /**
     * Establece los middleware necesarios para gestionar permisos
     * Se utilizan permisos específicos para cada acción del controlador.
     */
    function __construct()
    {
        $this->middleware('permission:Concursantes Index', ['only' => ['index']]);
    }

    public function index()
    {
        return view('competencias.concursantes.index');
    }
}
