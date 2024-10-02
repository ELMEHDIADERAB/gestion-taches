<?php
session_start();
if(!isset($_SESSION['email'])){
    echo '<script>window.location.href="login.php" </script>';
}
include 'connexion.php';
include 'layout.php';


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


    <div class="contents">


        <div class="atbd-page-content">
            <div class="container-fluid">
                <div class="note-wrapper">
                    <div class="row">
                        <!-- <div class="col-lg-12">

                                <div class="breadcrumb-main">
                                    <h4 class="text-capitalize breadcrumb-title">Task</h4>
                                    <div class="breadcrumb-action justify-content-center flex-wrap">
                                        
                                        <div class="action-btn">
                                            <a href="" class="btn btn-sm btn-primary btn-add" data-toggle="modal" data-target="#taskModal">
                                                <i class="la la-plus"></i> Nouveau Tâche</a>
                                        </div>
                                    </div>
                                </div>

                            </div>-->
                        <div class="col-lg-12 mt-35">
                            <div class="note-contents">
                                <div class="note-sibebar-wrapper mb-30">

                                    <div class="note-sidebar">
                                        <div class="card border-0">
                                            <div class="card-body px-15 pt-30">
                                                <div class="px-3">
                                                    <a href="#" class="btn btn-primary btn-default btn-rounded btn-block" data-toggle="modal" data-target="#taskModal"> <span data-feather="plus"></span>
                                                        Nouveau Tâche</a>
                                                </div>
                                                <div class="note-types task-types">
                                                    <ul class="nav  mb-3" id="pills-tab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><span data-feather="edit"></span> Toute</a>
                                                        </li>

                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><span data-feather="check"></span>
                                                                complété</a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="pills-deleted-tab" data-toggle="pill" href="#pills-deleted" role="tab" aria-controls="pills-deleted" aria-selected="false"><span data-feather="trash-2"></span>
                                                                Supprimé</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- ends: .col-lg-2 -->
                                <div class="note-grid-wrapper mb-30">
                                    <div class="task-wrapper">
                                        <div class="task-single">
                                            <div class="task-card card">
                                                <div class="card-header">
                                                    Liste des tâches
                                                </div>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                        <?php
                                                        $requete_taches = "SELECT   taches.* ,taches.id as idTache, utilisateurs.* 
                                                        FROM taches 
                                                        INNER JOIN utilisateurs ON taches.user_id=utilisateurs.id where taches.isDeleted =0";
                                                        $requete_taches_run = $mysqli->query($requete_taches);
                                                        if (@mysqli_num_rows(@$requete_taches_run) > 0) {
                                                            foreach ($requete_taches_run as $tache) {

                                                        ?>


                                                                <div class="card-body task-card__body">
                                                                    <div class="task-card__content d-flex justify-content-between align-items-center">
                                                                        <div class="task-card__header">

                                                                            <div class="checkbox-group d-flex">

                                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                                    <input class="checkbox" type="checkbox" id="id_tache=[]" name="id_taches[]">
                                                                                    <label for="id_taches" class="">

                                                                                        <?= $tache['titre'] ?>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <span><?= $tache['description'] ?></span>
                                                                        </div>

                                                                        <div class="media-ui__start">
                                                                            <span class="color-light fs-12">Date début</span>
                                                                            <p class="fs-14 fw-500 color-dark mb-0">
                                                                                <?= $tache['date_debut'] ?></p>
                                                                        </div>
                                                                        <div class="media-ui__end mr-30 ">
                                                                            <span class="color-light fs-12">Date fin</span>
                                                                            <p class="fs-16 fw-500 color-dark mb-0">
                                                                                <?= $tache['date_fin'] ?></p>
                                                                        </div>
                                                                        <div class="media-ui__end mr-20">


                                                                            <img class="rounded-circle wh-50 bg-opacity-secondary" src="<?= $tache['image'] ?>">
                                                                        </div>





                                                                        <div class="table-actions">

                                                                            <div class="dropdown dropdown-click">
                                                                                <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span data-feather="more-vertical"></span>
                                                                                </button>
                                                                                <div class="dropdown-default dropdown-menu">
                                                                                    <a class="dropdown-item" href="edit_task.php?id_task=<?= $tache['idTache'] ?>"><span data-feather="edit"></span>Modifier</a>
                                                                                    <a class="dropdown-item" onclick="return confirm('voulez-vous vraiment supprimer cet tache')" href="delete_task.php?id_task=<?= $tache['id'] ?>"><span data-feather="trash-2"></span>
                                                                                        supprimer</a>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php }
                                                        } else {
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
                                                        } ?>
                                                    </div>


                                                    <div class="tab-pane fade" id="pills-deleted" role="tabpanel" aria-labelledby="pills-deleted-tab">
                                                        <?php
                                                        $tache_supprimer = "SELECT   taches.*, utilisateurs.* 
                                                        FROM taches
                                                        INNER JOIN utilisateurs ON taches.user_id=utilisateurs.id where taches.isDeleted=1";
                                                        $tache_supprimer_run = mysqli_query($mysqli, $tache_supprimer);
                                                        if (@mysqli_num_rows(@$tache_supprimer_run) > 0) {
                                                            foreach ($tache_supprimer_run as $tache1) {

                                                        ?>
                                                                <div class="card-body task-card__body">
                                                                    <div class="task-card__content d-flex justify-content-between align-items-center">
                                                                        <div class="task-card__header">
                                                                            <div class="checkbox-group d-flex">
                                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">

                                                                                    <label for="check-grp-task10" class="">
                                                                                        <?= $tache1['titre'] ?>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <span><?= $tache1['description'] ?></span>

                                                                        </div>
                                                                        <div class="media-ui__start">
                                                                            <span class="color-light fs-12">Date début</span>
                                                                            <p class="fs-14 fw-500 color-dark mb-0">
                                                                                <?= $tache1['date_debut'] ?></p>
                                                                        </div>
                                                                        <div class="media-ui__end mr-30">
                                                                            <span class="color-light fs-12">Date fin</span>
                                                                            <p class="fs-16 fw-500 color-dark mb-0">
                                                                                <?= $tache1['date_fin'] ?></p>
                                                                        </div>
                                                                        <div class="media-ui__end  mr-20">


                                                                            <img class="rounded-circle wh-50 bg-opacity-secondary" src="<?= $tache1['image'] ?>">
                                                                        </div>
                                                                        <div class="table-actions">

                                                                            <div class="dropdown dropdown-click">
                                                                                <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span data-feather="more-vertical"></span>
                                                                                </button>
                                                                                <div class="dropdown-default dropdown-menu">
                                                                                    <a class="dropdown-item" href="recuperer.php?r_id=<?= $tache['idTache'] ?>"><span data-feather="edit"></span>
                                                                                        Récupérer</a>
                                                                                    <a class="dropdown-item" href="#"><span data-feather="trash-2"></span>
                                                                                        Supprimer</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        } ?>






                                                    </div>


                                                    <!-- pills comleted-->

                                                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                                        <?php
                                                        $tache_terminer = "SELECT   taches.*, utilisateurs.* 
                                                        FROM taches
                                                        INNER JOIN utilisateurs ON taches.user_id=utilisateurs.id where taches.etat=100 and taches.isDeleted=0";
                                                        $tache_terminer_run = mysqli_query($mysqli, $tache_terminer);
                                                        if (@mysqli_num_rows(@$tache_terminer_run) > 0) {
                                                            foreach ($tache_terminer_run as $tache2) {

                                                        ?>
                                                                <div class="card-body task-card__body">
                                                                    <div class="task-card__content d-flex justify-content-between align-items-center">
                                                                        <div class="task-card__header">
                                                                            <div class="checkbox-group d-flex">
                                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                                    <input class="checkbox" type="checkbox" id="check-grp-task7" checked>
                                                                                    <label for="check-grp-task7" class="">
                                                                                        <?= $tache2['titre'] ?>
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                            <span><?= $tache2['description'] ?></span>
                                                                        </div>
                                                                        <div class="media-ui__start">
                                                                            <span class="color-light fs-12">Date début</span>
                                                                            <p class="fs-14 fw-500 color-dark mb-0">
                                                                                <?= $tache2['date_debut'] ?></p>
                                                                        </div>
                                                                        <div class="media-ui__end mr-30">
                                                                            <span class="color-light fs-12">Date fin</span>
                                                                            <p class="fs-16 fw-500 color-dark mb-0">
                                                                                <?= $tache2['date_fin'] ?></p>
                                                                        </div>
                                                                        <div class="media-ui__end  mr-20">


                                                                            <img class="rounded-circle wh-50 bg-opacity-secondary" src="<?= $tache2['image'] ?>">
                                                                        </div>
                                                                        <div class="table-actions">

                                                                            <div class="dropdown dropdown-click">
                                                                                <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <span data-feather="more-vertical"></span>
                                                                                </button>
                                                                                <div class="dropdown-default dropdown-menu">
                                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#taskModal2"><span data-feather="edit"></span> Modifier</a>
                                                                                    <a class="dropdown-item" href="#"><span data-feather="trash-2"></span>
                                                                                        Supprimer</a>
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
                                        </div>
                                    </div><!-- ends: .col-lg-10 -->
                                </div>
                            </div><!-- ends: .col-lg-12 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ends: .atbd-page-content -->

            <div class="modal fade task-modal" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Nouveau Tâche</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span data-feather="x"></span>
                                </button>
                            </div>
                            <form action="" method="POST">
                                <div class="form-group mb-20 mt-20">
                                    <input type="text" class="form-control" name="titre" placeholder="Titre">
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
                                            <option name="client" value="<?= $projet['id'] ?>"> <?= $projet['titre'] ?>
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
                                        <label for="debut">Date début</label>
                                        <div class="position-relative">
                                            <input type="date" class="form-control" name="date_debut" id="debut" placeholder="mm/dd/yyyy">
                                            <a href="#">
                                                <span data-feather="calendar"></span></a>
                                        </div>
                                    </div>
                                    <div class="form-group w-100 form-group-calender">
                                        <label for="fin">Date fin</label>
                                        <div class="position-relative">
                                            <input type="date" class="form-control" name="date_fin" id="fin" placeholder="mm/dd/yyyy">
                                            <a href="#">
                                                <span data-feather="calendar"></span></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer m-n15">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">annuler</button>
                                    <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade task-modal" id="taskModal2" tabindex="-1" aria-labelledby="taskModalLabal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Task</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span data-feather="x"></span>
                                </button>
                            </div>
                            <form action="/">
                                <div class="form-group mb-20 mt-20">
                                    <input type="text" class="form-control" placeholder="Edit Title" value="Dashboard design stucture">
                                </div>
                                <div class="form-group mb-15">
                                    <textarea class="form-control" placeholder="Add description"></textarea>
                                </div>
                            </form>
                            <div class="modal-footer m-n15">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>


</main>

<?php
include 'footer.php'
?>