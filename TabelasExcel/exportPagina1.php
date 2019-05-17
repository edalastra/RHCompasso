<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "bancorh");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM admissao_dominio";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                        <th width="150px">Status</th>
                        <th width="60px">Sede</th>
                        <th width="60px">Tipo</th>
                        <th width="100px">Sexo</th>
                        <th width="100px">Captação</th>
                        <th width="100px">Carga Horária</th> 
                        <th width="100px">Horário</th> 
                        <th width="200px">Nome</th>
                        <th width="85px">Fone</th>
                        <th width="100px">Cargo</th>
                        <th width="110px">Controle Data Admissão</th>
                        <th width="100px">Remuneração Base</th>
                        <th width="100px">Gratificação</th>
                        <th width="200px">Solicitante</th>
                        <th width= "150px">Cliente</th>
                        <th width="150px">Projeto</th>
                        <th width="250px">Email</th>
                        <th width="110px">Data Admissão</th>
                        <th width="110px">Posição(Data)</th>
                        <th width="200px">Posição(Comentários)</th>
                        <th width="200px">Administrativo + Flyback - Hotel</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
        <tr>  
            <td>'.$row["STATUS"].'</td>  
            <td>'.$row["NOME_SEDE"].'</td>  
            <td>'.$row["NOME_TIPO"].'</td>
            <td>'.$row["SEXO"].'</td>  
            <td>'.$row['NOME_PARAMETRO'].'</td>
            <td>'.$row["CARGA_HORARIA"].'</td>  
            <td>'.$row['HORARIO'].'</td>
            <td>'.$row["NOME"].'</td>
            <td>'.$row["FONE_CONTATO"].'</td>
            <td>'.$row["CARGO"].'</td>
            <td>'.$row["CONTROLE_DATA_ADMISSAO"].'</td>
            <td>'.$row["REMUNERACAO_BASE"].'</td>
            <td>'.$row["GRATIFICACAO"].'</td>
            <td>'.$row["SOLICITANTE"].'</td>
            <td>'.$row["PROJETO"].'</td>
            <td>'.$row["CLIENTE"].'</td>
            <td>'.$row["EMAIL"].'</td>
            <td>'.$row["DATA_ADMISSAO"].'</td>
            <td>'.$row["POSICAO_DATA"].'</td>
            <td>'.$row["POSICAO_COMENTARIO"].'</td>
            <td>'.$row["ADMINISTRATIVO"].'</td>
        </tr>  
        ';  
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Tabela1.xls');
  echo $output;
 }
}
?>
