//-------------------------------------------- aparecer filtro
var inicio = 0
$('.filter').on('click', function(){
    $('.panel-body').removeClass('display');
    var painel = $('.panel-body');
    if(inicio == 0){
        painel.removeClass('display');
        inicio += 1;
    }else{
        painel.addClass('display');
        inicio = 0;

    }
}
);

//----------------------------------------------------------------------

//----------------------ir para segundo html ao clicar no candidato
hide = 0
$(".atualiza").hide()

$(".bto-update").click(function(e){
    e.preventDefault()
    if(hide == 0){
        hide += 1
        $(".atualiza").show()
    }else{
        $(".atualiza").hide()
        hide = 0

    }

});
//-------------------------------------------------------------------------

