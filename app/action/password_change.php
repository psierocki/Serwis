<?php
session_start();
require_once ('..\config\config.php');

$id = $_SESSION['id_user_session'];
$password = sha1($_POST['password']);

$add = "UPDATE users SET password='$password' WHERE id LIKE '$id'";
echo $add;
$db->query($add);

if ($_SESSION['type_session']==1) {

    header('location: ..\view\password.php');
}
else
{
    header('location: ..\view\password_client.php');


}
$_SESSION['alert'] = '<div class="alert alert-success">Hasło zostało zmienione!</div>';

$db->close();
exit();
