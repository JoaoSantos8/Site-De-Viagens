$("#perfilUnico").click(function () {
    $("#menu").slideToggle();
    $("#TS").slideToggle();
    $("#EP").slideToggle();
});

$("#inputImagem").click(function () {
    $("#img").click();


});


function verificar() {

    var input = document.getElementById("img");

    var img = input.files[0].name;
    $("#img").text(img);


    var tmppath = URL.createObjectURL(event.target.files[0]);
    $("#ima").fadeIn("#img").attr('src', tmppath);
}

$("#confirma").click(function () {
    var nome = $("#inputNome").val();
    var descricao = $("#inputDesc").val();
    var telefone = $("#inputTel").val();
    var preco = $("#inputPreco").val();
    var mail = $("#inputEmail").val();
    var email = IsEmail(mail);

    if (nome === "") {
        alert("ESCREVA SEU NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (descricao === "") {
        alert("ESCREVA A SUA DESCRIÇÃO");
        $("#inputDesc").css("border", "solid 5px red");
    } else {
        $("#inputDesc").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (!($.isNumeric(telefone)) || telefone.length !== 9) {
        alert("ESCREVA SEU CONTACTO");
        $("#inputTel").css("border", "solid 5px red");
    } else {
        $("#inputTel").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if ($("#ima").attr("src") === undefined || $("#ima").attr("src") === "") {
        alert("ESCOLHA SUA IMAGEM");
        $("#ima").css("border", "solid 5px red");
    } else {
        $("#ima").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (!($.isNumeric(preco))) {
        alert("ESCREVA SEU PRECO");
        $("#inputPreco").css("border", "solid 5px red");
    } else {
        $("#inputPreco").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (mail === "") {
        alert("ESCREVA O SEU EMAIL");
        $("#inputEmail").css("border", "solid 5px red");
    } else if (email === false) {
        alert("O SEU EMAIL NÃO É VÁLIDO");
        $("#inputEmail").css("border", "solid 5px orange");
    } else {
        $("#inputEmail").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (nome !== "" && descricao !== "" && email === true && $.isNumeric(telefone) &&
        telefone.length === 9 && $("#ima").attr("src") !== undefined && $("#ima").attr("src") !== "" &&
        $.isNumeric(preco)) {

        alert("Formulário todo preenchido");
        $("#formulario").submit();
    }
});


$(".ver-mais").click(function (e) {
    e.preventDefault();
    $(this).parent(".descricao").toggleClass("expandida");
});

/*********Verifica Destino ********************/

$("#confirmaD").click(function () {
    var nome = $("#inputNome").val();
    var descricao = $("#inputDesc").val();

    if (nome === "") {
        alert("ESCREVA SEU NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (descricao === "") {
        alert("ESCREVA A SUA DESCRIÇÃO");
        $("#inputDesc").css("border", "solid 5px red");
    } else {
        $("#inputDesc").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if ($("#ima").attr("src") === undefined || $("#ima").attr("src") === "") {
        alert("ESCOLHA SUA IMAGEM");
        $("#ima").css("border", "solid 5px red");
    } else {
        $("#ima").css("border", "solid 5px rgb(14, 248, 6)");
    }
    if (nome !== "" && descricao !== "" && $("#ima").attr("src") !== undefined && $("#ima").attr("src") !== "") {
        alert("Formulário todo preenchido");
        $("#formulario").submit();
    }
});


/************Verificar editar perfil **************/

$("#fimEdi").click(function () {
    var nome = $("#inputNome").val();
    var idade = $("#inputIdade").val();
    var telefone = $("#inputTelefone").val();
    var email = $("#inputEmail").val();
    var cargo = $("#slect").val();

    if (nome === "") {
        alert("ESCREVA O NOME DO UTILIZADOR");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (idade === "") {
        alert("ESCREVA A IDADE DO UTILIZADOR");
        $("#inputIdade").css("border", "solid 5px red");
    } else {
        $("#inputIdade").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (telefone === "") {
        alert("ESCREVA O TELEFONE DO UTILIZADOR");
        $("#inputTelefone").css("border", "solid 5px red");
    } else {
        $("#inputTelefone").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (email === "") {
        alert("ESCREVA O EMAIL DO UTILIZADOR");
        $("#inputEmail").css("border", "solid 5px red");
    } else {
        $("#inputEmail").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if ($("#cargo").css("visibility") !== "hidden") {
        if (cargo === null || cargo === "dif") {
            alert("ESCOLHA O CARGO DO UTILIZADOR");
            $("#slect").css("border", "solid 5px red");
        } else {
            $("#slect").css("border", "solid 5px rgb(14, 248, 6)");
        }
    }

    if ($("#ima").attr("src") === undefined || $("#ima").attr("src") === "") {
        alert("ESCOLHA A IMAGEM DO UTILIZADOR");
        $("#ima").css("border", "solid 5px red");
    }

    if (nome !== "" && idade !== "" && telefone !== "" && email !== "" && $("#ima").attr("src") !== undefined && $("#ima").attr("src") !== "" && $("#cargo").css("visibility") !== "hidden") {
        if (cargo !== null && cargo !== "dif") {
            alert("Formulário todo preenchido");
            $("#formulario").submit();
        }
    } else {

        alert("Formulário todo preenchido");
        $("#formulario").submit();
    }

});

/***********Verificação Novo Evento **************/
$("#confirmaEve").click(function () {
    var nome = $("#inputNome").val();
    var descricao = $("#inputDesc").val();
    var preco = $("#inputPreco").val();
    var mail = $("#inputEmail").val();
    var email = IsEmail(mail);
    var inputData = $("#inputDataC").val();
    var inputDataA = $("#inputDataA").val();

    if (nome === "") {
        alert("ESCREVA SEU NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (descricao === "") {
        alert("ESCREVA A SUA DESCRIÇÃO");
        $("#inputDesc").css("border", "solid 5px red");
    } else {
        $("#inputDesc").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (!($.isNumeric(preco))) {
        alert("ESCREVA SEU PRECO");
        $("#inputPreco").css("border", "solid 5px red");
    } else {
        $("#inputPreco").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (mail === "") {
        alert("ESCREVA O SEU EMAIL");
        $("#inputEmail").css("border", "solid 5px red");
    } else if (email === false) {
        alert("O SEU EMAIL NÃO É VÁLIDO");
        $("#inputEmail").css("border", "solid 5px orange");
    } else {
        $("#inputEmail").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (inputData !== "") {
        $("#inputDataC").css("border", "solid 5px rgb(14, 248, 6)");
    } else {
        // A data não está bem definida
        alert("Por favor, insira uma data válida.");
        $("#inputDataC").css("border", "solid 5px red");
    }

    if (inputDataA !== "") {
        $("#inputDataA").css("border", "solid 5px rgb(14, 248, 6)");
    } else {
        // A data não está bem definida
        alert("Por favor, insira uma data válida.");
        $("#inputDataA").css("border", "solid 5px red");
    }

    if (inputData > inputDataA) {
        alert("ALTERE AS DATAS. TERMINA ANTES DE ACABAR?");
        $("#inputDataC").css("border", "solid 5px red");
        $("#inputDataA").css("border", "solid 5px red");
    } else {
        $("#inputDataA").css("border", "solid 5px rgb(14, 248, 6)");
        $("#inputDataC").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if ($("#ima").attr("src") === undefined || $("#ima").attr("src") === "") {
        alert("ESCOLHA SUA IMAGEM");
        $("#ima").css("border", "solid 5px red");
    } else {
        $("#ima").css("border", "solid 5px rgb(14, 248, 6)");
    }
    if (nome !== "" && descricao !== "" && email === true && $("#ima").attr("src") !== undefined && $("#ima").attr("src") !== "" &&
        $.isNumeric(preco) &&
        inputData !== "" &&
        inputDataA !== "" &&
        inputData <= inputDataA) {

        alert("Formulário todo preenchido");
        $("#formulario").submit();
    } else {
        alert("Alguma coisa deu errado. Verifique os campos");
    }
});

/***********Verificação Nova Atividade **************/
$("#confirmaAtiv").click(function () {

    var nome = $("#inputNome").val();
    var preco = $("#inputPreco").val();

    if (nome === "") {
        alert("ESCREVA SEU NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if ($("#ima").attr("src") === undefined || $("#ima").attr("src") === "") {
        alert("ESCOLHA SUA IMAGEM");
        $("#ima").css("border", "solid 5px red");
    } else {
        $("#ima").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (!($.isNumeric(preco))) {
        alert("ESCREVA SEU PRECO");
        $("#inputPreco").css("border", "solid 5px red");
    } else {
        $("#inputPreco").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (nome !== "" && $("#ima").attr("src") !== undefined && $("#ima").attr("src") !== "" &&
        $.isNumeric(preco)) {

        alert("Formulário todo preenchido");
        $("#formulario").submit();
    } else {
        alert("Alguma coisa deu errado. Verifique os campos");
    }
});

/**********************************************Confirmar Viagem ****************************/

$("#confirmaVia").click(function () {

    var data = $("#inputDataC").val();
    var horaC = $("#inputHoraC").val();
    var horaA = $("#inputHoraA").val();
    var telefone = $("#inputTel").val();
    var preco = $("#inputPreco").val();
    var lugares = $("#inputLugares").val();

    if (data !== "") {
        $("#inputDataC").css("border", "solid 5px rgb(14, 248, 6)");
    } else {
        // A data não está bem definida
        alert("Por favor, insira uma data válida.");
        $("#inputDataC").css("border", "solid 5px red");
    }

    if (horaA !== "") {
        $("#inputHoraA").css("border", "solid 5px rgb(14, 248, 6)");
    } else {
        // A hora não está bem definida
        alert("Por favor, insira uma hora de partida válida.");
        $("#inputHoraA").css("border", "solid 5px red");
    }

    if (horaC !== "") {
        $("#inputHoraC").css("border", "solid 5px rgb(14, 248, 6)");
    } else {
        // A hora não está bem definida
        alert("Por favor, insira uma hora de chegada válida.");
        $("#inputHoraC").css("border", "solid 5px red");
    }

    if (lugares !== "") {
        $("#inputLugares").css("border", "solid 5px rgb(14, 248, 6)");
    } else {
        // A hora não está bem definida
        alert("Por favor, insira os lugares corretos");
        $("#inputLugares").css("border", "solid 5px red");
    }

    if (!($.isNumeric(telefone)) || telefone.length !== 9) {
        alert("ESCREVA SEU CONTACTO DE SUPORTE");
        $("#inputTel").css("border", "solid 5px red");
    } else {
        $("#inputTel").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (!($.isNumeric(preco))) {
        alert("ESCREVA SEU PRECO");
        $("#inputPreco").css("border", "solid 5px red");
    } else {
        $("#inputPreco").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (horaC !== "" && horaA !== "" && data !== "" && $.isNumeric(telefone) && telefone.length == 9 && $.isNumeric(preco) && lugares !== "") {

        alert("Formulário todo preenchido");
        $("#formulario").submit();
    } else {
        alert("Alguma coisa deu errado. Verifique os campos");
    }

});


$("#confirmaComp").click(function(){
    
    var nome = $("#inputNome").val();
    var telefone = $("#inputTel").val();

    if (nome === "") {
        alert("ESCREVA SEU NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if (!($.isNumeric(telefone)) || telefone.length !== 9) {
        alert("ESCREVA SEU CONTACTO DE SUPORTE");
        $("#inputTel").css("border", "solid 5px red");
    } else {
        $("#inputTel").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if(nome!=="" && $.isNumeric(telefone) || telefone.length !== 9){
        
        alert("Formulário todo preenchido");
        $("#formulario").submit();
    } else {
        alert("Alguma coisa deu errado. Verifique os campos");
    }
});


/*******************Lista Pacotes*******************/

$('#slect, #slecte').on('change', function() {
    var opcaoSelecionadaV = parseFloat($('#slect').find('option:selected').val());
    var opcaoSelecionadaH = parseFloat($('#slecte').find('option:selected').val());

    var total = opcaoSelecionadaV + opcaoSelecionadaH;
    
    var texto = opcaoSelecionadaV + '€ (VIAGEM) + ' + opcaoSelecionadaH + '€ (HOTEL) = ' + total.toFixed(2) + '€';
    
    $("#opcaoSelecionada").text(texto).css("color", "black");
    $("#opcaoSelecionada").text(texto).css("background-color", "white");
    $("#opcaoSelecionada").text(texto).css("margin-left", "20px");
    $("#opcaoSelecionada").text(texto).css("padding", "20px");
    $("#opcaoSelecionada").text(texto).css("border-radius", "10px");
    $("#opcaoSelecionada").text(texto).css("font-size", "18pt");

    $("#opcaoSelecionada").text(texto);
});


$("#confirmaP").click(function(){

    var nome = $("#inputNome").val();

    if (nome === "") {
        alert("ESCREVA SEU NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }


    if(nome!==""){
        
        alert("Formulário todo preenchido");
        $("#formulario").submit();
    } else {
        alert("Alguma coisa deu errado. Verifique os campos");
    }
});

/********************Lista Restaurantes*****************/

$("#confirmaRes").click(function(){
    var nome = $("#inputNome").val();
    var tamanho = $("#inputNome").val().length;
    var telefone = $("#inputTel").val();
    var preco = $("#inputPreco").val();
    var descricao = $("#inputDesc").val();

    if (tamanho<=5) {
        alert("ESCREVA O NOME");
        $("#inputNome").css("border", "solid 5px red");
    } else {
        $("#inputNome").css("border", "solid 5px rgb(14, 248, 6)");
    }
    if (!($.isNumeric(telefone)) || telefone.length != 9) {
        alert("ESCREVA O CONTACTO DO RESTAURANTE");
        $("#inputTel").css("border", "solid 5px red");
    } else {
        $("#inputTel").css("border", "solid 5px rgb(14, 248, 6)");
    }
    if (!($.isNumeric(preco))) {
        alert("ESCREVA SEU PRECO");
        $("#inputPreco").css("border", "solid 5px red");
    } else {
        $("#inputPreco").css("border", "solid 5px rgb(14, 248, 6)");
    }
    if (descricao === "") {
        alert("ESCREVA A SUA DESCRIÇÃO");
        $("#inputDesc").css("border", "solid 5px red");
    } else {
        $("#inputDesc").css("border", "solid 5px rgb(14, 248, 6)");
    }
    if ($("#ima").attr("src") === undefined || $("#ima").attr("src") === "") {
        alert("ESCOLHA SUA IMAGEM");
        $("#ima").css("border", "solid 5px red");
    } else {
        $("#ima").css("border", "solid 5px rgb(14, 248, 6)");
    }

    if(nome!=="" && $.isNumeric(telefone) || telefone.length !== 9 && $.isNumeric(preco) && descricao !== "" && $("#ima").attr("src") !== undefined && $("#ima").attr("src") !== "" ){
        
        alert("Formulário todo preenchido");
        $("#formulario").submit();
    } else {
        alert("Alguma coisa deu errado. Verifique os campos");
    }
});

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}