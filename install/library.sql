-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-11-2018 a las 23:20:32
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `author`
--
-- Creación: 21-11-2018 a las 21:57:31
--

CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `biography` text NOT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `author`:
--

--
-- Volcado de datos para la tabla `author`
--

INSERT INTO `author` (`id_author`, `name`, `surname`, `nationality`, `biography`, `route`) VALUES
(1, 'Veronica', 'Roth', 'estadounidense', 'Veronica Roth nació el 19 de agosto de 1988, en Chicago, la misma ciudad donde se desarrolla este libro. Estudió Escritura Creativa en la Universidad de Northwestern, donde decidió empezar a hacer un borrador de Divergente, en vez de hacer los deberes que le mandaban. Viendo el éxito que ha conseguido con Divergente e Insurgente, fue una buena elección. Actualmente vive cerca de Chicago y se dedica a la escritura a tiempo completo.', 'images/veronicaRoth.jpg'),
(2, 'Stephanie', 'Perkins', 'estadounidense', 'Stephanie Perkins nació en Carolina del Sur, creció en Arizona y fue a la universidad en San Francisco y Atlanta. Siempre ha trabajado con libros: primero como librera, después como bibliotecaria y ahora como escritora de literatura juvenil. En la actualidad vive en las montañas de Carolina del Norte con su marido, sus dos perros y su gato, en una casa en la que cada una de las habitaciones está pintada de un color del arco iris.', 'images/stephaniePerkins.jpg'),
(3, 'Gayle', 'Forman', 'estadounidense', "Gayle Forman es una escritora conocida por su novela Si decido quedarme y que también ha trabajado como periodista para Glamour, Elle, Cosmopolitan, Seventeen y The New York Times Magazine.También ha escrito otras novelas como 'You can't get there from here Sisters in Sanity' o 'Solo un día'.", 'images/gayleForman.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `book`
--
-- Creación: 21-11-2018 a las 21:57:34
--

CREATE TABLE IF NOT EXISTS `book` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `editorial` varchar(100) NOT NULL,
  `id_author` int(11) NOT NULL,
  `review` text NOT NULL,
  `nbr_pages` int(11) NOT NULL,
  PRIMARY KEY (`id_book`),
  KEY `id_author` (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `book`:
--   `id_author`
--       `author` -> `id_author`
--

--
-- Volcado de datos para la tabla `book`
--

INSERT INTO `book` (`id_book`, `name`, `gender`, `editorial`, `id_author`, `review`, `nbr_pages`) VALUES
(1, 'Divergente', 'Novela', 'RBA Editorial Molino', 1, 'En el Chicago distópico de Beatrice Prior, la sociedad está dividida en cinco facciones, cada una de ellas dedicada a cultivar una virtud concreta: Verdad, Abnegación, Osadía, Cordialidad y Erudición. En una ceremonia anual, todos los chicos de 16 años deben decidir a qué facción dedicarán el resto de sus vidas. Beatrice tiene que elegir entre quedarse con su familia o ser quien realmente es, no puede tener ambas cosas. Así que toma una decisión que sorprenderá a todo el mundo, incluida ella.\r\nDurante el competitivo proceso de iniciación posterior, Beatrice decide pasar a llamarse Tris e intenta averiguar quiénes son sus verdaderos amigos, y dónde encaja en su vida enamorarse de un chico que unas veces resulta fascinante y otras la exaspera. Sin embargo, Tris también tiene un secreto, algo que no ha contado a nadie para no poner su vida en peligro. Cuando descubre un conflicto que amenaza con desbaratar la, en apariencia, perfecta sociedad en la que vive, también averigua que su secreto podría ser la clave para salvar a los que ama o... para acabar muerta.', 463),
(2, 'Insurgente', 'Novela', 'RBA Editorial Molino', 1, 'Una sola elección puede transformarte... o destruirte.\r\nSin embargo, toda elección tiene sus consecuencias, así que, cuando los disturbios se extienden por las facciones, Tris Prior debe seguir intentado salvar a sus seres queridos (y a sí misma), mientras se enfrenta a inquietantes dilemas sobre la pena y el perdón, la identidad y la lealtad, la política y el amor.\r\nEl día de la iniciación, lo normal el celebrar la victoria con la facción elegida; por desgracia, en el caso de Tris, el día acaba de una forma atroz. El conflicto entre las facciones y sus distintas ideologías se intensifica, y la guerra acecha en el horizonte.\r\nEl peligro en tiempos de guerra es que se debe escoger un bando, desvelar secretos... y las consecuencias de cada elección se convierten en algo aún más irrevocable y poderoso. Transformada por sus decisiones, pero también por los nuevos descubrimientos, los cambios en sus relaciones personales, la pena y la culpa que la obsesionan, Tris debe abrazar su divergencia por completo, aunque eso le suponga pérdidas insuperables.', 463),
(3, 'Si decido quedarme', 'Novela', 'Salamandra', 3, 'Mia tiene diecisiete años, un hermano pequeño de ocho, un padre músico y el don de tocar el chelo como los ángeles. Muy pronto se examinará para entrar en la prestigiosa escuela Juilliard, en Nueva York, y, si la admiten, deberá dejarlo todo; su ciudad, su familia, su novio y sus amigas. Aunque el chelo es su pasión, la decisión la inquieta desde hace unas semanas.\r\nUna mañana de febrero, la ciudad se levanta con un manto de nieve y las escuelas cierran. La joven y su familia aprovechan el asueto inesperado para salir de excursión en coche. Es un día perfecto, están relajados, escuchando música y charlando. Pero en un instante todo cambia. Un terrible accidente deja a Mia malherida en la cama de un hospital. Mientras su cuerpo se debate entre la vida y la muerte, la joven ha de elegir si desea seguir adelante. Y esa decisión es lo único que importa.\r\n', 185),
(4, 'Un beso en París', 'Novela', 'Plataforma', 2, 'La torre Eiffel, Amélie y un montón de reyes que se llaman Luis. Esto es todo lo que Anna conoce de Francia. Por eso, cuando sus padres le anuncian que pasará un año en un internado de París, la idea no acaba de convencerla.\r\nPero, en la Ciudad del Amor, conoce al chico ideal: Étienne St. Clair. Es listo, encantador y muy guapo. El único problema es que también tiene novia. ¿Conseguirá Anna el ansiado beso de su príncipe azul?', 480),
(5, 'Un regalo de mi gran amor', 'Novela', 'Alfaguara', 2, 'Doce romances de invierno, perfectos para noches frías y largas. Si te gustan las historias de navidad, las películas de navidad, los especiales de TV navideños, los episodios de navidad de tus series favoritas y, sobre todo, si te gustan las antologías de navidad, te vas a enamorar de \"Un regalo de mi gran amor\": doce historias de navidad por doce escritores bestsellers de juvenil, editado por la autora de éxito internacional Stephanie Perkins. Ya sea que celebres Navidad o Hanukkah, el Solsticio de invierno o el Año Nuevo aquí hay algo para todo el mundo. Tienes doce razones esta temporada para quedarte en casa y enamorarte.', 432);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--
-- Creación: 21-11-2018 a las 22:10:02
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `score` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_book` (`id_book`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- RELACIONES PARA LA TABLA `comment`:
--   `id_book`
--       `book` -> `id_book`
--   `id_user`
--       `user` -> `id_user`
--

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id_comment`, `comment`, `score`, `id_book`, `id_user`) VALUES
(1, 'Me encanto, Tris es lo más!', 5, 1, 1),
(2, 'Aburridoooo!', 2, 1, 2),
(3, 'Podria ser mejor.', 2, 4, 1),
(4, 'Me encanto!', 5, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--
-- Creación: 21-11-2018 a las 21:57:35
--

CREATE TABLE IF NOT EXISTS `image` (
  `id_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_book` int(11) NOT NULL,
  `route` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_image`),
  KEY `fk_id_book` (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `image`:
--   `id_book`
--       `book` -> `id_book`
--

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`id_image`, `id_book`, `route`) VALUES
(1, 1, 'images/divergente.jpg'),
(2, 2, 'images/insurgente.jpg'),
(3, 3, 'images/siDecidoQuedarme.jpg'),
(4, 4, 'images/unBesoEnParis.jpg'),
(5, 5, 'images/unRegaloDeMiGranAmor.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--
-- Creación: 21-11-2018 a las 21:57:32
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `user`:
--

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `name`, `mail`, `pass`, `is_admin`) VALUES
(1, 'Antonela', 'antonela@library.php', '$2y$10$EvOuDZm9WXWkYG8ahcx7su5VazCFH7YOgpKxEddWBUAHY.H7D/qaC', 1),
(2, 'Choy', 'choy@library.php', '$2y$10$EvOuDZm9WXWkYG8ahcx7su5VazCFH7YOgpKxEddWBUAHY.H7D/qaC', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_id_book` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
