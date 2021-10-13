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

}

