-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2017 a las 13:55:15
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lahuerta`
--
CREATE DATABASE IF NOT EXISTS `lahuerta` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lahuerta`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `nombrecategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `nombrecategoria`) VALUES
(1, 'Carnes'),
(5, 'Mariscos'),
(4, 'Pescados'),
(2, 'Vinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `idmenu` int(11) NOT NULL,
  `nombremenu` varchar(80) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

DROP TABLE IF EXISTS `platos`;
CREATE TABLE `platos` (
  `idplato` int(11) NOT NULL,
  `nombreplato` varchar(200) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`idplato`, `nombreplato`, `precio`) VALUES
(3, 'Jamón de Teruel & Queso Manchego', 35),
(4, 'Mejillones Roca Sant Carles al Vapor', 15),
(5, 'Ensalada de la Huerta', 12),
(6, 'Dorada del Mediterráneo', 22),
(7, 'Pollo de Corral Relleno a la Catalana', 16),
(8, 'Brownie con Frambuesas', 9),
(9, 'Tabla de Ibéricos', 22),
(10, 'Canelones la Huerta', 11),
(11, 'Lubina del Mediterráneo', 22),
(12, 'Solomillo de Ternera', 28),
(13, 'Mejillones Roca', 9),
(14, 'Canelones de Bogavante', 13),
(15, 'Ensalada Cítrica', 9),
(16, 'Salmón Salvaje Rojo Alaska', 26),
(17, 'Solomillo de Buey', 29),
(18, 'Profiteroles de Nata con chocolate caliente', 8),
(19, 'Buey de Mar', 8),
(20, 'Solomillo de Ternera Girona Plancha', 27),
(21, 'Mil Hojas de Nata y Fresas', 9),
(22, 'Tabla de Quesos Premier', 19),
(23, 'Mi Cuit con Confitura de Rosas', 9),
(24, 'Rape Negro al Romero', 24),
(25, 'Pularda Bresse a la Catalana', 24),
(26, 'Rosco de Nata con Fresas', 9),
(27, 'Cigalitas de Playa', 18),
(28, 'Volován de Marisco', 19),
(29, 'Escórpora de la Costa Brava', 27),
(30, 'Canapés de Salmón Alaska ahumado', 16),
(31, 'Gambitas saladas  de la Costa Brava', 12),
(36, 'Vieiras con Jamón Ibérico', 14),
(37, 'Erizos Gratinados', 13),
(38, 'Bogavante Gallego Plancha', 32),
(39, 'Chuletón Vaca Vieja País Vasco', 39),
(40, 'Percebes', 29),
(41, 'Berberechos', 22),
(42, 'Almejas', 27),
(43, 'Nécora de la Ría', 19),
(44, 'Rodaballo Salvaje al Romero', 34),
(45, 'Morcilla de Burgos', 8),
(46, 'acelgas con judías', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL,
  `nombreproducto` varchar(200) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `rutaimagen` varchar(100) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombreproducto`, `descripcion`, `precio`, `rutaimagen`, `idcategoria`) VALUES
(1, 'Chuletones de Vacuno Mayor', 'El chuletón de vacuno mayor (antes buey) está considerado uno de los grandes productos gourmet de la carne, por ello estas piezas son seleccionadas de los mejores lomos madurados en cámaras especiales', '86.60', '4-chuletones-buey-gallego.jpg', 1),
(7, 'Chuletón de Vacuno Mayor con palo de 1ª calidad', 'Chuletón de Vacuno Mayor con palo de 1ª calidad, producto porcionado, envasado al vacío con un chuletón por bandeja con un peso aproximado de 1kg. ', '21.45', 'chuleton_buey.jpg', 1),
(8, 'Chuleton de Wagyu (El Kobe nacional) ', 'El Wagyu es un buey de raza japonesa que empezó a comercializarse en el puerto de KOBE (Japón), por eso es tan conocido como \"EL KOBE\". La carne se caracteriza por su gran terneza y un sabor diferente a los demás chuletones. Una curiosidad es que en su alimentación le añaden vino, cerveza, está cont', '70.18', 'chuleton_wagyu.JPG', 1),
(10, 'Entrecot de Vaca Gallega 1,5 Kg', 'Paquete de Entrecots de Vaca Gallega de 1,5 Kg., compuesto por 6 entrecots de aproximadamente 250 grs cada uno. Este producto se presenta envasado al vacío y debe estar conservado de 2-4 grados centígrados siendo su caducidad en fresco de 20 días', '59.40', 'entrecot-de-vaca-gallega-250-gr.jpg', 1),
(11, 'Lomo bajo de Vaca Gallega sin hueso 4 Kg', 'Este producto se presenta envasado al vacío y debe estar conservado de 2-4 grados centígrados siendo su caducidad en fresco de 20 días. Siempre se podrá prolongar su conservación congelándolo, ya que no se verá alterado ni su sabor ni su textura', '136.40', 'lomo-bajo-de-vaca-gallega-sin-hueso-4-kg.jpg', 1),
(12, 'Gamba Blanca de Huelva Pequeña G5 ', 'Ideal para iniciarse y conocer el sabor de la gamba de Huelva. Es nuestra versión más sencilla y popular de la auténtica Gamba Blanca de Huelva. Tiene todo el sabor y cualidades de las de mayor tamaño, pero es mas pequeña. Ideal para ser consumida cocida o como ingrediente estrella en platos mariner', '21.00', 'gambla_blanca_huelva_pequena.jpg', 5),
(13, 'Gamba Blanca de Huelva Mediana G4 ', 'Ideal para tapear junto a una copa de manzanilla o vino blanco Chardonnay.Auténtica Gambas Blancas de Huelva, capturadas artesanalmente en la Costa de Huelva, presentadas en cajas de 1 kg: encontrarás aproximadamente unas 80/100 piezas. Es el calibre que llamamos G4 y es perfecta para que la uses co', '30.00', 'gambla_blanca_huelva_mediana.jpg', 5),
(14, 'Gambas Blancas de Huelva Gorda G3 ', 'Perfecta para cocer y presentar en celebraciones, te haran quedar como un exquisito anfitrión. Auténtica Gambas Blancas de Huelva, capturadas artesanalmente en la Costa de Huelva, presentadas en cajas de 1 kg: encontrarás aproximadamente unas 70/80 piezas. Es el calibre que llamamos G3 y es perfecta', '45.00', 'gambla_blanca_huelva_gorda.jpg', 5),
(15, 'Gamba blanca de Huelva Extra G2', 'Ideal para empezar a disfrutar de la plancha. Auténtica gamba blanca de Huelva, capturada artesanalmente en la Costa de Huelva, presentada en cajas de 1 kg, en el que por su calibre entran aproximadamente unas 60/70 piezas y que llamamos G2. Por su tamaño, es ideal para consumir tanto cocida como a ', '69.00', 'gambla_blanca_huelva_extra.jpg', 5),
(16, 'Gamba Blanca de Huelva Tronco G1', 'Magnífica gamba blanca fresca de la Costa de Huelva, capturada artesanalmente por los pescadores del litoral onubense siguiendo las labores de pesca artesanal. De un tamaño extraordinario, contiene unas 50/60 piezas por kilo. Es un producto muy especial que no dejará indiferente a quien la pruebe. ', '108.00', 'gambla_blanca_huelva_extra_2.jpg', 5),
(17, 'Gamba Blanca de Huelva Especial G0', 'La mayor de las gambas, indicada para ocasiones muy especiales. Capturada artesanalmente por los pescadores del litoral onubense siguiendo las labores de pesca artesanal. De un tamaño extraordinario, contiene unas 40/50 piezas por kilo y la llamamos G0. Es un producto muy especial que no dejará indiferente a quien la pruebe. Es \"una señora gamba\": es \"la\" gamba.', '145.00', 'gambla_blanca_huelva_especial.jpg', 5),
(18, 'Lubina Salvaje', 'La lubina salvaje es un pescado de bajura, capturado normalmente con anzuelo o cerco. Nuestras lubinas salen de las pequeñas lonjas de las Rías Baixas y llegarán a su domicilio frescas y en óptimas condiciones.', '23.70', 'lubina-salvaje-mediterraneo-2-3-kg-entera-eviscerada.jpg', 4),
(19, 'Vega Sicilia', 'Vino tinto Vega Sicilia Único 2007 Ribera del Duero Magnum', '695.00', 'vega_sicilia_2007.jpg', 2),
(20, 'Château Cheval Blanc', 'Vino tinto Château Cheval Blanc 2008 Saint-Emilion Grand Cru Classé Burdeos', '625.00', 'chateau.jpg', 2),
(21, 'Pago de Carraovejas', 'Vino tinto Pago de Carraovejas Crianza Ribera del Duero', '28.35', 'pago_carroviejas.jpg', 2),
(22, 'Almeja fina', 'La almeja fina es la variedad más cotizada en las Rías Bajas. Al igual que otro tipo de almejas, la almeja fina puede ser preparada de innumerables maneras si bien se trata de la variedad más recomendable para tomar en crudo.', '48.70', 'alemja_carril.jpg', 5),
(23, 'Buey de mar', 'El buey de mar es un marisco que destaca por su tersa y sabrosa carne y por sus bocados variados. Se trata de unos de los mariscos de las lonjas gallegas con mejor relación calidad-precio. Por lo general siempre que las capturas lo pemitan enviaremos hembras, que contienen corales. Las capturas proceden del Atlántico noroeste manteniendo un gran nivel de calidad a lo largo de practicamente todos los meses del año. ', '10.45', 'buey.jpg', 5),
(24, 'Bogavante azul', 'El bogavante azul es un excelente crustáceo que nos ofrece innumerables formas de preparación, cocido y acompañado de una vinagreta, a la plancha, en arroz, en salpicón, etc.... A diferencia de su hermano el bogavante canadiense, el bogavante azul se es de mayor valor gastronómico debido a su fino sabor y a su textura.', '39.25', 'bogavante-azul.jpg', 5),
(25, 'Mejillón de Galicia 5Kg', 'Mejillón procedente de Lorbé y de las Rías Bajas gallegas.\nLas corrientes,  temperatura y riqueza de sus aguas le confieren características singulares.', '24.00', 'mejillon-de-galicia-5kg.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relmenuplato`
--

DROP TABLE IF EXISTS `relmenuplato`;
CREATE TABLE `relmenuplato` (
  `idmenu` int(11) NOT NULL,
  `idplato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

DROP TABLE IF EXISTS `socios`;
CREATE TABLE `socios` (
  `idsocio` int(11) NOT NULL,
  `tratamiento` varchar(4) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `nacionalidad` varchar(20) NOT NULL,
  `tipodocumento` varchar(10) NOT NULL,
  `numerodocumento` char(9) NOT NULL,
  `nombreempresa` varchar(80) DEFAULT NULL,
  `domicilio` varchar(80) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `codigopostal` char(5) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono1` int(9) NOT NULL,
  `telefono2` char(9) DEFAULT NULL,
  `tipousuario` char(2) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `recomendado` varchar(120) NOT NULL,
  `fechasolicitud` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`idsocio`, `tratamiento`, `apellidos`, `nombre`, `fechanacimiento`, `nacionalidad`, `tipodocumento`, `numerodocumento`, `nombreempresa`, `domicilio`, `ciudad`, `codigopostal`, `pais`, `email`, `telefono1`, `telefono2`, `tipousuario`, `usuario`, `password`, `recomendado`, `fechasolicitud`) VALUES
(1, 'Sr.', 'Mendoza Fuentes', 'Jaime', '1981-07-07', 'Española', 'DNI', '12345678J', '', 'Calábria 36', 'Barcelona', '08023', 'España', 'admin@gmail.com', 698753258, '', 'AD', 'admin', '0c7540eb7e65b553ec1ba6b20de79608', 'Raúl Tamudo', '2017-06-04 17:05:17'),
(22, 'Sr', 'Peralta Vicente', 'Alejandro', '2017-05-02', 'Española', 'DNI', '123456789', 'SICE', 'C/Mossèn Batlle nº2 1º1º', 'Barcelona', '08024', 'España', 'alejandro@gmail.com', 666122133, '932139285', 'US', 'alejandro', '05cd7820039b0a7069861e10ee2b50b3', 'Mauro Jover', '2017-06-02 16:33:47'),
(23, 'Sra.', 'Rotger Miró', 'María del Mar', '1981-02-25', 'Española', 'DNI', '12345678L', '', 'Alaior 4', 'Ciutadella', '07760', 'España', 'maruchi@gmail.com', 123789456, '', 'US', 'maruchi', '461088f2e4ed2b6e7f58fe4e405fb6e2', 'María Guijarro', '2017-06-05 16:12:47'),
(29, 'Sr', 'Martínez Merchal', 'Andrés', '2017-05-04', 'Española', 'DNI', '46464658T', '', 'Asturias 36', 'Barcelona', '08025', 'España', 'andres@gmail.com', 852456951, '', 'US', 'andres', 'a235d535e6326d80f745d7e1e153fb6e', 'Fernando Alonso', '2017-06-07 16:28:17'),
(31, 'Sra.', 'Rambla', 'Sonia', '1985-05-13', 'Española', 'DNI', '85214789J', '', 'Ecuador 36', 'Barcelona', '08023', 'españa', 'sonia@gmail.com', 852963741, '', 'US', 'sonia', '3db7b9156995586b059deaeb605a778e', 'Veronica garcia', '2017-06-04 16:56:45'),
(33, 'Sr', 'Pérez Reverte', 'Arturo', '2017-06-02', 'Española', 'DNI', '85285236P', 'Alfaguara', 'Retiro nº23', 'Madrid', '08821', 'España', 'arturo@yahoo.com', 963963963, '', 'US', 'arturito', '244dc7e9b0e83f4f04725c98743fb8a5', 'Alejandro Dumas', '2017-06-05 09:55:25'),
(34, 'Sr', 'García Márquez', 'Gabriel', '2017-06-01', 'Colombiana', 'PASAPORTE', '123856', '', 'colombia nº56', 'Bogotá', '12345', 'Colombia', 'gabriel@hotmail.com', 456456465, '', 'US', 'gabriel', 'bf14360510f1f43c1521535dec08111e', 'Julio Verne', '2017-06-04 16:56:59'),
(36, 'Sr', 'Méndez Sánchez', 'Juan', '2017-06-01', 'Española', 'DNI', '1235874K', '', 'Sostres 25', 'Barcelona', '08022', 'España', 'mendez@gmail.com', 852456753, '', 'US', 'mendez', 'f97cf64124960e57569a9db922fbee12', 'Ricardo Muñoz', '2017-06-08 11:50:01'),
(40, 'Sr', 'Perales', 'José Luís', '2017-06-02', 'Española', 'DNI', '85245685T', '', 'preciados nº56', 'Madrid', '08820', 'España', 'perales@gmail.com', 852456873, '', 'US', 'perales', 'b724501b9e50e182a120b500fe48216b', 'Julio Iglesias', '2017-06-08 11:50:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_socios`
--

DROP TABLE IF EXISTS `solicitud_socios`;
CREATE TABLE `solicitud_socios` (
  `idsolicitud` int(11) NOT NULL,
  `tratamiento` varchar(4) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `nacionalidad` varchar(20) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `numero` char(9) NOT NULL,
  `nombreempresa` varchar(80) DEFAULT NULL,
  `domicilio` varchar(80) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `codigopostal` char(5) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono1` int(9) NOT NULL,
  `telefono2` varchar(9) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `recomendado` varchar(120) NOT NULL,
  `fechasolicitud` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud_socios`
--

INSERT INTO `solicitud_socios` (`idsolicitud`, `tratamiento`, `apellidos`, `nombre`, `fechanacimiento`, `nacionalidad`, `documento`, `numero`, `nombreempresa`, `domicilio`, `ciudad`, `codigopostal`, `pais`, `email`, `telefono1`, `telefono2`, `usuario`, `password`, `recomendado`, `fechasolicitud`) VALUES
(36, 'Sr', 'Morales Seco', 'Ángel', '1979-04-02', 'Español', 'DNI', '12345678J', '', 'Valencia nº78', 'Barcelona', '08026', 'España', 'morales@gmail.com', 852951753, '', 'morales', '8c0f51ffa178e4be588959092ab668c2', 'Raúl Tamudo', '2017-06-04 16:30:49'),
(38, 'Sra.', 'Calzone', 'Rita', '2017-06-01', 'Italiana', 'PASAPORTE', '85245674', '', 'Via sparza 36', 'Nápoles', '12545', 'Italia', 'rita@hotmail.com', 123852423, '', 'rita', '44f494df980718e39aed99ffc74d4bf6', 'Rafaela Carra', '2017-06-06 08:42:06'),
(40, 'Sr', 'Walker', 'Johnnie', '2017-06-03', 'Escocia', 'DNI', '5214', '', 'street 39', 'Edimburgo', '2585', 'Escocia', 'walker@gmail.com', 85247536, '', 'walker', '1c20059216df104af5c7df34181dd867', 'JB', '2017-06-08 11:42:05');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`),
  ADD UNIQUE KEY `nombrecategoria` (`nombrecategoria`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`idmenu`),
  ADD UNIQUE KEY `nombremenu` (`nombremenu`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idplato`),
  ADD UNIQUE KEY `nombreplato` (`nombreplato`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`),
  ADD UNIQUE KEY `nombreproducto` (`nombreproducto`),
  ADD KEY `idcategoria` (`idcategoria`) USING BTREE;

--
-- Indices de la tabla `relmenuplato`
--
ALTER TABLE `relmenuplato`
  ADD KEY `FK_menu_relmenuplato` (`idmenu`),
  ADD KEY `FK_plato_relmenuplato` (`idplato`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`idsocio`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numerodocumento` (`numerodocumento`);

--
-- Indices de la tabla `solicitud_socios`
--
ALTER TABLE `solicitud_socios`
  ADD PRIMARY KEY (`idsolicitud`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idplato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `idsocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `solicitud_socios`
--
ALTER TABLE `solicitud_socios`
  MODIFY `idsolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `FK_categorias_productos` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);

--
-- Filtros para la tabla `relmenuplato`
--
ALTER TABLE `relmenuplato`
  ADD CONSTRAINT `FK_menu_relmenuplato` FOREIGN KEY (`idmenu`) REFERENCES `menus` (`idmenu`),
  ADD CONSTRAINT `FK_plato_relmenuplato` FOREIGN KEY (`idplato`) REFERENCES `platos` (`idplato`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
