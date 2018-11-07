<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Productos;
use App\Servicios;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $productos = Productos::all();
        // $servicios = Servicios::all();
        // return view('home', [
        //     'productos' => $productos,
        //     'servicios' => $servicios
        // ]);
        return view('home');
    }
}
