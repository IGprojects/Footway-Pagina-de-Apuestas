<?php
//variables per el register.php
$host = "localhost";
$usuari = "Ignasi";
$password = "Dam2020!";
$bd_name = "travessa";
$table_name_bs = "jugador";


$bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

if(!$bd_connection)
{
    die ('No se ha pogut connectar a la base de dades');
}
?>