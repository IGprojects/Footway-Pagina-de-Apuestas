<?php
require 'connexio_partit.php';
// variables noves 

$id_visitant=$_POST['id_equipVisitant'];
$id_local=$_POST['id_equipLocal'];
$id_jornada=$_POST['id_jornada'];
$estadi=$_POST['estadi'];


$resultado = mysqli_query($bd_connection, "SELECT * FROM " . $table_name_bs . " WHERE id_equipVisitant = '".$id_visitant."' and id_equipLocal ='".$id_local."'");


if (mysqli_num_rows($resultado)>0)
{
 echo'<script type="text/javascript">
    alert("El partit no pot tenir el mateix equip en el equip local i el equip visitant");
    window.location.href="menu_admin.php";
     </script>';
}

else
{
$insert_value = "INSERT INTO partit (id_equipVisitant,id_equipLocal,id_jornada,estadi) VALUES ('$id_visitant','$id_local','$id_jornada','$estadi')";
    

echo'<script type="text/javascript">
    alert("El Partit s ha creat correctament");
    window.location.href="menu_admin.php";
     </script>';
}


$retry_value = mysqli_query($bd_connection,$insert_value);
 
if (!$retry_value) 
{
   die('Error: ' . mysqli_error( $bd_connection ,$retry_value));
}

mysqli_close($bd_connection);


?>
