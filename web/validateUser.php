
<?php 

if ($_POST['user']=='admin'){
	$jsondata['respuesta']=OK;
	echo json_encode($jsondata);
	
}
else echo "no existe";



?>

