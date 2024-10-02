<?php
session_start();
require 'connexion.php';
include 'layout.php';

if (!isset($_SESSION['email'])) {
    echo '<script>window.location.href="login.php" </script>';
}
$id = $_GET['idp'];

if (isset($_POST['modifier'])) {
    $titre = $_POST['titre'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $client = $_POST['client'];
    $description = $_POST['description'];
    $query_add = "UPDATE projets set titre='$titre',description='$description',date_debut='$date_debut',date_fin='$date_fin' where id =$id";
     
    if (mysqli_query($mysqli, $query_add)) {
        echo "<script>alert('projet Bien modifer!');</script>'";
        echo '<script>window.location.href="projects.php" </script>';
    } else {
        echo "<script>alert('Erreur');</script>'";
    }
}


?>
<main class="main-content">
    <div class="contents mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-header">
                        <h6>Modifier Projet</h6>
                    </div>

                    <?php
                    $id = $_GET['idp'];
                    $sql1 = "select * from projets where id ='" . $id . "'";
                    $sql_run = mysqli_query($mysqli, $sql1);
                    if (mysqli_num_rows($sql_run) > 0) {
                        while ($row = $sql_run->fetch_assoc()) {

                    ?>




                            <div class="card-body py-md-30">
                                <form action="" method="POST" >
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <label>Titre</label>
                                            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>" />
                                            <input type="text" name="titre" id="titre" value="<?php echo $row['titre']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" >
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="2" cols="25" name="description"><?php echo $row['description']; ?></textarea>

                                        </div>

                                        <div class="col-md-6 mb-25">
                                            <label>Date début</label>
                                            <input type="date" name="date_debut" id="date_debut" value="<?php echo $row['date_debut']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" >
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <label>Date Fin</label>
                                            <input type="date" name="date_fin" id="date_fin" value="<?php echo $row['date_fin']; ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" >
                                        </div>
                                        <div class="col-md-6 mb-25">

                                            <select name="client" class="form-control">
                                                <option selected readonly>client</option>
                                                <?php
                                                
                                                $query = "select * from clients where isDeleted=0";
                                                global $resultat;
                                                $resultat = $mysqli->query($query) or die('Erreur ' . $query . ' ' . $mysqli->error);



                                                // tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
                                                while ($row2 = $resultat->fetch_assoc()) {
                                                ?>
                                                    <option name="client" value="<?= $row2['id'] ?>"> <?= $row2['nom'] . ' ' . $row2['prenom'] ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>

                                        <!--<div class="col-md-6 mb-25">
                                           <select name="" class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="60">60</option>
                                            <option value="80">80</option>
                                            <option value="90">90</option>
                                            <option value="100">100</option>
                                           </select>                                        
                                        </div>-->

                                        <div class="col-md-6 mb-25">
                                            <div class="layout-button mt-0">
                                                <a href="projects.php" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Annuler</a>

                                                <button type="submit" name="modifier" id="modifier" class="btn btn-primary btn-default btn-squared px-30">Modifier</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>



                    <?php }
                    } ?>

                </div>


            </div>
        </div>


    </div>




</main>


<?php
include 'footer.php'
?>