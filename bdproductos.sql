-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-12-2019 a las 01:26:37
-- Versión del servidor: 5.6.45-log
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laclase_b2evolu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `CategoriaID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `CategoriaID`) VALUES
(1, 'Pizarras Digitales'),
(3, 'Accesorios Pizarra Digital'),
(4, 'Videoconferencia'),
(5, 'Display Interactivo'),
(6, 'Ciencias Medicas'),
(8, 'Carros Cargadores'),
(11, 'Tablets'),
(12, 'Proyectores'),
(13, 'Notebooks y Netbook'),
(14, 'Ciencias Naturales'),
(15, 'Microfonos y Parlantes'),
(16, 'Software'),
(17, 'Combos'),
(18, 'Proyectores'),
(19, 'Computadoras'),
(20, 'Recicladas'),
(21, 'RobÃ³tica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `NombreProducto` varchar(45) NOT NULL,
  `CategoriaID` varchar(45) DEFAULT NULL,
  `Prefijo` varchar(5) NOT NULL,
  `Precio` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `NombreProducto`, `CategoriaID`, `Prefijo`, `Precio`) VALUES
(1, 'Pizarra Digital Tomi V6 con Plataforma y APP ', 'Pizarras Digitales', 'USD', '310'),
(4, 'Pizarra Digital Describo', 'Pizarras Digitales', 'USD', '420'),
(5, 'Pizarra Digital Mimio', 'Pizarras Digitales', 'USD', '750'),
(6, 'Pizarra Digital Ebeam', 'Pizarras Digitales', 'USD', '750'),
(7, 'Mesa Interactiva THSCREEN 55', 'Display Interactivo', '$', '55000'),
(8, 'Pizarra Mimio Teach', 'Pizarras Digitales', 'USD', '750'),
(9, 'Camara de Documentos MimioView H340', 'Accesorios Pizarra Digital', 'USD', '590'),
(10, 'Mimio PAD II', 'Accesorios Pizarra Digital', 'USD', '320'),
(11, 'Mimio Ink Capture Kit', 'Accesorios Pizarra Digital', '$', '6.990'),
(12, 'Torso Bixesuado', 'Ciencias Medicas', 'USD', '385'),
(13, 'Modelo de Hombro XC109', 'Ciencias Medicas', '$', '1290'),
(14, 'Modelo de Corazon', 'Ciencias Medicas', '$', '1390'),
(15, 'Brazo PunciÃ³n Venosa', 'Ciencias Medicas', 'USD', '190'),
(16, 'Modelo Esqueleto Humano', 'Ciencias Medicas', 'USD', '250'),
(17, 'Simulador RCP', 'Ciencias Medicas', 'USD', '240'),
(18, 'TH SCREEN LCD Interactivo 55', 'Display Interactivo', '$', '49000'),
(19, 'TH SCREEN LCD Interactivo 40', 'Display Interactivo', '', 'Consultar'),
(20, 'Tablet TABI', 'Tablets', 'USD', '245'),
(21, 'Tablet EXO eWay TV 78T', 'Tablets', '$', '1.990'),
(22, 'Notebook Exo Smart R8', 'Notebooks y Netbook', '$', '7.690'),
(23, 'Tablet EXO Wings 2 en 1', 'Tablets', '', 'Consultar'),
(24, 'Polycom VoiceStation 300', 'Videoconferencia', '$', '6.100'),
(25, 'ClearOne Unite', 'Videoconferencia', '$', '39.000'),
(26, 'HuddleCam 10x', 'Videoconferencia', '$', '22.400'),
(27, 'Puntero Digital', 'Accesorios Pizarra Digital', 'USD', '75'),
(28, 'Laboratorio Digital de Ciencias Naturales', 'Ciencias Naturales', 'USD', '1070'),
(29, 'Pizarron Digital Fija Iboard 82', 'Pizarras Digitales', 'USD', '900'),
(30, 'Pizarra Digital Tomi V7', 'Pizarras Digitales', 'USD', '990'),
(31, 'Porta Notebooks o Tablet 24 o 20 Unidades', 'Carros Cargadores', 'USD', '1.450'),
(32, 'Esqueleto a escala 1/2', 'Ciencias Medicas', 'USD', '110'),
(33, 'Modelo Columna Vertebral', 'Ciencias Medicas', '$', '110'),
(34, 'Parlante GBR AP 728H Portatil', 'Microfonos y Parlantes', 'USD', '65'),
(35, 'Microfono de Cara con Amplificador de 25W', 'Microfonos y Parlantes', 'USD', '45'),
(36, 'Parlante 25W y Microfono Inalambrico', 'Microfonos y Parlantes', 'USD', '130'),
(37, 'SMART Learning Suite', 'Software', 'USD', '110'),
(38, 'Pizarra Digital Tomi + Viewsonic PA503S', 'Combos', '$', '29900'),
(39, 'Pizarra Tomi V6 + Proyector LED HTP 2000 AL', 'Combos', 'USD', '350'),
(40, 'Pizarra Tomi V6 + Proyector LED HTP 2800 AL', 'Combos', 'USD', '550'),
(41, 'Pizarra Tomi V6 + LCD32', 'Combos', 'USD', '350'),
(42, 'Pizarra Tomi V6 + LCD40', 'Combos', 'USD', '450'),
(43, 'Pizarra Mimio Teach  + Viewsonic PA503S', 'Combos', 'USD', '1280'),
(44, 'Pizarra Mimio Teach + Proyector LED HTP 2800A', 'Software', 'USD', '1.090'),
(45, 'Pizarra Mimio Teach + Proyector LED HTP 2000A', 'Combos', 'USD', '990'),
(46, 'Pizarra Digital Tomi V6 + 10 Tablet Viewsonic', 'Combos', 'USD', '990'),
(47, 'Kit para el Disertante 2.0', 'Combos', 'USD', '950'),
(48, 'Aula Digital Mimio', 'Combos', 'USD', '2.700'),
(49, 'Pack Digital', 'Combos', 'USD', '1.400'),
(50, 'Proyector Viewsonic PA502S', 'Proyectores', 'U$D', '465'),
(51, 'Proyector Viewsonic PA502x', 'Proyectores', '', '499'),
(52, 'Proyector Viewsonic PA503X', 'Proyectores', 'USD', 'consultar'),
(53, 'Proyector Viewsonic PS501X', 'Proyectores', 'USD', '790'),
(54, 'PC REC Intel CI3 4 GB', 'Recicladas', '$', '5900'),
(55, 'PC REC Intel CI5 4 GB', 'Recicladas', '$', '7000'),
(56, 'Notebook REC Intel Pentium 2GB', 'Recicladas', '$', '4900'),
(57, 'Notebook REC Intel CI3 4GB', 'Recicladas', '$', '6200'),
(58, 'Monitor Reciclado 19', 'Recicladas', '$', '1500'),
(59, 'AIO Interactiva TLT', 'Display Interactivo', 'USD', '4600'),
(60, 'Kit Arduino Para Docentes', 'Combos', 'USD', '70'),
(61, 'Screen Beam ', 'Proyectores', 'USD', '790'),
(62, 'Mythware - Licencia Docente', 'Software', 'USD', '34'),
(63, 'Mythware - Licencia por Alumno', 'Software', 'USD', '30'),
(64, 'Kit de RobÃ³tica ProBots', 'RobÃ³tica', 'USD', '190');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `login` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `login`, `pass`, `nombre`, `perfil`, `activo`) VALUES
(1, 'admin', 'PERON1492', 'Marcelo Theyler', 'administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marcelo', 'alquilerdepcbsas@gmail.com', '$2y$10$rY7hTwOhttWI0lfn7UuwV.tX4WrAhz.d1r31uxLAtdIphA83h0pWS', 'QoBObSfjndBQSwNHz15x6LQEzRv2nmTl9Zf9oAwLQdAQ8fTvDAujRDhA26zU', '2018-05-01 04:35:58', '2018-05-01 04:35:58'),
(2, 'Mathias', 'mathias_Fx@yahoo.com.ar', 'wHP8gLoo8C18c', NULL, '2018-05-01 07:19:59', '2018-05-01 07:19:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD UNIQUE KEY `idProductos_UNIQUE` (`idProductos`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
