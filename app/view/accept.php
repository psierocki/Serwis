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
                      <a href="main.php" class="nav-link smoothScroll" style="color: white">Lista rezerwacji</a>
                  </li>

                  <li class="nav-item">
                      <a href="services.php" class="nav-link smoothScroll">Usługi</a>
                  </li>

                  <li class="nav-item">
                      <a href="administration.php" class="nav-link smoothScroll">Administracja</a>
                  </li>

                  <li class="nav-item">
                      <a href="change_password.php" class="nav-link smoothScroll">Zmień hasło</a>
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
<form action='' method="post">

<div class="form-row">

<?php
  if (isset($_SESSION['notification']))
  {
  	echo $_SESSION['notification'];
  	unset($_SESSION['notification']);
  }
?>





    <table class="table  " cellspacing='0' style='text-align: center; margin-top: 30px'>


	<tr >

        <th style="text-align: center">ID</th>
		<th style="text-align: center">Data</th>
		<th style="text-align: center">Model</th>
		<th style="text-align: center">Zakres godzin</th>
    <th style="text-align: center">Akceptuj</th>
    <th style="text-align: center">Odrzuć</th>
		<th style="text-align: center">Szczegóły</th>



    </tr>




	<?php

		$query = "SELECT * FROM reservation WHERE accept = 0";


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






                 echo "<td><a class=\"btn btn-sm btn-outline-success \" href='../action/accept.php?id=".$table['id']."' \">Akceptuj</a></td>";
                 echo "<td><a class=\"btn btn-sm btn-outline-danger \" href='../action/reject.php?id=".$table['id']."' \">Odrzuć</a></td>";


								echo "<td><a class=\"btn btn-sm btn-outline-secondary \" href='details_reservation.php?id=".$table['id']."' \">Szczegóły</a></td>";




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
