<?php
//export.php
$connect = mysqli_connect("localhost", "root", "", "bancorh");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT NOME,
                  EMAIL,
                  STATUS,
                  PROPOSTA_RECEBIDA,
                  DE_ACORDO_DIRECAO,
                  ENQUADRAMENTO,
                  ENVIO_PROPOSTA,
                  COMUNICAR_PROPOSTA_ENVIADA,
                  ACEITE_RECUSA_CANDIDATO,
                  COMENTARIO,
                  COMUNICAR_STATUS,
                  PROJETO
                  FROM admissao_dominio AS a
                  LEFT JOIN propostas_contratacoes AS p
                  on ID_USUARIO = USUARIO_ID
                  WHERE ID_USUARIO = USUARIO_ID";

$result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
                  <tr>
                  <th width= "150px">Nome</th>
                  <th width= "150px">Email</th>
                  <th width= "150px">STATUS</th>
                  <th width= "150px">Proposta Recebida</th>
                  <th width= "150px">De acordo Direção</th>
                  <th width= "150px">Enquadramento(Validação Ex Funcionário)</th>
                  <th width= "150px">Envio da Proposta</th>
                  <th width= "150px">Comunicar proposta enviada Solicitante</th>
                  <th width= "150px">Aceite/recusa candidato</th>
                  <th width= "150px">Comentário</th>
                  <th width= "150px">Comunicar Status da Proposta ao Solicitante</th>
                  <th width= "150px">Projeto</th>
                  </tr>

  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
            <tr>
            <td>'.$row["NOME"].'</td>
            <td>'.$row["EMAIL"].'</td>
            <td>'.$row["STATUS"].'</td>
            <td>'.$row["PROPOSTA_RECEBIDA"].'</td>
            <td>'.$row["DE_ACORDO_DIRECAO"].'</td>
            <td>'.$row['ENQUADRAMENTO'].'</td>
            <td>'.$row["ENVIO_PROPOSTA"].'</td>
            <td>'.$row['COMUNICAR_PROPOSTA_ENVIADA'].'</td>
            <td>'.$row["ACEITE_RECUSA_CANDIDATO"].'</td>
            <td>'.$row["COMENTARIO"].'</td>
            <td>'.$row["COMUNICAR_STATUS"].'</td>
            <td>'.$row["PROJETO"].'</td>
            </tr>
            ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Tabela2.xls');
  echo $output;
 }
}
?>
