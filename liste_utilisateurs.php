<?php 
session_start();
if(!isset($_SESSION['email'])){
    echo '<script>window.location.href="login.php" </script>';
}
include 'layout.php';
require 'connexion.php';
?>
<!-- https://fonts.google.com/specimen/Roboto -->
<link rel="stylesheet" href="css/fontawesome.min.css" />
<!-- https://fontawesome.com/ -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<div class="contents">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="breadcrumb-main user-member justify-content-sm-between ">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center user-member__title justify-content-center mr-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Équipe</h4>
                            <?php
                            $query2 = "select count(*) as count from utilisateurs where isDeleted=0";
                            $result = $mysqli->query($query2);
                            if ($result) {
                                $row = $result->fetch_assoc();
                                $count = $row['count'];
                            }

                            ?>
                            <span class="sub-title ml-sm-25 pl-sm-25"><?php echo $count ?> Membres</span>
                        </div>

                        <form action="/" class="d-flex align-items-center user-member__form my-sm-0 my-2">
                            <span data-feather="search"></span>
                            <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search" placeholder="Rechercher" id="myInput" aria-label="Search">
                        </form>

                    </div>
                    <div class="action-btn">
                        <a href="utilisateurs.php" class="btn px-15 btn-primary">
                            <i class="las la-plus fs-16"></i>Nouvel utilisateur</a>

                        <!-- Modal 
                        <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content  radius-xl">
                                    <div class="modal-header">
                                        <h6 class="modal-title fw-500" id="staticBackdropLabel">Create project</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span data-feather="x"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="new-member-modal">
                                            <form>
                                                <div class="form-group mb-20">
                                                    <input type="text" class="form-control" placeholder="Duran Clayton">
                                                </div>
                                                <div class="form-group mb-20">
                                                    <div class="category-member">
                                                        <select class="js-example-basic-single js-states form-control" id="category-member">
                                                            <option value="JAN">1</option>
                                                            <option value="FBR">2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-20">
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Project description"></textarea>
                                                </div>
                                                <div class="form-group textarea-group">
                                                    <label class="mb-15">status</label>
                                                    <div class="d-flex">
                                                        <div class="project-task-list__left d-flex align-items-center">
                                                            <div class="checkbox-group d-flex mr-50 pr-10">
                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox" id="check-grp-1" checked>
                                                                    <label for="check-grp-1" class="fs-14 color-light strikethrough">
                                                                        status
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="checkbox-group d-flex mr-50 pr-10">
                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox" id="check-grp-2">
                                                                    <label for="check-grp-2" class="fs-14 color-light strikethrough">
                                                                        Deactivated
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="checkbox-group d-flex">
                                                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                                    <input class="checkbox" type="checkbox" id="check-grp-3">
                                                                    <label for="check-grp-3" class="fs-14 color-light strikethrough">
                                                                        bloked
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-25">
                                                    <div class="form-group mb-10">
                                                        <label for="name47">project member</label>
                                                        <input type="text" class="form-control" id="name47" placeholder="Search members">
                                                    </div>
                                                    <ul class="d-flex flex-wrap mb-20 user-group-people__parent">
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34" src="img/tm1.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34" src="img/tm2.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34" src="img/tm3.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34" src="img/tm4.png" alt="author"></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><img class="rounded-circle wh-34" src="img/tm5.png" alt="author"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="d-flex new-member-calendar">
                                                    <div class="form-group w-100 mr-sm-15 form-group-calender">
                                                        <label for="datepicker">start Date</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" id="datepicker" placeholder="mm/dd/yyyy">
                                                            <a href="#">
                                                                <span data-feather="calendar"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group w-100 form-group-calender">
                                                        <label for="datepicker2">End Date</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" id="datepicker2" placeholder="mm/dd/yyyy">
                                                            <a href="#">
                                                                <span data-feather="calendar"></span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-group d-flex pt-25">



                                                    <button class="btn btn-primary btn-default btn-squared text-capitalize">add new project
                                                    </button>








                                                    <button class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light">cancel
                                                    </button>





                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         Modal -->


                    </div>
                </div>
                

            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="userDatatable global-shadow border p-30 bg-white radius-xl w-100 mb-30">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless">
                            <thead>
                                <tr class="userDatatable-header">
                                    <th>
                                        <span class="checkbox-text userDatatable-title">Nom</span>

                                    </th>
                                    <th>
                                        <span class="userDatatable-title">emaill</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">profession</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Téléphone</span>
                                    </th>
                                    <th>
                                        <span class="userDatatable-title">Rôle</span>
                                    </th>
                                    <!-- <th>
                                                <span class="userDatatable-title">status</span>
                                            </th>
                                            -->
                                    <th>
                                        <span class="userDatatable-title float-right">action</span>
                                    </th>
                                </tr>
                            </thead>

                            <?php
                            $query = "select * from utilisateurs where isDeleted =0";
                            $query_run = mysqli_query($mysqli, $query);
                            if (@mysqli_num_rows(@$query_run) > 0) {
                                foreach ($query_run as $utilisateur) {
                            ?>
                                    <tbody id="myTable">
                                        <tr>
                                            <td>
                                                <div class="d-flex">
                                                    <div class="userDatatable__imgWrapper d-flex align-items-center">

                                                        <!-- <a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('iages/mido.png'); background-size: cover;"></a>-->
                                                        <img class="profile-image rounded-circle d-block m-0 wh-38" src="<?= $utilisateur['image'] ?>">
                                                    </div>
                                                    <div class="userDatatable-inline-title">
                                                        <a href="membre_details.php?Id_USER=<?= $utilisateur['id'] ?>" class="text-dark fw-500">
                                                            <h6><?= $utilisateur['nom'], ' ', $utilisateur['prenom'] ?></h6>
                                                        </a>
                                                        <p class="d-block mb-0">
                                                            <?= $utilisateur['profession'] ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <?= $utilisateur['email'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <?= $utilisateur['profession'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <?= $utilisateur['telephone'] ?>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="userDatatable-content">
                                                    <?= $utilisateur['role'] ?>
                                                </div>
                                            </td>
                                            <!-- <td>
                                                <div class="userDatatable-content d-inline-block">
                                                    <span class="bg-opacity-success  color-success rounded-pill userDatatable-content-status active">active</span>
                                                </div>
                                            </td>
                                                -->
                                            <td>
                                                <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                    
                                                    <li>
                                                        <a href="edit_utilisateur.php?Id_USER=<?= $utilisateur['id'] ?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="delete_user.php?did=<?= $utilisateur['id']; ?>" class="tm-product-delete-link" onclick="return confirm('voulez-vous vraiment supprimer cet utilisateur')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                            <?php }
                            } else {
                                echo '<div class="card-body">
                                <div class="alert-icon-area alert alert-warning " role="alert">


                                <div class="alert-icon">
                                    <span data-feather="layers"></span>
                                </div>

                                <div class="alert-content">


                                    <p>Il n\'y a aucun utilisateur</p>


                                </div>
                            </div>
                            </div>';
                            }
                            ?>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end pt-30">

                        <nav class="atbd-page ">
                            <ul class="atbd-pagination d-flex">
                                <li class="atbd-pagination__item">
                                    <a href="#" class="atbd-pagination__link pagination-control"><span class="la la-angle-left"></span></a>
                                    <a href="#" class="atbd-pagination__link active"><span class="page-number">1</span></a>
                                    <a href="#" class="atbd-pagination__link "><span class="page-number">2</span></a>
                                    <a href="#" class="atbd-pagination__link"><span class="page-number">3</span></a>
                                    <a href="#" class="atbd-pagination__link pagination-control"><span class="page-number">...</span></a>
                                    <a href="#" class="atbd-pagination__link"><span class="page-number">12</span></a>
                                    <a href="#" class="atbd-pagination__link pagination-control"><span class="la la-angle-right"></span></a>
                                    <a href="#" class="atbd-pagination__option">
                                    </a>
                                </li>
                                <li class="atbd-pagination__item">
                                    <div class="paging-option">
                                        <select name="page-number" class="page-selection">
                                            <option value="20">20/page</option>
                                            <option value="40">40/page</option>
                                            <option value="60">60/page</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </nav>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!--
<script>
    $(document).ready(function(){
        $('.viewbtn').on('click',function(){
            $('#view-user').modal('view');
            $tr=$(this).closest('tr');
            var data=$tr.children('td').map(function(){
                return $(this).text();
            }).get();
            console.log(data);
            $('$id').val(data[0]);
            $('$image').val(data[1]);
            $('$nom').val(data[2]);
            $('$prenom').val(data[3]);
            $('$telephone').val(data[4]);
            $('$email').val(data[5]);
        });

    });
                        </script>-->
<?php include 'footer.php' ?>