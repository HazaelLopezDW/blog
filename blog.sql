CREATE DATABASE blog;

USE blog;

CREATE TABLE usuarios(
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fecha_registro DATETIME NOT NULL,
    activo TINYINT NOT NULL,
    PRIMARY KEY(id)
);