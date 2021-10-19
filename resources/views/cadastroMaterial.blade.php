@extends('static.static')
@section('content')
<link rel="stylesheet" href="./css/customDetalhes.css">
<form id='form' action="/postMaterial" method="post">
    @csrf
    <div class="row">
        <div class="input-field col s12">
            <h3>Cadastrar Material</h3>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="tipo" type="text" name="tipo" class="validate">
            <label for="tipo">Tipo</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="quantidade" type="number" name="quantidade" class="validate">
            <label for="quantidade">Quantidade</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="situacao" type="text" name="situacaoMaterial" class="validate">
            <label for="situacao">Situação do material</label>
        </div>
    </div>
    <a class="waves-effect waves-light btn-large" onclick="sendMaterial()">Cadastrar</a>
</form>

<script src="./js/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
    function sendMaterial(){
        //document.getElementById('form').submit();
        $.ajax({
            url: "/postMaterial",
            type: "POST",
            data: $('#form').serialize(),
            dataType: 'text',
        
            beforeSend : function(){

            },
            success : function(response){
                console.log(response);
            },
            error : function(a,b,c){
                console.log(b);
                console.log('Erro: ' + a['status'] + ' ' + c);
            }
        });
    }
</script>
@endsection