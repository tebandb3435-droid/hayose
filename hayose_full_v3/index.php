<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>HA'YOSÊ - Inicio</title>
<link rel="stylesheet" href="css/style.css"></head><body>
<header><div class="logo">HA'YOSÊ</div><nav class="nav" id="nav-menu"><ul><li><a href="index.php">Inicio</a></li><li><a href="productos.php">Nuestros Productos</a></li></ul></nav><div class="hamburger" id="hamburger">&#9776;</div></header>
<main class="contenido"><h1>HA ' YOSÊ</h1><p>Hace años me editaron una foto y desde entonces veo la palabra Hayose... ¿Y ustedes?</p>
<div class="botones"><button onclick="checkLoginAction('si')">✔ Sí, me ha pasado.</button><button onclick="checkLoginAction('nose')">🤷 Me suena, pero no sé</button><button onclick="checkLoginAction('nunca')">✖ Nunca lo he visto.</button><button onclick="checkLoginAction('curiosidad')">👀 Ahora me dio curiosidad</button></div>
<div class="social-icons"><a href="#" target="_blank">📺</a><a href="#" target="_blank">📘</a><a href="#" target="_blank">📷</a></div></main><footer><p>Todos los derechos reservados HA'YOSÊ 2025 ©</p></footer><canvas id="matrix"></canvas><script src="js/matrix.js"></script>
<script>
function checkLoginAction(op){
  fetch('check_session.php').then(r=>r.json()).then(data=>{
    if(!data.logged){ alert('⚠️ Debes iniciar sesión primero.'); window.location.href='login.php'; }
    else{
      fetch('votar.php', {method:'POST', headers:{'Content-Type':'application/x-www-form-urlencoded'}, body:'opcion='+encodeURIComponent(op)}).then(()=>alert('Gracias por participar'));
    }
  });
}
</script>
</body></html>