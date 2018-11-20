<?php

namespace App\Http\Controllers;

use Auth;
use App\Servicios;
use App\Mail\OrdenServicio;
use App\Http\Requests\StoreServiciosRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $servicios = Servicios::all();
        $servicios->each(function ($servicio) {
            $user = $servicio->user;
        });
        return response($servicios->jsonSerialize(), Response::HTTP_OK);
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
            $servicio->imagen = 'defaultService.jpg';
        }
        $servicio->id_empresa = Auth::user()->id_usuario;
        $servicio->slug = Str::slug( $servicio->nombre . ' ' . Auth::user()->id_usuario );
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
        return view('catalogo.servicios.edit',compact('servicio'));
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
        $servicio->fill($request->except('imagen', 'slug'));
        if ($request->hasFile('imagen')) {
            Storage::delete("public/catalogos_img/{$servicio->imagen}");
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
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $servicio = Servicios::where('slug', $slug)->delete();
        return redirect()->route('catalogo.index');
    }

    /**
     * Redirigir al formulario para contactar
     * @method contact
     * @param  Servicios $servicio
     * @return view
     */
    public function contact(Servicios $servicio) {
        return view('catalogo.servicios.contact', compact('servicio'));
    }

    /**
     * Enviar correo de orden de servicio
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
