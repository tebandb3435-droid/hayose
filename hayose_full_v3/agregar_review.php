<?php
session_start();
if(!isset($_SESSION['usuario_id'])){ header('Location: login.php'); exit; }
include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $user_id = $_SESSION['usuario_id'];
    $producto = intval($_POST['producto_id']);
    $rating = intval($_POST['rating']);
    $coment = $_POST['comentario'];
    $sql = 'INSERT INTO reseñas (producto_id, user_id, rating, comentario) VALUES (?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiis', $producto, $user_id, $rating, $coment);
    $stmt->execute();
}
header('Location: producto_detalle.php?id='.$producto);
exit;
?>