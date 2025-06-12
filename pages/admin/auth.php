<?php
session_start();
if (!isset($_SESSION['id_user']) || !isset($_SESSION['level'])) {
    header("Location: ../register/login.php");
    exit;
}
