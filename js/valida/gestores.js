$('document').ready(function() {
    let originalLocation = $("#selectUser").attr('href');
    let separa = originalLocation.split('?');
    let id = separa[1];
    let destination = "gestao.php?" + id;

    $("#selectUser").attr('href', destination);
        
});