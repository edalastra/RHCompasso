document.querySelector("#enviar").onclick = function(){
  var divACopiar = document.querySelector("#selecionaPagina");
  console.log(divACopiar);

  function sendMail(corpo) {
    var link = 'mailto:jpmf1995@gmail.com?subject=Message from guga.m@hotmail.com'
            +'&body='+ corpo;
            window.location.href = link;
    }
    sendMail(divACopiar);
}
