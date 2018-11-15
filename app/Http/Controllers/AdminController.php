<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('Admin');
    }
    //
    public function index(){
        $Admin = User::where('id_usuario', Auth::id())->first();
        return view('Admin.Index')->with('Admin', $Admin);
    }
}
