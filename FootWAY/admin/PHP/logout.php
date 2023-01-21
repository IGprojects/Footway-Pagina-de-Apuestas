<?php
session_start();
// borrem la sessio 
session_destroy();

echo'<script type="text/javascript">
alert("Sessio tencada");
window.location.href="../../index.html";
 </script>';  


?>