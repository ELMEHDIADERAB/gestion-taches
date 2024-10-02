<?php
session_start();
include 'connexion.php';
include 'layout.php';


if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href="login.php" </script>';
}

$queryS="select * from taches where etat<100 and isDeleted=0";
$result=mysqli_query($mysqli,$queryS);
$nbr=mysqli_num_rows($result);



$query1="select * from taches where etat=100 and isDeleted=0";
$result1=mysqli_query($mysqli,$query1);
$taches_termines=mysqli_num_rows($result1);


$query0="select * from taches where etat=0 and isDeleted=0";
$result0=mysqli_query($mysqli,$query0);
$tache0=mysqli_num_rows($result0);

$projet="select * from projet where  and isDeleted=0";
$result10=mysqli_query($mysqli,$query0);
$tache10=mysqli_num_rows($result10);


$projets0="SELECT round(avg(etat),2) as moyenne  FROM `taches` inner join projet on taches.projet_id=projet.id ";
//$result_projets0=mysqli_query($mysqli,$projets0);
//$projet0=mysqli_num_rows($result_projets0);
?>
<title>Dasgboard</title>

<main class="main-content">
    <div class="contents mt-5">

        <div class="container-fluid">

            <div class="pagetitle">
                <h1>Tableau de bord</h1>

            </div><!-- End Page Title -->

            <section class="section dashboard mt-4">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-12">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card sales-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Tache(s) en cours </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-list-check"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo $nbr ?></h6>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- End Sales Card -->

                            <!-- Revenue Card -->
                            
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card sales-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Tache(s) pas enore commencée(s) </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-list-check"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo $tache0 ?></h6>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>  
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card revenue-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Tâche(s) terminé(s) </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-square"></"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo $taches_termines ?></h6>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>                         
                        </div>
                    </div>

                    
                    <div class="col-lg-12 mt-2">
                        <div class="row">

                            <!-- Sales Card -->
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card sales-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Projet(s) en cours </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-list-check"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo $nbr ?></h6>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                              
                            
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card revenue-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Projet(s) pas enore commencée(s) </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-square"></"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php //echo $projet0 ?>5</h6>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-4">
                                <div class="card info-card revenue-card">



                                    <div class="card-body">
                                        <h5 class="card-title">Projet(s) terminé(s) </h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bi bi-person-square"></"></i>
                                            </div>
                                            <div class="ps-3">
                                                <h6><?php echo $taches_termines ?></h6>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                    </div>

                </div><!-- End Left side columns -->
                

            </section>
        </div>
    </div>

    

</main><!-- End #main -->




<?php
include 'footer.php' ?>