-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 22. 09:15
-- Kiszolgáló verziója: 10.4.24-MariaDB
-- PHP verzió: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Adatbázis: `zoldkp`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `bejegyzesek`
--

CREATE TABLE `bejegyzesek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tevekenyseg_id` bigint(20) UNSIGNED NOT NULL,
  `osztaly_id` bigint(20) UNSIGNED NOT NULL,
  `diak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allapot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'jóváhagyásra vár'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_03_082730_create_osztalies_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_03_082410_create_tevekenysegs_table', 1),
(7, '2022_04_03_082423_create_bejegyzeseks_table', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `osztaly`
--

CREATE TABLE `osztaly` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `osztaly`
--

INSERT INTO `osztaly` (`id`, `nev`) VALUES
(1, 'DEK1A'),
(2, 'DEK2A'),
(3, 'DIV1'),
(4, 'FOT1A'),
(5, 'FOT1B'),
(6, 'FOT2'),
(7, 'GRA1A'),
(8, 'GRA1B'),
(9, 'GRA2A'),
(10, 'GRA2B'),
(11, 'IDV2'),
(12, 'IRU1A'),
(13, 'IRU1B'),
(14, 'IRU2'),
(15, 'KMM1'),
(16, 'KMM2'),
(17, 'MOA1'),
(18, 'MOA2'),
(19, 'PCS1'),
(20, 'SZF1A'),
(21, 'SZF1B'),
(22, 'SZF2'),
(23, 'VÜÜ1'),
(24, 'eFOT1'),
(25, 'eFOT2'),
(26, 'eGRA1'),
(27, 'eGRA2'),
(28, 'eIRU1'),
(29, 'eKIM1'),
(30, 'eKIM2'),
(31, 'eSZF1'),
(32, 'eSZF2');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tevekenyseg`
--

CREATE TABLE `tevekenyseg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tevekenyseg_nev` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pontszam` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `tevekenyseg`
--

INSERT INTO `tevekenyseg` (`id`, `tevekenyseg_nev`, `pontszam`) VALUES
(1, 'kerékpárral jöttem iskolába,  legalább 5 km ', 5),
(2, 'rollerrel jöttem iskolába,  legalább 3 km ', 3),
(3, 'gyalogoltam: legalább 2000 lépés ', 2),
(4, 'tömeg közlekedtem autózás helyett, (azoknak szól, akik egyébként autóval járnak iskolába) ', 5),
(5, 'ültettem fát ', 20),
(6, 'ültettem virágot ', 10),
(7, 'ültettem egyéb növényt ', 5),
(8, 'kevesebb vizet használtam a fürdéshez ', 1),
(9, 'kevesebb vizet használtam a zuhanyozáshoz ', 1),
(10, 'helyi terméket vásároltam a közértben', 1),
(11, 'összeszedtem a szemetet egy közterületen, erdőben, stb  (5 literes zacskónként)', 5),
(12, 'tartós szatyorba vásároltam, nem nylonba ', 10),
(13, 'nem használtam egyszer használatos műanyagot ', 10),
(14, 'tartós csomagolású terméket vásároltam, pl. üvegbe vettem a tejet, nem használtam pet palackot, ', 10),
(15, 'környezetbarát csomagolású terméket vásároltam ', 15),
(16, 'a héten maximum 1x ettem húsfélét ', 2),
(17, 'ökológiai gazdaságból származó élelmiszert vettem ', 15),
(18, 'kirándultam, szabadban töltöttem időt a héten  leaglább 4 óra  –', 5),
(19, 'kevesebb ruhát/terméket vásároltam a héten, hogy fenntarthatóbb legyen a környeztünk! ', 3),
(20, 'önkénteskedtem a Greenpeace- nél, vagy más zöld szervezetnél', 30),
(21, 'turiból vásároltam (másodkézből ruha,  bútor, használati cikk)  ', 10),
(22, 'felszedtem a csikket a suli előtt  legalább 10 csikk ', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `osztaly_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `osztaly_id`) VALUES
(1, 'DEK1A_ofo', 'dek1a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 1),
(2, 'DEK2A_ofo', 'dek2a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 2),
(3, 'DIV1_ofo', 'div1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 3),
(4, 'FOT1A_ofo', 'fot1a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 4),
(5, 'FOT1B_ofo', 'fot1b@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 5),
(6, 'FOT2_ofo', 'fot2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 6),
(7, 'GRA1A_ofo', 'gra1a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 7),
(8, 'GRA1B_ofo', 'gra1b@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 8),
(9, 'GRA2A_ofo', 'gra2a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 9),
(10, 'GRA2B_ofo', 'gra2b@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 10),
(11, 'IDV2_ofo', 'idv2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 11),
(12, 'IRU1A_ofo', 'iru1a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 12),
(13, 'IRU1B_ofo', 'iru1b@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 13),
(14, 'IRU2_ofo', 'iru2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 14),
(15, 'KMM1_ofo', 'kmm1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 15),
(16, 'KMM2_ofo', 'kmm2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 16),
(17, 'MOA1_ofo', 'moa1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 17),
(18, 'MOA2_ofo', 'moa2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 18),
(19, 'PCS1_ofo', 'pcs1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 19),
(20, 'SZF1A_ofo', 'szf1a@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 20),
(21, 'SZF1B_ofo', 'szf1b@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 21),
(22, 'SZF2_ofo', 'szf2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 22),
(23, 'VÜÜ1_ofo', 'vüü1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 23),
(24, 'eFOT1_ofo', 'efot1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 24),
(25, 'eFOT2_ofo', 'efot2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 25),
(26, 'eGRA1_ofo', 'egra1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 26),
(27, 'eGRA2_ofo', 'egra2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 27),
(28, 'eIRU1_ofo', 'eiru1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 28),
(29, 'eKIM1_ofo', 'ekim1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 29),
(30, 'eKIM2_ofo', 'ekim2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 30),
(31, 'eSZF1_ofo', 'eszf1@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 31),
(32, 'eSZF2_ofo', 'eszf2@zold.hu', '$2a$10$IHUVS6h6SQWgrl7vvpR/TujHhQ1l4WkNGuATYF87118V1xuVuoULm', 32);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bejegyzesek_osztaly_id_foreign` (`osztaly_id`),
  ADD KEY `bejegyzesek_tevekenyseg_id_foreign` (`tevekenyseg_id`);

--
-- A tábla indexei `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- A tábla indexei `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `osztaly`
--
ALTER TABLE `osztaly`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- A tábla indexei `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- A tábla indexei `tevekenyseg`
--
ALTER TABLE `tevekenyseg`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_osztaly_id_foreign` (`osztaly_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `osztaly`
--
ALTER TABLE `osztaly`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT a táblához `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `tevekenyseg`
--
ALTER TABLE `tevekenyseg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `bejegyzesek`
--
ALTER TABLE `bejegyzesek`
  ADD CONSTRAINT `bejegyzesek_osztaly_id_foreign` FOREIGN KEY (`osztaly_id`) REFERENCES `osztaly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bejegyzesek_tevekenyseg_id_foreign` FOREIGN KEY (`tevekenyseg_id`) REFERENCES `tevekenyseg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_osztaly_id_foreign` FOREIGN KEY (`osztaly_id`) REFERENCES `osztaly` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
