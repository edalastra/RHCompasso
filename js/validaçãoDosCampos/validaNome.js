function validaNome(id){ 
    var nome = document.getElementById(id).value;
    var padrao = /[^a-zà-ú]/gi;
    var valida_nome = nome.match(padrao);
    if( valida_nome || !nome || nome.lenght < 3 ){
       alert("Nome não foi preenchido, possui caracteres inválidos, ou é muito pequeno!")
    }
 }
