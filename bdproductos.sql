-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-07-2020 a las 03:19:04
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdproductos`
--

-- --------------------------------------------------------


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
(21, 'Robotica'),
(26, 'Electronica Digital'),
(27, 'madona');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Posicion`, `NombreProducto`, `Descripcion`, `Imagen`, `Link`, `CategoriaID`, `Prefijo`, `Precio`) VALUES
(1, 1, 'Pizarra Digital TOMI', 'TOMI es una Pizarra Digital interactiva con todas las herramientas necesarias para tus presentaciones comerciales, educativas, familiares.', 'Tomisola.png', 'http://www.tomiargentina.com.ar/', 'Pizarras Digitales', 'USD', '310'),
(99, 2, 'Pizarra Digital Describo', 'Una Buena pizarra digital debe ser tan comoda de usar como un pizarron tradicional. En nuestro caso, la transicion de Escribo a Digital-Escribo', 'Describo.png', 'http://www.pizarradescribo.com/', 'Pizarras Digitales', 'USD', '420'),
(100, 3, 'Pizarra Digital Fija Iboard', '82 Pulgadas Tactil y con Tiza Digital', 'IBOARD.png', 'https://www.youtube.com/watch?v=gvu6jv1RHMg', 'Pizarras Digitales', 'USD', '650'),
(101, 4, 'Pizarra Digital EBEAM Wifi', 'Convierte cualquier superficie lisa y firme, en un espacio Digital, su lapiz Interactivo basado en tecnologia ultrasonido, permite controlar todas las aplicaciones, incluyendo la Pizarra Digital, incluye un software muy potente e interactivo de alta compatibilidad con Power Point.', 'Ebeam.png', 'https://youtu.be/AmnH9OqB_co', 'Pizarras Digitales', 'USD', '750'),
(102, 5, 'Pizarra Digital Mimio Teach WIFI', 'Mimio Teach le permite enseñar de manera interactiva', 'MimioteachSola.png', 'http://pizarradigitalmimio.com.ar/', 'Pizarras Digitales', 'USD', '750'),
(103, 6, 'Tomi V7 - La computadora del Maestro', 'El asistente Personal del Docente es una computadora, Internet sin internet, comparte pantalla hasta con 30 dispositivos, toma lista, corrige Examenes. Notifica a los padres. Mira el video para conocerla ?Parece Ficci?n pero es ciencia!. ', 'Tomi7.png', 'https://youtu.be/N5R_JFw4Zq4', 'Pizarras Digitales', 'USD', '990'),
(104, 7, 'AIO Interactiva TLT', 'All in One Interactiva de 65 Pulgadas TLT, Pantalla Interactiva Tactil y Pen Touch, trae incluida una Core I5 con 4 GB y software oara trabajos colaborativos y presentaciones.', 'AIO65.png', 'https://youtu.be/WlpDDt3AVMQ', 'Display Interactivo', 'USD', '4600'),
(105, 8, 'Actiontec Screen Beam', 'Actiontec Screen Beam la mas moderna Solucion de Proyeccion Inalambrica', 'ScreenBeam.png', '', 'Proyectores', 'USD', '790'),
(106, 9, 'Software Mythware', 'Software para el manejo de la clase, Proveer una solución óptima, amigable y de colaboración para la enseñanza y el manejo del salón de clase, en forma interactiva.\r\nPermite transmitir la Pantalla y voz del docente a todos los alumnos y se le pueden compartir, Manejo de archivo, para envio y recolección de archivos entre docentes y estudiantes.\r\nMensajes, maestros y alumnos se pueden comunicar mediante mensajes Peliculas en red, transmite video desde el lado del docente, Colaboración en grupo, control de los dispositivos desde el lado del Mestro, evaluaciones y mucho más.\r\nLicencia Docente o Licencia por Alumno', 'Mythware.png', '', 'Software', 'USD', '34'),
(107, 10, 'Proyector Viewsonic PA502S', 'Proyector Viewsonic PA503S 3600 AL -HDMI -SVGA, se necesita 3 metros para una imagen de 77 pulgadas', 'ViewsonicPA503S.png', '', 'Proyectores', 'USD', '499'),
(108, 11, 'Proyector Viewsonic PA502x', 'Proyector Viewsonic PA502x - 3500 AL - HDMI - XGA necesita 3 metros para una imagen de 77 Pulgadas', 'ViewsonicPA502X.png', '', 'Proyectores', 'USD', '550'),
(109, 12, 'Proyector Viewsonic PA503X', 'Proyector Viewsonic PA503X 3600 AL - HDMI - XGA se necesita 3 metros para una imagen de 77 pulgadas', 'ViewsonicPA503X.png', '', 'Proyectores', '', 'Consultar'),
(110, 13, 'Proyector Viewsonic PS501X', 'Proyector Viewsonic PJD5353LS - 3200 AL - HDMI - XGA necesita 80cm para una imagen de 77 Pulgadas', 'ViewsonicPJD5353LS.png', '', 'Proyectores', 'USD', '790'),
(111, 14, 'Computadora Reciclada Intel CI3 4GB', 'Computadora Intel Core I3\r\nMemoria Ram 4GB', 'gabinete-clio-6802-fuente-de-650w-matx.jpg', '', 'Recicladas', '$', '5900'),
(112, 15, 'Computadora Reciclada Intel CI5 4GB', 'Procesador Intel Core I5\r\nMemoria RAM 4gb\r\n', 'gabinete-clio-6802-fuente-de-650w-matx.jpg', '', 'Recicladas', '$', '7000'),
(113, 16, 'Notebook Reciclada Intel Pentium 2GB', 'Notebook Intel Pentium \r\n2GB de RAM', 'notebook.png', '', 'Recicladas', '$', '4900'),
(114, 17, 'Notebook Reciclada Intel CI3 4GB', 'Notebook Intel Core I3\r\n4GB de RAM', 'notebook.png', '', 'Recicladas', '$', '6200'),
(115, 18, 'Monitor 19 Pulgadas', 'Monitor reciclado 19\"', 'monitor-philips-19-pulgadas-led-hd-vga-hdmi.jpg.png', '', 'Recicladas', '$', '1500'),
(116, 19, 'Gabinete Móvil Carro', 'Portanotebooks o Tablet 24 o 20 Unidades\r\nConstituido en Acero laminado en frio con 2 estantes de 10/20 o 20/20 divisiones, según especificaciones de armado, para almacenar los equipos y recargar sus baterias en forma organizada cada estante posee sostenes para organizar los cables y dejar los equipos en forma vertical, puerta o puertas de apertura con manija y cerradura 2 Ventiladores para refrigeración interna y ranuras para la circulación del caudal de aire llave de encendido externa con luz indicadora.', 'carro.png', '', 'Carros Cargadores', 'USD', '1450'),
(117, 20, 'Laboratorio Digital de Ciencias Naturales', 'Disc Lab Laboratorio de Ciencias Naturales con 13 Sensores', 'laboratorio.png', '', 'Ciencias Naturales', 'USD', '1070'),
(118, 21, 'Kit de Arduino para Docentes', 'Kit de Capacitacion Virtual Personalizada incluida para Docentes\r\nIncluye los componentes necesarios para armar Proyectos Escolares (Placas Arduino - Protoboard - Leds - Sensores - Botones - Cables - Videocursos - ETC)', 'kitarduino.png', 'https://www.youtube.com/watch?v=jrG-uvB97Sw&feature=youtu.be', 'Electronica Digital', 'USD', '70'),
(119, 22, 'Esqueleto a escala 1/2', 'Con representacion de corazon y grandes vasos', 'Esqueleto1.png', 'http://tienda.garaged.com.ar/complementos-para-anatomia-y-medicina/', 'Ciencias Medicas', 'USD', '110'),
(120, 23, 'Esqueleto Tamaño Natural', 'Con salida de raíces nerviosas y arterias', 'Esqueleto2.png', 'https://www.youtube.com/watch?v=xG-M1uV08fc&feature=youtu.be', 'Ciencias Medicas', 'USD', '250'),
(121, 24, 'Torso Bisexuado', '85cm , 40 piezas desmontables, con modelo de Utero y feto', 'torso.png', '', 'Ciencias Medicas', 'USD', '385'),
(122, 25, 'Modelo de columna Vertebral', 'Para practicas de fisioterapia, Kinesiología y demos, flexible con cabeza de femur y soporte', 'columna.png', '', 'Ciencias Medicas', 'USD', '110'),
(123, 26, 'Torso de RCP', 'Torso Simulador RCP Practiman , Sistema de Respiración real unico en el mercado, Exclusiva Válvula conectada al púlmon y nariz', 'torsoRCP.png', 'https://youtu.be/hoJ9GvBJUag', 'Ciencias Medicas', 'USD', '220'),
(124, 27, 'Brazo de puncion venosa', 'Flebotomia venosa\r\nInyeccion venosa\r\nTransfusion venosa\r\nTransfusion liquida\r\nInyeccion intramuscular en el deltoide', 'brazo.png', '', 'Ciencias Medicas', 'USD', '190'),
(125, 28, 'Parlante 25W + Microfono', 'Parlante 25 watts y Microfono inalambrico', 'parlante25.png', 'https://youtu.be/8Lv7xMugiNo', 'Microfonos y Parlantes', 'USD', '130'),
(126, 29, 'Microfono de Cara + Amplificador', 'Microfono de cara con Amplificador de 25w', 'parlante252.png', 'https://youtu.be/8Lv7xMugiNo', 'Microfonos y Parlantes', 'USD', '45'),
(127, 30, 'Parlante Portatil + Microfono Inalambrico', 'Parlante portatil 20 watts con microfono inalambrico', 'parlante20.png', 'https://youtu.be/8Lv7xMugiNo', 'Microfonos y Parlantes', 'USD', '65'),
(128, 31, 'LCDA de 55 Pulgadas Interactivo', 'Incluye Soft Educativo Smart Learning Suite Contenidos, clases, evaluacion, Colaboracion en la punta de tus dedos\r\nTH Screen podes escribir con el dedo o un Lapiz ', 'LCD-Interactivo-TH-SCREENi.png', 'https://youtu.be/h8X4IkzM0jM/', 'Display Interactivo', '$', '49000'),
(129, 32, 'Mesa Interactiva THSCREEN 55', 'Incluye Soft Educativo Smart Learning Suite Contenidos , CLases, Evaluacion. Colaboracion en la punta de tus dedos', 'mesa.png', 'https://youtu.be/h8X4IkzM0jM/', 'Display Interactivo', '$', '55000'),
(132, 33, 'Smart Learning Suite', 'Ahora podes tener la mejor Suite Educativa en tu Aula', 'SMART-Learning-Suit-Software-02.jpg', 'https://youtu.be/HyF8TmQsaqs', 'Software', 'USD', '110');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`



--
-- Volcado de datos para la tabla `users`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD UNIQUE KEY `idProductos` (`idProductos`);

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
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

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
