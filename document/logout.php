<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

if (isset($_POST["adm"])) {
header("location: administrator.php");
} else {
  header("location: login.php");
}
?>
