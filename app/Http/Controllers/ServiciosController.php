<?php

namespace ComunidadAEI\Http\Controllers;

use Auth;
use ComunidadAEI\Servicios;
use ComunidadAEI\Mail\OrdenServicio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use ComunidadAEI\Http\Requests\StoreServiciosRequest;


class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogo.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiciosRequest $request)
    {
        $servicio = new Servicios();
        $servicio->fill($request->except('id_empresa','imagen', 'slug'));
        if ($request->hasFile('imagen')) {
            $imagen = Storage::putFile('public/catalogos_img', $request->file('imagen'));
            $servicio->imagen = basename($imagen);
        } else {
            $servicio->imagen = 'defaultService.jpeg';
        }
        $servicio->id_empresa = auth()->user()->empresa->id_empresa;
        $servicio->slug = Str::slug( $servicio->nombre . $servicio->id_empresa );
        $servicio->save();
        return redirect()->route('catalogo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Servicios $servicio)
    {
        return view('catalogo.servicios.show', compact('servicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicios $servicio)
    {
        $this->authorize('view', $servicio);
        return view('catalogo.servicios.edit', compact('servicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreServiciosRequest $request, Servicios $servicio)
    {
        $this->authorize('update', $servicio);
        $servicio->fill($request->except('imagen', 'slug'));
        if ($request->hasFile('imagen')) {
            if ($servicio->imagen != "defaultService.jpeg") {
                Storage::delete("public/catalogos_img/{$servicio->imagen}");
            }
            $imagen = Storage::putFile('public/catalogos_img', $request->file('imagen'));
            $servicio->imagen = basename($imagen);
        }
        $servicio->slug = Str::slug($servicio->nombre);
        $servicio->save();
        return redirect()->route('catalogo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Servicios servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicios $servicio)
    {
        $this->authorize('delete', $servicio);
        $servicio->delete();
        Storage::delete("public/catalogos_img/{$servicio->imagen}");
        return redirect()->route('catalogo.index');
    }

    public function api(Request $request)
    {
        $servicios = Servicios::orderBy('created_at', 'DESC')->paginate(6);
        $servicios->each(function ($servicio) {
            $servicio->empresa;
        });
        return response()->json($servicios, Response::HTTP_OK);
    }

    /**
     * Redirigir al formulario para contactar
     *
     * @method contact
     * @param  Servicios $servicio
     * @return view
     */
    public function contact(Servicios $servicio) {
        return view('catalogo.servicios.contact', compact('servicio'));
    }

    /**
     * Enviar correo de orden de servicio
     *
     * @method sendMail
     * @param  Request  $request
     * @return view
     */
    public function sendMail(Request $request) {
        Mail::send('catalogo.servicios.fragments.mail', [
            "servicio" => $request->servicio,
            "remitente" => $request->remitente,
            "mensaje" => $request->mensaje
        ], function ($message) use ($request) {
            $message->from($request->remitente, $request->nombreRemitente);
            $message->to($request->destinatarioCorreo, $request->destinatario);
            $message->subject("Orden de Servicio: {$request->servicio}");
        });
        return redirect()->back();
    }
}
