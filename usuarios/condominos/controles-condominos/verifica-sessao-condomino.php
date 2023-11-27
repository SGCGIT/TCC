<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['cargo'] != 0) {
    session_unset();
    session_destroy();
    header('Location: ../../../tela-login.php');
    exit();
}
?>