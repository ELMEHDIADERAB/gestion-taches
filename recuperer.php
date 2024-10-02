<?php 

include 'connexion.php';
$did=$_GET['rid'];

$query=("update utilisateurs set isDeleted=0 where id=$did ");
$query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo '<scipti>alert("Utilisateur bien recuperer") </script>';
header('location:liste_utilisateurs.php');
}
else{
    echo '<scipti>alert(" error") </script>';
}

?>