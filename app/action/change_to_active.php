<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$status = 1;







$add = "UPDATE users set status=$status where id like $id";
echo $add;
$db->query($add);
$_SESSION['notification'] = '<div class="alert alert-success" role="alert">Zmieniono konto na aktywne!</div>';
header('location: ..\view\users.php');



$db->close();
exit();
