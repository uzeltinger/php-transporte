CREATE DATABASE IF NOT EXISTS `transporte` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `transporte`;

CREATE TABLE `cartadeporte` (
  `id` int(6) NOT NULL,
  `remito_numero` varchar(8) NOT NULL,
  `remitente_numero_remito` varchar(11) DEFAULT NULL,
  `lugar_de_carga` varchar(1000) DEFAULT NULL,
  `ciudad_de_carga` varchar(1000) DEFAULT NULL,
  `remitente_nombre` varchar(1000) DEFAULT NULL,
  `remitente_cuit` varchar(15) DEFAULT NULL,
  `remitente_direccion` varchar(1000) DEFAULT NULL,
  `remitente_ciudad` varchar(1000) DEFAULT NULL,
  `destinatario_nombre` varchar(1000) DEFAULT NULL,
  `destinatario_cuit` varchar(15) DEFAULT NULL,
  `destinatario_direccion` varchar(1000) DEFAULT NULL,
  `destinatario_ciudad` varchar(1000) DEFAULT NULL,
  `camion_patente` varchar(10) DEFAULT NULL,
  `camion_modelo` varchar(255) DEFAULT NULL,
  `acoplado_patente` varchar(10) DEFAULT NULL,
  `acoplado_modelo` varchar(255) DEFAULT NULL,
  `chofer_nombre` varchar(1000) DEFAULT NULL,
  `chofer_documento` varchar(10) DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `flete_monto_neto` double(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Indices de la tabla `cartadeporte`
--
ALTER TABLE `cartadeporte`
  ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT de la tabla `cartadeporte`
--
ALTER TABLE `cartadeporte`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
