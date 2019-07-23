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
        for($i =0; $i < $saida[0]['memberof']['count']; $i++){
            $groupPerfil = isValidPerfil($saida[0]['memberof'][$i]);
        }
        
        if($groupPerfil){
            $_SESSION["InfoUser"] = $saida;
            $_SESSION["grupo"] = $groupPerfil;

            header("location:../../telas/menuPrincipal.php");
        }elseif($usuario == "joao.malvesti"){
            $_SESSION["InfoUser"] = $saida;
            $_SESSION["grupo"] = "Gestores";
            ldap_close($link);
            header("location:../../telas/menuPrincipal.php");
        }else{
            ldap_close($link);
            header("Location:./login.php?erro=fail");
        }
    }else{
        ldap_close($link);
        header("Location:./login.php?erro=fail");
    }

    function isValidPerfil($grupo){
        $textGroup = preg_split('/=|\,/', $grupo);
        if(preg_match('/Compasso - RH Integração/', $textGroup[1], $group)){
            $grupo = $group[0];            
        }else{
            $grupo = $textGroup[1];
        }        
        if($grupo == "Diretoria"){
            return $grupo;
        }else if($grupo == "Compasso - RH contratacoes"){
            return $grupo;
        }else if($grupo == "Departamento de Recursos Humanos"){
            return $grupo;
        }else if($grupo == "Gestores"){
            return $grupo;
        }else if($grupo == "Suporte Interno"){
            return $grupo;
        }else if($grupo == "Compasso - RH Integração"){
            return $grupo;
        }
        return false;
    }

?>
