<?php
session_start();
session_destroy();
session_start();
$_SESSION['notification'] = '<script type="text/javascript">swal("Wylogowanie z aplikacji.", "Zostałeś wylogowany poprawnie!", "success");</script>';

header('location: ../index.php');
