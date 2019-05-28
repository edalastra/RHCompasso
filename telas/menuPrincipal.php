<?php
session_start();

include("../db/conexao.php");
include("../update.php");

$listar = listar($conn);
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
              $sexo = $_POST['sexo'];
              $solicitante = $_POST['solicitante'];
              $cliente = $_POST['cliente'];
              $projeto = $_POST['projeto'];
              $captacao = $_POST['captacao'];
              $data_admissao = $_POST['data_admissao'];
              $vencimento = $_POST['vencimento'];
              $vencimentos = $_POST['vencimentos'];
              $formularios_enviados = $_POST['formularios_enviados'];
              $formularios_recebidos = $_POST['formularios_recebidos'];
              $documentos_fisicos = $_POST['documentos_fisicos'];
              $ctps = $_POST['ctps'];
              $qualific = $_POST['qualific'];
              $cad_adm = $_POST['cad_adm'];
              $doc_rec = $_POST['doc_rec'];
              $termo_psi = $_POST['termo_psi'];
              $inclui_adm = $_POST['inclui_adm'];
              $agendamento_exam = $_POST['agendamento_exam'];
              $envio_func = $_POST['envio_func'];
              $email_exame = $_POST['email_exame'];
              $anexar_aso = $_POST['anexar_aso'];
              $envio = $_POST['envio'];
              $recebido = $_POST['recebido'];
              $anexar_recebido = $_POST['anexar_recebido'];
              $planilha_contas = $_POST['planilha_contas'];
              $form_compro = $_POST['form_compro'];
              $intra_data = $_POST['intra_data'];
              $kairos_data = $_POST['kairos_data'];
              $email_gestor = $_POST['email_gestor'];
              $email_inicio = $_POST['email_inicio'];
              $email_boas = $_POST['email_boas'];
              $acessos = $_POST['acessos'];
              $cracha_pedido = $_POST['cracha_pedido'];
              $cracha_controle = $_POST['cracha_controle'];
              $cracha_protocolo = $_POST['cracha_protocolo'];
              $email_caderno = $_POST['email_caderno'];
              $email_r = $_POST['email_r'];
              $malote = $_POST['malote'];
              $assinados = $_POST['assinados'];

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
              if( $formularios_enviados ){ $where[] = " `formularios_enviados` = '{$formularios_enviados}'"; }
              if( $formularios_recebidos ){ $where[] = " `formularios_recebidos` = '{$formularios_recebidos}'"; }
              if( $documentos_fisicos ){ $where[] = " `documentos_fisicos` = '{$documentos_fisicos}'"; }
              if( $ctps ){ $where[] = " `ctps_recebida` = '{$ctps}'"; }
              if( $qualific ){ $where[] = " `QUALIFIC_CADASTRAL_CEP` = '{$qualific}'"; }
              if( $cad_adm ){ $where[] = " `CAD_ADM_PLATAFORMA_ADM_DIMIN` = '{$cad_adm}'"; }
              if( $doc_rec ){ $where[] = " `DOC_RECEBIDO_PLATAFORMA_DOMIN_CBO` = '{$doc_rec}'"; }
              if( $termo_psi ){ $where[] = " `TERMO_PSI` = '{$termo_psi}'"; }
              if( $inclui_adm ){ $where[] = " `INCLUI_ADM_PROV` = '{$inclui_adm}'"; }
              if( $agendamento_exam ){ $where[] = " `AGENDAMENTO_EXAM_ADM` = '{$agendamento_exam}'"; }
              if( $envio_func ){ $where[] = " `EMAIL_RECEBIDO_EXAM` = '{$envio_func}'"; }
              if( $email_exame ){ $where[] = " `ENVIO_FUNC_EXAME` = '{$email_exame}'"; }
              if( $anexar_aso ){ $where[] = " `ANEXAR_ASO` = '{$anexar_aso}'"; }
              if( $envio ){ $where[] = " `ENVIO` = '{$envio}'"; }
              if( $recebido ){ $where[] = " `RECEBIDO` = '{$recebido}'"; }
              if( $anexar_recebido ){ $where[] = " `ANEXAR_COMPR_DOMIN` = '{$anexar_recebido}'"; }
              if( $planilha_contas ){ $where[] = " `PLANILHA_CONTAS` = '{$planilha_contas}'"; }
              if( $form_compro ){ $where[] = " `FORM_COMPR_BANCARIO` = '{$form_compro}'"; }
              if( $intra_data ){ $where[] = " `INTRANET_CADASTRO_USUARIO` = '{$intra_data}'"; }
              if( $kairos_data ){ $where[] = " `KAIROS_CADASTRO_USUARIO` = '{$kairos_data}'"; }
              if( $email_gestor ){ $where[] = " `EMAIL_GESTOR_APOIO_SEDE` = '{$email_gestor}'"; }
              if( $email_inicio ){ $where[] = " `EMAIL_INICIO_ATIVIDADES` = '{$email_inicio}'"; }
              if( $email_boas ){ $where[] = " `EMAIL_BOAS_VINDAS` = '{$email_boas}'"; }
              if( $acessos ){ $where[] = " `ACESSOS` = '{$acessos}'"; }
              if( $cracha_pedido ){ $where[] = " `CRACHA_DATA_PEDIDO` = '{$cracha_pedido}'"; }
              if( $cracha_controle ){ $where[] = " `CRACHA_CONTROLE` = '{$cracha_controle}'"; }
              if( $cracha_protocolo ){ $where[] = " `CRACHA_PROTOCOLO` = '{$cracha_protocolo}'"; }
              if( $email_caderno ){ $where[] = " `EMAIL_CADERNO_COMPASSO_SOLICITADO` = '{$email_caderno}'"; }
              if( $email_r ){ $where[] = " `EMAIL_CADERNO_COMPASSO_RECEBIDO` = '{$email_r}'"; }
              if( $malote ){ $where[] = " `MALOTE_CADERNO_COMPASSO_CTPS` = '{$malote}'"; }
              if( $assinados ){ $where[] = " `DOCUMENTOS_RECEBIDOS_ASSINADOS` = '{$assinados}'"; }





              $sql = "SELECT * ,DATE_FORMAT(DATA_ADMISSAO,'%d/%m/%Y') as DATA_ADMISSAO, DATE_FORMAT(POSICAO_DATA, '%d/%m/%Y') as POSICAO_DATA
              FROM admissao_dominio as a
              LEFT JOIN parametros_captacao as p
              on a.ID_CAPTACAO = p.CAPTACAO_ID
              LEFT JOIN vencimentos as v
              on a.USUARIO_ID = v.ID_USUARIO
              JOIN sede as s
              on a.ID_SEDE = s.SEDE_ID
              JOIN tipo as t
              on a.ID_TIPO = t.TIPO_ID
              LEFT JOIN documentacao as d
              on d.ID_USUARIO = a.USUARIO_ID
              LEFT JOIN admissao as adm
              on adm.ID_USUARIO = a.USUARIO_ID
              LEFT JOIN exame_admissional as exe
              on exe.ID_USUARIO = a.USUARIO_ID
              LEFT JOIN bancarios as banc
              on banc.ID_USUARIO = a.USUARIO_ID
              LEFT JOIN interno as i
              on i.ID_USUARIO = a.USUARIO_ID
              LEFT JOIN vias_documentos_funcionarios as via
              ON via.ID_USUARIO = a.USUARIO_ID";


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
                                        LEFT JOIN documentacao as d
                                        on d.ID_USUARIO = a.USUARIO_ID
                                        LEFT JOIN admissao as adm
                                        on adm.ID_USUARIO = a.USUARIO_ID
                                        LEFT JOIN exame_admissional as exe
                                        on exe.ID_USUARIO = a.USUARIO_ID
                                        LEFT JOIN bancarios as banc
                                        on banc.ID_USUARIO = a.USUARIO_ID
                                        LEFT JOIN interno as i
                                        on i.ID_USUARIO = a.USUARIO_ID
                                        LEFT JOIN vias_documentos_funcionarios as via
                                        ON via.ID_USUARIO = a.USUARIO_ID
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
                                <?php foreach ($listar as $linha):?>
                                    <option value="<?= $linha['SEDE_ID']?>"><?php echo $linha['NOME_SEDE']?></option>
                                <?php endforeach ?>
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
                        <h2>Tela 5 - Documentação</h2>
                        <div>
                            <label for="formularios_enviados">Formulários Enviados</label>
                            <input type="date" id='formularios_enviados' name="formularios_enviados" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Formulários Enviados"/>
                        </div>
                        <div>
                            <label for="formularios_recebidos">Formulários Recebidos</label>
                            <input type="date" id='formularios_recebidos' name="formularios_recebidos" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Formulários Recebidos"/>
                        </div>
                        <div>
                            <label for="documentos_fisicos">Documentos Físicos</label>
                            <input type="date" id='documentos_fisicos' name="documentos_fisicos" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Documentos Físicos"/>
                        </div>
                        <div>
                            <label for="ctps">CTPS</label>
                            <input type="date" id='r' name="ctps" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="CTPS"/>
                        </div>
                        <h2>Tela 6 - Admissão</h2>
                        <div>
                            <label for="qualific">Qualificação Cadastral e CEP</label>
                            <input type="date" id='qualific' name="qualific" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Qualificação Cadastral e CEP"/>
                        </div>
                        <div>
                            <label for="cad_adm">Cadastrada Admissão Plataforma Domínio</label>
                            <input type="date" id='cad_adm' name="cad_adm" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Cadastrada Admissão Plataforma Domínio"/>
                        </div>
                        <div>
                            <label for="doc_rec">Documentos Recebidos Plataforma Domínio + Validação  CBO</label>
                            <input type="date" id='doc_rec' name="doc_rec" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Documentos Recebidos Plataforma Domínio + Validação  CBO"/>
                        </div>
                        <div>
                            <label for="termo_psi">Termo PSI</label>
                            <input type="date" id='termo_psi' name="termo_psi" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Termo PSI"/>
                        </div>
                        <div>
                            <label for="inclui_adm">Incluir Admissão na Provisória</label>
                            <input type="date" id='inclui_adm' name="inclui_adm" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Incluir Admissão na Provisória"/>
                        </div>
                        <h2>Tela 7 - Exame</h2>
                        <div>
                            <label for="agendamento_exam">Agendamento</label>
                            <input type="date" id='agendamento_exam' name="agendamento_exam" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Agendamento"/>
                        </div>
                        <div>
                            <label for="envio_func">Envio para funcionário</label>
                            <input type="date" id='envio_func' name="envio_func" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Envio para funcionário"/>
                        </div>
                        <div>
                            <label for="email_exame">Recebido por e-mail ASO assinado</label>
                            <input type="date" id='email_exame' name="email_exame" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Recebido por e-mail ASO assinado"/>
                        </div>
                        <div>
                            <label for="anexar_aso">Anexar ASO assinado na Domínio	</label>
                            <input type="date" id='anexar_aso' name="anexar_aso" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Anexar ASO assinado na Domínio"/>
                        </div>
                        <h2>Tela 8 - Dados Bancários</h2>
                        <div>
                            <label for="envio">Envio</label>
                            <input type="date" id='envio' name="envio" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Envio"/>
                        </div>
                        <div>
                            <label for="recebido">Recebido</label>
                            <input type="date" id='recebido' name="recebido" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Recebido"/>
                        </div>
                        <div>
                            <label for="anexar_recebido">Anexar comprovante na Domínio</label>
                            <input type="date" id='anexar_recebido' name="anexar_recebido" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Anexar comprovante na Domínio"/>
                        </div>
                        <div>
                            <label for="planilha_contas">Planilha de Contas</label>
                            <input type="date" id='planilha_contas' name="planilha_contas" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Planilha de Contas"/>
                        </div>
                        <div>
                            <label for="form_compro">Formulário + Comprovante Bancário</label>
                            <input type="date" id='form_compro' name="form_compro" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Formulário + Comprovante Bancário"/>
                        </div>
                        <h2>Tela 10 - Interno</h2>
                        <div>
                            <label for="intra_data">Intranet - Cadastro Usuário</label>
                            <input type="date" id='intra_data' name="intra_data" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Intranet - Cadastro Usuário"/>
                        </div>
                        <div>
                            <label for="kairos_data">Kairos - Cadastro Usuário</label>
                            <input type="date" id='kairos_data' name="kairos_data" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Kairos - Cadastro Usuário"/>
                        </div>
                        <div>
                            <label for="email_gestor">E-mail Gestor + Apoio Sede</label>
                            <input type="date" id='email_gestor' name="email_gestor" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="E-mail Gestor + Apoio Sede"/>
                        </div>
                        <div>
                            <label for="email_inicio">E-mail Início das Atividades</label>
                            <input type="date" id='email_inicio' name="email_inicio" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="E-mail Início das Atividades"/>
                        </div>
                        <div>
                            <label for="email_boas">E-mail Boas Vindas	</label>
                            <input type="date" id='email_boas' name="email_boas" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="E-mail Boas Vindas	"/>
                        </div>
                        <div>
                            <label for="acessos">Acessos</label>
                            <input type="date" id='acessos' name="acessos" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Acessos"/>
                        </div>
                        <h2>Tela 11 - Vias documentos</h2>
                        <div>
                            <label for="cracha_pedido">Data do pedido do crachá</label>
                            <input type="date" id='cracha_pedido' name="cracha_pedido" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Data do pedido do crachá"/>
                        </div>
                        <div>
                            <label for="cracha_controle">Controle crachá</label>
                            <input type="date" id='cracha_controle' name="cracha_controle" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Controle crachá"/>
                        </div>
                        <div>
                            <label for="cracha_protocolo">Protocolo crachá</label>
                            <input type="date" id='cracha_protocolo' name="cracha_protocolo" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Protocolo crachá"/>
                        </div>
                        <div>
                            <label for="email_caderno">Data E-mail solicitado</label>
                            <input type="date" id='email_caderno' name="email_caderno" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Data E-mail solicitado"/>
                        </div>
                        <div>
                            <label for="email_r">Data E-mail recebido</label>
                            <input type="date" id='email_r' name="email_r" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Data E-mail recebido"/>
                        </div>
                        <div>
                            <label for="malote">Malote (Caderno) + CTPS (Controle RH)</label>
                            <input type="date" id='malote' name="malote" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Malote (Caderno) + CTPS (Controle RH)"/>
                        </div>
                        <div>
                            <label for="assinados">Recebido após assinatura Escanear Docs e Salvar na Pasta</label>
                            <input type="date" id='assinados' name="assinados" class="form-control campo-filter" data-action="filter"
                                data-filters="#dev-table" placeholder="Recebido após assinatura Escanear Docs e Salvar na Pasta"/>
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
                        <th width='150px'>Carga Horária (em horas)</th>
                        <th width='150px'>Horário</th>
                        <th width='200px'>Nome</th>
                        <th width='200px'>Sexo</th>
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
                            <td><?php echo $rows_dados['SEXO']; ?></td>
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
                            <td><a title="Editar" href="../alteraTelas/altera-form.php?id=<?=$rows_dados['USUARIO_ID']?>" type="button" class="btn btn-default">Editar</span></a></td>
                        </tr>
                    <?php
                }} ?>

                <tr>
                        <form id='form-add' method="POST" action="../salva.php">
                            <td>Nova Admissão</td>
                            <td><select id="add-sede" name='sede' class="selectadd intable" required>
                                <option value="" selected="selected"></option>
                                <?php foreach ($listar as $linha):?>
                                    <option value="<?= $linha['SEDE_ID']?>"><?php echo $linha['NOME_SEDE']?></option>
                                <?php endforeach ?>
                              </select></td>
                            <td><select id="add-tipo" name='tipo' class="selectadd intable" required><option value="" selected="selected"></option><option value="1">CLT</option><option value="2">CC</option><option value="3">HO</option><option value="4">TEMP</option><option value="5">APDZ</option></select></td>
                            <td><select id="add-captacao" name='captacao' class="selectadd intable" required><option value="" selected="selected"></option><option value="1">Ex-Funcionario</option><option value="2">Ex-Bolsista</option><option value="3">Ex-Estagiario</option><option value="4">Novo</option></select></td>
                            <td id='add-carga_horaria'><input class='intable' type="number" min="1" max="60" name="carga_horaria" required></td>
                            <td id='add-horario'><input class='intable' type="tel" pattern="[0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}[\s]-[\s][0-2]{1}[0-9]{1}:[0-5]{1}[0-9]{1}" placeholder="00:00 - 11:11" name="horario" required></td>
                            <td id='add-nome'><input class='intable' type="text" name="nome" required></td>
                            <td><select name="sexo" class="intable" value="<?=$rows_dados['SEXO']?>" required>
                                <option value="" selected="selected"></option>
                                <option>Não informou</option>
                                <option>Masculino</option>
                                <option>Feminino</option>
                                <option>Não definido</option>
                            </select></td>
                            <td id='add-fone'><input type="tel" maxlength=“15” pattern="\([0-9]{2}\)[\s][0-9]{1}[\s][0-9]{4}-[0-9]{4}" placeholder="(99) 9 9999-9999" class='intable' name="fone_contato" required></td>
                            <td id='add-cargo'><input class='intable' type="text" name="cargo" required></td>
                            <td id='add-contole-data'><input class='intable' type="date" name="controle_data_admissao" required></td>
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
                            <td id='add-administrativo'></td>
                            <td><button title= "Salvar" type="submit" value="salva" class="botao-salvar btn btn-default" action="#">Salvar</button></td>
                        </form>
                    </tr>
                </tbody>
            </table>
            <section>
                <a title="Exportar telas p/Excel" name = "botao" href="../TabelasExcel/ExcelPaginas.php" class="botao btn btn-default btn-xs btn-filter campo-filter">EXPORTAR P/ EXCEL</a>
            </section>

        </section>
            <section class="legendas estruct">
                <h2 class="titulo">Legendas</h2>
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
