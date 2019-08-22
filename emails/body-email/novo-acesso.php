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
<html>
<head>
<button id="foo">Copy</button>
    <meta charset="utf-8" />
    <title>Novo Acesso</title>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/seleciona.js"></script>
    <link rel="stylesheet" href="../css/site.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <link rel="stylesheet" href="../css/novo_acesso.css">
</head>
<body>
<div id="BoxForm">
  <form action="../enviaEmails.php" method="post" enctype="multipart/form-data" id="formulario">
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
        <h1 class='h1-principal'>Suporte</h1>
		<p id='seg'>Seguem as informações para criação de usuário:
		</p>
        <div class='container' >
            <table border='1' >
                <tr id='table'>
                    <th id='camp' >Nome</th>
                    <th id='camp'>Login</th>
                    <th id='camp'>Grupos</th>
                    <th id='camp'>Data de início</th>
                    <th id='camp'>E-mail</th>
                </tr>
                <tr id='table01'>
                    <td><Strong class='sublinhe'><?=$nome['NOME']?></Strong></td>
                    <td><strong class='sublinhe'><?=$dados['INTRANET_CADASTRO_USUARIO']?></strong></td>
                    <td>Desenvolvimento, Equipe CLT, Interno, Equipe SP<strong>(RH ajusta manual)</strong></td>
                    <td><strong class='sublinhe'><?= $dataAdmissao ?></strong></td>
                    <td><strong class='sublinhe'><?=$email['EMAIL_SUP']?></strong></td>
                </tr>

            </table>
                <p><u>Senha de acesso e confirmação de ativação devem ser atualizadas no sistema.</u></p>
        </div>
    </main>
    
</div>
</div>
<input type="hidden" name="body" id="inputBody" value="">


</form>
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
$( "#olho" ).mouseout(function() {
  $("#senha").attr("type", "password");
});</script>
</html>
