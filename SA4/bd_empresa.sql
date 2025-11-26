
CREATE DATABASE IF NOT EXISTS empresa 
    DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE empresa;

-- TABLA DEPARTAMENTOS
CREATE TABLE IF NOT EXISTS departamentos (
  CodDept INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(20) NOT NULL,
  Jefe INT(11) DEFAULT NULL,
  Presupuesto INT(11) NOT NULL,
  Ciudad VARCHAR(20) NOT NULL,
  PRIMARY KEY (CodDept),
  UNIQUE KEY Nombre (Nombre),
  KEY Jefe (Jefe)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- TABLA EMPLEADOS
CREATE TABLE IF NOT EXISTS empleados (
  CodEmple INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(20) NOT NULL,
  Apellido1 VARCHAR(20) NOT NULL,
  Apellido2 VARCHAR(20) NOT NULL,
  Departamento INT(11) NOT NULL,
  PRIMARY KEY (CodEmple),
  KEY Departamento (Departamento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- TABLA USUARIOS
CREATE TABLE IF NOT EXISTS usuarios (
  Codigo INT(11) NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(20) NOT NULL,
  Clave VARCHAR(20) NOT NULL,
  Rol INT(11) NOT NULL,
  PRIMARY KEY (Codigo),
  UNIQUE KEY Nombre (Nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 🔧 ELIMINAR FOREIGN KEYS SI EXISTEN

-- FK departamentos.Jefe → empleados.CodEmple
SET @fk := (
  SELECT CONSTRAINT_NAME 
  FROM information_schema.KEY_COLUMN_USAGE 
  WHERE TABLE_NAME='departamentos' AND COLUMN_NAME='Jefe' AND REFERENCED_TABLE_NAME IS NOT NULL
);
SET @s = IF(@fk IS NOT NULL, CONCAT('ALTER TABLE departamentos DROP FOREIGN KEY ', @fk), 'SELECT 1');
PREPARE stmt FROM @s; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- FK empleados.Departamento → departamentos.CodDept
SET @fk := (
  SELECT CONSTRAINT_NAME 
  FROM information_schema.KEY_COLUMN_USAGE 
  WHERE TABLE_NAME='empleados' AND COLUMN_NAME='Departamento' AND REFERENCED_TABLE_NAME IS NOT NULL
);
SET @s = IF(@fk IS NOT NULL, CONCAT('ALTER TABLE empleados DROP FOREIGN KEY ', @fk), 'SELECT 1');
PREPARE stmt FROM @s; EXECUTE stmt; DEALLOCATE PREPARE stmt;

-- 🔧 AÑADIR FOREIGN KEYS
ALTER TABLE departamentos 
  ADD CONSTRAINT departamentos_ibfk_1 FOREIGN KEY (Jefe)
  REFERENCES empleados (CodEmple) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE empleados 
  ADD CONSTRAINT empleados_ibfk_1 FOREIGN KEY (Departamento)
  REFERENCES departamentos (CodDept) ON DELETE CASCADE ON UPDATE CASCADE;

-- INSERTAR DATOS SEGUROS
INSERT INTO departamentos (CodDept, Nombre, Jefe, Presupuesto, Ciudad)
SELECT 3, 'Ventas', NULL, 1004, 'Sevilla'
WHERE NOT EXISTS (SELECT 1 FROM departamentos WHERE CodDept=3);

INSERT INTO departamentos (CodDept, Nombre, Jefe, Presupuesto, Ciudad)
SELECT 4, 'Gerencia', NULL, 2000, 'Lugo'
WHERE NOT EXISTS (SELECT 1 FROM departamentos WHERE CodDept=4);

INSERT INTO empleados (CodEmple, Nombre, Apellido1, Apellido2, Departamento)
SELECT 1, 'Ana', 'Fuentes', 'Teruel', 3
WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=1);

INSERT INTO empleados (CodEmple, Nombre, Apellido1, Apellido2, Departamento)
SELECT 2, 'Luis', 'Marea', 'Motos', 3
WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=2);

INSERT INTO empleados (CodEmple, Nombre, Apellido1, Apellido2, Departamento)
SELECT 4, 'Antonio', 'Hoz', 'Perales', 4
WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=4);

INSERT INTO empleados (CodEmple, Nombre, Apellido1, Apellido2, Departamento)
SELECT 5, 'Eloisa', 'Puertas', 'Torres', 4
WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=5);

UPDATE departamentos SET Jefe=1 
WHERE CodDept=3 AND (Jefe IS NULL OR Jefe<>1);

UPDATE departamentos SET Jefe=4 
WHERE CodDept=4 AND (Jefe IS NULL OR Jefe<>4);

INSERT INTO usuarios (Codigo, Nombre, Clave, Rol)
SELECT 1, 'ana', '1234', 1 
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=1);

INSERT INTO usuarios (Codigo, Nombre, Clave, Rol)
SELECT 3, 'paco', '1234', 0 
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=3);

INSERT INTO usuarios (Codigo, Nombre, Clave, Rol)
SELECT 4, 'Pedro', '33333', 0 
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=4);

INSERT INTO usuarios (Codigo, Nombre, Clave, Rol)
SELECT 20, 'Luisa', '2222', 0 
WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=20);
