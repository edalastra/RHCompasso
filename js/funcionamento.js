// BOTÃO DE ANEXO TABELA
$(function() {
    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });
});
//--------------------------------------------------------------------
/*
var navListItems = $('div.setup-panel div a'),
    link = $('div.setup-panel div a href')
navListItems.click(function (e) {

    e.preventDefault();
    if(!$(this).attr('disabled') === true){
        console.log('que')
        
    }
});
*/