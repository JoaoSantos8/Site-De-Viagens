
/***************Hoteis*********************************/
$(document).ready(function() {

$("#btnHotel").click(function(){
    $("#btnHotel").css("display","none");
    $("#quanti").slideDown();
    $("#quanti").val("");
    $("#formHotel").slideDown();
    $("#btnH").slideDown();
  });
  
  
  
  $("#btnH").click(function(){
  var Quantidade = $("#inputQuanti").val();
  if(Quantidade!=0){
  $("#formHotel").submit();
  }else{
    alert("Noites Inválidas");
    $("#inputQuanti").css("border","2px solid red")
  }
  });
});