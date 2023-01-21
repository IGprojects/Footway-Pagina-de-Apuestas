<?php
require_once(__DIR__.'/../vendor/autoload.php');
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__. '/../')->load();


getenv("HOST");
//variables per el register.php
$host =$_ENV["HOST"];
$usuari = $_ENV["DB_USERNAME"];
$password = $_ENV["DB_PASSWORD"];
$bd_name = $_ENV["DB_NAME"];
$table_name_bs = "equip";


$bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

if(!$bd_connection)
{
    die ('No se ha pogut connectar a la base de dades');
}
?>