<?php
include('../../db/conexao.php');
    include('../../update.php');
    $id=$_GET['id'];
    $nome = buscaFuncionarios($conn, $id);
    $funcionario = buscaFuncionarios($conn, $id);
    $dados = buscainterno($conn, $id);
    $email = buscasuporte($conn, $id);

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
    <input type="text" name="de" class="campos01" value=""><br>
    </li>
    <li class="alias">
    <label for="como">Como:</label>
    <input type="text" name="como" class="campos01" value="" placeholder="rh@compasso.com.br"><br>
    <span style="color:red"><b>Preencha caso queira enviar como Alias</b></span><br>
    </li>    
    <li>
    <label for="de">Senha:</label>
    <input type="password" name="senha" class="campos01" value=""><br>
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
                    <td><strong class='sublinhe'><?=$funcionario['DATA_ADMISSAO']?></strong></td>
                    <td><strong class='sublinhe'><?=$email['EMAIL_SUP']?></strong></td>
                </tr>

            </table>
                <p><u>Senha de acesso e confirmação de ativação devem ser atualizadas no sistema.</u></p>
        </div>
    </main>
    <footer>
      <table>
    <tr>
<th>  <img id='img1'src='../img/compasso.jpg' alt='compasso' align='left'> </th>
<th id='info' align='left'>
<div class='txt1'id='align_info'>
<p><a id='cor'> Equipe Contratações</a> </p>
<p>  Compasso | Navigating Oracle Technologies </p>
<p> +55 51 21086689 | Porto Alegre (RS) – Brasil </p>
<p> <a href=”www.compasso.com.br” id='cores'>www.compasso.com.br</a> | <a href=”viviane.azevedo@compasso.com.br” id='cores'>viviane.azevedo@compasso.com.br</a> </p>
</div>
</th>
</tr>
<tr>
  <td>
  <div id='align_img'>
  <img id='img2'src='../img/compasso2.jpg' alt='compasso2'>
  </div>
</td>
</tr>
</table>
    <div class='txt2'>
      <p id='tamanho'>FACILITE A COMUNICAÇÃO ENVIE SEU EMAIL PARA O ALIAS CORRETO </p>
      <p id='tamanho2'><a id='cor'> @rh:</a> email geral do departamento, referência para o time e rescisões.</p>
      <p id='tamanho2'><a id='cor'>@contratações:</a> concentra as contratações CLT, Estagiários/Bolsistas desde a proposta até a conclusão do processo de admissão/contrato e rescisões.</p>
      <p id='tamanho2'><a id='cor'>@benefícios:</a> Vale transporte, vale refeição e vale alimentação, planos de saúde e planos odontológicos.</p>
      <p id='tamanho2'><a id='cor'>@férias:</a> agendamento e cancelamento de férias.</p>
      <p id='tamanho2'><a id='cor'>@folha:</a> Assuntos sobre folha de pagamento, comprovante auxílio creche, horas extras, contracheque, dissídio, licenças, ajustes/reajustes/transferências</p>
      <p id='tamanho2'><a id='cor'>@jornadas:</a> Análise de jornadas, ponto eletrônico, registro de atividades, atestados/ausências/folgas, sobreaviso.</p>
      <p id='tamanho'><a href='http://www.compasso.com.br/interno/backoffice.jpg'>http://www.compasso.com.br/interno/backoffice.jpg</a></p>
    </div>
</footer>
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
</html>
