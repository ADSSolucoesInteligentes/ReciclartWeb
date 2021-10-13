<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/customStatic.css">
    <script src="ja/jquery-3.60.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <title>ReciclArt</title>
</head>
<body>
<nav id="navBar">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">
          <img id="imgLogo" src="./img/logoReciclart.png" alt="">
      </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="">Home</a></li>
        <li><a href="">Sobre nós</a></li>
        <li><a href="{{route('cadastro')}}">Criar conta</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
      </ul>
    </div>
</nav>
@yield('content')
</body>
</html>
