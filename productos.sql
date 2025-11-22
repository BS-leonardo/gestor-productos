CREATE DATABASE IF NOT EXISTS mercado;
USE mercado;
CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    producto VARCHAR(255),
    precio INT,
    categoria VARCHAR(255),
    stock INT
);

INSERT INTO productos (id_producto, producto, precio, categoria, stock) VALUES
('1','Mouse USB','500','Periféricos','50'),
('2','Teclado USB','1000','Periféricos','40'),
('3','Auriculares con cable','5000','Audio','30'),
('4','Memoria USB 32GB','2000','Almacenamiento','60');