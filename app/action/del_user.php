<?php
session_start();
require_once ('..\config\config.php');

$id = $_GET['id'];
$disabled = 0;


$delete = "DELETE FROM users WHERE id LIKE '$id'";
$db->query($delete);




header('location: ..\view\users.php');



$db->close();
exit();
