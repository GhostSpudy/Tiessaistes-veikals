<?php
session_start();
unset($_SESSION['data']);
unset($_SESSION['admin']);
unset($_POST);
session_destroy();
header('Location: ../index.php');
exit;