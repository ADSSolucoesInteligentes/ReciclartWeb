@extends('static.static')
@section('content')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <link rel="stylesheet" href="./css/customDetalhes.css">
    <form id="form" action="">
        @csrf
        <h4>Atualizar Cadastro</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="cpfCnpj" type="text" class="validate">
                        <label for="first_name">CPF/CNPJ</label>
                    </div>
                    <div class="input-field col s6">
                        <select class="browser-default" name="pessoa">
                            <option value="" disabled selected>Tipo</option>
                            <option value="1">Pessoa fisica</option>
                            <option value="2">Pessoa Juridica</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="ramo" type="text" class="validate">
                        <label for="first_name">Ramo</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" type="text" name="cep" class="validate">
                        <label for="first_name">Cep</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="logradouro" type="text" class="validate">
                        <label for="first_name">Logradouro</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="numero" type="text" class="validate">
                        <label for="first_name">Numero</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="bairro" type="text" class="validate">
                        <label for="first_name">Bairro</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="cidade" type="text" class="validate">
                        <label for="first_name">Cidade</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="" id="first_name" name="uf" type="text" class="validate">
                        <label for="first_name">UF</label>
                    </div>
                    <div class="input-field col s6">
                        <select class="browser-default" name="retira">
                            <option value="" disabled selected>Retira</option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light btn-large" onclick="sendMaterial()">Confirmar</a>
                    </div>
                </div>

            </form>
        </div>
    </form>

    <script type="text/javascript">
        function sendMaterial(){
            $.ajax({
                url: "/upPessoa",
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
