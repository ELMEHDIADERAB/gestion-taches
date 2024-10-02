<?php
session_start();
if(!isset($_SESSION['email'])){
    echo '<script>window.location.href="login.php" </script>';
}
require 'connexion.php';
include 'layout.php';
if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['datenaissance'];
    $telephone = $_POST['telephone'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    $motdepasse =  md5($_POST['motdepasse']);
    $role = $_POST['role'];

    /*
    $image = $_FILES["imageUpload"]["tmp_name"];
    $imageData = addslashes(file_get_contents($image));
    $imageName = 'images/' .$_FILES["imageUpload"]["name"];
    
    $query = "INSERT into utilisateurs (nom,prenom,date_naissance,telephone,email,password,type,image,image_data)
    values('$nom','$prenom','$date_de_naissance','$telephone','$email','$motdepasse','$type','$imageName','$imageData')";
     if ($mysqli->query($query) === TRUE) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error: " . $query . "<br>" . $mysqli->error;
    }
    
   
}
*/
    @$file = $_FILES['file'];
    @$fileName = $_FILES['file']['name'];
    @$fileTmpName = $_FILES['file']['tmp_name'];
    @$fileSize = $_FILES['file']['size'];
    @$fileError = $_FILES['file']['error'];
    @$fileType = $_FILES['file']['type'];


    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));


    $allowed = array('png', 'jpg', 'jpeg', 'webp');

    //Tu fais les vérifications nécéssaires
    if (in_array($fileActualExt, $allowed))
    //Si l'extension n'est pas dans le tableau
    {
        if ($fileError === 0) {

            if ($fileSize < 5000000) {

                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'images/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);

                $fileDestination1 = 'images/' . $fileNameNew;
                $query = "INSERT into utilisateurs (nom,prenom,date_naissance,telephone,email,password,role,image,profession)
                 values('$nom','$prenom','$date_de_naissance','$telephone','$email','$motdepasse','$role','$fileDestination1','$profession')";
                //  $query_run = $mysqli->query($query) ;
                $query_run = mysqli_query($mysqli, $query);

                if ($query_run) {
                    echo '<script>window.location.href="liste_utilisateurs.php" </script>';

                } else {
                    echo "<script>alert('error');</script>'";
                }
            }
        }
    }
}
?>
<main class="main-content">
    <div class="contents mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-header">
                        <h6>Ajouter utilisateurs</h6>
                    </div>
                    <div class="card-body py-md-30">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-25">
                                    <input type="text" name="nom" id="nom" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Nom">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <input type="text" name="prenom" id="prenom" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prénom">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <input type="date" name="datenaissance" id="datenaissance" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Date de naissance">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <input type="text" name="telephone" id="telephone" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Téléphone">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <input type="text" name="profession" id="profession" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="profession">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <input type="email" name="email" id="email" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Email">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <input type="password" name="motdepasse" id="motdepasse" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Mot de passe">
                                </div>

                                <div class="col-md-6 mb-25">
                                    
                                    <select name="role" class="form-control">
                                        <option selected readonly>Rôle</option>
                                        <option>Admin</option>
                                        <option>User</option>
                                    </select>
                                </div>
                                <!--<div class="col-md-3 mb-15">
                                <input class="form-control " type="file" name="imageUpload" id="imageUpload">
                                </div>-->
                                <div class="col-12">
                                    <input id="fileInput" type="file" name="file" style="display:none;" multiple />
                                    <input type="button" name="file" class="btn btn-primary btn-block mx-auto text-uppercase" value="insérer IMAGE MAINTENANT" onclick="document.getElementById('fileInput').click();" multiple />

                                </div>
                                <div class="col-md-6 mb-25">
                                    <div class="layout-button mt-0">
                                        <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Annuler</button>
                                        <button type="submit" name="ajouter" id="ajouter" class="btn btn-primary btn-default btn-squared px-30">Enregistrer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ends: .card -->

            </div>
        </div>


    </div>




</main>


<?php
include 'footer.php'
?>