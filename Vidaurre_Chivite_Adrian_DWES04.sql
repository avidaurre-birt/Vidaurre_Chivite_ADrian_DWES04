CREATE DATABASE IF NOT EXISTS DwesBd04;
USE DwesBd04;

CREATE TABLE IF NOT EXISTS actividades (
    id INT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    id_deportista INT
   
);

CREATE TABLE IF NOT EXISTS carrera (
    id INT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    duracion_min INT NOT NULL,
    distancia_km DECIMAL(5, 2) NOT NULL,
    id_deportista INT
);

CREATE TABLE IF NOT EXISTS caminata (
    id INT PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    duracion_min INT NOT NULL,
    distancia_km DECIMAL(5, 2) NOT NULL,
    id_deportista INT
);

CREATE TABLE IF NOT EXISTS deportista (
    id INT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    id_actividad INT,
    FOREIGN KEY (id_actividad) REFERENCES actividades(id)
);

INSERT INTO actividades (id, tipo, fecha, id_deportista) VALUES
(1, 'Carrera', '2023-11-20', 1),
(2, 'Caminar', '2023-11-21', 2),
(3, 'Carrera', '2023-11-23', 3),
(4, 'Caminar', '2023-11-25', 4),
(5, 'Carrera', '2023-11-26', 1),
(6, 'Caminar', '2023-11-28', 2),
(7, 'Carrera', '2023-11-30', 3),
(8, 'Caminar', '2023-12-02', 4),
(9, 'Carrera', '2023-12-03', 1),
(10, 'Caminar', '2023-12-05', 2),
(11, 'Carrera', '2023-12-11', 3);

INSERT INTO carrera (id, tipo, fecha, duracion_min, distancia_km, id_deportista) VALUES
(1, 'Carrera', '2023-11-20', 45, 5.7, 1),
(3, 'Carrera', '2023-11-23', 60, 10.2, 2),
(5, 'Carrera', '2023-11-26', 55, 7.2, 3),
(7, 'Carrera', '2023-11-30', 50, 6.5, 4),
(9, 'Carrera', '2023-12-03', 48, 6, 1),
(11, 'Carrera', '2023-12-11', 50, 10, 2);


INSERT INTO caminata (id, tipo, fecha, duracion_min, distancia_km, id_deportista) VALUES
(2, 'Caminar', '2023-11-21', 30, 3.5, 1),
(4, 'Caminar', '2023-11-25', 40, 4.8, 2),
(6, 'Caminar', '2023-11-28', 25, 2.9, 3),
(8, 'Caminar', '2023-12-02', 35, 4.2, 4),
(10, 'Caminar', '2023-12-05', 32, 3.9, 1);


INSERT INTO deportista (id, nombre, apellidos, edad, id_actividad) VALUES
(1, 'Juan', 'Pérez', 25, 1),
(2, 'María', 'González', 30, 2),
(3, 'Pedro', 'Rodríguez', 28, 1),
(4, 'Ana', 'Martínez', 22, 2);


ALTER TABLE actividades
ADD CONSTRAINT fk_actividades_deportista
FOREIGN KEY (id_deportista) REFERENCES deportista(id);

ALTER TABLE carrera
ADD CONSTRAINT fk_carrera_deportista
FOREIGN KEY (id_deportista) REFERENCES deportista(id);


ALTER TABLE caminata
ADD CONSTRAINT fk_caminata_deportista
FOREIGN KEY (id_deportista) REFERENCES deportista(id);


SELECT *
FROM actividades
JOIN deportista ON actividades.id_deportista = deportista.id
where deportista.id = 2;

