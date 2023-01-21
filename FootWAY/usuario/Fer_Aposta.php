<?php
session_start();
#echo $_SESSION['usuari'];
if(!isset($_SESSION['usuari']))
{
  echo '
  <script> 
  alert("No estas logejat ");
  
  window.location.href="../../login.html";  </script>' ;   
}
$correu =  $_SESSION['usuari'] ;

?>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Enlazando el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js%22%3E"></script>

   <!--favicon -->
         <link rel="icon" type="image/png" href="../assets/img/icons/icono.ico"/>


    <title>Apostar</title>
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
        <a class="nav-link" href="apostesUsuari.php">My Apostes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="Fer_Aposta.php">Apostes</a>
      </li>

     
    </ul>
<!-- Desplegable dintre del nom -->

    <ul class="navbar-nav mr-right">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="php/logout.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $correu ?>
        </a>
        

      </li>
    </ul>
    
  </div>
</nav>





    
       <br>
          <div class="d-flex justify-content-center form_container">
    <form action="Insert_Aposta.php" method="POST">
   
    <center>
        <div class="form-check-inline">
                  <label for="id_partit">Partits:</label>
            <select name="id_partit"  class="custom-select">
                    
					<?php
                        $host = "localhost";
                        $usuari = "Ignasi";
                        $password = "Dam2020!";
                        $bd_name = "travessa";
                        $table_name_bs = "partit";
						 

                        $bd_connection = mysqli_connect($host,$usuari,$password,$bd_name);

                        if(!$bd_connection)
                        {
                            die ('No se ha pogut connectar a la base de dades');
                        }
						
						$sql = "SELECT p.id_partit,e1.nom_equip,e2.nom_equip,p.res_local FROM partit p
								inner join equip e1 on p.id_equipLocal=e1.id_equip 
								inner join equip e2 on e2.id_equip=p.id_equipVisitant";
													
						$result = mysqli_query($bd_connection ,$sql);
						
						//$pos = 0;
						if(mysqli_num_rows($result)>0)
						{
							while($row = mysqli_fetch_array($result))
							{
                  if($row[3] == -1)
                  {
                    echo "<option value =".$row[0]."> ".$row[2]." vs ".$row[1]."</option>";
                  }
							}
						}
					?>
			</select>     
        </div>
		
        <div class="form-group">
			<label for="golsLocal">Gols Local:</label>
			<input type="number" class="form-control" placeholder="Entra els gols de l'equip Local" name="golsLocal">		
		</div>
        
        <div class="form-group">
        <label for="golsVisitant">Gols Visitant:</label>
        <input type="number" class="form-control" placeholder="Entra els gols de l'equip Visitant" name="golsVisitant">
      </div>
        
        <div class="form-group">
        <label for="dinerApostat">Diners Apostats:</label>
        <input type="number" class="form-control" placeholder="Entra els diners que vols apostar" name="dinerApostat">
      </div>
        
    <div class="form-check">
        <br>
		<button type="submit" class="btn btn-primary">Fer Aposta</button>
    </div>
        <div><span class="iconify" data-icon="simple-line-icons:wallet" data-inline="false"></span>     </div>
    </center>

</form>
    </div>
    </body>
</html>