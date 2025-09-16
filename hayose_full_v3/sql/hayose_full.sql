
CREATE DATABASE IF NOT EXISTS hayose_db DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hayose_db;
CREATE TABLE IF NOT EXISTS usuarios (id INT AUTO_INCREMENT PRIMARY KEY, whatsapp VARCHAR(20) UNIQUE NOT NULL, password VARCHAR(255) NOT NULL, fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE IF NOT EXISTS productos (id INT AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(150) NOT NULL, descripcion TEXT, precio DECIMAL(10,2) NOT NULL DEFAULT 0, imagen VARCHAR(200) DEFAULT 'placeholder.png') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE IF NOT EXISTS reseñas (id INT AUTO_INCREMENT PRIMARY KEY, producto_id INT NOT NULL, user_id INT NOT NULL, rating TINYINT NOT NULL, comentario TEXT, fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE, FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE IF NOT EXISTS votos (id INT AUTO_INCREMENT PRIMARY KEY, whatsapp VARCHAR(20) NOT NULL, opcion VARCHAR(50) NOT NULL, fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES ('Gorra HAYOSE','Gorra 100% Colombiana, talla única',35.00,'gorra1.jpg'),('Camiseta HAYOSE','Camiseta algodón, serigrafía HAYOSE',45.50,'camiseta1.jpg'),('Sticker Pack','Pack de stickers HAYOSE (10 pcs)',8.00,'stickers1.jpg');
INSERT INTO usuarios (whatsapp, password) VALUES ('3001112222', '$2y$10$wH0eY8sNe2eZQGk1lRr5uuzm6o1sHq4o5b4o9zQxvQKJ7cR1YfG3K');
INSERT INTO reseñas (producto_id, user_id, rating, comentario) VALUES (1, 1, 5, 'Me encanta la gorra, excelente calidad.'),(2, 1, 4, 'La camiseta quedó muy bien, buen tallaje.');
