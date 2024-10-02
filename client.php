<?php
session_start();
include 'layout.php';
include 'connexion.php';

if(!isset($_SESSION['email'])){
    echo '<script>window.location.href="login.php" </script>';
}


if(isset($_POST['ajouter'])){
if($_POST['nom']==''&& $_POST['prenom']==''){
    echo "<script>alert('Remplir les champs');</script>'";

   
}else{

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $entreprise=$_POST['entreprise'];
    $departement=$_POST['departement'];
    $image=$_FILES['img']['name'];
    $upload="images/" .$image;
    move_uploaded_file($_FILES['img']['tmp_name'],$upload);
    $query_add="insert into clients(nom,prenom,email,telephone,entreprise,departement,logo) values('$nom','$prenom','$email','$telephone','$entreprise','$departement','$upload')";
    if(mysqli_query($mysqli,$query_add)){
        echo "<script>alert('Client Bien Ajoute!');</script>'";
        echo '<script>window.location.href="client.php" </script>';
    }else{
        echo "<script>alert('Erreur');</script>'";
    }
    }
}

?>

<body class="layout-light side-menu overlayScroll">

    <main class="main-content">


        <div class="contents">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main user-member justify-content-sm-between ">
                            <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Clients</h4>
                                    <?php
                                    $nbr_client = "SELECT COUNT(*) as count FROM `clients` where isDeleted=0 ";
                                    $nbr_client_run = $mysqli->query($nbr_client);
                                    $nbr = $nbr_client_run->fetch_assoc();
                                    ?>
                                    <span class="sub-title ml-sm-25 pl-sm-25"><?php echo $nbr['count']?> Clients </span>
                                </div>

                                <form action="/"   class="d-flex align-items-center user-member__form my-sm-0 my-2">
                                    <span data-feather="search"></span>
                                    <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Search by Name" aria-label="Search">
                                </form>

                            </div>
                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                                    <i class="las la-plus fs-16"></i>Nouveau Client</a>

                                <!-- Modal -->
                                <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content  radius-xl">
                                            <div class="modal-header">
                                                <h6 class="modal-title fw-500" id="staticBackdropLabel">Ajouter client</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span data-feather="x"></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="new-member-modal">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" name="nom" placeholder="Nom">
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" name="prenom" placeholder="Prénom">
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" name="email" placeholder="Email">
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" name="entreprise" placeholder="Entreprise">
                                                        </div>
                                                        <div class="form-group mb-20">
                                                            <input type="text" class="form-control" name="departement" placeholder="Département">
                                                        </div>
                                                        <div class="col-12">
                                                        <label for="img">Logo</label>
                                    <input id="fileInput" class="form-control-file" type="file" name="img"  multiple />
                                    <!--<input type="button" name="file" class="btn btn-primary btn-block mx-auto text-uppercase" value="Logo" onclick="document.getElementById('fileInput').click();" multiple />-->

                                </div>
                                                        <div class="button-group d-flex pt-25">
                                                            <button   type="submit" name="ajouter" id="ajouter"  class="btn btn-primary btn-default btn-squared text-capitalize">Nouveau client
                                                            </button>

                                                            <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">Annuler
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->


                            </div>
                        </div>

                    </div>
                </div>



                <div class="row">
                    <?php

                    $query = "SELECT * FROM clients where isDeleted=0 ";
                    $query_run = mysqli_query($mysqli, $query);
                    if (@mysqli_num_rows(@$query_run) > 0) {
                        foreach ($query_run as $row) {

                    ?>
                            <div class="col-xxl-3 col-lg-4 col-md-6 mb-25">
                                <!-- Profile Acoount -->
                                <div class="card">
                                    <div class="card-body text-center pt-30 px-25 pb-5">

                                        <div class="account-profile-cards  ">
                                            <div class="ap-img d-flex justify-content-center">
                                                <!-- Profile picture image-->
                                                <img class="ap-img__main bg-opacity-primary  wh-120 rounded-circle mb-3 " src="<?= $row['logo']?>" alt="profile">
                                            </div>
                                            <div class="ap-nameAddress">
                                                <h6 class="ap-nameAddress__title"><?= $row['nom'] . ' ' . $row['prenom'] ?></h6>
                                                <p class="ap-nameAddress__subTitle  fs-14 pt-1 m-0 "><?= $row['entreprise'] ?></p>
                                            </div>
                                            <div class="ap-button account-profile-cards__button button-group d-flex justify-content-center flex-wrap pt-20">
                                                <a href="editer_client.php?id=<?= $row['id']?>" class="btn btn-primary">Editer</a>
                                                &nbsp;
                                                <a  href="supprimer_client.php?did=<?= $row['id']?>"  onclick="return confirm('voulez-vous vraiment supprimer ce client')" class="btn btn-outline-light">
                                                    Supprimer</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Profile Acoount End -->
                            </div>
                    <?php }
                    } ?>
                </div>

            </div>

        </div>

    </main>