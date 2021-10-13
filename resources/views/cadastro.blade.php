@extends('static.static')
@section('content')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <div class="content">
        <link rel="stylesheet" href="./css/customCadastro.css">
        <div class="identeLogo">
            <img src="./img/logoReciclart.png" alt="">
        </div>
        <div class="cadastroForm">
            <div class="titulo">
                <h4>CADASTRO</h4>
            </div>
            <form style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;" id="formCadastro" action="{{route('cadastro')}}" method="POST">
                @csrf
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">assignment_ind</i>
                            <input type="text" name="nome" id="autocomplete-input" required class="autocomplete">
                            <label for="autocomplete-input">Nome</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">contact_mail</i>
                            <input type="email" name="email" id="Email-input" required class="autocomplete">
                            <label for="Email-input">Email</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input type="password" name="senha" id="senha-input" required class="autocomplete">
                            <label for="senha-input">Senha</label>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <br>
            <a onclick="sendForm('formCadastro')" class="waves-effect waves-light btn-large">SOLICITAR CONTATO</a><br><br>
        </div>
    </div>
    <footer>
        <p>Copyright © 2021 Reciclarte Todos os Direitos Reservados. <a href="">Termos e Política</a></p>
    </footer>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems, options);
        });

        // Or with jQuery

        $(document).ready(function(){
            $('select').formSelect();
        });

        function sendForm(id){
            document.getElementById('formCadastro').submit();
        }
    </script>
@endsection
