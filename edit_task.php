<?php 
include 'connexion.php';
include 'layout.php';
?>
<main class="main-content">


<?php
$id = $_GET['id_task'];
if(isset($_POST['modifier'])){
$titre=$_POST['titre'];
$description=$_POST['description'];
$date_debut=$_POST['date_debut'];
$date_fin=$_POST['date_fin'];
$etat=$_POST['etat'];
$user=$_POST['user'];
$requete_update="UPDATE taches set titre='$titre' ,description='$description', date_debut='$date_debut',date_fin='$date_fin',etat='$etat',user_id='$user' where id='$id'";
$query_run = mysqli_query($mysqli, $requete_update);
        if ($query_run) {
            echo "<script>alert('Tâche bien modifié');</script>'";
           @ header('Location : taches.php');
        } else {
            echo '';
        }

}
    

                    
                    $taches = "select * from taches where id='" . $id . "'";
                    $sql_run = mysqli_query($mysqli,$taches);
                    if (mysqli_num_rows($sql_run) > 0) {
                        while ($row = $sql_run->fetch_assoc()) {

                    ?>
    <div class="contents mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-header">
                        <h6>Modifier tâche</h6>
                    </div>


                    

                    <div class="card-body py-md-30">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-25">
                                    <input type="text" name="titre" id="titre" value="<?php echo $row['titre'] ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="Titre">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <textarea name="description" id="description" rows="4" cols="50" class="form-control ih-medium ip-gray radius-xs b-light px-15" ><?php echo $row['description'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-25">
                               <label for="debut">Date début</label>
                                    <input type="date" name="date_debut" id="debut" value="<?php echo $row['date_debut'] ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="date debut">
                                </div>
                                <div class="col-md-6 mb-25">
                                    <label for="fin">Date fin</label>
                                    <input type="date" name="date_fin" id="fin" value="<?php echo $row['date_fin'] ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="date fin">
                                </div>
                                
                                <div class="col-md-6 mb-25">
                                    <input type="number" name="etat" id="etat" value="<?php echo $row['etat'] ?>" class="form-control ih-medium ip-gray radius-xs b-light px-15" placeholder="etat">
                                </div>
                                
                                <div class="col-md-6 mb-25">
                                <select name="user" class="form-control">
                                        
                                        <?php
                                        $id_user=$row['user_id'];
                                        $query = "select * from utilisateurs ";
                                        global $resultat;
                                        $resultat = $mysqli->query($query) or die('Erreur ' . $query . ' ' . $mysqli->error);



                                        // tant qu'il y a un enregistrement, les instructions dans la boucle s'exécutent
                                        while ($user = $resultat->fetch_assoc()) {
                                        ?>
                                            <option name="client" value="<?= $user['id'] ?>" selected readonly> <?= $user['nom'].' '.$user['prenom'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>

                               
                                <div class="col-md-6 mb-25">
                                    <div class="layout-button mt-0">
                                        <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">Annuler</button>
                                        <button type="submit" name="modifier" id="modifier" class="btn btn-primary btn-default btn-squared px-30">Modifier</button>
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

    <?php }}else{
                        echo '<div class=" alert alert-danger " role="alert">


                        <div class="alert-content">


                            <p>Erreur</p>


                        </div>
                    </div>';
                    } ?>


</main>