<?php
session_start();
require_once ('../config/config.php');
$user_session_id = $_SESSION['id_user_session'];

if(isset($_SESSION['online']) && $_SESSION['online'] == "yes") {

  if ($_SESSION['type_session']==1){
    header('location: main.php');

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
                      <a href="main.php" class="nav-link smoothScroll" style="color: white">Rezerwacje</a>
                  </li>

                  <li class="nav-item">
                      <a href="term.php" class="nav-link smoothScroll">Terminarz</a>
                  </li>

                  <li class="nav-item">
                             <a href="password_client.php" class="nav-link smoothScroll" >Zmień hasło</a>
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




<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">

<div class="form-row">



<a class="btn btn-sm btn-outline-secondary form-control col-md-4 offset-md-4" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 20px; margin-top: 20px; ">Zarezerwuj</a>








    <table class="table  " cellspacing='0' style='text-align: center; margin-top: 30px'>


	<tr >

        <th style="text-align: center">ID</th>
		<th style="text-align: center">Data</th>
		<th style="text-align: center">Model</th>
		<th style="text-align: center">Godziny</th>
        <th style="text-align: center">Status</th>
		<th style="text-align: center">Informacje</th>
		<th style="text-align: center">Lista usług</th>



    </tr>




	<?php

		$query = "SELECT * FROM reservation WHERE client like $user_session_id";









$result = $db->query($query);



                     $row = $result->num_rows;

                       for ($x=0; $x < $row; $x++)
                         {
                             $table = $result->fetch_assoc();

								$id_range = $table['rangetime'];
								$query_range = "SELECT * FROM rangetime where id like '$id_range'";
								$result_range = $db->query($query_range);
								$table_range = $result_range->fetch_assoc();


                             echo "
                                 <tr>
                                 <td>" . $table['id'] . "</td>
								 <td>" . $table['reservation_date'] . "</td>
                                 <td>" . $table['model'] . "</td>
								 <td>" . $table_range['name'] . "</td>";



if ($table['accept']==1)
{
echo  "<td style='color: green'>Akteptacja</td>";

}
else {
echo  "<td style='color: red'>Brak akceptacji</td>";
}





		echo				"<td><a class=\"btn btn-sm btn-outline-secondary \" href='details_reservation_client.php?id=".$table['id']."' \">Informacje</a></td>
								 <td><a class=\"btn btn-sm btn-outline-secondary \" href='reservation_services_client.php?id=".$table['id']."' \">Lista usług</a></td>";




	  }












?>



</table>

</div></div>
</div>
</div>




  <section class="testimonials section-padding" id="testimonials" style="margin-top: 100px">
      <div class="container">
          <div class="row">
              <div class="mx-auto col-lg-12 col-md-12 col-12">
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
        <h4 id='exampleModalLabel' >Nowa rezerwacja</b></h4></div><div class='modal-body'>
        <form action='..\action\add_reservation.php' method='post' name='add' data-toggle='validator' role='form'>";

  ?>

  <div class="form-group col-md-12">
  <label for="inputEmail4">Data rezerwacji</label>
  <input type="text" class="form-control"  placeholder="RRRR-MM-DD" name="reservation_date" id="datepicker2" required>
  </div>






    		<div class="form-group col-md-12">
          <label for="inputEmail4">Godzina</label>
    <?php

                       $categories_query = "SELECT * FROM rangetime";
                       $categories_result = $db->query($categories_query);

                        $categories_row = $categories_result->num_rows;
                        echo "<select class='form-control' name='range' required> <option value=''>--</option>";

                        for ($i=0; $i < $categories_row; $i++)
                        {
                        $categories_array = $categories_result->fetch_assoc();
                        echo "<option value='". $categories_array['id'] ."'>". $categories_array['name'] ."</option>";
                        }
                         echo "</select>";
         ?>
        </div>






          <div class="form-group col-md-12">
          <label for="inputEmail4">Numer kontaktowy</label>
          <input type="text" class="form-control"  placeholder="Numer kontaktowy" name="contact" required>
          </div>

          <div class="form-group col-md-12">
          <label for="inputEmail4">Model urządzenia</label>
          <input type="text" class="form-control"  placeholder="Model urządzenia" name="model" required>
          </div>

          <div class="form-group col-md-12">
          <label for="inputEmail4">Numer seryjny</label>
          <input type="text" class="form-control"  placeholder="Numer seryjny" name="serial" required>
          </div>

      <div class="form-group col-md-12">
      <label for="inputEmail4">Opis</label><br>
      <textarea placeholder="Opis" name="content" class="form-control" required>   </textarea>
      </div>

      <div class="form-group col-md-12">
        <label for="inputEmail4">Kategoria</label>
  <?php

                     $categories2_query = "SELECT * FROM category where disabled like 0";
                     $categories2_result = $db->query($categories2_query);

                      $categories2_row = $categories2_result->num_rows;
                      echo "<select class='form-control' name='category' required> <option value=''>--</option>";

                      for ($i=0; $i < $categories2_row; $i++)
                      {
                      $categories2_array = $categories2_result->fetch_assoc();
                      echo "<option value='". $categories2_array['id'] ."'>". $categories2_array['name'] ."</option>";
                      }
                       echo "</select>";
       ?>
      </div>



                    <div class='modal-footer'>
                         <button type='button' class='btn btn-sm btn-outline-secondary' data-dismiss='modal'>Anuluj</button>
                         <button type='submi' class='btn btn-sm btn-outline-success'>Dodaj</button>
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
