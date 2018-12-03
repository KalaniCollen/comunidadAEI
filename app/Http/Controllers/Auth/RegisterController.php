<?php

namespace ComunidadAEI\Http\Controllers\Auth;

use ComunidadAEI\User;
use ComunidadAEI\Perfil_Usuario;
use ComunidadAEI\Perfil_Empresa;
use ComunidadAEI\Biografia;
use ComunidadAEI\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use ComunidadAEI\Services\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str as Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/respuesta';

    /**
    * Create a new controller
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \ComunidadAEI\User
    */
    protected function create(array $data)
    {
        DB::transaction(function()
        {
            $code = str_random(25);
            $email = Input::get('email');
            $nombre = Input::get('name');
            $data['name'] = 'usuario';
            $dates = array('code'=>$code);
            $this->Email($dates,$email);
            $user=User::create([
                'name' => Str::upper($nombre),
                'apellido_paterno'=> Str::upper(Input::get('apellido_paterno')),
                'apellido_materno'=> Str::upper(Input::get('apellido_materno')),
                'email' => Input::get('email'),
                'password' => bcrypt(Input::get('password')),
                'confirmation_code'=>$code,
                'notificacion_correo' => Input::get('notificacion_correo'),
            ]);
            $useru = User::where('id_usuario',$user->id_usuario)->first();
            $useru->slug_usuario = Str::slug( Str::upper($nombre).' '.Str::upper(Input::get('apellido_paterno')).
            ' '.Str::upper(Input::get('apellido_materno')).' '.$user->id_usuario);
            $useru->slug_empresa = Str::slug( Str::upper($nombre).' '.Str::upper(Input::get('apellido_paterno')).
            ' '.Str::upper(Input::get('apellido_materno')).' '.$user->id_usuario);
            $useru->save();
            $mensaje='El punto de partida de todo logro es el deseo...';
            Perfil_Usuario::create([
                'fecha_nacimiento' => Input::get('fecha_nacimiento'),
                'id_usuario' => $user->id_usuario,
                'sexo' => Str::upper(Input::get('sexo')),
                'slug_usuario' => $useru->slug_usuario,

            ]);

            return Perfil_Empresa::create([
                'id_usuario'=>$user->id_usuario,
                'nombre_empresa'=>Str::upper(Input::get('nombre_empresa')),
                'mis_logros'=>$mensaje,
                'slug_empresa'=> Str::slug(Str::upper(Input::get('nombre_empresa')).' '.$useru->id_usuario),
                        // 'slug_empresa'=> $useru->slug_empresa,
            ]);
        });
        return view('auth.register');
    }
    function Email($dates,$email){
        Mail::send('emails.plantilla',$dates,function($message) use ($email){
            $message->subject('Bienvenido a AEI');
            $message->to($email);
            $message->from('kalanicollen1410@gmail.com','AEI');
        });
    }

}
