<?php

namespace ComunidadAEI\Http\Controllers;

use Illuminate\Http\Request;
use ComunidadAEI\User;
use ComunidadAEI\Perfil_Usuario;
use ComunidadAEI\Perfil_Empresa;
use Redirect;
use ComunidadAEI\Http\Requests\RegistroRequest;
use ComunidadAEI\Http\Requests\Perfilrequest;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Config;

class UserController extends Controller
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
    public function activates($code)
    {
        $user = User::where('confirmation_code', $code)->first();
        $user->status = 1;
        $user->save();
        if ($user->tipo_usuario == "asociado") {
            return view('auth.date_complete')->with('user', $user);
        }
        return redirect('login')->with('info','¡Cuenta activada satisfactoriamente!');
    }
    public function activate($code)
    {
        $user = User::where('confirmation_code', $code)->first();
        $user->status = 1;
        $user->save();
        $empresa=Perfil_Empresa::where('id_usuario',$user->id_usuario)->first();
        // if ($user->tipo_usuario == "asociado") {
        //     return view('auth.date_complete')->with('user', $user);
        // }
            $dates= array('name' => $user->name,
            'apellido_paterno'=>$user->apellido_paterno,
            'apellido_materno'=>$user->apellido_materno,
            'email'=>$user->email,
            'empresa'=>$empresa->nombre_empresa,);
$mail= Config::get('mail.from.address');

        $this->Email($dates,$mail,$user->email);
        return view('solicitud_response')->with('user',$user);
    }
    function Email($dates,$mail,$email){
          Mail::send('emails.plantilla2',$dates,function($message) use ($email,$mail){
            $message->subject('Bienvenido a AEI');
            $message->to($mail);
            $message->from($email);
          });
        }
    public function complete(RegistroRequest $request, $id_usuario)
    {

        $user = User::find($id_usuario);
        if($user->tipo_usuario=="Asociado"){
            $user->password=bcrypt($request->password);
        }
        $user->status=true; //true
        $user->save();
        return redirect::to('/login');
    }




    /**
     * Show the form for creating a new resource.
     *9
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }



    /**

     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id_usuario)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
