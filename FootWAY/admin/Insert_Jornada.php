<?php
require 'connexio_jornada.php';
// variables noves 

$dataInici = $_POST['dataInici'];
$dataFinal = $_POST['dataFi'];
$resultado = mysqli_query($bd_connection, "SELECT * FROM " . $table_name_bs . " WHERE dataInici = '".$dataInici."'");


if (mysqli_num_rows($resultado)>0)
{
 echo'<script type="text/javascript">
    alert("No s ha pogut Insertar ja hi ha una jornada assignada en aquesta data");
    window.location.href="menu_admin.php";
     </script>';
}

else
{
$insert_value = "INSERT INTO jornada (dataInici,dataFi) VALUES ('$dataInici','$dataFinal')";
    echo'<script type="text/javascript">
    alert("La jornada s ha creat correctament");
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