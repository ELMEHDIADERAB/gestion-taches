<?php 

include 'connexion.php';
$did=$_GET['did'];



$query=("DELETE clients where id=$did ");
$query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo '<scipti>alert("client bien supprimer") </script>';
header('location:client.php');
}
else{
    echo '<scipti>alert(" error") </script>';
}

?>