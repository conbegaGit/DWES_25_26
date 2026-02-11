-- Base de datos: `empresa`
CREATE DATABASE IF NOT EXISTS `empresa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `empresa`;

-- 1) Crear BD, tablas e insertar datos (ejecutar primero)
-- --------------------------------------------------------
-- Tabla departamentos
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `departamentos` (
  `CodDept` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(20) NOT NULL,
  `Jefe` INT(11) DEFAULT NULL,
  `Presupuesto` INT(11) NOT NULL,
  `Ciudad` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`CodDept`),
  UNIQUE KEY `Nombre` (`Nombre`),
  KEY `Jefe` (`Jefe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Tabla empleados
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `empleados` (
  `CodEmple` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(20) NOT NULL,
  `Apellido1` VARCHAR(20) NOT NULL,
  `Apellido2` VARCHAR(20) NOT NULL,
  `Departamento` INT(11) NOT NULL,
  PRIMARY KEY (`CodEmple`),
  KEY `Departamento` (`Departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Tabla usuarios
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Codigo` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(20) NOT NULL,
  `Clave` VARCHAR(20) NOT NULL,
  `Rol` INT(11) NOT NULL,
  PRIMARY KEY (`Codigo`),
  UNIQUE KEY `Nombre` (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `usuarios` MODIFY `Clave` VARCHAR(255) NOT NULL;
-- --------------------------------------------------------
-- Insertar departamentos de manera segura
-- --------------------------------------------------------
INSERT INTO `departamentos` (`CodDept`, `Nombre`, `Jefe`, `Presupuesto`, `Ciudad`)
SELECT 3, 'Ventas', NULL, 1004, 'Sevilla' FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM departamentos WHERE CodDept=3);
INSERT INTO `departamentos` (`CodDept`, `Nombre`, `Jefe`, `Presupuesto`, `Ciudad`)
SELECT 4, 'Gerencia', NULL, 2000, 'Lugo' FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM departamentos WHERE CodDept=4);

-- --------------------------------------------------------
-- Insertar empleados de manera segura
-- --------------------------------------------------------
INSERT INTO `empleados` (`CodEmple`, `Nombre`, `Apellido1`, `Apellido2`, `Departamento`)
SELECT 1, 'Ana', 'Fuentes', 'Teruel', 3 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=1);
INSERT INTO `empleados` (`CodEmple`, `Nombre`, `Apellido1`, `Apellido2`, `Departamento`)
SELECT 2, 'Luis', 'Marea', 'Motos', 3 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=2);
INSERT INTO `empleados` (`CodEmple`, `Nombre`, `Apellido1`, `Apellido2`, `Departamento`)
SELECT 4, 'Antonio', 'Hoz', 'Perales', 4 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=4);
INSERT INTO `empleados` (`CodEmple`, `Nombre`, `Apellido1`, `Apellido2`, `Departamento`)
SELECT 5, 'Eloisa', 'Puertas', 'Torres', 4 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM empleados WHERE CodEmple=5);

-- --------------------------------------------------------
-- Actualizar jefe de departamentos solo si es NULL
-- --------------------------------------------------------
UPDATE `departamentos` SET `Jefe`=1 WHERE `CodDept`=3 AND (`Jefe` IS NULL OR `Jefe`<>1);
UPDATE `departamentos` SET `Jefe`=4 WHERE `CodDept`=4 AND (`Jefe` IS NULL OR `Jefe`<>4);

-- --------------------------------------------------------
-- Insertar usuarios de manera segura
-- --------------------------------------------------------
INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`)
SELECT 1, 'ana', '1234', 1 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=1);
INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`)
SELECT 3, 'paco', '1234', 0 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=3);
INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`)
SELECT 4, 'Pedro', '33333', 0 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=4);
INSERT INTO `usuarios` (`Codigo`, `Nombre`, `Clave`, `Rol`)
SELECT 20, 'Luisa', '2222', 0 FROM DUAL WHERE NOT EXISTS (SELECT 1 FROM usuarios WHERE Codigo=20);


-- 2B) Crear FK sólo si no existen (ejecutable varias veces)
-- 1) departamentos_ibfk_1
SET @schema = DATABASE();
SELECT COUNT(*) INTO @cnt FROM information_schema.TABLE_CONSTRAINTS
 WHERE CONSTRAINT_SCHEMA = @schema AND TABLE_NAME = 'departamentos' AND CONSTRAINT_NAME = 'departamentos_ibfk_1' AND CONSTRAINT_TYPE='FOREIGN KEY';

SET @sql = IF(@cnt = 0,
  'ALTER TABLE `departamentos` ADD CONSTRAINT `departamentos_ibfk_1` FOREIGN KEY (`Jefe`) REFERENCES `empleados`(`CodEmple`) ON DELETE SET NULL ON UPDATE CASCADE',
  'SELECT 1');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- 2) empleados_ibfk_1
SELECT COUNT(*) INTO @cnt FROM information_schema.TABLE_CONSTRAINTS
 WHERE CONSTRAINT_SCHEMA = @schema AND TABLE_NAME = 'empleados' AND CONSTRAINT_NAME = 'empleados_ibfk_1' AND CONSTRAINT_TYPE='FOREIGN KEY';

SET @sql = IF(@cnt = 0,
  'ALTER TABLE `empleados` ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`Departamento`) REFERENCES `departamentos`(`CodDept`) ON DELETE CASCADE ON UPDATE CASCADE',
  'SELECT 1');

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;