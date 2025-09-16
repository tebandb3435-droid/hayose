<?php
session_start();
include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $whatsapp = $_POST['whatsapp']; $password = $_POST['password'];
    $sql = 'SELECT id, whatsapp, password FROM usuarios WHERE whatsapp=?';
    $st = $conn->prepare($sql);
    $st->bind_param('s',$whatsapp); $st->execute(); $res = $st->get_result();
    if($res->num_rows===1){
        $u = $res->fetch_assoc();
        if(password_verify($password, $u['password'])){
            $_SESSION['usuario'] = $u['whatsapp'];
            $_SESSION['usuario_id'] = $u['id'];
            header('Location: inicio.php'); exit;
        } else { $error='Contraseña incorrecta'; }
    } else { $error='Usuario no encontrado'; }
}
?>
<!DOCTYPE html><html lang="es"><head><meta charset="utf-8"><title>Login</title>
<link rel="stylesheet" href="css/style.css"></head><body>
<main class="auth">
<h2>Iniciar sesión</h2>
<?php if(isset($_GET['msg'])) echo '<p class="success">Registrado con éxito, ahora inicia sesión</p>'; ?>
<?php if(isset($error)) echo '<p class="error">'.htmlspecialchars($error).'</p>'; ?>
<form method="POST">
<input name="whatsapp" placeholder="WhatsApp" required><br>
<input type="password" name="password" placeholder="Contraseña" required><br>
<button type="submit">Entrar</button>
</form>
<p>No tienes cuenta? <a href="register.php">Regístrate</a></p>
</main></body></html>