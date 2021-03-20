/*
SQLyog Community
MySQL - 5.7.26 : Database - sistemas_proyecto
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `t00100_usuario` */

DROP TABLE IF EXISTS `t00100_usuario`;

CREATE TABLE `t00100_usuario` (
  `Co_Usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nb_Usuario` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tx_Email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Nu_Movil` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tx_Clave` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tx_Patron` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nu_Intentos` int(11) NOT NULL DEFAULT '0',
  `Fe_Recuperacion` datetime DEFAULT NULL,
  `St_Bloqueo` tinyint(1) DEFAULT '0',
  `St_Activo` tinyint(1) NOT NULL DEFAULT '1',
  `Co_Auditoria` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`Co_Usuario`),
  UNIQUE KEY `Uk_Usuario_Tx_Email` (`Tx_Email`),
  KEY `FK_Usuario_Auditoria` (`Co_Auditoria`),
  CONSTRAINT `FK_Usuario_Auditoria` FOREIGN KEY (`Co_Auditoria`) REFERENCES `t99999_auditoria` (`Co_Auditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `t00290_producto_categoria` */

DROP TABLE IF EXISTS `t00290_producto_categoria`;

CREATE TABLE `t00290_producto_categoria` (
  `Co_Poducto_Categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nb_Poducto_Categoria` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Co_Poducto_Categoria_Poducto_Categoria` int(11) DEFAULT NULL,
  `St_Activo` tinyint(1) NOT NULL DEFAULT '1',
  `Co_Auditoria` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`Co_Poducto_Categoria`),
  KEY `FK_PoductoCategoria_Auditoria` (`Co_Auditoria`),
  KEY `FK_PoductoCategoria_PoductoCategoria` (`Co_Poducto_Categoria_Poducto_Categoria`),
  CONSTRAINT `FK_PoductoCategoria_Auditoria` FOREIGN KEY (`Co_Auditoria`) REFERENCES `t99999_auditoria` (`Co_Auditoria`),
  CONSTRAINT `FK_PoductoCategoria_PoductoCategoria` FOREIGN KEY (`Co_Poducto_Categoria_Poducto_Categoria`) REFERENCES `t00290_producto_categoria` (`Co_Poducto_Categoria`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `t00300_producto` */

DROP TABLE IF EXISTS `t00300_producto`;

CREATE TABLE `t00300_producto` (
  `Co_Producto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nb_Producto` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `Co_Poducto_Categoria` int(11) NOT NULL,
  `St_Activo` tinyint(1) NOT NULL DEFAULT '1',
  `Co_Auditoria` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`Co_Producto`),
  KEY `FK_Producto_Auditoria` (`Co_Auditoria`),
  KEY `FK_Producto_PoductoCategoria` (`Co_Poducto_Categoria`),
  CONSTRAINT `FK_Producto_Auditoria` FOREIGN KEY (`Co_Auditoria`) REFERENCES `t99999_auditoria` (`Co_Auditoria`),
  CONSTRAINT `FK_Producto_PoductoCategoria` FOREIGN KEY (`Co_Poducto_Categoria`) REFERENCES `t00290_producto_categoria` (`Co_Poducto_Categoria`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `t99999_auditoria` */

DROP TABLE IF EXISTS `t99999_auditoria`;

CREATE TABLE `t99999_auditoria` (
  `Co_Auditoria` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nb_Tabla` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `Co_Fila` bigint(20) unsigned DEFAULT NULL,
  `Co_Tipo_Operacion` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Tx_Sentencia` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `Tx_Error` varchar(5000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Co_Auditoria_Auditoria` bigint(20) unsigned DEFAULT NULL,
  `Co_Usuario` bigint(20) unsigned NOT NULL,
  `Co_MAC` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Co_IP` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Fe_Ins` datetime NOT NULL,
  `St_Error` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Co_Auditoria`),
  KEY `FK_Auditoria_Auditoria` (`Co_Auditoria_Auditoria`),
  CONSTRAINT `FK_Auditoria_Auditoria` FOREIGN KEY (`Co_Auditoria_Auditoria`) REFERENCES `t99999_auditoria` (`Co_Auditoria`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `t99999_bitacora` */

DROP TABLE IF EXISTS `t99999_bitacora`;

CREATE TABLE `t99999_bitacora` (
  `Co_Bitacora` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Co_Bitacora_Previo` bigint(20) unsigned DEFAULT NULL,
  `Co_Usuario` bigint(20) unsigned NOT NULL,
  `Fe_Ins` datetime NOT NULL,
  PRIMARY KEY (`Co_Bitacora`),
  KEY `FK_Bitacora_Bitacora` (`Co_Bitacora_Previo`),
  KEY `FK_Bitacora_Usuario` (`Co_Usuario`),
  CONSTRAINT `FK_Bitacora_Bitacora` FOREIGN KEY (`Co_Bitacora_Previo`) REFERENCES `t99999_bitacora` (`Co_Bitacora`),
  CONSTRAINT `FK_Bitacora_Usuario` FOREIGN KEY (`Co_Usuario`) REFERENCES `t00100_usuario` (`Co_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
