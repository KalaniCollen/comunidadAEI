<?php

namespace App\Services\Auth;
use Illuminate\Support\Facades\Auth;

trait RedirectsUsers
{
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
                  return $this->redirectTo();
              }

              return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
        // if (Auth::check() && Auth()->user()->privilegios_administrador) {
        //     return '/Admin';
        // }
        // if(Auth::check()){
        // return '/home';
        // }
    }
}
