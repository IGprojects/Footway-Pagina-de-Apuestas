<?php
//variables per el register.php
$host = "localhost";
$usuari = "footway";
$password = "password";
$bd_name = "travessa";
$table_name_bs = "usuari";



$bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

if(!$bd_connection)
{
    die ('No se ha pogut connectar a la base de dades');
}

?>