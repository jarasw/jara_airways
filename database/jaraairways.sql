CREATE DATABASE IF NOT EXISTS imvmbot_imvmbot;

CREATE TABLE vuelos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    origen VARCHAR(30) NOT NULL,
    destino VARCHAR(30) NOT NULL,
    fecha_ida DATE NOT NULL,
    fecha_vuelta DATE NOT NULL,
    clase_cabina VARCHAR(30) NOT NULL,
    franja_edad VARCHAR(20) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE clientes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellidos VARCHAR(30) NOT NULL,
    DNI VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
);

CREATE TABLE reservas (
    idVuelos INT(6) NOT NULL,
    idClientes INT(6) NOT NULL,
    PRIMARY KEY (idVuelos, idClientes),
    FOREIGN KEY (idVuelos) REFERENCES vuelos(id),
    FOREIGN KEY (idClientes) REFERENCES clientes(id)
); 