<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$accept = 1;




//


$add = "UPDATE reservation set accept=$accept where id like $id";
echo $add;
$db->query($add);
$_SESSION['notification'] = '<div class="alert alert-success" role="alert">Rezerwacja o numerze '.$id.' została zaakceptowana </div>';
header('location: ..\view\accept.php');



$db->close();
exit();
