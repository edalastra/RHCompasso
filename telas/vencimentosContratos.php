<?php
session_start();
    include("../db/conexao.php");
    include("../update.php");

    $listar = listar($conn);

    if (!isset ($id)){
     $id = $_SESSION['id'];
    }

$resultado1 = mysqli_query($conn,"SELECT ID_USUARIO, NOME,DATE_FORMAT(DATA_ADMISSAO,'%d/%m/%Y') as DATA_ADMISSAO,STATUS FROM propostas_contratacoes as p LEFT JOIN admissao_dominio as a on p.ID_USUARIO = a.USUARIO_ID where ID_USUARIO = '$id'");
$conn1 = mysqli_num_rows($resultado1);


    //$count =  mysqli_num_rows($conn,"SELECT COUNT(*) FROM propostas_contratacoes WHERE ID_USUARIO = '$id'");
    $resultado = mysqli_query($conn, "SELECT `ID_VENCIMENTO`, `ID_USUARIO`, DATE_FORMAT(ENVIO_SOLICITANTE_PRI,'%d/%m/%Y') as ENVIO_SOLICITANTE_PRI, DATE_FORMAT(DATA_VENCIMENTO_PRI,'%d/%m/%Y') as DATA_VENCIMENTO_PRI, `RENOVACAO`, DATE_FORMAT(ENVIO_SOLICITANTE_SEG,'%d/%m/%Y') as ENVIO_SOLICITANTE_SEG, DATE_FORMAT(DATA_VENCIMENTO_SEG,'%d/%m/%Y') as DATA_VENCIMENTO_SEG, `EFETIVACAO` FROM `vencimentos` as d LEFT JOIN admissao_dominio as a on d.ID_USUARIO = a.USUARIO_ID where ID_USUARIO = '$id'");
    $count = mysqli_num_rows($resultado);

    if($count == 1){
        $resultado = mysqli_query($conn, "SELECT `ID_VENCIMENTO`, `ID_USUARIO`, DATE_FORMAT(ENVIO_SOLICITANTE_PRI,'%d/%m/%Y') as ENVIO_SOLICITANTE_PRI, DATE_FORMAT(DATA_VENCIMENTO_PRI,'%d/%m/%Y') as DATA_VENCIMENTO_PRI, `RENOVACAO`, DATE_FORMAT(ENVIO_SOLICITANTE_SEG,'%d/%m/%Y') as ENVIO_SOLICITANTE_SEG, DATE_FORMAT(DATA_VENCIMENTO_SEG,'%d/%m/%Y') as DATA_VENCIMENTO_SEG, `EFETIVACAO` FROM `vencimentos` as d LEFT JOIN admissao_dominio as a on d.ID_USUARIO = a.USUARIO_ID where ID_USUARIO = '$id'");
    }else{
        mysqli_query($conn,"INSERT INTO `vencimentos`(`ID_VENCIMENTO`, `ID_USUARIO`, `ENVIO_SOLICITANTE_PRI`, `DATA_VENCIMENTO_PRI`, `RENOVACAO`, `ENVIO_SOLICITANTE_SEG`, `DATA_VENCIMENTO_SEG`, `EFETIVACAO`) VALUES (NULL,$id,NULL,NULL,NULL,NULL,NULL,NULL)");

        $resultado = mysqli_query($conn, "SELECT `ID_VENCIMENTO`, `ID_USUARIO`, DATE_FORMAT(ENVIO_SOLICITANTE_PRI,'%d/%m/%Y') as ENVIO_SOLICITANTE_PRI, DATE_FORMAT(DATA_VENCIMENTO_PRI,'%d/%m/%Y') as DATA_VENCIMENTO_PRI, `RENOVACAO`, DATE_FORMAT(ENVIO_SOLICITANTE_SEG,'%d/%m/%Y') as ENVIO_SOLICITANTE_SEG, DATE_FORMAT(DATA_VENCIMENTO_SEG,'%d/%m/%Y') as DATA_VENCIMENTO_SEG, `EFETIVACAO` FROM `vencimentos` as d LEFT JOIN admissao_dominio as a on d.ID_USUARIO = a.USUARIO_ID where ID_USUARIO = '$id'");
    }

$status = buscaFuncionarios($conn, $id);
$funcionario = buscavencimentos($conn, $id);
$envio_Pri = buscavencimentos($conn, $id);
// $data_venc_pri = calculaVencimento();
// $data_venc_pri = buscavencimentos($conn, $id);
$renovacao = buscavencimentos($conn, $id);
$envio_seg = buscavencimentos($conn, $id);
$data_venc_seg = buscavencimentos($conn, $id);
$efetivacao = buscavencimentos($conn, $id);



?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>RH Contratações</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/arquivo.css">
    <link rel="stylesheet" href="../css/menuPrincipal.css">



</head>

<body>
    <header class="site-header">
        <img src="http://www.compasso.com.br/wp-content/uploads/2018/04/Logo_Compasso_01-mini.png" alt="Compasso Tecnologia">
        <nav>
            <a class='nav inicio' href='menuPrincipal.php'>Início</a>
            <div class="dropdown">
            <a class="dropbtn nav">Emails <span class='caret'></span></a>
            <div class="dropdown-content">
                <a href='../emails/body-email/admissaoPOA.php?id=<?php echo $id?>'>5. Documentos Admissão POA</a>
                <a href='../emails/body-email/admissãoRG.php?id=<?php echo $id?>'>5.1 Documentos Admissão RG</a>
                <a href='../emails/body-email/admissãoPF.php?id=<?php echo $id?>'>5.2 Documentos de Admissão PF</a>
                <a href='../emails/body-email/admissãoERE.php?id=<?php echo $id?>'>5.3 Documentos de Admissão ERE</a>
                <a href='../emails/body-email/admissãoCWB.php?id=<?php echo $id?>'>5.4 Documentos de Admissão CWB</a>
                <a href='../emails/body-email/admissãoSP.php?id=<?php echo $id?>'>5.5 Documentos de Admissão SP</a>
                <a href='../emails/body-email/admissãoFNL.php?id=<?php echo $id?>'>5.6 Documentos Admissão FNL</a>
                <a href='../emails/body-email/primeiro-alerta.php?id=<?php echo $id?>'>7. ALERTA - 1ª Experiência expira em 20 dias</a>
                <a href='../emails/body-email/segundo-alerta.php?id=<?php echo $id?>'>7.1 ALERTA - 2ª Experiência expira em 20 dias</a>
                <a href='../emails/body-email/novo-acesso.php?id=<?php echo $id?>'>8. Novo Acesso</a>
                <a href='../emails/body-email/acesso-liberado.php?id=<?php echo $id?>>'>9. Acessos Liberado</a>
                </div>
            </div>
        </nav>

    </header>
    <main>
        <section class='menu-inicial'>
            <h2 id='nome'>Vencimentos Contratos</h2>
        </section>
        <section class='container estruct'>
        <div class='menu-inicial1'>
                <table>
                    <thead>
                        <tr id='titulo-table1' margin-top='0' >
                            <th width='170px'>Status</th>
                            <th width='170px'>Nome</th>
                            <th width='170px'>Data de Admissao</th>
                        </tr>
                    <thead>
                <tbody>
                <tr>
                        <?php while ($rows_dados = mysqli_fetch_assoc($resultado1)) {  ?>
                            <th width='100px'><?php echo $rows_dados['STATUS'];?></th>
                            <th width='100px'><?php echo $rows_dados['NOME']; ?></th>
                            <th width='170px'><?php echo $rows_dados['DATA_ADMISSAO'];?></th>
                        <?php  } ?>
                    </tr>
                </tbody>
                </table>
        </div>
        <div style="height: 25px;"></div>
            <div class="passos">
                <div class="stepwizard">
                    <div class="passos stepwizard-row1 setup-panel">
                        <div class="stepwizard-step col-md-auto">
                            <a title="Menu Principal" href="menuPrincipal.php" type="button" class="btn btn-default btn-circle">1</a>
                        </div>
                        <div title ="Proposta de Contratação" class="stepwizard-step col-md-auto">
                            <a href="funcionario.php" type="button" class="btn btn-default btn-circle" >2</a>
                        </div>
                        <div title ="Gestão" class="stepwizard-step col-md-auto">
                            <a href="gestao.php" type="button" class="btn btn-default btn-circle">3</a>
                        </div>
                        <div title="Vencimento Contratos" class="stepwizard-step col-md-auto">
                            <a href="vencimentosContratos.php" type="button" class="btn btn-success btn-circle">4</a>
                        </div>
                        <div title="Documentação" class="stepwizard-step col-md-auto">
                            <a href="documentacao.php" type="button" class="btn btn-default btn-circle">5</a>
                        </div>
                        <div title= "Plataforma Admissão Domínio Dados + Fichas de Cadastro" class="stepwizard-step col-md-auto">
                            <a href="admissao.php" type="button" class="btn btn-default btn-circle" >6</a>
                        </div>
                        <div title="Exame Admissional" class="stepwizard-step col-md-auto">
                            <a href="exame.php" type="button" class="btn btn-default btn-circle" >7</a>
                        </div>
                        <div title= "Dados Bancários" class="stepwizard-step col-md-auto">
                            <a href="bancarios.php" type="button" class="btn btn-default btn-circle" >8</a>
                        </div>
                        <div title= "Suporte Interno" class="stepwizard-step col-md-auto">
                            <a href="suporteinterno.php" type="button" class="btn btn-default btn-circle" >9</a>
                        </div>
                        <div title = "Interno" class="stepwizard-step col-md-auto">
                            <a href="interno.php" type="button" class="btn btn-default btn-circle" >10</a>
                        </div>
                        <div title= "Vias Documentos funcionários" class="stepwizard-step col-md-auto">
                            <a href="viasdocumentos.php" type="button" class="btn btn-default btn-circle" >11</a>
                        </div>
                        <div title= "Boas Vindas" class="stepwizard-step col-md-auto">
                            <a href="recepcao.php" type="button" class="btn btn-default btn-circle" >12</a>
                        </div>
                    </div>
                </div>
            </div>
            <table id='first-table'>
                <h2 id='titulo-table'></h2>
                <thead>
                    <tr>
                        <th></th>
                        <th colspan = '3'>1°Alerta Vencimento 45 dias</th>
                        <th colspan = '3'>2°Alerta Vencimetno 90 dias</th>

                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>Envio Solicitante</th>
                        <th>Data do Vencimento</th>
                        <th>Renovação (S= sim N= Não)</th>
                        <th>Envio Solicitante</th>
                        <th>Data do Vencimento</th>
                        <th>efetivacao (S= sim N= Não)</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rows_dados = mysqli_fetch_assoc($resultado)) {  ?>
                            <tr>
                            <td><?=$status['STATUS']?></td>
                            <td><?php echo $rows_dados['ENVIO_SOLICITANTE_PRI']; ?></td>
                            <td><?php echo $rows_dados['DATA_VENCIMENTO_PRI']; ?></td>
                            <td><?php echo $rows_dados['RENOVACAO']; ?></td>
                            <td><?php echo $rows_dados['ENVIO_SOLICITANTE_SEG']; ?></td>
                            <td><?php echo $rows_dados['DATA_VENCIMENTO_SEG']; ?></td>
                            <td><?php echo $rows_dados['EFETIVACAO']; ?></td>
                            <td><a title="Documentação" href='documentacao.php' class='intable'>Proximo</td>
                            <td><button title="Editar" type="button" class="bto-update btn btn-default curInputs">Editar</button></span></button></td>


                        </tr>
                    <?php } ?>

                    <tr class='funcionario atualiza'>
                        <form method="POST" action="../alteraTelas/altera-vencimento.php">
                            <input type="hidden" name="ID_USUARIO" value="<?php echo $funcionario['ID_USUARIO']?>">
                            <td><input class='intable' readonly name="STATUS" value='<?=$status['STATUS']?>'></td>
                            <td><input type='date' class='intable' name="ENVIO_SOLICITANTE_PRI" value="<?=$envio_Pri['ENVIO_SOLICITANTE_PRI']?>"></td>
                            <td><input type='date' class='intable' name ="DATA_VENCIMENTO_PRI" value=""></td>
                            <td><input type='text' class='intable' name="RENOVACAO" value="<?=$renovacao['RENOVACAO']?>"></td>
                            <td><input type='date' class='intable' name="ENVIO_SOLICITANTE_SEG" value="<?=$envio_seg['ENVIO_SOLICITANTE_SEG']?>"></td>
                            <td><input type='date' class='intable' name="DATA_VENCIMENTO_SEG" value="<?=$data_venc_seg['DATA_VENCIMENTO_SEG']?>"></td>
                            <td><input type='text' class='intable' name="EFETIVACAO" value="<?=$efetivacao['EFETIVACAO']?>"></td>
                            <td></td>
                            <td><button title="Salvar" type="submit" class="botao-salvar btao btn btn-default">Salvar</td>


                    </form>
                </tbody>
            </table>
        </section>
            <section class="legendas estruct">
                <h2>Legendas</h2>
                <table id='table-legendas'>
                    <tr class='tb2'>
                        <th class='tb2'>STATUS</th>
                        <th class='tb2'>TIPO</th>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>AGUARDAR ACEITE</td>
                        <td class='tb2'>Aguardando o Aceite após o envio da proposta</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>FINALIZADO</td>
                        <td class='tb2'>Admissao concluída</td>
                    </tr>
                    <tr>
                        <td class='tb2'>DESISTENCIA</td>
                        <td class='tb2'>Aceitou a proposta, mas desistiu antes da admissão</td>
                    </tr>
                    <tr>
                        <td class='tb2'>EM ANDAMENTO</td>
                        <td class='tb2'>Em andamento admissão</td>
                    </tr>
                    <tr>
                        <td class='tb2'>EM CONTRATO</td>
                        <td class='tb2'>Em contrato, admissão concluída, pendente os envios de contrato</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>EM VALIDAÇÃO</td>
                        <td class='tb2'>Dados da proposta estão em validação antes do envio</td>
                    </tr>
                    <tr>
                        <td class='tb2'>RETORNO DOCS</td>
                        <td class='tb2'>Aguardando documentos de admissão assinados pelo funcionário</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>NEGOCIAÇÃO</td>
                        <td class='tb2'>Quando o candato faz uma contraproposta e estamos negociando com o Gestor</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>REALIZAR CONTATO</td>
                        <td class='tb2'>Time Contratações ainda não entrou em contato com o canditado para verificar se o profissional irá aceitar a proposta</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>CONTATO REALIZADO</td>
                        <td class='tb2'>Time Contratações realizou contato com o canditado para verificar se o profissional irá aceitar a proposta</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>RETORNO PENDENTE</td>
                        <td class='tb2'>Aguardando retorno do profissional do aceite da proposta</td>
                    </tr>
                    <tr class='tb2'>
                        <td class='tb2'>RECUSADO</td>
                        <td class='tb2'>Profissional recusou a proposta contratação</td>
                    </tr>
                </table>
                </table>
                <table class='legendas-sedes'>
                <tr>
                    <th class='tb2'>SEDE</th>
                </tr>
                <?php foreach ($listar as $linha):?>
                <tr><td class='tb2'><?php echo $linha['NOME_SEDE']?></td></tr>
                <?php endforeach ?>
                </table>
                <table class='legendas-tipos'>
                    <tr>
                        <th class='tb2'>TIPO</th>
                        <th class='tb2'>COMENTÁRIOS</th>
                    </tr>
                    <tr>
                        <td class='tb2'>CLT</td>
                        <td class='tb2'>Colaborador CLT</td>
                    </tr>
                    <tr>
                        <td class='tb2'>CC</td>
                        <td class='tb2'>Cargo de Confiança</td>
                    </tr>
                    <tr>
                        <td class='tb2'>HO</td>
                        <td class='tb2'>Home Office - Teletrabalho</td>
                    </tr>
                    <tr>
                        <td class='tb2'>TEMP</td>
                        <td class='tb2'>Contrato por tempo determinado</td>
                    </tr>
                    <tr>
                        <td class='tb2'>APDZ</td>
                        <td class='tb2'>Aprendiz</td>
                    </tr>
                </table>
            </section>
    </main>
    <footer>
        <h2></h2>
    </footer>
    <script src="../js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/funcionamento.js"></script>
    <script src="../js/filter.js"></script>
    <script src="../js/calculaVencimento.js">
        calculaVencimento();
    </script>

</body>

</html>
