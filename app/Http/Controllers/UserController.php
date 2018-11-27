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
    public function activate($code)
        {
        $users = User::where('confirmation_code',$code);
        $exist = $users->count();
        $user = $users->first();
        if($exist==1 and $user->status==0)
        {
          if($user->tipo_usuario=="asociado"){

              return view('auth.date_complete')->with('user',$user);
          }
          else{
            $user->status=1;
            $user->save();
              return view('auth.login')->with('info', 'Tu cuenta ha sido activada');
          }
        }
        else{
          return redirect::to('/');
        }

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
    public function update(Request $request, $id)
    {
        //
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
