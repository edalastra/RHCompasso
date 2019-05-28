function validaNome(nome) {
        if(nome.value == """ || nome.value == null || nome.value.lenght < 3) {
            alert("Por favor, indique o seu nome.");
            nome.focus();
            return false;
        }