<?php
    require_once('../../db/serverLDAP.php');
    
    session_start();

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    if($usuario == NULL || $senha == NULL){
        header("Location:./login.php?erro=fail");
    }
   
    $dominio = "pampa.compasso";

    // Versao do protocolo       
    ldap_set_option($link, LDAP_OPT_PROTOCOL_VERSION, 3);
    // Usara as referencias do servidor AD, neste caso nao
    ldap_set_option($link, LDAP_OPT_REFERRALS, 0);
    
    $r = @ldap_bind($link, $usuario.'@'.$dominio, $senha);
        
    $filtro = "(samaccountname=".$usuario.")";
    $justthese = array("*");
    $res = ldap_search($link, "dc=pampa,dc=compasso", $filtro, $justthese);
    $saida = ldap_get_entries($link, $res);
                    
    if($saida['count'] > 0){
        $_SESSION["InfoUser"] = $saida;
        ldap_close($link);
        header("location:../../telas/menuPrincipal.php");

    }else{
        ldap_close($link);
        header("Location:./login.php?erro=fail");
    }

    

    
    
    
    

?>
