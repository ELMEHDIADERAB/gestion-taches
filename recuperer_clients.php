<?php 

include 'connexion.php';
$did=$_GET['rid'];

$query=("update clients set isDeleted=0 where id=$did ");
$query_run=mysqli_query($mysqli,$query);
if($query_run){
    echo '<scipti>alert("Membre bien recuperer") </script>';
header('location:client.php');
}
else{
    echo '<scipti>alert(" error") </script>';
}

?>