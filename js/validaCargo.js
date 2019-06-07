function validaCargo(){
    var selecionaCargo = $("#add-tipo");
    var campoHoras = $("#campo-carga_horaria");

    if(selecionaCargo.val() == 2 || selecionaCargo.val() == 3){
        campoHoras.attr("disabled",true);
        campoHoras.attr("required",false);
    }else{
        campoHoras.attr("disabled",false);
        campoHoras.attr("required",true);
    }
}