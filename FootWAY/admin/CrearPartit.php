<?php
require_once('../vendor/autoload.php');
$dotenv=Dotenv\Dotenv::createImmutable(__DIR__. '/../')->load();
session_start();
if(!isset($_SESSION['admin']))
{
  echo '<script> 
  alert("No ets admin! FORA DE AQUI NO ET VOLEM  ");
  window.location.href="../../login.html";  </script>' ; 
}
$correuAdmin = $_SESSION['admin'];
?>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Enlazando el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
           <!--favicon -->
 <link rel="icon" type="image/png" href="../assets/img/icons/icono.ico"/>

    <title>Crear Partit</title>
    </head>
<body style="background-color: darkgray">

<!--BARRA DE NAVEGACIO-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="menu_admin.php">
      <img src="../assets/img/icons/icono.ico" alt="logo" style="width:40px;">
      FootWay
  </a>
  
  <div class="collapse navbar-collapse" >
    <ul class="navbar-nav mr-auto">
      
    <li class="nav-item">
      <a class="nav-link " href="menu_admin.php">Inici</a>
    </li>

    <li class="nav-item ">
      <a class="nav-link" href="CrearEquip.php">Crear Equip</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="CrearJugador.php">Crear Jugador</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="CrearPartit.php">Crear Partit</a>
    </li>
       <li class="nav-item">
      <a class="nav-link" href="CrearJornada.php">Crear Jornada</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ActualitzarPartit.php">Actualitzar Resultats</a>
    </li>
    </ul>
<!-- Desplegable dintre del nom -->

    <ul class="navbar-nav mr-right">
      
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="php/logout.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $correuAdmin ?>
        </a>
      

      </li>
    </ul>
    
  </div>
</nav>

<!--
<nav class="navbar navbar-expand-sm bg-dark justify-content-center">
  <a class="navbar-brand" href="menu_admin.php">FootWay</a>
<ul class="navbar-nav mr-auto">
      </ul>
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
      <a class="nav-link" href="CrearEquip.php">Crear Equip</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="CrearJugador.php">Crear Jugador</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="CrearPartit.php">Crear Partit</a>
    </li>
       <li class="nav-item">
      <a class="nav-link" href="CrearJornada.php">Crear Jornada</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="ActualitzarPartit.php">Actualitzar Resultats</a>
    </li>

    <li class="nav-link">
    <a class="nav-link" href = "php/logout.php">Sortir</a>
    </li>
    </ul>
</nav>-->
    
    
       <br>
          <div class="d-flex justify-content-center form_container">
    <form action="Insert_Partit.php" method="POST">
   
    <center>
        <div class="form-check-inline">
                  <label for="id_equipLocal">Equip Local:</label>
            <select name="id_equipLocal" class="custom-select">
                    <?php
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
            
                $sql = "SELECT id_equip,nom_equip FROM equip";
            	$result = mysqli_query($bd_connection ,$sql);

                if (mysqli_num_rows($result)>0) {
		          //show data for each row
                    echo "estic aqui";
		          while($row = mysqli_fetch_assoc($result)){
                      
                                echo "<option value =".$row['id_equip']."> ".$row['nom_equip']."</option>";
                  }
                }
            ?>
      </select>     
        </div>

        
        <div class="form-check-inline">
                  <label for="id_equipVisitant">Equip Visitant:</label>
            <select name="id_equipVisitant" class="custom-select">
                    <?php
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
            
                $sql = "SELECT id_equip,nom_equip FROM equip";
            	$result = mysqli_query($bd_connection ,$sql);

                if (mysqli_num_rows($result)>0) {
		          //show data for each row
                    echo "estic aqui";
		          while($row = mysqli_fetch_assoc($result)){
                      
                                echo "<option value =".$row['id_equip']."> ".$row['nom_equip']."</option>";
                  }
                }
            ?>
      </select>       
        </div>
        
                <!--
        <div class="form-group">
        <label for="res_local">Punts Local:</label>
        <input type="number" class="form-control" placeholder="Entra els gols de l'equip Local" name="res_local">
      </div>
        
        <div class="form-group">
        <label for="res_vis">Punts Visitant:</label>
        <input type="number" class="form-control" placeholder="Entra els gols de l'equip Visitant" name="res_vis">
      </div>-->
        
        
        <div class="form-group">
        <label for="estadi">Estadi:</label>
        <input type="text" class="form-control" placeholder="Entra l'estadi" name="estadi">
      </div>
       <div class="form-check-inline">
                  <label for="id_jornada">Jornada:</label>
            <select name="id_jornada" class="custom-select">
                    <?php
                         $host =$_ENV["HOST"];
                         $usuari = $_ENV["DB_USERNAME"];
                         $password = $_ENV["DB_PASSWORD"];
                         $bd_name = $_ENV["DB_NAME"];
                         $table_name_bs = "jornada";


                        $bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

                        if(!$bd_connection)
                        {
                            die ('No se ha pogut connectar a la base de dades');
                        }
            
                $sql = "SELECT id_jornada,dataInici,dataFi FROM jornada";
            	$result = mysqli_query($bd_connection ,$sql);

                if (mysqli_num_rows($result)>0) {
		          //show data for each row
		          while($row = mysqli_fetch_assoc($result)){
                      
                                echo "<option value =".$row['id_jornada']."> ".$row['dataInici']." - ".$row['dataFi']."</option>";
                  }
                }
            ?>
      </select>       
        </div>
        
    <div class="form-check">
            <br>

  <button type="submit" class="btn btn-primary">Crear</button>
    </div>
            </center>

</form>
    </div>
    </body>
</html>