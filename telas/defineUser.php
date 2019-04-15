<?php
  function defineUser($meuNome){
    $agnomes = ["junior", "jr.", "segundo", "filho", "neto", "sobrinho", "jr", "bisneto", "filha", "juniar", "jra.", "segunda", "neta", "sobrinha", "bisneta"];
    $meuNome = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$meuNome);
    $meuNome = strtolower($meuNome);
    //separa
    $meuNome = explode(' ', $meuNome);
    $nome = $meuNome[0];
    $sobrenome = $meuNome[count($meuNome)-1];
    //conta
    $max = count($agnomes);
    for($i = 0; $i < $max; $i++) {
      if(strcmp($sobrenome, $agnomes[$i]) == 0) {
        $sobrenome = $meuNome[count($meuNome)-2];
        $email = $nome . ".". $sobrenome;
      } else {
        $email = $nome . ".". $sobrenome;
    }
  }
return $email;
}
?>


