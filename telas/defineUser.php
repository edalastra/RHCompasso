<?php
include("../db/conexao.php");
include("../update.php");
?> 
  <?php
    function defineUser($meuNome){
    //array para comparar depois se o nome da pessoa tem agnome, se tiver, tem que ser ignorado 
    $agnomes = ["junior", "jr.", "segundo", "filho", "neto", "sobrinho", "jr", "bisneto", "filha", "juniar", "jra.", "segunda", "neta", "sobrinha", "bisneta"];
    //remove acento
    $meuNome = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$meuNome);
    $meuNome = strtolower($meuNome);
    //separa
    $meuNome = explode(' ', $meuNome);
    $nome = $meuNome[0];
    $conta = count($meuNome);
    $sobrenome = $meuNome[count($meuNome)-1];
    //conta
    $max = count($agnomes);
    for($i = 0; $i < $max; $i++) {
      if(strcmp($sobrenome, $agnomes[$i]) == 0) {
        $sobrenome = $meuNome[count($meuNome)-2];
        $email = $nome.".". $sobrenome;
      } else {
        $email = $nome.".". $sobrenome;
    }
  }

  //se tem no banco
  $verifica_cpf = buscaUsuario($conn, $email);
  if($verifica_cpf == 1){    
    $sobrenome = $meuNome[count($meuNome)-2];
    $email = $nome.".". $sobrenome;
    }
  //se tem no banco e se ele só tem dois nomes. PENSAR EM ALGO MELHOR, PQ SE TEM AGNOME O SIZE É MAIOR QUE 2 
  //if($verifica_cpf == 1 && sizeof($conta) == 2){    
  // $email = $nome.".". $sobrenome."1";
  //  }
    
return $email;
}
?>


