/***************Viagens*********************************/

function verificarViagem(cont){
    var Quantidade = $("#inputQuantiV").val();
    if(Quantidade!=0){
      if(Quantidade>cont){
      alert("SEM LUGARES SUFICIENTES");
      $("#inputQuantiV").css("border","2px solid red");
      }else if(Quantidade<=cont){
      $("#formViagens").submit(); 
    }
    }else{
      alert("LUGARES INVÁLIDOS");
      $("#inputQuantiV").css("border","2px solid red");
    }
  }
  
  
  $("#btnViagens").click(function(){
    $("#btnViagens").css("display","none");
    $("#quantiV").slideDown();
    $("#quantiV").val("");
    $("#formViagens").slideDown();
    $("#btnV").css("display","block");
  });
