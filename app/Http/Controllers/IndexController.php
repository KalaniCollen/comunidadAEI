<?php

namespace App\Http\Controllers;

use App\Mail\ContactoAfiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Enviar correo de solicitud para afiliarse a AEI
     * @method sendMail
     * @param  Request  $request [description]
     * @return [type]            [description]
     */
    public function sendMail(Request $request) {
        Mail::send('emails.afiliate', [
            "solicitante" => $request->nombre,
            "telefono" => $request->telefono,
            "empresa" => $request->empresa,
            "correo" => $request->correo,
            "mensaje" => $request->mensaje
        ], function ($message) use ($request) {
            $message->from($request->correo, $request->nombre);
            $message->sender($request->correo, $request->nombre);
            $message->to('kalanicollen1410@gmail.com', 'Kalani Collen');
            $message->subject('Solicitud Afiliación');
        });
        return redirect()->back();
    }
}
