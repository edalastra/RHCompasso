<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/login.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <title> Login do Usuário </title>
</head>
<body>
  <div class="centraliza">
    <form class="centro" action="cadastrando.php" method="POST">
      <div class="t">        
        <label class="user"> Usuário: </label>
        <input type="text" class="usuario" name="usuario" id="usuario" autofocus>
        <label class="user"> Senha: </label>
        <input class="pw" type="password" name="senha" id="senha">
        <div class="oculto" id="oculto" hidden> Usuário e/ou Senha inválidos! </div>
        <button class="butao" type="submit" id="entrar"> Cadastrar </button>
      </div>
    </form>
  </div>
</body>
</html>