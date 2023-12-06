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
      
      $("#signUpBaixo").click(function(){
        var nome = $('#inputNome').val().trim();
                var email = $("#inputEmail").val();
                var maile = IsEmail(email);
                var telefone = $("#inputTelefone").val().trim();
                var idade = $("#inputIdade").val();
                var pass = $("#inputPass").val().trim();
                var passC = $("#inputPassC").val().trim();

                if (nome === "") {
                    $("#inputNome").css("border-bottom", "5px solid red");
                    event.preventDefault();
                } else {
                    $("#inputNome").css("border-bottom", "5px solid greenyellow");
                }

                if (email === "" || maile === false) {
                    $("#inputEmail").css("border-bottom", "5px solid red");
                    event.preventDefault();
                } else {
                    $("#inputEmail").css("border-bottom", "5px solid greenyellow");
                }

                if (!($.isNumeric(telefone)) || telefone.length !== 9) {
                    $("#inputTelefone").css("border-bottom", "5px solid red");
                    event.preventDefault();
                } else {
                    $("#inputTelefone").css("border-bottom", "5px solid greenyellow");
                }

                if (idade === "" || isNaN(idade) || idade < 18) {
                    $("#inputIdade").css("border-bottom", "5px solid red");
                    event.preventDefault();
                } else {
                    $("#inputIdade").css("border-bottom", "5px solid greenyellow");
                }

                
                var senhaValida = validarSenha(pass);

                if (passC === "" || passC !== pass) {
                  alert("As Passwords São Diferentes")
                    $("#inputPassC").css("border-bottom", "5px solid red");
                    event.preventDefault();
                } else {
                    $("#inputPassC").css("border-bottom", "5px solid greenyellow");
                }

                if (nome !== "" && email !== "" && maile && telefone !== "" && idade !== "" && !isNaN(idade) && idade >= 18 && senhaValida==true && passC !== "" && passC === pass) {
                    $("#signUpForm").submit();
                }
      });

        $("#inputPass").hover(function(){
          $(this).attr("type","text");
          $(this).css("cursor","pointer");
        });
        $("#inputPass").mouseleave(function(){
          $(this).attr("type","password");
        });
    
    
        $("#inputPassC").hover(function(){
          $(this).attr("type","text");
          $(this).css("cursor","pointer");
        });
        $("#inputPassC").mouseleave(function(){
          $(this).attr("type","password");
        });

      function validarSenha(senha) {
        var comprimentoMinimo = 8;
        var possuiCaracterEspecial = /[!@#$%^&*(),.?":{}|<>]/.test(senha);
        var possuiNumero = /\d/.test(senha);
        var possuiMaiuscula = /[A-Z]/.test(senha);
        var possuiMinuscula = /[a-z]/.test(senha);
    
        if (senha.length < comprimentoMinimo) {
            alert("A senha deve ter pelo menos " + comprimentoMinimo + " caracteres.");
            $("#inputPass").css("border-bottom", "5px solid red");
            return false;
        } else if (!possuiCaracterEspecial) {
            alert("A senha deve conter pelo menos um caracter especial.");
            $("#inputPass").css("border-bottom", "5px solid red");
            return false;
        } else if (!possuiNumero) {
            alert("A senha deve conter pelo menos um número.");
            $("#inputPass").css("border-bottom", "5px solid red");
            return false;
        } else if (!possuiMaiuscula) {
            alert("A senha deve conter pelo menos uma letra maiúscula.");
            $("#inputPass").css("border-bottom", "5px solid red");
            return false;
        } else if (!possuiMinuscula) {
            alert("A senha deve conter pelo menos uma letra minúscula.");
            $("#inputPass").css("border-bottom", "5px solid red");
            return false;
        } else {
          $("#inputPass").css("border-bottom", "5px solid greenyellow");
            return true;
        }
    }
  /************************** Login **********************/

if (window.location.href.indexOf("login.php") > -1) {
  $(window).on("keydown", function(event) {
      if (event.keyCode === 13) {
          login();
      }
  });
}

$("#confirmarL").click(function(){
    var emaile = $("#inputEmailL").val();
    var maile = IsEmail(emaile);

    if (maile == false || emaile == "") {
        $("#inputEmailL").css("border-bottom", "solid 5px red");
        event.preventDefault();
    } else if (maile == true) {
        $("#inputEmailL").css("border-bottom", "solid 5px greenyellow");
    }

    if ($("#inputPassL").val() == "" || $("#inputPassL").val().length < 4) {
        $("#inputPassL").css("border-bottom", "solid 5px red");
        event.preventDefault();
    } else if ($("#inputPassL").val() != "" && $("#inputPassL").val().length > 4) {
        $("#inputPassL").css("border-bottom", "solid 5px greenyellow");
    }

    if ($("#inputPassL").val() != "" && $("#inputPassL").val().length > 4 && maile == true) {
      $("#formLogin").submit();
    }

});

$("#inputPassL").on("mouseenter", function() {
  $(this).attr("type", "text");
});

$("#inputPassL").on("mouseleave", function() {
  $(this).attr("type", "password");
});

      $("#link").click(function(){
        $("#menuPerfil").slideToggle();
      })

      $("#menuPerfil").mouseleave(function(){
        $("#menuPerfil").slideUp();
      })
});

/*************Pacotes*******************/

$("#menuDD").click(function(){
  $("#dropMenuDestino").slideToggle();
});

$("#dropMenuDestino").mouseleave(function(){
  $("#dropMenuDestino").slideUp();
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

