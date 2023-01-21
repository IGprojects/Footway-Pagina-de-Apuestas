<?php 
//require '../assets/php/validateUser.php';

session_start();
#echo $_SESSION['usuari'] ;

//restriccio d'usuari
if(!isset($_SESSION['usuari']))
{
  echo '
  <script> 
  alert("No estas logejat ");
  
  window.location.href="../../login.html";  </script>' ;   
}
$correu =  $_SESSION['usuari'] ;
  include 'php/connexioAposta.php';

    //$equipsLocal = "SELECT nom_equip FROM `equip`";
    
    //$equipVisitant = "SELECT equipVisitant FROM `equip`";
  
    $equips = "SELECT p.id_partit,e1.nom_equip,e2.nom_equip FROM partit p
    inner join equip e1 on p.id_equipLocal=e1.id_equip
    inner join equip e2 on e2.id_equip=p.id_equipVisitant";
    
    
        
?>



<html lang="es">
<head>
  <title>Menu Usuari</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <!--favicon -->
   <link rel="icon" type="image/png" href="../assets/img/icons/icono.ico"/>
  <style>
   .fakeimg {
    height: 200px;
    background-color: #;
  }
  </style>
 
  
</head>
<body>

<!--BARRA DE NAVEGACIO-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="MenuUsuari.php">
      <img src="../assets/img/icons/icono.ico" alt="logo" style="width:40px;">
      FootWay
  </a>
  
  <div class="collapse navbar-collapse" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="MenuUsuari.php">Menu Usuari</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="apostesUsuari.php">My Apostes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="Fer_Aposta.php">Apostes</a>
      </li>

     
    </ul>
<!-- Desplegable dintre del nom -->

    <ul class="navbar-nav mr-right">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $correu ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="MenuPerfilUsuari.php">El Meu Perfil</a>-->
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="php/logout.php">Log out</a>
        </div>

      </li>
    </ul>
    
  </div>
</nav>






<br>
<div id="demo" class="carousel slide" data-ride="carousel">


  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <center><img src="img/Barcelona_vs_Levante.png" alt="Barcelona vs Levante" width="1000" height="450"></center>
    </div>
    <div class="carousel-item">
       
    <center><img src="img/Granada_vs_atletico_de_madrid.png" alt="Granada vs atletico de madrid" width="1000" height="450"></center>
    </div>
    <div class="carousel-item">
       <center><img src="img/Granada_vs_atletico_de_madrid.png" alt="Granada vs atletico de madrid" width="1000" height="450"></center>
    </div>
    <div class="carousel-item">
       <center><img src="img/sevilla_vs_osasuna.png" alt="sevilla vs osasuna" width="1000" height="450"></center>
    </div>
    <div class="carousel-item">
       <center><img src="img/valencia_vs_villareal.png" alt="valencia vs villareal" width="1000" height="450"></center>
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
			           
    


<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>Footway</h2>
      <h5>Aposta i guanya</h5>
      <div class="fakeimg" > <img src="img/footwaylogo.png"  width="350" height="300"></div>
      <br>
      <br>
      <br>
      <br>
      <h3>Prova una mica de Sort</h3>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item">
          <a class="nav-link" href="MenuApostes.php">Fer Apostes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="apostesUsuari.php">Les Meves Apostes</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    </div>
 
   
<center>
<H1>------- PARTITS -------</H1>
    <table class="table table-dark">
        <thead>
                <tr>
                  <th scope="col">Equip Local</th>
                  <th scope="col">Equip Visitant</th>
                  <th scope="col">DATA Inici</th>
                  <th scope="col">DATA Fi</th>
                </tr>
        </thead>
        <tbody>
          <?php
            include 'php/connexio_equip.php';
             $sql = "SELECT e1.nom_equip,e2.nom_equip,e3.dataInici,e3.dataFi FROM partit inner join equip e1 on partit.id_equipLocal=e1.id_equip inner join equip e2 on e2.id_equip=partit.id_equipVisitant inner join jornada e3 on partit.id_jornada=e3.id_jornada";
             $result = mysqli_query($bd_connection ,$sql);

              if (mysqli_num_rows($result)>0) 
              {
                //show data for each row
                 while($row = mysqli_fetch_array($result))
                 {
                                                  
                  echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</tr>";
                                              
                 }
              }
          ?>
                  
        </tbody>
    </table>
    <H1>----------------------------</H1>
            </center>
    </div>
  </div>
</div>
<br>


</body>
</html>
