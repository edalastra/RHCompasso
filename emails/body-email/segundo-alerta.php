<?php
    include('../../db/conexao.php');
    include('../../update.php');
    $id=$_GET['id'];
    $nome = buscaFuncionarios($conn, $id);
    $data = buscaFuncionarios($conn, $id);
    $funcionario = buscaFuncionarios($conn, $id);
    $sede = buscaSedeFuncionario($conn, $funcionario["ID_SEDE"]);

    $dataN = $data['DATA_ADMISSAO'];
    $dataF = date_create($dataN);
    date_modify( $dataF, '+ 90 day');
    $NewDate =  date_format($dataF, 'd-m-y');
    $DataG = date_create();
    date_modify($DataG, '+ 2 day');
    $DataFim = date_format($DataG, 'd-m-y');

?>
<!DOCTYPE html>
<html>
<head>
<button id="foo">Copy</button>
    <meta charset="utf-8" />
    <title>Alerta</title>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/seleciona.js"></script>
    <link rel="stylesheet" href="../css/site.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <link rel="stylesheet" href="../css/alert.css">

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
    <li>
    <label for="como">Como:</label>
    <input type="text" name="como" class="campos01" value=""><br>
    </li>
    <label for="de">De:</label>
    <input type="text" name="de" class="campos01" value=""><br>
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
    <div id="selecionaPagina" >

    <main>
        <p>Bom dia, <strong class = 'sublinhe'><?=$funcionario['SOLICITANTE']?></strong></p>
		<p>O funcionário(a) abaixo terá sua <strong>2ª fase</strong> do contrato de experiência expirada em <strong class='sublinhe'><?= $NewDate ?>,</strong> conforme tabela abaixo:
		</p>
        <div class='container'>
            <table border='1'>

                <tr id='table'>
                    <th id='res'>Nome Coloaborador(a)</th>
                    <th id='res'>Empresa/Filial</th>
                    <th id='res'>Cargo</th>
                    <th id='res'>Data Admissão</th>
                    <th id='res'>Vcto.contrato 90dd</th>
                </tr>

                <tr id='table01'>
                    <td><strong class='sublinhe'><?=$funcionario['NOME']?></strong></td>
                    <td><strong class='sublinhe'><?=$sede['nome_sede']?></strong></td>
                    <td><strong class='sublinhe'><?=$funcionario['CARGO']?></strong></td>
                    <td><strong class='sublinhe'><?=$funcionario['DATA_ADMISSAO']?></strong></td>
                    <td><strong class='sublinhe'><?= $NewDate ?></strong></td>
                </tr>

            </table>
                <p>Por gentileza, caso deseje encerrar o contrato de trabalho, dentro do prazo, informar ao RH impreterivelmente até o dia <strong class = 'sublinhe'><font color='red'><?= $DataFim ?></font></strong>  para que os documentos de rescisão e pagamento sejam providenciados.</p>
                <p>Caso não sejamos informados, o contrato será renovado por tempo indeterminado e a rescisão por parte da empresa terá a incidência de encargos e indenizações cabíveis.</p>
                <p>Desde já agradecemos a colaboração.</p>
        </div>
    </main>
    <footer>
      <table>
    <tr>
<th>  <img id='img1'src='../img/compasso.jpg' alt='compasso' align='left'> </th>
<th id='info' align='left'>
<div class='txt1'id='align_info'>
<p><a id='cor0'> Equipe Contratações</a> </p>
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
