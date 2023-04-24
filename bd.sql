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
  color VARCHAR(10) NOT NULL DEFAULT '#ffffff'
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


-- Modificación en la tabla administradores
ALTER TABLE administradores ADD rol ENUM('administrador', 'secretaria','instructor') NOT NULL DEFAULT 'instructor';

-- Modificación en la tabla alumnos
ALTER TABLE alumnos ADD activo BOOLEAN NOT NULL DEFAULT true;

-- Modificación en la tabla reservas_simuladores
ALTER TABLE reservas_simuladores ADD cancelada BOOLEAN NOT NULL DEFAULT false;
