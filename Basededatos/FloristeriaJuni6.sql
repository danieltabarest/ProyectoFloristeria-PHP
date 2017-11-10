-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.41


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema dbfloristeria
--

CREATE DATABASE IF NOT EXISTS dbfloristeria;
USE dbfloristeria;

--
-- Definition of table `catalogo`
--

DROP TABLE IF EXISTS `catalogo`;
CREATE TABLE `catalogo` (
  `Referencia` int(11) NOT NULL,
  `Imagen` varchar(60) NOT NULL,
  `Tipo` varchar(30) NOT NULL,
  `Precio` double NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`Referencia`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalogo`
--

/*!40000 ALTER TABLE `catalogo` DISABLE KEYS */;
INSERT INTO `catalogo` (`Referencia`,`Imagen`,`Tipo`,`Precio`,`Nombre`,`Descripcion`) VALUES 
 (12331231,'images/ramos/4.jpg','ramos',89000,'Ramo 4','para los enamorados'),
 (32333576,'images/ramos/5.jpg','ramos',67900,'Ramo 5','Todo pensando en brindar un mejor servicio'),
 (68766,'images/ramos/8.jpg','ramos',12312,'Ramo 8','Otro producto'),
 (982278321,'images/ramos/2.jpg','ramos',120000,'Ramo 2','Nuevo Producto'),
 (1234989,'images/ramos/1.jpg','camisetas',901234,'producto todos','nuevo4'),
 (1242211,'images/ramos/11.jpg','ramos',120000,'Arreglo 1','Ramo sencillo..Con Arreglos decorativos'),
 (123312312,'images/ramos/7.jpg','ramos',120000,'Ramo 7','Nuevo producto especial .. ');
/*!40000 ALTER TABLE `catalogo` ENABLE KEYS */;


--
-- Definition of table `tblproductos`
--

DROP TABLE IF EXISTS `tblproductos`;
CREATE TABLE `tblproductos` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreProduc` char(100) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IdTipoProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproductos`
--

/*!40000 ALTER TABLE `tblproductos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblproductos` ENABLE KEYS */;


--
-- Definition of table `tblreserva`
--

DROP TABLE IF EXISTS `tblreserva`;
CREATE TABLE `tblreserva` (
  `IdReserva` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(5) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado` char(2) DEFAULT '1',
  PRIMARY KEY (`IdReserva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreserva`
--

/*!40000 ALTER TABLE `tblreserva` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblreserva` ENABLE KEYS */;


--
-- Definition of trigger `triInsertarVenta`
--

DROP TRIGGER /*!50030 IF EXISTS */ `triInsertarVenta`;

DELIMITER $$

CREATE DEFINER = `root`@`localhost` TRIGGER `triInsertarVenta` AFTER UPDATE ON `tblreserva` FOR EACH ROW begin
insert  INTO tblventa VALUES (NULL,NEW.idUsuario,NEW.idProducto,NEW.precio,null);
END $$

DELIMITER ;

--
-- Definition of table `tbltipoproductos`
--

DROP TABLE IF EXISTS `tbltipoproductos`;
CREATE TABLE `tbltipoproductos` (
  `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `TipoProducto` char(50) NOT NULL,
  PRIMARY KEY (`IdTipoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltipoproductos`
--

/*!40000 ALTER TABLE `tbltipoproductos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbltipoproductos` ENABLE KEYS */;


--
-- Definition of table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
CREATE TABLE `tblusuarios` (
  `idUsuario` int(5) NOT NULL AUTO_INCREMENT,
  `nick` char(20) NOT NULL,
  `pass` char(32) NOT NULL,
  `mail` char(40) NOT NULL,
  `telefono` char(32) NOT NULL,
  `zona` char(30) NOT NULL,
  `genero` char(10) NOT NULL,
  `ip` char(15) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `nick` (`nick`,`pass`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusuarios`
--

/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` (`idUsuario`,`nick`,`pass`,`mail`,`telefono`,`zona`,`genero`,`ip`) VALUES 
 (1,'victor','12345','memo@pepito.com','21111111','Manrique','Men','190.146.245.55'),
 (2,'Andres','1f32aa4c9a1d2ea010adcf2348166a04','valzkat123@gmail.com','2111212','Manrique','Men','127.0.0.1'),
 (3,'Camilo','8a99dfad21d28e71cba093ddc9d69368','geronimo@gmail.com','2111212','Manrique','Men','127.0.0.1'),
 (4,'valzkat','1f32aa4c9a1d2ea010adcf2348166a04','valzkat123@gmail.com','2111212','Manrique','Men','127.0.0.1');
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;


--
-- Definition of table `tblventa`
--

DROP TABLE IF EXISTS `tblventa`;
CREATE TABLE `tblventa` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(5) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IdVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblventa`
--

/*!40000 ALTER TABLE `tblventa` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblventa` ENABLE KEYS */;


--
-- Definition of procedure `SPConsultaReserva`
--

DROP PROCEDURE IF EXISTS `SPConsultaReserva`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPConsultaReserva`()
BEGIN
select IdReserva,idUsuario ,idProducto ,Precio ,Fecha,Estado from tblreserva;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `SPEliminaReserva`
--

DROP PROCEDURE IF EXISTS `SPEliminaReserva`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPEliminaReserva`(in idreserva int)
BEGIN
delete from tblreserva where tblreserva.IdReserva=idreserva;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `SPIngresarReserva`
--

DROP PROCEDURE IF EXISTS `SPIngresarReserva`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIngresarReserva`(in iduser int(5),in idproduct int,in precio int)
BEGIN
insert into tblreserva values(null,iduser,idproduct,precio,null,"1");
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `SPIngresarUser`
--

DROP PROCEDURE IF EXISTS `SPIngresarUser`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPIngresarUser`(in    nick    char(20),in    pass  char(32) , in   mail    char(40),    
   in telefono  char(32) , in  zona char(30),    
   in genero char(10),
   in ip  char(15))
BEGIN
insert into tblusuarios  values(null,nick,pass,mail , telefono, zona,genero,ip);
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `SPModificaEstadoReserva`
--

DROP PROCEDURE IF EXISTS `SPModificaEstadoReserva`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPModificaEstadoReserva`(in idreserva int)
BEGIN
update tblreserva set Estado = "2"
where IdReserva = idreserva;
END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;

--
-- Definition of procedure `SPValidaExistencia`
--

DROP PROCEDURE IF EXISTS `SPValidaExistencia`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPValidaExistencia`(in idUser int)
BEGIN
select COUNT(*) from  tblusuarios
where tblusuarios.idUsuario=idUser;
end $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
