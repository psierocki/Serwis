<?php
session_start();
require_once ('..\config\config.php');
$username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8");
$password = sha1($_POST['password']);

if ($result = $db->query(sprintf("SELECT * FROM users WHERE username='%s'",mysqli_real_escape_string($db,$username))))
{
	$number_result = $result->num_rows;
    if($number_result==1) {
		$array = $result->fetch_assoc();

		 $query_log_in = "SELECT * FROM users WHERE username like '$username'";
                             $result_log_in = $db->query($query_log_in);
                             $array_log_in = $result_log_in->fetch_assoc();

			$password_user = $array_log_in['password'];
                if ($password==$password_user) {
					$_SESSION['id_user_session'] = $array_log_in['id'];
					$_SESSION['username_session'] = $array_log_in['name'];
					$_SESSION['status_session'] = $array_log_in['status'];
					$_SESSION['type_session'] = $array_log_in['type'];

                    $_SESSION['online'] = "yes";
											header('location: ../view/main.php');

					}
					else
					{
			       $_SESSION['alert'] = '<script type="text/javascript">swal("Logowanie nieudane", "Podano błędne hasło", "error");</script>';
                   header('location: ..\index.php');
                }
            } else {
				$_SESSION['alert'] = '<script type="text/javascript">swal("Logowanie nieudane", "Podano błędny login", "error");</script>';
                header('location: ..\index.php');
            }
	}

else
{
				$_SESSION['alert'] = '<script type="text/javascript">swal("Błąd aplikacji", "Brak komunikacji z bazą danych!", "error");</script>';
              header('location: ..\index.php');


}
$db->close();
exit();
