<?php
session_start();
if(!isset($_SESSION['usuario'])) { header('Location: login.php'); exit; }
if($_SERVER['REQUEST_METHOD']=='POST'){
    $_SESSION['cart'][] = intval($_POST['producto_id']);
}
header('Location: productos.php');
exit;
?>