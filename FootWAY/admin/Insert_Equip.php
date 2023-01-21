<?php
require 'connexio_equip.php';
// variables noves 
$nom = $_POST['nom_equip'];
$pais = $_POST['pais'];
$comunitat = $_POST['comunitat'];
$resultado = mysqli_query($bd_connection, "SELECT * FROM " . $table_name_bs . " WHERE nom_equip = '".$nom."'");


if (mysqli_num_rows($resultado)>0)
{
 echo'<script type="text/javascript">
    alert("No has pogut Insertar");
    window.location.href="menu_admin.php";
     </script>';
}

else
{
    $insert_value = "INSERT INTO equip (nom_equip,pais,comunitat) VALUES ('$nom','$pais','$comunitat')";
    echo'<script type="text/javascript">
    alert("L equip s ha introduit correctament");
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