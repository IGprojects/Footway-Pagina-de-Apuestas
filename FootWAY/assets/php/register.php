<?php
require 'connexioUsuari.php';
// variables noves 
$name = $_POST['nom_usuari'];
$contrassenya = $_POST['contrassenya'];
$mail = $_POST['mail'];
$data_neixament = $_POST['data_naix'];
$hash = password_hash($contrassenya,PASSWORD_DEFAULT);
 $query = "SELECT mail FROM usuari WHERE mail = '$mail'";
//$connectu = Connexio();
$resultado = mysqli_query($bd_connection, $query);


function obtener_edad_fecha_nacimiento($fecha_nac)
{
    $fecha_nac = strtotime($fecha_nac);
    $edad = date('Y', $fecha_nac);
     if (($mes = (date('m') - date('m', $fecha_nac))) < 0) {
      $edad++;
     } elseif ($mes == 0 && date('d') - date('d', $fecha_nac) < 0) {
      $edad++;
     }
    return date('Y') - $edad;
    }

    $auxEdad = obtener_edad_fecha_nacimiento($data_neixament);



if (mysqli_num_rows($resultado)>0  || $auxEdad <18)
{
 
    echo'<script type="text/javascript">
    alert("No has pogut registrarte degut el correu ja esta registrat o ets menor de edad ");
    window.location.href="../../index.html";
     </script>';

  
 
}

else
{
  
    $insert_value = "INSERT INTO usuari (nom_usuari,data_naix,mail,contrassenya) VALUES ('$name','$data_neixament','$mail','$hash')";   
   // $insert_value2 =  "INSERT INTO usuari (nom_usuari,mail,contrassenya) VALUES ('$name','$mail','$hash')";   
    echo'<script type="text/javascript">
    alert("Bevingut a la Plataforma");
    window.location.href="../../login.html";
     </script>';
    // mail($mail,"Registre a Footway","Gracies per registra-se '$name'");
}


$retry_value = mysqli_query( $bd_connection,$insert_value);
 
if (!$retry_value) 
{
   die('Error: ' . mysqli_error( $bd_connection ,$retry_value));
}

mysqli_close($bd_connection);


?>