<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function constructCadMaterial(){
        return View('cadastroMaterial', ['usuario' => \Session::get('usuario')]);
    }

    public function constructSoliMatrerial(){
        $materiais = DB::table('materiais')->select('*')->where('situacaoMaterial', '!=', 'solicitado')->get();
        return View('solicitacaoMaterial', ['usuario' => \Session::get('usuario'), 'materiais' => $materiais]);
    }

}

