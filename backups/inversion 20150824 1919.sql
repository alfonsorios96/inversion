-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.21


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema inversion
--

CREATE DATABASE IF NOT EXISTS inversion;
USE inversion;

--
-- Definition of table `asesor`
--

DROP TABLE IF EXISTS `asesor`;
CREATE TABLE `asesor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuario_id`,`sede_id`),
  KEY `fk_asesor_usuario1_idx` (`usuario_id`),
  KEY `fk_asesor_sede1_idx` (`sede_id`),
  CONSTRAINT `fk_asesor_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asesor_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `asesor`
--

/*!40000 ALTER TABLE `asesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `asesor` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domicilio` text NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `contacto` text,
  `curp` varchar(45) DEFAULT NULL,
  `nss` varchar(45) DEFAULT NULL,
  `civil` varchar(45) DEFAULT NULL,
  `notas` text,
  `usuario_id` int(11) NOT NULL,
  `estado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`usuario_id`),
  KEY `fk_cliente_usuario1_idx` (`usuario_id`),
  KEY `fk_cliente_estado1_idx` (`estado_id`),
  CONSTRAINT `fk_cliente_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`,`estado`) VALUES 
 (1,'Aguascalientes'),
 (2,'Baja California'),
 (3,'Baja California Sur'),
 (4,'Campeche'),
 (5,'Coahuila'),
 (6,'Colima'),
 (7,'Chiapas'),
 (8,'Chihuahua'),
 (9,'Distrito Federal'),
 (10,'Durango'),
 (11,'Guanajuato'),
 (12,'Guerrero'),
 (13,'Hidalgo'),
 (14,'Jalisco'),
 (15,'México'),
 (16,'Michoacán'),
 (17,'Morelos'),
 (18,'Nayarit'),
 (19,'Nuevo León'),
 (20,'Oaxaca'),
 (21,'Puebla'),
 (22,'Querétaro'),
 (23,'Quintana Roo'),
 (24,'San Luis Potosí'),
 (25,'Sinaloa'),
 (26,'Sonora'),
 (27,'Tabasco'),
 (28,'Tamaulipas'),
 (29,'Tlaxcala'),
 (30,'Veracruz'),
 (31,'Yucatán'),
 (32,'Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


--
-- Definition of table `inmueble`
--

DROP TABLE IF EXISTS `inmueble`;
CREATE TABLE `inmueble` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` text NOT NULL,
  `calle` text NOT NULL,
  `nExt` varchar(45) NOT NULL,
  `nInt` varchar(45) DEFAULT NULL,
  `cp` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) NOT NULL,
  `rec` int(11) NOT NULL,
  `recDetalle` text,
  `ban` int(11) NOT NULL,
  `banDetalle` text,
  `detalle` text NOT NULL,
  `construido` varchar(45) DEFAULT NULL,
  `Stotal` varchar(45) DEFAULT NULL,
  `costoM2` varchar(45) DEFAULT NULL,
  `Ctotal` varchar(45) DEFAULT NULL,
  `instPago` varchar(45) DEFAULT NULL,
  `propia` int(11) NOT NULL,
  `adeudo` text,
  `fContrato` date DEFAULT NULL,
  `fVigencia` date DEFAULT NULL,
  `nCredito` varchar(45) DEFAULT NULL,
  `deseado` varchar(45) NOT NULL,
  `comision` varchar(45) DEFAULT NULL,
  `expediente` varchar(45) DEFAULT NULL,
  `num` varchar(45) DEFAULT NULL,
  `operacion_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`,`operacion_id`,`tipo_id`,`cliente_id`),
  KEY `fk_inmueble_operacion1_idx` (`operacion_id`),
  KEY `fk_inmueble_tipo1_idx` (`tipo_id`),
  KEY `fk_inmueble_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_inmueble_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inmueble_operacion1` FOREIGN KEY (`operacion_id`) REFERENCES `operacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_inmueble_tipo1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmueble`
--

/*!40000 ALTER TABLE `inmueble` DISABLE KEYS */;
/*!40000 ALTER TABLE `inmueble` ENABLE KEYS */;


--
-- Definition of table `operacion`
--

DROP TABLE IF EXISTS `operacion`;
CREATE TABLE `operacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operacion`
--

/*!40000 ALTER TABLE `operacion` DISABLE KEYS */;
INSERT INTO `operacion` (`id`,`operacion`) VALUES 
 (1,'Venta'),
 (2,'Renta');
/*!40000 ALTER TABLE `operacion` ENABLE KEYS */;


--
-- Definition of table `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id`,`rol`) VALUES 
 (1,'Administrador'),
 (2,'Cliente'),
 (3,'Asesor');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;


--
-- Definition of table `sede`
--

DROP TABLE IF EXISTS `sede`;
CREATE TABLE `sede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sede` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sede`
--

/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` (`id`,`sede`,`direccion`,`telefono`) VALUES 
 (1,'ITC Ixtapaluca, Ayotla','Cerrada Cuauhtémoc 24, Ayotla, Ixtapaluca, Estado de México','59 428 769');
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;


--
-- Definition of table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo`
--

/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` (`id`,`tipo`) VALUES 
 (1,'Casa'),
 (2,'Departamento'),
 (3,'Oficina'),
 (4,'Terreno'),
 (5,'Otro');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL,
  `nombre` text NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`,`correo`,`nombre`,`clave`,`estatus`) VALUES 
 (1,'admin@inversion.mx','Administrador','e10adc3949ba59abbe56e057f20f883e',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of table `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE `usuario_rol` (
  `usuario_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`usuario_id`,`rol_id`),
  KEY `fk_usuario_rol_usuario1_idx` (`usuario_id`),
  KEY `fk_usuario_rol_rol` (`rol_id`),
  CONSTRAINT `fk_usuario_rol_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_rol_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario_rol`
--

/*!40000 ALTER TABLE `usuario_rol` DISABLE KEYS */;
INSERT INTO `usuario_rol` (`usuario_id`,`rol_id`) VALUES 
 (1,1);
/*!40000 ALTER TABLE `usuario_rol` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
