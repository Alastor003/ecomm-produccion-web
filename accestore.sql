-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2023 a las 07:57:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accestore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Anillos', 'Anillos de todo tipo de materiales, ya sea oro, plata o bronce', '2023-07-26 03:01:44', '2023-07-26 03:01:56'),
(2, 'Gorras', 'Distintos modelos disponibles de gorras', '2023-07-26 03:02:00', '2023-07-26 03:02:03'),
(3, 'Relojes', 'Relojes, smartwatch, sumergibles', '2023-07-28 06:18:51', '2023-07-29 07:11:48'),
(4, 'Collares', 'Collares, cadenitas, adornos para el cuello', '2023-07-29 07:10:29', '2023-07-29 07:10:29'),
(5, 'Aros', 'Aritos para la oreja, de oro, plata u otros materiales.', '2023-07-30 00:33:05', '2023-07-30 00:33:05'),
(6, 'Anteojos', 'Anteojos normales, de sol, distintos tipos de colores y motivos.', '2023-07-30 00:35:30', '2023-07-30 00:35:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(22) NOT NULL,
  `mensaje` text NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `correo`, `telefono`, `mensaje`, `leido`, `created_at`, `updated_at`) VALUES
(1, 'Emiliano', 'Emiliano@gmail.com', '1515151', 'Hola buenos dias, queria consultar si aun tenian gorras con el diseño de avengers, muchas gracias!', 0, '2023-08-01 03:38:03', '2023-08-01 04:57:07'),
(2, 'Rodolfo', 'Rolo@correo.com', '7513452231', 'Buenas, es posible que aun tengan aritos de esos que tenian como adornos de diamantes puede ser?', 0, '2023-08-01 03:51:32', '2023-08-01 03:51:32'),
(3, 'Samir', 'jor13@email.com', '13134413', 'Hola buenos dias, se manejan con envios?', 0, '2023-08-01 03:54:10', '2023-08-01 03:54:10'),
(4, 'Axel', 'Achel@live.com', '144234143', 'Buenas noches, queria dejar un mensaje para avisar que posiblemente pase por la mañana a retirar unos aritos de simba, graciassssw', 0, '2023-08-01 06:06:16', '2023-08-01 06:13:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_07_26_024812_create_categorias_table', 1),
(11, '2023_07_28_003147_create_productos_table', 2),
(12, '2023_07_29_052602_add_imagen_to_productos_table', 3),
(13, '2023_07_31_234523_create_mensajes_table', 4),
(14, '2023_08_01_013027_add_leido_column_to_mensajes_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('correo@correo.com', '$2y$10$p79RplilgjhYVe96.ItUwOii73PVv7W/v9jSXiZLlm5t4JrPD2O5a', '2023-08-01 05:26:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double(9,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `is_active`, `categoria_id`, `created_at`, `updated_at`, `imagen`) VALUES
(1, 'Gorra Negra', 'Gorra color negro estilizada con detalles', 2500.00, 1, 2, '2023-07-28 05:04:37', '2023-07-29 09:12:42', 'productos/1690611162DC3598_010_A.jpg'),
(2, 'Anillo de oro', 'Anillo dorado con un adorno de diamantes', 5000.00, 1, 1, '2023-07-28 05:41:30', '2023-07-29 09:13:22', 'productos/1690611202-el-anillo-de-compromiso-tiffany-setting-en-oro-amarillo-de-18-quilates-29965838_995646_ED_M.jpg'),
(3, 'Anillo de plata', 'Anillo de plata simple pero refinado', 1200.00, 1, 1, '2023-07-28 06:05:30', '2023-08-01 07:11:03', 'productos/1690664995AN2982-62bb94bd827c6.jpeg'),
(4, 'Reloj de ben 10', 'Reloj de ben 10 fachero', 5000.00, 1, 3, '2023-07-29 08:57:40', '2023-07-29 08:57:40', 'productos/1690610260ben10.jpg'),
(5, 'Aritos con cruz', 'Aritos estilizados con una cruz colgando', 1500.00, 1, 5, '2023-07-30 00:33:24', '2023-07-30 00:33:24', 'productos/1690666404aaa40cf6b481c4cbb679379c4150fe28.jpg'),
(6, 'Anteojos estilo leopartdo', 'Anteojos con un marco de leopardo, material semi transparente', 2500.00, 1, 6, '2023-07-30 00:36:16', '2023-08-01 05:57:56', 'productos/16908586768baa710a946cdbf1f071392402a5009a.jpg'),
(7, 'Reloj digital negro', 'Reloj digital negro, sumergible y muy resistente.', 2000.00, 1, 3, '2023-08-01 05:39:51', '2023-08-01 05:39:51', 'productos/16908575910090c610a390d977f8487e53f0094416.jpg'),
(8, 'Anillo de oro', 'Anillo de oro puro, ajustable al dedo.', 5000.00, 1, 1, '2023-08-01 05:41:27', '2023-08-01 07:16:20', 'productos/1690857687550d557a4e86c7e0e6ecabc1a72d9e41.jpg'),
(9, 'Gorra negra simbolo cruz', 'Gorra negra con un simbolo de una cruz al costado.', 900.00, 1, 2, '2023-08-01 05:42:16', '2023-08-01 05:42:16', 'productos/1690857736a6cd88d9b93294521ce2f5739cd6731c.jpg'),
(10, 'Aritos con diamantes', 'Aritos con adornos de diamante incrustados', 4500.00, 1, 5, '2023-08-01 05:59:25', '2023-08-01 05:59:25', 'productos/1690858765a7bc395f03cc510e6db03ef972fc29da.jpg'),
(11, 'Gorra Avengers', 'Gorra estilizada con el traje cuantico de la pelicula \"Avengers End Game\".', 2000.00, 1, 2, '2023-08-01 06:01:21', '2023-08-01 06:02:27', 'productos/1690858881gorra-avengers.jpg'),
(12, 'Aritos Rey León', 'Aritos moldeados con la imagen de Simba de la pelicula \"Rey León\".', 1500.00, 1, 5, '2023-08-01 06:02:07', '2023-08-01 06:02:07', 'productos/1690858927dfaef495d446add355741aeb01112da5d3a3802a4ec7be0b9b254a0cf6b35f30168204.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brian', 'correo@correo.com', NULL, '$2y$10$sogfAtkeCYJ8BJUM8ZyQquHbVD44CZgQh05OUq7xUOayNcZEvLH92', 1, NULL, '2023-07-26 06:20:32', '2023-07-31 07:14:38'),
(2, 'Pablo', 'pablo@gmail.com', NULL, '$2y$10$ONWQ6i.fAUwtQL4aM5y4c.P5ljgl.Hf9hNRqV9PxcUPKhbnDN.QTu', 0, NULL, '2023-07-31 07:15:34', '2023-08-01 07:17:33'),
(3, 'Acel', 'aselponce@gmail.com', NULL, '$2y$10$z5p5V2MIrXwEIehbdZp.vuLQeRPVhanHdvBJFLRrYT9jcnOjfiQTm', 0, NULL, '2023-08-01 06:22:17', '2023-08-01 07:05:42');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
