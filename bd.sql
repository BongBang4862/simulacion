CREATE DATABASE simulacion;

USE simulacion;

CREATE TABLE administradores (
  id INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE alumnos (
  id INT NOT NULL AUTO_INCREMENT,
  nombre_completo VARCHAR(100) NOT NULL,
  rut VARCHAR(10) NOT NULL,
  codigo_curso VARCHAR(10) NOT NULL,
  fecha_alta DATE NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE simuladores (
  id INT NOT NULL AUTO_INCREMENT,
  nombre_simulador VARCHAR(50) NOT NULL,
  detalle TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE examenes (
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE preguntas (
  id INT NOT NULL AUTO_INCREMENT,
  examen_id INT NOT NULL,
  pregunta TEXT NOT NULL,
  
  PRIMARY KEY (id),
  FOREIGN KEY (examen_id) REFERENCES examenes(id) ON DELETE CASCADE
);

CREATE TABLE reservas_simuladores (
  id INT NOT NULL AUTO_INCREMENT,
  alumno_id INT NOT NULL,
  simulador_id INT NOT NULL,
  fecha DATE NOT NULL,
  hora_inicio TIME NOT NULL,
  hora_final TIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (alumno_id) REFERENCES alumnos(id) ON DELETE CASCADE,
  FOREIGN KEY (simulador_id) REFERENCES simuladores(id) ON DELETE CASCADE
);



INSERT INTO administradores (nombre, apellido,password, email)
VALUES ('Luis Francisco','Cordova Olavarria', 'password123', 'juan@example.com');
INSERT INTO alumnos (nombre_completo, rut, codigo_curso, fecha_alta)
VALUES ('Maria Gomez Perez', '12345678-9', 'CI1234', '2022-01-15');
INSERT INTO simuladores (nombre_simulador, detalle)
VALUES ('Simulador de Vuelo', 'Camion de Extraccion y Cargador Frontal');
INSERT INTO examenes (titulo)
VALUES ('Examen de Matemáticas');
INSERT INTO preguntas (pregunta, examen_id)
VALUES ('¿Cuál es el resultado de 2 + 2?', 1);


INSERT INTO reservas_simuladores (alumno_id, simulador_id, fecha, hora_inicio,hora_final)
VALUES (1, 1, '2023-04-01', '13:00:00','15:00:00');
INSERT INTO reservas_simuladores (alumno_id, simulador_id, fecha, hora_inicio,hora_final)
VALUES (1, 1, '2023-04-01', '15:00:00','17:00:00');
