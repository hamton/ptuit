<?php echo '<?xml version=\"1.0\" encoding=\"UTF-8\" ?>'."\n"; 

# ptuit
# Copyright © 2011 JoseManuelDominguez
# Copyright © 2011 BEGOÑA DEL CERRO <begodc@gmail.com>
#
# This file is part of ptuit.
#
# ptuit is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
#
# ptuit is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU Affero General Public License for more details.
#
# You should have received a copy of the GNU Affero General Public License
# along with ptuit. If not, see <http://www.gnu.org/licenses/>.

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtmll/DTD/xhtmll.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
  <title>ptuit - Login</title>
</head>
<body>
  <form action="login.php" method="post">
    <fieldset>
      <label for="nick">Nick:</label><input type="text" id="nick" name="nick" value="bego"/><br />
      <label for="pass">Password:</label><input type="password" id="pass" name="pass" value="bego"/><br />
      <input type="submit" value="Entrar"/>
    </fieldset>
  </form>
  <?php

    include '../php/controladorLogin.php'; //Carga el controlador para comprobar que el nick/pass exista en la BBDD
    $ctrl = new controladorlogin;
    
      if($ctrl->validarLogin() == true) 
     {
        echo '<div id="error">';
          echo '<p>No existe nadie registrado con ese usuario/password. Por favor, revisa los datos.</p>';
        echo '</div>';
      }
      else {
        //Si no hay errores, se carga la página de index.php pero con el nick del usuario logeado y otras opciones
      
      }
    
  ?>
<?php
// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
date_default_timezone_set('UTC');

// Imprime algo como: Monday 8th of August 2005 03:12:46 PM
echo 'Copyright Ptuit '.date('Y');
?>
</body>
</html>
