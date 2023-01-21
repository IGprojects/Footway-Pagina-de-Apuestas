<?php
require 'connexio_partit.php';
// variables noves 

$id_partit = $_POST['id_partit'];
//$id_visitant=$_POST['id_equipVisitant'];
//$id_local=$_POST['id_equipLocal'];
//$id_jornada=$_POST['id_jornada'];
//$estadi=$_POST['estadi'];
$punts_local=$_POST['res_local'];
$punts_visitant=$_POST['res_vis'];
	
$update_value = "UPDATE `partit` SET `res_local`= ".$punts_local.", `res_vis` = ".$punts_visitant." where `id_partit`= ".$id_partit."" ;

$retry_value = mysqli_query($bd_connection,$update_value);

if (!$retry_value) 
{
   die('Error: ' . mysqli_error( $bd_connection ,$retry_value));
}
else
{
	
	echo '<script type="text/javascript">
		alert("El Resultat del partit s ha modificat correctament");
		window.location.href="menu_admin.php";
		 </script>';
	//$query = "UPDATE aposta set estat =1 WHERE id_partit = '$id_partit' AND id_usuari != '$correuAdmin'";
}


mysqli_close($bd_connection);


?>