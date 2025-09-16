INSTRUCCIONES - Preview estática y versión PHP
- Esta carpeta contiene la versión dinámica (PHP) y además páginas HTML estáticas para previsualizar en local sin PHP.
- Para que la funcionalidad completa (registro, login, reseñas, carrito) funcione debes usar los archivos PHP en un servidor con PHP y MySQL.
- Pasos rápidos:
  1) Sube todo el contenido a tu hosting (public_html).
  2) Crea la base de datos y ejecuta sql/hayose_full.sql en phpMyAdmin.
  3) Edita db.php con tus credenciales de BD.
  4) Asegura que la carpeta images/ sea escribible (chmod 755 o 775).
- Páginas estáticas añadidas: index.html, inicio.html, productos.html, producto_detalle.html
- Nota: Los botones en las páginas estáticas apuntan a login.php para probar el flujo en servidor PHP.
