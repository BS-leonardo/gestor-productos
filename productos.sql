CREATE DATABASE IF NOT EXISTS mercado;
USE mercado;
CREATE TABLE productos (
    id_producto INT PRIMARY KEY AUTO_INCREMENT,
    producto VARCHAR(255),
    precio INT,
    categoria VARCHAR(255),
    stock INT
);