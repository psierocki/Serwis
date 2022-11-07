<?php
session_start();
require_once ('../config/config.php');
$today = date("Y-m-d");

if(isset($_SESSION['online']) && $_SESSION['online'] == "yes") {

if ($_SESSION['type_session']==1){
    header('location: main.php');

}


$id_reservation = $_GET['id'];
$_SESSION['$id_reservation'] = $id_reservation;

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


<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />


<script>
$( function() {
  $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
} );
</script>
<script>
$( function() {
  $( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
} );
</script>
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
                      <a href="main.php" class="nav-link smoothScroll" style="color: white">Rezerwacje</a>
                  </li>

                  <li class="nav-item">
                      <a href="services.php" class="nav-link smoothScroll">Usługi</a>
                  </li>


           <li class="nav-item">
                      <a href="admin.php" class="nav-link smoothScroll">Administracja</a>
                  </li>

                  <li class="nav-item">
                             <a href="password.php" class="nav-link smoothScroll">Zmiana hasła</a>
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

  <a class="btn btn-sm btn-outline-success form-control col-md-4 offset-md-4" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px; margin-top: 40px; ">Dodaj komentarz</a>


<br>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">

<div class="form-row">







<!--<button type="submit" class="btn btn-secondary form-control col-md-4 offset-md-2  " style="margin-bottom: 5px; margin-top: 20px;">Wyszukaj</button>&nbsp;
<br>
<a class="btn btn-secondary form-control col-md-4" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px; margin-top: 20px; color: white">Dodaj</a>
-->
















    </tr>




	<?php

		$query = "SELECT * FROM reservation WHERE id like $id_reservation";



$result = $db->query($query);


?>




<table class="table " cellspacing='0' style='text-align: left; margin-top: 30px'>


<tr class="table-secondary">

    <th style="text-align: left"><?php echo "Szczegóły rezerwacji numer: <b> ".$id_reservation."</b>"; ?></th>

<?php

                     $row = $result->num_rows;


                             $table = $result->fetch_assoc();

								$id_range = $table['rangetime'];
								$query_range = "SELECT * FROM rangetime where id like '$id_range'";
								$result_range = $db->query($query_range);
								$table_range = $result_range->fetch_assoc();



                $id_category = $table['category'];
                $query_cat = "SELECT * FROM category where id like '$id_category'";
                $result_cat = $db->query($query_cat);
                $table_cat = $result_cat->fetch_assoc();

                $id_accept = $table['accept'];
                if ($id_accept==1)
                {
                  echo "<tr><td>Status: <b>Zaakceptowane</b></td></tr>";
                }
                else if ($id_accept==0) {
                  echo "<tr><td>Status: <b>Oczekujące</b></td></tr>";
                }
                else {
                  echo "<tr><td>Status: <b>Odrzucone</b></td></tr>";
                }





                             echo "<tr><td>Data rezerwacji: <b>" . $table['reservation_date'] . "</b></td></tr>";
                             echo "<tr><td>Godziny rezerwacji: <b>" . $table_range['name'] . "</b></td></tr>";
                             echo "<tr><td>Model urządzenia: <b>" . $table['model'] . "</b></td></tr>";
                             echo "<tr><td>Numer seryjny: <b>" . $table['serial'] . "</b></td></tr>";
                             echo "<tr><td>Kategoria: <b>" . $table_cat['name'] . "</b></td></tr>";


                             $id_author = $table['client'];
                             $query_user = "SELECT * FROM users where id like '$id_author'";
                             $result_user = $db->query($query_user);
                             $table_user = $result_user->fetch_assoc();




                             if ($id_author==0){
                               echo "<tr><td>Autor: <b>Obsługa serwisu</b></td></tr>";
                             }
                             else {
                               echo "<tr><td>Autor: <b>" . $table_user['name'] . "</b></td></tr>";
                             }

                             echo "<tr><td>Opis: <b>" . $table['content'] . "</b></td></tr>";




                             echo "<tr class='table-secondary'><td><b>Komentarze</b></td></tr>";












                             $query_comment = "SELECT * FROM comments where id_reservation like $id_reservation";
                             $result_comment = $db->query($query_comment);
                             $row_comment = $result_comment->num_rows;


                             for ($q=0; $q < $row_comment; $q++)
                               {
                                   $table_comment = $result_comment->fetch_assoc();


                                  $id_user_comment = $table_comment['id_user'];
                                   $query_user_comment = "SELECT * FROM users where id like $id_user_comment";
                                   $result_user_comment = $db->query($query_user_comment);
                                   $table_user_comment = $result_user_comment->fetch_assoc();



                                   echo "<tr><td><b>". $table_comment['comment_date'] ." - ". $table_user_comment['name'] . "</b> - ". $table_comment['content'] ."</b></td></tr>";




                             }

















?>

</table>

</div></div>
</div>
</div>





    <!-- TESTIMONIAL -->
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
        <h4 id='exampleModalLabel' >Nowy komentarz</b></h4></div><div class='modal-body'>
        <form action='..\action\add_comment.php' method='post' name='add' data-toggle='validator' role='form'>";

  ?>

  <!--Formularz dodawania zamówienia-->













          <div class="form-group col-md-12">
          <label for="inputEmail4">Treść komentarza</label>
          <input type="text" class="form-control"  placeholder="Treść komentarza" name="content" required>
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
