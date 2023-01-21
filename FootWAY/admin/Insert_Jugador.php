<?php
require 'connexio_jugador.php';
// variables noves 
$equip = $_POST['equip'];
$nom = $_POST['nom_jugador'];
$edat = $_POST['data_naix'];
$dorsal = $_POST['dorsal'];
$nacionalitat = $_POST['nacionalitat'];
$resultado = mysqli_query($bd_connection, "SELECT * FROM " . $table_name_bs . " WHERE id_equip= '".$equip."and dorsal=".$dorsal."'");


if (mysqli_num_rows($resultado)>0)
{
 echo'<script type="text/javascript">
    alert("No s ha pogut crear el jugador");
    window.location.href="menu_admin.php";
     </script>';
}

else
{
$insert_value = "INSERT INTO jugador (equip,nom_jugador,edat,dorsal,nacionalitat) VALUES ('$equip','$nom','$edat','$dorsal','$nacionalitat')";
    echo'<script type="text/javascript">
    alert("El Jugador s ha introduit a la plantilla correctament");
    window.location.href="menu_admin.php";
     </script>';
}


$retry_value = mysqli_query( $bd_connection,$insert_value);
 
if (!$retry_value) 
{
   die('Error: ' . mysqli_error( $bd_connection ,$retry_value));
}

mysqli_close($bd_connection);


?>