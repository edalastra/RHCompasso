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

    <div id="selecionaPagina">

    <main>
        <h1 class="h1-principal">Boa tarde, <strong class="sublinhe"><?= $funcionario['SOLICITANTE']?></strong></h1>
		<p>Já estão disponíveis os acessos do novo(a) colaborador(a) <strong class ="sublinhe"><?= $nome['NOME']?></strong> que iniciará as suas atividades, na Compasso, em <strong class="sublinhe"><?= $funcionario['DATA_ADMISSAO']?>.</strong>
        </p>
        <div>
            <h2>KAIROS</h2>
            <p>Login: <strong class="sublinhe"><?= $dados['KAIROS_CADASTRO_USUARIO']?></strong></p>
            <p>Senha: <strong class="sublinhe"><?= $dados['KAIROS_CADASTRO_SENHA']?></strong></p>
        </div>
        <div>
            <h2>INTRANET</h2>
            <p>Login: <strong class="sublinhe"> <?= $dados['INTRANET_CADASTRO_USUARIO']?></strong></p>
            <p>Senha: <strong class="sublinhe"><?= $dados['INTRANET_CADASTRO_SENHA']?></strong></p>
        </div>
        <div>
            <h2>E-MAIL</h2>
            <p>Login: <strong class="sublinhe"><?= $email['EMAIL_SUP']?></strong></p>
            <p>Senha: <strong class="sublinhe"><?= $email['SENHA']?></strong></p>
        </div>
        <div class="container">
            <p>Recomendamos, que no primeiro acesso, sejam realizadas as trocas das senhas</p>
        </div>
    </main>
    <footer>
      <table>
    <tr>
<th>  <img id="img1"src="../img/compasso.jpg" alt="some text" align="left"> </th>
<th id="info" align="left">
<div class="txt1"id="align_info">
<p><a id="cor0"> Equipe Contratações</a> </p>
<p>  Compasso | Navigating Oracle Technologies </p>
<p> +55 51 21086689 | Porto Alegre (RS) – Brasil </p>
<p> <a href=”www.compasso.com.br” id="cores">www.compasso.com.br</a> | <a href=”viviane.azevedo@compasso.com.br” id="cores">viviane.azevedo@compasso.com.br</a> </p>
</div>
</th>
</tr>
<tr>
  <td>
  <div id="align_img">
  <img id="img2"src="../img/compasso2.jpg" alt="some text">
  </div>
</td>
</tr>
</table>
    <div class="txt2">

      <div>
      <p id="tamanho">FACILITE A COMUNICAÇÃO ENVIE SEU EMAIL PARA O ALIAS CORRETO </p>
      </div>

      <div>
      <p id="tamanho2"><a id="cor"> @rh:</a> email geral do departamento, referência para o time e rescisões.</p>
      </div>
      <p id="tamanho2"><a id="cor">@contratações:</a> concentra as contratações CLT, Estagiários/Bolsistas desde a proposta até a conclusão do processo de admissão/contrato e rescisões.</p>
      <div>
      </div>
      <p id="tamanho2"><a id="cor">@benefícios:</a> Vale transporte, vale refeição e vale alimentação, planos de saúde e planos odontológicos.</p>
      <div>
      </div>
      <p id="tamanho2"><a id="cor">@férias:</a> agendamento e cancelamento de férias.</p>
      <div>
      </div>
      <p id="tamanho2"><a id="cor">@folha:</a> Assuntos sobre folha de pagamento, comprovante auxílio creche, horas extras, contracheque, dissídio, licenças, ajustes/reajustes/transferências</p>
      <div>
      </div>
      <p id="tamanho2"><a id="cor">@jornadas:</a> Análise de jornadas, ponto eletrônico, registro de atividades, atestados/ausências/folgas, sobreaviso.</p>
      <div>
      </div>
      <p id="tamanho"><a href=”http://www.compasso.com.br/interno/backoffice.jpg”>http://www.compasso.com.br/interno/backoffice.jpg</a></p>
      <div></div>

</footer>
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
    html2clipboard();
});
*/
</script>

</div>

<?php
  $dom = new DOMDocument();
  $body = $dom->getElementById('selecionaPagina');

?>
<p><?php echo $body;?></p>

<form action="../enviaEmails.php" method="post">
  <input type="hidden" name="id" value="<?php $id ?>">
  <input type="hidden" name="nome" value="<?php $nome ?>">
  <input type="hidden" name="email" value="<?php $email ?>">
  <input type="hidden" name="assunto" value="Acesso Liberado - Compasso">

  <button type="submit">Enviar</button>
</form>
</body>
</html>
