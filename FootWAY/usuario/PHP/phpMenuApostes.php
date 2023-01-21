<?php


include 'connexioAposta.php';



if(isset($_POST['Apostar']) >= 1){
    
    if(strlen($_POST['QuantitatApostar']) >= 1 && strlen($_POST['GolsLocal'])>= 1 && strlen($_POST['Golsvisitant']) >= 1){
        
        $id_partit =  $_POST['id_partit'];
        $quantitatApostar = $_POST['QuantitatApostar'];
        $golsLocal = $_POST['GolsLocal'];
        $golsVisitant = $_POST['Golsvisitant'];
        
        
        $query = "INSERT INTO aposta(`id_partit`, `id_usuari`, `golsVisitant`, `golsLocal`, `dinerApostat`, `estat`, `benefici`) VALUES ($id_partit,1,$golsVisitant,$golsLocal,$golsVisitant,0,0)";
        
        
        $result = mysqli_query($bd_connection,$query);
        
        
        if($result){
            
            echo '<script type="text/javascript">
            alert("HAS APOSTAT CORRECTAMENT");
            window.location.href="../../usuario/menuUsuari.php";  </script>' ; 
            
        }
        
        else{
            
            echo '<p> Error amb la aposta </p>';
            
        }
        
        
    }
    
    else{
        
        echo '<p> Error amb la aposta </p>';
        
    }
    
}

else{
    
    echo '<p> Error amb la aposta </p>';
    
}

?>