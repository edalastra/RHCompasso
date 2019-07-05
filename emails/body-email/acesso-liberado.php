<?php
  require_once('../../validacoes/email/email.php');
  include('../../db/conexao.php');
  include('../../update.php');
  $id=$_GET['id'];
  $nome = buscaFuncionarios($conn, $id);
  $funcionario = buscaFuncionarios($conn, $id);
  $dados = buscainterno($conn, $id);
  $email = buscasuporte($conn, $id);
  $dataAdmissao = DateTime::createFromFormat('Y-m-d', $funcionario['DATA_ADMISSAO'])->format('d/m/Y');
?>
<!DOCTYPE html>

<html >

<head>
  <button id="foo">Copy</button>
  <meta charset="utf-8" />
  <title>Acesso</title>
  <script src="../../js/jquery.js"></script>
  <script src="../../js/seleciona.js"></script>
  <link rel="stylesheet" href="../css/site.css">
  <link rel="stylesheet" href="../css/acesso-lberado.css">
  <link rel="stylesheet" href="../css/rodape.css">
</head>

<body >
  <form action="../enviaEmails.php" method="post" enctype="multipart/form-data" id="formulario">
    <div id="BoxForm">
    
      <ul>
        <input type="hidden" name="id" value="<?=$id; ?>">
        <input type="hidden" name="nome" class="campos01" value="<?=$nome['NOME']; ?>">
      <ul>
        <input type="hidden" name="id" value="<?=$id; ?>">
        <input type="hidden" name="nome" class="campos01" value="<?=$nome['NOME']; ?>">
      <li>
        <label for="de">De:</label>
        <input type="text" name="de" class="campos01" value="<?=$InfoUser[0]['mail'][0];?>"><br>
      </li>
      <li>
      <label for="como">Como:</label>
      <select type="text" name="como" class="campos01" value="">
      <option value="" selected="selected" class="campos01"></option>
      <option value="contratacoes@compasso.com.br" class="campos01">contratacoes@compasso.com.br</option>
      <option value="rh@compasso.com.br" class="campos01">rh@compasso.com.br</option>
      </select><br>
      <span style="color:red"><b>Selecione caso queira enviar como Alias</b></span><br>
      </li>
      <li class="senha">
      <label for="de">Senha:</label>
      <p><input type="password" id="senha" name="senha" class="campos01" value="">
      <span id="olho"/><img src='../img/olho.png' class="show"></p>
      </li>
        <li>
      <label for="email">Para:</label>
      <input type="email" name="email" class="campos01" value="<?=$nome['EMAIL']; ?>"><br>
      </li>
      <li>
      <label for="assunto">Assunto:</label>
      <input type="text" name="assunto" class="campos01" value=""><br>
      </li>

      <li>
      <label for="">Anexos:</label>
      <input type="file" multiple="multiple" class="campos01" name="arquivo[]"/>
      </li>
      <li>
      <button type="submit" id="enviar" class="button3">Enviar</button>
      </li>
      </ul>
  </div>
  <div contenteditable="true" id="bodyEmail" style="border: solid 0.5px black; padding:1%; margin-top: 20px">
    <div id="selecionaPagina">
      <main>
          <h1 class='h1-principal'>Boa tarde, <strong class='sublinhe'><?=$funcionario['SOLICITANTE']?></strong></h1>
      <p>Já estão disponíveis os acessos do novo(a) colaborador(a) <strong class ='sublinhe'><?=$nome['NOME']?></strong> que iniciará as suas atividades, na Compasso, em <strong class='sublinhe'><?= $dataAdmissao ?></strong>
          </p>
          <div>
              <h2>KAIROS</h2>
              <p>Login: <strong class='sublinhe'><?=$dados['KAIROS_CADASTRO_USUARIO']?></strong></p>
              <p>Senha: <strong class='sublinhe'><?=$dados['KAIROS_CADASTRO_SENHA']?></strong></p>
          </div>
          <div>
              <h2>INTRANET</h2>
              <p>Login: <strong class='sublinhe'><?=$dados['INTRANET_CADASTRO_USUARIO']?></strong></p>
              <p>Senha: <strong class='sublinhe'><?=$dados['INTRANET_CADASTRO_SENHA']?></strong></p>
          </div>
          <div>
              <h2>E-MAIL</h2>
              <p>Login: <strong class='sublinhe'><?=$email['EMAIL_SUP']?></strong></p>
              <p>Senha: <strong class='sublinhe'><?=$email['SENHA']?></strong></p>
          </div>
          <div class='container'>
              <p>Recomendamos, que no primeiro acesso, sejam realizadas as trocas das senhas</p>
          </div>
      </main>
      
    </div>
  </div>
  <input type="hidden" name="body" id="inputBody" value="">


  </form>
  <script>
  /*
  function html2clipboard(html, el) {
      var tmpEl;
      if (typeof el !== "undefined") {
          // you may want some specific styling for your content - then provide a custom DOM node with classes, inline styles or whatever you want
          tmpEl = el;
      } else {
          // else we'll just create one
          tmpEl = document.createElement("div");

          // since we remove the element immedeately we'd actually not have to style it - but IE 11 prompts us to confirm the clipboard interaction and until you click the confirm button, the element would show. so: still extra stuff for IE, as usual.
          tmpEl.style.opacity = 0;
          tmpEl.style.position = "absolute";
          tmpEl.style.pointerEvents = "none";
          tmpEl.style.zIndex = -1;
      }

      // fill it with your HTML
      tmpEl.innerHTML = html;

      // append the temporary node to the DOM
      document.body.appendChild(tmpEl);

      // select the newly added node
      var range = document.createRange();
      range.selectNode(tmpEl);
      window.getSelection().addRange(range);

      // copy
      document.execCommand("copy");

      // and remove the element immediately
      document.body.removeChild(tmpEl);
  }

  document.getElementById("foo").addEventListener("click", function () {
      html2cli"pboard();
  });"
  */
  </script>
</body>
<script type="text/javascript" src="../js/enviarEmail.js"></script>
<script type="text/javascript">
  $("#enviar").on("click", function() {
    let divBody = document.getElementById("bodyEmail");
    let divInput = $("#inputBody");
    divInput.val(divBody.innerHTML);
});
</script>
<script>
var senha = $('#senha');
var olho= $("#olho");

olho.mousedown(function() {
  senha.attr("type", "text");
});

olho.mouseup(function() {
  senha.attr("type", "password");
});
// para evitar o problema de arrastar a imagem e a senha continuar exposta,
//citada pelo nosso amigo nos comentários
$( "#olho" ).mouseout(function() {
  $("#senha").attr("type", "password");
});</script>
</html>
