-- Adminer 5.4.1 MySQL 8.4.3 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;

DROP DATABASE IF EXISTS `usuario`;
CREATE DATABASE `usuario` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `usuario`;

DROP TABLE IF EXISTS `administradores`;
CREATE TABLE `administradores` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `apellidos` varchar(80) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `contrasena` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `token` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `fechafintoken` bigint DEFAULT NULL,
  `rol` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `apellidos` varchar(80) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `contrasena` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `nick` varchar(15) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `terminos` binary(1) NOT NULL DEFAULT '0',
  `fechanacimiento` bigint NOT NULL,
  `fechaalta` bigint NOT NULL,
  `baneado` binary(1) NOT NULL DEFAULT '0',
  `fechafinban` bigint DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `fechafintoken` bigint DEFAULT NULL,
  `numerointentosfallidos` tinyint DEFAULT NULL,
  `fechafinbloqueologin` bigint DEFAULT NULL,
  `fechabaja` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;


-- 2026-01-09 12:14:52 UTC
