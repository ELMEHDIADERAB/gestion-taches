<?php 

  
$mysqli= mysqli_connect('localhost','root','','gestion_des_taches');  
if(mysqli_connect_errno()) {  
    //die("Failed to connect with MySQL: ". mysqli_connect_error()); 
    echo "<script>alert('erreur de connexion');</script>";
}

?>