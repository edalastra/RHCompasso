<?php
	include("db/conexao.php")
?>
<?php
		//listar sedes
		function listar($conn){
			$query = "SELECT * from sede";
			$resultado = mysqli_query($conn, $query);
			return $resultado;
		}
		//função joao
		function buscaSedeFuncionario($conn, $id){
			$query = "SELECT nome_sede from sede where sede_id = '{$id}'";
			$sede = mysqli_query($conn, $query);
			return mysqli_fetch_assoc($sede);
		}
		function buscaCargoFuncionario($conn, $id){
			$query = "SELECT CARGO FROM admissao_dominio WHERE USUARIO_ID = '{$id}'";
			$cargo = mysqli_query($conn, $query);
			return mysqli_fetch_assoc($cargo);
		}

	// ################# BUSCA PELA TABELA INICIAL ADMISSAO_DOMINIO ###########################

	function projeto($conn, $USUARIO_ID, $PROJETO){
	$query = "UPDATE admissao_dominio set PROJETO = '{$PROJETO}' where USUARIO_ID = '$USUARIO_ID'";
	return mysqli_query($conn, $query);
	}
	function status($conn, $USUARIO_ID, $STATUS){
		$query = "UPDATE admissao_dominio set STATUS = '{$STATUS}' where USUARIO_ID = '$USUARIO_ID'";
		return mysqli_query($conn, $query);
	}
	function buscaFuncionarios($conn, $id) {
		$query = "SELECT * from admissao_dominio where USUARIO_ID = '{$id}'";
		$buscafuncionarios = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($buscafuncionarios);
	}

	function funcionario($conn, $USUARIO_ID, $ID_SEDE, $ID_TIPO, $ID_CAPTACAO, $CARGA_HORARIA, $HORARIO, $NOME, $FONE_CONTATO, $DATA_ADMISSAO, $CARGO, $SOLICITANTE, $CONTROLE_DATA_ADMISSAO, $REMUNERACAO_BASE, $GRATIFICACAO, $CLIENTE, $PROJETO, $EMAIL, $ADMINISTRATIVO, $POSICAO_DATA, $POSICAO_COMENTARIO) {
		$query = "UPDATE admissao_dominio set ID_SEDE = '{$ID_SEDE}', ID_TIPO = '{$ID_TIPO}', ID_CAPTACAO = '{$ID_CAPTACAO}', CARGA_HORARIA = '{$CARGA_HORARIA}', HORARIO = '{$HORARIO}', NOME = '{$NOME}', FONE_CONTATO = '{$FONE_CONTATO}', DATA_ADMISSAO = '{$DATA_ADMISSAO}', CARGO = '{$CARGO}', SOLICITANTE = '{$SOLICITANTE}', CONTROLE_DATA_ADMISSAO = '{$CONTROLE_DATA_ADMISSAO}', REMUNERACAO_BASE = '{$REMUNERACAO_BASE}', GRATIFICACAO = '{$GRATIFICACAO}', CLIENTE = '{$CLIENTE}', PROJETO = '{$PROJETO}', EMAIL='{$EMAIL}', ADMINISTRATIVO = '{$ADMINISTRATIVO}', POSICAO_DATA = '{$POSICAO_DATA}', POSICAO_COMENTARIO = '{$POSICAO_COMENTARIO}'  where USUARIO_ID = '{$USUARIO_ID}'";
		return mysqli_query($conn, $query);
	}

		// ################# BUSCA PELA PAGINA BANCARIO ###########################
	function buscaBancario($conn, $id) {
		$query = "SELECT * from bancarios where ID_USUARIO = '{$id}'";
		$bancarios = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($bancarios);
	}

	function bancario($conn, $ID_USUARIO, $ENVIO, $RECEBIDO, $ANEXAR_COMPR_DOMIN, $PLANILHA_CONTAS, $FORM_COMPR_BANCARIO, $AGENCIA, $NUMERO_CONTA, $TIPO_CONTA) {
		$query = "UPDATE bancarios set ENVIO = '{$ENVIO}', RECEBIDO ='{$RECEBIDO}', ANEXAR_COMPR_DOMIN  = '{$ANEXAR_COMPR_DOMIN}', PLANILHA_CONTAS ='{$PLANILHA_CONTAS}', FORM_COMPR_BANCARIO = '{$FORM_COMPR_BANCARIO}', AGENCIA = '{$AGENCIA}', NUMERO_CONTA = '{$NUMERO_CONTA}', TIPO_CONTA = '{$TIPO_CONTA}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


		// ################# BUSCA PELA PAGINA FUNCIONARIO ###########################
	function Proposta($conn, $ID_USUARIO, $PROPOSTA_RECEBIDA, $DE_ACORDO_DIRECAO, $ENQUADRAMENTO, $ENVIO_PROPOSTA, $COMUNICAR_PROPOSTA_ENVIADA,$ACEITA_RECUSA_CANDIDATO, $COMENTARIO, $COMUNICAR_STATUS){
		$query = "UPDATE propostas_contratacoes set PROPOSTA_RECEBIDA = '{$PROPOSTA_RECEBIDA}', DE_ACORDO_DIRECAO = '{$DE_ACORDO_DIRECAO}', ENQUADRAMENTO = '{$ENQUADRAMENTO}', ENVIO_PROPOSTA = '{$ENVIO_PROPOSTA}', COMUNICAR_PROPOSTA_ENVIADA = '{$COMUNICAR_PROPOSTA_ENVIADA}', ACEITE_RECUSA_CANDIDATO = '{$ACEITA_RECUSA_CANDIDATO}', COMENTARIO = '{$COMENTARIO}', COMUNICAR_STATUS = '{$COMUNICAR_STATUS}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}

	function buscaProposta($conn, $id) {
		$query = "SELECT * from propostas_contratacoes where ID_USUARIO = '{$id}'";
		$funcionarios = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($funcionarios);
	}


		// ################# BUSCA PELA PAGINA DOCUMENTOS ###########################
	function buscadocs($conn, $id) {
		$query = "SELECT * from documentacao where ID_USUARIO = '{$id}'";
		$docs = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($docs);
	}

	function Documentacao($conn, $ID_USUARIO, $FORMULARIOS_ENVIADOS, $FORMULARIOS_RECEBIDOS, $DOCUMENTOS_FISICOS, $CTPS_RECEBIDA){
		$query = "UPDATE documentacao set FORMULARIOS_ENVIADOS = '{$FORMULARIOS_ENVIADOS}', FORMULARIOS_RECEBIDOS = '{$FORMULARIOS_RECEBIDOS}', DOCUMENTOS_FISICOS = '{$DOCUMENTOS_FISICOS}', CTPS_RECEBIDA = '{$CTPS_RECEBIDA}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


		// ################# BUSCA PELA PAGINA ADMISSAO ###########################
	function buscaadmissao($conn, $id) {
		$query = "SELECT * from admissao where ID_USUARIO = '{$id}'";
		$admissoes = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($admissoes);
	}

	function admissao($conn, $ID_USUARIO, $QUALIFIC_CADASTRAL_CEP, $CAD_ADM_PLATAFORMA_ADM_DIMIN, $DOC_RECEBIDO_PLATAFORMA_DOMIN_CBO, $TERMO_PSI, $INCLUI_ADM_PROV){
		$query = "UPDATE admissao set QUALIFIC_CADASTRAL_CEP = '{$QUALIFIC_CADASTRAL_CEP}', CAD_ADM_PLATAFORMA_ADM_DIMIN = '{$CAD_ADM_PLATAFORMA_ADM_DIMIN}', DOC_RECEBIDO_PLATAFORMA_DOMIN_CBO = '{$DOC_RECEBIDO_PLATAFORMA_DOMIN_CBO}', TERMO_PSI = '{$TERMO_PSI}', INCLUI_ADM_PROV = '{$INCLUI_ADM_PROV}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


		// ################# BUSCA PELA PAGINA EXAME ###########################
	function buscaexame ($conn, $id) {
		$query = "SELECT * from exame_admissional where ID_USUARIO = '{$id}'";
		$exame = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($exame);
	}

	function exame($conn, $ID_USUARIO, $AGENDAMENTO_EXAM_ADM, $ENVIO_FUNC_EXAME, $EMAIL_RECEBIDO_EXAM, $ANEXAR_ASO){
		$query = "UPDATE exame_admissional set AGENDAMENTO_EXAM_ADM = '{$AGENDAMENTO_EXAM_ADM}', ENVIO_FUNC_EXAME='{$ENVIO_FUNC_EXAME}', EMAIL_RECEBIDO_EXAM = '{$EMAIL_RECEBIDO_EXAM}', ANEXAR_ASO='{$ANEXAR_ASO}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


		// ################# BUSCA PELA PAGINA SUPORTE INTERNO ###########################
	function buscasuporte ($conn, $id) {
		$query = "SELECT * FROM suporte_interno WHERE ID_USUARIO = '{$id}'";
		$suporte = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($suporte);
	}

	function suporte ($conn, $ID_USUARIO, $EMAIL_SUP, $USUARIO, $SENHA, $EQUIPAMENTO, $TRANSLADO, $GRUPOS_DE_EMAIL){
		$query = "UPDATE suporte_interno set EMAIL_SUP = '{$EMAIL_SUP}', USUARIO='{$USUARIO}', SENHA = '{$SENHA}', EQUIPAMENTO='{$EQUIPAMENTO}',TRANSLADO = '{$TRANSLADO}', GRUPOS_DE_EMAIL = '{$GRUPOS_DE_EMAIL}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


		// ################# BUSCA PELA PAGINA INTERNO ###########################
	function buscainterno ($conn, $id) {
		$query = "SELECT * FROM interno WHERE ID_USUARIO = '{$id}'";
		$interno = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($interno);
	}

	function interno ($conn, $ID_USUARIO, $INTRANET_CADASTRO_USUARIO, $INTRANET_CADASTRO_SENHA, $KAIROS_CADASTRO_USUARIO, $KAIROS_CADASTRO_SENHA, $EMAIL_GESTOR_APOIO_SEDE, $EMAIL_INICIO_ATIVIDADES, $EMAIL_BOAS_VINDAS, $ACESSOS){
		$query = "UPDATE interno set INTRANET_CADASTRO_USUARIO = '{$INTRANET_CADASTRO_USUARIO}', INTRANET_CADASTRO_SENHA ='{$INTRANET_CADASTRO_SENHA}', KAIROS_CADASTRO_USUARIO = '{$KAIROS_CADASTRO_USUARIO}', KAIROS_CADASTRO_SENHA ='{$KAIROS_CADASTRO_SENHA}', EMAIL_GESTOR_APOIO_SEDE = '{$EMAIL_GESTOR_APOIO_SEDE}', EMAIL_INICIO_ATIVIDADES = '{$EMAIL_INICIO_ATIVIDADES}', EMAIL_BOAS_VINDAS ='{$EMAIL_BOAS_VINDAS}', ACESSOS = '{$ACESSOS}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


		// ################# BUSCA PELA PAGINA VIAS DOCUMENTOS ###########################
	function buscavias ($conn, $id) {
		$query = "SELECT * FROM vias_documentos_funcionarios WHERE ID_USUARIO = '{$id}'";
		$vias = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($vias);
	}

	function viasDocs($conn, $ID_USUARIO, $CRACHA_DATA_PEDIDO, $CRACHA_CONTROLE, $CRACHA_PROTOCOLO, $EMAIL_CADERNO_COMPASSO_SOLICITADO, $EMAIL_CADERNO_COMPASSO_RECEBIDO, $MALOTE_CADERNO_COMPASSO_CTPS, $DOCUMENTOS_RECEBIDOS_ASSINADOS){
		$query = "UPDATE vias_documentos_funcionarios set `CRACHA_DATA_PEDIDO`= '{$CRACHA_DATA_PEDIDO}',`CRACHA_CONTROLE`= '{$CRACHA_CONTROLE}',`CRACHA_PROTOCOLO`= '{$CRACHA_PROTOCOLO}', EMAIL_CADERNO_COMPASSO_SOLICITADO = '{$EMAIL_CADERNO_COMPASSO_SOLICITADO}', EMAIL_CADERNO_COMPASSO_RECEBIDO ='{$EMAIL_CADERNO_COMPASSO_RECEBIDO}', MALOTE_CADERNO_COMPASSO_CTPS = '{$MALOTE_CADERNO_COMPASSO_CTPS}', DOCUMENTOS_RECEBIDOS_ASSINADOS ='{$DOCUMENTOS_RECEBIDOS_ASSINADOS}' where ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}

		// ################# BUSCA PELA PAGINA BOAS VINDAS ###########################
	function buscaRecepcao ($conn, $id) {
		$query = "SELECT * FROM boas_vindas WHERE ID_USUARIO = '{$id}'";
		$boasvindas = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($boasvindas);
	}

	function recepcao ($conn, $ID_USUARIO, $BOAS_VINDAS_INGR_AGENDADA, $BOAS_VINDAS_INGR_REALIZADA, $BOAS_VINDAS_SALA, $BOAS_VINDA_ACOMPANHAMENTO_MENSAL, $LAYOUT_BOAS_VINDAS_MENSAL){
		$query = "UPDATE `boas_vindas` SET  `BOAS_VINDAS_INGR_AGENDADA`= '{$BOAS_VINDAS_INGR_AGENDADA}',`BOAS_VINDAS_INGR_REALIZADA`= '{$BOAS_VINDAS_INGR_REALIZADA}',`BOAS_VINDAS_SALA`= '{$BOAS_VINDAS_SALA}',`BOAS_VINDA_ACOMPANHAMENTO_MENSAL`= '{$BOAS_VINDA_ACOMPANHAMENTO_MENSAL}',`LAYOUT_BOAS_VINDAS_MENSAL`= '{$LAYOUT_BOAS_VINDAS_MENSAL}' WHERE ID_USUARIO = '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}


	// ########################## BUSCA PELA TELA GESTAO ################ //

	function buscagestao ($conn, $id){
		$query = "SELECT * FROM gestao WHERE ID_USUARIO = '{$id}'";
		$gestao = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($gestao);
	}

	function gestao($conn, $ID_USUARIO, $GESTOR, $GESTOR_SABE, $GESTOR_LOCAL, $GESTOR_LOCAL_sABE, $RECEPTOR_PESSOA){
		$query = "UPDATE `gestao` SET `GESTOR` = '{$GESTOR}', `GESTOR_SABE` = '{$GESTOR_SABE}', `GESTOR_LOCAL` = '{$GESTOR_LOCAL}', `GESTOR_LOCAL_sABE` = '{$GESTOR_LOCAL_sABE}', `RECEPTOR_PESSOA`= '{$RECEPTOR_PESSOA}' where `ID_USUARIO`= {$ID_USUARIO}";
		return mysqli_query($conn, $query);
	}

	// ######################### BUSCA PELA TELA VENCIMENTOS CONTRATOS ########### //

	function buscavencimentos ($conn, $id){
		$query = "SELECT * FROM vencimentos WHERE ID_USUARIO = '{$id}'";
		$vencimentos = mysqli_query($conn, $query);
		return mysqli_fetch_assoc($vencimentos);
	}
	function vencimentos($conn, $ID_USUARIO, $ENVIO_SOLICITANTE_PRI, $DATA_VENCIMENTO_PRI, $RENOVACAO, $ENVIO_SOLICITANTE_SEG, $EFETIVACAO, $DATA_VENCIMENTO_SEG){
		$query = "UPDATE `vencimentos` SET `ENVIO_SOLICITANTE_PRI` = '{$ENVIO_SOLICITANTE_PRI}', `DATA_VENCIMENTO_PRI` = '{$DATA_VENCIMENTO_PRI}', `RENOVACAO` = '{$RENOVACAO}', `ENVIO_SOLICITANTE_SEG`= '{$ENVIO_SOLICITANTE_SEG}', `DATA_VENCIMENTO_SEG`= '{$DATA_VENCIMENTO_SEG}', `EFETIVACAO`= '{$EFETIVACAO}'  where `ID_USUARIO`= '{$ID_USUARIO}'";
		return mysqli_query($conn, $query);
	}

?>
