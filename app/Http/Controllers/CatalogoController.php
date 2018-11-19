<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Productos;
use App\Servicios;
use App\Perfil_Empresa;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicios::where('id_empresa', Auth::user()->empresa->id_empresa)->get();
        $productos = Productos::where('id_empresa', Auth::user()->empresa->id_empresa)->get();
        return view('catalogo.index', compact('productos', 'servicios'));
    }
}
