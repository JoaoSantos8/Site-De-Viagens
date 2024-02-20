
  /************************** Login **********************/
  $(document).ready(function() {
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
  
        
function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!regex.test(email)) {
  return false;
  }else{
  return true;
  }
  }

  });
  