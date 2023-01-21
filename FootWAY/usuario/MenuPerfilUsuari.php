<!DOCTYPE html>

<?php 
    
    include 'BD.php';
    
    //include 'validateUser.php';
     
    $mail = $_POST['mail'];
    
    $usuari = "SELECT * FROM `usuari` WHERE mail = '$mail'";
   
    

?>
<html lang="es">
<head>
  <title>Perfil Usuari</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="Footway.png" />
  <!--  --><link rel="stylesheet" type="text/css" href="estilos.css"/>
  
</head>
<body>



<div class="pos-f-t">
  <div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">

        
  <a class="navbar-brand" href="#">
    <img src="Footway.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Footway
  </a>

 
   <ul class="navbar-nav">
    	<li>
      	<a class="badge badge-pill badge-info" href="MenuUsuari.php" align="left">Menu Principal</a>
      	</li>
      	 
    	<li> 
      	<a class="badge badge-pill badge-info" href="MenuApostes.php" align="left">Fer Apostes</a>
      	</li>
      	
    	<li>
      	<a class="badge badge-pill badge-info" href="#" align="left">Les Meves Apostes</a>
      	</li>
      	
      	<li>
      	<a class="badge badge-pill badge-danger" href="#" align="left">Sortir</a>
      	</li>
      	<!--  <li class="nav-item">
      		<a class="nav-link" href="#">Sortir</a>
      	</li>-->
  </div>
</div>
  <nav class="navbar navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
  </nav>
</div>

<br>

<p class="text-center" ><b> <font size=5>El Meu Compte</font></b></p>

<p> 

</p>


<div class="container">
 <img src="fotoUsuario.png" width="200" height="200" align="left" >      
  <table class="table">
    <thead>
      <tr>
        <th>Nom: 
        
        <?php
              
               $result = mysqli_query($conn ,$usuari);
            
               if(mysqli_num_rows($result)>0) while($row = mysqli_fetch_array($result)) echo "<option> $row[1] </option>";
                
        ?> 
        
        </th>
        <td></td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Data Naixement: <?php
        
           
      			           
            $result = mysqli_query($conn ,$usuari);			   
      			
            if(mysqli_num_rows($result)>0) while($row = mysqli_fetch_array($result)) echo "<option> $row[2] </option>";
        
            
            
        ?> </th>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>Correu: <?php
        
        
      			           
            $result = mysqli_query($conn ,$usuari);			   
      			
            if(mysqli_num_rows($result)>0) while($row = mysqli_fetch_array($result)) echo "<option> $row[3] </option>";
        
        
        ?> </th>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>