<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href="login.php" </script>';
}

include 'layout.php';
$id = $_GET['id'];
if (isset($_POST['modifier'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $entreprise = $_POST['entreprise'];
    $departement = $_POST['departement'];



    $image = $_FILES['image']['name'];
    $upload = "images/" . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $upload);


    // $image=$_FILES['img']['name'];
    //$upload="images/" .$image;
    //move_uploaded_file($_FILES['img']['tmp_name'],$upload);
    $query_add = "UPDATE clients set nom='$nom',prenom='$prenom',logo='$upload',email='$email',telephone='$telephone',entreprise='$entreprise',departement='$departement' where id='$id' ";
    if (mysqli_query($mysqli, $query_add)) {
        echo "<script>alert('Client Bien modifer!');</script>'";
        echo '<script>window.location.href="client.php" </script>';
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

                    $sql = "select * from clients where id='$id'";
                    $sql_run = mysqli_query($mysqli, $sql);
                    if (mysqli_num_rows($sql_run) > 0) {
                        while ($row = $sql_run->fetch_assoc()) {

                    ?>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="breadcrumb-main">
                                        <h4 class="text-capitalize breadcrumb-title">My profile</h4>

                                    </div>

                                </div>
                                <div class="col-xxl-3 col-lg-4 col-sm-5">
                                    <!-- Profile Acoount -->
                                    <div class="card mb-25">
                                        <div class="card-body text-center p-0">

                                            <div class="account-profile border-bottom pt-25 px-25 pb-0 flex-column d-flex align-items-center ">
                                                <div class="ap-img mb-20 pro_img_wrapper">
                                                    <input id="file-upload" type="file" name="image" class="d-none">
                                                    <label for="file-upload">
                                                        <!-- Profile picture image-->
                                                        <img class="ap-img__main rounded-circle wh-120" src="<?= $row['logo'] ?>" alt="profile">
                                                        <span class="cross" id="remove_pro_pic">
                                                            <span data-feather="camera"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="ap-nameAddress pb-3">
                                                    <h5 class="ap-nameAddress__title"><?= $row['nom'] . ' ' . $row['prenom'] ?></h5>
                                                    <p class="ap-nameAddress__subTitle fs-14 m-0"><?= $row['entreprise'] ?></p>
                                                </div>
                                            </div>
                                            <div class="ps-tab p-20 pb-25">
                                                <div class="nav flex-column text-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                        <span data-feather="user"></span>Editer le profile</a>
                                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                        <span data-feather="settings"></span>Paramètre Du Compte</a>
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
                                                                <h6>Modifier Client</h6>
                                                                <span class="fs-13 color-light fw-400">Configurer vos informations personnelles</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row justify-content-center">
                                                                <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                                    <div class="edit-profile__body mx-lg-20">
                                                                        <form action="" method="POST" enctype="multipart/form-data">
                                                                            <div class="ap-img mb-20 pro_img_wrapper">
                                                                                <input id="image" type="file" name="image" class="d-none">
                                                                                <label for="image">
                                                                                    <!-- Profile picture image-->
                                                                                    <img class="ap-img__main rounded-circle wh-120"  src="<?= $row['logo'] ?>" alt="profile">
                                                                                    <span class="cross" id="remove_pro_pic">
                                                                                        <span data-feather="camera"></span>
                                                                                    </span>
                                                                                </label>
                                                                            </div>
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
                                                                                <input type="text" class="form-control" value="<?= $row['email'] ?>" name="email" id="email">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="telephone">Téléphone</label>
                                                                                <input type="text" class="form-control" value="<?= $row['telephone'] ?>" name="telephone" id="telephone">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="entreprise">Entreprise</label>
                                                                                <input type="text" class="form-control" value="<?= $row['entreprise'] ?>" name="entreprise" id="entreprise">
                                                                            </div>
                                                                            <div class="form-group mb-20">
                                                                                <label for="departement">Département</label>
                                                                                <input type="text" class="form-control" id="departement" value="<?= $row['departement'] ?>" name="departement">
                                                                            </div>
                                                                            <div class="button-group d-flex flex-wrap pt-30 mb-15">
                                                                                <button type="submit" name="modifier" class="btn btn-primary btn-default btn-squared mr-15 text-capitalize">Modifier </button>


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
                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                <!-- Edit Profile -->
                                                <div class="edit-profile mt-25">
                                                    <div class="card">
                                                        <div class="card-header  px-sm-25 px-3">
                                                            <div class="edit-profile__title">
                                                                <h6>Paramètre du compte</h6>
                                                                <span class="fs-13 color-light fw-400">fermer le comptet</span>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer">
                                                            <div class="row justify-content-center align-items-center">
                                                                <div class="col-xxl-6 col-lg-8 col-sm-10">
                                                                    <div class="d-flex justify-content-between mt-1 align-items-center flex-wrap">
                                                                        <div class="text-capitalize py-10">
                                                                            <h6>Fermer le compte</h6>
                                                                            <span class="fs-13 color-light fw-400">Supprimez votre compte et les données de compte</span>
                                                                        </div>
                                                                        <div class="my-sm-0 my-10 py-10">
                                                                            <a href="supprimer_client.php?did=<?= $row['id'] ?>" class="btn btn-danger btn-default btn-squared fw-400 text-capitalize">Fermer compte
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
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