<?php
  function defineUser($meuNome){
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
