-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando datos para la tabla eduquack.blog: ~1 rows (aproximadamente)
REPLACE INTO `blog` (`id`, `title`, `content`, `image_path`, `created_at`, `author`) VALUES
	(11, 'Quack', 'Quack, Quack, Quack, Quack', 'uploads/images/OIG.jpg', '2023-11-08 08:25:58', 'root');

-- Volcando datos para la tabla eduquack.cursos: ~7 rows (aproximadamente)
REPLACE INTO `cursos` (`id_curso`, `nombre_curso`) VALUES
	(1, '1ESO'),
	(2, '2ESO'),
	(3, '3ESO'),
	(4, '4ESO'),
	(5, 'CicloMedio'),
	(6, 'CicloSuperior'),
	(7, 'Bachillerato');

-- Volcando datos para la tabla eduquack.faq: ~0 rows (aproximadamente)
REPLACE INTO `faq` (`id`, `titulo`, `contenido`, `respuesta`, `fecha_creacion`, `fecha_modificacion`) VALUES
	(1, 'caca?', '', NULL, '2023-11-07 13:50:56', NULL);

-- Volcando datos para la tabla eduquack.noticia: ~0 rows (aproximadamente)

-- Volcando datos para la tabla eduquack.usuarios: ~1 rows (aproximadamente)
REPLACE INTO `usuarios` (`id`, `email`, `full_name`, `password`, `username`, `curso`, `edad`) VALUES
	(2, 'root@ginebro.cat', 'root', '$2y$10$c7MZpfXgazmkQxB3c.TbHuR5y6OHuEU1S/3nW7erQQ36VaB4ODEsa', 'root', 'CicloSuperior', 2000);

-- Volcando datos para la tabla eduquack.valoracio: ~40 rows (aproximadamente)
REPLACE INTO `valoracio` (`id`, `titol`, `data_publicacio`, `completat`, `enllac_formulari`) VALUES
	(1, 'Maria Expósito', '2023-10-13', NULL, 'https://forms.gle/PZtutZYFvaGbdPSz6'),
	(2, 'Enric Matamala', '2023-10-13', NULL, 'https://forms.gle/LsNHNSnfnRBEVMde6'),
	(3, 'Berta Tomàs', '2023-10-13', NULL, 'https://forms.gle/DXp2yXpvxyJc7vmv9'),
	(4, 'Mònica Llobera', '2023-10-13', NULL, 'https://forms.gle/C3hjq9jynPGYbh6u9'),
	(5, 'Carles Blasco', '2023-10-13', NULL, 'https://forms.gle/nfzc7sWNSMFSFXJ76'),
	(6, 'Pilar Castellano', '2023-10-13', NULL, 'https://forms.gle/afBJnSXRyoakLajF7'),
	(7, 'Carles Lorente', '2023-10-13', NULL, 'https://forms.gle/64vamjYb6eCEiJUq9'),
	(8, 'Gemma Pardell', '2023-10-13', NULL, 'https://forms.gle/vPqDLj1KuCDTyQFxz8'),
	(9, 'Cristina Vallcorba', '2023-10-13', NULL, 'https://forms.gle/M8NiiZRXQa3zsyoL9'),
	(10, 'Diego de la Torre', '2023-10-13', NULL, 'https://forms.gle/VqPP3XD8kTphSMpu5'),
	(11, 'Gemma Querol', '2023-10-13', NULL, 'https://forms.gle/NrjMsPG6pBZpt9CN9'),
	(12, 'Cristina Royo', '2023-10-13', NULL, 'https://forms.gle/jp9E9Cc7oFXenj6y6'),
	(13, 'Judit Molins', '2023-10-13', NULL, 'https://forms.gle/VpXz8BVKtpAyvnV28'),
	(14, 'Txu Morillas', '2023-10-13', NULL, 'https://forms.gle/7YF6GcgkKnmXgyuW7'),
	(15, 'Jose Cendón', '2023-10-13', NULL, 'https://forms.gle/73GWQUKXnJmhWBCLA'),
	(16, 'Dolors Morcillo', '2023-10-13', NULL, 'https://forms.gle/YaNAZD8AybbNVhbPA'),
	(17, 'Manel Lladó', '2023-10-13', NULL, 'https://forms.gle/RpoEtuk8WxZeWdHUA'),
	(18, 'Alicia Molina', '2023-10-13', NULL, 'https://forms.gle/kUgeJkpW2MTifiAPA'),
	(19, 'Patxi Perales', '2023-10-13', NULL, 'https://forms.gle/hFfotmLZsbCntPTK8'),
	(20, 'Salvador Quadrades', '2023-10-13', NULL, 'https://forms.gle/Uihs26yUAzipKLFH7'),
	(21, 'Pilar Ors', '2023-10-13', NULL, 'https://forms.gle/VQgiQxTbEP8Vc1Do7'),
	(22, 'Isabel Ligero', '2023-10-13', NULL, 'https://forms.gle/7gtBFcYSzQucHGdw7'),
	(23, 'Albert Macià', '2023-10-13', NULL, 'https://forms.gle/LCg4y2nZZJu2bcpb7'),
	(24, 'Èrica Dotor', '2023-10-13', NULL, 'https://forms.gle/wQTFWYCALPHP28Tr8'),
	(25, 'Pau Farell', '2023-10-13', NULL, 'https://forms.gle/i9duDqCSpY54o3YEA'),
	(26, 'Núria Sellés', '2023-10-13', NULL, 'https://forms.gle/mmm9Q5FoWumGGUan8'),
	(27, 'Eduard Gutiérrez', '2023-10-13', NULL, 'https://forms.gle/neVLcHTBqJWn2LTdA'),
	(28, 'Xavi Sala', '2023-10-13', NULL, 'https://forms.gle/H1ouaJTSEFTcV8478'),
	(29, 'Marc Lurbe', '2023-10-13', NULL, 'https://forms.gle/aqXCaPH6oaLthUVu8'),
	(30, 'Eugeni Soy', '2023-10-13', NULL, 'https://forms.gle/VMqoNoEz3tVd5YEH6'),
	(31, 'Àlex Funes', '2023-10-13', NULL, 'https://forms.gle/kTqNfj6raHHbPHU48'),
	(32, 'Ivan Nieto', '2023-10-13', NULL, 'https://forms.gle/8neo8GmiWrzRpdM3A'),
	(33, 'Vladimir Bellavista', '2023-10-13', NULL, 'https://forms.gle/EptVu1rq9jQEmxYcA'),
	(34, 'Joan Pardo', '2023-10-13', NULL, 'https://forms.gle/ashwqwUksXoXb7sS9'),
	(35, 'Virgínia Carmona', '2023-10-13', NULL, 'https://forms.gle/7Z1erUBcxdVSAdEq5'),
	(36, 'Carles Margenat', '2023-10-13', NULL, 'https://forms.gle/68biEKA21fuPcErX6'),
	(37, 'Maria Ramírez', '2023-10-13', NULL, 'https://forms.gle/URbMpY3Ej944NYuFA'),
	(38, 'Angela Palacios', '2023-10-13', NULL, 'https://forms.gle/A81iAyn9jneYFK5V7'),
	(39, 'Imanol Valle', '2023-10-13', NULL, 'https://forms.gle/RZSV6uyzinTwz8sn9'),
	(40, 'Sofia Torrado', '2023-10-13', NULL, 'https://forms.gle/Fx8or9LzwaeB4oZr5');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
