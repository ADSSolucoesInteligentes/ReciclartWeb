@extends('static.static')
@section('content')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
    <link rel="stylesheet" href="./css/customDetalhes.css">
    <form action="">
        <h4>Atualizar Cadastro</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">CPF/CNPJ</label>
                    </div>
                    <div class="input-field col s6">
                        <select class="browser-default">
                            <option value="" disabled selected>Tipo</option>
                            <option value="1">Pessoa fisica</option>
                            <option value="2">Pessoa Juridica</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Ramo</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Cep</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Logradouro</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Numero</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Bairro</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Cidade</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">UF</label>
                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                        <label for="first_name">Retira</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <a class="waves-effect waves-light btn-large">Confirmar</a>
                    </div>
                </div>

            </form>
        </div>
    </form>
@endsection
