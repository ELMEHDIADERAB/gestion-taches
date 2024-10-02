<?php 

include 'connexion.php';
$did=$_GET['did'];



$query=("update utilisateurs set isDeleted=1 where id=$did ");
$query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo '<scipti>alert("Utilisateur bien supprimer") </script>';
header('location:liste_utilisateurs.php');
}
else{
    echo '<scipti>alert(" error") </script>';
}

?>