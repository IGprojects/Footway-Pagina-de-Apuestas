<?php
require 'connexio_Aposta.php';
// variables noves 
session_start();

$id_partit=$_POST['id_partit'];
$id_golsVisitant=$_POST['golsVisitant'];
$id_golsLocal=$_POST['golsLocal'];
$id_dinerApostat=$_POST['dinerApostat'];


// variable de sessio que el que faig es fer una consulta per saber el id 
$correuPersona= $_SESSION['usuari'];
$consulta="Select id_usuari from usuari where mail='$correuPersona'";

$query = mysqli_query($bd_connection,$consulta);
$row = mysqli_fetch_array($query);
// variable que es el id_usuari de la taula que et retorna amb el metode fetch_array
$id_user =$row[0]; // VARIABLE ID_USUAIR DE USUARIS


$consulta2="SELECT * FROM aposta a INNER JOIN partit p1 on a.id_partit=p1.id_partit  WHERE a.id_usuari = '$id_user' AND a.id_partit = '$id_partit'";


$resultado = mysqli_query($bd_connection,$consulta2);

//$consultaIgnasi= "SELECT * FROM ".$table_name_bs." INNER JOIN partit e1 on aposta.id_partit=e1.id_partit inner JOIN jornada e2 on e1.id_jornada=e2.id_jornada WHERE aposta.id_usuari !=".$id_user." and NOT e1.res_local=-1";
if (mysqli_num_rows($resultado)>0)
{
    echo'<script type="text/javascript">
        alert("El partit ja ha comensat i ja no es pot apostar en ell");
        window.location.href="Fer_Aposta.php";
        </script>';
}

else
{
    
    $insert_value = "INSERT INTO aposta (id_partit,id_usuari,golsVisitant,golsLocal,dinerApostat) VALUES ('$id_partit','$id_user','$id_golsVisitant','$id_golsLocal','$id_dinerApostat')";

    echo'<script type="text/javascript">
    alert("La Aposta ha estat feta");
    window.location.href="MenuUsuari.php";
     </script>';
}


$retry_value = mysqli_query($bd_connection,$insert_value);
 
if (!$retry_value) 
{
   die('Error: ' . mysqli_error( $bd_connection ,$retry_value));
}

mysqli_close($bd_connection);


?>
