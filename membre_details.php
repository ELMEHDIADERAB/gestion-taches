<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href="login.php" </script>';
}

include 'layout.php';

$id_user = $_GET['Id_USER'];

if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $profession = $_POST['profession'];
    $role = $_POST['role'];
    $date_de_naissance = $_POST['datenaissance'];
    // $image=$_FILES['img']['name'];
    //$upload="images/" .$image;
    //move_uploaded_file($_FILES['img']['tmp_name'],$upload);
    $query_add = "UPDATE utilisateurs set nom = '$nom',prenom='$prenom',date_naissance='$date_de_naissance',telephone='$telephone',email='$email', role='$role',profession='$profession' where id=$id_user ";
    if (mysqli_query($mysqli, $query_add)) {
        echo "<script>alert('Profile Bien modifer!');</script>'";
        echo '<script>window.location.href="profile.php" </script>';
    } else {
        echo "<script>alert('Erreur');</script>'";
    }
}
if (isset($_POST['modifierMotPasse'])) {
    $motdepaase = md5($_POST['motdepaase']);
    $update_password = "UPDATE utilisateurs set password='$motdepaase' where id=$id_user";
    if (mysqli_query($mysqli, $update_password)) {
        echo "<script>alert('Mot de passe Bien modifer!');</script>'";
        echo '<script>window.location.href="profile.php" </script>';
    } else {
        echo "<script>alert('Erreur');</script>'";
    }
}

?>

<body class="layout-light side-menu overlayScroll">


    <main class="main-content">


        <div class="contents">

            <div class="profile-setting ">
                <div class="container-fluid">

                    <?php

                    $sql = "SELECT * from utilisateurs WHERE id = $id_user";
                    $sql_run = mysqli_query($mysqli, $sql);
                    if (mysqli_num_rows($sql_run) > 0) {
                        while ($row = $sql_run->fetch_assoc()) {

                    ?>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="breadcrumb-main">
                                        <h4 class="text-capitalize breadcrumb-title">Mon profile</h4>

                                    </div>

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-5">
                                    <!-- Profile Acoount -->
                                    <div class="card mb-25 mt-25">
                                        <div class="card-body text-center p-0">

                                            <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                                                <div class="ap-img mb-20 pro_img_wrapper">
                                                    <input id="file-upload" type="file" name="fileUpload" class="d-none">
                                                    <label for="file-upload">
                                                        <!-- Profile picture image-->
                                                        <img class="ap-img__main rounded-circle wh-120" src="<?= $row['image'] ?>" alt="profile">
                                                        <span class="cross" id="remove_pro_pic">
                                                            <span data-feather="camera"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="ap-nameAddress pb-3">
                                                    <h5 class="ap-nameAddress__title"><?= $row['nom'] . ' ' . $row['prenom'] ?></h5>
                                                    <p class="ap-nameAddress__subTitle fs-14 m-0"><?= $row['profession'] ?></p>
                                                </div>
                                            </div>
                                            <div class="ps-tab p-20 pb-25">
                                                <div class="nav flex-column text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                        <span data-feather="user"></span>Éditer le profile</a>
                                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                        <span data-feather="key"></span>Changer le mot de passe</a>
                                                    <a class="nav-link" id="v-pills-tache-tab" data-toggle="pill" href="#v-pills-tache" role="tab" aria-controls="v-pills-tache" aria-selected="false">
                                                        <span data-feather="key"></span>Liste des tâches</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Profile Acoount End -->
                                </div>
                                <div class="col-xxl-9 col-lg-8 col-sm-7">

                                    <div class="mb-50">
                                        <div class="tab-content" id="v-pills-tabContent">
                                            <div class="tab-pane fade  show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <!-- Edit Profile -->
                                                <div class="edit-profile mt-25">
                                                    <div class="card">
                                                        <div class="card-header px-sm-25 px-3">
                                                            <div class="edit-profile__title">
                                                                <h6>Modifier profile</h6>
                                                                <span class="fs-13 color-light fw-400">Configurer vos informations personnelles</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row justify-content-center">
                                                                <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                                    <div class="edit-profile__body mx-lg-20">
                                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                                            <div class="form-group mb-20">
                                                                                <label for="nom">Nom</label>
                                                                                <input type="text" class="form-control" value="<?= $row['nom'] ?>" name="nom" id="nom">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="prenom">Prénom</label>
                                                                                <input type="text" class="form-control" value="<?= $row['prenom'] ?>" name="prenom" id="prenom">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="email">Email</label>
                                                                                <input type="text" class="form-control" value="<?= $row['email'] ?>" name="email" id="email" readonly>
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="telephone">Téléphone</label>
                                                                                <input type="text" class="form-control" value="<?= $row['telephone'] ?>" name="telephone" id="telephone">
                                                                            </div>
                                                                            <label>Date de naissance</label>
                                                                            <div class="form-group mb-20">
                                                                                <input type="date" name="datenaissance" id="datenaissance" value="<?php echo $row['date_naissance']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Date de naissance">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="profession">Profession</label>
                                                                                <input type="text" class="form-control" value="<?= $row['profession'] ?>" name="profession" id="profession">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="departement">Rôle</label>
                                                                                <input type="text" class="form-control" id="role" value="<?= $row['role'] ?>" name="role">
                                                                            </div>
                                                                            <div class="button-group d-flex flex-wrap pt-30 mb-15">
                                                                                <button type="submit" name="modifier" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Modifier </button>


                                                                                <a href="index.php" class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                                                </a>





                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Edit Profile End -->
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <!-- Edit Profile -->
                                                <div class="edit-profile mt-25">
                                                    <div class="card">
                                                        <div class="card-header  px-sm-25 px-3">
                                                            <div class="edit-profile__title">
                                                                <h6> Modifier le mot de passe</h6>
                                                                <span class="fs-13 color-light fw-400">Configurer votre mot de passe</span>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="row justify-content-center">
                                                                <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                                    <div class="edit-profile__body mx-lg-20">
                                                                        <form method="POST" action="">

                                                                            <div class="form-group mb-1">
                                                                                <label for="motdepaase">Nouveau mot de passe</label>
                                                                                <div class="position-relative">
                                                                                    <input id="motdepaase" type="password" class="form-control pr-50" name="motdepaase" value="<?php echo $row['password'] ?>">

                                                                                </div>
                                                                                <small id="passwordHelpInline" class="text-light fs-13">Minimum 6 caractères
                                                                                </small>
                                                                            </div>
                                                                            <div class="button-group d-flex flex-wrap pt-45 mb-35">
                                                                                <button type="submit" name="modifierMotPasse" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Modifier
                                                                                </button>
                                                                                <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize">cancel
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Edit Profile End -->
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-tache" role="tabpanel" aria-labelledby="v-pills-tache-tab">
                                                <!-- Edit Profile -->
                                                <div class="edit-profile mt-25">
                                                    <div class="card">
                                                        <div class="card-header  px-sm-25 px-3">
                                                            <div class="edit-profile__title">
                                                                <h6> Modifier le mot de passe</h6>
                                                                <span class="fs-13 color-light fw-400">Configurer votre mot de passe</span>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <?php
                                                            $tache = "select * from taches where user_id=$id_user";
                                                            $tache_run = mysqli_query($mysqli, $tache);
                                                            if (mysqli_num_rows($tache_run) > 0) {
                                                                while ($row_tache = $tache_run->fetch_assoc()) {
                                                            ?>
                                                                    <div class="row justify-content-center">

                                                                        <div class="col-xxl-6 col-lg-12 col-sm-10 mt-2 mb-2 ">


                                                                            <a href="tache_details.php?tache=<?= $row_tache['id'] ?>">
                                                                                <h6> <?php echo $row_tache['titre'] ?></h6>
                                                                            </a>
                                                                            <span class="fs-13 color-light fw-400"><?php echo $row_tache['description'] ?></span><br>

                                                                        </div>

                                                                    </div>
                                                            <?php }
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Edit Profile End -->
                                        </div>

                                    </div>

                                </div>
                            </div>
                </div>
        <?php }
                    } ?>
            </div>
        </div>


        </div>
        <?php require 'footer.php'; ?>
    </main>


</body>

</html>