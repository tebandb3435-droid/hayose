<?php
session_start();
if(!isset($_SESSION['usuario'])){ header('Location: login.php'); exit; }
include 'db.php';
?>
<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Inicio</title>
<link rel='stylesheet' href='css/style.css'></head><body>
<header><div class='logo'>HA'YOSÊ</div><nav class='nav' id='nav-menu'><ul><li><a href='index.php'>Inicio</a></li><li><a href='productos.php'>Nuestros Productos</a></li></ul></nav><div class='hamburger' id='hamburger'>&#9776;</div></header>
<main class='contenido'><h1>Bienvenido <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1><p>Hace años me editaron una foto y desde entonces veo la palabra Hayose...</p>
<form method='POST' action='votar.php'><button type='submit' name='opcion' value='si'>✔ Sí, me ha pasado.</button><button type='submit' name='opcion' value='nose'>🤷 Me suena, pero no sé</button><button type='submit' name='opcion' value='nunca'>✖ Nunca lo he visto.</button><button type='submit' name='opcion' value='curiosidad'>👀 Ahora me dio curiosidad</button></form>
<p><a href='logout.php'>Cerrar sesión</a></p></main><canvas id='matrix'></canvas><script src='js/matrix.js'></script></body></html>