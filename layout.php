<?php 
@session_start();
include 'connexion.php';
?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion des Tâches</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="assets/vendor_assets/css/bootstrap/bootstrap.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/daterangepicker.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/fontawesome.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/footable.standalone.min.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/fullcalendar@5.2.0.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/jquery-jvectormap-2.0.5.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/leaflet.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/line-awesome.min.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/MarkerCluster.Default.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/select2.min.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/slick.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/star-rating-svg.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/trumbowyg.min.css">

    <link rel="stylesheet" href="assets/vendor_assets/css/wickedpicker.min.css">

    <link rel="stylesheet" href="style.css">

    <!-- endinject -->

    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body class="layout-light side-menu overlayScroll">
    <div class="mobile-search">
        
    </div>
    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <a href="" class="sidebar-toggle">
                    <img class="svg" src="img/svg/bars.svg" alt="img"></a>
                <a class="navbar-brand" href="index.php">
                    <!--<img class="dark" src="img/logo_dark.png" alt="svg">-->
                    <h4 style="color:cornflowerblue;"><b>Gestionnaire de Tâches</b></h4>
                    <img class="light" src="img/logo_white.png" alt="img">
                </a>
                
                
            </div>
            <!-- ends: navbar-left -->

            <div class="navbar-right">
                <ul class="navbar-right__menu">
                    <li class="nav-search d-none">
                        <a href="#" class="search-toggle">
                            <i class="la la-search"></i>
                            <i class="la la-times"></i>
                        </a>
                        <form action="/" class="search-form-topMenu">
                            <span class="search-icon" data-feather="search"></span>
                            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                        </form>
                    </li>
                   
                    
                
                   
                    <li class="nav-author">
                        <div class="dropdown-custom">
                        <?php 
                                     // Query to check if the username and password match
                                    $query = "SELECT * FROM utilisateurs WHERE id = '{$_SESSION['id']}'";
                                    $result = $mysqli->query($query);

                                    if ($result->num_rows == 1) {
                                        // Authentication successful
                                        $row = $result->fetch_assoc();
                                        
                                        
                                    } else {
                                        // Authentication failed
                                        echo "Invalid username or password. <a href='test.php'>Try again</a>";
                                    }

                                ?>
                            <a href="javascript:;" class="nav-item-toggle"><img src="<?php echo $row['image'] ?>" alt="" class="rounded-circle"></a>
                            <div class="dropdown-wrapper">
                                
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="<?php echo $row['image'] ?>" alt="" class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6><?php echo $row['nom'].' '.$row['prenom'] ?></h6>
                                        <span><?php echo $row['profession'] ?></span>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="profile.php">
                                                <span data-feather="user"></span> Profile</a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span data-feather="settings"></span> Settings</a>
                                        </li>
                                       
                                    </ul>
                                    <a href="deconnexion.php" class="nav-author__signout">
                                        <span data-feather="log-out"></span> Déconnexion</a>
                                </div>
                            </div>
                            <!-- ends: .dropdown-wrapper -->
                        </div>
                    </li>
                    <!-- ends: .nav-author -->
                </ul>
                <!-- ends: .navbar-right__menu -->
                <div class="navbar-right__mobileAction d-md-none">
                    <a href="#" class="btn-search">
                        <span data-feather="search"></span>
                        <span data-feather="x"></span></a>
                    <a href="#" class="btn-author-action">
                        <span data-feather="more-vertical"></span></a>
                </div>
            </div>
            <!-- ends: .navbar-right -->
        </nav>
    </header>

    

        <aside class="sidebar-wrapper">
            <div class="sidebar sidebar-collapse" id="sidebar">
                <div class="sidebar__menu-group">
                    <ul class="sidebar_nav">
                        <li class="menu-title">
                            <span> </span>
                        </li>
                       
                        <li >
                            <a href="index.php" class="active">
                                <span data-feather="home" class="nav-icon"></span>
                                <span class="menu-text">Tableau de bord</span>
                                
                            </a>
                           
                        </li>
                        <?php 
                                     // Query to check if the username and password match
                                    $query = "SELECT * FROM utilisateurs WHERE id = '{$_SESSION['id']}' and role='Admin'";
                                    $result = $mysqli->query($query);

                                    if ($result->num_rows == 1) {
                                        // Authentication successful
                                        //$row = $result->fetch_assoc();
                                        
                                        
                                    

                                ?>
                        <li class="has-child">
                            <a href="#" class="">
                                <span data-feather="layout" class="nav-icon"></span>
                                <span class="menu-text">Équipes</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                            <li class="l_sidebar">
                                    <a href="liste_utilisateurs.php" >Les membres</a>
                                </li>
                                <li class="l_sidebar">
                                    <a href="Corbeille_utilisateur.php" >Corbeille</a>
                                </li>
                               
                               
                             
                            </ul>
                        </li>
                        
                       
                        
                      
                        <li class="has-child">
                            <a href="#" class="">
                                <span data-feather="target" class="nav-icon"></span>
                                <span class="menu-text">Projet</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="projects.php" class="">Projets</a>
                                </li>
                                <!--<li>
                                    <a href="application-ui.html" class="">Project Details</a>
                                </li>-->
                                <li>
                                    <a href="projects.php" class="">Nouveau
                                        Projet</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-child">
                            <a href="#" class="">
                                <span data-feather="user" class="nav-icon"></span>
                                <span class="menu-text">Clients</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="client.php" class="">Les clients</a>
                                </li>
                                <!--<li>
                                    <a href="application-ui.html" class="">Project Details</a>
                                </li>-->
                                <li>
                                    <a href="Corbeille_client.php" class="">Corbeille</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-child">
                            <a href="#" class="">
                                <span data-feather="clipboard" class="nav-icon"></span>
                                <span class="menu-text">Tâches</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="tache.php" class="">Tâches</a>
                                </li>
                                
                                <li>
                                    <a href="projects.php" class="">Corbeille
                                        Tâches</a>
                                </li>
                            </ul>
                        </li>
                        <?php }else{?>
                        <li class="has-child">
                            <a href="#" class="">
                                <span data-feather="clipboard" class="nav-icon"></span>
                                <span class="menu-text">Tâches</span>
                                <span class="toggle-icon"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="tache.php" class="">Tâches</a>
                                </li>
                                
                                <li>
                                    <a href="projects.php" class="">Corbeille
                                        Tâches</a>
                                </li>
                            </ul>
                        </li>

                        <?php }?>
                    </ul>
                </div>
            </div>
        </aside>

        
    
    <div id="overlayer">
        <span class="loader-overlay">
            <div class="atbd-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </span>
    </div>
    <div class="overlay-dark-sidebar"></div>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script>
    <!-- inject:js-->
    <script src="assets/vendor_assets/js/jquery/jquery-3.5.1.min.js"></script>
    <script src="assets/vendor_assets/js/jquery/jquery-ui.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/popper.js"></script>
    <script src="assets/vendor_assets/js/bootstrap/bootstrap.min.js"></script>
    <script src="assets/vendor_assets/js/moment/moment.min.js"></script>
    <script src="assets/vendor_assets/js/accordion.js"></script>
    <script src="assets/vendor_assets/js/autoComplete.js"></script>
    <script src="assets/vendor_assets/js/Chart.min.js"></script>
    <script src="assets/vendor_assets/js/charts.js"></script>
    <script src="assets/vendor_assets/js/daterangepicker.js"></script>
    <script src="assets/vendor_assets/js/drawer.js"></script>
    <script src="assets/vendor_assets/js/dynamicBadge.js"></script>
    <script src="assets/vendor_assets/js/dynamicCheckbox.js"></script>
    <script src="assets/vendor_assets/js/feather.min.js"></script>
    <script src="assets/vendor_assets/js/footable.min.js"></script>
    <script src="assets/vendor_assets/js/fullcalendar@5.2.0.js"></script>
    <script src="assets/vendor_assets/js/google-chart.js"></script>
    <script src="assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendor_assets/js/jquery.countdown.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.filterizr.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.mCustomScrollbar.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.peity.min.js"></script>
    <script src="assets/vendor_assets/js/jquery.star-rating-svg.min.js"></script>
    <script src="assets/vendor_assets/js/leaflet.js"></script>
    <script src="assets/vendor_assets/js/leaflet.markercluster.js"></script>
    <script src="assets/vendor_assets/js/loader.js"></script>
    <script src="assets/vendor_assets/js/message.js"></script>
    <script src="assets/vendor_assets/js/moment.js"></script>
    <script src="assets/vendor_assets/js/muuri.min.js"></script>
    <script src="assets/vendor_assets/js/notification.js"></script>
    <script src="assets/vendor_assets/js/popover.js"></script>
    <script src="assets/vendor_assets/js/select2.full.min.js"></script>
    <script src="assets/vendor_assets/js/slick.min.js"></script>
    <script src="assets/vendor_assets/js/trumbowyg.min.js"></script>
    <script src="assets/vendor_assets/js/wickedpicker.min.js"></script>
    <script src="assets/theme_assets/js/drag-drop.js"></script>
    <script src="assets/theme_assets/js/footable.js"></script>
    <script src="assets/theme_assets/js/full-calendar.js"></script>
    <script src="assets/theme_assets/js/googlemap-init.js"></script>
    <script src="assets/theme_assets/js/icon-loader.js"></script>
    <script src="assets/theme_assets/js/jvectormap-init.js"></script>
    <script src="assets/theme_assets/js/leaflet-init.js"></script>
    <script src="assets/theme_assets/js/main.js"></script>
    <!-- endinject-->
</body>

</html>