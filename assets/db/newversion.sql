-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2023 a las 04:46:57
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `newversion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_selecciona_producto`
--

CREATE TABLE `cliente_selecciona_producto` (
  `cliente_selecciona_producto_id` int(11) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` float DEFAULT NULL,
  `estado_compra` set('Facturado','Cancelado','Seleccionado') DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `ultima_modificacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `factura_id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `monto_total` float DEFAULT NULL,
  `estado` set('Facturado','Cancelado') DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `inventario_id` int(11) NOT NULL,
  `bodega` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`inventario_id`, `bodega`) VALUES
(1, 'Restrepo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `metodo_pago_id` int(11) NOT NULL,
  `tipo_pago` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `ultima_modificacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`metodo_pago_id`, `tipo_pago`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
(1, 'Efectivo', '2023-10-08 19:38:06', '2023-10-08 19:38:06', NULL),
(2, 'Tarjeta Debito', '2023-10-08 19:38:06', '2023-10-08 19:38:06', NULL),
(3, 'Tarjeta Crédito', '2023-10-08 19:38:06', '2023-10-08 19:38:06', NULL),
(4, 'QR', '2023-10-08 19:38:06', '2023-10-08 19:38:06', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `pedido_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `metodo_pago_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `ultima_modificacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `coleccion` varchar(45) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `unidades` int(10) UNSIGNED DEFAULT NULL,
  `valor_compra` float DEFAULT NULL,
  `valor_venta` float DEFAULT NULL,
  `ganancia` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `inventario_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `ultima_modificacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `ultima_modificacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `nombre`, `descripcion`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminacion`) VALUES
(1, 'Administrador_ARP', 'Administrador root con todos los privilegios.', '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(2, 'Administrador_APM', 'Gerente.', '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(3, 'Empleado', 'Empleado de Real Shoes.', '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(4, 'Estándar', 'Cliente de Real Shoes', '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `doc_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `contraseña` varchar(45) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `ultima_modificacion` datetime DEFAULT current_timestamp(),
  `fecha_eliminaciondesactivacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`doc_id`, `nombre`, `apellido`, `direccion`, `contraseña`, `telefono`, `email`, `imagen`, `rol_id`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminaciondesactivacion`) VALUES
(1, 'Gerente1', 'Prueba1', 'Calle 1', '1234', '777-89-97313', 'gerenteprueba@hotmail.com', NULL, 2, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(2, 'Gerente2', 'Prueba2', 'Avenida Siempre viva', '1234', '189-97-48657', 'gerente2prueba@hotmail.com', NULL, 2, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(3, 'Operador1', 'Prueba1', 'Calle 2', '1234', '963-86-36768', 'operadorprueba@hotmail.com', NULL, 3, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(4, 'Operador2', 'Prueba2', 'Calle 3', '1234', '143-05-97333', 'operador2prueba@hotmail.com', NULL, 3, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(5, 'Cliente1', 'Prueba1', 'Calle 4', '1234', '805-66-30405', 'clienteprueba@hotmail.com', NULL, 4, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(1012453759, 'Deiver Giovanny', 'Morales Duarte', 'Calle 8', '1234', '932-90-80481', 'deiver.morales@misena.edu.co', NULL, 1, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(1013594945, 'Diego Alexander', 'Diaz Triana', 'Calle 7', '1234', '440-26-99791', 'diego.diaz949@misena.edu.co', NULL, 1, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(1022968811, 'Omar Fernando', 'Bohorquez Preciado', 'Calle 5', '1234', '749-47-38792', 'ofbohorquez1@misena.edu.co', NULL, 1, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(1022972233, 'Jaime', 'Olaya Hernandez', 'Calle 9', '1234', '261-24-13860', 'jolaya3@misena.edu.co', NULL, 1, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL),
(1023976365, 'Andres Felipe', 'Pulido Rios', 'Calle 6', '1234', '657-05-22070', 'andfpulido1@misena.edu.co', NULL, 1, '2023-10-08 19:38:05', '2023-10-08 19:38:05', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente_selecciona_producto`
--
ALTER TABLE `cliente_selecciona_producto`
  ADD PRIMARY KEY (`cliente_selecciona_producto_id`),
  ADD KEY `fk_cliente_selecciona_producto_persona` (`doc_id`),
  ADD KEY `fk_cliente_selecciona_producto_producto` (`producto_id`),
  ADD KEY `fk_cliente_selecciona_producto_pedido` (`pedido_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`factura_id`),
  ADD KEY `fk_factura_pedido` (`pedido_id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`inventario_id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`metodo_pago_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `fk_pedido_metodo_pago` (`metodo_pago_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_producto_inventario` (`inventario_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuario_rol` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente_selecciona_producto`
--
ALTER TABLE `cliente_selecciona_producto`
  MODIFY `cliente_selecciona_producto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `inventario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `pedido_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1023976366;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_selecciona_producto`
--
ALTER TABLE `cliente_selecciona_producto`
  ADD CONSTRAINT `fk_cliente_selecciona_producto_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`pedido_id`),
  ADD CONSTRAINT `fk_cliente_selecciona_producto_persona` FOREIGN KEY (`doc_id`) REFERENCES `usuario` (`doc_id`),
  ADD CONSTRAINT `fk_cliente_selecciona_producto_producto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_pedido` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`pedido_id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_metodo_pago` FOREIGN KEY (`metodo_pago_id`) REFERENCES `metodo_pago` (`metodo_pago_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_inventario` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`inventario_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
