<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/customLogin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="ja/jquery-3.60.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <title>ReciclArt</title>
</head>
<body>
    <div class="contentLeft">
        <div class="head">
            <img id="logo" src="./img/logoReciclart.png" alt="">
            <img id="logoE" src="./img/reciclart.png" alt="">
        </div>

        <div class="content">
            <div class="form">
                <h4>Bem vindo(a) a ReciclArt</h4>
                <h3>Login</h3>
                <form id="formLogin" action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mail_outline</i>
                                    <input type="text" id="email-input" name="email" class="autocomplete">
                                    <label for="email-input">Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">lock_outline</i>
                                    <input type="password" id="password-input" name="senha" class="autocomplete">
                                    <label for="password-input">Senha</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>
                        <label>
                            <input name="lembrar" type="checkbox" />
                            <span>Lembre-me</span>
                        </label>
                        <a class="right" href="">Esqueceu sua senha?</a>
                    </p>
                </form>
                <p class="center"><a onclick="sendForm('formLogin')" class="waves-effect waves-light btn" id="buttonLogin">Login</a></p>
                <p class="clear center">Ainda não tem conta? <a href="">Cadastre-se</a> </p>
            </div>
            <footer>
                <p>
                    Copyright © 2021 Reciclarte Todos os Direitos Reservados.
                    <a href="">Termos e politica</a>
                </p>
            </footer>
        </div>

    </div>
    <div class="contentRight">

    </div>
    <script type="text/javascript">
        function sendForm(id){
            document.getElementById(id).submit();
        }
    </script>
</body>
</html>
