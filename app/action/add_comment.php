<?php
session_start();
require_once ('..\config\config.php');


$id_reservation = $_SESSION['$id_reservation'];
$today = date("Y-m-d");
$content = $_POST['content'];
$id_user = $_SESSION['id_user_session'];



//



$add = "INSERT INTO `comments`(`id`,`id_reservation`,`comment_date`,`content`,`id_user`) VALUES
(NULL,'$id_reservation','$today','$content','$id_user')";
$db->query($add);
echo $add;


if ($_SESSION['type_session']==1) {

    header('location: ../view/details_reservation.php?id=' . $id_reservation);
}
else
{
    header('location: ../view/details_reservation_client.php?id=' . $id_reservation);


}


$db->close();
exit();
