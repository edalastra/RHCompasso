<html>
<head>
  <meta charset="utf-8">
  <?php

  // Importa:
  require_once('../validacoes/login/user.php');

  // Captura a id enviada por GET:
  if (isset($_GET['erro']))  {
    $user = $_GET['erro'];
  }
/*
  // Conexão do banco:
  require_once('../db/mySQL.php');

  // Seleciona o usuario igual no banco:
  $consulta = "Select usuario from usuarios where id = $user";
  $executa_query = mysqli_query($link, $consulta);

  // Converte objeto retornado pela msqli_query, em Array:
  $row = mysqli_fetch_assoc($executa_query);

  // Converte um Array em String:
  $string = implode($row);

  // Agnomes:
  $agnomes = ["junior", "jr.", "segundo", "filho", "neto", "sobrinho"];

  // Separa por espaços:
  $array = explode(' ', $string);

  // Atribuir o nome e sobrenome pela primeira posição e ultma posição:
  $nome = $array[0];
  $sobrenome = $array[count($array)-1];

  // Tudo minusculo:
  $nome = strtolower($nome);
  $sobrenome = strtolower($sobrenome);

  // Testa os agnomes:
  $max = count($agnomes);
  for($i = 0; $i < $max; $i++) {
    // Funçaõ para comparar as duas strings:
    if(strcmp($sobrenome, $agnomes[$i]) == 0) {
      // Pega a posição do meio:
      $sobrenome = $array[count($array)-2];
      // Deixa tudo minusculo:
      $sobrenome = strtolower($sobrenome);
      // Se não for agnome:
    } else {
      // Monta o email:
      $email = $nome . ".". $sobrenome."@compasso.com.br";
    }
  }

  // Conta as linhas no banco:
  require_once('../../db/consultaEmeiru.php');

  if ($linhas != 0) {
    // Conecta no branco e procura por email igual, comparação com varíavel precisa de '':
    $c = "Select * from emeiru where email = '$email'";
    $e = mysqli_query($link, $c);

    // Converte objeto retornado pela msqli_query, em Array:
    $r = mysqli_fetch_assoc($e);

    // Converte um Array em String:
    $s = implode((array)$r);

    // Remove o 0 que vem depois da conversão do Array:
    $rest = substr($s, 1);

    // Compara para ver se os emails são iguais:
    $resultado = strcmp($rest, $email);

    // Se os emails forem iguais:
    if($resultado == 0) {
      $conta = 1;
      $emailFinal = $nome . '.' . $sobrenome . "." . $conta . "@compasso.com.br";

      // QUERY do INSERT no Banco de dados:
      $inserir = "Insert emeiru (email) VALUES ('$emailFinal')";
      $executa_query = mysqli_query($link, $inserir);

      // Email sendo diferente dos cadastrados no banco, grava no banco:
    } else {
      // QUERY do INSERT no Banco de dados:
      $inserir = "Insert emeiru (email) VALUES ('$email')";
      $executa_query = mysqli_query($link, $inserir);

    }
    // Se não houverem cadastros no banco, grava direto:
  } else {
    $inserir = "Insert emeiru (email) VALUES ('$email')";
    $executa_query = mysqli_query($link, $inserir);
  }*/

  ?>

</head>
<body>
  <form method="post" action="./user/sair.php">
    <label> Olá, <?php echo $usuário ?>! <br>
      <button type="submit" id="sair"> Sair </button>
    </form>
  </body>
  </html>
