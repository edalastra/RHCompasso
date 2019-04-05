<?php
    include('../../db/conexao.php');
    include('../../update.php');
    $id=$_GET['id'];
    $nome = buscaFuncionarios($conn, $id);
    $data = buscadocs($conn, $id);

    $dataN = $data['FORMULARIOS_ENVIADOS'];
    $dataF = date_create($dataN);
    date_modify( $dataF, '+ 1 day');
    $NewDate =  date_format($dataF, 'd-m-y');

?>
<!DOCTYPE html>
<html>

<head>
<button id="foo">Copy</button>
    <meta charset="utf-8">
    <script src="../../js/jquery.js"></script>
    <script src="../../js/seleciona.js"></script>
    <link rel = "stylesheet" href = "../css/site.css">
    <link rel="stylesheet" href="../css/admissao.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <title>Admissão CWB</title>
</head>
<body>
    <div id="selecionaPagina">
    <?php 
    $body = "
    <header>
        <p id='title'>Boa tarde, <strong class='sublinhe'>".$nome['NOME']."</strong></p>
        <p><strong class='cor'>Seja bem vindo ao time!!</strong></p>
        <p id='title'>Por gentileza, preencha e nos devolva através deste e-mail os formulários, em anexo <strong class='sublinhe'><font color='red'>".$NewDate.", às 12h</font></strong> , conforme especificações abaixo:</p>
    </header>

    <table id='tabela01' border='2'>
    <tr>
        <th class='info' id='info1'>DOCUMENTOS</th>
        <th class='info' id='info2'>ENVIAR POR E-MAIL Documentos obrigatórios</th>
        <th class='info' id='info3'>ENVIAR VIAS IMPRESSAS</th>
        <th class='info' id='info4'>ORIENTAÇÕES ADICIONAIS</th>
    </tr>
    <tr>
        <td id='form1'>Ficha cadastro de funcionários</td>
        <td>Excel</td>
        <td>NÃO</td>
        <td></td>
    </tr>
    <tr>
        <td id='form2'>Informações de Qualificação</td>
        <td>.pdf</td>
        <td>NÃO</td>
        <td></td>
    </tr>
    <tr>
        <td id='form3'>Declaração de funcionários ORACLE</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>O documento deverá ser assinado.</td>
    </tr>
    <tr>
        <td id='form4'>Adesão e Benefícios</td>
        <td>Excel</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>O documento deverá ser assinado.

            Termo Allianz - Formulário inclusão 2018 - Somente para funcionários alocados em São Paulo/SP.
        </td>
    </tr>
    <tr>
        <td id= 'form5'>Cadastro de funcionário</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>  <p><strong>Este formulário é para seu cadastro em nosso sistema financeiro para fins de depósito como <u>adiantamentos e reembolsos de despesas,</u> entre outros que <u>não sejam relacionados à folha de pagamento.</u></strong></p>

            <p>Ao preencher o campo CPF, por favor, coloque com pontos conforme modelo xxx.xxx.xxx-xx.</p>

            <P>Caso já tenha aberto sua conta no Itaú e a mesma seja modalidade Conta Corrente poderá ser utilizada para estes tipos de depósito, mas caso tenha aberto uma conta SALÁRIO, não poderá utilizá-la para este fim, deste modo, por favor, informar o banco e os dados onde possui sua conta corrente, ok?</p>

            <p>É necessário enviar também um comprovante dos dados bancários (pode ser um print da tela do banco no qual conste a Agência e Conta ou foto do cartão). Sinalizar qual a modalidade de sua conta: Salário ou C/C.</p>
        </td>
    </tr>
    <tr>
        <td id='form6'>Termo Opcão contribuição sindical</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td> O documento deverá ser assinado.  </td>
    </tr>
    <tr>
        <td id='form7'>Declaração de dependentes IR</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    <p>O documento assinado deverá ser enviado mesmo na ausência de dependentes.</p>
                <p>Para os casos de Dependentes declarados:</p>
                <p>- Cópia Certidão de Nascimento filhos para menores de 18 anos </p>
                <p>- Cópia RG e CPF a partir de  8 anos</p>
        </td>
    </tr>
    <tr>
        <td id='carteiraTR'>CTPS-Carteira de Trabalho e PrevidÊncia Social</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>  <p>Enviar imagens da sua Carteira da Trabalho (frente e versos dos seus dados, a página da sua última contração com a baixa do Contrato de Trabalho e a página em branco disponível para preenchimento pela Compasso).</p>

            <p class='sublinhe'><strong>Sem a entrega da via física da Carteira de Trabalho não será possível a admissão.
            Caso não tenha a baixa da empresa anterior, favor entregar também a carta do pedido de desligamento, com carimbo e assinatura da empresa.</strong></p>
        </td>
    </tr>
    <tr>
        <td id='Certidão'>Certidçao de casamento/união estável</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    </td>
    </tr>
    <tr>
        <td id='Dependentes'>Dependentes Salário Familia</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>  <P>Encaminhar:</P>
                <p>- Cópia Certidão de Nascimento filhos até 14 anos</P>
                <p>- Cópia Cartão de vacinação dos filhos até 06 anos</P>
        </td>
    </tr>
    <tr>
        <td id= 'CompResi'>Comprovante de Residência</td>
        <td>.pdf</td>
        <td>NÃO</td>
        <td></td>
    </tr>
    <tr>
        <td id='CPF'>CPF</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    </td>
    </tr>
    <tr>
        <td id='diespençaMili'>Dispença Militar</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    </td>
    </tr>
    <tr>

    </tr>
        <td id='F3x4'>FOTO 3x4</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td> <P>Encaminhar foto 3x4 por e-mail e entregar 1 via física para emissão do seu crachá funcional.</P>

            <p>Nós apresentamos os novos colegas em uma comunicação interna. Se você preferir, pode enviar uma foto, por e-mail, diferente da que será usada no crachá!</P>
        </td>
    </tr>
    <tr>
        <td id='PIS'>PIS</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    </td>
    </tr>
    <tr>
        <td id='RG'>RG</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    </td>
    </tr>
    <tr>
        <td id='Título'>Título Eleitor</td>
        <td>.pdf</td>
        <td class='sim'><strong>SIM</strong></td>
        <td>    </td>
    </tr>
    <tr>
        <td id='ContaITAU'>Conta no Banco ITAU</td>
        <td>.pdf</td>
        <td>NÃO</td>
        <td><p><strong> Os pagamentos relacionados à folha de Pagamento e Benefícios são realizados pelo Banco Itaú.</p></strong>

        <p>Por favor informar os dados bancários caso possua conta no Banco Itaú.</p>
        <p>- Enviar o comprovante dos dados bancários (pode ser um print da tela do banco no qual conste a Agência e Conta ou foto do cartão)</p>

        <P>Caso <u>NÃO</u> possua conta no Banco Itaú iremos encaminhar a Carta para Abertura da Conta.</p>
        </td>
    </tr>
</table>
<p id='title'>Entregar as vias impressas da documentação acima destacada <strong class='sublinhe' color='red'> até xxxxxxx (RH preenche manual) às 12h, RH preenche manualmente o local para entrega </font></strong></p>
<P class = 'sublinhe' id='title'>Caso a documentação e a Carteira de Trabalho não sejam entregues na data acima destacada, será necessário a alteração da data de admissão.</p>
<p id='title'>	Assim que tivermos a data para seu exame admissional lhe informaremos.</p>
<p id='title'>Por gentileza confirmar o recebimento deste e-mail</p>
<footer>
  <table>
<tr>
<th>  <img id='img1'src='../img/compasso.jpg' alt='some text' align='left'> </th>
<th id='info' align='left'>
<div class='txt1'id='align_info'>
<p><a id='cor0'> Equipe Contratações</a> </p>
<p>  Compasso | Navigating Oracle Technologies </p>
<p> +55 51 21086689 | Porto Alegre (RS) – Brasil </p>
<p> <a href='www.compasso.com.br' id='cores'>www.compasso.com.br</a> | <a href='viviane.azevedo@compasso.com.br' id='cores'>viviane.azevedo@compasso.com.br</a> </p>
</div>
</th>
</tr>
<tr>
<td>
<div id='align_img'>
<img id='img2'src='../img/compasso2.jpg' alt='some text'>
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
  <p id='tamanho'><a href=”http://www.compasso.com.br/interno/backoffice.jpg”>http://www.compasso.com.br/interno/backoffice.jpg</a></p>

</footer>
"
echo $body;
?>
</div>
<form action="../enviaEmails.php" method="post">
  <input type="hidden" name="id" value="<?=$id; ?>">
  <input type="hidden" name="nome" value="<?=$nome['NOME']; ?>">
  <input type="hidden" name="email" value="<?=$nome['EMAIL']; ?>">
  <input type="hidden" name="body" value="<?=$body;?>">
  <input type="hidden" name="assunto" value="Acesso Liberado - Compasso">

  <button type="submit">Enviar</button>
</form>
</body>
<script type="text/javascript" src="../js/enviarEmail.js">

</script>
</html>

