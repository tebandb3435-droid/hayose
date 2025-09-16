<?php
session_start();
include 'db.php';
$id = intval($_GET['id'] ?? 0);
if(!$id){ header('Location: productos.php'); exit; }
$stmt = $conn->prepare('SELECT * FROM productos WHERE id=?');
$stmt->bind_param('i',$id); $stmt->execute(); $prod = $stmt->get_result()->fetch_assoc();
$reviews = [];
$st = $conn->prepare('SELECT r.*, u.whatsapp FROM reseñas r JOIN usuarios u ON r.user_id=u.id WHERE r.producto_id=? ORDER BY r.fecha DESC');
$st->bind_param('i',$id); $st->execute(); $res = $st->get_result();
while($row=$res->fetch_assoc()) $reviews[]=$row;
?>
<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width,initial-scale=1'><title>Detalle</title><link rel='stylesheet' href='css/style.css'></head><body>
<header><div class='logo'>HA'YOSÊ</div></header><main class='producto-detalle'><h2><?php echo htmlspecialchars($prod['nombre']); ?></h2><img src='images/<?php echo htmlspecialchars($prod['imagen']); ?>' alt=''><p class='price'>$<?php echo number_format($prod['precio'],2,',','.'); ?></p><p><?php echo nl2br(htmlspecialchars($prod['descripcion'])); ?></p><h3>Reseñas</h3><?php foreach($reviews as $r): ?><div class='review'><strong><?php echo htmlspecialchars($r['whatsapp']); ?></strong><span class='rating'><?php echo str_repeat('★', $r['rating']); ?></span><p><?php echo nl2br(htmlspecialchars($r['comentario'])); ?></p><small><?php echo $r['fecha']; ?></small></div><?php endforeach; ?><?php if(isset($_SESSION['usuario_id'])): ?><h3>Dejar reseña</h3><form method='POST' action='agregar_review.php'><input type='hidden' name='producto_id' value='<?php echo $prod['id']; ?>'><label>Calificación (1-5):</label><br><input type='number' name='rating' min='1' max='5' required><br><label>Comentario:</label><br><textarea name='comentario' required></textarea><br><button type='submit'>Enviar reseña</button></form><?php else: ?><p>Debes <a href='login.php'>iniciar sesión</a> para dejar una reseña.</p><?php endif; ?></main><footer><p>HA'YOSÊ</p></footer></body></html>