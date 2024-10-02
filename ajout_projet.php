<?php 
include 'connexion.php';

if(isset($_POST['ajouter'])){
    $nom=$_POST['titre'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
    $client=$_POST['client'];
    $query_add="INSERT INTO projets(titre,date_debut,date_fin,id_client) values ('$nom','$date_debut','$date_fin','$client')";
    $query_add_run=$mysqli->query($query_add);
    if ($query_add_run) {
       echo "<script>alert('Projet bien ajouté');</script>'";
    }else{
        echo "<script>alert('error');</script>'";
    }}
?>