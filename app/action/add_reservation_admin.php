<?php
session_start();
require_once ('..\config\config.php');

$reservation_date = $_POST['reservation_date'];
$range = $_POST['range'];
$contact = $_POST['contact'];
$model = $_POST['model'];
$serial = 	$_POST['serial'];
$content = 	$_POST['content'];
$category = 	$_POST['category'];
$client = 0;
$end = 0;
$accept = 1;







$add = "INSERT INTO `reservation`(`id`,`reservation_date`,`phone`,`rangetime`,`model`,`serial`,`content`,`category`,`client`,`end`,`accept`) VALUES (NULL,'$reservation_date','$contact','$range','$model','$serial','$content','$category','$client','$end','$accept')";
$db->query($add);
echo $add;

$_SESSION['notification'] = '<script type="text/javascript">swal("Dodawanie rezerwacji.", "Dodawanie rezerwacji zakończone sukcesem", "success");</script>';


header('location: ..\view\main.php');



$db->close();
exit();
