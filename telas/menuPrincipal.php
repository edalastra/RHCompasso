<?php
session_start();

include("../db/conexao.php");

//if ($_GET['botaoLimpar']=='Limpar') {
if (isset($_POST['botaoVolta'])) {
  header('Location: menuprincipal.php');
}


//if ($_GET['botao']=='Filtrar') {
    if (isset($_POST['botaoVolta'])) {
        header('Location: menuprincipal.php');
      }
      
      
      //if ($_GET['botao']=='Filtrar') {
      if (isset($_POST['botao'])) {
      
              $where = Array();
      
              $status = $_POST['STATUS'];
              $sede = $_POST['sede'];
              $tipo = $_POST['tipo'];
              $solicitante = $_POST['solicitante'];
              $cliente = $_POST['cliente'];
              $projeto = $_POST['projeto'];
              $captacao = $_POST['captacao'];
              $data_admissao = $_POST['data_admissao'];
              $vencimento = $_POST['vencimento'];
              $vencimentos = $_POST['vencimentos'];
      
      
      
      
              if( $status ){ $where[] = " `STATUS` = '{$status}'"; }
              if( $sede ){ $where[] = " `ID_SEDE` = '{$sede}'"; }
              if( $tipo ){ $where[] = " `ID_TIPO` = '{$tipo}'"; }
              if( $captacao ){ $where[] = " `ID_CAPTACAO` = '{$captacao}'"; }
              if( $solicitante ){ $where[] = " `SOLICITANTE` = '{$solicitante}'"; }
              if( $cliente ){ $where[] = " `CLIENTE` = '{$cliente}'"; }
              if( $projeto ){ $where[] = " `PROJETO` = '{$projeto}'"; }
              if( $data_admissao ){ $where[] = " `DATA_ADMISSAO` = '{$data_admissao}'"; }
              if( $vencimento ){ $where[] = " `DATA_VENCIMENTO_PRI` = '{$vencimento}'"; }
              if( $vencimentos ){ $where[] = " `DATA_VENCIMENTO_SEG` = '{$vencimentos}'"; }
      
      
              $sql = "SELECT * ,DATE_FORMAT(DATA_ADMISSAO,'%d/%m/%Y') as DATA_ADMISSAO, DATE_FORMAT(POSICAO_DATA, '%d/%m/%Y') as POSICAO_DATA
              FROM admissao_dominio as a 
              LEFT JOIN parametros_captacao as p 
              on a.ID_CAPTACAO = p.CAPTACAO_ID
              LEFT JOIN vencimentos as v
              on a.USUARIO_ID = v.ID_USUARIO
              JOIN sede as s
              on a.ID_SEDE = s.SEDE_ID
              JOIN tipo as t
              on a.ID_TIPO = t.TIPO_ID";
              
      
              if( sizeof( $where ) )
                  $sql .= ' WHERE '.implode( ' AND ',$where );
                  $resultado = mysqli_query($conn, $sql);
      
      }  else {
      $resultado = mysqli_query($conn, "SELECT * ,DATE_FORMAT(DATA_ADMISSAO,'%d/%m/%Y') as DATA_ADMISSAO, DATE_FORMAT(POSICAO_DATA, '%d/%m/%Y') as POSICAO_DATA
                                        FROM admissao_dominio as a 
                                        LEFT JOIN parametros_captacao as p 
                                        on a.ID_CAPTACAO = p.CAPTACAO_ID
                                        JOIN sede as s
                                        on a.ID_SEDE = s.SEDE_ID
                                        JOIN tipo as t
                                        on a.ID_TIPO = t.TIPO_ID
                                        where  STATUS <> 'FINALIZADO' && STATUS <> 'RECUSADO' && STATUS <> 'DESISTENCIA'
                                        order by YEAR(DATA_ADMISSAO) ASC, MONTH(DATA_ADMISSAO) ASC, DAY(DATA_ADMISSAO) ASC" );
      
      }

//$resultado = mysqli_query($conn, "SELECT * FROM teste");
// $usuarios = mysql_fetch_assoc($resultado);
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
            <a class='nav filter pos' >Filtragem</a>
        </nav>
    </header>
    <main>
        <section class='menu-inicial'>
            <h2 id='nome'>Plataforma Admissão</h2>
        </section>
        <section class='inputs panel-body display campo-filtro estruct'>
            <h2 id='Filtro'>Filtro</h2>
            <fieldset>
            <form id='form-filtrar'method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div>
                        <div>
                            <label for="status">Status</label>
                            <select id="status" name="STATUS" class="form-control campo-filter">
                                <option value="" selected="selected"></option>
                                <option value="AGUARDAR ACEITE">AGUARDAR ACEITE</option>
                                <option value="FINALIZADO">FINALIZADO</option>
                                <option value="DESISTENCIA">DESISTENCIA</option>
                                <option value="NEGOCIAÇÃO">NEGOCIAÇÃO</option>
                                <option value="EM ANDAMENTO">EM ANDAMENTO</option>
                                <option value="EM CONTRATO">EM CONTRATO</option>
                                <option value="EM VALIDAÇÃO">EM VALIDAÇÃO</option>
                                <option value="RETORNO DOCS">RETORNO DOCS</option>
                                <option value="REALIZAR CONTATO">REALIZAR CONTATO</option>
                                <option value="CONTATO REALIZADO">CONTATO REALIZADO</option>
                                <option value="RETORNO PENDENTE">RETORNO PENDENTE</option>
                                <option value="RECUSADO">RECUSADO</option>
                            </select>
                        </div>
                        <div>
                            <label for="sede">Sede</label>
                            <select id="sede" name="sede" class="form-control campo-filter">
                                <option value="" selected="selected"></option>
                                <option value="1">CWB</option>
                                <option value="2">ERE</option>
                                <option value="3">PF</option>
                                <option value="4">POA</option>
                                <option value="5">RG</option>
                                <option value="6">SP</option>
                                <option value="7">FLN</option>
                            </select>
                        </div>
                        <div>
                            <label for="tipo">Tipo</label>
                            <select id="tipo" name="tipo" class="form-control campo-filter">
                                <option value="" selected="selected"></option>
                                <option value="1">CLT</option>
                                <option value="2">CC</option>
                                <option value="3">HO</option>
                                <option value="4">TEMP</option>
                                <option value="5">APDZ</option>
                            </select>
                        </div>
                        <div>
                            <label for="captacao">Captação</label>
                            <select id="captacao" name="captacao" class="form-control campo-filter">
                                <option value="" selected="selected"></option>
                                <option value="1">Ex-Funcionário</option>
                                <option value="2">Ex-Bolsista</option>
                                <option value="3">Ex-Estágiario</option>
                                <option value="4">NOVO</option>
                            </select>
                        </div>
                        <div>
                            <label for="solicitante">Solicitante</label>
                            <input type="text" id='solicitante' name="solicitante" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Solicitante" />
                        </div>
                        <div>
                            <label for="cliente">Cliente</label>
                            <input type="text" id='cliente' name="cliente" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Cliente" />
                        </div>
                        <div>
                            <label for="PROJETO">Projeto</label>
                            <input type="text" id='projeto' name="projeto" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Projeto" />
                        </div>
                        <div>
                            <label for="data_admissao">Data de Admissão</label>
                            <input type="date" id='data_admissao' name="data_admissao" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Data Admissão" />
                        </div>
                        <div>
                            <label for="vencimentos">Data Venc. Efetivação 45dias</label>
                            <input type="date" id='vencimento' name="vencimento" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Data Vencimento" />
                        </div>
                        <div>
                            <label for="vencimentos">Data Venc. Efetivação 90 dias</label>
                            <input type="date" id='vencimentos' name="vencimentos" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Data Vencimentos" />
                        </div>
                        <input type="submit" name="botao" class="botao btn btn-default btn-xs btn-filter campo-filter" value="Filtrar" >
                    </div>
                </form>
            </fieldset>
        </section>
        <section class='container estruct'>
            <div id='first-table' class=" passos">
                <div class="stepwizard">
                    <div class="passos stepwizard-row setup-panel">
                        <div title="Menu Principal" class="stepwizard-step col-md-auto ">
                            <a href="menuPrincipal.php" type="button" class="btn btn-success btn-circle">1</a>
                        </div>
                        <div title="Proposta de Contratação" class="stepwizard-step col-md-auto">
                            <a href="funcionario.php" type="button" class="btn btn-default btn-circle disabled" disabled >2</a>
                        </div>
                        <div title ="Gestão" class="stepwizard-step col-md-auto">
                            <a href="gestao.php" type="button" class="btn btn-default btn-circle disabled" disabled>3</a>
                        </div>
                        <div title="Vencimento Contratos" class="stepwizard-step col-md-auto">
                            <a href="vencimentosContratos.php" type="button" class="btn btn-default btn-circle disabled" disabled>4</a>
                        </div>
                        <div title="Documentação" class="stepwizard-step col-md-auto">
                            <a href="documentacao.php" type="button" class="btn btn-default btn-circle disabled"disabled>5</a>
                        </div>
                        <div title= "Plataforma Admissão Domínio Dados + Fichas de Cadastro" class="stepwizard-step col-md-auto">
                            <a href="admissao.php" type="button" class="btn btn-default btn-circle disabled"disabled >6</a>
                        </div>
                        <div title="Exame Admissional" class="stepwizard-step col-md-auto">
                            <a href="exame.php" type="button" class="btn btn-default btn-circle disabled"disabled >7</a>
                        </div>
                        <div title= "Dados Bancários" class="stepwizard-step col-md-auto">
                            <a href="bancarios.php" type="button" class="btn btn-default btn-circle disabled" disabled>8</a>
                        </div>
                        <div title= "Suporte Interno" class="stepwizard-step col-md-auto">
                            <a href="suporteinterno.php" type="button" class="btn btn-default btn-circle disabled"disabled >9</a>
                        </div>
                        <div title = "Interno" class="stepwizard-step col-md-auto">
                            <a href="interno.php" type="button" class="btn btn-default btn-circle disabled" disabled>10</a>
                        </div>
                        <div title= "Vias Documentos funcionários" class="stepwizard-step col-md-auto">
                            <a href="viasdocumentos.php" type="button" class="btn btn-default btn-circle disabled" disabled>11</a>
                        </div>
                        <div title= "Boas Vindas" class="stepwizard-step col-md-auto">
                            <a href="recepcao.php" type="button" class="btn btn-default btn-circle disabled" disabled>12</a>
                        </div>
                    </div>
                </div>
            </div>
            <table id='first-table'>
                <h2 id='titulo-table'></h2>
                <thead>
                    <tr>
                        <th width='150px'>Status</th>
                        <th width='60px'>Sede</th>
                        <th width='60px'>Tipo</th>
                        <th width='100px'>Captação</th>
                        <th width='100px'>Carga Horária</th> 
                        <th width='150px'>Horário</th> 
                        <th width='200px'>Nome</th>
                        <th width='150px'>Fone</th>
                        <th width='200px'>Cargo</th>
                        <th width='110px'>Controle Data Admissão</th>
                        <th width='100px'>Remuneração Base</th>
                        <th width='100px'>Gratificação</th>
                        <th width='100px'>Remuneração Total</th>
                        <th width='200px'>Solicitante</th>
                        <th width='150px'>Cliente</th>
                        <th width='150px'>Projeto</th>
                        <th width='330px'>Email</th>
                        <th width='110px'>Data Admissão</th>
                        <th width='110px'>Posição(Data)</th>
                        <th width='200px'>Posição(Comentários)</th>
                        <th width='200px'>Administrativo + Flyback - Hotel</th>
                        <th width='150px'></th>
                        <th width='100px'></th>
                    </tr>
                </thead>
                    <tbody>
                    <?php
                    if($resultado){
                    while($rows_dados = mysqli_fetch_assoc($resultado)){ ?>
                    <?php $SOMA = $rows_dados['REMUNERACAO_BASE'] + $rows_dados['GRATIFICACAO'];?>
                        <tr>
                            <td><?php echo $rows_dados['STATUS'];?></td>
                            <td><?php echo $rows_dados['NOME_SEDE']; ?></td>
                            <td><?php echo $rows_dados['NOME_TIPO']; ?></td>
                            <td><?php echo $rows_dados['NOME_PARAMETRO']; ?></td>
                            <td><?php echo $rows_dados['CARGA_HORARIA']; ?></td>
                            <td><?php echo $rows_dados['HORARIO']; ?></td>
                            <td><?php echo $rows_dados['NOME']; ?></td> 
                            <td><?php echo $rows_dados['FONE_CONTATO']; ?></td>
							<td><?php echo $rows_dados['CARGO']; ?></td>
                            <td><?php echo $rows_dados['CONTROLE_DATA_ADMISSAO'];?></td>
							<td><?php echo 'R$' . number_format($rows_dados['REMUNERACAO_BASE'], 2, ',', '.'); ?></td>
                            <td><?php echo 'R$' . number_format($rows_dados['GRATIFICACAO'], 2, ',', '.'); ?></td>
                            <td><?php echo 'R$' . number_format($SOMA, 2, ',', '.'); ?></td>
                            <td><?php echo $rows_dados['SOLICITANTE']; ?></td>
							<td><?php echo $rows_dados['CLIENTE']; ?></td>
							<td><?php echo $rows_dados['PROJETO']; ?></td>
                            <td><?php echo $rows_dados['EMAIL']; ?></td>
                            <td><?php echo $rows_dados['DATA_ADMISSAO']; ?></td>
                            <td><?php echo $rows_dados['POSICAO_DATA']; ?></td>
                            <td><?php echo $rows_dados['POSICAO_COMENTARIO']; ?></td>
                            <td><?php echo $rows_dados['ADMINISTRATIVO']; ?></td>
                            <td><a title="Proposta de Contratação" href='funcionario.php?id=<?php echo $rows_dados['USUARIO_ID']; ?>'> Ver Detalhes  </td>
                            <td><a title="Editar" href="../alteraTelas/altera-form.php?id=<?=$rows_dados['USUARIO_ID']?>" type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"aria-hidden="true"></span></a></td>
                        </tr>
                    <?php 
                }} ?>
                
                <tr>
                        <form id='form-add' method="POST" action="../salva.php">
                            <td>Nova Admissão</td>
                            <td><select id="add-sede" name='sede' class="selectadd intable" required><option value="" selected="selected"></option><option value="1">CWB</option><option value="2">ERE</option><option value="3">PF</option><option value="4">POA</option><option value="5">RG</option><option value="6">SP</option><option value="7">FLN</option></select></td>
                            <td><select id="add-tipo" name='tipo' class="selectadd intable" required><option value="" selected="selected"></option><option value="1">CLT</option><option value="2">CC</option><option value="3">HO</option><option value="4">TEMP</option><option value="5">APDZ</option></select></td>
                            <td><select id="add-captacao" name='captacao' class="selectadd intable" required><option value="" selected="selected"></option><option value="1">Ex-Funcionario</option><option value="2">Ex-Bolsista</option><option value="3">Ex-Estagiario</option><option value="4">Novo</option></select></td>
                            <td id='add-carga_horaria'><input class='intable' type="text" name="carga_horaria" required></td>
                            <td id='add-horario'><input class='intable' type="text" name="horario" required></td>
                            <td id='add-nome'><input class='intable' type="text" name="nome" required></td>
                            <td id='add-fone'><input class='intable' type="tel" name="fone_contato" required></td>
                            <td id='add-cargo'><input class='intable' type="text" name="cargo" required></td>
                            <td id='add-contole-data'><input class='intable' type="text" name="controle_data_admissao" required></td>
                            <td id='add-remuneracao'><input class='intable' type="number" step=".01" name="remuneracao_base" required></td>
                            <td id='add-gratificacao'><input class='intable' type="number" step=".01" name="gratificacao" required></td>
                            <td></td>
                            <td id='add-solicitante'><input  class='intable' type="text" name="solicitante" required></td>
                            <td id='add-cliente'><input class='intable' type="text" name="cliente" required></td>
                            <td id='add-projeto'><input class='intable' type="text" name="projeto" required></td>
                            <td id='add-email'><input class='intable' type="email" name="email" required></td>
                            <td id='add-admissao'><input class='intable' type="date" name="data_admissao" required></td>
                            <td id='add-posicao_data'><input class='intable' type="date" name="posicao_data" required></td>
                            <td id='add-posicao_comentario'><input class='intable' type="text" name="posicao_comentario" required></td>
                            <td id='add-administrativo'><input class='intable' type="text" name="administrativo" required></td>
                            <td><button title= "Salvar" type="submit" value="salva" class="botao-salvar btn btn-default" action="#"><span class="glyphicon glyphicon-floppy-disk"aria-hidden="true"></span></button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
            <section>
                <a title="Exportar telas p/Excel" name = "botao" href="../TabelasExcel/ExcelPaginas.php" class="botao btn btn-default btn-xs btn-filter campo-filter">EXPORTAR P/ EXCEL</a>
            </section>

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
                <table class='legendas-sedes'>
                    <tr>
                        <th class='tb2'>SEDE</th>
                    </tr>
                    <tr><td class='tb2'>CWB</td></tr>
                    <tr><td class='tb2'>ERE</td></tr>
                    <tr><td class='tb2'>PF</td></tr>
                    <tr><td class='tb2'>POA</td></tr>
                    <tr><td class='tb2'>RG</td></tr>
                    <tr><td class='tb2'>SP</td></tr>
                    <tr><td class='tb2'>FLN</td></tr>
                </table>
                <table class='legendas-tipos'>
                    <tr>
                        <th class='tb2'>TIPO</th>
                        <th class='tb2'>COMENTÁRIOS</th>
                    </tr>
                    <tr>
                        <td class='tb2'>CLT</td>
                        <td class='tb2'>Celetista</td>
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
                <table class='legendas-sedes'>
                    <tr>
                        <th class='tb2'>Captação</th>
                    </tr>
                    <tr>
                        <td class='tb2'>Novo</td>
        
                    </tr>
                    <tr>
                        <td class='tb2'>Ex-Estagiário</td>
             
                    </tr>
                    <tr>
                        <td class='tb2'>Ex-Funcionário</td>
                       
                    </tr>
                    <tr>
                        <td class='tb2'>Ex-Bolsista</td>
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

</body>

</html>
