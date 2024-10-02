<?php
include 'connexion.php';
session_start();
if (isset($_POST["login"])) {


    // Sanitize user input
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli,md5($_POST['password']));

    // Query to check if the username and password match
    $query = "SELECT * FROM utilisateurs WHERE email = '$email' AND password = '$password' and isDeleted=0";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        // Authentication successful
        $row = $result->fetch_assoc();
        
        $_SESSION['email'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['nom'] = $row['nom'];
        $_SESSION['prenom'] = $row['prenom'];
        echo '<script>window.location.href="index.php" </script>'; // Redirect to a welcome page
    } else {
        // Authentication failed
      // echo "<h6 style='text-align:center;margin-top :30px;'>Invalid username or password. <a href='test.php'>Try again</a></h6>";
      echo "<script>alert('Email ou Mot de Passe Invalide ');</script>'";
    }





}


?>



<style>

.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>
<!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
></script>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <h4>Bienvenue chez </h4>
        <h4>Application Gestionnaire de tâches</h4>
    <br>    <form action="" method="POST">
          

    

          <!-- Email input -->
          <div class="form-outline mb-4">
           
            <input type="text" id="form3Example3" id="email" name="email" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
            <label required class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg"
              placeholder="Enter password" required />
            <label class="form-label" for="form3Example4">Mot De Passe</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
           

          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <input  name="login"  value="Se connecter" type="submit"class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;" >
            
          </div>

        </form>
      </div>
    </div>
  </div>
  <div
    class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <!-- Copyright -->
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2023. All rights reserved.
    </div>
    <!-- Copyright -->

    
  </div>
</section>