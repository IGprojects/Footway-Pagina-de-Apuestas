-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2021 a las 12:02:59
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `travessa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aposta`
--

CREATE TABLE `aposta` (
  `id_aposta` int(11) NOT NULL,
  `id_partit` int(11) NOT NULL,
  `id_usuari` int(11) NOT NULL,
  `golsVisitant` int(2) NOT NULL,
  `golsLocal` int(2) NOT NULL,
  `dinerApostat` int(10) NOT NULL,
  `estat` int(11) NOT NULL DEFAULT 0,
  `benefici` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aposta`
--

INSERT INTO `aposta` (`id_aposta`, `id_partit`, `id_usuari`, `golsVisitant`, `golsLocal`, `dinerApostat`, `estat`, `benefici`) VALUES
(19, 9, 1, 1, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equip`
--

CREATE TABLE `equip` (
  `id_equip` int(11) NOT NULL,
  `nom_equip` varchar(100) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `comunitat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equip`
--

INSERT INTO `equip` (`id_equip`, `nom_equip`, `pais`, `comunitat`) VALUES
(1, 'Vetis', 'España', 'Europa'),
(2, 'Barsa', 'España', 'Europa'),
(3, 'Madrid', 'España', 'Europa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id_jornada` int(11) NOT NULL,
  `dataInici` date NOT NULL,
  `dataFi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_jornada`, `dataInici`, `dataFi`) VALUES
(1, '2000-07-19', '2021-05-11'),
(2, '2021-04-30', '2021-04-30'),
(3, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `id_equip` int(11) NOT NULL,
  `nom_jugador` varchar(100) NOT NULL,
  `data_naix` date NOT NULL,
  `dorsal` int(2) NOT NULL,
  `nacionalitat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `id_equip`, `nom_jugador`, `data_naix`, `dorsal`, `nacionalitat`) VALUES
(1, 1, 'Messi', '2020-04-07', 2, 'Argentina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partit`
--

CREATE TABLE `partit` (
  `id_partit` int(11) NOT NULL,
  `id_equipVisitant` int(11) NOT NULL,
  `id_equipLocal` int(11) NOT NULL,
  `id_jornada` int(11) NOT NULL,
  `estadi` varchar(100) NOT NULL,
  `res_local` int(11) NOT NULL DEFAULT -1,
  `res_vis` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partit`
--

INSERT INTO `partit` (`id_partit`, `id_equipVisitant`, `id_equipLocal`, `id_jornada`, `estadi`, `res_local`, `res_vis`) VALUES
(7, 1, 2, 2, 'wefe', -1, -1),
(8, 1, 3, 2, 'wefe', -1, -1),
(9, 2, 1, 1, 'wefe', 1, 1);

--
-- Disparadores `partit`
--
DELIMITER $$
CREATE TRIGGER `a` AFTER UPDATE ON `partit` FOR EACH ROW BEGIN 



 UPDATE aposta SET estat=1,benefici=dinerApostat*2 WHERE id_partit = old.id_partit AND aposta.golsVisitant = new.res_vis AND aposta.golsLocal = new.res_local;
 
 UPDATE aposta SET estat = 2,benefici=0 WHERE id_partit = old.id_partit AND aposta.golsVisitant != new.res_vis AND aposta.golsLocal != new.res_local;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE `usuari` (
  `id_usuari` int(11) NOT NULL,
  `nom_usuari` varchar(100) NOT NULL,
  `data_naix` date NOT NULL,
  `mail` varchar(100) NOT NULL,
  `contrassenya` varchar(100) NOT NULL,
  `Wallet` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`id_usuari`, `nom_usuari`, `data_naix`, `mail`, `contrassenya`, `Wallet`) VALUES
(1, 'Pepe', '2000-05-11', 'pepe@gmail.com', '123', 10),
(2, 'Ignasi', '2002-11-11', 'admin@gmail.com', '$2y$10$Fu5LGGXf3a4V.eq8vf/Ls.FoTdLbjDSCvLqauduh0Z80zuNeFv6X6', 10),
(3, 'ignasi', '2002-11-11', 'user@gmail.com', '$2y$10$BsnjtZbenlpx9JBAz6Zxd.VFs874H0KW7NZ81S6dTcin9IXt0Ybva', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aposta`
--
ALTER TABLE `aposta`
  ADD PRIMARY KEY (`id_aposta`),
  ADD UNIQUE KEY `id_partit` (`id_partit`,`id_usuari`),
  ADD KEY `fk_usuari` (`id_usuari`);

--
-- Indices de la tabla `equip`
--
ALTER TABLE `equip`
  ADD PRIMARY KEY (`id_equip`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id_jornada`) USING BTREE;

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`,`id_equip`);

--
-- Indices de la tabla `partit`
--
ALTER TABLE `partit`
  ADD PRIMARY KEY (`id_partit`,`id_jornada`),
  ADD KEY `fk_equipl` (`id_equipLocal`),
  ADD KEY `fk_equipv` (`id_equipVisitant`);

--
-- Indices de la tabla `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`id_usuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aposta`
--
ALTER TABLE `aposta`
  MODIFY `id_aposta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `equip`
--
ALTER TABLE `equip`
  MODIFY `id_equip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `id_jornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `partit`
--
ALTER TABLE `partit`
  MODIFY `id_partit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuari`
--
ALTER TABLE `usuari`
  MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aposta`
--
ALTER TABLE `aposta`
  ADD CONSTRAINT `fk_partit` FOREIGN KEY (`id_partit`) REFERENCES `partit` (`id_partit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuari` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id_usuari`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `partit`
--
ALTER TABLE `partit`
  ADD CONSTRAINT `fk_equipl` FOREIGN KEY (`id_equipLocal`) REFERENCES `equip` (`id_equip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipv` FOREIGN KEY (`id_equipVisitant`) REFERENCES `equip` (`id_equip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
