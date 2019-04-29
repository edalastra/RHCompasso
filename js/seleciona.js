
/* $('#foo').on('click',function( ){
    var copyContent = $('.selecionaPagina').html();
    $('.selecionaPagina').html(copyContent)
    var copy  = $('<input>').val(copy).appendTo('html').select()
    document.execCommand('copy')
})
*/

/*
$('#foo', 'html')
	.find('button')
		.livequery('click', function() {
			$(this)
				.blur();
			//console.log('copied to copy window');
			var nodetext = $('#selecionaPagina').html();
			$('#copypath input').focus();
			$('#copypath input').select();
			return false;
        });
*/

document.querySelector("#foo").onclick = function() {
    var divACopiar = document.querySelector("#selecionaPagina");

    var range = document.createRange();
    range.selectNode(divACopiar);
    window.getSelection().addRange(range);
    document.execCommand("copy");
};
