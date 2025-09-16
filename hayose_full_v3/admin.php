<?php
session_start();
include 'db.php';
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'TU_WHATSAPP_ADMIN') { header('Location: login.php'); exit; }
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['delete_user'])) { $id = intval($_POST['delete_user']); $conn->query("DELETE FROM usuarios WHERE id=$id"); }
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['delete_product'])) { $id = intval($_POST['delete_product']); $conn->query("DELETE FROM productos WHERE id=$id"); }
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['delete_review'])) { $id = intval($_POST['delete_review']); $conn->query("DELETE FROM reseñas WHERE id=$id"); }
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['delete_vote'])) { $id = intval($_POST['delete_vote']); $conn->query("DELETE FROM votos WHERE id=$id"); }
$users = $conn->query("SELECT id, whatsapp, fecha FROM usuarios ORDER BY id DESC");
$products = $conn->query("SELECT * FROM productos ORDER BY id DESC");
$reviews = $conn->query("SELECT r.*, u.whatsapp FROM reseñas r JOIN usuarios u ON r.user_id=u.id ORDER BY r.fecha DESC");
$votes = $conn->query("SELECT * FROM votos ORDER BY fecha DESC");
?>
<!DOCTYPE html><html lang='es'><head><meta charset='utf-8'><title>Admin - HA'YOSÊ</title><link rel='stylesheet' href='css/style.css'></head><body>
<h1>Panel Admin</h1><p><a href='index.php'>Ir al sitio</a> | <a href='logout.php'>Cerrar sesión</a></p>
<h2>Usuarios</h2><table border='1'><tr><th>ID</th><th>WhatsApp</th><th>Fecha</th><th>Acción</th></tr><?php while($u = $users->fetch_assoc()): ?><tr><td><?php echo $u['id'];?></td><td><?php echo htmlspecialchars($u['whatsapp']);?></td><td><?php echo $u['fecha'];?></td><td><form method='POST' style='display:inline'><button name='delete_user' value='<?php echo $u['id'];?>' onclick="return confirm('Eliminar usuario?')">Eliminar</button></form></td></tr><?php endwhile; ?></table>
<h2>Productos</h2><p><a href='upload_product.php'>Añadir nuevo producto</a></p><table border='1'><tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Acción</th></tr><?php while($p = $products->fetch_assoc()): ?><tr><td><?php echo $p['id'];?></td><td><?php echo htmlspecialchars($p['nombre']);?></td><td><?php echo $p['precio'];?></td><td><form method='POST' style='display:inline'><button name='delete_product' value='<?php echo $p['id'];?>' onclick="return confirm('Eliminar producto?')">Eliminar</button></form></td></tr><?php endwhile; ?></table>
<h2>Reseñas</h2><?php while($r = $reviews->fetch_assoc()): ?><div style='border:1px solid #ccc;padding:8px;margin:6px 0;'><strong><?php echo htmlspecialchars($r['whatsapp']);?></strong> - <?php echo $r['fecha']; ?><p>Rating: <?php echo $r['rating']; ?></p><p><?php echo nl2br(htmlspecialchars($r['comentario'])); ?></p><form method='POST'><button name='delete_review' value='<?php echo $r['id'];?>' onclick="return confirm('Eliminar reseña?')">Eliminar</button></form></div><?php endwhile; ?>
<h2>Votos</h2><?php while($v = $votes->fetch_assoc()): ?><div><?php echo htmlspecialchars($v['whatsapp']);?> - <?php echo $v['opcion'];?> - <?php echo $v['fecha'];?><form method='POST' style='display:inline'><button name='delete_vote' value='<?php echo $v['id'];?>' onclick="return confirm('Eliminar voto?')">Eliminar</button></form></div><?php endwhile; ?></body></html>