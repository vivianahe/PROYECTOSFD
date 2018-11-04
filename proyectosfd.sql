-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2018 a las 00:40:19
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectosfd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `catNombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `catEstado` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `catNombre`, `catEstado`) VALUES
(1, 'Hamburguesas', 'Activo'),
(2, 'Perros calientes', 'Activo'),
(3, 'Sandwiches', 'Activo'),
(4, 'Arepas rellenas', 'Activo'),
(5, 'Bebidas', 'Activo'),
(56, 'Helados', 'Activo'),
(57, 'Foto', 'Activo'),
(58, 'ddffvfg', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `cliPersona` int(11) NOT NULL,
  `cliFechaRegistro` date NOT NULL,
  `cliEstado` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `cliPersona`, `cliFechaRegistro`, `cliEstado`) VALUES
(3, 19, '2018-09-19', 'Activo'),
(4, 21, '2018-09-19', 'Activo'),
(5, 42, '2018-09-21', 'Activo'),
(6, 44, '2018-09-21', 'Activo'),
(7, 46, '2018-09-21', 'Activo'),
(8, 48, '2018-09-21', 'Activo'),
(9, 49, '2018-09-21', 'Activo'),
(10, 50, '2018-09-21', 'Activo'),
(11, 51, '2018-09-21', 'Activo'),
(12, 52, '2018-09-21', 'Activo'),
(13, 53, '2018-09-21', 'Activo'),
(14, 54, '2018-09-21', 'Activo'),
(15, 56, '2018-09-21', 'Activo'),
(16, 57, '2018-09-23', 'Activo'),
(17, 58, '2018-09-23', 'Activo'),
(18, 59, '2018-09-23', 'Activo'),
(19, 60, '2018-09-29', 'Activo'),
(20, 61, '2018-09-30', 'Activo');

--
-- Disparadores `clientes`
--
DELIMITER $$
CREATE TRIGGER `estadisticaClientePedido` AFTER INSERT ON `clientes` FOR EACH ROW insert into clientespedidos values (null,NEW.idCliente,0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientespedidos`
--

CREATE TABLE `clientespedidos` (
  `idClientesPedidos` int(11) NOT NULL,
  `clipeCliente` int(15) NOT NULL,
  `clipeNumero` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientespedidos`
--

INSERT INTO `clientespedidos` (`idClientesPedidos`, `clipeCliente`, `clipeNumero`) VALUES
(6, 3, 0),
(7, 4, 0),
(8, 5, 0),
(9, 6, 0),
(10, 7, 0),
(11, 8, 0),
(12, 9, 0),
(13, 10, 0),
(14, 11, 0),
(15, 12, 0),
(16, 13, 0),
(17, 14, 0),
(18, 15, 0),
(19, 16, 0),
(20, 17, 0),
(21, 18, 0),
(22, 19, 0),
(23, 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `idDetallePedido` int(11) NOT NULL,
  `detPedido` int(11) NOT NULL,
  `detProducto` int(11) NOT NULL,
  `detCantidad` int(20) NOT NULL,
  `detValorTotal` int(20) NOT NULL,
  `detObservacion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleado` int(11) NOT NULL,
  `empCargo` enum('Administrador','Empleado') COLLATE utf8_spanish_ci NOT NULL,
  `empEstado` enum('Activo','Inactivo') COLLATE utf8_spanish_ci NOT NULL,
  `empPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleado`, `empCargo`, `empEstado`, `empPersona`) VALUES
(1, 'Administrador', 'Inactivo', 4),
(2, 'Empleado', 'Activo', 55),
(3, 'Administrador', 'Activo', 62),
(4, 'Empleado', 'Activo', 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `pedEstado` enum('En proceso','Entregado','Cancelado') COLLATE utf8_spanish_ci NOT NULL,
  `pedTipo` enum('Negocio','Domicilio') COLLATE utf8_spanish_ci NOT NULL,
  `pedFechaHora` datetime NOT NULL,
  `pedCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `idPersona` int(11) NOT NULL,
  `perIdentificacion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `perNombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `perApellido` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `perTelefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `perDireccion` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `perCorreo` varchar(40) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idPersona`, `perIdentificacion`, `perNombre`, `perApellido`, `perTelefono`, `perDireccion`, `perCorreo`) VALUES
(4, '23', 'Viviviana', 'Herrera', '3125220628', 'calle 11 #12-09', 'vivianahe@gmail.com'),
(19, '1081160915', 'Pilar', 'Prada Soro', '3214109829', 'Cra 13 B #2-17', 'pilarprada@gmail.com'),
(21, '11', 'Andrés', 'Perdomo', '3214454668', 'Los mandarines ', 'andresitoperdomito@gmail.com'),
(42, '1075544312', 'Samuel', 'Perdomo', '321457890', 'El tesoro', 'samuel@gmail.com'),
(44, '111', 'María', 'Salazar', '3112893800', 'Pinos', 'karenyulierr@gmail.com'),
(46, '12', 'Luisa', 'Tejada', '3145670222', 'El canadá', 'samussel@gmail.com'),
(48, '123', 'Santiago', 'Garzón', '3231112144', 'Los molinos', 'sdas@gmail.com'),
(49, '1234', 'Liseth', 'Puentes', '3212134445', 'Las orquídeas', 'asasas@d'),
(50, '1111', 'Simón', 'Arboledad', '3224456651', 'ddddd', 'asas@dd'),
(51, '22', 'Alexa', 'Mañosca', '3214032209', 'sasasa', 'sasa@dsasad'),
(52, '3', 'Diego', 'Morales', '3214679000', 'Los mangos', 'asasas'),
(53, '6687668', 'Felipe', 'Oviedo', '3213242345', 'dfsf', 'dfsssss@gj'),
(54, '897789897', 'Daniel', 'Ovalle Díaz', '1234567896', 'gghg', 'ghgg@gfh'),
(55, '0999', 'Lupe', 'Conde', '3211099882', 'calle 11# 34-09', 'lupe@gmail.com'),
(56, '1080189692', 'Orlan ', 'Rojas Vega', '3123407620', 'Calle 28 #35-24', 'orlandrojasvega@gmail.com'),
(57, '1071316482', 'Estefanía', 'Aviles Rosas', '3213455512', 'Ri­o fri­o', 'estafania@gmail.com'),
(58, '4932600', 'German', 'Herrera Vargas', '3214160029', 'Las orquídeas', 'germanhe@gmail.com'),
(59, '26559015', 'Oliva', 'Hernandez Lopez', '3044741599', 'Cra 12 b #2-18', 'oliva@gmail.com'),
(60, '33', 'Luis', 'Muñoz', '3124608797', 'La Ceiba ', 'luismunoz@gmail.com'),
(61, '101', 'Marleny ', 'Rodriguez ', '3214192883', 'Las orquideas', 'marlenyro@gmail.com'),
(62, '10829', 'Wilson', 'Gomez', '3214129938', 'Calle 5 a', 'wilson2@gmail.com'),
(63, '1077875058', 'Andres Felipe', 'Huelgos', '3102500329', 'El tesoro ', 'felipe@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `proCategoria` int(11) NOT NULL,
  `proNombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `proValor` int(50) NOT NULL,
  `proIngredientes` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `proCategoria`, `proNombre`, `proValor`, `proIngredientes`) VALUES
(1, 1, 'Hamburguesa de pollo', 9500, 'Pollo de la casa, Pan, Lechuga, Cebolla, Tomate, Queso, Papa a la francesa '),
(2, 1, 'Hamburguesa de tocineta', 12000, 'Carne de la casa, Pan, Lechuga, Cebolla, Tomate, Queso, Jamón, Papa a la francesa'),
(3, 1, 'Hamburguesa de pan', 9000, 'Carne de la casa, Pan horneado, Lechuga, Cebolla, Tomate, Queso, Papa a la francesa'),
(4, 1, 'Hamburguesa de doble carne', 13000, 'Carne de la casa, Pan, Lechuga, Cebolla, Tomate, Queso, Jamón, Papa a la francesa\r\n'),
(5, 1, 'Hamburguesa de arepa', 9000, 'Carne de la casa, Arepa, Lechuga, Cebolla, Tomate, Queso, Jamón, Papa a la francesa'),
(7, 1, 'Hamburguesa de platano', 9500, 'Carne de la casa, Patacón, Lechuga, Cebolla, Tomate, Queso, Papa a la francesa'),
(8, 2, 'Hot dog con salchicha americana', 7000, 'Pan, Queso, Papa ripio, Salchicha americana'),
(10, 2, 'Hot dog hawaiano', 7000, 'Pan, Queso, Piña, Jamón, Papa ripio, Salchicha americana'),
(11, 3, 'Sandwich cubano sencillo', 8500, 'Jamón, Queso, Tomate, Lechuga'),
(12, 3, 'Sandwich cubano especial', 12500, 'Pollo, Queso, Jamón, Tomate, Lechuga, Tocineta, Champiñon, Dos adicionales'),
(13, 3, 'Sandwich cubano Semi-Especial', 10000, 'Pollo, Queso, Jamón, Tomate, Lechuga, Tocineta, Champiñon, Un adicional'),
(14, 3, 'Sandwich cubano Super-Especial', 14500, 'Pollo, Queso, Jamón, Tomate, Lechuga, Tocineta, Champiñón, Tres adicionales'),
(15, 4, 'Arepa con jamón y queso', 3000, 'Queso, Arepa, Jamón, Tomate, Lechuga'),
(16, 4, 'Arepa con todo', 7000, 'Queso, Arepa, Piña, Frijol, Guacamole, Pollo desmechado, Carne desmechada'),
(17, 4, 'Arepa con queso', 3000, 'Queso, Arepa'),
(18, 5, 'Jugo hit Personal', 2000, 'Mango, Naranja piña, Mora, Tropical'),
(19, 5, 'Gaseosa familiar', 5000, 'Postobón, Coca cola'),
(20, 5, 'Gaseosa personal', 2000, 'Manzana, Coca cola, Pepsi, Colombiana, Cuatro'),
(21, 5, 'Botella de agua', 2000, 'Con gas, Sin gas'),
(22, 5, 'Cerveza', 3500, 'Ligth, Poker, Aguila, Club colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuUsuario` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `usuPassword` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `usuRol` enum('Empleado','Cliente','Administrador') COLLATE utf8_spanish_ci NOT NULL,
  `usuPersona` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuUsuario`, `usuPassword`, `usuRol`, `usuPersona`) VALUES
(1, '10', 'd3d9446802a44259755d38e6d163e820', 'Empleado', 4),
(3, '1081160915', '8d2a68a55375a16527a0f905ea3b782d', 'Cliente', 19),
(4, '11', '6512bd43d9caa6e02c990b0a82652dca', 'Cliente', 21),
(5, '1075544312', '5bd18b381cfb33ffde8fad3ffdd41d4d', 'Cliente', 42),
(6, '111', '698d51a19d8a121ce581499d7b701668', 'Cliente', 44),
(7, '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'Cliente', 46),
(8, '123', '202cb962ac59075b964b07152d234b70', 'Cliente', 48),
(9, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'Cliente', 49),
(10, '1111', 'b59c67bf196a4758191e42f76670ceba', 'Cliente', 50),
(11, '22', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Cliente', 51),
(12, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Cliente', 52),
(13, '6687668', '2258f113edf9e9c2a204b7dc455b276e', 'Cliente', 53),
(14, '897789897', '997582a71abc45663318155a6a5bf75c', 'Cliente', 54),
(15, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Administrador', 55),
(16, '1080189692', '0d690019b6f91a3b8f961acb4d495997', 'Cliente', 56),
(17, '1071316482', '550baa671e3f10c2fd6d8c4bd64c6c69', 'Cliente', 57),
(18, '4932600', '091d5889fb9c62c1c73310898878b715', 'Cliente', 58),
(19, '26559015', 'b8bf128339943a1cbe5013eee580c951', 'Cliente', 59),
(20, '33', '182be0c5cdcd5072bb1864cdee4d3d6e', 'Cliente', 60),
(21, '101', '38b3eff8baf56627478ec76a704e9b52', 'Cliente', 61),
(22, '10829', '2c45628967cbb49aba60cff3b368ed95', 'Empleado', 62),
(23, '1077875058', 'efcfc13e1557af5b2102bdc5f6a08933', 'Empleado', 63);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`),
  ADD UNIQUE KEY `catNombre` (`catNombre`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `cliPersona` (`cliPersona`);

--
-- Indices de la tabla `clientespedidos`
--
ALTER TABLE `clientespedidos`
  ADD PRIMARY KEY (`idClientesPedidos`),
  ADD KEY `clipeCliente` (`clipeCliente`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`idDetallePedido`),
  ADD KEY `detPedido` (`detPedido`),
  ADD KEY `detProducto` (`detProducto`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `empPersona` (`empPersona`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `pedPersona` (`pedCliente`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`idPersona`),
  ADD UNIQUE KEY `perCorreo` (`perCorreo`),
  ADD UNIQUE KEY `perIdentificacion` (`perIdentificacion`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD UNIQUE KEY `proNombre` (`proNombre`),
  ADD KEY `proCategoria` (`proCategoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuUsuario` (`usuUsuario`),
  ADD KEY `usuPersona` (`usuPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientespedidos`
--
ALTER TABLE `clientespedidos`
  MODIFY `idClientesPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `idDetallePedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`cliPersona`) REFERENCES `personas` (`idPersona`);

--
-- Filtros para la tabla `clientespedidos`
--
ALTER TABLE `clientespedidos`
  ADD CONSTRAINT `clientespedidos_ibfk_1` FOREIGN KEY (`clipeCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`detProducto`) REFERENCES `productos` (`idProducto`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`detPedido`) REFERENCES `pedidos` (`idPedido`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`empPersona`) REFERENCES `personas` (`idPersona`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`pedCliente`) REFERENCES `clientes` (`idCliente`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`proCategoria`) REFERENCES `categorias` (`idCategoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuPersona`) REFERENCES `personas` (`idPersona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
