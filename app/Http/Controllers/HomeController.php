<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getServerStatus(Request $request){
        $response = array('serverStatus' => 'Working!');
        return json_encode($response);
    }

    public function constructLogin(){
        return View('login');
    }

    public function constructCadastro(){
        return View('cadastro');
    }

    public function constructDetalhes(){
        return View('detalhes', ['usuario' => \Session::get('usuario')]);
    }

    public function constructHome(){
        return View('home', ['usuario' => \Session::get('usuario')]);
    }

}

