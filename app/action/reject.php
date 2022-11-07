<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$accept = 2;







//$add = "UPDATE reservation set accept=$accept where id like $id";
$add = "DELETE FROM reservation where id like $id";

echo $add;
$db->query($add);
$_SESSION['notification'] = '<div class="alert alert-danger" role="alert">Rezerwacja o numerze '.$id.' została odrzucona! </div>';
header('location: ..\view\accept.php');



$db->close();
exit();
