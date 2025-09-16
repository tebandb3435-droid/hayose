<?php
session_start();
include 'db.php';
if(!isset($_SESSION['usuario'])){ header('Location: login.php'); exit; }
$cart = $_SESSION['cart'] ?? [];
$ids = $cart ? implode(',', array_map('intval',$cart)) : '0';
$res = $conn->query("SELECT * FROM productos WHERE id IN ($ids)");
$productos = [];
while($r=$res->fetch_assoc()) $productos[]=$r;
?>
<!DOCTYPE html><html><head><meta charset="utf-8"><title>Carrito</title></head><body><h2>Tu carrito</h2><?php foreach($productos as $p): ?><div><?php echo htmlspecialchars($p['nombre']); ?> - $<?php echo $p['precio']; ?></div><?php endforeach; ?><form method="POST" action="checkout.php"><button type="submit">Pagar (simulado)</button></form></body></html>