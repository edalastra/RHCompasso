<?php
require_once("db/conexao.php");
include("update.php");
include("emails/defineNomeDoGrupoDeEmail.php");


		$id_sede = $_POST["sede"];
		$id_tipo = $_POST["tipo"];
		$id_captacao = $_POST["captacao"];
		$carga_horaria = $_POST["carga_horaria"];
		$horario = $_POST["horario"];
		$nome = $_POST["nome"];
		$fone_contato = $_POST["fone_contato"];
		$data_admissao = $_POST["data_admissao"];
		$cargo = $_POST["cargo"];
		$solicitante = $_POST["solicitante"];
		$controle_data_admissao = $_POST["controle_data_admissao"];
		$remuneracao_base = $_POST["remuneracao_base"];
		$gratificacao = $_POST["gratificacao"];


		//$remuneracao_total = soma dos campos remuneração base e gratificação;
		$cliente = $_POST["cliente"];
		$projeto = $_POST["projeto"];
		$email = $_POST["email"];
		$posicao_data = $_POST["posicao_data"];
		$posicao_comentario = $_POST["posicao_comentario"];
		$administrativo = $_POST["administrativo"];



		$sql = "INSERT INTO `admissao_dominio` ( `STATUS`,`ID_SEDE`,`ID_TIPO`,`ID_CAPTACAO`,`CARGA_HORARIA`, `HORARIO`,`NOME`, `FONE_CONTATO`, `DATA_ADMISSAO`,  `CARGO`, `SOLICITANTE`, `CONTROLE_DATA_ADMISSAO`, `REMUNERACAO_BASE`, `GRATIFICACAO`, `CLIENTE` , `PROJETO`, `EMAIL`, `POSICAO_DATA`, `POSICAO_COMENTARIO`, `ADMINISTRATIVO`)
		VALUES ('EM VALIDAÇÃO','$id_sede','$id_tipo','$id_captacao','$carga_horaria','$horario','$nome', '$fone_contato', '$data_admissao', '$cargo',  '$solicitante', '$controle_data_admissao', '$remuneracao_base', '$gratificacao', '$cliente', '$projeto', '$email', '$posicao_data', '$posicao_comentario', '$administrativo')";


		$execQuery = mysqli_query($conn,$sql);

		if($execQuery == ""){
			echo("Ocorreu um erro durante a inserção na tabela!!");
		}else{
			//echo("Dados inseridos com sucesso");
			header("Location: http://localhost/RHCompasso/telas/menuPrincipal.php");
		}



?>
