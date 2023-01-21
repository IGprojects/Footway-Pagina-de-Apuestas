<?php 
  session_start();
 #echo $_SESSION['usuari'];

 if(!isset($_SESSION['usuari']))
 {
   echo '<script> 
   alert("No estas logejat ");
   window.location.href="../../login.html";  </script>' ;   
 }
 
  $correuUsuari = $_SESSION['usuari'];
    include 'php/connexioAposta.php';
    #include '../assets/php/connexioUsuari.php';
    #include '../assets/php/validateUser.php';
   #include '../login.html';
   include '../assets/php/connexioUsuari.php';


   //$mail = "edpufa@inspalamos.cat"; 
?>

<html lang="es">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Enlazando el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="#">
	<link rel="stylesheet" type="text/css" href="assets/css/screen.css"/> <!-- SCREEN CSS INDEX,POST EXAMPLE . PAGE EXAMPLE-->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300italic,300,400italic,700,700italic|Playfair+Display:400,700,400italic,700italic"/>


   <!--favicon -->
   <link rel="icon" type="image/png" href="../assets/img/icons/icono.ico"/>

    <title>Apoestes Usuari</title>
    </head>
    
<body style="background-color: darkgray">



<!--BARRA DE NAVEGACIO-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="MenuUsuari.php">
      <img src="../assets/img/icons/icono.ico" alt="logo" style="width:40px;">
      FootWay
  </a>
  
  <div class="collapse navbar-collapse" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link " href="MenuUsuari.php">Menu Usuari</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="apostesUsuari.php">My Apostes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="Fer_Aposta.php">Apostes</a>
      </li>

     
    </ul>

    <ul class="navbar-nav mr-right  ">

    
      <!-- Desplegable dintre del nom -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"  href ="php/logout.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $correuUsuari; ?> 
        </a>
       
      </li>
    </ul>
    
  </div>
</nav>




    <!-- TAULES QUE MOSTREN DE LA BASE DE DADES-->
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Partit</th>
      <th scope="col">Gols Visitant</th>
      <th scope="col">Gols Local</th>
     <th scope="col">Diners Apostats</th>
    <th scope="col">Estat</th>
     <th scope="col">Benefici</th>

    </tr>
  </thead>
  <tbody>
        <?php
        
                                        $host = "localhost";
                                        $usuari = "Ignasi";
                                        $password = "Dam2020!";
                                        $bd_name = "travessa";
                                        $table_name_bs = "equip";


                                        $bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

                                        if(!$bd_connection)
                                        {
                                            die ('No se ha pogut connectar a la base de dades');
                                        }
                                        
                                $email = "SELECT mail from usuari where mail = '$correuUsuari'";
                                $sql = "select e2.nom_equip,e3.nom_equip,golsVisitant,golsLocal,dinerApostat,estat,benefici from aposta inner join partit e1 on aposta.id_partit=e1.id_partit inner join equip e2 on e1.id_equipVisitant=e2.id_equip inner join equip  e3 on e1.id_equipLocal=e3.id_equip inner join usuari u on aposta.id_usuari = u.id_usuari WHERE u.mail = '$correuUsuari'";
                                $result = mysqli_query($bd_connection ,$sql);

                                if (mysqli_num_rows($result)>0) {
                                  //show data for each row
                                  while($row = mysqli_fetch_array($result)){
                                      
                                        echo "<tr><td>".$row[0]." VS ".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td> <td>".$row[5]."</td> <td>".$row[6]."</td></tr>";
                                  }
                                }
                            ?>
      
  </tbody>
</table>
    
      
    </body>
</html>