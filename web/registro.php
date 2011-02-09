<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Formulario de contacto en AJAX</title>
<link rel="stylesheet" type="text/css" href="estilos.css">

<script type="text/javascript" src="js/validaciones.js"></script>



</head>

<body>

<div id="formContenedor">
	<form id="formulario" autocomplete="off" method="post" action="">
		<div id="transparencia">
			<div id="transparenciaMensaje">Caja transparente</div>
		</div>
		<table>
			<tbody>
				<tr>
					<td class="label"><label id="lusuario" for="inputUser">Nombre:</label></td>
					<td class="campo"><input class="inputNormal" type="text" id="inputUser" ></td>
					<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Nombre Usuario')"></td>
				</tr>
				<tr>
					<td class="label">Correo electr�nico:</td>
					<td class="campo"><input class="inputNormal" type="text" id="inputCorreo"></td>
					<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Correo')"></td>
				</tr>
				<tr>
					<td class="label">Contrase�a:</td>
					<td class="campo"><input class="inputNormal" type="password" id="inputPass"></td>
					<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Contrase�a')"></td>
				</tr>
				<tr>
					<td class="label">Repetir contrase�a:</td>
					<td class="campo"><input class="inputNormal" type="password" id="inputRpass"></td>
					<td class="ayuda"><img src="imagen/ayuda.gif" alt="Ayuda" onmouseover="muestraAyuda(event, 'Repetir Contrase�a')"></td>
				</tr>
			</tbody>
		</table>
		<br>
		<div>
			<button id="botonEnviar" onClick="validaForm()" type="button">Enviar</button>
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
