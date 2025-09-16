<?php
session_start();
include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $whatsapp = $_POST['whatsapp'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $sql = 'INSERT INTO usuarios (whatsapp, password) VALUES (?,?)';
    $st = $conn->prepare($sql);
    $st->bind_param('ss',$whatsapp,$password);
    if($st->execute()){
        header('Location: login.php?msg=registrado');
        exit;
    } else { $error = $conn->error; }
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><title>Registro</title>
<link rel="stylesheet" href="css/style.css"></head><body>
<main class="auth">
<h2>Registro</h2>
<?php if(isset($error)) echo '<p class="error">'.htmlspecialchars($error).'</p>'; ?>
<form method="POST">
<input name="whatsapp" placeholder="WhatsApp" required><br>
<input type="password" name="password" placeholder="Contraseña" required><br>
<button type="submit">Registrar</button>
</form>
<p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
</main></body></html>