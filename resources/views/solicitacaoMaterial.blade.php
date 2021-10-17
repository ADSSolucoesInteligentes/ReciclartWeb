@extends('static.static')
@section('content')
    <link rel="stylesheet" href="./css/customDetalhes.css">
    <form action="">
        <h4>Procurar material</h4>
        <div class="row">
            <div class="input-field col s12">
                <input id="text" type="text" class="validate">
                <label for="text">Material</label>
            </div>
        </div>
        <a class="waves-effect waves-light btn-large">Buscar</a>
    </form>
@endsection
