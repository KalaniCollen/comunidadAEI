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
use ComunidadAEI\Mail\RegisterUser;

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
        $code = str_random(25);

        $user = User::create([
            'name' => strtoupper($data['name']),
            'apellido_paterno' => strtoupper($data['apellido_paterno']),
            'apellido_materno' => strtoupper($data['apellido_materno']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'notificacion_correo' => isset($data['notificacion_correo']) ? 1 : 0,
            'confirmation_code' => $code,
            $this->sendEmail($code, $data['email'])
        ]);

        $slugUsuario = str_slug("{$data['name']} {$data['apellido_paterno']} {$data['apellido_materno']} {$user->id_usuario}");

        Perfil_Usuario::create([
            'fecha_nacimiento' => $data['fecha_nacimiento'],
            'sexo' => $data['sexo'],
            'id_usuario' => $user->id_usuario,
            'slug_usuario' => $slugUsuario
        ]);

        Perfil_Empresa::create([
            'id_usuario' => $user->id_usuario,
            'slug_empresa' => "empresa-{$user->id_usuario}"
        ]);
        return view('auth.register');
    }

    function sendEmail($code, $email) {
        Mail::to($email)->send(new RegisterUser($code));
    }

}
