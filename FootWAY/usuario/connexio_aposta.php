<?php
//variables per el register.php
$host = "localhost";
$usuari = "Ignasi";
$password = "password";
$bd_name = "travessa";
$table_name_bs = "aposta";


$bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

if(!$bd_connection)
{
    die ('No se ha pogut connectar a la base de dades');
}
?>