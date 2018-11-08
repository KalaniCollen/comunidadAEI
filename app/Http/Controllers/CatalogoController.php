<?php

namespace App\Http\Controllers;

use App\Catalogo;
use App\Productos;
use App\Servicios;
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
        $productos = Productos::where('Id_Usuario', Auth::user()->Id_Usuario)->get();
        $servicios = Servicios::where('Id_Usuario', Auth::user()->Id_Usuario)->get();
        return view('catalogo.index', compact('productos', 'servicios'));
    }
}
