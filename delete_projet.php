<?php 

include 'connexion.php';
$did=$_GET['id_projet'];



$query=("UPDATE projets set isDeleted=1 where id=$did ");
$query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo '<scipti>alert("Projet bien supprimer") </script>';
header('location:projects.php');
}
else{
    echo '<scipti>alert(" error") </script>';
}




?>