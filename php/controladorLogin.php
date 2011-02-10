<?php
# ptuit
#
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

//Incuir el archivo conexion a la Base de Datos
     require_once 'bbdd/bd.php'; //incluir conexion
     include_once 'clases/sesiones.php';//incluir sesiones
/**
@class controladorLogin  para controlar el logeo de usuarios*/
 class controladorLogin extends bd
  {
    /** @param $error que devuelve true o false segun la validación*/
    /** @param $username que recoge el nick*/
    /** @param $password que recoge el password*/
    
    public $error=false;
  
  

   /** @fn ( validarLogin que busca en la base de datos por el nick del usuario y devuelve el id del mismo si todo a ido bien o la varia error=false)*/
    public function validarLogin()
    {
     $username = $_POST['nick']; 
     $password = $_POST['pass']; 
	
        $password = sha1($password); //Desencriptar;
 
	$db = new bd;
        $db->conexionBd();//Nos conectamos

$arraySelect[0] = 'id';
$arraySelect[1] = 'nombre';
$arraySelect[2] = 'password';

$arrayWhere = 'nombre = ' . $username;

	$result = $db->select('usuarios',$arraySelect,$arrayWhere);

	
    
	if (!empty($result))// si la consulta devuelve datos
	{
	  $row = $result->fetch();  //Meto el resultado en un array 
	  if ( $row['password'] == $password )//Valido password
	    { 
		Sesiones.crearSesion($row['id'])  ; 
	    } 
	    else
	     {
		this.$error = true; 
	     } 
	}
	else //si el nombre no se encuentra en BBDD
	{	    
	      this.$error=true;  
	}
      
      return this.$error; 
    }
}
?>