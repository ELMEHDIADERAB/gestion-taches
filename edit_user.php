<?php 
session_start();
include 'connexion.php';
if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['datenaissance'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $motdepasse =  $_POST['password'];
    $type = $_POST['type'];
    $id = $_POST['id'];
    $old_image=$_POST['image_old'];
    $new_image=$_FILES['image']['name'];

    if($new_image != ''){
        $update_filename='images/'.$_FILES['image']['name'];
        move_uploaded_file($fileTmpName, $fileDestination);

                 $fileDestination1 = 'images/' . $fileNameNew;

    }
    else{
        $update_filename=$old_image;
    }
    if(file_exists('images/' .$_FILES['image']['name'])){
        $filename=$_FILES['image']['name'];
        $_SESSION['status']="image existe déja";
        header('location: liste_utilisateurs.php');
    }
    else{
        $query2 = "UPDATE utilisateurs SET 
        nom = '$nom',prenom='$prenom',date_naissance='$date_de_naissance',telephone='$telephone',email='$email',
        password='$motdepasse',type='$type',image='$update_filename',ville='$ville' where id ='" . $id . "'";
        $query_run=mysqli_query($mysqli,$query2);
        if($query_run){
        header('location: liste_utilisateurs.php');
        }else{
            echo '<div class="card-body">
            <div class="alert-icon-area alert alert-warning " role="alert">


            <div class="alert-icon">
                <span data-feather="layers"></span>
            </div>

            <div class="alert-content">


                <p>Il n\'y a pas de tâches</p>


            </div>
        </div>
        </div>';
        }
    }
}

?>