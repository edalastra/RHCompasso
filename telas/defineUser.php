<?php
  function defineUser($meuNome){
    $meuNome = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$meuNome);
    $meuNome = strtolower($meuNome);
    //separa
    $meuNome = explode(' ', $meuNome);
    //conta
    $nomele = (count($meuNome));
    if($nomele > 1){
      $firstName = $meuNome[0];
      $lastName = $meuNome[$nomele-1];
      $espaco = '.';
    } else{
      $firstName = $meuNome[0];
      $lastName = '';
      $espaco = '.';
    }
    //contatena
    $fullName = $firstName.$espaco.$lastName;
    return $fullName;
  }
?>
