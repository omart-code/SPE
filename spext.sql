-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 11:48:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spext`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acciones`
--

CREATE TABLE `acciones` (
  `id_accion` int(11) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `acciones`
--

INSERT INTO `acciones` (`id_accion`, `descripcion`) VALUES
(1, 'Enviar mail a l\'estudiant.'),
(2, 'Rebre la seva resposta al nostre correu.'),
(3, 'Enviar mail al tutor d\'empresa.'),
(4, 'Rebre la seva resposta al nostre correu.'),
(5, 'Enviar mail o trucar l\'estudiant per quedar.'),
(6, 'Rebre la seva resposta al nostre correu i concretar la data de la trobada.'),
(7, 'Entrevista de seguiment'),
(8, 'Enviar mail al tutor extern per poder fer una trucada o entrevista online.'),
(9, 'Rebre la seva resposta al nostre correu i concretar la data.'),
(10, 'Entrevista de seguiment'),
(11, 'Enviar mail o trucar l\'estudiant per quedar.'),
(12, 'Rebre la seva resposta al nostre correu i concretar la data de la trobada.'),
(13, 'Entrevista de seguiment'),
(14, 'Enviar mail a l\'estudiant.'),
(15, 'Rebre memòria de l\'estada.'),
(16, 'Confirmació de recepció.'),
(17, 'Enviar mail a la persona tutora de l\'entitat amb l\'informe que ha d\'omplir.'),
(18, 'Rebre confirmació del correu.'),
(19, 'Rebre informe de valoració de l\'estada de l\'estudiant i enviar agraïment per l\'informe'),
(20, 'Enviar mail amb la nota final. Per calcular la nota s\'ha de fer servir el document Excel de càlcul de notes.'),
(21, 'Enviar mail a la coordinació adjuntant els tres documents: memòria estudiant, informe entitat i informe nostre.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(7) NOT NULL,
  `niu_profesor` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos_estancias`
--

CREATE TABLE `archivos_estancias` (
  `id_archivo_estancia` int(10) NOT NULL,
  `id_estancia` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(10) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_estancia` int(10) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `mensaje`, `fecha`, `tipo`, `id_estancia`, `categoria`) VALUES
(129, '<p>Aquest estudiant ha estat contractat per l\'empresa</p>', '2021-04-28', 2, 1, 'Empresa'),
(132, '<p><b>T\'estic escrivint des del nou editor simplificat</b></p>', '2021-05-01', 1, 1, 'Estudiant'),
(133, '<p>Prova de comentari</p>', '2021-05-10', 1, 32, 'Estudiant'),
(134, '<p><b>Molt bona feina!</b></p>', '2021-05-14', 1, 35, 'Estudiant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores`
--

CREATE TABLE `coordinadores` (
  `niu_coordinador` int(7) NOT NULL,
  `id_grado` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `coordinadores`
--

INSERT INTO `coordinadores` (`niu_coordinador`, `id_grado`) VALUES
(1354975, 1),
(1415161, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre`, `fecha_inicio`, `fecha_fin`) VALUES
(1, '2020-2021', '2020-09-07', '2021-07-12'),
(2, '2021-2022', '2021-09-06', '2022-07-07'),
(8, '2020-2021', '2020-09-06', '2021-07-01'),
(12, '2021-2022', '2021-09-14', '2022-07-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_grados`
--

CREATE TABLE `cursos_grados` (
  `id_curso_grado` int(10) NOT NULL,
  `id_curso` int(10) NOT NULL,
  `id_grado` int(10) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos_grados`
--

INSERT INTO `cursos_grados` (`id_curso_grado`, `id_curso`, `id_grado`, `nombre`, `activo`) VALUES
(1, 1, 1, 'Grau en Enginyeria Informàtica / 2020-2021', 0),
(2, 1, 2, 'Grau en Enginyeria i Telecomunicacions / 2020-2021', 0),
(11, 2, 1, 'Grau en Enginyeria Informàtica / 2021-2022', 0),
(12, 1, 4, 'Grau en Enginyeria Química / 2020-2021', 0),
(13, 2, 4, 'Grau en Enginyeria Química / 2020-2021', 0),
(17, 12, 2, 'Grau en Enginyeria Informàtica i Telecomunicacions / 2021-2022', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `identificador` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre`, `siglas`, `identificador`) VALUES
(1, 'Microelectrònica i Sistemes Electrònics ', 'MiSE', 961),
(2, 'Arquitectura de Computadors i Sistemes Operatius', 'ACSO', 962),
(3, 'Enginyeria de la Informació i de les Comunicacions', 'EIC', 963),
(4, 'Ciències de la Computació', 'CC', 964),
(5, 'Ciencies Multimèdies', 'CMUL', 970),
(17, 'Big Data i Informació', 'BDI', 821),
(18, 'Mecànica de Fluids', 'MFLU', 823),
(19, 'Matemàtica Avançada i Dades', 'MAD', 721),
(20, 'Materials Quimics', 'MQ', 940),
(21, 'Intel·ligència de Dades', 'IDD', 980),
(23, 'Dades Complexes', 'DC', 235);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos_grado`
--

CREATE TABLE `departamentos_grado` (
  `id_departamento_grado` int(10) NOT NULL,
  `id_departamento` int(10) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos_grado`
--

INSERT INTO `departamentos_grado` (`id_departamento_grado`, `id_departamento`, `id_grado`) VALUES
(1, 2, 1),
(2, 4, 1),
(3, 3, 1),
(4, 1, 1),
(5, 5, 2),
(10, 17, 3),
(11, 18, 4),
(12, 19, 3),
(13, 20, 4),
(14, 21, 3),
(15, 22, 2),
(16, 22, 3),
(17, 23, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `nif` varchar(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `responsable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nif`, `nombre`, `email`, `telefono`, `direccion`, `responsable`) VALUES
(1, 'B6548754', 'Capitole Consulting SL', 'capitole-consulting@gmail.com', 934521452, 'Carrer de la Rieda de Miquel 10, entrepis', 'Jean Jack René'),
(2, 'B4578967', 'Kaptar SL', 'kaptarfactory@gmail.com', 658974123, 'Carrer de la majestad, 22', 'Carles Rodriguez'),
(3, 'B4269875', 'Amazon SL', 'amazon.info@gmail.com', 678968574, 'Av Llana. 23', 'Juan Mendoza'),
(23, '', ' Sogesoft', '', 0, '', ''),
(24, '', ' AgilSoft', '', 0, '', ''),
(25, '', 'Self Consultoria', '', 0, '', ''),
(26, '', ' Imnova', '', 0, '', ''),
(27, '', 'ChemiProds', '', 0, '', ''),
(28, '', ' Capgemini', '', 0, '', ''),
(29, '', ' SoldeSoft', '', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estancias`
--

CREATE TABLE `estancias` (
  `id_estancia` int(10) NOT NULL,
  `niu_estudiante` int(7) NOT NULL,
  `niu_profesor` int(7) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_tutor_externo` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `nota` float NOT NULL,
  `finalizada` tinyint(1) NOT NULL,
  `id_curso_grado` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estancias`
--

INSERT INTO `estancias` (`id_estancia`, `niu_estudiante`, `niu_profesor`, `fecha_inicio`, `fecha_fin`, `id_tutor_externo`, `id_empresa`, `nota`, `finalizada`, `id_curso_grado`) VALUES
(32, 1247896, 1275975, '2021-03-01', '2021-05-16', 1, 1, 0, 0, 1),
(34, 1469587, 1275975, '2021-05-10', '2021-07-30', 18, 23, 0, 0, 1),
(35, 1478951, 1275975, '2021-04-02', '2021-06-30', 19, 24, 0, 0, 1),
(44, 1486372, 1475289, '2021-04-14', '2021-06-29', 21, 26, 0, 0, 1),
(45, 1517193, 1478529, '2021-04-14', '2021-07-14', 22, 27, 0, 0, 12),
(46, 1598763, 1475289, '2021-05-01', '2021-06-30', 23, 28, 0, 0, 1),
(48, 1475866, 1234567, '2021-09-17', '2021-12-16', 0, 0, 0, 0, 11),
(49, 1533339, 1133669, '2021-04-13', '2021-07-30', 0, 0, 0, 0, 1),
(50, 1496358, 1326589, '2021-04-01', '2021-07-16', 0, 0, 0, 0, 1),
(53, 1468975, 1275975, '2021-04-14', '2021-07-30', 24, 29, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `niu_estudiante` int(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `id_mencion` int(9) NOT NULL,
  `id_grado` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`niu_estudiante`, `nombre`, `apellido`, `email`, `telefono`, `id_mencion`, `id_grado`) VALUES
(1247896, 'Oriol', 'Martínez Rubio', 'omart1881@gmail.com', 685405010, 1, 1),
(1468975, 'Josep Antoni', 'Carmona', 'jcarmona@gmail.com', 658964172, 4, 1),
(1469587, 'Sergi', 'Mas Torrent', 'sergimas@gmail.com', 652314789, 0, 0),
(1475866, 'Carles', 'Ballbé', '', 0, 0, 1),
(1478951, 'Nuria', 'Martí Bueno', 'nuriambueno@gmail.com', 652987412, 0, 0),
(1486372, 'Marc', 'Navarro Pérez', 'marcnavarro@gmail.com', 625148976, 2, 1),
(1496358, 'Daniel', 'Montuig', '', 0, 0, 1),
(1517193, 'Susana', 'Aranda Bonilla', 'susanaaranda@gmail.com', 658963214, 6, 4),
(1533339, 'Paula', 'Puig', '', 0, 0, 1),
(1598763, 'Marta', 'Pla Fornieles', 'martapfornieles@gmail.com', 685415111, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `id_etapa` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`id_etapa`, `nombre`) VALUES
(1, 'Fase Inicial'),
(2, 'Fase de Seguiment'),
(3, 'Fase Final');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `horas` int(4) NOT NULL,
  `codigo_asignatura` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nombre`, `siglas`, `horas`, `codigo_asignatura`) VALUES
(1, 'Grau en Enginyeria Informàtica', 'GEI', 300, 1472583),
(2, 'Grau en Enginyeria Informàtica i Telecomunicacions', 'GEIT', 600, 1478596),
(3, 'Enginyeria de Dades', 'ED', 300, 1472581),
(4, 'Enginyeria Química', 'EQ', 300, 1478599);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menciones`
--

CREATE TABLE `menciones` (
  `id_mencion` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `siglas` varchar(10) NOT NULL,
  `id_grado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menciones`
--

INSERT INTO `menciones` (`id_mencion`, `nombre`, `siglas`, `id_grado`) VALUES
(1, 'Tecnologies de la Informació', 'TIC', 1),
(2, 'Enginyeria del Software', 'ES', 1),
(3, 'Enginyeria de Computadors', 'EDC', 1),
(4, 'Enginyeria en Computació', 'EEC', 1),
(5, 'Tecnologia Ambiental', 'TA', 4),
(6, 'Materials Inorgànics', 'MI', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_profesor`
--

CREATE TABLE `mensajes_profesor` (
  `id_mensaje_profesor` int(10) NOT NULL,
  `id_tarea` int(10) NOT NULL,
  `mensaje` text NOT NULL,
  `niu_profesor` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes_profesor`
--

INSERT INTO `mensajes_profesor` (`id_mensaje_profesor`, `id_tarea`, `mensaje`, `niu_profesor`) VALUES
(1, 1, '<h5><b>Enviar mail a l\'estudiant - Proposta de Correu:</b></h5><p><b>Assumpte:</b> GEI - Pràctiques Externes - Com et va per l\'empresa?</p><p><b>Missatge:</b></p><p><font color=\"#003163\">Hola XXXXX,</font></p><p><font color=\"#003163\">Sóc XXXXXX, i m\'han assignat la tutoria de les teves pràctiques externes. Estic a la teva disposició pel que consideris convenient. Per si el necessites, el meu telèfon és el XXXXXXXX.</font></p><p><font color=\"#003163\">Com t\'ha anat l\'aterratge aquests primers dies? Has tingut algun problema? Estàs fent o faràs algun tipus de formació?</font></p><p><font color=\"#003163\">Contesta tan aviat com sigui possible. Tingues en compte que una part de la nota que poso com a tutor té en compte els aspectes de seguiment de l\'estada.</font></p><p><font color=\"#003163\">Salutacions,</font></p>                   ', 1275975),
(2, 2, '<h5><span style=\"font-weight: bolder;\">Enviar mail al tutor d\'empresa - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques en empresa UAB - NOM_ESTUDIANT</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolgut (benvolguda)</span><font color=\"#003163\">,</font></p><p><font color=\"#003163\">Sóc en </font><span style=\"color: rgb(0, 49, 99); background-color: rgb(255, 255, 0);\">XXXXX</span><font color=\"#003163\">, professor de l\'Escola d\'Enginyeria de la UAB i m\'han assignat com a tutor acadèmic de pràctiques de </font><b style=\"background-color: rgb(255, 255, 0);\">NOM_ESTUDIANT</b><font color=\"#003163\"> que ha començat la seva estada amb vosaltres fa uns dies. Espero que s\'integri perfectament al funcionament de l\'empresa i a l\'equip de treball en el que l\'heu assignat. Cal recordar, però, que es tracta d\'unes pràctiques, i que aquestes formen part del seu procés formatiu.Per nosaltres és molt important que, a més de poder posar en pràctica els coneixements que ha vist al llarg dels estudis i d\'adquirir-ne de nous, pugui treballar les competències relacionades amb el món laboral (treball en equip, resolució de problemes, gestió del temps, presa de decisions, comunicació, ..).</font></p><p><font color=\"#003163\">Estic a la vostra disposició pel que considereu. Podeu contactar amb mi a través d\'aquest correu o, si ho preferiu, al telèfon <span style=\"background-color: rgb(255, 255, 0);\">XXXXXXXXX</span>.</font></p><p><font color=\"#003163\">Més o menys a la meitat de l\'estada contactaré novament amb tu per saber com està anant tot i si l\'evolució de l\'estudiant és l\'esperada. Però si consideres que hem de parlar abans per qualsevol motiu que afecti l\'estada de l\'estudiant no dubtis en contactar amb mi el més ràpid possible.</font></p><p><font color=\"#003163\">Abans d\'acabar vull agrair-vos l\'oportunitat que li esteu donant a&nbsp;</font><span style=\"font-weight: bolder; background-color: rgb(255, 255, 0);\">NOM_ESTUDIANT</span><font color=\"#003163\">&nbsp;i el temps que li haureu de dedicar. Pensem que aquesta activitat és fonamental per completar el seu procés formatiu i per facilitar-li la futura integració en el món laboral.</font></p><p><font color=\"#003163\">Prego que confirmeu la recepció del correu.</font></p><p><font color=\"#003163\">Atentament,</font></p>     ', 1275975),
(3, 3, '<h5><span style=\"font-weight: bolder;\">Enviar mail a l\'estudiant - Proposta de Correu (també es pot fer una trucada):</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques en empresa - Seguiment</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p>Hola <span style=\"background-color: rgb(255, 255, 0);\">XXXXX,</span></p><p><font color=\"#003163\">Segons els meus càlculs ja has fet gairebé les primeres 100 hores de l\'estada. Espero que continuï tot bé. Hem de quedar un dia per fer la primera reunió de seguiment. Quina és la teva disponibilitat?&nbsp;</font></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p><h5><span style=\"font-weight: bolder;\">Proposta de temes a tractar en aquesta primera entrevista:</span></h5><ol><li>Explicar quin és el paper que desenvolupem els tutors acadèmics (suport, orientació, recomanació, interlocució amb l\'entitat col·laboradora si hi ha algun tema que es complica). Aprofitar per comentar com es fa l\'avaluació: 60% empresa + 40% tutor (memòria+seguiment).</li><li>Què tal van ser els primers dies i l\'acollida a l\'empresa?</li><li>Quantes hores portes? Com feu el control horari?</li><li>Què estàs fent? És el que et van dir?&nbsp; De quins recursos disposes?</li><li>Estàs aplicant coneixements apresos en assignatures del grau? En quines?</li><li>Estàs aprenent coses noves? Quines?</li><li>Treballeu en equip? Quants sou?</li><li>Tens alguna planificació de la teva feina? Tens uns objectius clars? Feu servir alguna eina per a la gestió dels projectes?</li><li>Què tal l\'horari? El desplaçament? I els companys?&nbsp;</li><li>Si és el cas, com ho estàs compaginant amb els estudis?</li><li>Què és el que més t\'agrada? I el que menys?</li><li>És el que t\'esperaves?</li><li>Comentar que haurà de fer la <a href=\"https://www.dropbox.com/s/0epgwmvysjci1zd/MemoriaEstudiantPractiquesExternes-20_21.docx?dl=0\" target=\"_blank\">memòria al final de l\'estada</a> i introduir el concepte d\'<b>Enginyeria Global </b>(mirar l\'<a href=\"https://www.dropbox.com/s/9slqy05iqy9osfy/GEI-AvaluacioPractiquesExternes-20_21.pdf?dl=0\" target=\"_blank\">annex corresponent del document d\'avaluació </a>per a més informació).&nbsp; <span style=\"background-color: rgb(255, 255, 0);\"><b>Un cop acabada la reunió enviar-li per mail el <a href=\"https://www.dropbox.com/s/0epgwmvysjci1zd/MemoriaEstudiantPractiquesExternes-20_21.docx?dl=0\" target=\"_blank\">model de memòria</a> (si encara no el té) i el <a href=\"https://www.dropbox.com/s/9slqy05iqy9osfy/GEI-AvaluacioPractiquesExternes-20_21.pdf?dl=0\" target=\"_blank\">document d\'avaluació</a>.</b>&nbsp;</span></li></ol><p><b>És important conèixer què fa l\'alumne però sobretot, que tingui un projecte clar del que ha de fer i les seves responsabilitats, i si no el té fer-li entendre que és imprescindible per fer bé la feina.</b></p><p><b><span style=\"background-color: rgb(255, 255, 0);\"></span></b></p><p><b>És important que assoleixi coneixements tècnics però, sobretot hi ha aspectes de relació laboral amb companys, planificació, relació amb superiors, saber demanar, etc... que és l\'oportunitat per començar a aprendre-ho i li hem de fer saber.</b></p>                           ', 1275975),
(4, 4, '<h5><span style=\"font-weight: bolder;\">Enviar mail al tutor - Proposta de Correu (també es pot fer una trucada directament):</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques externes UAB - Seguiment estada&nbsp;<span style=\"background-color: rgb(255, 255, 0);\">NOM-ESTUDIANT</span></p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolgut (benvolguda),</span></p><p><font color=\"#003163\">En </font><span style=\"background-color: rgb(255, 255, 0);\">NOM-ESTUDIANT</span><font color=\"#003163\">&nbsp;ja ha superat la meitat de l\'estada de pràctiques curriculars amb vosaltres i ens agradaria tenir una mica de feedback de com estan anant les coses. Quina és la teva disponibilitat per a una breu trucada telefònica o entrevista onlie?&nbsp;</font></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p><h5><span style=\"font-weight: bolder;\">Proposta de temes a tractar en aquesta primera entrevista:</span></h5><ol><li>Va tot bé? L\'estudiant s\'ha integrat bé a l\'empresa?</li><li>Li heu fet alguna formació concreta?</li><li>Consideres que la seva preparació és suficient per les tasques encomanades?</li><li>Està fent les tasques que havíeu planificat al principi o les heu hagut de canviar?</li><li>Està podent posar en pràctica les competències bàsiques del món laboral?</li><li>En quins aspectes creus que ha de millorar?</li><li>Comentar que al final de l\'estada li enviaràs un informe per avaluar l\'estada.</li></ol><p><b>Si diu que està molt ocupat i que no li va bé quedar, se li poden enviar les preguntes per mail i que les retorni quan pugui. Han d\'entendre que per nosaltres és molt important el seu feedback per ajudar l\'estudiant, així com per millorar el nostre programa de pràctiques i els estudis en general.</b></p>             l.', 1275975),
(5, 5, '<h5><span style=\"font-weight: bolder;\">Enviar mail a l\'estudiant - Proposta de Correu (també es pot fer una trucada):</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques en empresa - Seguiment (2a trobada)</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p>Hola&nbsp;<span style=\"background-color: rgb(255, 255, 0);\">XXXXX,</span></p><p><font color=\"#003163\">Espero que l\'estada de pràctiques continuï anant bé. Com que, s</font><span style=\"color: rgb(0, 49, 99);\">egons els meus càlculs, ja has fet unes 200 hores hem de quedar una alta vegada per fer la segona reunió de seguiment. Quina és la teva disponibilitat?&nbsp;</span></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p><h5><span style=\"font-weight: bolder;\">Proposta de temes a tractar en aquesta segona trobada:</span></h5><ol><li>Va tot bé? Hi ha algun tema que et preocupi?</li><li>Què fa exactament la teva empresa? A què es dedica? Quants empleats sou? Quins són els clients principals?</li><li>I tu, quin paper jugues en tota aquesta estructura? És rellevant la teva feina? T\'assignen feines de responsabilitat?</li><li>Et veus aquí en un futur? Fent què?</li><li>Creus que tens els recursos adequats per fer la teva feina? T\'expliquen bé el que has de fer? T\'has de buscar molt la vida?&nbsp;</li><li>El teu tutor d\'empresa fa el seguiment de la feina que fas?</li><li>Treballes organitzat? Feu servir alguna metodologia o eina per a organitzar-vos?</li><li>S\'està complint el que et van comentar? Treballes les hores que es van posar al conveni?</li><li>Fer un repàs dels punts relacionats amb l’Enginyer Global.</li><li>Què és el que més t\'agrada? I el que més et desagrada? Què faries per millorar-ho?</li><li>Què creus que has après? I de tot això què creus que és el més important?</li><li>T\'està agradant això de les pràctiques? Milloraries alguna cosa del programa?</li></ol><p><b>La idea és que l\'alumne transcendeixi de la seva pròpia tasca i entengui que es troba en una organització amb necessitats més complexes que la seva feina. Que prengui consciència d\'aquesta realitat més àmplia per si no la té.</b></p><p><b>També és important fer-li entendre que ha de tenir un esperit de gratitud pel que està rebent però també crític, tenint en compte que depèn d\'ell que les coses millorin.</b></p>         ', 1275975),
(6, 6, '<h5><span style=\"font-weight: bolder;\">Enviar mail a l\'estudiant - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques Externes - Finalització de l\'estada</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><font color=\"#003163\">Hola </font><span style=\"background-color: rgb(255, 255, 0);\">XXXXX</span><font color=\"#003163\">,</font></p><p><font color=\"#003163\">Segons em consta, el dia </font><span style=\"background-color: rgb(255, 255, 0);\">XXX</span><font color=\"#003163\"> acaba la teva estada de pràctiques a l’empresa. Hauràs pogut completar les 300 hores de pràctiques? Si no hi has arribat es pot fer una addenda al conveni i posar una nova data d\'acabament, però ho hauríem de saber ràpid per contactar amb l\'empresa i preparar la documentació.</font></p><p><font color=\"#003163\">Espero que tot estigui anant bé i que no hagi aparegut cap problema des de la darrera vegada que vàrem parlar.</font></p><p><font color=\"#003163\">Com ja vam comentar, al final de l\'estada has de lliurar la memòria que ha d\'ocupar entre 9 i 12 pàgines. No et deixis de contestar cap pregunta, ni les de l\'annex (consulta el document d\'avaluació si tens algun dubte).</font></p><p><font color=\"#003163\">Me l\'has d\'enviar per mail, en format pdf, en un termini màxim de 10 dies un cop acabada l\'estada. Recorda mantenir el secret professional sobre qualsevol informació confidencial de l\'entitat col·laboradora que coneguis com a conseqüència de la realització de les pràctiques. Si tens algun dubte en algun apartat, m\'ho dius.</font></p><p><font color=\"#003163\">Per cert, t\'han ofert la possibilitat de continuar amb ells ja sigui amb un conveni de pràctiques no curriculars o amb un contracte laboral? Si és que sí, has acceptat? Si no has acceptat, quin és el motiu?</font></p><p><font color=\"#003163\">Ja saps que em tens a la teva disposició per a tot allò que necessitis.</font></p><p><font color=\"#003163\">Salutacions,</font></p><p><font color=\"#003163\">----</font></p><p><span style=\"font-weight: bolder;\">A la recepció de la memòria hem de confirmar que l\'hem rebut&nbsp; Li podem dir que quan tinguem l\'informe de la persona tutora de l\'entitat ja li comunicaràs la nota final de l\'estada.</span></p>          ', 1275975),
(7, 7, '<h5><span style=\"font-weight: bolder;\">Enviar mail a la persona tutora de l\'entitat amb l\'informe que ha d\'omplir - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques en empresa UAB – Finalització de l\'estada de<span style=\"background-color: rgb(255, 255, 0);\"> NOM_ESTUDIANT</span></p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolguda, (Benvolgut)</span></p><p><font color=\"#003163\">Segons ens consta està a punt d\'acabar l\'estada de pràctiques curriculars de </font><span style=\"background-color: rgb(255, 255, 0);\">NOM_ESTUDIANT</span><font color=\"#003163\">.</font></p><p><font color=\"#003163\">Ha arribat, doncs, el moment de preparar la documentació final. Per la vostra part heu de redactar un informe que ens ha de servir per a la seva avaluació i també per a introduir millores en el nostre programa de pràctiques de cara a properes edicions.</font></p><p><font color=\"#003163\">És per això que t\'adjunto el model d\'informe que hauries d\'omplir i retornar-me per correu electrònic (signat, si és possible) en un termini màxim de 10 dies un cop acabada l\'estada. Aquest informe és confidencial (l\'estudiant no l\'ha de rebre) i només serà utilitzat per les persones avaluadores i per la coordinació del programa de pràctiques. És molt important que compliu el termini per poder posar la nota final a l\'expedient de l\'estudiant.</font></p><p><font color=\"#003163\">Finalment et vull agrair la teva col·laboració i el suport i formació que has donat al nostre </font><span style=\"background-color: rgb(255, 255, 0);\">(a la nostra)</span><font color=\"#003163\"> estudiant al llarg de l\'estada. Espero que l\'experiència també hagi sigut profitosa per vosaltres.</font></p><p><font color=\"#003163\">Em tens a la teva disposició per a tot allò que consideris.</font></p><p><font color=\"#003163\">Prego que confirmis la recepció del correu.</font></p><p><font color=\"#003163\">Atentament,</font></p><p><span style=\"font-weight: bolder;\">Recordar adjuntar l\'<a href=\"https://www.dropbox.com/s/pfe4ginp55mw2ky/InformeTutorExternPractiquesExternesGEI.pdf?dl=0\" target=\"_blank\">informe</a> en el correu.</span></p><p><span style=\"font-weight: bolder;\">----</span></p><p><span style=\"font-weight: bolder;\">Un cop rebut l\'informe es pot enviar un altre missatge d\'agraïment final:</span></p><h5><span style=\"font-weight: bolder;\">Enviar mail final d\'agraïment a la persona tutora - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques en empresa UAB – Recepció informe valoració de&nbsp;<span style=\"background-color: rgb(255, 255, 0);\">&nbsp;NOM_ESTUDIANT</span></p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolguda, (Benvolgut)</span></p><p><font color=\"#003163\">Hem rebut correctament el vostre informe. Moltes gràcies pel temps que hi heu dedicat.</font></p><p><font color=\"#ff0000\">[Estem molt satisfets de la valoració que heu fet de la feina de NOM_ESTUDIANT]. <b>(Si és el cas)</b></font></p><p><span style=\"color: rgb(0, 49, 99);\">Esperem poder continuar col·laborant amb vosaltres en properes ocasions.</span></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p>       ', 1275975),
(8, 8, '<h5><span style=\"font-weight: bolder;\">Enviar mail final a l\'estudiant - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques externes - Nota final</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"color: rgb(0, 49, 99);\">Hola</span><span style=\"background-color: rgb(255, 255, 0);\"> XXXXX</span><span style=\"color: rgb(0, 49, 99);\">,</span></p><p><font color=\"#003163\">La nota final de les pràctiques és un </font><span style=\"background-color: rgb(255, 255, 0);\">XX</span><font color=\"#003163\">, enhorabona per la feina feta. D\'aquí uns dies tindràs la nota a l\'expedient. La nota de l\'empresa és un </font><span style=\"background-color: rgb(255, 255, 0);\">XX</span><font color=\"#003163\"> (60% nota final) i la meva un </font><span style=\"background-color: rgb(255, 255, 0);\">XX</span><font color=\"#003163\"> (40% restant).</font></p><p><font color=\"#003163\">Des de l\'empresa et recomanen </font><span style=\"background-color: rgb(255, 255, 0);\">......</span></p><p><font color=\"#003163\">Per part meva et diria</font><span style=\"background-color: rgb(255, 255, 0);\"> .....</span></p><p><font color=\"#003163\">Per tal de millorar el funcionament de l\'assignatura hem preparat una petita enquesta, que es contesta en menys de 2 minuts, que agrairíem que contestessis per expressar la teva opinió.</font></p><p><font color=\"#003163\">Enllaç a l\'enquesta:&nbsp;<a href=\"https://forms.gle/ZfonfmmLxNfja9DT8\" target=\"_blank\">https://forms.gle/ZfonfmmLxNfja9DT8</a></font></p><p><font color=\"#003163\">Moltes gràcies per la teva col·laboració. Espero que l\'experiència hagi sigut molt positiva.</font></p><p><font color=\"#003163\">Molta sort,</font></p>', 1275975),
(9, 9, '', 1275975);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `niu_profesor` int(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `id_departamento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`niu_profesor`, `nombre`, `apellido`, `email`, `telefono`, `id_departamento`) VALUES
(1133669, 'Pere', 'Ferrer', 'pereferre@gmail.com', 689541278, 1),
(1200124, 'Carles', 'Coromina', 'carlescoromines@gmail.com', 722568412, 17),
(1234567, 'Laia', 'Pineda', 'laiapineda@gmail.com', 722894512, 2),
(1275975, 'Jordi', 'Pons Aróztegui', 'jordi.pons@gmail.com', 614759758, 1),
(1326589, 'Jaume', 'Parera', 'jaumeparera@gmail.com', 659214578, 19),
(1463547, 'Paco', 'Palos', 'pacopalos@gmail.com', 650380412, 3),
(1473265, 'Carles', 'Garcia', 'carlesgar@gmail.com', 685721496, 3),
(1475289, 'Carles', 'Torrella', 'carlestorrella@gmail.com', 698542147, 2),
(1478529, 'Alfons', 'Martínez', 'alfonsmar@gmail.com', 650390845, 3),
(1479638, 'Pere', 'Casajuana', 'perecasajuana@gmail.com', 722658974, 17),
(1748598, 'Joan', 'Martorell', 'joanmartorell@gmail.com', 722454849, 2),
(14635472, 'Paco', 'Palos', 'pacopalos@gmail.com', 650380214, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_curso_grado`
--

CREATE TABLE `profesores_curso_grado` (
  `id_profesor_curso_grado` int(10) NOT NULL,
  `id_curso_grado` int(10) NOT NULL,
  `niu_profesor` int(7) NOT NULL,
  `max_estudiantes` int(3) NOT NULL DEFAULT 0,
  `estudiantes_asignados` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores_curso_grado`
--

INSERT INTO `profesores_curso_grado` (`id_profesor_curso_grado`, `id_curso_grado`, `niu_profesor`, `max_estudiantes`, `estudiantes_asignados`) VALUES
(1, 1, 1275975, 20, 4),
(2, 11, 1275975, 18, 0),
(3, 1, 1475289, 15, 2),
(4, 1, 1133669, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` int(10) NOT NULL,
  `id_etapa` int(10) NOT NULL,
  `id_curso_grado` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `informacion` text NOT NULL,
  `mensaje` text NOT NULL,
  `accion1` int(11) NOT NULL,
  `accion2` int(11) NOT NULL,
  `accion3` int(11) NOT NULL,
  `numero_acciones` int(2) NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `id_etapa`, `id_curso_grado`, `nombre`, `informacion`, `mensaje`, `accion1`, `accion2`, `accion3`, `numero_acciones`, `porcentaje`) VALUES
(1, 1, 1, 'Contacte inicial amb l\'estudiant', '1-Enviar mail a l\'estudiant.\r\n2-Rebre la seva resposta al nostre correu.', '<h5><b>Enviar mail a l\'estudiant - Proposta de Correu:</b></h5><p><b>Assumpte:</b> GEI - Pràctiques Externes - Com et va per l\'empresa?</p><p><b>Missatge:</b></p><p><font color=\"#003163\">Hola XXXXX,</font></p><p><font color=\"#003163\">Sóc XXXXXX, i m\'han assignat la tutoria de les teves pràctiques externes. Estic a la teva disposició pel que consideris convenient. Per si el necessites, el meu telèfon és el XXXXXXXX.</font></p><p><font color=\"#003163\">Com t\'ha anat l\'aterratge aquests primers dies? Has tingut algun problema? Estàs fent o faràs algun tipus de formació?</font></p><p><font color=\"#003163\">Contesta tan aviat com sigui possible. Tingues en compte que una part de la nota que poso com a tutor té en compte els aspectes de seguiment de l\'estada.</font></p><p><font color=\"#003163\">Salutacions,</font></p>                   ', 1, 2, 0, 2, 5),
(2, 1, 1, 'Contacte inicial amb l\'empresa', '1-Enviar mail al tutor d\'empresa.\r\n2-Rebre la seva resposta al nostre correu.', '<h5><span style=\"font-weight: bolder;\">Enviar mail al tutor d\'empresa - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques en empresa UAB - NOM_ESTUDIANT</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolgut (benvolguda)</span><font color=\"#003163\">,</font></p><p><font color=\"#003163\">Sóc en </font><span style=\"color: rgb(0, 49, 99); background-color: rgb(255, 255, 0);\">XXXXX</span><font color=\"#003163\">, professor de l\'Escola d\'Enginyeria de la UAB i m\'han assignat com a tutor acadèmic de pràctiques de </font><b style=\"background-color: rgb(255, 255, 0);\">NOM_ESTUDIANT</b><font color=\"#003163\"> que ha començat la seva estada amb vosaltres fa uns dies. Espero que s\'integri perfectament al funcionament de l\'empresa i a l\'equip de treball en el que l\'heu assignat. Cal recordar, però, que es tracta d\'unes pràctiques, i que aquestes formen part del seu procés formatiu.Per nosaltres és molt important que, a més de poder posar en pràctica els coneixements que ha vist al llarg dels estudis i d\'adquirir-ne de nous, pugui treballar les competències relacionades amb el món laboral (treball en equip, resolució de problemes, gestió del temps, presa de decisions, comunicació, ..).</font></p><p><font color=\"#003163\">Estic a la vostra disposició pel que considereu. Podeu contactar amb mi a través d\'aquest correu o, si ho preferiu, al telèfon <span style=\"background-color: rgb(255, 255, 0);\">XXXXXXXXX</span>.</font></p><p><font color=\"#003163\">Més o menys a la meitat de l\'estada contactaré novament amb tu per saber com està anant tot i si l\'evolució de l\'estudiant és l\'esperada. Però si consideres que hem de parlar abans per qualsevol motiu que afecti l\'estada de l\'estudiant no dubtis en contactar amb mi el més ràpid possible.</font></p><p><font color=\"#003163\">Abans d\'acabar vull agrair-vos l\'oportunitat que li esteu donant a&nbsp;</font><span style=\"font-weight: bolder; background-color: rgb(255, 255, 0);\">NOM_ESTUDIANT</span><font color=\"#003163\">&nbsp;i el temps que li haureu de dedicar. Pensem que aquesta activitat és fonamental per completar el seu procés formatiu i per facilitar-li la futura integració en el món laboral.</font></p><p><font color=\"#003163\">Prego que confirmeu la recepció del correu.</font></p><p><font color=\"#003163\">Atentament,</font></p>     ', 3, 4, 0, 2, 5),
(3, 2, 1, 'Primera entrevista de seguiment amb l\'estudiant', '1-Enviar mail o trucar l\'estudiant per quedar.\r\n2-Rebre la seva resposta al nostre correu i concretar la data de la trobada.\r\n3-Entrevista de seguiment', '<h5><span style=\"font-weight: bolder;\">Enviar mail a l\'estudiant - Proposta de Correu (també es pot fer una trucada):</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques en empresa - Seguiment</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p>Hola <span style=\"background-color: rgb(255, 255, 0);\">XXXXX,</span></p><p><font color=\"#003163\">Segons els meus càlculs ja has fet gairebé les primeres 100 hores de l\'estada. Espero que continuï tot bé. Hem de quedar un dia per fer la primera reunió de seguiment. Quina és la teva disponibilitat?&nbsp;</font></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p><h5><span style=\"font-weight: bolder;\">Proposta de temes a tractar en aquesta primera entrevista:</span></h5><ol><li>Explicar quin és el paper que desenvolupem els tutors acadèmics (suport, orientació, recomanació, interlocució amb l\'entitat col·laboradora si hi ha algun tema que es complica). Aprofitar per comentar com es fa l\'avaluació: 60% empresa + 40% tutor (memòria+seguiment).</li><li>Què tal van ser els primers dies i l\'acollida a l\'empresa?</li><li>Quantes hores portes? Com feu el control horari?</li><li>Què estàs fent? És el que et van dir?&nbsp; De quins recursos disposes?</li><li>Estàs aplicant coneixements apresos en assignatures del grau? En quines?</li><li>Estàs aprenent coses noves? Quines?</li><li>Treballeu en equip? Quants sou?</li><li>Tens alguna planificació de la teva feina? Tens uns objectius clars? Feu servir alguna eina per a la gestió dels projectes?</li><li>Què tal l\'horari? El desplaçament? I els companys?&nbsp;</li><li>Si és el cas, com ho estàs compaginant amb els estudis?</li><li>Què és el que més t\'agrada? I el que menys?</li><li>És el que t\'esperaves?</li><li>Comentar que haurà de fer la <a href=\"https://www.dropbox.com/s/0epgwmvysjci1zd/MemoriaEstudiantPractiquesExternes-20_21.docx?dl=0\" target=\"_blank\">memòria al final de l\'estada</a> i introduir el concepte d\'<b>Enginyeria Global </b>(mirar l\'<a href=\"https://www.dropbox.com/s/9slqy05iqy9osfy/GEI-AvaluacioPractiquesExternes-20_21.pdf?dl=0\" target=\"_blank\">annex corresponent del document d\'avaluació </a>per a més informació).&nbsp; <span style=\"background-color: rgb(255, 255, 0);\"><b>Un cop acabada la reunió enviar-li per mail el <a href=\"https://www.dropbox.com/s/0epgwmvysjci1zd/MemoriaEstudiantPractiquesExternes-20_21.docx?dl=0\" target=\"_blank\">model de memòria</a> (si encara no el té) i el <a href=\"https://www.dropbox.com/s/9slqy05iqy9osfy/GEI-AvaluacioPractiquesExternes-20_21.pdf?dl=0\" target=\"_blank\">document d\'avaluació</a>.</b>&nbsp;</span></li></ol><p><b>És important conèixer què fa l\'alumne però sobretot, que tingui un projecte clar del que ha de fer i les seves responsabilitats, i si no el té fer-li entendre que és imprescindible per fer bé la feina.</b></p><p><b><span style=\"background-color: rgb(255, 255, 0);\"></span></b></p><p><b>És important que assoleixi coneixements tècnics però, sobretot hi ha aspectes de relació laboral amb companys, planificació, relació amb superiors, saber demanar, etc... que és l\'oportunitat per començar a aprendre-ho i li hem de fer saber.</b></p>                           ', 5, 6, 7, 3, 30),
(4, 2, 1, 'Seguiment amb el tutor extern', '1-Enviar mail al tutor extern per poder fer una trucada o entrevista online.\r\n2-Rebre la seva resposta al nostre correu i concretar la data.\r\n3-Entrevista de seguiment', '<h5><span style=\"font-weight: bolder;\">Enviar mail al tutor - Proposta de Correu (també es pot fer una trucada directament):</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques externes UAB - Seguiment estada&nbsp;<span style=\"background-color: rgb(255, 255, 0);\">NOM-ESTUDIANT</span></p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolgut (benvolguda),</span></p><p><font color=\"#003163\">En </font><span style=\"background-color: rgb(255, 255, 0);\">NOM-ESTUDIANT</span><font color=\"#003163\">&nbsp;ja ha superat la meitat de l\'estada de pràctiques curriculars amb vosaltres i ens agradaria tenir una mica de feedback de com estan anant les coses. Quina és la teva disponibilitat per a una breu trucada telefònica o entrevista onlie?&nbsp;</font></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p><h5><span style=\"font-weight: bolder;\">Proposta de temes a tractar en aquesta primera entrevista:</span></h5><ol><li>Va tot bé? L\'estudiant s\'ha integrat bé a l\'empresa?</li><li>Li heu fet alguna formació concreta?</li><li>Consideres que la seva preparació és suficient per les tasques encomanades?</li><li>Està fent les tasques que havíeu planificat al principi o les heu hagut de canviar?</li><li>Està podent posar en pràctica les competències bàsiques del món laboral?</li><li>En quins aspectes creus que ha de millorar?</li><li>Comentar que al final de l\'estada li enviaràs un informe per avaluar l\'estada.</li></ol><p><b>Si diu que està molt ocupat i que no li va bé quedar, se li poden enviar les preguntes per mail i que les retorni quan pugui. Han d\'entendre que per nosaltres és molt important el seu feedback per ajudar l\'estudiant, així com per millorar el nostre programa de pràctiques i els estudis en general.</b></p>             l.', 8, 9, 10, 3, 50),
(5, 2, 1, 'Segona entrevista de seguiment amb l\'estudiant', '1-Enviar mail o trucar l\'estudiant per quedar.\r\n2-Rebre la seva resposta al nostre correu i concretar la data de la trobada.\r\n3-Entrevista de seguiment', '<h5><span style=\"font-weight: bolder;\">Enviar mail a l\'estudiant - Proposta de Correu (també es pot fer una trucada):</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques en empresa - Seguiment (2a trobada)</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p>Hola&nbsp;<span style=\"background-color: rgb(255, 255, 0);\">XXXXX,</span></p><p><font color=\"#003163\">Espero que l\'estada de pràctiques continuï anant bé. Com que, s</font><span style=\"color: rgb(0, 49, 99);\">egons els meus càlculs, ja has fet unes 200 hores hem de quedar una alta vegada per fer la segona reunió de seguiment. Quina és la teva disponibilitat?&nbsp;</span></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p><h5><span style=\"font-weight: bolder;\">Proposta de temes a tractar en aquesta segona trobada:</span></h5><ol><li>Va tot bé? Hi ha algun tema que et preocupi?</li><li>Què fa exactament la teva empresa? A què es dedica? Quants empleats sou? Quins són els clients principals?</li><li>I tu, quin paper jugues en tota aquesta estructura? És rellevant la teva feina? T\'assignen feines de responsabilitat?</li><li>Et veus aquí en un futur? Fent què?</li><li>Creus que tens els recursos adequats per fer la teva feina? T\'expliquen bé el que has de fer? T\'has de buscar molt la vida?&nbsp;</li><li>El teu tutor d\'empresa fa el seguiment de la feina que fas?</li><li>Treballes organitzat? Feu servir alguna metodologia o eina per a organitzar-vos?</li><li>S\'està complint el que et van comentar? Treballes les hores que es van posar al conveni?</li><li>Fer un repàs dels punts relacionats amb l’Enginyer Global.</li><li>Què és el que més t\'agrada? I el que més et desagrada? Què faries per millorar-ho?</li><li>Què creus que has après? I de tot això què creus que és el més important?</li><li>T\'està agradant això de les pràctiques? Milloraries alguna cosa del programa?</li></ol><p><b>La idea és que l\'alumne transcendeixi de la seva pròpia tasca i entengui que es troba en una organització amb necessitats més complexes que la seva feina. Que prengui consciència d\'aquesta realitat més àmplia per si no la té.</b></p><p><b>També és important fer-li entendre que ha de tenir un esperit de gratitud pel que està rebent però també crític, tenint en compte que depèn d\'ell que les coses millorin.</b></p>         ', 11, 12, 13, 3, 60),
(6, 3, 1, 'Avís a l\'estudiant de la finalització de l\'estada', '1-Enviar mail a l\'estudiant.\r\n2-Rebre memòria de l\'estada.\r\n3-Confirmació de recepció.', '<h5><span style=\"font-weight: bolder;\">Enviar mail a l\'estudiant - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques Externes - Finalització de l\'estada</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><font color=\"#003163\">Hola </font><span style=\"background-color: rgb(255, 255, 0);\">XXXXX</span><font color=\"#003163\">,</font></p><p><font color=\"#003163\">Segons em consta, el dia </font><span style=\"background-color: rgb(255, 255, 0);\">XXX</span><font color=\"#003163\"> acaba la teva estada de pràctiques a l’empresa. Hauràs pogut completar les 300 hores de pràctiques? Si no hi has arribat es pot fer una addenda al conveni i posar una nova data d\'acabament, però ho hauríem de saber ràpid per contactar amb l\'empresa i preparar la documentació.</font></p><p><font color=\"#003163\">Espero que tot estigui anant bé i que no hagi aparegut cap problema des de la darrera vegada que vàrem parlar.</font></p><p><font color=\"#003163\">Com ja vam comentar, al final de l\'estada has de lliurar la memòria que ha d\'ocupar entre 9 i 12 pàgines. No et deixis de contestar cap pregunta, ni les de l\'annex (consulta el document d\'avaluació si tens algun dubte).</font></p><p><font color=\"#003163\">Me l\'has d\'enviar per mail, en format pdf, en un termini màxim de 10 dies un cop acabada l\'estada. Recorda mantenir el secret professional sobre qualsevol informació confidencial de l\'entitat col·laboradora que coneguis com a conseqüència de la realització de les pràctiques. Si tens algun dubte en algun apartat, m\'ho dius.</font></p><p><font color=\"#003163\">Per cert, t\'han ofert la possibilitat de continuar amb ells ja sigui amb un conveni de pràctiques no curriculars o amb un contracte laboral? Si és que sí, has acceptat? Si no has acceptat, quin és el motiu?</font></p><p><font color=\"#003163\">Ja saps que em tens a la teva disposició per a tot allò que necessitis.</font></p><p><font color=\"#003163\">Salutacions,</font></p><p><font color=\"#003163\">----</font></p><p><span style=\"font-weight: bolder;\">A la recepció de la memòria hem de confirmar que l\'hem rebut&nbsp; Li podem dir que quan tinguem l\'informe de la persona tutora de l\'entitat ja li comunicaràs la nota final de l\'estada.</span></p>          ', 14, 15, 16, 3, 90),
(7, 3, 1, 'Avís al tutor extern de la finalització de l\'estada', '1-Enviar mail a la persona tutora de l\'entitat amb l\'informe que ha d\'omplir.\r\n2-Rebre confirmació del correu.\r\n3-Rebre informe de valoració de l\'estada de l\'estudiant i enviar agraïment per l\'informe', '<h5><span style=\"font-weight: bolder;\">Enviar mail a la persona tutora de l\'entitat amb l\'informe que ha d\'omplir - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques en empresa UAB – Finalització de l\'estada de<span style=\"background-color: rgb(255, 255, 0);\"> NOM_ESTUDIANT</span></p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolguda, (Benvolgut)</span></p><p><font color=\"#003163\">Segons ens consta està a punt d\'acabar l\'estada de pràctiques curriculars de </font><span style=\"background-color: rgb(255, 255, 0);\">NOM_ESTUDIANT</span><font color=\"#003163\">.</font></p><p><font color=\"#003163\">Ha arribat, doncs, el moment de preparar la documentació final. Per la vostra part heu de redactar un informe que ens ha de servir per a la seva avaluació i també per a introduir millores en el nostre programa de pràctiques de cara a properes edicions.</font></p><p><font color=\"#003163\">És per això que t\'adjunto el model d\'informe que hauries d\'omplir i retornar-me per correu electrònic (signat, si és possible) en un termini màxim de 10 dies un cop acabada l\'estada. Aquest informe és confidencial (l\'estudiant no l\'ha de rebre) i només serà utilitzat per les persones avaluadores i per la coordinació del programa de pràctiques. És molt important que compliu el termini per poder posar la nota final a l\'expedient de l\'estudiant.</font></p><p><font color=\"#003163\">Finalment et vull agrair la teva col·laboració i el suport i formació que has donat al nostre </font><span style=\"background-color: rgb(255, 255, 0);\">(a la nostra)</span><font color=\"#003163\"> estudiant al llarg de l\'estada. Espero que l\'experiència també hagi sigut profitosa per vosaltres.</font></p><p><font color=\"#003163\">Em tens a la teva disposició per a tot allò que consideris.</font></p><p><font color=\"#003163\">Prego que confirmis la recepció del correu.</font></p><p><font color=\"#003163\">Atentament,</font></p><p><span style=\"font-weight: bolder;\">Recordar adjuntar l\'<a href=\"https://www.dropbox.com/s/pfe4ginp55mw2ky/InformeTutorExternPractiquesExternesGEI.pdf?dl=0\" target=\"_blank\">informe</a> en el correu.</span></p><p><span style=\"font-weight: bolder;\">----</span></p><p><span style=\"font-weight: bolder;\">Un cop rebut l\'informe es pot enviar un altre missatge d\'agraïment final:</span></p><h5><span style=\"font-weight: bolder;\">Enviar mail final d\'agraïment a la persona tutora - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;Pràctiques en empresa UAB – Recepció informe valoració de&nbsp;<span style=\"background-color: rgb(255, 255, 0);\">&nbsp;NOM_ESTUDIANT</span></p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"background-color: rgb(255, 255, 0);\">Benvolguda, (Benvolgut)</span></p><p><font color=\"#003163\">Hem rebut correctament el vostre informe. Moltes gràcies pel temps que hi heu dedicat.</font></p><p><font color=\"#ff0000\">[Estem molt satisfets de la valoració que heu fet de la feina de NOM_ESTUDIANT]. <b>(Si és el cas)</b></font></p><p><span style=\"color: rgb(0, 49, 99);\">Esperem poder continuar col·laborant amb vosaltres en properes ocasions.</span></p><p><span style=\"color: rgb(0, 49, 99);\">Salutacions,</span></p>       ', 17, 18, 19, 3, 90),
(8, 3, 1, 'Notificació de la nota final a l\'alumne', 'Enviar mail amb la nota final. Per calcular la nota s\'ha de fer servir el document Excel de càlcul de notes.', '<h5><span style=\"font-weight: bolder;\">Enviar mail final a l\'estudiant - Proposta de Correu:</span></h5><p><span style=\"font-weight: bolder;\">Assumpte:</span>&nbsp;GEI - Pràctiques externes - Nota final</p><p><span style=\"font-weight: bolder;\">Missatge:</span></p><p><span style=\"color: rgb(0, 49, 99);\">Hola</span><span style=\"background-color: rgb(255, 255, 0);\"> XXXXX</span><span style=\"color: rgb(0, 49, 99);\">,</span></p><p><font color=\"#003163\">La nota final de les pràctiques és un </font><span style=\"background-color: rgb(255, 255, 0);\">XX</span><font color=\"#003163\">, enhorabona per la feina feta. D\'aquí uns dies tindràs la nota a l\'expedient. La nota de l\'empresa és un </font><span style=\"background-color: rgb(255, 255, 0);\">XX</span><font color=\"#003163\"> (60% nota final) i la meva un </font><span style=\"background-color: rgb(255, 255, 0);\">XX</span><font color=\"#003163\"> (40% restant).</font></p><p><font color=\"#003163\">Des de l\'empresa et recomanen </font><span style=\"background-color: rgb(255, 255, 0);\">......</span></p><p><font color=\"#003163\">Per part meva et diria</font><span style=\"background-color: rgb(255, 255, 0);\"> .....</span></p><p><font color=\"#003163\">Per tal de millorar el funcionament de l\'assignatura hem preparat una petita enquesta, que es contesta en menys de 2 minuts, que agrairíem que contestessis per expressar la teva opinió.</font></p><p><font color=\"#003163\">Enllaç a l\'enquesta:&nbsp;<a href=\"https://forms.gle/ZfonfmmLxNfja9DT8\" target=\"_blank\">https://forms.gle/ZfonfmmLxNfja9DT8</a></font></p><p><font color=\"#003163\">Moltes gràcies per la teva col·laboració. Espero que l\'experiència hagi sigut molt positiva.</font></p><p><font color=\"#003163\">Molta sort,</font></p>', 20, 0, 0, 1, 100),
(9, 3, 1, 'Enviament d\'informes al coordinador', '1-Enviar mail a la coordinació adjuntant els tres documents: memòria estudiant, informe entitat i informe nostre.\r\n', '', 21, 0, 0, 1, 100),
(10, 1, 17, 'Contacte inicial amb el estudiant', '1-Enviar mail al estudiant.\r\n                        2-Rebre la seva resposta al nostre correu. ', ' ', 1, 2, 0, 2, 5),
(11, 1, 17, 'Contacte inicial amb la empresa', '1-Enviar mail al tutor de la empresa. 2-Rebre la seva resposta al nostre correu.', ' ', 3, 4, 0, 2, 5),
(12, 2, 17, 'Primera entrevista de seguiment amb el estudiant', '1-Enviar mail o trucar al estudiant per quedar. 2-Rebre la seva resposta al nostre correu i concretar el dia de la trobada. 3-Entrevista de seguiment ', ' ', 5, 6, 7, 3, 30),
(13, 2, 17, 'Seguiment amb el tutor extern', '1-Enviar mail al tutor extern per poder fer una trucada o entrevista online.\r\n                        2-Rebre la seva resposta al nostre correu i concretar el dia de trobada.\r\n                        3-Entrevista de seguiment', ' ', 8, 9, 10, 3, 50),
(14, 2, 17, 'Segona entrevista de seguiment amb el estudiant', '1-Enviar mail o trucar al estudiant per quedar. 2-Rebre la seva resposta al nostre correu i concretar el dia de la trobada.\r\n                        3-Entrevista de seguiment', ' ', 11, 12, 13, 3, 60),
(15, 3, 17, 'Avís al estudiant de la finalització de la estada', '1-Enviar mail al estudiant.\r\n                        2-Rebre memòria de la estada.\r\n                        3-Confirmació de recepció.', ' ', 14, 15, 16, 3, 90),
(16, 3, 17, 'Avís al tutor extern de la finalització de la estada', '1-Enviar mail a la persona tutora de la entitat amb el informe que ha de omplir.\r\n                        2-Rebre confirmació del correu.\r\n                        3-Rebre informe de valoració de la estada del estudiant i enviar agraïment per el informe ', ' ', 17, 18, 19, 3, 90),
(17, 3, 17, 'Notificació de la nota final al alumne', 'Enviar mail amb la nota final. Per calcular la nota ha de fer servir el document Excel de càlcul de notes.', ' ', 20, 0, 0, 1, 100),
(18, 3, 17, 'Enviament de informes al coordinador', '1-Enviar mail a la coordinació adjuntant els tres documents: memòria estudiant, informe entitat i informe nostre. ', ' ', 21, 0, 0, 1, 100),
(19, 1, 11, 'Contacte inicial amb el estudiant', '1-Enviar mail al estudiant.\r\n                        2-Rebre la seva resposta al nostre correu. ', ' ', 1, 2, 0, 2, 5),
(20, 1, 11, 'Contacte inicial amb la empresa', '1-Enviar mail al tutor de la empresa. 2-Rebre la seva resposta al nostre correu.', ' ', 3, 4, 0, 2, 5),
(21, 2, 11, 'Primera entrevista de seguiment amb el estudiant', '1-Enviar mail o trucar al estudiant per quedar. 2-Rebre la seva resposta al nostre correu i concretar el dia de la trobada. 3-Entrevista de seguiment ', ' ', 5, 6, 7, 3, 30),
(22, 2, 11, 'Seguiment amb el tutor extern', '1-Enviar mail al tutor extern per poder fer una trucada o entrevista online.\r\n                        2-Rebre la seva resposta al nostre correu i concretar el dia de trobada.\r\n                        3-Entrevista de seguiment', ' ', 8, 9, 10, 3, 50),
(23, 2, 11, 'Segona entrevista de seguiment amb el estudiant', '1-Enviar mail o trucar al estudiant per quedar. 2-Rebre la seva resposta al nostre correu i concretar el dia de la trobada.\r\n                        3-Entrevista de seguiment', ' ', 11, 12, 13, 3, 60),
(24, 3, 11, 'Avís al estudiant de la finalització de la estada', '1-Enviar mail al estudiant.\r\n                        2-Rebre memòria de la estada.\r\n                        3-Confirmació de recepció.', ' ', 14, 15, 16, 3, 90),
(25, 3, 11, 'Avís al tutor extern de la finalització de la estada', '1-Enviar mail a la persona tutora de la entitat amb el informe que ha de omplir.\r\n                        2-Rebre confirmació del correu.\r\n                        3-Rebre informe de valoració de la estada del estudiant i enviar agraïment per el informe ', ' ', 17, 18, 19, 3, 90),
(26, 3, 11, 'Notificació de la nota final al alumne', 'Enviar mail amb la nota final. Per calcular la nota ha de fer servir el document Excel de càlcul de notes.', ' ', 20, 0, 0, 1, 100),
(27, 3, 11, 'Enviament de informes al coordinador', '1-Enviar mail a la coordinació adjuntant els tres documents: memòria estudiant, informe entitat i informe nostre. ', ' ', 21, 0, 0, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas_estancias`
--

CREATE TABLE `tareas_estancias` (
  `id_tarea_estancia` int(20) NOT NULL,
  `id_estancia` int(10) NOT NULL,
  `id_tarea` int(10) NOT NULL,
  `fecha_prevista_tarea` date NOT NULL,
  `fecha_realiz_accion1` date NOT NULL,
  `fecha_realiz_accion2` date NOT NULL,
  `fecha_realiz_accion3` date NOT NULL,
  `finalizada` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas_estancias`
--

INSERT INTO `tareas_estancias` (`id_tarea_estancia`, `id_estancia`, `id_tarea`, `fecha_prevista_tarea`, `fecha_realiz_accion1`, `fecha_realiz_accion2`, `fecha_realiz_accion3`, `finalizada`) VALUES
(109, 32, 1, '2021-03-04', '2021-05-11', '2021-05-11', '2021-05-11', 0),
(110, 32, 2, '2021-03-04', '2021-05-11', '2021-05-13', '2021-05-13', 0),
(111, 32, 3, '2021-03-23', '2021-05-11', '2021-05-13', '2021-05-13', 0),
(112, 32, 4, '2021-04-08', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(113, 32, 5, '2021-04-15', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(114, 32, 6, '2021-05-08', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(115, 32, 7, '2021-05-08', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(116, 32, 8, '2021-05-16', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(117, 32, 9, '2021-05-16', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(118, 33, 1, '2021-04-10', '2021-05-11', '0000-00-00', '0000-00-00', 0),
(119, 33, 2, '2021-04-10', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(120, 33, 3, '2021-05-05', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(121, 33, 4, '2021-05-25', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(122, 33, 5, '2021-06-04', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(123, 33, 6, '2021-07-04', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(124, 33, 7, '2021-07-04', '2021-05-13', '2021-05-13', '2021-05-13', 0),
(125, 33, 8, '2021-07-15', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(126, 33, 9, '2021-07-15', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(127, 34, 1, '2021-05-14', '2021-05-13', '2021-05-13', '2021-05-14', 0),
(128, 34, 2, '2021-05-14', '2021-05-14', '0000-00-00', '0000-00-00', 0),
(129, 34, 3, '2021-06-03', '2021-05-14', '2021-05-14', '2021-05-14', 0),
(130, 34, 4, '2021-06-19', '2021-05-14', '2021-05-14', '2021-05-14', 0),
(131, 34, 5, '2021-06-27', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(132, 34, 6, '2021-07-21', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(133, 34, 7, '2021-07-21', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(134, 34, 8, '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(135, 34, 9, '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(136, 35, 1, '2021-04-06', '2021-05-14', '2021-05-14', '2021-05-14', 0),
(137, 35, 2, '2021-04-06', '2021-05-14', '2021-05-14', '2021-05-14', 0),
(138, 35, 3, '2021-04-28', '2021-05-14', '2021-05-14', '0000-00-00', 0),
(139, 35, 4, '2021-05-16', '2021-05-14', '2021-05-14', '2021-05-14', 0),
(140, 35, 5, '2021-05-25', '2021-05-14', '2021-05-14', '2021-05-14', 0),
(141, 35, 6, '2021-06-21', '2021-05-14', '2021-05-14', '0000-00-00', 0),
(142, 35, 7, '2021-06-21', '2021-05-14', '0000-00-00', '0000-00-00', 0),
(143, 35, 8, '2021-06-30', '2021-05-16', '0000-00-00', '0000-00-00', 0),
(144, 35, 9, '2021-06-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(163, 44, 1, '2021-04-17', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(164, 44, 2, '2021-04-17', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(165, 44, 3, '2021-05-06', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(166, 44, 4, '2021-05-22', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(167, 44, 5, '2021-05-29', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(168, 44, 6, '2021-06-21', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(169, 44, 7, '2021-06-21', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(170, 44, 8, '2021-06-29', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(171, 44, 9, '2021-06-29', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(172, 45, 1, '2021-04-18', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(173, 45, 2, '2021-04-18', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(174, 45, 3, '2021-05-11', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(175, 45, 4, '2021-05-29', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(176, 45, 5, '2021-06-07', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(177, 45, 6, '2021-07-04', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(178, 45, 7, '2021-07-04', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(179, 45, 8, '2021-07-14', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(180, 45, 9, '2021-07-14', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(181, 46, 1, '2021-05-04', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(182, 46, 2, '2021-05-04', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(183, 46, 3, '2021-05-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(184, 46, 4, '2021-05-31', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(185, 46, 5, '2021-06-06', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(186, 46, 6, '2021-06-24', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(187, 46, 7, '2021-06-24', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(188, 46, 8, '2021-06-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(189, 46, 9, '2021-06-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(199, 48, 1, '2021-09-21', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(200, 48, 2, '2021-09-21', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(201, 48, 3, '2021-10-14', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(202, 48, 4, '2021-11-01', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(203, 48, 5, '2021-11-10', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(204, 48, 6, '2021-12-07', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(205, 48, 7, '2021-12-07', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(206, 48, 8, '2021-12-16', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(207, 48, 9, '2021-12-16', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(208, 49, 1, '2021-04-18', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(209, 49, 2, '2021-04-18', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(210, 49, 3, '2021-05-15', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(211, 49, 4, '2021-06-06', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(212, 49, 5, '2021-06-16', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(213, 49, 6, '2021-07-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(214, 49, 7, '2021-07-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(215, 49, 8, '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(216, 49, 9, '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(217, 50, 1, '2021-04-06', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(218, 50, 2, '2021-04-06', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(219, 50, 3, '2021-05-02', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(220, 50, 4, '2021-05-24', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(221, 50, 5, '2021-06-03', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(222, 50, 6, '2021-07-05', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(223, 50, 7, '2021-07-05', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(224, 50, 8, '2021-07-16', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(225, 50, 9, '2021-07-16', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(244, 53, 1, '2021-04-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(245, 53, 2, '2021-04-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(246, 53, 3, '2021-05-16', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(247, 53, 4, '2021-06-06', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(248, 53, 5, '2021-06-17', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(249, 53, 6, '2021-07-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(250, 53, 7, '2021-07-19', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(251, 53, 8, '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', 0),
(252, 53, 9, '2021-07-30', '0000-00-00', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id_tipos_usuario` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id_tipos_usuario`, `nombre`) VALUES
(1, 'profesor'),
(2, 'estudiante'),
(3, 'coordinador'),
(4, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comentarios`
--

CREATE TABLE `tipo_comentarios` (
  `id_tipo_comentarios` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_comentarios`
--

INSERT INTO `tipo_comentarios` (`id_tipo_comentarios`, `nombre`) VALUES
(1, 'Públic'),
(2, 'Privat');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores_externos`
--

CREATE TABLE `tutores_externos` (
  `id_tutor_externo` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `id_empresa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutores_externos`
--

INSERT INTO `tutores_externos` (`id_tutor_externo`, `nombre`, `apellido`, `email`, `telefono`, `id_empresa`) VALUES
(1, 'Florent', 'Bourdeaux', 'flobordeaux@gmail.com', 658471245, 1),
(2, 'Marc', 'Gascón', 'marc@gascón', 674589746, 3),
(3, 'Josep', 'Lamarque', 'jlamarque@gmail.com', 722546987, 3),
(16, 'Josep', 'Farré', 'josepfarre@gmail.com', 677142536, 21),
(18, 'Francesc', 'Torrent', 'francesctorrent@gmail.com', 614253614, 23),
(19, 'Gemma', 'Almirall', 'gemmaal@gmail.com', 625142536, 24),
(20, 'Ferran', 'Sorribes', 'ferran@tech.com', 632568974, 25),
(21, 'Joan', 'Ripoll', 'jripoll@gmail.com', 612365787, 26),
(22, 'Carla', 'Pérez', 'carlap@gmail.com', 93125468, 27),
(23, 'Josep Maria', 'Fortuny', 'jmariafortuny@gmail.com', 677857799, 28),
(24, 'Manel', 'Soldevilla', 'manelsol@gmail.com', 652143625, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `niu` int(7) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_tipo_usuario` int(3) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`niu`, `nombre`, `apellido`, `telefono`, `email`, `id_tipo_usuario`, `password`) VALUES
(1133669, 'Pere', 'Ferrer', 689541278, 'pereferre@gmail.com', 1, ''),
(1200124, 'Carles', 'Coromina', 722568412, 'carlescoromines@gmail.com', 1, ''),
(1247896, 'Oriol', 'Martínez Rubio', 685405010, 'omart1881@gmail.com', 2, ''),
(1275975, 'Jordi', 'Pons', 685405010, 'jordipons@gmail.com', 1, 'skatex'),
(1326589, 'Jaume', 'Parera', 659214578, 'jaumeparera@gmail.com', 1, ''),
(1354975, 'Jaume', 'Rodriguez', 647895614, 'jaumerodriguez@gmail.com', 3, 'skatex'),
(1364975, 'Xavi', 'Sánchez', 658231479, 'xavisanchez@gmail.com', 4, 'skatex'),
(1415161, 'Alfons', 'Fortuny Sáez', 693241875, 'alfonsfortuny@gmail.com', 3, 'skatex'),
(1463547, 'Paco', 'Palos', 650380412, 'pacopalos@gmail.com', 1, 'skatex'),
(1468975, 'Josep Antoni', 'Carmona', 658964172, 'jcarmona@gmail.com', 2, ''),
(1469587, 'Sergi', 'Mas Torrent', 652314789, 'sergimas@gmail.com', 2, ''),
(1475289, 'Carles', 'Torrella', 698542147, 'carlestorrella@gmail.com', 1, ''),
(1475866, 'Carles', 'Ballbé', 0, '', 2, ''),
(1478951, 'Nuria', 'Martí Bueno', 652987412, 'nuriambueno@gmail.com', 2, ''),
(1479638, 'Pere', 'Casajuana', 722658974, 'perecasajuana@gmail.com', 1, ''),
(1486372, 'Marc', 'Navarro Pérez', 625148976, 'marcnavarro@gmail.com', 2, ''),
(1496358, 'Daniel', 'Montuig', 0, '', 2, ''),
(1517193, 'Susana', 'Aranda Bonilla', 658963214, 'susanaaranda@gmail.com', 2, ''),
(1533339, 'Paula', 'Puig', 0, '', 2, ''),
(1598763, 'Marta', 'Pla Fornieles', 685415111, 'martapfornieles@gmail.com', 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acciones`
--
ALTER TABLE `acciones`
  ADD PRIMARY KEY (`id_accion`);

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `niu_profesor` (`niu_profesor`);

--
-- Indices de la tabla `archivos_estancias`
--
ALTER TABLE `archivos_estancias`
  ADD PRIMARY KEY (`id_archivo_estancia`),
  ADD KEY `id_estancia` (`id_estancia`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_estancia` (`id_estancia`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD PRIMARY KEY (`niu_coordinador`),
  ADD UNIQUE KEY `niu_coordinador` (`niu_coordinador`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `cursos_grados`
--
ALTER TABLE `cursos_grados`
  ADD PRIMARY KEY (`id_curso_grado`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `departamentos_grado`
--
ALTER TABLE `departamentos_grado`
  ADD PRIMARY KEY (`id_departamento_grado`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `estancias`
--
ALTER TABLE `estancias`
  ADD PRIMARY KEY (`id_estancia`),
  ADD UNIQUE KEY `niu_estudiante_2` (`niu_estudiante`),
  ADD KEY `niu_estudiante` (`niu_estudiante`),
  ADD KEY `niu_profesor` (`niu_profesor`),
  ADD KEY `id_tutor_externo` (`id_tutor_externo`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`niu_estudiante`),
  ADD UNIQUE KEY `niu_estudiante` (`niu_estudiante`),
  ADD KEY `id_mencion` (`id_mencion`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`id_etapa`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `menciones`
--
ALTER TABLE `menciones`
  ADD PRIMARY KEY (`id_mencion`),
  ADD KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `mensajes_profesor`
--
ALTER TABLE `mensajes_profesor`
  ADD PRIMARY KEY (`id_mensaje_profesor`),
  ADD KEY `id_tarea` (`id_tarea`),
  ADD KEY `niu_profesor` (`niu_profesor`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`niu_profesor`),
  ADD UNIQUE KEY `niu_profesor` (`niu_profesor`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `profesores_curso_grado`
--
ALTER TABLE `profesores_curso_grado`
  ADD PRIMARY KEY (`id_profesor_curso_grado`),
  ADD KEY `id_curso_grado` (`id_curso_grado`),
  ADD KEY `niu_profesor` (`niu_profesor`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_etapa` (`id_etapa`),
  ADD KEY `id_curso_grado` (`id_curso_grado`),
  ADD KEY `accion1` (`accion1`),
  ADD KEY `accion2` (`accion2`),
  ADD KEY `accion3` (`accion3`);

--
-- Indices de la tabla `tareas_estancias`
--
ALTER TABLE `tareas_estancias`
  ADD PRIMARY KEY (`id_tarea_estancia`),
  ADD KEY `id_estancia` (`id_estancia`),
  ADD KEY `id_tarea` (`id_tarea`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id_tipos_usuario`);

--
-- Indices de la tabla `tipo_comentarios`
--
ALTER TABLE `tipo_comentarios`
  ADD PRIMARY KEY (`id_tipo_comentarios`);

--
-- Indices de la tabla `tutores_externos`
--
ALTER TABLE `tutores_externos`
  ADD PRIMARY KEY (`id_tutor_externo`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`niu`),
  ADD KEY `tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acciones`
--
ALTER TABLE `acciones`
  MODIFY `id_accion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id_administrador` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos_estancias`
--
ALTER TABLE `archivos_estancias`
  MODIFY `id_archivo_estancia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cursos_grados`
--
ALTER TABLE `cursos_grados`
  MODIFY `id_curso_grado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `departamentos_grado`
--
ALTER TABLE `departamentos_grado`
  MODIFY `id_departamento_grado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `estancias`
--
ALTER TABLE `estancias`
  MODIFY `id_estancia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `etapas`
--
ALTER TABLE `etapas`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menciones`
--
ALTER TABLE `menciones`
  MODIFY `id_mencion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mensajes_profesor`
--
ALTER TABLE `mensajes_profesor`
  MODIFY `id_mensaje_profesor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `profesores_curso_grado`
--
ALTER TABLE `profesores_curso_grado`
  MODIFY `id_profesor_curso_grado` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de la tabla `tareas_estancias`
--
ALTER TABLE `tareas_estancias`
  MODIFY `id_tarea_estancia` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id_tipos_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_comentarios`
--
ALTER TABLE `tipo_comentarios`
  MODIFY `id_tipo_comentarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tutores_externos`
--
ALTER TABLE `tutores_externos`
  MODIFY `id_tutor_externo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
