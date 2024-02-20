
      /******************* SIGN UP ******************/
$(document).ready(function() {
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

                if (nome !== "" && email !== "" && maile && telefone !== "" && idade !== "" && !isNaN(idade) && idade >= 18 && senhaValida && passC !== "" && passC === pass) {
                  $("#signUpForm").attr("action", "admin/confirmaNovoUtilizador.php").submit();

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
      
          if (senha.length < comprimentoMinimo ||
              !possuiCaracterEspecial ||
              !possuiNumero ||
              !possuiMaiuscula ||
              !possuiMinuscula) {
              alert("A senha não atende aos critérios necessários.");
              $("#inputPass").css("border-bottom", "5px solid red");
              event.preventDefault();
              return false;
          } else {
              $("#inputPass").css("border-bottom", "5px solid greenyellow");
              return true;
          }
      }

      
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
  return false;
  }else{
  return true;
  }
  }

    });