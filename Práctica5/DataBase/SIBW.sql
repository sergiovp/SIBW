-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql:3306
-- Tiempo de generación: 15-07-2020 a las 17:37:24
-- Versión del servidor: 8.0.19
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `SIBW`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `comentario` varchar(231) NOT NULL,
  `autor` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `autor`, `fecha`, `hora`) VALUES
(1, 'Guau, que cantidad de conciertos hay en esta página. Al que voy a ir seguro es al de Denom. Es un artista que me gusta mucho y me alegra que venga a Granada.', 'Sergio Vela', '2020-03-01', '12:47:00'),
(2, 'Asistiré a la fiesta de los homínidos. ¡Dicen que el año pasado se lo pasaron genial todos! De hecho, ya he comprado la entrada y todo.', 'Noelia Sobrino', '2020-03-15', '17:27:00'),
(3, 'Me ha gustado mucho el tema que ha sacado el recién estrenado artista Sergio Vela. Espero que siga haciendo canciones y no haya sido por el mero hecho de estar aburrido en cuarentena.', 'Pepito Grillo', '2020-04-01', '13:13:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `descripcion_p` varchar(600) NOT NULL,
  `descripcion_s` varchar(300) NOT NULL,
  `aviso` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `lugar`, `fecha`, `img1`, `img2`, `instagram`, `youtube`, `facebook`, `descripcion_p`, `descripcion_s`, `aviso`) VALUES
(1, 'Denom en concierto', 'Sala príncipe (Granada)', '2020-06-11', 'Images/denom2.jpg', 'Images/denom3.jpg', 'https://www.instagram.com/denom_madrid/?hl=es', 'https://www.youtube.com/results?search_query=denom', 'https://es-es.facebook.com/denom.madrid', 'Denom, como sabemos es un chico de Madrid que viene pisando fuerte desde que debutó con su disco primer \"Una parte de mí\" en el año 2016. El concierto tendrá lugar en Granada, en la sala Príncipe el próximo 26 de Mayo. Las puertas se abrirán a las 21:00, pero se recomienda estar allí con al menos 30 minutos de antelación.', 'El concierto tendrá una duración aproximada de 2 horas y habrá merchandising del artista, a parte, con la entrada viene incluida una bebida canjeable en la barra que habrá en el local.', '*Se recuerda que será necesario llevar el DNI junto con la entrada. Los menores deberán venir acompañados de un adulto. En caso de ser mayores de 16, podrán venir con una autorización de su madre, padre o tutor legal.*'),
(2, 'Firma de discos', 'Hipercor de Granada', '2020-07-09', 'Images/natosywaor2.jpg', 'Images/natosywaor3.jpg', 'https://www.instagram.com/natos_y_waor/', 'https://www.youtube.com/channel/UCq-3_QjeLPs4yAuZEIwvHWg', 'https://es-es.facebook.com/NatosyWaorOficial', '¡Por fin ha llegado el día!\r\nNatos y Waor se disponen a acudir a una firma de discos muy especial. Desde que sacaron su disco \"Cicatrices\" en el año 2018 no habían hecho ninguna firma de discos.\r\nSi te gustan estos artistas, no dudes en acudir. A parte de la firma de discos, podrás fotografiarte con ellos, habrá sorteos y mucho más... ¿A qué esperas?', 'No es requisito indispensable tener comprado su disco para acudir a la cita, no obstante, si quieres, podrás adquirir su disco allí mismo. Habrá también otro tipo de merchandising (camisetas, sudaderas, posters, etc).', '*No hay edad mínima para asistir al evento. No obstante, se aconseja que los menores de edad acudan acompañados de madre, padre o tutor lugar debido a que se estima que asista mucha gente al evento.*'),
(3, 'Presentación de canción', 'Todas las plataformas digitales', '2020-03-27', 'Images/yo6.jpg', 'Images/yo7.jpg', 'https://www.instagram.com/sergiovela7/', 'https://www.youtube.com/?hl=es&gl=ES', 'https://es-es.facebook.com/sergio.velapelegrina', 'Sergio Vela, es un estudiante de ingeniería informática al cual desde siempre le ha gustado el RAP. En estos tiempos que corren, ha encontrado el momento ideal para sacar una canción muy personal en la cual hace un resumen de su vida hasta el momento. La canción puede ser escuchada desde todas las plataformas digitales.', 'La acogida a la canción ha sido excepcional. En tan solo 24h ha conseguido tener un millón de reproducciones en youtube y el reconocimiento de la calidad de la canción por parte de expertos en el sector.', '*No olvides seguir al artista en sus redes sociales y compartir la canción con tus amigos si te ha gustado.*'),
(4, 'Fiesta de RAP', 'Casa de \"La Paca\"', '2020-07-27', 'Images/h1.jpg', 'Images/h2.jpg', 'https://www.instagram.com/sergiovela7/', 'https://www.youtube.com/watch?v=t_9WWVusoW0', 'https://es-es.facebook.com/sergio.velapelegrina', 'Vuelven el grupo de raperos llamados como \"los Homínidos\" montando una de la que va a ser una de las mejores fiestas del panorama. En dicha fiesta habrá diversos conciertos de RAP, juegos como el del \"hombre 3\" y todo tipo de detalle.\r\n¿A qué esperas, te lo vas a perder?', 'La casa en la que se celebra la fiesta dispone de piscina y jacuzzi. Además de una zona \"chill out\" en la que podrás descansar. La entrada la puedes comprar desde sus redes sociales.', '*La entrada no está permitida para menores de edad o gente sin la entrada física mostrada en la puerta de la casa en la que se celebra la fiesta.*'),
(5, 'Concierto en festival', 'DreamFestival (Málaga)', '2020-08-07', 'Images/wiz2.jpg', 'Images/wiz3.jpg', 'https://www.instagram.com/wizkhalifa/?hl=es', 'https://www.youtube.com/channel/UCVp3nfGRxmMadNDuVbJSk8A', 'https://es-es.facebook.com/wizkhalifa', '2016 fue la primera y última vez que el rapero estadounidense Wiz Khalifa vino a España. Sus fans llevan desde entonces pidiendo a gritos que volviera, y no se ha hecho realidad hasta ahora. Wiz nos brindará un concierto en el que cantará canciones de todo tipo, desde las de su primer disco hasta el último.', 'DreamFestival se ha reafirmado como festival con la contratación de un cantante de esta talla. Será un momento único y para recordar toda la vida. Las entradas están disponibles en las redes del artista.', '*Se recuerda que la entrada a menores de 16 años está totalmente prohibida. En el caso de tener 16 o 17 años, deberán traer una autorización firmada por tu madre, padre o tutor legar para poder entrar al festival.*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_eventos`
--

CREATE TABLE `lista_eventos` (
  `id` int NOT NULL,
  `img` varchar(50) NOT NULL,
  `nombre_artista` varchar(40) NOT NULL,
  `tipo_evento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `lista_eventos`
--

INSERT INTO `lista_eventos` (`id`, `img`, `nombre_artista`, `tipo_evento`, `descripcion`) VALUES
(1, 'Images/denom.jpg', 'Denom', 'Concierto', 'Denom, como sabemos es un chico de Madrid que viene pisando fuerte desde que debutó con su disco \"Una parte de mí\" en el año 2016.'),
(2, 'Images/natosywaor.jpg', 'Natos y Waor', 'Firma de disco', 'Natos y Waor, sin lugar a dudas están en la cúspide del panorama nacional en cuanto a RAP se refiere. Lo quieren celebrar brinando a sus fans la oportunidad de tener su disco \"Cicatrices\" firmado por ellos mismos.'),
(3, 'Images/yo5.jpg', 'Sergio Vela', 'Inicio en el RAP', 'Este chico de Granada, además de ser estudiante de ingeniería informática, ha entrado en el mundo del RAP creado un tema muy personal e impresionante.'),
(4, 'Images/h3.jpg', 'Homínidos', 'Fiesta de RAP', 'Los homínidos vuelven a la carga con una de la que estamos seguros, va a ser una de las fiestas de RAP más grandes del año.'),
(5, 'Images/wiz.jpg', 'Wiz Khalifa', 'Concierto en festival', 'Tenemos el gusto de anunciar que el cantante estadounidense Wiz Khalifa actuará en el festival DreamFestival.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `palabras_prohibidas`
--

CREATE TABLE `palabras_prohibidas` (
  `palabra_prohibida` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `palabras_prohibidas`
--

INSERT INTO `palabras_prohibidas` (`palabra_prohibida`) VALUES
('alcohol'),
('tonto'),
('violencia'),
('pelea'),
('palabrota'),
('violento'),
('whisky'),
('ron'),
('vodka'),
('ginebra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(15) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user`, `pass`, `admin`) VALUES
('a', 'a', 0),
('adios', 'adios', 1),
('haha2', 'haha', 0),
('ja', 'ja', 0),
('je', 'je', 0),
('last', 'last', 0),
('last2', 'last2', 0),
('prueba2', 'prueba2', 1),
('sergio', 'sergio', 1),
('u', 'u', 0),
('vela', 'vela', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_eventos`
--
ALTER TABLE `lista_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `lista_eventos`
--
ALTER TABLE `lista_eventos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
