<?php
session_start();
require_once ('../config/config.php');
$today = date("Y-m-d");

if(isset($_SESSION['online']) && $_SESSION['online'] == "yes") {

if ($_SESSION['type_session']==0){
    header('location: main_client.php');
}

$id_reservation = $_GET['id'];
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
<!--  scripts -->
  <script>
    $( function() {
        $( "#selectdate1" ).datepicker({ dateFormat: 'yy-mm-dd' });
    } );

    $( function() {
        $( "#selectdate2" ).datepicker({ dateFormat: 'yy-mm-dd' });
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
                      <a href="main.php" class="nav-link smoothScroll" >Rezerwacje</a>
                  </li>

                  <li class="nav-item">
                      <a href="services.php" class="nav-link smoothScroll" style="color: white">Usługi</a>
                  </li>


                  <li class="nav-item">
                      <a href="users.php" class="nav-link smoothScroll">Administracja</a>
                  </li>

                  <li class="nav-item">
                      <a href="category.php" class="nav-link smoothScroll">Kategorie</a>
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



<br>

<!--Pola wyszukiwania -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">

<!--Nr zamówienia -->
<div class="form-row">












    <table class="table  table-striped" cellspacing='0' style='text-align: center; margin-top: 30px'>


	<tr class="table-secondary">
        <th style="text-align: center">ID</th>
        <th style="text-align: center">ID Rezerwacji</th>
		<th style="text-align: center">Roboczogodziny</th>
		<th style="text-align: center">Usługa</th>
		<th style="text-align: center">Cena</th>
		<th style="text-align: center">Data realizacji</th>



    </tr>




	<?php

    $query = "SELECT * FROM services where id_reservation like $id_reservation";






$result = $db->query($query);



                     $row = $result->num_rows;

                       for ($x=0; $x < $row; $x++)
                         {
                             $table = $result->fetch_assoc();

								$id_range = $table['id_reservation'];
								$query_range = "SELECT * FROM reservation where id like '$id_range'";
								$result_range = $db->query($query_range);
								$table_range = $result_range->fetch_assoc();


                             echo "
                                 <tr>
                                 <td>" . $table['id'] . "</td>
								 <td>" . $table['id_reservation'] . "</td>
                                 <td>" . $table['hours'] . "</td>
								 <td>" . $table['description'] . "</td>
                                 <td>" . $table['price'] . "</td>
                                 <td>" . $table_range['reservation_date'] . "</td>";








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
        <h4 id='exampleModalLabel' >Nowa usługa do rezerwacji</b></h4></div><div class='modal-body'>
        <form action='..\action\add_services.php' method='post' name='add' data-toggle='validator' role='form'>";

  ?>

  <!--Formularz dodawania zamówienia-->
  <div class="form-group col-md-12">
  <label for="inputEmail4">Identyfikator rezerwacji</label>
  <input type="text" class="form-control"  placeholder="Identyfikator rezerwacji" name="id_reservation" required>
  </div>

  <div class="form-group col-md-12">
  <label for="inputEmail4">Roboczogodziny</label>
  <input type="text" class="form-control"  placeholder="Roboczogodziny" name="hours" required>
  </div>

  <div class="form-group col-md-12">
  <label for="inputEmail4">Opis pracy</label>
  <input type="text" class="form-control"  placeholder="Opis pracy" name="description" required>
  </div>
  <div class="form-group col-md-12">
  <label for="inputEmail4">Koszt</label>
  <input type="text" class="form-control"  placeholder="Koszt" name="price" required>
  </div>

      </div>



                    <div class='modal-footer'>
                         <button type='button' class='btn btn-secondary' data-dismiss='modal'>Anuluj</button>
                         <button type='submi' class='btn btn-success'>Dodaj</button>
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
