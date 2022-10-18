-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 09:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stefac1`
--

-- --------------------------------------------------------

--
-- Table structure for table `afectaciones`
--

CREATE TABLE `afectaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombredelprofesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diadelasemana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anno` int(11) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (seccion) REFERENCES secciones(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `name`, `anno`, `created_at`, `updated_at`) VALUES
(1, 'ICI', 1, '2022-07-26 19:07:27', '2022-07-26 19:07:27'),
(2, 'IP', 1, '2022-07-26 19:07:33', '2022-07-26 19:07:33'),
(3, 'AL', 1, '2022-07-26 19:07:41', '2022-07-26 19:07:41'),
(4, 'MD', 1, '2022-07-26 19:07:46', '2022-07-26 19:07:46'),
(5, 'EF', 1, '2022-07-26 19:07:56', '2022-07-26 19:07:56'),
(6, 'SN', 1, '2022-07-26 19:08:07', '2022-07-26 19:08:07');

-- --------------------------------------------------------

--
-- Table structure for table `balancedecarga`
--

CREATE TABLE `balancedecarga` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asignaturas_id` bigint(20) UNSIGNED NOT NULL,
  `frecuencias` int(11) NOT NULL,
  `tipodeclase` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semana` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balancedecarga`
--

INSERT INTO `balancedecarga` (`id`, `asignaturas_id`, `frecuencias`, `tipodeclase`, `semana`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'C,CP', 1, NULL, NULL),
(2, 5, 2, 'C,CP', 1, NULL, NULL),
(3, 1, 2, 'C,CP', 1, NULL, NULL),
(4, 2, 2, 'C,CP', 1, NULL, NULL),
(5, 4, 2, 'C,CP', 1, NULL, NULL),
(6, 6, 2, 'C,CP', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `generarhorario`
--

CREATE TABLE `generarhorario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, '1101', NULL, NULL),
(2, '1102', NULL, NULL),
(3, '1103', NULL, NULL),
(4, '1104', NULL, NULL),
(5, '1105', NULL, NULL),
(6, '1106', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `horario_generado`
--

CREATE TABLE `horario_generado` (
  `id` int(11) NOT NULL,
  `anno` int(11) NOT NULL,
  `semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `horario_generado`
--

INSERT INTO `horario_generado` (`id`, `anno`, `semana`) VALUES
(13, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locales`
--

CREATE TABLE `locales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipolocal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locales`
--

INSERT INTO `locales` (`id`, `name`, `tipolocal`, `created_at`, `updated_at`) VALUES
(1, '201', 'aula', NULL, NULL),
(2, '202', 'aula', NULL, NULL),
(3, '203', 'aula', NULL, NULL),
(4, '204', 'aula', NULL, NULL),
(5, '205', 'aula', NULL, NULL),
(6, '206', 'aula', NULL, NULL),
(7, '207', 'aula', NULL, NULL),
(8, '208', 'aula', NULL, NULL),
(9, '301', 'aula', NULL, NULL),
(10, '302', 'aula', NULL, NULL),
(11, '303', 'aula', NULL, NULL),
(12, '304', 'aula', NULL, NULL),
(13, '305', 'aula', NULL, NULL),
(14, '306', 'aula', NULL, NULL),
(15, '307', 'aula', NULL, NULL),
(16, '308', 'aula', NULL, NULL),
(17, '401', 'salon', NULL, NULL),
(18, '402', 'salon', NULL, NULL),
(19, '403', 'salon', NULL, NULL),
(20, '404', 'salon', NULL, NULL),
(21, '405', 'salon', NULL, NULL),
(22, '201', 'lab', NULL, NULL),
(23, '202', 'lab', NULL, NULL),
(24, '203', 'lab', NULL, NULL),
(25, '204', 'lab', NULL, NULL),
(26, '205', 'lab', NULL, NULL),
(27, '206', 'lab', NULL, NULL),
(28, '301', 'lab', NULL, NULL),
(29, '302', 'lab', NULL, NULL),
(30, '303', 'lab', NULL, NULL),
(31, '304', 'lab', NULL, NULL),
(32, '305', 'lab', NULL, NULL),
(33, '306', 'lab', NULL, NULL),
(34, 'canchas', 'exterior', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locales_disponibles`
--

CREATE TABLE `locales_disponibles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `local_id` bigint(20) UNSIGNED NOT NULL,
  `dia` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locales_disponibles`
--

INSERT INTO `locales_disponibles` (`id`, `local_id`, `dia`, `turno`, `created_at`, `updated_at`) VALUES
(991, 1, 1, 1, NULL, NULL),
(992, 2, 1, 1, NULL, NULL),
(993, 3, 1, 1, NULL, NULL),
(994, 4, 1, 1, NULL, NULL),
(995, 5, 1, 1, NULL, NULL),
(996, 6, 1, 1, NULL, NULL),
(997, 7, 1, 1, NULL, NULL),
(998, 8, 1, 1, NULL, NULL),
(999, 9, 1, 1, NULL, NULL),
(1000, 10, 1, 1, NULL, NULL),
(1001, 11, 1, 1, NULL, NULL),
(1002, 12, 1, 1, NULL, NULL),
(1003, 13, 1, 1, NULL, NULL),
(1004, 14, 1, 1, NULL, NULL),
(1005, 15, 1, 1, NULL, NULL),
(1006, 16, 1, 1, NULL, NULL),
(1007, 17, 1, 1, NULL, NULL),
(1008, 18, 1, 1, NULL, NULL),
(1009, 19, 1, 1, NULL, NULL),
(1010, 20, 1, 1, NULL, NULL),
(1011, 21, 1, 1, NULL, NULL),
(1012, 22, 1, 1, NULL, NULL),
(1013, 23, 1, 1, NULL, NULL),
(1014, 24, 1, 1, NULL, NULL),
(1015, 25, 1, 1, NULL, NULL),
(1016, 26, 1, 1, NULL, NULL),
(1017, 27, 1, 1, NULL, NULL),
(1018, 28, 1, 1, NULL, NULL),
(1019, 29, 1, 1, NULL, NULL),
(1020, 30, 1, 1, NULL, NULL),
(1021, 31, 1, 1, NULL, NULL),
(1022, 32, 1, 1, NULL, NULL),
(1023, 33, 1, 1, NULL, NULL),
(1024, 34, 1, 1, NULL, NULL),
(1025, 1, 1, 2, NULL, NULL),
(1026, 2, 1, 2, NULL, NULL),
(1027, 3, 1, 2, NULL, NULL),
(1028, 4, 1, 2, NULL, NULL),
(1029, 5, 1, 2, NULL, NULL),
(1030, 6, 1, 2, NULL, NULL),
(1031, 7, 1, 2, NULL, NULL),
(1032, 8, 1, 2, NULL, NULL),
(1033, 9, 1, 2, NULL, NULL),
(1034, 10, 1, 2, NULL, NULL),
(1035, 11, 1, 2, NULL, NULL),
(1036, 12, 1, 2, NULL, NULL),
(1037, 13, 1, 2, NULL, NULL),
(1038, 14, 1, 2, NULL, NULL),
(1039, 15, 1, 2, NULL, NULL),
(1040, 16, 1, 2, NULL, NULL),
(1041, 17, 1, 2, NULL, NULL),
(1042, 18, 1, 2, NULL, NULL),
(1043, 19, 1, 2, NULL, NULL),
(1044, 20, 1, 2, NULL, NULL),
(1045, 21, 1, 2, NULL, NULL),
(1046, 22, 1, 2, NULL, NULL),
(1047, 23, 1, 2, NULL, NULL),
(1048, 24, 1, 2, NULL, NULL),
(1049, 25, 1, 2, NULL, NULL),
(1050, 26, 1, 2, NULL, NULL),
(1051, 27, 1, 2, NULL, NULL),
(1052, 28, 1, 2, NULL, NULL),
(1053, 29, 1, 2, NULL, NULL),
(1054, 30, 1, 2, NULL, NULL),
(1055, 31, 1, 2, NULL, NULL),
(1056, 32, 1, 2, NULL, NULL),
(1057, 33, 1, 2, NULL, NULL),
(1058, 34, 1, 2, NULL, NULL),
(1059, 1, 1, 3, NULL, NULL),
(1060, 2, 1, 3, NULL, NULL),
(1061, 3, 1, 3, NULL, NULL),
(1062, 4, 1, 3, NULL, NULL),
(1063, 5, 1, 3, NULL, NULL),
(1064, 6, 1, 3, NULL, NULL),
(1065, 7, 1, 3, NULL, NULL),
(1066, 8, 1, 3, NULL, NULL),
(1067, 9, 1, 3, NULL, NULL),
(1068, 10, 1, 3, NULL, NULL),
(1069, 11, 1, 3, NULL, NULL),
(1070, 12, 1, 3, NULL, NULL),
(1071, 13, 1, 3, NULL, NULL),
(1072, 14, 1, 3, NULL, NULL),
(1073, 15, 1, 3, NULL, NULL),
(1074, 16, 1, 3, NULL, NULL),
(1075, 17, 1, 3, NULL, NULL),
(1076, 18, 1, 3, NULL, NULL),
(1077, 19, 1, 3, NULL, NULL),
(1078, 20, 1, 3, NULL, NULL),
(1079, 21, 1, 3, NULL, NULL),
(1080, 22, 1, 3, NULL, NULL),
(1081, 23, 1, 3, NULL, NULL),
(1082, 24, 1, 3, NULL, NULL),
(1083, 25, 1, 3, NULL, NULL),
(1084, 26, 1, 3, NULL, NULL),
(1085, 27, 1, 3, NULL, NULL),
(1086, 28, 1, 3, NULL, NULL),
(1087, 29, 1, 3, NULL, NULL),
(1088, 30, 1, 3, NULL, NULL),
(1089, 31, 1, 3, NULL, NULL),
(1090, 32, 1, 3, NULL, NULL),
(1091, 33, 1, 3, NULL, NULL),
(1092, 1, 1, 4, NULL, NULL),
(1093, 2, 1, 4, NULL, NULL),
(1094, 3, 1, 4, NULL, NULL),
(1095, 4, 1, 4, NULL, NULL),
(1096, 5, 1, 4, NULL, NULL),
(1097, 6, 1, 4, NULL, NULL),
(1098, 7, 1, 4, NULL, NULL),
(1099, 8, 1, 4, NULL, NULL),
(1100, 9, 1, 4, NULL, NULL),
(1101, 10, 1, 4, NULL, NULL),
(1102, 11, 1, 4, NULL, NULL),
(1103, 12, 1, 4, NULL, NULL),
(1104, 13, 1, 4, NULL, NULL),
(1105, 14, 1, 4, NULL, NULL),
(1106, 15, 1, 4, NULL, NULL),
(1107, 16, 1, 4, NULL, NULL),
(1108, 17, 1, 4, NULL, NULL),
(1109, 18, 1, 4, NULL, NULL),
(1110, 19, 1, 4, NULL, NULL),
(1111, 20, 1, 4, NULL, NULL),
(1112, 21, 1, 4, NULL, NULL),
(1113, 22, 1, 4, NULL, NULL),
(1114, 23, 1, 4, NULL, NULL),
(1115, 24, 1, 4, NULL, NULL),
(1116, 25, 1, 4, NULL, NULL),
(1117, 26, 1, 4, NULL, NULL),
(1118, 27, 1, 4, NULL, NULL),
(1119, 28, 1, 4, NULL, NULL),
(1120, 29, 1, 4, NULL, NULL),
(1121, 30, 1, 4, NULL, NULL),
(1122, 31, 1, 4, NULL, NULL),
(1123, 32, 1, 4, NULL, NULL),
(1124, 33, 1, 4, NULL, NULL),
(1125, 1, 1, 5, NULL, NULL),
(1126, 2, 1, 5, NULL, NULL),
(1127, 3, 1, 5, NULL, NULL),
(1128, 4, 1, 5, NULL, NULL),
(1129, 5, 1, 5, NULL, NULL),
(1130, 6, 1, 5, NULL, NULL),
(1131, 7, 1, 5, NULL, NULL),
(1132, 8, 1, 5, NULL, NULL),
(1133, 9, 1, 5, NULL, NULL),
(1134, 10, 1, 5, NULL, NULL),
(1135, 11, 1, 5, NULL, NULL),
(1136, 12, 1, 5, NULL, NULL),
(1137, 13, 1, 5, NULL, NULL),
(1138, 14, 1, 5, NULL, NULL),
(1139, 15, 1, 5, NULL, NULL),
(1140, 16, 1, 5, NULL, NULL),
(1141, 17, 1, 5, NULL, NULL),
(1142, 18, 1, 5, NULL, NULL),
(1143, 19, 1, 5, NULL, NULL),
(1144, 20, 1, 5, NULL, NULL),
(1145, 21, 1, 5, NULL, NULL),
(1146, 22, 1, 5, NULL, NULL),
(1147, 23, 1, 5, NULL, NULL),
(1148, 24, 1, 5, NULL, NULL),
(1149, 25, 1, 5, NULL, NULL),
(1150, 26, 1, 5, NULL, NULL),
(1151, 27, 1, 5, NULL, NULL),
(1152, 28, 1, 5, NULL, NULL),
(1153, 29, 1, 5, NULL, NULL),
(1154, 30, 1, 5, NULL, NULL),
(1155, 31, 1, 5, NULL, NULL),
(1156, 32, 1, 5, NULL, NULL),
(1157, 33, 1, 5, NULL, NULL),
(1158, 34, 1, 5, NULL, NULL),
(1159, 1, 1, 6, NULL, NULL),
(1160, 2, 1, 6, NULL, NULL),
(1161, 3, 1, 6, NULL, NULL),
(1162, 4, 1, 6, NULL, NULL),
(1163, 5, 1, 6, NULL, NULL),
(1164, 6, 1, 6, NULL, NULL),
(1165, 7, 1, 6, NULL, NULL),
(1166, 8, 1, 6, NULL, NULL),
(1167, 9, 1, 6, NULL, NULL),
(1168, 10, 1, 6, NULL, NULL),
(1169, 11, 1, 6, NULL, NULL),
(1170, 12, 1, 6, NULL, NULL),
(1171, 13, 1, 6, NULL, NULL),
(1172, 14, 1, 6, NULL, NULL),
(1173, 15, 1, 6, NULL, NULL),
(1174, 16, 1, 6, NULL, NULL),
(1175, 17, 1, 6, NULL, NULL),
(1176, 18, 1, 6, NULL, NULL),
(1177, 19, 1, 6, NULL, NULL),
(1178, 20, 1, 6, NULL, NULL),
(1179, 21, 1, 6, NULL, NULL),
(1180, 22, 1, 6, NULL, NULL),
(1181, 23, 1, 6, NULL, NULL),
(1182, 24, 1, 6, NULL, NULL),
(1183, 25, 1, 6, NULL, NULL),
(1184, 26, 1, 6, NULL, NULL),
(1185, 27, 1, 6, NULL, NULL),
(1186, 28, 1, 6, NULL, NULL),
(1187, 29, 1, 6, NULL, NULL),
(1188, 30, 1, 6, NULL, NULL),
(1189, 31, 1, 6, NULL, NULL),
(1190, 32, 1, 6, NULL, NULL),
(1191, 33, 1, 6, NULL, NULL),
(1192, 34, 1, 6, NULL, NULL),
(1193, 1, 2, 1, NULL, NULL),
(1194, 2, 2, 1, NULL, NULL),
(1195, 3, 2, 1, NULL, NULL),
(1196, 4, 2, 1, NULL, NULL),
(1197, 5, 2, 1, NULL, NULL),
(1198, 6, 2, 1, NULL, NULL),
(1199, 7, 2, 1, NULL, NULL),
(1200, 8, 2, 1, NULL, NULL),
(1201, 9, 2, 1, NULL, NULL),
(1202, 10, 2, 1, NULL, NULL),
(1203, 11, 2, 1, NULL, NULL),
(1204, 12, 2, 1, NULL, NULL),
(1205, 13, 2, 1, NULL, NULL),
(1206, 14, 2, 1, NULL, NULL),
(1207, 15, 2, 1, NULL, NULL),
(1208, 16, 2, 1, NULL, NULL),
(1209, 17, 2, 1, NULL, NULL),
(1210, 18, 2, 1, NULL, NULL),
(1211, 19, 2, 1, NULL, NULL),
(1212, 20, 2, 1, NULL, NULL),
(1213, 21, 2, 1, NULL, NULL),
(1214, 22, 2, 1, NULL, NULL),
(1215, 23, 2, 1, NULL, NULL),
(1216, 24, 2, 1, NULL, NULL),
(1217, 25, 2, 1, NULL, NULL),
(1218, 26, 2, 1, NULL, NULL),
(1219, 27, 2, 1, NULL, NULL),
(1220, 28, 2, 1, NULL, NULL),
(1221, 29, 2, 1, NULL, NULL),
(1222, 30, 2, 1, NULL, NULL),
(1223, 31, 2, 1, NULL, NULL),
(1224, 32, 2, 1, NULL, NULL),
(1225, 33, 2, 1, NULL, NULL),
(1226, 34, 2, 1, NULL, NULL),
(1227, 1, 2, 2, NULL, NULL),
(1228, 2, 2, 2, NULL, NULL),
(1229, 3, 2, 2, NULL, NULL),
(1230, 4, 2, 2, NULL, NULL),
(1231, 5, 2, 2, NULL, NULL),
(1232, 6, 2, 2, NULL, NULL),
(1233, 7, 2, 2, NULL, NULL),
(1234, 8, 2, 2, NULL, NULL),
(1235, 9, 2, 2, NULL, NULL),
(1236, 10, 2, 2, NULL, NULL),
(1237, 11, 2, 2, NULL, NULL),
(1238, 12, 2, 2, NULL, NULL),
(1239, 13, 2, 2, NULL, NULL),
(1240, 14, 2, 2, NULL, NULL),
(1241, 15, 2, 2, NULL, NULL),
(1242, 16, 2, 2, NULL, NULL),
(1243, 17, 2, 2, NULL, NULL),
(1244, 18, 2, 2, NULL, NULL),
(1245, 19, 2, 2, NULL, NULL),
(1246, 20, 2, 2, NULL, NULL),
(1247, 21, 2, 2, NULL, NULL),
(1248, 22, 2, 2, NULL, NULL),
(1249, 23, 2, 2, NULL, NULL),
(1250, 24, 2, 2, NULL, NULL),
(1251, 25, 2, 2, NULL, NULL),
(1252, 26, 2, 2, NULL, NULL),
(1253, 27, 2, 2, NULL, NULL),
(1254, 28, 2, 2, NULL, NULL),
(1255, 29, 2, 2, NULL, NULL),
(1256, 30, 2, 2, NULL, NULL),
(1257, 31, 2, 2, NULL, NULL),
(1258, 32, 2, 2, NULL, NULL),
(1259, 33, 2, 2, NULL, NULL),
(1260, 34, 2, 2, NULL, NULL),
(1261, 1, 2, 3, NULL, NULL),
(1262, 2, 2, 3, NULL, NULL),
(1263, 3, 2, 3, NULL, NULL),
(1264, 4, 2, 3, NULL, NULL),
(1265, 5, 2, 3, NULL, NULL),
(1266, 6, 2, 3, NULL, NULL),
(1267, 7, 2, 3, NULL, NULL),
(1268, 8, 2, 3, NULL, NULL),
(1269, 9, 2, 3, NULL, NULL),
(1270, 10, 2, 3, NULL, NULL),
(1271, 11, 2, 3, NULL, NULL),
(1272, 12, 2, 3, NULL, NULL),
(1273, 13, 2, 3, NULL, NULL),
(1274, 14, 2, 3, NULL, NULL),
(1275, 15, 2, 3, NULL, NULL),
(1276, 16, 2, 3, NULL, NULL),
(1277, 17, 2, 3, NULL, NULL),
(1278, 18, 2, 3, NULL, NULL),
(1279, 19, 2, 3, NULL, NULL),
(1280, 20, 2, 3, NULL, NULL),
(1281, 21, 2, 3, NULL, NULL),
(1282, 22, 2, 3, NULL, NULL),
(1283, 23, 2, 3, NULL, NULL),
(1284, 24, 2, 3, NULL, NULL),
(1285, 25, 2, 3, NULL, NULL),
(1286, 26, 2, 3, NULL, NULL),
(1287, 27, 2, 3, NULL, NULL),
(1288, 28, 2, 3, NULL, NULL),
(1289, 29, 2, 3, NULL, NULL),
(1290, 30, 2, 3, NULL, NULL),
(1291, 31, 2, 3, NULL, NULL),
(1292, 32, 2, 3, NULL, NULL),
(1293, 33, 2, 3, NULL, NULL),
(1294, 1, 2, 4, NULL, NULL),
(1295, 2, 2, 4, NULL, NULL),
(1296, 3, 2, 4, NULL, NULL),
(1297, 4, 2, 4, NULL, NULL),
(1298, 5, 2, 4, NULL, NULL),
(1299, 6, 2, 4, NULL, NULL),
(1300, 7, 2, 4, NULL, NULL),
(1301, 8, 2, 4, NULL, NULL),
(1302, 9, 2, 4, NULL, NULL),
(1303, 10, 2, 4, NULL, NULL),
(1304, 11, 2, 4, NULL, NULL),
(1305, 12, 2, 4, NULL, NULL),
(1306, 13, 2, 4, NULL, NULL),
(1307, 14, 2, 4, NULL, NULL),
(1308, 15, 2, 4, NULL, NULL),
(1309, 16, 2, 4, NULL, NULL),
(1310, 17, 2, 4, NULL, NULL),
(1311, 18, 2, 4, NULL, NULL),
(1312, 19, 2, 4, NULL, NULL),
(1313, 20, 2, 4, NULL, NULL),
(1314, 21, 2, 4, NULL, NULL),
(1315, 22, 2, 4, NULL, NULL),
(1316, 23, 2, 4, NULL, NULL),
(1317, 24, 2, 4, NULL, NULL),
(1318, 25, 2, 4, NULL, NULL),
(1319, 26, 2, 4, NULL, NULL),
(1320, 27, 2, 4, NULL, NULL),
(1321, 28, 2, 4, NULL, NULL),
(1322, 29, 2, 4, NULL, NULL),
(1323, 30, 2, 4, NULL, NULL),
(1324, 31, 2, 4, NULL, NULL),
(1325, 32, 2, 4, NULL, NULL),
(1326, 33, 2, 4, NULL, NULL),
(1327, 1, 2, 5, NULL, NULL),
(1328, 2, 2, 5, NULL, NULL),
(1329, 3, 2, 5, NULL, NULL),
(1330, 4, 2, 5, NULL, NULL),
(1331, 5, 2, 5, NULL, NULL),
(1332, 6, 2, 5, NULL, NULL),
(1333, 7, 2, 5, NULL, NULL),
(1334, 8, 2, 5, NULL, NULL),
(1335, 9, 2, 5, NULL, NULL),
(1336, 10, 2, 5, NULL, NULL),
(1337, 11, 2, 5, NULL, NULL),
(1338, 12, 2, 5, NULL, NULL),
(1339, 13, 2, 5, NULL, NULL),
(1340, 14, 2, 5, NULL, NULL),
(1341, 15, 2, 5, NULL, NULL),
(1342, 16, 2, 5, NULL, NULL),
(1343, 17, 2, 5, NULL, NULL),
(1344, 18, 2, 5, NULL, NULL),
(1345, 19, 2, 5, NULL, NULL),
(1346, 20, 2, 5, NULL, NULL),
(1347, 21, 2, 5, NULL, NULL),
(1348, 22, 2, 5, NULL, NULL),
(1349, 23, 2, 5, NULL, NULL),
(1350, 24, 2, 5, NULL, NULL),
(1351, 25, 2, 5, NULL, NULL),
(1352, 26, 2, 5, NULL, NULL),
(1353, 27, 2, 5, NULL, NULL),
(1354, 28, 2, 5, NULL, NULL),
(1355, 29, 2, 5, NULL, NULL),
(1356, 30, 2, 5, NULL, NULL),
(1357, 31, 2, 5, NULL, NULL),
(1358, 32, 2, 5, NULL, NULL),
(1359, 33, 2, 5, NULL, NULL),
(1360, 34, 2, 5, NULL, NULL),
(1361, 1, 2, 6, NULL, NULL),
(1362, 2, 2, 6, NULL, NULL),
(1363, 3, 2, 6, NULL, NULL),
(1364, 4, 2, 6, NULL, NULL),
(1365, 5, 2, 6, NULL, NULL),
(1366, 6, 2, 6, NULL, NULL),
(1367, 7, 2, 6, NULL, NULL),
(1368, 8, 2, 6, NULL, NULL),
(1369, 9, 2, 6, NULL, NULL),
(1370, 10, 2, 6, NULL, NULL),
(1371, 11, 2, 6, NULL, NULL),
(1372, 12, 2, 6, NULL, NULL),
(1373, 13, 2, 6, NULL, NULL),
(1374, 14, 2, 6, NULL, NULL),
(1375, 15, 2, 6, NULL, NULL),
(1376, 16, 2, 6, NULL, NULL),
(1377, 17, 2, 6, NULL, NULL),
(1378, 18, 2, 6, NULL, NULL),
(1379, 19, 2, 6, NULL, NULL),
(1380, 20, 2, 6, NULL, NULL),
(1381, 21, 2, 6, NULL, NULL),
(1382, 22, 2, 6, NULL, NULL),
(1383, 23, 2, 6, NULL, NULL),
(1384, 24, 2, 6, NULL, NULL),
(1385, 25, 2, 6, NULL, NULL),
(1386, 26, 2, 6, NULL, NULL),
(1387, 27, 2, 6, NULL, NULL),
(1388, 28, 2, 6, NULL, NULL),
(1389, 29, 2, 6, NULL, NULL),
(1390, 30, 2, 6, NULL, NULL),
(1391, 31, 2, 6, NULL, NULL),
(1392, 32, 2, 6, NULL, NULL),
(1393, 33, 2, 6, NULL, NULL),
(1394, 34, 2, 6, NULL, NULL),
(1395, 1, 3, 1, NULL, NULL),
(1396, 2, 3, 1, NULL, NULL),
(1397, 3, 3, 1, NULL, NULL),
(1398, 4, 3, 1, NULL, NULL),
(1399, 5, 3, 1, NULL, NULL),
(1400, 6, 3, 1, NULL, NULL),
(1401, 7, 3, 1, NULL, NULL),
(1402, 8, 3, 1, NULL, NULL),
(1403, 9, 3, 1, NULL, NULL),
(1404, 10, 3, 1, NULL, NULL),
(1405, 11, 3, 1, NULL, NULL),
(1406, 12, 3, 1, NULL, NULL),
(1407, 13, 3, 1, NULL, NULL),
(1408, 14, 3, 1, NULL, NULL),
(1409, 15, 3, 1, NULL, NULL),
(1410, 16, 3, 1, NULL, NULL),
(1411, 17, 3, 1, NULL, NULL),
(1412, 18, 3, 1, NULL, NULL),
(1413, 19, 3, 1, NULL, NULL),
(1414, 20, 3, 1, NULL, NULL),
(1415, 21, 3, 1, NULL, NULL),
(1416, 22, 3, 1, NULL, NULL),
(1417, 23, 3, 1, NULL, NULL),
(1418, 24, 3, 1, NULL, NULL),
(1419, 25, 3, 1, NULL, NULL),
(1420, 26, 3, 1, NULL, NULL),
(1421, 27, 3, 1, NULL, NULL),
(1422, 28, 3, 1, NULL, NULL),
(1423, 29, 3, 1, NULL, NULL),
(1424, 30, 3, 1, NULL, NULL),
(1425, 31, 3, 1, NULL, NULL),
(1426, 32, 3, 1, NULL, NULL),
(1427, 33, 3, 1, NULL, NULL),
(1428, 34, 3, 1, NULL, NULL),
(1429, 1, 3, 2, NULL, NULL),
(1430, 2, 3, 2, NULL, NULL),
(1431, 3, 3, 2, NULL, NULL),
(1432, 4, 3, 2, NULL, NULL),
(1433, 5, 3, 2, NULL, NULL),
(1434, 6, 3, 2, NULL, NULL),
(1435, 7, 3, 2, NULL, NULL),
(1436, 8, 3, 2, NULL, NULL),
(1437, 9, 3, 2, NULL, NULL),
(1438, 10, 3, 2, NULL, NULL),
(1439, 11, 3, 2, NULL, NULL),
(1440, 12, 3, 2, NULL, NULL),
(1441, 13, 3, 2, NULL, NULL),
(1442, 14, 3, 2, NULL, NULL),
(1443, 15, 3, 2, NULL, NULL),
(1444, 16, 3, 2, NULL, NULL),
(1445, 17, 3, 2, NULL, NULL),
(1446, 18, 3, 2, NULL, NULL),
(1447, 19, 3, 2, NULL, NULL),
(1448, 20, 3, 2, NULL, NULL),
(1449, 21, 3, 2, NULL, NULL),
(1450, 22, 3, 2, NULL, NULL),
(1451, 23, 3, 2, NULL, NULL),
(1452, 24, 3, 2, NULL, NULL),
(1453, 25, 3, 2, NULL, NULL),
(1454, 26, 3, 2, NULL, NULL),
(1455, 27, 3, 2, NULL, NULL),
(1456, 28, 3, 2, NULL, NULL),
(1457, 29, 3, 2, NULL, NULL),
(1458, 30, 3, 2, NULL, NULL),
(1459, 31, 3, 2, NULL, NULL),
(1460, 32, 3, 2, NULL, NULL),
(1461, 33, 3, 2, NULL, NULL),
(1462, 34, 3, 2, NULL, NULL),
(1463, 1, 3, 3, NULL, NULL),
(1464, 2, 3, 3, NULL, NULL),
(1465, 3, 3, 3, NULL, NULL),
(1466, 4, 3, 3, NULL, NULL),
(1467, 5, 3, 3, NULL, NULL),
(1468, 6, 3, 3, NULL, NULL),
(1469, 7, 3, 3, NULL, NULL),
(1470, 8, 3, 3, NULL, NULL),
(1471, 9, 3, 3, NULL, NULL),
(1472, 10, 3, 3, NULL, NULL),
(1473, 11, 3, 3, NULL, NULL),
(1474, 12, 3, 3, NULL, NULL),
(1475, 13, 3, 3, NULL, NULL),
(1476, 14, 3, 3, NULL, NULL),
(1477, 15, 3, 3, NULL, NULL),
(1478, 16, 3, 3, NULL, NULL),
(1479, 17, 3, 3, NULL, NULL),
(1480, 18, 3, 3, NULL, NULL),
(1481, 19, 3, 3, NULL, NULL),
(1482, 20, 3, 3, NULL, NULL),
(1483, 21, 3, 3, NULL, NULL),
(1484, 22, 3, 3, NULL, NULL),
(1485, 23, 3, 3, NULL, NULL),
(1486, 24, 3, 3, NULL, NULL),
(1487, 25, 3, 3, NULL, NULL),
(1488, 26, 3, 3, NULL, NULL),
(1489, 27, 3, 3, NULL, NULL),
(1490, 28, 3, 3, NULL, NULL),
(1491, 29, 3, 3, NULL, NULL),
(1492, 30, 3, 3, NULL, NULL),
(1493, 31, 3, 3, NULL, NULL),
(1494, 32, 3, 3, NULL, NULL),
(1495, 33, 3, 3, NULL, NULL),
(1496, 1, 3, 4, NULL, NULL),
(1497, 2, 3, 4, NULL, NULL),
(1498, 3, 3, 4, NULL, NULL),
(1499, 4, 3, 4, NULL, NULL),
(1500, 5, 3, 4, NULL, NULL),
(1501, 6, 3, 4, NULL, NULL),
(1502, 7, 3, 4, NULL, NULL),
(1503, 8, 3, 4, NULL, NULL),
(1504, 9, 3, 4, NULL, NULL),
(1505, 10, 3, 4, NULL, NULL),
(1506, 11, 3, 4, NULL, NULL),
(1507, 12, 3, 4, NULL, NULL),
(1508, 13, 3, 4, NULL, NULL),
(1509, 14, 3, 4, NULL, NULL),
(1510, 15, 3, 4, NULL, NULL),
(1511, 16, 3, 4, NULL, NULL),
(1512, 17, 3, 4, NULL, NULL),
(1513, 18, 3, 4, NULL, NULL),
(1514, 19, 3, 4, NULL, NULL),
(1515, 20, 3, 4, NULL, NULL),
(1516, 21, 3, 4, NULL, NULL),
(1517, 22, 3, 4, NULL, NULL),
(1518, 23, 3, 4, NULL, NULL),
(1519, 24, 3, 4, NULL, NULL),
(1520, 25, 3, 4, NULL, NULL),
(1521, 26, 3, 4, NULL, NULL),
(1522, 27, 3, 4, NULL, NULL),
(1523, 28, 3, 4, NULL, NULL),
(1524, 29, 3, 4, NULL, NULL),
(1525, 30, 3, 4, NULL, NULL),
(1526, 31, 3, 4, NULL, NULL),
(1527, 32, 3, 4, NULL, NULL),
(1528, 33, 3, 4, NULL, NULL),
(1529, 1, 3, 5, NULL, NULL),
(1530, 2, 3, 5, NULL, NULL),
(1531, 3, 3, 5, NULL, NULL),
(1532, 4, 3, 5, NULL, NULL),
(1533, 5, 3, 5, NULL, NULL),
(1534, 6, 3, 5, NULL, NULL),
(1535, 7, 3, 5, NULL, NULL),
(1536, 8, 3, 5, NULL, NULL),
(1537, 9, 3, 5, NULL, NULL),
(1538, 10, 3, 5, NULL, NULL),
(1539, 11, 3, 5, NULL, NULL),
(1540, 12, 3, 5, NULL, NULL),
(1541, 13, 3, 5, NULL, NULL),
(1542, 14, 3, 5, NULL, NULL),
(1543, 15, 3, 5, NULL, NULL),
(1544, 16, 3, 5, NULL, NULL),
(1545, 17, 3, 5, NULL, NULL),
(1546, 18, 3, 5, NULL, NULL),
(1547, 19, 3, 5, NULL, NULL),
(1548, 20, 3, 5, NULL, NULL),
(1549, 21, 3, 5, NULL, NULL),
(1550, 22, 3, 5, NULL, NULL),
(1551, 23, 3, 5, NULL, NULL),
(1552, 24, 3, 5, NULL, NULL),
(1553, 25, 3, 5, NULL, NULL),
(1554, 26, 3, 5, NULL, NULL),
(1555, 27, 3, 5, NULL, NULL),
(1556, 28, 3, 5, NULL, NULL),
(1557, 29, 3, 5, NULL, NULL),
(1558, 30, 3, 5, NULL, NULL),
(1559, 31, 3, 5, NULL, NULL),
(1560, 32, 3, 5, NULL, NULL),
(1561, 33, 3, 5, NULL, NULL),
(1562, 34, 3, 5, NULL, NULL),
(1563, 1, 3, 6, NULL, NULL),
(1564, 2, 3, 6, NULL, NULL),
(1565, 3, 3, 6, NULL, NULL),
(1566, 4, 3, 6, NULL, NULL),
(1567, 5, 3, 6, NULL, NULL),
(1568, 6, 3, 6, NULL, NULL),
(1569, 7, 3, 6, NULL, NULL),
(1570, 8, 3, 6, NULL, NULL),
(1571, 9, 3, 6, NULL, NULL),
(1572, 10, 3, 6, NULL, NULL),
(1573, 11, 3, 6, NULL, NULL),
(1574, 12, 3, 6, NULL, NULL),
(1575, 13, 3, 6, NULL, NULL),
(1576, 14, 3, 6, NULL, NULL),
(1577, 15, 3, 6, NULL, NULL),
(1578, 16, 3, 6, NULL, NULL),
(1579, 17, 3, 6, NULL, NULL),
(1580, 18, 3, 6, NULL, NULL),
(1581, 19, 3, 6, NULL, NULL),
(1582, 20, 3, 6, NULL, NULL),
(1583, 21, 3, 6, NULL, NULL),
(1584, 22, 3, 6, NULL, NULL),
(1585, 23, 3, 6, NULL, NULL),
(1586, 24, 3, 6, NULL, NULL),
(1587, 25, 3, 6, NULL, NULL),
(1588, 26, 3, 6, NULL, NULL),
(1589, 27, 3, 6, NULL, NULL),
(1590, 28, 3, 6, NULL, NULL),
(1591, 29, 3, 6, NULL, NULL),
(1592, 30, 3, 6, NULL, NULL),
(1593, 31, 3, 6, NULL, NULL),
(1594, 32, 3, 6, NULL, NULL),
(1595, 33, 3, 6, NULL, NULL),
(1596, 34, 3, 6, NULL, NULL),
(1597, 1, 4, 1, NULL, NULL),
(1598, 2, 4, 1, NULL, NULL),
(1599, 3, 4, 1, NULL, NULL),
(1600, 4, 4, 1, NULL, NULL),
(1601, 5, 4, 1, NULL, NULL),
(1602, 6, 4, 1, NULL, NULL),
(1603, 7, 4, 1, NULL, NULL),
(1604, 8, 4, 1, NULL, NULL),
(1605, 9, 4, 1, NULL, NULL),
(1606, 10, 4, 1, NULL, NULL),
(1607, 11, 4, 1, NULL, NULL),
(1608, 12, 4, 1, NULL, NULL),
(1609, 13, 4, 1, NULL, NULL),
(1610, 14, 4, 1, NULL, NULL),
(1611, 15, 4, 1, NULL, NULL),
(1612, 16, 4, 1, NULL, NULL),
(1613, 17, 4, 1, NULL, NULL),
(1614, 18, 4, 1, NULL, NULL),
(1615, 19, 4, 1, NULL, NULL),
(1616, 20, 4, 1, NULL, NULL),
(1617, 21, 4, 1, NULL, NULL),
(1618, 22, 4, 1, NULL, NULL),
(1619, 23, 4, 1, NULL, NULL),
(1620, 24, 4, 1, NULL, NULL),
(1621, 25, 4, 1, NULL, NULL),
(1622, 26, 4, 1, NULL, NULL),
(1623, 27, 4, 1, NULL, NULL),
(1624, 28, 4, 1, NULL, NULL),
(1625, 29, 4, 1, NULL, NULL),
(1626, 30, 4, 1, NULL, NULL),
(1627, 31, 4, 1, NULL, NULL),
(1628, 32, 4, 1, NULL, NULL),
(1629, 33, 4, 1, NULL, NULL),
(1630, 34, 4, 1, NULL, NULL),
(1631, 1, 4, 2, NULL, NULL),
(1632, 2, 4, 2, NULL, NULL),
(1633, 3, 4, 2, NULL, NULL),
(1634, 4, 4, 2, NULL, NULL),
(1635, 5, 4, 2, NULL, NULL),
(1636, 6, 4, 2, NULL, NULL),
(1637, 7, 4, 2, NULL, NULL),
(1638, 8, 4, 2, NULL, NULL),
(1639, 9, 4, 2, NULL, NULL),
(1640, 10, 4, 2, NULL, NULL),
(1641, 11, 4, 2, NULL, NULL),
(1642, 12, 4, 2, NULL, NULL),
(1643, 13, 4, 2, NULL, NULL),
(1644, 14, 4, 2, NULL, NULL),
(1645, 15, 4, 2, NULL, NULL),
(1646, 16, 4, 2, NULL, NULL),
(1647, 17, 4, 2, NULL, NULL),
(1648, 18, 4, 2, NULL, NULL),
(1649, 19, 4, 2, NULL, NULL),
(1650, 20, 4, 2, NULL, NULL),
(1651, 21, 4, 2, NULL, NULL),
(1652, 22, 4, 2, NULL, NULL),
(1653, 23, 4, 2, NULL, NULL),
(1654, 24, 4, 2, NULL, NULL),
(1655, 25, 4, 2, NULL, NULL),
(1656, 26, 4, 2, NULL, NULL),
(1657, 27, 4, 2, NULL, NULL),
(1658, 28, 4, 2, NULL, NULL),
(1659, 29, 4, 2, NULL, NULL),
(1660, 30, 4, 2, NULL, NULL),
(1661, 31, 4, 2, NULL, NULL),
(1662, 32, 4, 2, NULL, NULL),
(1663, 33, 4, 2, NULL, NULL),
(1664, 34, 4, 2, NULL, NULL),
(1665, 1, 4, 3, NULL, NULL),
(1666, 2, 4, 3, NULL, NULL),
(1667, 3, 4, 3, NULL, NULL),
(1668, 4, 4, 3, NULL, NULL),
(1669, 5, 4, 3, NULL, NULL),
(1670, 6, 4, 3, NULL, NULL),
(1671, 7, 4, 3, NULL, NULL),
(1672, 8, 4, 3, NULL, NULL),
(1673, 9, 4, 3, NULL, NULL),
(1674, 10, 4, 3, NULL, NULL),
(1675, 11, 4, 3, NULL, NULL),
(1676, 12, 4, 3, NULL, NULL),
(1677, 13, 4, 3, NULL, NULL),
(1678, 14, 4, 3, NULL, NULL),
(1679, 15, 4, 3, NULL, NULL),
(1680, 16, 4, 3, NULL, NULL),
(1681, 17, 4, 3, NULL, NULL),
(1682, 18, 4, 3, NULL, NULL),
(1683, 19, 4, 3, NULL, NULL),
(1684, 20, 4, 3, NULL, NULL),
(1685, 21, 4, 3, NULL, NULL),
(1686, 22, 4, 3, NULL, NULL),
(1687, 23, 4, 3, NULL, NULL),
(1688, 24, 4, 3, NULL, NULL),
(1689, 25, 4, 3, NULL, NULL),
(1690, 26, 4, 3, NULL, NULL),
(1691, 27, 4, 3, NULL, NULL),
(1692, 28, 4, 3, NULL, NULL),
(1693, 29, 4, 3, NULL, NULL),
(1694, 30, 4, 3, NULL, NULL),
(1695, 31, 4, 3, NULL, NULL),
(1696, 32, 4, 3, NULL, NULL),
(1697, 33, 4, 3, NULL, NULL),
(1698, 1, 4, 4, NULL, NULL),
(1699, 2, 4, 4, NULL, NULL),
(1700, 3, 4, 4, NULL, NULL),
(1701, 4, 4, 4, NULL, NULL),
(1702, 5, 4, 4, NULL, NULL),
(1703, 6, 4, 4, NULL, NULL),
(1704, 7, 4, 4, NULL, NULL),
(1705, 8, 4, 4, NULL, NULL),
(1706, 9, 4, 4, NULL, NULL),
(1707, 10, 4, 4, NULL, NULL),
(1708, 11, 4, 4, NULL, NULL),
(1709, 12, 4, 4, NULL, NULL),
(1710, 13, 4, 4, NULL, NULL),
(1711, 14, 4, 4, NULL, NULL),
(1712, 15, 4, 4, NULL, NULL),
(1713, 16, 4, 4, NULL, NULL),
(1714, 17, 4, 4, NULL, NULL),
(1715, 18, 4, 4, NULL, NULL),
(1716, 19, 4, 4, NULL, NULL),
(1717, 20, 4, 4, NULL, NULL),
(1718, 21, 4, 4, NULL, NULL),
(1719, 22, 4, 4, NULL, NULL),
(1720, 23, 4, 4, NULL, NULL),
(1721, 24, 4, 4, NULL, NULL),
(1722, 25, 4, 4, NULL, NULL),
(1723, 26, 4, 4, NULL, NULL),
(1724, 27, 4, 4, NULL, NULL),
(1725, 28, 4, 4, NULL, NULL),
(1726, 29, 4, 4, NULL, NULL),
(1727, 30, 4, 4, NULL, NULL),
(1728, 31, 4, 4, NULL, NULL),
(1729, 32, 4, 4, NULL, NULL),
(1730, 33, 4, 4, NULL, NULL),
(1731, 1, 4, 5, NULL, NULL),
(1732, 2, 4, 5, NULL, NULL),
(1733, 3, 4, 5, NULL, NULL),
(1734, 4, 4, 5, NULL, NULL),
(1735, 5, 4, 5, NULL, NULL),
(1736, 6, 4, 5, NULL, NULL),
(1737, 7, 4, 5, NULL, NULL),
(1738, 8, 4, 5, NULL, NULL),
(1739, 9, 4, 5, NULL, NULL),
(1740, 10, 4, 5, NULL, NULL),
(1741, 11, 4, 5, NULL, NULL),
(1742, 12, 4, 5, NULL, NULL),
(1743, 13, 4, 5, NULL, NULL),
(1744, 14, 4, 5, NULL, NULL),
(1745, 15, 4, 5, NULL, NULL),
(1746, 16, 4, 5, NULL, NULL),
(1747, 17, 4, 5, NULL, NULL),
(1748, 18, 4, 5, NULL, NULL),
(1749, 19, 4, 5, NULL, NULL),
(1750, 20, 4, 5, NULL, NULL),
(1751, 21, 4, 5, NULL, NULL),
(1752, 22, 4, 5, NULL, NULL),
(1753, 23, 4, 5, NULL, NULL),
(1754, 24, 4, 5, NULL, NULL),
(1755, 25, 4, 5, NULL, NULL),
(1756, 26, 4, 5, NULL, NULL),
(1757, 27, 4, 5, NULL, NULL),
(1758, 28, 4, 5, NULL, NULL),
(1759, 29, 4, 5, NULL, NULL),
(1760, 30, 4, 5, NULL, NULL),
(1761, 31, 4, 5, NULL, NULL),
(1762, 32, 4, 5, NULL, NULL),
(1763, 33, 4, 5, NULL, NULL),
(1764, 34, 4, 5, NULL, NULL),
(1765, 1, 4, 6, NULL, NULL),
(1766, 2, 4, 6, NULL, NULL),
(1767, 3, 4, 6, NULL, NULL),
(1768, 4, 4, 6, NULL, NULL),
(1769, 5, 4, 6, NULL, NULL),
(1770, 6, 4, 6, NULL, NULL),
(1771, 7, 4, 6, NULL, NULL),
(1772, 8, 4, 6, NULL, NULL),
(1773, 9, 4, 6, NULL, NULL),
(1774, 10, 4, 6, NULL, NULL),
(1775, 11, 4, 6, NULL, NULL),
(1776, 12, 4, 6, NULL, NULL),
(1777, 13, 4, 6, NULL, NULL),
(1778, 14, 4, 6, NULL, NULL),
(1779, 15, 4, 6, NULL, NULL),
(1780, 16, 4, 6, NULL, NULL),
(1781, 17, 4, 6, NULL, NULL),
(1782, 18, 4, 6, NULL, NULL),
(1783, 19, 4, 6, NULL, NULL),
(1784, 20, 4, 6, NULL, NULL),
(1785, 21, 4, 6, NULL, NULL),
(1786, 22, 4, 6, NULL, NULL),
(1787, 23, 4, 6, NULL, NULL),
(1788, 24, 4, 6, NULL, NULL),
(1789, 25, 4, 6, NULL, NULL),
(1790, 26, 4, 6, NULL, NULL),
(1791, 27, 4, 6, NULL, NULL),
(1792, 28, 4, 6, NULL, NULL),
(1793, 29, 4, 6, NULL, NULL),
(1794, 30, 4, 6, NULL, NULL),
(1795, 31, 4, 6, NULL, NULL),
(1796, 32, 4, 6, NULL, NULL),
(1797, 33, 4, 6, NULL, NULL),
(1798, 34, 4, 6, NULL, NULL),
(1799, 1, 5, 1, NULL, NULL),
(1800, 2, 5, 1, NULL, NULL),
(1801, 3, 5, 1, NULL, NULL),
(1802, 4, 5, 1, NULL, NULL),
(1803, 5, 5, 1, NULL, NULL),
(1804, 6, 5, 1, NULL, NULL),
(1805, 7, 5, 1, NULL, NULL),
(1806, 8, 5, 1, NULL, NULL),
(1807, 9, 5, 1, NULL, NULL),
(1808, 10, 5, 1, NULL, NULL),
(1809, 11, 5, 1, NULL, NULL),
(1810, 12, 5, 1, NULL, NULL),
(1811, 13, 5, 1, NULL, NULL),
(1812, 14, 5, 1, NULL, NULL),
(1813, 15, 5, 1, NULL, NULL),
(1814, 16, 5, 1, NULL, NULL),
(1815, 17, 5, 1, NULL, NULL),
(1816, 18, 5, 1, NULL, NULL),
(1817, 19, 5, 1, NULL, NULL),
(1818, 20, 5, 1, NULL, NULL),
(1819, 21, 5, 1, NULL, NULL),
(1820, 22, 5, 1, NULL, NULL),
(1821, 23, 5, 1, NULL, NULL),
(1822, 24, 5, 1, NULL, NULL),
(1823, 25, 5, 1, NULL, NULL),
(1824, 26, 5, 1, NULL, NULL),
(1825, 27, 5, 1, NULL, NULL),
(1826, 28, 5, 1, NULL, NULL),
(1827, 29, 5, 1, NULL, NULL),
(1828, 30, 5, 1, NULL, NULL),
(1829, 31, 5, 1, NULL, NULL),
(1830, 32, 5, 1, NULL, NULL),
(1831, 33, 5, 1, NULL, NULL),
(1832, 34, 5, 1, NULL, NULL),
(1833, 1, 5, 2, NULL, NULL),
(1834, 2, 5, 2, NULL, NULL),
(1835, 3, 5, 2, NULL, NULL),
(1836, 4, 5, 2, NULL, NULL),
(1837, 5, 5, 2, NULL, NULL),
(1838, 6, 5, 2, NULL, NULL),
(1839, 7, 5, 2, NULL, NULL),
(1840, 8, 5, 2, NULL, NULL),
(1841, 9, 5, 2, NULL, NULL),
(1842, 10, 5, 2, NULL, NULL),
(1843, 11, 5, 2, NULL, NULL),
(1844, 12, 5, 2, NULL, NULL),
(1845, 13, 5, 2, NULL, NULL),
(1846, 14, 5, 2, NULL, NULL),
(1847, 15, 5, 2, NULL, NULL),
(1848, 16, 5, 2, NULL, NULL),
(1849, 17, 5, 2, NULL, NULL),
(1850, 18, 5, 2, NULL, NULL),
(1851, 19, 5, 2, NULL, NULL),
(1852, 20, 5, 2, NULL, NULL),
(1853, 21, 5, 2, NULL, NULL),
(1854, 22, 5, 2, NULL, NULL),
(1855, 23, 5, 2, NULL, NULL),
(1856, 24, 5, 2, NULL, NULL),
(1857, 25, 5, 2, NULL, NULL),
(1858, 26, 5, 2, NULL, NULL),
(1859, 27, 5, 2, NULL, NULL),
(1860, 28, 5, 2, NULL, NULL),
(1861, 29, 5, 2, NULL, NULL),
(1862, 30, 5, 2, NULL, NULL),
(1863, 31, 5, 2, NULL, NULL),
(1864, 32, 5, 2, NULL, NULL),
(1865, 33, 5, 2, NULL, NULL),
(1866, 34, 5, 2, NULL, NULL),
(1867, 1, 5, 3, NULL, NULL),
(1868, 2, 5, 3, NULL, NULL),
(1869, 3, 5, 3, NULL, NULL),
(1870, 4, 5, 3, NULL, NULL),
(1871, 5, 5, 3, NULL, NULL),
(1872, 6, 5, 3, NULL, NULL),
(1873, 7, 5, 3, NULL, NULL),
(1874, 8, 5, 3, NULL, NULL),
(1875, 9, 5, 3, NULL, NULL),
(1876, 10, 5, 3, NULL, NULL),
(1877, 11, 5, 3, NULL, NULL),
(1878, 12, 5, 3, NULL, NULL),
(1879, 13, 5, 3, NULL, NULL),
(1880, 14, 5, 3, NULL, NULL),
(1881, 15, 5, 3, NULL, NULL),
(1882, 16, 5, 3, NULL, NULL),
(1883, 17, 5, 3, NULL, NULL),
(1884, 18, 5, 3, NULL, NULL),
(1885, 19, 5, 3, NULL, NULL),
(1886, 20, 5, 3, NULL, NULL),
(1887, 21, 5, 3, NULL, NULL),
(1888, 22, 5, 3, NULL, NULL),
(1889, 23, 5, 3, NULL, NULL),
(1890, 24, 5, 3, NULL, NULL),
(1891, 25, 5, 3, NULL, NULL),
(1892, 26, 5, 3, NULL, NULL),
(1893, 27, 5, 3, NULL, NULL),
(1894, 28, 5, 3, NULL, NULL),
(1895, 29, 5, 3, NULL, NULL),
(1896, 30, 5, 3, NULL, NULL),
(1897, 31, 5, 3, NULL, NULL),
(1898, 32, 5, 3, NULL, NULL),
(1899, 33, 5, 3, NULL, NULL),
(1900, 1, 5, 4, NULL, NULL),
(1901, 2, 5, 4, NULL, NULL),
(1902, 3, 5, 4, NULL, NULL),
(1903, 4, 5, 4, NULL, NULL),
(1904, 5, 5, 4, NULL, NULL),
(1905, 6, 5, 4, NULL, NULL),
(1906, 7, 5, 4, NULL, NULL),
(1907, 8, 5, 4, NULL, NULL),
(1908, 9, 5, 4, NULL, NULL),
(1909, 10, 5, 4, NULL, NULL),
(1910, 11, 5, 4, NULL, NULL),
(1911, 12, 5, 4, NULL, NULL),
(1912, 13, 5, 4, NULL, NULL),
(1913, 14, 5, 4, NULL, NULL),
(1914, 15, 5, 4, NULL, NULL),
(1915, 16, 5, 4, NULL, NULL),
(1916, 17, 5, 4, NULL, NULL),
(1917, 18, 5, 4, NULL, NULL),
(1918, 19, 5, 4, NULL, NULL),
(1919, 20, 5, 4, NULL, NULL),
(1920, 21, 5, 4, NULL, NULL),
(1921, 22, 5, 4, NULL, NULL),
(1922, 23, 5, 4, NULL, NULL),
(1923, 24, 5, 4, NULL, NULL),
(1924, 25, 5, 4, NULL, NULL),
(1925, 26, 5, 4, NULL, NULL),
(1926, 27, 5, 4, NULL, NULL),
(1927, 28, 5, 4, NULL, NULL),
(1928, 29, 5, 4, NULL, NULL),
(1929, 30, 5, 4, NULL, NULL),
(1930, 31, 5, 4, NULL, NULL),
(1931, 32, 5, 4, NULL, NULL),
(1932, 33, 5, 4, NULL, NULL),
(1933, 1, 5, 5, NULL, NULL),
(1934, 2, 5, 5, NULL, NULL),
(1935, 3, 5, 5, NULL, NULL),
(1936, 4, 5, 5, NULL, NULL),
(1937, 5, 5, 5, NULL, NULL),
(1938, 6, 5, 5, NULL, NULL),
(1939, 7, 5, 5, NULL, NULL),
(1940, 8, 5, 5, NULL, NULL),
(1941, 9, 5, 5, NULL, NULL),
(1942, 10, 5, 5, NULL, NULL),
(1943, 11, 5, 5, NULL, NULL),
(1944, 12, 5, 5, NULL, NULL),
(1945, 13, 5, 5, NULL, NULL),
(1946, 14, 5, 5, NULL, NULL),
(1947, 15, 5, 5, NULL, NULL),
(1948, 16, 5, 5, NULL, NULL),
(1949, 17, 5, 5, NULL, NULL),
(1950, 18, 5, 5, NULL, NULL),
(1951, 19, 5, 5, NULL, NULL),
(1952, 20, 5, 5, NULL, NULL),
(1953, 21, 5, 5, NULL, NULL),
(1954, 22, 5, 5, NULL, NULL),
(1955, 23, 5, 5, NULL, NULL),
(1956, 24, 5, 5, NULL, NULL),
(1957, 25, 5, 5, NULL, NULL),
(1958, 26, 5, 5, NULL, NULL),
(1959, 27, 5, 5, NULL, NULL),
(1960, 28, 5, 5, NULL, NULL),
(1961, 29, 5, 5, NULL, NULL),
(1962, 30, 5, 5, NULL, NULL),
(1963, 31, 5, 5, NULL, NULL),
(1964, 32, 5, 5, NULL, NULL),
(1965, 33, 5, 5, NULL, NULL),
(1966, 34, 5, 5, NULL, NULL),
(1967, 1, 5, 6, NULL, NULL),
(1968, 2, 5, 6, NULL, NULL),
(1969, 3, 5, 6, NULL, NULL),
(1970, 4, 5, 6, NULL, NULL),
(1971, 5, 5, 6, NULL, NULL),
(1972, 6, 5, 6, NULL, NULL),
(1973, 7, 5, 6, NULL, NULL),
(1974, 8, 5, 6, NULL, NULL),
(1975, 9, 5, 6, NULL, NULL),
(1976, 10, 5, 6, NULL, NULL),
(1977, 11, 5, 6, NULL, NULL),
(1978, 12, 5, 6, NULL, NULL),
(1979, 13, 5, 6, NULL, NULL),
(1980, 14, 5, 6, NULL, NULL),
(1981, 15, 5, 6, NULL, NULL),
(1982, 16, 5, 6, NULL, NULL),
(1983, 17, 5, 6, NULL, NULL),
(1984, 18, 5, 6, NULL, NULL),
(1985, 19, 5, 6, NULL, NULL),
(1986, 20, 5, 6, NULL, NULL),
(1987, 21, 5, 6, NULL, NULL),
(1988, 22, 5, 6, NULL, NULL),
(1989, 23, 5, 6, NULL, NULL),
(1990, 24, 5, 6, NULL, NULL),
(1991, 25, 5, 6, NULL, NULL),
(1992, 26, 5, 6, NULL, NULL),
(1993, 27, 5, 6, NULL, NULL),
(1994, 28, 5, 6, NULL, NULL),
(1995, 29, 5, 6, NULL, NULL),
(1996, 30, 5, 6, NULL, NULL),
(1997, 31, 5, 6, NULL, NULL),
(1998, 32, 5, 6, NULL, NULL),
(1999, 33, 5, 6, NULL, NULL),
(2000, 34, 5, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_22_155418_create_locales_table', 2),
(6, 'create_asignaturas_table', 3),
(7, 'create_balancedecarga_table', 4),
(8, 'create_generarhorario_table', 5),
(9, '2022_07_26_142705_create_grupos_table', 6),
(10, '2022_07_26_143115_create_profesor_table', 7),
(11, 'create_afectaciones_table', 8),
(12, '2022_07_26_143759_create_prof__grup__asigs_table', 9),
(13, 'create_locales_disponibles_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `profesor`
--

CREATE TABLE `profesor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asignaturas_id` bigint(20) UNSIGNED NOT NULL,
  `nombreprofesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `claseimparte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profesor`
--

INSERT INTO `profesor` (`id`, `asignaturas_id`, `nombreprofesor`, `claseimparte`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jose', 'C', NULL, NULL),
(2, 1, 'Richard', 'C', NULL, NULL),
(3, 3, 'Daniel', 'C', NULL, NULL),
(4, 3, 'Milena', 'C', NULL, NULL),
(5, 5, 'Profesor_EF', 'C', NULL, NULL),
(6, 2, 'Rubisel', 'C', NULL, NULL),
(7, 2, 'Esteban', 'C', NULL, NULL),
(8, 4, 'Luis', 'C', NULL, NULL),
(9, 4, 'Pedro', 'C', NULL, NULL),
(10, 6, 'Mesana', 'C', NULL, NULL),
(11, 6, 'Eladio', 'C', NULL, NULL),
(12, 3, 'Julito', 'CP', NULL, NULL),
(13, 3, 'Pepe', 'CP', NULL, NULL),
(14, 1, 'Yaiselis', 'CP', NULL, NULL),
(15, 1, 'Julita', 'CP', NULL, NULL),
(16, 2, 'Elieser', 'CP', NULL, NULL),
(17, 2, 'Manuel', 'CP', NULL, NULL),
(18, 4, 'Josue', 'CP', NULL, NULL),
(19, 4, 'Jesus', 'CP', NULL, NULL),
(20, 5, 'Profesor_EF', 'CP', NULL, NULL),
(21, 6, 'frank', 'CP', NULL, NULL),
(22, 6, 'yoan', 'CP', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prof__grup__asigs`
--

CREATE TABLE `prof__grup__asigs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `asignaturas_id` bigint(20) UNSIGNED NOT NULL,
  `grupos_id` bigint(20) UNSIGNED NOT NULL,
  `profesor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prof__grup__asigs`
--

INSERT INTO `prof__grup__asigs` (`id`, `asignaturas_id`, `grupos_id`, `profesor_id`, `created_at`, `updated_at`) VALUES
(4, 3, 1, 3, NULL, NULL),
(5, 3, 2, 3, NULL, NULL),
(6, 3, 3, 3, NULL, NULL),
(7, 3, 1, 12, NULL, NULL),
(8, 3, 2, 12, NULL, NULL),
(9, 3, 3, 12, NULL, NULL),
(10, 3, 4, 4, NULL, NULL),
(11, 3, 5, 4, NULL, NULL),
(12, 3, 6, 4, NULL, NULL),
(13, 3, 4, 13, NULL, NULL),
(14, 3, 5, 13, NULL, NULL),
(15, 3, 6, 13, NULL, NULL),
(16, 5, 1, 5, NULL, NULL),
(17, 5, 2, 5, NULL, NULL),
(18, 5, 3, 5, NULL, NULL),
(19, 5, 4, 5, NULL, NULL),
(20, 5, 5, 5, NULL, NULL),
(21, 5, 6, 5, NULL, NULL),
(22, 1, 1, 1, NULL, NULL),
(23, 1, 2, 1, NULL, NULL),
(24, 1, 3, 1, NULL, NULL),
(25, 1, 1, 14, NULL, NULL),
(26, 1, 2, 14, NULL, NULL),
(27, 1, 3, 14, NULL, NULL),
(28, 1, 4, 2, NULL, NULL),
(29, 1, 5, 2, NULL, NULL),
(30, 1, 6, 2, NULL, NULL),
(31, 1, 4, 15, NULL, NULL),
(32, 1, 5, 15, NULL, NULL),
(33, 1, 6, 15, NULL, NULL),
(34, 2, 1, 6, NULL, NULL),
(35, 2, 2, 6, NULL, NULL),
(36, 2, 3, 6, NULL, NULL),
(37, 2, 4, 7, NULL, NULL),
(38, 2, 5, 7, NULL, NULL),
(39, 2, 6, 7, NULL, NULL),
(40, 2, 1, 16, NULL, NULL),
(41, 2, 2, 16, NULL, NULL),
(42, 2, 3, 16, NULL, NULL),
(43, 2, 4, 17, NULL, NULL),
(44, 2, 5, 17, NULL, NULL),
(45, 2, 6, 17, NULL, NULL),
(46, 4, 1, 8, NULL, NULL),
(47, 4, 2, 8, NULL, NULL),
(48, 4, 3, 8, NULL, NULL),
(49, 4, 4, 9, NULL, NULL),
(50, 4, 5, 9, NULL, NULL),
(51, 4, 6, 9, NULL, NULL),
(52, 4, 1, 19, NULL, NULL),
(53, 4, 2, 19, NULL, NULL),
(54, 4, 3, 19, NULL, NULL),
(55, 4, 4, 18, NULL, NULL),
(56, 4, 5, 18, NULL, NULL),
(57, 4, 6, 18, NULL, NULL),
(58, 6, 1, 10, NULL, NULL),
(59, 6, 2, 10, NULL, NULL),
(60, 6, 3, 10, NULL, NULL),
(61, 6, 4, 11, NULL, NULL),
(62, 6, 5, 11, NULL, NULL),
(63, 6, 6, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relaciones`
--

CREATE TABLE `relaciones` (
  `id` int(11) NOT NULL,
  `id_disp` int(11) NOT NULL,
  `id_planif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relaciones`
--

INSERT INTO `relaciones` (`id`, `id_disp`, `id_planif`) VALUES
(1106, 1007, 4),
(1107, 1043, 5),
(1108, 1076, 6),
(1109, 1010, 10),
(1110, 1041, 11),
(1111, 1077, 12),
(1112, 1203, 7),
(1113, 1228, 8),
(1114, 1273, 9),
(1115, 1206, 13),
(1116, 1231, 14),
(1117, 1276, 15),
(1118, 1158, 16),
(1119, 1192, 17),
(1120, 1360, 18),
(1121, 1394, 19),
(1122, 1562, 20),
(1123, 1596, 21),
(1124, 1044, 22),
(1125, 1008, 23),
(1126, 1211, 24),
(1127, 1042, 28),
(1128, 1011, 29),
(1129, 1209, 30),
(1130, 1234, 25),
(1131, 1195, 26),
(1132, 1395, 27),
(1133, 1237, 31),
(1134, 1198, 32),
(1135, 1398, 33),
(1136, 1075, 34),
(1137, 1278, 35),
(1138, 1009, 36),
(1139, 1078, 37),
(1140, 1281, 38),
(1141, 1045, 39),
(1142, 1262, 40),
(1143, 1401, 41),
(1144, 1240, 42),
(1145, 1265, 43),
(1146, 1404, 44),
(1147, 1229, 45),
(1148, 1411, 46),
(1149, 1079, 47),
(1150, 1445, 48),
(1151, 1414, 49),
(1152, 1448, 50),
(1153, 1481, 51),
(1154, 1599, 52),
(1155, 1443, 53),
(1156, 1632, 54),
(1157, 1602, 55),
(1158, 1635, 56),
(1159, 1666, 57),
(1160, 1446, 58),
(1161, 1479, 59),
(1162, 1615, 60),
(1163, 1449, 61),
(1164, 1482, 62),
(1165, 1613, 63);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Richard', 'richardcastanetblanco@gmail.com', NULL, '$2y$10$BvQ2yXDLz84On1OGnRQ/SOZviDQoC9CZSKrBByNEz7eD/n3gMCy6K', NULL, '2022-07-26 19:07:18', '2022-07-26 19:07:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afectaciones`
--
ALTER TABLE `afectaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balancedecarga`
--
ALTER TABLE `balancedecarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `balancedecarga_asignaturas_id_foreign` (`asignaturas_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `generarhorario`
--
ALTER TABLE `generarhorario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horario_generado`
--
ALTER TABLE `horario_generado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locales_disponibles`
--
ALTER TABLE `locales_disponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locales_disponibles_local_id_foreign` (`local_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesor_asignaturas_id_foreign` (`asignaturas_id`);

--
-- Indexes for table `prof__grup__asigs`
--
ALTER TABLE `prof__grup__asigs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prof__grup__asigs_asignaturas_id_foreign` (`asignaturas_id`),
  ADD KEY `prof__grup__asigs_grupos_id_foreign` (`grupos_id`),
  ADD KEY `prof__grup__asigs_profesor_id_foreign` (`profesor_id`);

--
-- Indexes for table `relaciones`
--
ALTER TABLE `relaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afectaciones`
--
ALTER TABLE `afectaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `balancedecarga`
--
ALTER TABLE `balancedecarga`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `generarhorario`
--
ALTER TABLE `generarhorario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `horario_generado`
--
ALTER TABLE `horario_generado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `locales`
--
ALTER TABLE `locales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `locales_disponibles`
--
ALTER TABLE `locales_disponibles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prof__grup__asigs`
--
ALTER TABLE `prof__grup__asigs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `relaciones`
--
ALTER TABLE `relaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1166;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `balancedecarga`
--
ALTER TABLE `balancedecarga`
  ADD CONSTRAINT `balancedecarga_asignaturas_id_foreign` FOREIGN KEY (`asignaturas_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locales_disponibles`
--
ALTER TABLE `locales_disponibles`
  ADD CONSTRAINT `locales_disponibles_local_id_foreign` FOREIGN KEY (`local_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_asignaturas_id_foreign` FOREIGN KEY (`asignaturas_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prof__grup__asigs`
--
ALTER TABLE `prof__grup__asigs`
  ADD CONSTRAINT `prof__grup__asigs_asignaturas_id_foreign` FOREIGN KEY (`asignaturas_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prof__grup__asigs_grupos_id_foreign` FOREIGN KEY (`grupos_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prof__grup__asigs_profesor_id_foreign` FOREIGN KEY (`profesor_id`) REFERENCES `profesor` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
