<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$disabled = 0;


$delete = "DELETE FROM services WHERE id LIKE '$id'";
$db->query($delete);

//


header('location: ..\view\services.php');



$db->close();
exit();
