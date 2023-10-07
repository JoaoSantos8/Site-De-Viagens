$(document).ready(function() {

    $("#dropDownP").click(function() {
        $("#dropDownMenuP").slideToggle();
        $("#dropDownMenuD").slideUp();
        $("#dropDownMenuA").slideUp();

      });
     
      $("#dropDownMenuP").mouseleave(function(){
        $("#dropDownMenuP").slideUp();
      });

      $("#dropDownD").click(function() {
        $("#dropDownMenuD").slideToggle();
        $("#dropDownMenuA").slideUp();
        $("#dropDownMenuP").slideUp();

      });
     
      $("#dropDownMenuD").mouseleave(function(){
        $("#dropDownMenuD").slideUp();
      });

      $("#dropDownA").click(function() {
        $("#dropDownMenuA").slideToggle();
        $("#dropDownMenuD").slideUp();
        $("#dropDownMenuP").slideUp();
      });
     
      $("#dropDownMenuA").mouseleave(function(){
        $("#dropDownMenuA").slideUp();
      });



      /******************* SIGN UP ******************/
      $("#next1").click(function(){

        if($("#identificador").val()=="1"){

        if($("#inputNome").val()==""){
          alert("ESCREVA O SEU NOME");
          $("#inputNome").css("border","solid 5px red");
        }else if($("#inputNome").val().length<4){
          alert("SEU NOME É MUITO PEQUENO");
          $("#inputNome").css("border","solid 5px orange");
        }else if($("#inputNome").val()!="" && $("#inputNome").val().length>4){
          $("#inputNome").css("border","solid 5px var(--success)");
        }


        var mail= $("#inputEmail").val();
        email=IsEmail(mail);


        if($("#inputEmail").val()==""){
          alert("ESCREVA O SEU EMAIL");
          $("#inputEmail").css("border","solid 5px red");
        }else if(email==false){
          alert("O SEU EMAIL NÂO É VÁLIDO");
          $("#inputEmail").css("border","solid 5px orange");
        }else if(email==true){
          $("#inputEmail").css("border","solid 5px rgb(14, 248, 6)");
        }

        if($("#inputIdade").val()<=17){
          alert("A SUA IDADE NÃO É VÁLIDA");
          $("#inputIdade").css("border","solid 5px red");
        }else if($("#inputIdade").val()>17){
          $("#inputIdade").css("border","solid 5px rgb(14, 248, 6)");
        }


        var telefone = $("#inputTelefone").val();
                
        if (!($.isNumeric(telefone)) || telefone.length !== 9) {
            alert("SEU NÚMERO NÃO É VÁLIDO");
            $("#inputTelefone").css("border", "solid 5px red");
        } else {
            $("#inputTelefone").css("border", "solid 5px rgb(14, 248, 6)");
        }

      if($("#inputNome").val()!="" && email==true && $("#inputTelefone").val().length==9 && $("#inputIdade").val()>17){
        $("#primeiraEtapa").css("display","none");
        $("#p1").css("background-color","white");
        $("#p2").css("background-color","var(--blue)");
        $("#segundaEtapa").css("display","block");
        $("#identificador").val(2);
      }
    
    
    
    }else if($("#identificador").val()=="2"){

      $title=$("#imgTitle").text();
      $cargo=$("#select-profession").val();


        if($title=="Sua Imagem"){


          alert("FALTA A SUA IMAGEM");
          $(".file-upload").css("box-shadow","10px 10px 10px 10px red");
          $(".file-upload-btn").css("background","red");
          $(".file-upload-btn").css("border-bottom","solid 4px red");
          $(".file-upload-btn:hover").css("background","red");
          $(".image-upload-wrap").css("border","4px dashed red");
          $(".image-dropping").css("background-color","red");


        }else if($title!="Sua Imagem"){

          $(".file-upload").css("box-shadow","10px 10px 10px 10px var(--blue)");
          $(".file-upload-btn").css("background","var(--blue)");
          $(".file-upload-btn").css("border-bottom","solid 4px var(--blue)");
          $(".file-upload-btn:hover").css("background","var(--blue)");
          $(".image-upload-wrap").css("border","4px dashed var(--blue)");
          $(".image-dropping").css("background-color","var(--blue)");


        }


        if($cargo=="dif"){


          alert("FALTA SELECIONAR O CARGO");
          $("#slect").css("box-shadow","10px 10px 10px 10px red");


        }else if($cargo!="dif"){


          $("#slect").css("box-shadow","10px 10px 10px 10px var(--blue)");


        }


        if($title!="" && $cargo!="dif"){


        $("#segundaEtapa").css("display","none");
        $("#terceiraEtapa").css("display","block");
        $("#identificador").val(3);
        $("#p2").css("background-color","white");
        $("#p3").css("background-color","var(--blue)");
        $("#next1").val("TERMINAR");

        }
      }else if($("#identificador").val()=="3"){


        if($("#inputPass").val().length<4){
          alert("SUA PASSWORD É PEQUENA");
          $("#inputPass").css("border","solid 5px red");
        }else if($("#inputPass").val().length>4){
          $("#inputPass").css("border","solid 5px rgb(14, 248, 6)");
        }


        if($("#inputCPass").val().length<4){
          alert("ESTA PASSWORD É PEQUENA\nE COM CERTEZA NÃO ESTÁ IGUAL");
          $("#inputCPass").css("border","solid 5px red");
        }else if($("#inputCPass").val().length>4){
          $("#inputCPass").css("border","solid 5px orange");
        }


      if($("#inputPass").val()!=$("#inputCPass").val()){
        alert("TEMOS UM PROBLEMA A PASSWORD NÃO CORRESPONDEM");
        $("#inputCPass").css("border","solid 5px orange");
        $("#inputPass").css("border","solid 5px orange");
      }else if($("#inputPass").val()==$("#inputCPass").val() && $("#inputPass").val()!="" && $("#inputCPass").val()!=""){
        alert("PASSWORDS IGUAIS");
        $("#inputCPass").css("border","solid 5px rgb(14, 248, 6)");
        $("#inputPass").css("border","solid 5px rgb(14, 248, 6)");
        $("#next1").attr("type","submit");
      }


      }
    })


    $("#inputPass").hover(function(){
      $(this).attr("type","text");
    });
    $("#inputPass").mouseleave(function(){
      $(this).attr("type","password");
    });


    $("#inputCPass").hover(function(){
      $(this).attr("type","text");
    });
    $("#inputCPass").mouseleave(function(){
      $(this).attr("type","password");
    });


  /************************** Login **********************/

    $("#loginL").click(function(){
      
      var emaile= $("#inputEmailL").val();
      maile=IsEmail(emaile);

      if(maile==false || emaile==""){
        alert("EMAIL INVÁLIDO");
        $("#inputEmailL").css("border","solid 5px red");
      }else if(maile==true){
        $("#inputEmailL").css("border","solid 5px rgb(14, 248, 6)");
      }

      if($("#inputPassL").val()=="" || $("#inputPassL").val().length<4){
        alert("PASSWORD INVÁLIDA");
        $("#inputPassL").css("border","solid 5px red");
      }else if($("#inputPassL").val()!="" && $("#inputPassL").val().length>4){
        $("#inputPassL").css("border","solid 5px rgb(14, 248, 6)");
      }

      if($("#inputPassL").val()!="" && $("#inputPassL").val().length>4 && maile==true){
        $("#loginL").attr("type","submit");
      }


    });

      $("#inputPassL").hover(function(){
        $("#inputPassL").attr("type","text");
      });

      $("#inputPassL").mouseleave(function(){
        $("#inputPassL").attr("type","password");
      });

      $("#link").click(function(){
        $("#menuPerfil").slideToggle();
      })

      $("#menuPerfil").mouseleave(function(){
        $("#menuPerfil").slideUp();
      })
});









/*****************Cargo ************/  


 $(".sel").each(function () {
  $(this).children("select").css("display", "none");

  var $current = $(this);

  $(this)
    .find("option")
    .each(function (i) {
      if (i == 0) {
        $current.prepend(
          $("<div>", {
            class: $current.attr("class").replace(/sel/g, "sel__box")
          })
        );

        var placeholder = $(this).text();
        $current.prepend(
          $("<span>", {
            class: $current.attr("class").replace(/sel/g, "sel__placeholder"),
            text: placeholder,
            "data-placeholder": placeholder
          })
        );

        return;
      }

      $current.children("div").append(
        $("<span>", {
          class: $current.attr("class").replace(/sel/g, "sel__box__options"),
          text: $(this).text()
        })
      );
    });
});

// Toggling the `.active` state on the `.sel`.
$(".sel").click(function () {
  $(this).toggleClass("active");
});

// Toggling the `.selected` state on the options.
$(".sel__box__options").click(function () {
  var txt = $(this).text();
  var index = $(this).index();

  $(this).siblings(".sel__box__options").removeClass("selected");
  $(this).addClass("selected");

  var $currentSel = $(this).closest(".sel");
  $currentSel.children(".sel__placeholder").text(txt);
  $currentSel.children("select").prop("selectedIndex", index + 1);
});





function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
  return false;
  }else{
  return true;
  }
  }

/************************Form Quantidade***************************/

/***************Hoteis*********************************/
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
    $("#inputQuanti").css("border","2px solid red")
  }
});

/***************Viagens*********************************/
function verificar(cont){
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


  /******************************Imagem **********************/
  function lerImagem(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function (e) {
        $(".image-upload-wrap").hide();
  
        $(".file-upload-image").attr("src", e.target.result);
        $(".file-upload-content").show();
  
        $(".image-title").html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
      $("#slect").css("margin-bottom","0%");
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $(".file-upload-input").replaceWith($(".file-upload-input").clone());
    $(".file-upload-content").hide();
    $(".image-upload-wrap").show();
  }
  $(".image-upload-wrap").bind("dragover", function () {
    $(".image-upload-wrap").addClass("image-dropping");
  });
  $(".image-upload-wrap").bind("dragleave", function () {
    $(".image-upload-wrap").removeClass("image-dropping");
  });

