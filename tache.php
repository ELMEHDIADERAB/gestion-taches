<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href="login.php" </script>';
}
include 'layout.php';

include 'connexion.php';

if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $projet = $_POST['projet'];
    $utilisateur = $_POST['utilisateur'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $query_task = "INSERT into taches(titre,description,user_id,projet_id,date_debut,date_fin) values('$titre','$description','$utilisateur','$projet','$date_debut','$date_fin')";
    $query_task_run = $mysqli->query($query_task);
    if ($query_task_run) {
        echo '  <div class="modal-info-success modal fade show" id="modal-info-success" tabindex="-1" role="dialog" aria-hidden="true">


        <div class="modal-dialog modal-sm modal-info" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon success">
                            <span data-feather="check-circle"></span>
                        </div>

                        <div class="modal-info-text">
                            <p>Some contents...</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Ok</button>

                </div>
            </div>
        </div>


    </div>';
    } else {
        echo '<div class="modal-info-error modal fade show" id="modal-info-error" tabindex="-1" role="dialog" aria-hidden="true">


        <div class="modal-dialog modal-sm modal-info" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-info-body d-flex">
                        <div class="modal-info-icon danger">
                            <span data-feather="x-circle"></span>
                        </div>

                        <div class="modal-info-text">
                            <p>Some contents...</p>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Ok</button>

                </div>
            </div>
        </div>


    </div>';
    }
}
?>


<main class="main-content">
    <div class="contents mt-5">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="project-progree-breadcrumb">

                        <div class="breadcrumb-main user-member justify-content-sm-between createModal">
                            <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                                <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                                    <h4 class="text-capitalize fw-500 breadcrumb-title">Tâches</h4>
                                    <?php
                                    $nbr_projet = "SELECT COUNT(*) as count FROM `taches` WHERE etat<100 and isDeleted=0";
                                    $nbr_projet_run = $mysqli->query($nbr_projet);
                                    $nbr = $nbr_projet_run->fetch_assoc();
                                    ?>
                                    <span class="sub-title ml-sm-25 pl-sm-25"><?= $nbr['count'] ?> Tâche(s) en cours</span>
                                </div>

                            </div>
                            <form action="" method="POST">
                                <div class="form-group mb-20">
                                    <!--<input type="text" name="search_project" class="form-control" placeholder="Rechercher un projet">-->
                                </div>
                            </form>
                            <div class="action-btn">
                                <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                                    <i class="las la-plus fs-16"></i>Nouveau tache</a>

                                <!-- Modal -->
                                <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content  radius-xl">
                                            <div class="modal-header">
                                                <h6 class="modal-title fw-500" id="staticBackdropLabel">Nouveau tâche</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span data-feather="x">X</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="new-member-modal">
                                                    <form action="" method="POST">
                                                        <div class="form-group mb-20">
                                                            <input type="text" name="titre" class="form-control" placeholder="Titre">
                                                        </div>
                                                        <div class="form-group mb-15">
                                                            <textarea class="form-control" rows="2" cols="25" name="description" placeholder="Description"></textarea>
                                                        </div>

                                                        <div class="form-group mb-20">

                                                            <select name="projet" class="form-control">
                                                                <option selected readonly>Projet</option>
                                                                <?php
                                                                $query = "select * from projets where isDeleted=0";
                                                                global $resultat;
                                                                $resultat = $mysqli->query($query) or die('Erreur ' . $query . ' ' . $mysqli->error);
                                                                while ($projet = $resultat->fetch_assoc()) {
                                                                ?>
                                                                    <option name="projet" value="<?= $projet['id'] ?>"> <?= $projet['titre'] ?>
                                                                    </option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-20">

                                                            <select name="utilisateur" class="form-control">
                                                                <option selected readonly>Membre</option>
                                                                <?php
                                                                $query1 = "select * from utilisateurs where isDeleted=0";
                                                                global $resultat;
                                                                $resultat1 = $mysqli->query($query1) or die('Erreur ' . $query1 . ' ' . $mysqli->error);
                                                                // tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
                                                                while ($utilisateurs = $resultat1->fetch_assoc()) {
                                                                ?>
                                                                    <option name="utilisateur" value="<?= $utilisateurs['id'] ?>">
                                                                        <?= $utilisateurs['nom'] . " " . $utilisateurs['prenom'] ?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>

                                                        

                                                        <div class="d-flex new-member-calendar">
                                                            <div class="form-group w-100 mr-sm-15 form-group-calender">
                                                                <label for="datepicker">Date début</label>
                                                                <div class="position-relative">
                                                                    <input type="date" class="form-control" name="date_debut" id="date_debut" placeholder="mm/dd/yyyy">


                                                                </div>
                                                            </div>
                                                            <div class="form-group w-100 form-group-calender">
                                                                <label for="datepicker2">Date fin</label>
                                                                <div class="position-relative">
                                                                    <input type="date" class="form-control" name="date_fin" id="date_fin" placeholder="mm/dd/yyyy">


                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="button-group d-flex pt-25">



                                                            <button type="submit" id="ajouter" name="ajouter" class="btn btn-primary btn-default btn-squared text-capitalize">Nouveau Tâche
                                                            </button>
                                                            <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">Annuler</button>
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
            </div>

            <div class="projects-tab-content projects-tab-content--progress">
                <div class="tab-content mt-25" id="ap-tabContent">
                    <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">

                        <div class="row">
                            <?php






                            // $query_taches = "select * from taches where isDeleted=0";
                            $query_taches = "SELECT   taches.*,taches.id as id_tache, utilisateurs.* 
                            FROM taches
                            INNER JOIN utilisateurs ON taches.user_id=utilisateurs.id where  taches.isDeleted=0";
                            $query_tache_run = $mysqli->query($query_taches);
                            while ($tache = $query_tache_run->fetch_assoc()) {
                                $id_taches = $tache['id'];


                            ?>
                                <div class="col-xl-4 mb-25 col-md-6">

                                    <div class="user-group radius-xl bg-white media-ui media-ui--early pt-30 pb-25">
                                        <div class="border-bottom px-30">
                                            <div class="media user-group-media d-flex justify-content-between">
                                                <div class="media-body d-flex align-items-center flex-wrap text-capitalize my-sm-0 my-n2">
                                                    <a href="tache_details.php?tache=<?= $tache['id_tache'] ?>">
                                                        <h6 class="mt-0  fw-500 user-group media-ui__title"><?= $tache['titre'] ?></h6>
                                                    </a>
                                                    <?php
                                                    //$progress = $projet['progress'];
                                                    // $progress = $moy['moyenne'];
                                                    $progress = $tache['etat'];
                                                    if ($progress < 100) {
                                                    ?>
                                                        <span class="my-sm-0 my-2 media-badge text-uppercase color-white bg-primary">En cours</span>
                                                    <?php }
                                                    if ($progress == 100) {
                                                        echo '<span class="media-badge text-uppercase color-white bg-success">complété</span>';
                                                    } else {
                                                        # code...
                                                    }

                                                    ?>
                                                </div>
                                                <div class="mt-n15">
                                                    <div class="dropdown dropleft">
                                                        <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span data-feather="more-horizontal"></span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="tache_details.php?tache=<?= $tache['id_tache'] ?>">Voir</a>
                                                            <a class="dropdown-item" href="edite_tache.php?idt=<?php echo $tache['id_tache'] ?>">Modifier</a>
                                                            <a class="dropdown-item" href="delete_task.php?id_task=<?php echo $tache['id_tache'] ?>" onclick="return confirm('voulez-vous vraiment supprimer cet tâche')">Supprimer</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-group-people mt-15 text-capitalize">
                                                <p><?= $tache['description'] ?></p>
                                                <div class="user-group-project">
                                                    <div class="d-flex align-items-center user-group-progress-top">
                                                        <div class="media-ui__start">
                                                            <span class="color-light fs-12">Date début</span>
                                                            <p class="fs-14 fw-500 color-dark mb-0"> <?= $tache['date_debut'] ?></p>
                                                        </div>
                                                        <div class="media-ui__end">
                                                            <span class="color-light fs-12">Date fin</span>
                                                            <p class="fs-16 fw-500 color-success mb-0"><?= $tache['date_fin'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="user-group-progress-bar">

                                                <div class="progress-wrap d-flex align-items-center mb-0">
                                                    <div class="progress">
                                                        <?php if ($tache['etat'] < 100) { ?>
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $tache['etat'] ?>%;" aria-valuenow="<?= $tache['etat'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <?php } else { ?>
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?= $tache['etat'] ?>%;" aria-valuenow="<?= $tache['etat'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                                        <?php

                                                        } ?>
                                                    </div>


                                                    <span class="progress-percentage"><?= $tache['etat'] ?>%</span>


                                                </div>

                                                <p class="color-light fs-12 mb-20"><!--12 / 15 tasks completed--></p>
                                            </div>
                                        </div>
                                        <div class="mt-20 px-30">
                                            <p class="fs-13 color-light mb-10">Assigné à</p>
                                            <ul class="d-flex flex-wrap user-group-people__parent">

                                                <li>
                                                    <a href="#"><img class="rounded-circle wh-34 bg-opacity-secondary" src="<?= $tache['image'] ?>" alt="author"></a>
                                                </li>
                                                <?php  ?>
                                            </ul>
                                        </div>
                                    </div>

                                </div>



                            <?php } ?>
                        </div>


                    </div>

                </div>
            </div><!-- End: .projects-tab-content -->
        </div>

    </div>
</main>