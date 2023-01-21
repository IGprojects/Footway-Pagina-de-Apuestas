<?php
session_start();
require 'connexioUsuari.php';

$mail = $_POST['mail']; 
$password = $_POST['contrassenya'];
//$_SESSION['mail'] =$mail;
$_SESSION['usuari'] = $mail;
$mailAdmin = "admin@gmail.com";
$_SESSION['admin'] =$mailAdmin;

//$passAdmin = "DAM2020!";
//$query = "SELECT mail FROM usuari WHERE mail = '$mail' AND contrassenya = '$password'";

$query = "SELECT mail,contrassenya FROM usuari WHERE mail='$mail'";

$resultat = mysqli_query($bd_connection,$query);
    $result = mysqli_query($bd_connection,$query);

    if(mysqli_num_rows($result) >0) 
    {
        $row = mysqli_fetch_assoc($resultat);

        if (password_verify($password,$row['contrassenya']))
        {
                   // si el usuari es admin entres en el panel de control de ADMINISTRADOR per poder fer apostes
            if(isset($_SESSION['usuari'])) 
             {
                
                if($mail==$mailAdmin)
                {
                    
                   //$SESSION['mail'] = $mailAdmin;
                        //$SESSION['password'] = $password;
                        //  alert("Benvingut ADMIN");
                        echo $_SESSION['usuari'] ;
                        //echo   $_SESSION['usuari'] =true;
                       echo'<script type="text/javascript">
                        alert("Benvingut ADMIN");
                        window.location.href="../../admin/menu_admin.php";  </script>' ;             // he canviat el baseAdmin.html per dashboard :D
                                                                                                // script fet amb javaScript que el que fa es cridar una alerta i després t'envia al panel de control
                          
                        
                       
                }
                else 
                {
                    // $_SESSION['login'] = true;
                    echo $_SESSION['usuari'];
                    // $SESSION['contrassenya'] = $password;
                    echo'<script type="text/javascript">
                    alert("Benvingut Usuari");
                    window.location.href="../../usuario/menuUsuari.php";
                    </script>';
                    
                }


             }
            else if(!isset($_SESSION['usuari']))
            {
                //echo 'no ok';
                $_SESSION['usuari'] = false;
                session_destroy();
                 echo'<script type="text/javascript">
                 alert("No has entrat.. FORA!");
                window.location.href="../../index.html";
                </script>';
                
                
            }
            




        }
        else 
        {
                 //echo 'no ok';
                 $_SESSION['usuari'] = false;
                session_destroy();
                 echo'<script type="text/javascript">
                 alert("Contrassenya incorrecte!");
                window.location.href="../../login.html";
                </script>';
               
        }
        
    }

    else 
    {
        $_SESSION['usuari'] = false;
        session_destroy();
         echo'<script type="text/javascript">
         alert("No estas registrat!");
        window.location.href="../../register.html";
        </script>';
        
    }


   
?>