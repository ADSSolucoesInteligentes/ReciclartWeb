@extends('static.static')
@section('content')
<link rel="stylesheet" href="./css/customDetalhes.css">
<form action="">
    <div class="row">
        <div class="input-field col s12">
            <h3>Cadastrar Material</h3>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="tipo" type="text" class="validate">
            <label for="tipo">Tipo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="quantidade" type="number" class="validate">
            <label for="quantidade">Quantidade</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="situacao" type="text" class="validate">
            <label for="situacao">Situação do material</label>
        </div>
    </div>
    <a class="waves-effect waves-light btn-large">Cadastrar</a>
</form>
@endsection