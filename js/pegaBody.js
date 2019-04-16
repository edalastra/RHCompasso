function pegaBody(div, divInput){
  var divBody = div.html();
  divInput.value = divBody;
  console.log(divInput.val());
  div.on("input", function(){
    var divBody = div.html();
    divInput.value = divBody;
  });
}
