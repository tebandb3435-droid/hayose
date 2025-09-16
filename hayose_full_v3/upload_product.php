<?php
session_start(); include 'db.php';
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'TU_WHATSAPP_ADMIN') { header('Location: login.php'); exit; }
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre = $_POST['nombre']; $descripcion = $_POST['descripcion']; $precio = floatval($_POST['precio']);
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error']==0){
        $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('p_').'.'.$ext;
        move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__.'/images/'.$filename);
    } else { $filename = 'placeholder.png'; }
    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?,?,?,?)");
    $stmt->bind_param('ssds',$nombre,$descripcion,$precio,$filename); $stmt->execute();
    header('Location: admin.php'); exit;
}
?>
<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><title>Subir producto</title></head><body><h2>Subir producto</h2><form method='POST' enctype='multipart/form-data'>Nombre:<br><input name='nombre' required><br>Descripción:<br><textarea name='descripcion'></textarea><br>Precio:<br><input name='precio' required><br>Imagen:<br><input type='file' name='imagen' accept='image/*'><br><br><button type='submit'>Subir</button></form></body></html>