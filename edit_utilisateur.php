<?php
session_start();
require 'connexion.php';
include 'layout.php';

if(!isset($_SESSION['email'])){
    echo '<script>window.location.href="login.php" </script>';
}


/*
if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['datenaissance'];
    $telephone = $_POST['telephone'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $motdepasse =  $_POST['password'];
    $type = $_POST['type'];
    $id = $_GET['Id_USER'];

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
                $query2 = "UPDATE utilisateurs SET 
                 nom = '$nom',prenom='$prenom',date_naissance='$date_de_naissance',telephone='$telephone',email='$email',password='$motdepasse',type='$type',image='$fileDestination1',ville='$ville' where id ='" . $id . "'";
                $query_run = $mysqli->query($query2);

                if ($query_run) {
                    echo "<script>alert('Utilisateur bien modifie');</script>'";
                    // exit(0);
                    //header('location:liste_utilisateurs.php');

                } else {
                    echo "<script>alert('error');</script>'";
                }
            }
        }
    }
}*/

if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_de_naissance = $_POST['datenaissance'];
    $telephone = $_POST['telephone'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    $motdepasse =  md5($_POST['password']);
    $role = $_POST['role'];
    $id = $_GET['Id_USER'];



    $image=$_FILES['image']['name'];
    $upload="images/" .$image;
    move_uploaded_file($_FILES['image']['tmp_name'],$upload);



    /*$old_image = $_POST['image_old'];
    $new_image = $_FILES['image']['name'];

    if ($new_image != '') {
        $update_filename = $_FILES['image']['name'];
    } else {
        $update_filename = $old_image;
    }*/
    if (file_exists('image/' . $_FILES['image']['name'])) {
        $filename = $_FILES['image']['name'];
        $_SESSION['status'] = "image existe déja";
        header('location: liste_utilisateurs.php');
    } else {
        $query2 = "UPDATE utilisateurs SET 
        nom = '$nom',prenom='$prenom',date_naissance='$date_de_naissance',telephone='$telephone',email='$email',
        password='$motdepasse',role='$role',image='$upload',profession='$profession' where id ='" . $id . "'";
        $query_run = mysqli_query($mysqli, $query2);
        if ($query_run) {
            
            echo "<script>alert('Utilisateur bien modifié');</script>'";
           
           
        echo '<script>window.location.href="liste_utilisateurs.php" </script>';
        
        } else {
            echo '';
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
                        <h6>Modifier utilisateurs</h6>
                    </div>

                    <?php
                    $id = $_GET['Id_USER'];
                    $sql1 = "select * from utilisateurs where id ='" . $id . "'";
                    $sql_run = mysqli_query($mysqli, $sql1);
                    if (mysqli_num_rows($sql_run) > 0) {
                        while ($row = $sql_run->fetch_assoc()) {

                    ?>




                            <div class="card-body py-md-30">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>" />
                                            <input type="text" name="nom" id="nom" value="<?php echo $row['nom']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Nom">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="prenom" id="prenom" value="<?php echo $row['prenom']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prénom">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="date" name="datenaissance" id="datenaissance" value="<?php echo $row['date_naissance']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Date de naissance">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="telephone" id="telephone" value="<?php echo $row['telephone']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Téléphone">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="profession" id="profession" value="<?php echo $row['profession']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="profession">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Email">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Mot de passe">

                                        </div>


                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="role" id="role" value="<?php echo $row['role']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Type">
                                        </div>

                                        <div class="col-12">

                                            <input type="file" name="image" class="form-contrtol" />

                                            <input type="hidden" name="image_old" value="<?php echo $row['image'] ?>" />

                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <div class="layout-button mt-0">
                                                <a href="liste_utilisateurs.php" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Cancel</a>

                                                <button type="submit" name="modifier" id="modifier" class="btn btn-primary btn-default btn-squared px-30">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>



                            <!-- <div class="card-body py-md-30">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-25">

                                            <input type="text" name="nom" id="nom" value="<?php echo $row['nom']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Nom">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="prenom" id="prenom" value="<?php echo $row['prenom']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Prénom">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="date" name="datenaissance" id="datenaissance" value="<?php echo $row['date_naissance']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Date de naissance">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="telephone" id="telephone" value="<?php echo $row['telephone']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Téléphone">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="ville" id="ville" value="<?php echo $row['ville']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="ville">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Email">
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <input type="password" name="password" id="password" value="<?php echo $row['password']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Mot de passe">
                                            
                                        </div>


                                        <div class="col-md-6 mb-25">
                                            <input type="text" name="type" id="type" value="<?php echo $row['type']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Type">
                                        </div>
                                       
                                        <div class="col-12">
                                            <input id="fileInput" type="file" value="<?php echo $row['image']; ?>" name="file" style="display:none;" multiple />
                                            <input id="file" name="file" type="hidden" value="<?php echo $row['image']; ?>"/>
                                            <input type="button" name="file" class="btn btn-primary btn-block mx-auto text-uppercase" value="insérer IMAGE MAINTENANT" onclick="document.getElementById('fileInput').click();" multiple />

                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <div class="layout-button mt-0">
                                                <button type="reset" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Annuler</button>
                                                <button type="submit" name="modifier" id="modifier" class="btn btn-primary btn-default btn-squared px-30">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div><?php }
                            } ?>

                </div>-->
                            <!-- ends: .card -->

                </div>
            </div>


        </div>




</main>


<?php
include 'footer.php'
?>