<?php 

include 'connexion.php';
$did=$_GET['id_task'];



$query=("UPDATE taches set isDeleted=1 where id=$did ");
$query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo '<scipti>alert("Tâches bien supprimer") </script>';
header('location:tache.php');
}
else{
    echo '<scipti>alert(" error") </script>';
}




?>