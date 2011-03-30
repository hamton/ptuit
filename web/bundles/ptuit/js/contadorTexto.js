$(document).ready(function(){
    $(".txtMen").cuentaCaracteres();
    $("#botonTxt").click(enviarMensaje);
    $("#btnRegistrar").click(registrar);
    $("#btnLogin").click(login);
    $('#panel').hide();
    $('#panel2').hide();
    $("#login").click(toggleLogin);
    $("#registro").click(toggleRegistro);

})
function toggleLogin()
{
    $('#panel2').hide();
    $('#panel').toggle("slow");
    $('#errorFormLogin').text('');
    return false;
}
function toggleRegistro()
{
    $('#panel').hide();
    $('#panel2').toggle("slow");
    return false;
}

function login(){
    var usuario=$("#nick").attr("value");
    var pass=$("#pass").attr("value");

    $.ajax({
        url:"/php/iniciar.php",
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"controlador=usuario&accion=login&formulario=Login&usuario="+usuario+"&pass="+pass,
        beforeSend: inicioLogin,
        success:llegadaDatosLogin,
        complete: completadoLogin,
        timeout: 4000,
        error: problemasEnvio

    });


}

function inicioLogin (datos){

    $("#panel").addClass("txtMenCargando");


}
function llegadaDatosLogin(datos){

    if(datos.validado=='FALSE'){
        var errorMensaje =$('#errorFormLogin');
        errorMensaje.text(datos.msgError);
        errorMensaje.show('slow');

    }else {
        $('#login').hide();
        $('#registro').hide();
        $('#logExito').text("Bienvenido: "+datos.usuario);
        $('#logExito').show("slow");

        $('#panel').hide();
        $('#panel2').hide();
    }
    $("#panel").removeClass("txtMenCargando");
    $("#pass").val("")
    $("#nick").val("");

    
    


}
function completadoLogin()   {
    
}

function registrar(){

    var usuario=$("#nickR").attr("value");
    var pass=$("#passR").attr("value");
    var pass2=$("#passR2").attr("value");
    var correo=$("#correo").attr("value");
    $.ajax({
        url:"/php/iniciar.php",
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"controlador=usuario&accion=crearUsuario&formulario=Registro&usuario="+usuario+"&pass="+pass+"&pass2="+pass2+"&correo="+correo,
        beforeSend: inicioRegistro,
        success:llegadaDatosRegistro,
        complete: completadoRegistro,
        timeout: 4000,
        error: problemasEnvio

    });


}
function inicioRegistro (datos){

    $("#panel2").addClass("txtMenCargando");


}
function llegadaDatosRegistro(datos){
    if(datos.validado=='FALSE'){
        var errorMensaje =$('#errorFormRegistro');
        errorMensaje.text(datos.msgError);
        errorMensaje.show('slow');

    }else {
        
        $('#panel').hide();
        $('#panel2').hide();
        $("#panel").removeClass("txtMenCargando");
        $("#pass").val("")
        $("#nick").val("");
        $("#pass2").val("");
        $("#correo").val("");
    }   


}
function completadoRegistro()   {
    $("#panel2").removeClass("txtMenCargando");
    $("#passR").val("")
    $("#nickR").val("");

}

jQuery.fn.cuentaCaracteres= function(){
    txt=$(this);
    var errorMensaje =$('#errorMensaje');
    
    var contador =$('.contador');
    txt.keyup(function(){
        errorMensaje.text('');
        contador.text(': '+txt.attr("value").length+' :');

    });
    return this;

}
function enviarMensaje(){

    var texto=$(".txtMen").attr("value");

    $(".txtMen").val("");
    $('.contador').text('');
    $.ajax({
        url:"/php/iniciar.php",
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"controlador=mensaje&accion=crearMensaje&formulario=CajaMensaje&txtMen="+texto,
        beforeSend: inicioEnvio,
        success:llegadaDatos,
        complete: completado,
        timeout: 4000,
        error: problemasEnvio

    });


    return false;
}
function inicioEnvio (datos){
    $(".txtMen").addClass("txtMenCargando");

}
function llegadaDatos (datos){
    
    if(datos.validado=='FALSE'){
        var errorMensaje =$('#errorMensaje');
        errorMensaje.text(datos.msgError);
        
    }else {
        var avatar=$('<div class="ptuits"><img class="avatar" label="ptuit" src="/web/imagen/ptuit.png"></img></div>');
        avatar.appendTo($('#caja_men'));
        var nuevoMens=$('<span class="avatarTxt"><em style="color:blue;">'+datos.usuario+' :</em> '+datos.mensaje+'</span></div>');
        nuevoMens.appendTo($(avatar));
    }
    $(".txtMen").removeClass("txtMenCargando");
}
function problemasEnvio(objeto, quepaso, otroobj){
    alert("Hubo un fallo en el envio AJAX... Pasó lo siguiente: "+quepaso+" "+objeto+" "+otroobj);

}
function completado(exito){
    

    if(exito=="success"){
        alert("Y con éxito");
    }

}