<?php
session_start();
if(!isset($_SESSION['admin']))
{
  echo '<script> 
  alert("No ets admin! FORA DE AQUI NO ET VOLEM  ");
  window.location.href="../../login.html";  </script>' ; 
}

$correuAdmin = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html>
<head>
    
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Enlazando el CSS de Bootstrap -->
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
                integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"/>
      <!--favicon -->
      <link rel="icon" type="image/png" href="../assets/img/icons/icono.ico"/>
          <title>Menu Administrador</title>
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
      <a class="nav-link active" href="menu_admin.php">Inici</a>
    </li>

    <li class="nav-item ">
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






        
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Equip Local</th>
      <th scope="col">Equip Visitant</th>
      <th scope="col">Gols Local</th>
      <th scope="col">Gols Visitant</th>
     <th scope="col">Jornada</th>
    </tr>
  </thead>
  <tbody>
        <?php
          include 'php/connexio_equip.php';
                                     
                                $sql = "SELECT res_local,res_vis,e1.nom_equip,e2.nom_equip,e3.dataInici,e3.dataFi FROM partit inner join equip e1 on partit.id_equipLocal=e1.id_equip inner join equip e2 on e2.id_equip=partit.id_equipVisitant inner join jornada e3 on partit.id_jornada=e3.id_jornada";
                                $result = mysqli_query($bd_connection ,$sql);

                                if (mysqli_num_rows($result)>0) {
                                  //show data for each row
                                  while($row = mysqli_fetch_array($result)){
                                      
                                        echo "<tr><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[0]."</td><td>".$row[1]."</td> <td>".$row[4]."/".$row[5]."</td></tr>";
                                  }
                                }
                            ?>
      
  </tbody>
</table>
    
    </body>

    
</html>