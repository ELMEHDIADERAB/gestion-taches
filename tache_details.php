<?php
session_start();
if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href="login.php" </script>';
}
include 'connexion.php';
include 'layout.php';
$id_tache = $_GET['tache'];
?>
<main class="main-content">
    <div class="contents">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="breadcrumb-main application-ui mb-30">
                        <div class="breadcrumb-action d-flex">
                            <div class="d-flex align-items-center user-member__title mr-sm-25 mr-0">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Tâche</h4>
                            </div>


                        </div>
                        <div class="d-flex text-capitalize">
                            <a href="edite_tache.php?idt=<?php echo $id_tache ?>" type="button" class="breadcrumb-edit border-0 color-primary content-center bg-white fs-12 fw-500 radius-md">
                                <span data-feather="edit-3"></span>Modifier</a>
                            <a type="button" href="delete_projet.php?id_projet=<?php echo $id_tache ?>" onclick="return confirm('voulez-vous vraiment supprimer ce projet')" class="breadcrumb-remove border-0 color-danger content-center bg-white fs-12 fw-500 ml-10 radius-md">
                                <span data-feather="trash-2"></span>Supprimer</a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="projects-tab-content mb-30">
                <div class="row">
                    <?php
                    //$id_projet = $_GET['projet'];




                    $moyenne_taches = "SELECT round(avg(etat),2) as moyenne  FROM `taches` WHERE  projet_id='" . $id_tache . "'";
                    $moyenne_taches_run = $mysqli->query($moyenne_taches);

                    $moy = $moyenne_taches_run->fetch_assoc();




                    //$tache_query = "select * from taches where id='" . $id_tache . "'";


                    $tache_query = "SELECT   taches.*, projets.date_debut as 'dateDP' ,projets.date_fin as 'dateFP' FROM taches
                    INNER JOIN projets ON taches.projet_id=projets.id
                    where taches.id=$id_tache";

                    /*$projet="SELECT AVG(taches.etat) AS moyenne, projets.*
                    FROM taches
                    INNER JOIN projets ON taches.projet_id = projets.id
                    WHERE taches.projet_id = $id_projet
                    GROUP BY projets.id";*/
                    $query_run = $mysqli->query($tache_query);

                    while ($tache = $query_run->fetch_assoc()) {
                    ?>
                        <div class="col-xxl-3 col-lg-4 mb-25">
                            <?php
                            $progress = $tache['etat'];
                            //$progress = $proj['moyenne'];
                            //$moy = $proj['moyenne'];
                            if ($progress < 100) {
                            ?>

                                <div class="progress-box px-25 pt-25 pb-10 bg-primary radius-xl">

                                    <div class="d-flex justify-content-between mb-3">
                                        <h6 class="text-white fw-500 fs-16 text-capitalize">Progrès</h6>

                                        <span class="progress-percentage text-white fw-500 fs-16 text-capitalize"><?= $tache['etat'] ?>%</span>

                                    </div>
                                    <div class="progress-wrap d-flex align-items-center mb-15">
                                        <div class="progress progress-height">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: <?= $tache['etat'] ?>%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                </div>
                            <?php
                            } else { ?>
                                <div class="progress-box px-25 pt-25 pb-10 bg-success radius-xl">

                                    <div class="d-flex justify-content-between mb-3">
                                        <h6 class="text-white fw-500 fs-16 text-capitalize">progress</h6>

                                        <span class="progress-percentage text-white fw-500 fs-16 text-capitalize"><?= $tache['etat']  ?>%</span>

                                    </div>
                                    <div class="progress-wrap d-flex align-items-center mb-15">
                                        <div class="progress progress-height">
                                            <div class="progress-bar bg-white" role="progressbar" style="width: <?= $tache['etat'] ?>%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                    </div>

                                </div>
                            <?php

                            }
                            ?>


                        </div>
                        <div class="col-xxl-9 col-lg-8">
                            <div class="row">
                                <!-- ends: col-->
                                <div class="col-xxl-8 col-lg-12 mb-25">
                                    <div class="card h-100">
                                        <div class="card-header py-sm-20 py-3  px-sm-25 px-3 ">
                                            <h6>À propos du projet</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="about-projects">
                                                <div class="about-projects__details">
                                                    <p class="fs-15 mb-25"><?= @$tache['description'] ?></p>

                                                </div>
                                                <ul class="d-flex text-capitalize">
                                                    <!-- <li>
                                                        <span class="color-light fs-13">sgfg</span>
                                                        <p class="color-dark fs-14 mt-1 mb-0 fw-500">Peter Jackson</p>
                                                    </li>
                                                    <li>
                                                        <span class="color-light fs-13">Budget</span>
                                                        <p class="color-dark fs-14 mt-1 mb-0 fw-500">$56,700</p>
                                                    </li>-->
                                                    <li>
                                                        <span class="color-light fs-13">Date début</span>
                                                        <p class="color-primary fs-14 mt-1 mb-0 fw-500"><?= $tache['date_debut'] ?></p>
                                                    </li>
                                                    <li>
                                                        <span class="color-light fs-13">Date fin</span>
                                                        <p class="color-danger fs-14 mt-1 mb-0 fw-500"><?= $tache['date_fin'] ?></p>
                                                    </li>
                                                    <li>
                                                        <span class="color-light fs-13">Date début Projet</span>
                                                        <p class="color-primary fs-14 mt-1 mb-0 fw-500"><?= $tache['dateDP'] ?></p>
                                                    </li>
                                                    <li>
                                                        <span class="color-light fs-13">Date fin projet</span>
                                                        <p class="color-danger fs-14 mt-1 mb-0 fw-500"><?= $tache['dateFP'] ?></p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ends: col -->
                                </div>
                                
                                <!-- ends: .card -->
                                <div class="col-xxl-4 col-lg-12 col-12 mb-25">
                                    <div class="card h-100">
                                        <div class="card-header d-flex justify-content-between align-items-center py-10  px-sm-25 px-3">
                                            <h6 class="fw-500 ">Équipe</h6>

                                        </div>
                                        <div class="card-body">
                                            <?php
                                            $user = "SELECT   taches.*, utilisateurs.*
                                            FROM taches
                                            INNER JOIN utilisateurs ON taches.user_id=utilisateurs.id
                                            where taches.id=$id_tache";
                                            $user_run = mysqli_query($mysqli, $user);
                                            foreach ($user_run as $user1) {
                                            ?>
                                                <div class="d-flex align-items-center mb-25">

                                                    <img src="<?= $user1['image'] ?>" class="wh-46 mr-15" alt="img">
                                                    <div>
                                                        <p class="fs-14 fw-600 color-dark mb-0"><?= $user1['nom'] . " " . $user1['prenom'] ?> </p>
                                                        <span class=" mt-1 fs-14  color-light "><?= $user1['profession'] ?></span>
                                                    </div>

                                                </div>
                                            <?php }
                                            ?>

                                        </div>
                                    </div>
                                    <!-- ends: .card -->
                                </div>
                            </div>
                        </div>
                        <!-- ends: col -->
                        
                        <div class="col-xxl-3 col-lg-7 col-12 mb-25">
                            <div class="card">
                                <div class="card-header p-0">
                                    <ul class="nav px-25 ap-tab-main app-ui-tab" id="project-ap-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="project-overview-tab" data-toggle="pill" href="#project-overview" role="tab" aria-controls="project-overview" aria-selected="true">Entreprise</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="tab-content w-100" id="projectContent">
                                    <div class="tab-pane fade show active" id="project-overview" role="tabpanel" aria-labelledby="project-overview-tab">
                                        <div class="card-body px-0 pt-15 pb-15">
                                            <div class="project-task table-responsive ml-20">

                                                <?php

                                                $sql_img = "SELECT * from clients where id IN(select id_client from projets where id in (select projet_id from taches where id =$id_tache))";
                                                $img_run = $mysqli->query($sql_img);
                                                while ($image = $img_run->fetch_assoc()) {

                                                ?>

                                                    <img style="  width: 250px; height: 240px;" class="ap-img__main rounded-circle wh-200" src="<?= $image['logo'] ?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- ends: .card -->
                        </div>


                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>