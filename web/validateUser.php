
<?php 
include("../php/bbdd/bd.php");


class validateUser{
  public function userExist(){
    if ($_POST['user']=='admin'){ //query to the database if user exists.
	   $jsondata['user']='NOK';
	   echo json_encode($jsondata);
      }
    else{
    $jsondata['user']='OK';
	    echo json_encode($jsondata);
    }
  }
}

$usuario=new validateUser();
$usuario->userExist();
?>

