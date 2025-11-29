CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_fecha` (`fecha`),
  KEY `idx_correo` (`correo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
