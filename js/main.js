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


      $("#link").click(function(){
        $("#menuPerfil").slideToggle();
      })

      $("#menuPerfil").mouseleave(function(){
        $("#menuPerfil").slideUp();
      })
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

});