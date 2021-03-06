<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Formulario de contacto en AJAX</title>
    <link rel="stylesheet" type="text/css" href="css/registro.css" />
    <script type="text/javascript" src="js/validaciones.js"></script>
  </head>
  <body>
    <div id="formContenedor">
	    <form id="formulario" method="post" action="">
		    <div id="transparencia">
		  	  <div id="transparenciaMensaje">Caja transparente</div>
	    	</div>
          <fieldset>
   			  <legend>Datos de registro</legend>
  	  		<label id="lusuario" for="inputUser">Nombre:</label>
		  		<input class="inputNormal" type="text" id="inputUser" />
			  	<img class="ayuda" src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Nombre Usuario')" /><br />
  	  		<label id="lcorreo" for="inputCorreo">Correo electrónico:</label>
				  <input class="inputNormal" type="text" id="inputCorreo" />
			  	<img class="ayuda" src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Correo')" /><br />
  	  		<label id="lpass" for="inputPass">Contraseña:</label>
			  	<input class="inputNormal" type="password" id="inputPass" />
			  	<img class="ayuda" src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Contraseña')" /><br />
  	  		<label id="lrpass" for="inputRpass">Repetir contraseña:</label>
			  	<input class="inputNormal" type="password" id="inputRpass" />
			  	<img class="ayuda" src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Repetir Contraseña')" /><br />
			  </fieldset>		
		  <div>
			  <button id="botonEnviar" onclick="validaForm()" type="button">Enviar</button>
			  <button type="reset">Borrar</button>
		  </div>
	    </form>
    </div>

<!-- Capa para mostrar los mensajes de ayuda al presionar los iconos correspondientes -->
    <div id="mensajesAyuda">
  	  <div id="ayudaTitulo"></div>
  	  <div id="ayudaTexto"></div>
    </div>
  </body>
</html>
