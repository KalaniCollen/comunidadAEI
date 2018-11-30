<?php

namespace ComunidadAEI\Http\Controllers;

use Auth;
use ComunidadAEI\Catalogo;
use ComunidadAEI\Productos;
use ComunidadAEI\Servicios;
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
        $statusServicio = auth()->user()->empresa->servicio_empresa;
        $statusProducto = auth()->user()->empresa->producto_empresa;
        if($statusServicio == 1 && $statusProducto == 0) {
            $servicios = Servicios::where('id_empresa', auth()->user()->empresa->id_empresa)->get();
            return view('catalogo.index', compact('servicios'));
        }
        if($statusProducto == 1 && $statusServicio == 0) {
            $productos = Productos::where('id_empresa', auth()->user()->empresa->id_empresa)->get();
            return view('catalogo.index', compact('productos'));
        }
        if($statusServicio == 1 && $statusProducto == 1) {
            $servicios = Servicios::where('id_empresa', auth()->user()->empresa->id_empresa)->get();
            $productos = Productos::where('id_empresa', auth()->user()->empresa->id_empresa)->get();
            return view('catalogo.index', compact('productos', 'servicios'));
        }
        return view('catalogo.index')->with('configure', '<p class="roboto-regular h2">¡Bienvenid@, ' . auth()->user()->name . '!</p><br /><p class="h3">Para de comenzar a publicar sus productos/servicios por favor complete los datos de la sección <a class="link--accent" href="/perfil-empresa/' . auth()->user()->slug_usuario . '/edit">Perfil empresa</a>.</p>');
    }
}
