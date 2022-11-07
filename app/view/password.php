<?php
session_start();
require_once ('../config/config.php');
$today = date("Y-m-d");

if(isset($_SESSION['online']) && $_SESSION['online'] == "yes") {

if ($_SESSION['type_session']==0){
    header('location: main_client.php');

}


?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<title>Click - Lublin - Obsługa</title>


<link href="../css/css_main_all.css" rel="stylesheet">


<!-- javascript -->
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="../js/bootbox.min.js"></script>
<script src="../js/jquery.timepicker.min.js"></script>

</head>
<body>



<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="" href="../../index.php" style="color: silver">
            Strona domowa
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">



                <li class="nav-item">
                    <a href="main.php" class="nav-link smoothScroll" >Rezerwacje</a>
                </li>

                <li class="nav-item">
                    <a href="services.php" class="nav-link smoothScroll" >Usługi</a>
                </li>


                <li class="nav-item">
                    <a href="users.php" class="nav-link smoothScroll">Administracja</a>
                </li>

                <li class="nav-item">
                    <a href="category.php" class="nav-link smoothScroll">Kategorie</a>
                </li>


                <li class="nav-item">
                    <a href="password.php" class="nav-link smoothScroll" style="color: white">Zmiana hasła</a>
                </li>

                <li class="nav-item">
                    <a href="../action/log_out.php" class="nav-link smoothScroll">Wyloguj</a>
                </li>
            </ul>

        </div>

    </div>
</nav>

  <section class="hero d-flex flex-column justify-content-center align-items-center" id="intro">
  <img src="../images/tlo7.jpg" width="100%" height="100%" >
  </section>


<div class="container">

    <div style="margin-top: 10px">

        <?php


        if (isset($_SESSION['alert']))
        {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
        ?>
    </div>

<br>

<!--Pola wyszukiwania -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
<form action='../action/password_change.php' method="post">

<!--Nr zamówienia -->
<div class="form-row">


<!--Pole data zamówienia -->
<div class="form-group col-md-6 offset-md-3 ">
<label for="inputEmail4">Nowe hasło</label>
<input type="password" class="form-control"  placeholder="Nowe hasło" name="password" MINLENGTH="8" required>
</div>




<button type="submit" class="btn btn-sm btn-outline-secondary form-control col-md-6 offset-md-3  " style="margin-bottom: 5px; margin-top: 20px;" >Zmień hasło</button>&nbsp;
</form><br>






</div></div>
</div>
</div>



  <section class="testimonials section-padding" id="testimonials" style="margin-top: 100px">
      <div class="container">
          <div class="row">
              <div class="mx-auto col-lg-12 col-md-12 col-12">
              <p class="mb-1">Serwis Komputerowy "Click" - Lublin</p>
                    <p class="mb-1">ul. Bohdana Dobrzańskiego 1</p>
                    <p class="mb-1">20-262 Lublin</p>
                    <p class="mb-1">+48-123-456-789</p>
                    <p class="mb-1">kontakt@click-lublin.pl</p>


              </div>
          </div>

      </div>
      </div>
  </section>




     <script src="../js/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/custom.js"></script>






     <?php
       echo "<div class=\"modal fade\" id=\"exampleModal\" tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'><div class=\"modal-dialog\" role=\"document\"><div class=\"modal-content\"><div class=\"modal-header\">
             <h4 id='exampleModalLabel' >Nowe opony</b></h4></div><div class='modal-body'>
             <form action='..\action\add_tires_admin.php' method='post' name='add' data-toggle='validator' role='form'>";

       ?>

       <!--Formularz dodawania zamówienia-->
       <div class="form-group col-md-12">
       <label for="inputEmail4">Data początkowa</label>
       <input type="text" class="form-control"  placeholder="RRRR-MM-DD" name="start_date" id="datepicker2" required>
       </div>






         		<div class="form-group col-md-12">
               <label for="inputEmail4">Klient</label>
         <?php

                            $categories_query = "SELECT * FROM users where type=0";
                            $categories_result = $db->query($categories_query);

                             $categories_row = $categories_result->num_rows;
                             echo "<select class='form-control' name='id_user' required> <option value=''>--</option>";

                             for ($i=0; $i < $categories_row; $i++)
                             {
                             $categories_array = $categories_result->fetch_assoc();
                             echo "<option value='". $categories_array['id'] ."'>". $categories_array['name'] ."</option>";
                             }
                              echo "</select>";
              ?>
             </div>






               <div class="form-group col-md-12">
               <label for="inputEmail4">Opis</label>
               <input type="text" class="form-control"  placeholder="Opis" name="description" required>
               </div>



                         <div class='modal-footer'>
                              <button type='button' class='btn btn-outline-secondary' data-dismiss='modal'>Anuluj</button>
                              <button type='submi' class='btn btn-outline-success'>Dodaj</button>
                              </form>
                         </div>
                   </div>
              </div>
          </div>

         <?php
         unset($_SESSION['search']);
         ?>
         <script src="js/classie.js"></script>

         <!-- Okno dodawawania zamówienia -->
         <script>
             $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var recipient = button.data('whatever')
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
            })
             $(function () {
                 $('[data-toggle="tooltip"]').tooltip()
             })
             $(function() {
                 if (!String.prototype.trim) {
                     (function() {
                         var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                         String.prototype.trim = function() {
                             return this.replace(rtrim, '');
                         };
                     })();
                 }
                 [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
                     if( inputEl.value.trim() !== '' ) {
                         classie.add( inputEl.parentNode, 'input--filled' );
                     }
                     inputEl.addEventListener( 'focus', onInputFocus );
                 } );
                 function onInputFocus( ev ) {
                     classie.add( ev.target.parentNode, 'input--filled' );
                 }
                 function onInputBlur( ev ) {
                     if( ev.target.value.trim() === '' ) {
                         classie.remove( ev.target.parentNode, 'input--filled' );
                     }
                 }
             })();
         </script>




<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/smoothscroll.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/custom.js"></script>












</body>

<?php
}
else
{
    $_SESSION['notification'] = '<script type="text/javascript">swal("Brak uprawnień", "Nie masz uprawnień do przeglądania wybranej strony.", "error");</script>';
		header('location: ../action/log_out.php');
		exit();
}
?>
</html>
