<?php
session_start();
require_once ('..\config\config.php');

$id_reservation = $_POST['id_reservation'];
$hours = $_POST['hours'];
$description = $_POST['description'];
$price = $_POST['price'];




$add = "INSERT INTO `services`(`id`,`id_reservation`,`hours`,`description`,`price`) VALUES 
(NULL,'$id_reservation','$hours','$description','$price')";
$db->query($add);
echo $add;

$_SESSION['notification'] = '<script type="text/javascript">swal("Dodawanie rezerwacji.", "Dodawanie rezerwacji zakończone sukcesem!", "success");</script>';


header('location: ..\view\services.php');

//

$db->close();
exit();
