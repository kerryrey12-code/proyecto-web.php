-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2026 a las 23:30:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peluqueriabd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Art_cod_pk` char(5) NOT NULL,
  `Art_nom` varchar(100) NOT NULL,
  `Art_cant` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Art_cod_pk`, `Art_nom`, `Art_cant`) VALUES
('AR001', 'Tijera de corte', 10),
('AR002', 'Navaja', 5),
('AR003', 'Peines', 12),
('AR004', 'Pinzas', 5),
('AR005', 'Secadoras', 4),
('AR006', 'Tintes', 20),
('AR007', 'Rasuradora', 3),
('AR008', 'Plancha alizadora', 3),
('AR009', 'Shampoo', 7),
('AR010', 'Calentador de cera', 3),
('AR011', 'Papel aluminio', 15),
('AR090', 'taladro', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cli_Cedula_pk` char(4) NOT NULL,
  `Cli_nom` varchar(100) NOT NULL,
  `Cli_cat` tinyint(1) NOT NULL,
  `Cli_tel` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cli_Cedula_pk`, `Cli_nom`, `Cli_cat`, `Cli_tel`) VALUES
('C028', 'Alfonso Ramirez', 0, '972882134'),
('C029', 'Rafael Gonzales', 1, '984526714'),
('C030', 'Luis Garcia', 0, '944235471'),
('C031', 'Cesar Acuña', 1, '900000000'),
('C032', 'Rosario morales', 1, '972512322'),
('C033', 'Pedro Bravo', 0, '970882104'),
('C034', 'Stand Manzan', 1, '965431340'),
('C035', 'Azucena Cotito', 0, '965021314'),
('C036', 'Araceli Rodriguez', 0, '976251041'),
('C044', 'Mari Vargas', 1, '972289272');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_peluquero_articulo`
--

CREATE TABLE `detalle_peluquero_articulo` (
  `Cedula_pk` char(4) NOT NULL,
  `Art_cod_pk` char(5) NOT NULL,
  `Det_Pel_Art_Fecha` date NOT NULL,
  `Det_Pel_Art_Hora` time NOT NULL,
  `Det_Pel_Art_Estado` varchar(100) NOT NULL DEFAULT 'BUEN ESTADO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_peluquero_articulo`
--

INSERT INTO `detalle_peluquero_articulo` (`Cedula_pk`, `Art_cod_pk`, `Det_Pel_Art_Fecha`, `Det_Pel_Art_Hora`, `Det_Pel_Art_Estado`) VALUES
('1001', 'A0001', '2026-05-01', '08:30:00', 'BUEN ESTADO'),
('1002', 'A0002', '2026-05-02', '09:15:00', 'REGULAR'),
('1003', 'A0003', '2026-05-03', '10:00:00', 'BUEN ESTADO'),
('1004', 'A0004', '2026-05-04', '11:20:00', 'MAL ESTADO'),
('1005', 'A0005', '2026-05-05', '12:10:00', 'BUEN ESTADO'),
('1006', 'A0006', '2026-05-06', '13:45:00', 'REGULAR'),
('1007', 'A0007', '2026-05-07', '14:30:00', 'BUEN ESTADO'),
('1008', 'A0008', '2026-05-08', '15:25:00', 'MAL ESTADO'),
('1009', 'A0009', '2026-05-09', '16:40:00', 'BUEN ESTADO'),
('1010', 'A0010', '2026-05-10', '17:50:00', 'REGULAR'),
('P001', 'AR001', '2026-06-04', '04:38:00', 'BUEN ESTADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_peluquero_cliente`
--

CREATE TABLE `detalle_peluquero_cliente` (
  `Cedula_pk` char(4) NOT NULL,
  `Cli_Cedula_pk` char(4) NOT NULL,
  `Det_Pel_Cli_fecha` date NOT NULL,
  `Det_Pel_Cli_hora` time NOT NULL,
  `Servicio_pk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_peluquero_cliente`
--

INSERT INTO `detalle_peluquero_cliente` (`Cedula_pk`, `Cli_Cedula_pk`, `Det_Pel_Cli_fecha`, `Det_Pel_Cli_hora`, `Servicio_pk`) VALUES
('1001', '2001', '2026-05-01', '08:00:00', 1),
('1002', '2002', '2026-05-02', '09:15:00', 2),
('1003', '2003', '2026-05-03', '10:30:00', 3),
('1004', '2004', '2026-05-04', '11:45:00', 4),
('1005', '2005', '2026-05-05', '12:20:00', 5),
('1006', '2006', '2026-05-06', '13:10:00', 1),
('1007', '2007', '2026-05-07', '14:25:00', 2),
('1008', '2008', '2026-05-08', '15:40:00', 3),
('1009', '2009', '2026-05-09', '16:50:00', 4),
('1010', '2010', '2026-05-10', '17:30:00', 5),
('P001', '2020', '2026-06-04', '04:40:00', 4),
('P600', '2020', '2026-05-12', '12:02:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peluquero`
--

CREATE TABLE `peluquero` (
  `cedula_pk` char(4) NOT NULL,
  `pel_nom` varchar(100) NOT NULL,
  `pel_edad` int(11) NOT NULL,
  `pel_direc` varchar(500) NOT NULL,
  `pel_tel` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peluquero`
--

INSERT INTO `peluquero` (`cedula_pk`, `pel_nom`, `pel_edad`, `pel_direc`, `pel_tel`) VALUES
('P001', 'Juan Perez', 34, 'av Lima 123', '956320241'),
('P002', 'Carlos Mendoza', 34, 'av Lima 123', '987654321'),
('P003', 'María Flores', 24, 'av Los Olivos 321', '912345678'),
('P004', 'José Ramírez', 41, 'av Pacasmayo 333', '998765432'),
('P005', 'Ana Gutiérrez', 30, 'av Martin 451', '923456789'),
('P006', 'Luis Vargas', 22, 'av 5 de mayo', '976543210'),
('P007', 'Carmen Ortiz', 20, 'av Tauro 501', '934567890'),
('P008', 'Diego Salazar', 20, 'av Las Flores 341', '951789456'),
('P009', 'Valeria Torres', 30, 'av Independencia', '963258147'),
('P010', 'Andrés Paredes', 23, 'av Chorrillos 401', '942813675'),
('P011', 'Maria Lopez', 28, 'Av Arequipa 456', '956320242'),
('P012', 'Carlos Diaz', 31, 'Jr Cusco 789', '956320243'),
('P013', 'Ana Torres', 25, 'Av Grau 321', '956320244'),
('P014', 'Luis Ramos', 40, 'Calle Piura 654', '956320245'),
('P015', 'Sofia Castro', 29, 'Av Tacna 987', '956320246'),
('P016', 'Pedro Ruiz', 36, 'Jr Ica 741', '956320247'),
('P017', 'Lucia Gomez', 27, 'Av Puno 852', '956320248'),
('P018', 'Diego Flores', 33, 'Calle Norte 963', '956320249'),
('P019', 'Elena Vargas', 30, 'Av Central 159', '956320250');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Servicio_pk` int(11) NOT NULL,
  `Serv_nombre` varchar(100) NOT NULL,
  `Serv_precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`Servicio_pk`, `Serv_nombre`, `Serv_precio`) VALUES
(1, 'CORTE', 20),
(2, 'LACEADO DE CABELLO', 70),
(3, 'DECOLORACION', 50),
(4, 'LIMPIEZA FACIAL', 30),
(5, 'DEPILACION DE CEJAS', 35),
(6, 'COBERTURA DE CANAS', 70),
(7, 'ONDULACION', 120),
(8, 'TRATAMIENTO DE RIZOS', 80),
(9, 'MECHAS', 100),
(10, 'MANICURE', 50),
(11, 'PEDICURE', 50),
(12, 'LAVADO DE CABELLO', 15),
(13, 'PEINADO BASICO', 35),
(14, 'TINTURA DE CABELLO', 50),
(15, 'TRATAMIENTO CAPILAR', 80);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Art_cod_pk`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cli_Cedula_pk`);

--
-- Indices de la tabla `detalle_peluquero_articulo`
--
ALTER TABLE `detalle_peluquero_articulo`
  ADD PRIMARY KEY (`Cedula_pk`,`Art_cod_pk`,`Det_Pel_Art_Fecha`,`Det_Pel_Art_Hora`);

--
-- Indices de la tabla `detalle_peluquero_cliente`
--
ALTER TABLE `detalle_peluquero_cliente`
  ADD PRIMARY KEY (`Cedula_pk`,`Cli_Cedula_pk`,`Det_Pel_Cli_fecha`,`Det_Pel_Cli_hora`);

--
-- Indices de la tabla `peluquero`
--
ALTER TABLE `peluquero`
  ADD PRIMARY KEY (`cedula_pk`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Servicio_pk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
