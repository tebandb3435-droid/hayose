<?php
session_start();
include 'db.php';
if(!isset($_SESSION['usuario'])){ header('Location: login.php'); exit; }
if($_SERVER['REQUEST_METHOD']=='POST'){
    $usuario = $_SESSION['usuario'];
    $opcion = $_POST['opcion'];
    $sql = 'INSERT INTO votos (whatsapp, opcion) VALUES (?,?)';
    $st = $conn->prepare($sql);
    $st->bind_param('ss',$usuario,$opcion);
    $st->execute();
}
header('Location: index.php');
exit; ?>