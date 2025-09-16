<?php
session_start(); include 'db.php';
if(!isset($_SESSION['usuario'])){ header('Location: login.php'); exit; }
unset($_SESSION['cart']);
header('Location: index.php?msg=gracias-compra');
exit;
?>