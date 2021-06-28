<?php
session_start();
require_once 'classes/admin.php';

$admin = new Admin();

$admin->logout();
header('Location: login.php');
?>
