-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2022 at 06:52 AM
-- Server version: 5.7.36
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freaktem_exercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(11) NOT NULL,
  `currency` varchar(30) NOT NULL,
  `email` varchar(70) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `user_name` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `currency`, `email`, `password`, `user_name`) VALUES
(1, 'MAD - د.م.', 'admin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `android_metadata`
--

CREATE TABLE `android_metadata` (
  `locale` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `android_metadata`
--

INSERT INTO `android_metadata` (`locale`) VALUES
('en_IN');

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL,
  `name` varchar(10000) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `workout_intensity` varchar(1000) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `exercise_days` varchar(100) DEFAULT NULL,
  `create_at` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id`, `name`, `phone`, `gender`, `workout_intensity`, `age`, `height`, `exercise_days`, `create_at`) VALUES
(1, 'redixbit', '1234567890', 'female', '100', '24', '5.2', '10', '1970-01-01'),
(2, 'redixbit', '1234567890', 'female', '100', '24', '5.2', '10', '1970-01-01'),
(3, 'redixbit', '1234567890', 'female', '100', '24', '5.2', '10', '1970-01-01'),
(4, 'redixbit', '1234567890', 'female', '100', '24', '5.2', '10', '1970-01-01'),
(5, 'Saazi William', '258025802580', 'Male', '75', '21', '60 Cm', '5 days in week', '1970-01-01'),
(6, 'Saazi', '369036903690', 'Female', '75', '21', '60 Cm', '5 days in week', '1970-01-01'),
(7, 'Remona', '14789147891', 'Male', 'Moderate', '21', '60 Cm', '5 days in week', '1970-01-01'),
(8, 'john Cena', '1122334455', 'Male', 'Moderate', '21', '53 Cm', '5 days in week', '1970-01-01'),
(9, 'Saazi Tere', '258025802580', 'Female', 'Moderate', '20', '55 Cm', 'All 7 days', '1970-01-01'),
(10, 'john deere', '1122334455', 'Female', 'High', '19', '55 Cm', 'All 7 days', '1970-01-01'),
(11, 'Pedro', '61999049526', 'Male', 'Moderate', '39', '60 Cm', '2-3 times in week', '1970-01-01'),
(12, 'j', '6', 'Male', 'High', '18', '50 Cm', '2-3 times in week', '1970-01-01'),
(13, 'hello', '0724071589', 'Male', 'High', '39', '60 Cm', '5 days in week', '1970-01-01'),
(14, 'hello', '0724071589', 'Male', 'Moderate', '39', '60 Cm', '2-3 times in week', '1970-01-01'),
(15, 'carlos', '678507673', 'Male', 'Low', '49', '54 Cm', '2-3 times in week', '1970-01-01'),
(16, 'moha', '0865659858', 'Male', 'Moderate', '39', '62 Cm', '2-3 times in week', '1970-01-01'),
(17, 'momo', '068955555', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(18, 'momo', '068955555', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(19, 'john due', '1122334455', 'Male', 'Low', '20', '50 Cm', '2-3 times in week', '1970-01-01'),
(20, 'hhhhh', '585955', 'Female', 'Moderate', '14', '50 Cm', '5 days in week', '1970-01-01'),
(21, 'vj', '7906058118', 'Male', 'Low', '21', '50 Cm', '2-3 times in week', '1970-01-01'),
(22, 'OHG', '12345678', 'Male', 'Moderate', '41', '45 Cm', '2-3 times in week', '1970-01-01'),
(23, 'NEURE', '645842464', 'Male', 'Low', '29', '60 Cm', '2-3 times in week', '1970-01-01'),
(24, 'NEURE', '645842464', 'Male', 'Low', '29', '60 Cm', '2-3 times in week', '1970-01-01'),
(25, 'juan', '3184364596', 'Male', 'Moderate', '43', '50 Cm', '2-3 times in week', '1970-01-01'),
(26, 'juan', '3184364596', 'Male', 'Moderate', '43', '50 Cm', '2-3 times in week', '1970-01-01'),
(27, 'juan', '3184364596', 'Male', 'Moderate', '43', '50 Cm', '2-3 times in week', '1970-01-01'),
(28, 'faisal', '50508585', 'Female', 'Moderate', '26', '50 Cm', '5 days in week', '1970-01-01'),
(29, 'Test', '111-111-1111', 'Male', 'High', '20', '50 Cm', '2-3 times in week', '1970-01-01'),
(30, 'Test', '111-111-1111', 'Male', 'High', '20', '50 Cm', '2-3 times in week', '1970-01-01'),
(31, 'fy', '8888888888', 'Male', 'High', '22', '50 Cm', '5 days in week', '1970-01-01'),
(32, 'ojong', '2817279337', 'Male', 'High', '31', '54 Cm', '2-3 times in week', '1970-01-01'),
(33, 'Dee Test', '0244918309', 'Male', 'Low', '28', '50 Cm', '2-3 times in week', '1970-01-01'),
(34, 'asss', '01027487867', 'Male', 'Low', '26', '53 Cm', '2-3 times in week', '1970-01-01'),
(35, 'shubh', '9123456489', 'Male', 'Low', '23', '44 Cm', '2-3 times in week', '1970-01-01'),
(36, 'shubh', '9123456489', 'Male', 'Low', '23', '44 Cm', '2-3 times in week', '1970-01-01'),
(37, 'Tony', '0938686868', 'Male', 'Low', '34', '50 Cm', '2-3 times in week', '1970-01-01'),
(38, 'erdem', '05387912568', 'Male', 'High', '27', '62 Cm', 'All 7 days', '1970-01-01'),
(39, 'Shakira ', '01913379193', 'Female', 'Moderate', '15', '48 Cm', 'All 7 days', '1970-01-01'),
(40, 'jan', '3154236954', 'Male', 'Low', '16', '46 Cm', '2-3 times in week', '1970-01-01'),
(41, 'juanjose', '3124526385', 'Female', 'Low', '14', '50 Cm', '5 days in week', '1970-01-01'),
(42, 'juanjose', '3124526385', 'Female', 'Low', '14', '50 Cm', '5 days in week', '1970-01-01'),
(43, 'jjdjd', '123456789', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(44, 'jjdjd', '123456789', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(45, 'Sara', '258025802500', 'Female', 'Moderate', '25', '45 Cm', '5 days in week', '1970-01-01'),
(46, 'ky', '0943166952', 'Male', 'Low', '35', '48 Cm', '2-3 times in week', '1970-01-01'),
(47, 'pecos', '65341643162', 'Male', 'Low', '14', '50 Cm', '5 days in week', '1970-01-01'),
(48, 'pecos', '65341643162', 'Male', 'Low', '14', '50 Cm', '5 days in week', '1970-01-01'),
(49, 'babsodunewu', '07080105892', 'Male', 'Low', '17', '50 Cm', '2-3 times in week', '1970-01-01'),
(50, 'Tester', '555555555', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(51, 'Milson', '2672688', 'Male', 'High', '20', '45 Cm', '5 days in week', '1970-01-01'),
(52, 'Murugaiyan', '9629935355', 'Male', 'Moderate', '33', '52 Cm', 'All 7 days', '1970-01-01'),
(53, 'Monir', '01', 'Male', 'Low', '20', '50 Cm', '2-3 times in week', '1970-01-01'),
(54, 'erdem', '05387912568', 'Male', 'High', '24', '52 Cm', '2-3 times in week', '1970-01-01'),
(55, 'smith', '9966996699', 'Female', 'Low', '24', '50 Cm', '2-3 times in week', '1970-01-01'),
(56, 'smith', '9966996699', 'Female', 'Low', '24', '50 Cm', '2-3 times in week', '1970-01-01'),
(57, 'smith', '9966996699', 'Female', 'Low', '24', '40 Cm', '2-3 times in week', '1970-01-01'),
(58, 'smith', '9966996699', 'Female', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(59, 'smith', '9966996699', 'Female', 'Low', '23', '50 Cm', '2-3 times in week', '1970-01-01'),
(60, 'smith', '9966996699', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(61, 'smith', '9966996699', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(62, 'smith', '9966996699', 'Male', 'Low', '20', '170 Cm', '2-3 times in week', '1970-01-01'),
(63, 'smith', '9966996699', 'Male', 'Low', '20', '170 Cm', '2-3 times in week', '1970-01-01'),
(64, 'hg', '88352', 'Female', 'Moderate', '17', '50 Cm', 'All 7 days', '1970-01-01'),
(65, 'sanay', '09362477758', 'Female', 'Moderate', '30', '40 Cm', '2-3 times in week', '1970-01-01'),
(66, 'jAn', '6838686886859494', 'Female', 'Alto', '14', '50 Cm', 'Toda la semana', '1970-01-01'),
(67, 'jAn', '6838686886859494', 'Female', 'Alto', '14', '50 Cm', 'Toda la semana', '1970-01-01'),
(68, 'jAn', '6838686886859494', 'Female', 'Alto', '14', '49 Cm', 'Toda la semana', '1970-01-01'),
(69, 'smith', '9966996699', 'Male', 'Low', '20', '170 Cm', '2-3 times in week', '1970-01-01'),
(70, 'Donny', '0812812812', 'Male', 'Low', '40', '50 Cm', '2-3 times in week', '1970-01-01'),
(71, 'اية', '078026669110', 'Female', 'Low', '9', '0 Cm', '2-3 times in week', '1970-01-01'),
(72, 'tom', '0264373844', 'Male', 'Moderate', '18', '50 Cm', '2-3 times in week', '1970-01-01'),
(73, 'hamed', '09366', 'Male', 'Moderate', '31', '58 Cm', '2-3 times in week', '1970-01-01'),
(74, 'ansuma', '7002379169', 'Male', 'Low', '29', '57 Cm', 'All 7 days', '1970-01-01'),
(75, 'asasi', '09391515260', 'Male', 'Moderate', '37', '54 Cm', '2-3 times in week', '1970-01-01'),
(76, 'asasi', '09391515260', 'Male', 'Moderate', '37', '54 Cm', '2-3 times in week', '1970-01-01'),
(77, 'clive', '856668', 'Male', 'Moderate', '40', '50 Cm', '2-3 times in week', '1970-01-01'),
(78, 'Xoxo', '91952546', 'Male', 'Moderate', '23', '50 Cm', '5 days in week', '1970-01-01'),
(79, 'siva', '9944422080', 'Male', 'Low', '35', '51 Cm', '5 days in week', '1970-01-01'),
(80, 'jaimito', '31243569867', 'Male', 'Alto', '28', '50 Cm', 'Toda la semana', '1970-01-01'),
(81, 'james', '071245484816', 'Male', 'Low', '30', '50 Cm', '2-3 times in week', '1970-01-01'),
(82, 'Jarrod ', '06177657', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(83, 'Jeff', '11996665434884843', 'Male', 'Low', '22', '65 Cm', '2-3 times in week', '1970-01-01'),
(84, 'john due', '9900099000', 'Male', 'Low', '20', '50 Cm', '5 days in week', '1970-01-01'),
(85, 'hggv', '85745', 'Female', 'Low', '18', '50 Cm', '2-3 times in week', '1970-01-01'),
(86, 'vhh', '088869', 'Male', 'Low', '22', '58 Cm', '2-3 times in week', '1970-01-01'),
(87, 'test', '9512718686', 'Male', 'Low', '24', '50 Cm', '2-3 times in week', '1970-01-01'),
(88, 'bsbd', '5995959', 'Male', 'High', '17', '50 Cm', '2-3 times in week', '1970-01-01'),
(89, 'qwerty', '9999999999', 'Male', 'Low', '20', '50 Cm', '2-3 times in week', '1970-01-01'),
(90, 'naeem', '6178589422', 'Male', 'Low', '28', '50 Cm', '2-3 times in week', '1970-01-01'),
(91, 'Mateo', '099846721', 'Male', 'High', '22', '50 Cm', '5 days in week', '1970-01-01'),
(92, 'test', '579797667657545754', 'Male', 'Moderate', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(93, 'fff', '556468284668', 'Female', 'Low', '14', '50 Cm', 'All 7 days', '1970-01-01'),
(94, 'f', '9545366663', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(95, 'Jean ', '7863557682', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(96, 'Limon', '01728664312', 'Male', 'Low', '20', '50 Cm', 'All 7 days', '1970-01-01'),
(97, 'Limon', '01728664312', 'Male', 'Low', '20', '50 Cm', 'All 7 days', '1970-01-01'),
(98, 'frqnco', '352450885546', 'Male', 'High', '31', '53 Cm', 'All 7 days', '1970-01-01'),
(99, 'jian', '21989305574', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(100, 'diana', '646464616', 'Female', 'Moderate', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(101, 'sas', '556669999', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(102, 'sathish', '123456', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01'),
(103, 'deneme', '5555552233', 'Male', 'Low', '35', '62 Cm', '2-3 times in week', '1970-01-01'),
(104, 'jdr', '6464616466', 'Female', 'Low', '23', '50 Cm', '2-3 times in week', '1970-01-01'),
(105, 'atest', '1212121212', 'Male', 'Low', '23', '53 Cm', 'All 7 days', '1970-01-01'),
(106, 'john driver', '9898989898', 'Male', 'Moderate', '17', '51 Cm', '5 days in week', '1970-01-01'),
(107, 'john', '94857564', 'Male', 'Low', '14', '50 Cm', '2-3 times in week', '1970-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'total body exercises', '2020-03-25 05:35:09', '2020-03-25 05:35:09'),
(2, 'lower body exercises', '2020-03-25 05:35:09', '2020-03-25 05:35:09'),
(3, 'upper body exercises', '2020-03-25 05:35:09', '2020-03-25 05:35:09'),
(4, 'core exercises', '2020-03-25 05:35:09', '2020-03-25 05:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `complete_workout`
--

CREATE TABLE `complete_workout` (
  `id` varchar(0) DEFAULT NULL,
  `workout_name` varchar(0) DEFAULT NULL,
  `current_time` varchar(0) DEFAULT NULL,
  `total_time` varchar(0) DEFAULT NULL,
  `calories` varchar(0) DEFAULT NULL,
  `todays_date` varchar(0) DEFAULT NULL,
  `day` varchar(0) DEFAULT NULL,
  `month` varchar(0) DEFAULT NULL,
  `total_exercise` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customworkout`
--

CREATE TABLE `customworkout` (
  `id` varchar(0) DEFAULT NULL,
  `name` varchar(0) DEFAULT NULL,
  `url` varchar(0) DEFAULT NULL,
  `image` varchar(0) DEFAULT NULL,
  `time` varchar(0) DEFAULT NULL,
  `calories` varchar(0) DEFAULT NULL,
  `cycle` varchar(0) DEFAULT NULL,
  `intervaltime` varchar(0) DEFAULT NULL,
  `cat_name` varchar(0) DEFAULT NULL,
  `totalexercise` varchar(0) DEFAULT NULL,
  `cat_id` varchar(0) DEFAULT NULL,
  `gif` varchar(0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `image` varchar(34) DEFAULT NULL,
  `repeat_count` varchar(50) DEFAULT '0',
  `url` varchar(1000) DEFAULT NULL,
  `cat_name` varchar(50) DEFAULT NULL,
  `timee` varchar(250) DEFAULT NULL,
  `calories` varchar(250) DEFAULT NULL,
  `gif` varchar(34) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_at` varchar(50) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `image`, `repeat_count`, `url`, `cat_name`, `timee`, `calories`, `gif`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`, `datetime`) VALUES
(8, 'High Knees Running In Place', 'Menuitem_1641806741.gif', '2', 'https://www.youtube.com/watch?v=QPfOZ0e30xg', 'Total Body Exercise', '60', '4', NULL, '1617099410', '1641806741', '0', NULL, '2022-01-10 09:25:41'),
(9, 'Standing Bicycle Crunch', 'exercise_1617099547.gif', '4', 'https://www.youtube.com/watch?v=c_6ut4ifXZ8', 'Total Body Exercise', '55', '4', NULL, '1617099547', '1632657276', '0', NULL, '2021-09-26 11:54:36'),
(10, 'Jumping Jack', 'exercise_1617099597.gif', '4', 'https://www.youtube.com/watch?v=c4DAnQ6DtF8', 'Total Body Exercise', '50', '4', NULL, '1617099596', '1632657495', '0', NULL, '2021-09-26 11:58:15'),
(11, 'Squat', 'exercise_1617099705.gif', '5', 'https://www.youtube.com/watch?v=YaXPRqUwItQ', 'Lowwer Body Exercise', '30', '5', NULL, '1617099705', '1632658996', '0', NULL, '2021-09-26 12:23:16'),
(12, 'Wall Sit', 'exercise_1617099776.gif', '2', 'https://www.youtube.com/watch?v=-0Q7Lds7B8A', 'Lowwer Body Exercise', '40', '4', NULL, '1617099775', '1632658988', '0', NULL, '2021-09-26 12:23:08'),
(13, 'Step Jack', 'exercise_1617099838.gif', '4', 'https://www.youtube.com/watch?v=JHdVMkRBuRA', 'Upper Body Exercise', '60', '4', NULL, '1617099837', '1632658978', '0', NULL, '2021-09-26 12:22:58'),
(14, 'Half Squat', 'exercise_1617100004.gif', '3', 'https://www.youtube.com/watch?v=jtZciPEaYzo', 'Lowwer Body Exercise', '25', '5', NULL, '1617100004', '1632658964', '0', NULL, '2021-09-26 12:22:44'),
(15, 'Push Up', 'exercise_1617100085.gif', '10', 'https://www.youtube.com/watch?v=IODxDxX7oi4', 'Total Body Exercise', '50', '5', NULL, '1617100084', '1632658953', '0', NULL, '2021-09-26 12:22:33'),
(16, 'Hand Release Push-Up', 'exercise_1617100151.gif', '4', 'https://www.youtube.com/watch?v=oX7339XfbSM', 'Total Body Exercise', '50', '5', NULL, '1617100150', '1632658944', '0', NULL, '2021-09-26 12:22:24'),
(17, 'Push-Ups with Rotation', 'Menuitem_1641806798.gif', '10', 'https://www.youtube.com/watch?v=SIXuGSOL3_8', 'Total Body Exercise', '40', '5', NULL, '1617100181', '1641806798', '0', NULL, '2022-01-10 09:26:38'),
(18, 'Knee Push-Up', 'exercise_1617100275.gif', '3', 'https://www.youtube.com/watch?v=EgIMk-PZwo0', 'Total Body Exercise', '30', '5', NULL, '1617100275', '1632658930', '0', NULL, '2021-09-26 12:22:10'),
(19, 'Tricep Dip', 'exercise_1617100297.gif', '2', 'https://www.youtube.com/watch?v=6kALZikXxLc', 'Lowwer Body Exercise', '30', '4', NULL, '1617100297', '1632658920', '0', NULL, '2021-09-26 12:22:00'),
(20, 'Plank', 'exercise_1617100411.gif', '1', 'https://www.youtube.com/watch?v=F-nQ_KJgfCY', 'Core Exercise', '50', '4', NULL, '1617100410', '1632658912', '0', NULL, '2021-09-26 12:21:52'),
(21, 'Lying Triceps Lift', 'exercise_1617100586.gif', '3', 'https://www.youtube.com/watch?v=ZnJLnzZ-CZQ', 'Total Body Exercise', '30', '5', NULL, '1617100586', '1632658905', '0', NULL, '2021-09-26 12:21:45'),
(22, 'Side Plank (Left)', 'exercise_1617100593.gif', '3', 'https://www.youtube.com/watch?v=K2VljzCC16g', 'Core Exercise', '50', '5', NULL, '1617100592', '1632658892', '0', NULL, '2021-09-26 12:21:32'),
(23, 'Side Plank (Right)', 'exercise_1617100683.gif', '3', 'https://www.youtube.com/watch?v=9Q0D6xAyrOI', 'Core Exercise', '50', '5', NULL, '1617100682', '1632658884', '0', NULL, '2021-09-26 12:21:24'),
(24, 'Abdominal Crunch', 'exercise_1617100782.gif', '4', 'https://www.youtube.com/watch?v=_M2Etme-tfE', 'Core Exercise', '40', '4', NULL, '1617100782', '1632658876', '0', NULL, '2021-09-26 12:21:16'),
(25, 'Full Plank ', 'Menuitem_1617100982.gif', '3', 'https://www.youtube.com/watch?v=3jAi2meNaQY', 'Total Body Exercise', '40', '4', NULL, '1617100789', '1632658868', '0', NULL, '2021-09-26 12:21:08'),
(26, 'Step Up', 'exercise_1617100862.gif', '10', 'https://www.youtube.com/watch?v=WCFCdxzFBa4', 'Lowwer Body Exercise', '50', '5', NULL, '1617100861', '1632658859', '0', NULL, '2021-09-26 12:20:59'),
(27, 'Lunge (Left)', 'exercise_1617101034.gif', '3', 'https://www.youtube.com/watch?v=wrwwXE_x-pQ', 'Lowwer Body Exercise', '50', '5', NULL, '1617101034', '1632658851', '0', NULL, '2021-09-26 12:20:51'),
(28, 'Lunge (Right)', 'exercise_1617101156.gif', '3', 'https://www.youtube.com/watch?v=wrwwXE_x-pQ', 'Lowwer Body Exercise', '50', '5', NULL, '1617101156', '1632658842', '0', NULL, '2021-09-26 12:20:42'),
(29, 'Side Plank (Left)', 'exercise_1617101224.gif', '3', 'https://www.youtube.com/watch?v=XeN4pEZZJNI', 'Total Body Exercise', '45', '5', NULL, '1617101224', '1632658835', '0', NULL, '2021-09-26 12:20:35'),
(30, 'Side Plank (Right)', 'exercise_1617101377.gif', '3', 'https://www.youtube.com/watch?v=x4WhdDx2QSg', 'Total Body Exercise', '55', '4', NULL, '1617101376', '1632658826', '0', NULL, '2021-09-26 12:20:26'),
(31, 'Half Wall Sit', 'exercise_1617101487.gif', '2', 'https://www.youtube.com/watch?v=y-wV4Venusw', 'Lowwer Body Exercise', '60', '5', NULL, '1617101487', '1632658818', '0', NULL, '2021-09-26 12:20:18'),
(32, 'Standing Hip Circle', 'exercise_1617101597.gif', '3', 'https://www.youtube.com/watch?v=yFi1FDOFXq0', 'Lowwer Body Exercise', '50', '5', NULL, '1617101597', '1632658807', '0', NULL, '2021-09-26 12:20:07'),
(33, 'High Knee Walking In Place', 'exercise_1617101726.gif', '3', 'https://www.youtube.com/watch?v=HJP4dj-uLIY', 'Lowwer Body Exercise', '20', '4', NULL, '1617101725', '1632658796', '0', NULL, '2021-09-26 12:19:56'),
(34, 'Flutter Kick Squat', 'exercise_1617101763.gif', '2', 'https://www.youtube.com/watch?v=8zJh1tGtldU', 'Total Body Exercise', '60', '15', NULL, '1617101763', '1632658780', '0', NULL, '2021-09-26 12:19:40'),
(35, 'High Knees Running in Place', 'exercise_1617101927.gif', '10', 'https://www.youtube.com/watch?v=QPfOZ0e30xg', 'Lowwer Body Exercise', '50', '5', NULL, '1617101926', '1632658759', '0', NULL, '2021-09-26 12:19:19'),
(36, 'Side Leg Raise (Left)', 'exercise_1617101935.gif', '3', 'https://www.youtube.com/watch?v=izV5th7AQHM', 'Lowwer Body Exercise', '55', '4', NULL, '1617101935', '1632658736', '0', NULL, '2021-09-26 12:18:56'),
(37, 'Side Leg Raise (Right)', 'exercise_1617102009.gif', '4', 'https://www.youtube.com/watch?v=izV5th7AQHM', 'Lowwer Body Exercise', '30', '5', NULL, '1617102009', '1632658727', '0', NULL, '2021-09-26 12:18:47'),
(38, 'Squat Thrust', 'exercise_1617102032.gif', '2', 'https://www.youtube.com/watch?v=F1kVWDpH6co', 'Total Body Exercise', '40', '5', NULL, '1617102032', '1632658716', '0', NULL, '2021-09-26 12:18:36'),
(39, 'Shuffle Side Squat', 'exercise_1617102229.gif', '3', 'https://www.youtube.com/watch?v=VmUrNI_SVJg', 'Total Body Exercise', '45', '5', NULL, '1617102228', '1632658705', '0', NULL, '2021-09-26 12:18:25'),
(40, 'Big Arm Circle', 'exercise_1617102378.gif', '5', 'https://www.youtube.com/watch?v=ADczvidTnWs', 'Total Body Exercise', '30', '5', NULL, '1617102378', '1632658688', '0', NULL, '2021-09-26 12:18:08'),
(41, 'Flutter Kick', 'exercise_1617102465.gif', '10', 'https://www.youtube.com/watch?v=eEG9uXjx4vQ', 'Total Body Exercise', '50', '5', NULL, '1617102465', '1632658670', '0', NULL, '2021-09-26 12:17:50'),
(42, 'Standing Side Bend', 'exercise_1617102552.gif', '5', 'https://www.youtube.com/watch?v=DmgZlywAlIg', 'Upper Body Exercise', '55', '5', NULL, '1617102552', '1632658657', '0', NULL, '2021-09-26 12:17:37'),
(43, 'Front Thigh Stretch (Left)', 'exercise_1617102740.gif', '4', 'https://www.youtube.com/watch?v=BhQimqvU1tM', 'Core Exercise', '45', '5', NULL, '1617102739', '1632658646', '0', NULL, '2021-09-26 12:17:26'),
(44, 'Front Thigh Stretch (Right)', 'Menuitem_1632999618.gif', '4', 'https://www.youtube.com/watch?v=QVYRUZ-k9HQ', 'Lowwer Body Exercise', '40', '5', NULL, '1617102813', '1632999617', '0', NULL, '2021-09-30 11:00:17'),
(45, 'Mountain Climber', 'exercise_1617103568.gif', '2', 'https://www.youtube.com/watch?v=nmwgirgXLYM', 'Total Body Exercise', '50', '5', NULL, '1617103567', '1632658599', '0', NULL, '2021-09-26 12:16:39'),
(46, 'Plank With Leg Lift', 'exercise_1617103644.gif', '3', 'https://www.youtube.com/watch?v=whRaAg0tYC8', 'Total Body Exercise', '60', '5', NULL, '1617103644', '1632657751', '0', NULL, '2021-09-26 12:02:31'),
(47, 'V-Sit', 'exercise_1617103751.gif', '2', 'https://www.youtube.com/watch?v=emyOfFK2S8o', 'Total Body Exercise', '35', '5', NULL, '1617103750', '1632657741', '0', NULL, '2021-09-26 12:02:21'),
(48, 'Single Leg V-Up', 'exercise_1617103854.gif', '4', 'https://www.youtube.com/watch?v=Iefe83rf6Wk', 'Upper Body Exercise', '25', '15', NULL, '1617103854', '1632657703', '0', NULL, '2021-09-26 12:01:43'),
(49, 'Single Hip Extension (Left)', 'exercise_1617103942.gif', '4', 'https://www.youtube.com/watch?v=ynLvGO09y_s', 'Total Body Exercise', '45', '4', NULL, '1617103941', '1632657644', '0', NULL, '2021-09-26 12:00:44'),
(51, 'Single Hip Extension (Right)', 'Menuitem_1641806956.gif', '4', 'https://www.youtube.com/watch?v=ynLvGO09y_s', 'Total Body Exercise', '20', '5', NULL, '1617104028', '1641806956', '0', NULL, '2022-01-10 09:29:16'),
(52, 'Squat Jump', 'Menuitem_1641806930.gif', '5', 'https://www.youtube.com/watch?v=MgwWbDeOYcw', 'Lowwer Body Exercise', '50', '5', NULL, '1617104103', '1641806929', '0', NULL, '2022-01-10 09:28:49'),
(54, 'Standing Bicycle Crunch', 'Menuitem_1641806903.gif', '4', 'https://www.youtube.com/watch?v=8lsAXzvVHrc', 'Total Body Exercise', '40', '4', NULL, '1617105967', '1641806903', '0', NULL, '2022-01-10 09:28:23'),
(55, 'Bicycle Kick', 'Menuitem_1641806886.gif', '4', 'https://www.youtube.com/watch?v=UZZhuJACZJM', 'Total Body Exercise', '20', '5', NULL, '1617106031', '1641806885', '0', NULL, '2022-01-10 09:28:05'),
(56, 'Vertical Leg Crunch', 'Menuitem_1641806864.gif', '4', 'https://www.youtube.com/watch?v=hE68VjfGl2E', 'Total Body Exercise', '20', '5', NULL, '1617106089', '1641806864', '0', NULL, '2022-01-10 09:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `exercise_sets`
--

CREATE TABLE `exercise_sets` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `ex_id` int(11) NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise_sets`
--

INSERT INTO `exercise_sets` (`id`, `cat_id`, `ex_id`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(34, 61, 8, '1617101239', NULL, '0', NULL),
(35, 61, 10, '1617101256', NULL, '0', NULL),
(36, 61, 11, '1617101266', NULL, '0', NULL),
(37, 61, 12, '1617101280', NULL, '0', NULL),
(38, 61, 15, '1617101296', NULL, '0', NULL),
(39, 61, 17, '1617101308', NULL, '0', NULL),
(40, 61, 17, '1617101319', NULL, '0', NULL),
(41, 61, 19, '1617101333', NULL, '0', NULL),
(42, 61, 20, '1617101346', NULL, '0', NULL),
(43, 61, 22, '1617101359', NULL, '0', NULL),
(44, 61, 23, '1617101372', NULL, '0', NULL),
(45, 61, 23, '1617101398', NULL, '0', NULL),
(46, 61, 24, '1617101519', NULL, '0', NULL),
(47, 61, 26, '1617101566', NULL, '0', NULL),
(48, 61, 27, '1617101583', NULL, '0', NULL),
(49, 61, 28, '1617101598', NULL, '0', NULL),
(50, 56, 9, '1617102242', NULL, '0', NULL),
(51, 56, 13, '1617102348', NULL, '0', NULL),
(52, 56, 14, '1617102378', NULL, '0', NULL),
(53, 56, 16, '1617102402', NULL, '0', NULL),
(54, 56, 18, '1617102422', NULL, '0', NULL),
(55, 56, 21, '1617102441', NULL, '0', NULL),
(56, 56, 25, '1617102461', NULL, '0', NULL),
(57, 56, 22, '1617102475', NULL, '0', NULL),
(58, 56, 23, '1617102491', NULL, '0', NULL),
(59, 56, 31, '1617102514', NULL, '0', NULL),
(60, 56, 32, '1617102534', NULL, '0', NULL),
(61, 56, 33, '1617102551', NULL, '0', NULL),
(62, 56, 36, '1617102574', NULL, '0', NULL),
(63, 56, 37, '1617102590', NULL, '0', NULL),
(64, 60, 34, '1617103254', NULL, '0', NULL),
(65, 60, 35, '1617103272', NULL, '0', NULL),
(66, 60, 10, '1617103285', NULL, '0', NULL),
(67, 60, 38, '1617103335', NULL, '0', NULL),
(68, 60, 39, '1617103373', NULL, '0', NULL),
(69, 60, 40, '1617103391', NULL, '0', NULL),
(70, 60, 41, '1617103411', NULL, '0', NULL),
(71, 60, 42, '1617103433', NULL, '0', NULL),
(72, 60, 43, '1617103443', NULL, '0', NULL),
(73, 60, 44, '1617103455', NULL, '0', NULL),
(74, 59, 8, '1617104157', NULL, '0', NULL),
(75, 59, 10, '1617104165', NULL, '0', NULL),
(76, 59, 45, '1617104184', NULL, '0', NULL),
(77, 59, 38, '1617104202', NULL, '0', NULL),
(78, 59, 20, '1617104222', NULL, '0', NULL),
(79, 59, 46, '1617105618', NULL, '0', NULL),
(80, 59, 22, '1617105635', NULL, '0', NULL),
(81, 59, 23, '1617105649', NULL, '0', NULL),
(82, 59, 47, '1617105664', NULL, '0', NULL),
(83, 59, 48, '1617105688', NULL, '0', NULL),
(84, 59, 24, '1617105707', NULL, '0', NULL),
(85, 59, 26, '1617105746', NULL, '0', NULL),
(86, 59, 49, '1617105774', NULL, '0', NULL),
(87, 59, 51, '1617105787', NULL, '0', NULL),
(88, 59, 52, '1617105805', NULL, '0', NULL),
(89, 56, 8, '1617106039', NULL, '0', NULL),
(90, 56, 9, '1617106039', NULL, '1', '1617106058'),
(91, 58, 10, '1617106246', NULL, '0', NULL),
(92, 58, 45, '1617106274', NULL, '0', NULL),
(93, 58, 9, '1617106289', NULL, '0', NULL),
(94, 58, 55, '1617106339', NULL, '0', NULL),
(95, 58, 20, '1617106353', NULL, '0', NULL),
(96, 58, 46, '1617106390', NULL, '0', NULL),
(97, 58, 22, '1617106408', NULL, '0', NULL),
(98, 58, 23, '1617106421', NULL, '0', NULL),
(99, 58, 47, '1617106438', NULL, '0', NULL),
(100, 58, 24, '1617106457', NULL, '0', NULL),
(101, 58, 9, '1617106471', NULL, '0', NULL),
(103, 57, 8, '1617106524', NULL, '0', NULL),
(104, 57, 10, '1617106535', NULL, '0', NULL),
(105, 57, 11, '1617106544', NULL, '0', NULL),
(106, 57, 12, '1617106556', NULL, '0', NULL),
(107, 57, 15, '1617106566', NULL, '0', NULL),
(108, 57, 17, '1617106589', NULL, '0', NULL),
(109, 57, 19, '1617106618', NULL, '0', NULL),
(110, 57, 20, '1617106629', NULL, '0', NULL),
(111, 57, 36, '1617106647', NULL, '0', NULL),
(112, 57, 37, '1617106660', NULL, '0', NULL),
(113, 57, 24, '1617106681', NULL, '0', NULL),
(114, 57, 26, '1617106694', NULL, '0', NULL),
(115, 57, 27, '1617106708', NULL, '0', NULL),
(116, 57, 28, '1617106724', NULL, '0', NULL),
(117, 56, 8, '1628916700', NULL, '0', NULL),
(118, 56, 8, '1629117289', NULL, '0', NULL),
(119, 56, 14, '1629614023', NULL, '0', NULL),
(120, 56, 37, '1629987419', NULL, '0', NULL),
(121, 56, 13, '1630335504', NULL, '1', '1641192990'),
(122, 57, 33, '1630898968', NULL, '0', NULL),
(123, 56, 8, '1630910653', NULL, '1', '1641193014'),
(124, 56, 10, '1630910653', NULL, '1', '1641192996'),
(125, 57, 8, '1641736645', NULL, '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exercise_step`
--

CREATE TABLE `exercise_step` (
  `id` int(11) NOT NULL,
  `ex_id` int(11) DEFAULT NULL,
  `step` varchar(5000) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exercise_step`
--

INSERT INTO `exercise_step` (`id`, `ex_id`, `step`, `created_at`, `updated_at`) VALUES
(8, 5, 'step 1', '2021-03-12 23:29:30', '2021-03-12 23:29:30'),
(9, 5, 'step 2', '2021-03-12 23:29:30', '2021-03-12 23:29:30'),
(10, 5, 'step4', '2021-03-12 23:29:30', '2021-03-12 23:29:30'),
(11, 5, 'step5', '2021-03-12 23:29:30', '2021-03-12 23:29:30'),
(12, 6, 'Start in Adho Mukha Svanasana (Downward-Facing Dog). Exhale and step your right foot forward between your hands, aligning your knee over the heel. Keep your left leg strong and firm.', '2021-03-12 23:44:31', '2021-03-12 23:44:31'),
(13, 6, 'Inhale and raise your torso to upright. At the same time, sweep your arms wide to the sides and raise them overhead, palms facing.', '2021-03-12 23:44:31', '2021-03-12 23:44:31'),
(14, 6, 'Be careful not to over arch the lower back. Lengthen your tailbone toward the floor and reach back through your left heel. This will bring the shoulder blades deeper into the back and help support your chest. Look up toward your thumbs.', '2021-03-12 23:44:31', '2021-03-12 23:44:31'),
(15, 6, 'Be sure not to press the front ribs forward. Draw them down and into the torso. Lift the arms from the lower back ribs, reaching through your little fingers. Hold for 30 seconds to a minute.', '2021-03-12 23:44:31', '2021-03-12 23:44:31'),
(16, 6, 'Then exhale, release the torso to the right thigh, sweep your hands back onto the floor, and, with another exhale, step your right foot back and return to Down Dog. Hold for a few breaths and repeat with the left foot forward for the same length of time.', '2021-03-12 23:44:31', '2021-03-12 23:44:31'),
(17, 1, 'Start in Adho Mukha Svanasana (Downward-Facing Dog). Exhale and step your right foot forward between your hands, aligning your knee over the heel. Keep your left leg strong and firm.', '2021-03-16 01:40:33', '2021-03-16 01:40:33'),
(18, 1, 'Inhale and raise your torso to upright. At the same time, sweep your arms wide to the sides and raise them overhead, palms facing.', '2021-03-16 01:40:33', '2021-03-16 01:40:33'),
(19, 1, 'Be careful not to over arch the lower back. Lengthen your tailbone toward the floor and reach back through your left heel. This will bring the shoulder blades deeper into the back and help support your chest. Look up toward your thumbs.', '2021-03-16 01:40:33', '2021-03-16 01:40:33'),
(20, 1, 'Be sure not to press the front ribs forward. Draw them down and into the torso. Lift the arms from the lower back ribs, reaching through your little fingers. Hold for 30 seconds to a minute.', '2021-03-16 01:40:33', '2021-03-16 01:40:33'),
(21, 1, 'Then exhale, release the torso to the right thigh, sweep your hands back onto the floor, and, with another exhale, step your right foot back and return to Down Dog. Hold for a few breaths and repeat with the left foot forward for the same length of time.', '2021-03-16 01:40:33', '2021-03-16 01:40:33'),
(22, 57, 'Lay on the ground with your back flat to the ground and your arms and legs pointing straight up', '2021-03-31 04:13:01', '2021-03-31 04:13:01'),
(23, 57, ' At the same time, slowly lower your legs towards the ground. Make sure to keep your back flat to the ground—this is super important to maintain good form', '2021-03-31 04:13:01', '2021-03-31 04:13:01'),
(24, 57, 'As soon as you feel your back start to want to come off of the ground, hold that position. Your legs should be slightly off the ground (see photo). If you can’t get that close to the ground, keep practicing and you’ll get there with time.', '2021-03-31 04:13:01', '2021-03-31 04:13:01'),
(25, 57, 'Raise your arms above your head so that you end up in a banana-like position.', '2021-03-31 04:13:01', '2021-03-31 04:13:01'),
(26, 56, 'Lie down on your back. Raise legs up so that they are perpendicular to the floor (legs should be as straight as possible). Hold arms straight out above your chest. This is the starting position.', '2021-03-31 04:13:59', '2021-03-31 04:13:59'),
(27, 56, ' Begin exercise by reaching for your toes by crunching your head and shoulders off the ground. Pause, then lower back down to starting position', '2021-03-31 04:13:59', '2021-03-31 04:13:59'),
(28, 55, 'To start the motion of the classic bicycle kick, lift the knee of your non-dominant foot and push off the ground with your kicking foot. The higher you can lift your non-kicking foot the better, because this will help you get the momentum necessary to get your kicking foot up and over properly', '2021-03-31 04:15:31', '2021-03-31 04:15:31'),
(29, 55, 'As you raise your leg, throw your momentum backward, as if you’re trying to get away from the ball and flop back down on the ground. Be careful not to throw your head back too quickly, or to dip your body into a full-on flip. Stay focused on the kick and making contact with the ball, not falling back super-fast', '2021-03-31 04:15:31', '2021-03-31 04:15:31'),
(30, 54, 'Stand straight with your feet are shoulder-width apart and your feet are pointing outward.', '2021-03-31 04:17:15', '2021-03-31 04:17:15'),
(31, 54, 'Place the fingers of both your hands behind your head. Your elbows are pointing outwards to the sides of your body. Inhale deeply to contract your core muscles.', '2021-03-31 04:17:15', '2021-03-31 04:17:15'),
(32, 54, 'Now start exercising by raising your left knee upward to your chest height and simultaneously twist your torso to the left. Bring your right elbow towards the raised knee so that you feel the crunch. Keep exhaling during this movement and go back to the starting position.\r\n', '2021-03-31 04:17:15', '2021-03-31 04:17:15'),
(33, 54, 'Now repeat the same on the other side and keep switching the sides until you complete your repetitions', '2021-03-31 04:17:15', '2021-03-31 04:17:15'),
(34, 52, 'Begin in a squat position with a step in front of you and arms bent next to your side.', '2021-03-31 04:18:41', '2021-03-31 04:18:41'),
(35, 52, 'Jump up onto the step, swinging your arms to help. You should land in a squat position with both feet touching at the same time and keeping weight in your heels.', '2021-03-31 04:18:41', '2021-03-31 04:18:41'),
(36, 52, 'Step down and repeat.', '2021-03-31 04:18:41', '2021-03-31 04:18:41'),
(37, 51, 'Put Your Hands Together With Your Wrists Making 90 Degree Angles in Prayer Position\r\n', '2021-03-31 04:20:13', '2021-03-31 04:20:13'),
(38, 51, 'Extend Your Arms Outward With Your Hands Still Together', '2021-03-31 04:20:13', '2021-03-31 04:20:13'),
(39, 51, 'Flip Your Right Hand Over Your Left Hand So It Is Now on the Backside of Your Left Hand (palm of Right Hand Is Now Touching Backside of Left Hand)', '2021-03-31 04:20:13', '2021-03-31 04:20:13'),
(40, 51, 'Rotate Your Hands (keeping Them Together) 180 Degrees So That Your Palm on Your Left Hand Is Now Facing Left', '2021-03-31 04:20:13', '2021-03-31 04:20:13'),
(41, 49, 'Lay your stomach on the ball. Your legs will hang off the back of the ball. Put your hands on the ground in front of the ball', '2021-03-31 04:22:00', '2021-03-31 04:22:00'),
(42, 49, 'Using your lower back and glutes, pull your legs off the ground as high as they’ll go while keeping your core engaged and in contact with the ball', '2021-03-31 04:22:00', '2021-03-31 04:22:00'),
(43, 49, 'Slowly lower back down to the starting position.', '2021-03-31 04:22:00', '2021-03-31 04:22:00'),
(44, 49, 'Complete 3 sets of 10 reps.', '2021-03-31 04:22:00', '2021-03-31 04:22:00'),
(45, 48, 'Lay on the ground with your back flat to the ground and your arms and legs pointing straight up', '2021-03-31 04:23:12', '2021-03-31 04:23:12'),
(46, 48, 'At the same time, slowly lower your legs towards the ground. Make sure to keep your back flat to the ground—this is super important to maintain good form', '2021-03-31 04:23:12', '2021-03-31 04:23:12'),
(47, 48, 'As soon as you feel your back start to want to come off of the ground, hold that position. Your legs should be slightly off the ground (see photo). If you can’t get that close to the ground, keep practicing and you’ll get there with time', '2021-03-31 04:23:12', '2021-03-31 04:23:12'),
(48, 48, 'Raise your arms above your head so that you end up in a banana-like position.', '2021-03-31 04:23:12', '2021-03-31 04:23:12'),
(49, 46, 'Sit down on the ground with legs straight out.', '2021-03-31 04:24:39', '2021-03-31 04:24:39'),
(50, 46, 'Lift your legs up so that they are at a 45 degree angle with the floor.', '2021-03-31 04:24:39', '2021-03-31 04:24:39'),
(51, 46, 'Lean your torso back till it also is at a 45 degree angle.', '2021-03-31 04:24:39', '2021-03-31 04:24:39'),
(52, 46, 'Hold your arms out in front of you so they are parallel with your legs.', '2021-03-31 04:24:39', '2021-03-31 04:24:39'),
(53, 46, 'Hold this position for the desired time.', '2021-03-31 04:24:39', '2021-03-31 04:24:39'),
(57, 45, 'Get down on the floor on your hands and knees. Extend your legs out behind you, balancing on the balls and toes. Place your hands directly under your shoulders with your fingers facing forward and slightly outward. Keep your core engaged by squeezing your stomach muscles. Your body should be in a straight line from your crown to your heels.', '2021-03-31 04:27:46', '2021-03-31 04:27:46'),
(58, 45, ' Lift one foot and begin bending the knee as you pull it up between the front of your body and the floor. Bring the knee forward in one smooth, controlled motion. Don’t let either of your knees sag or come into contact with the floor. Once you’ve raised your knee as far as you can, contract and hold your abs briefly but forcefully.', '2021-03-31 04:27:46', '2021-03-31 04:27:46'),
(59, 45, 'Relax your midsection and push your knee back toward your other foot slowly. Straight your leg and set your foot back on the ground behind you. Then, bring the other knee forward, moving fluidly and squeezing your abs.', '2021-03-31 04:27:46', '2021-03-31 04:27:46'),
(60, 45, 'Return your leg to the floor behind you and begin pulling the opposite knee up once more. Repeat this motion until you get comfortable with it. That’s it! Do as many mountain climbers as you can before you tire out, and try to increase the number over time. This exercise makes a welcome addition to any strength and conditioning workout', '2021-03-31 04:27:46', '2021-03-31 04:27:46'),
(61, 44, 'Slide your right hand down your right leg, palm extended toward your toes.', '2021-03-31 04:29:19', '2021-03-31 04:29:19'),
(62, 44, 'Grab your right foot with your right hand, if you are capable. If not, stretch your hand as far down your leg as it will', '2021-03-31 04:29:19', '2021-03-31 04:29:19'),
(63, 44, 'Reach your left hand over your head and down toward your right foot.', '2021-03-31 04:29:19', '2021-03-31 04:29:19'),
(64, 44, 'Hold this position for 4-5 deep breaths before slowly letting your left arm go, bringing up your torso', '2021-03-31 04:29:19', '2021-03-31 04:29:19'),
(65, 44, 'Repeat with the other leg.', '2021-03-31 04:29:19', '2021-03-31 04:29:19'),
(66, 43, 'Begin by standing with your feet together and your arms by your sides. Drop your shoulders and fix your gaze straight in front of you. Move your weight onto your left foot.', '2021-03-31 04:30:51', '2021-03-31 04:30:51'),
(67, 43, 'Bend your right knee and kick your right heel up towards your right glute muscle. Use your right hand to grab and support your right ankle. Allow your left hand to remain by your side, or use it to help you balance by placing it squarely on your left hip.', '2021-03-31 04:30:51', '2021-03-31 04:30:51'),
(68, 43, 'Move your right hip forward and your right knee back behind you. Try to keep your right knee squarely under your right hip while still keeping your right and left hips facing forward', '2021-03-31 04:30:51', '2021-03-31 04:30:51'),
(69, 42, 'Stand tall and place your feet and legs together. Relax your shoulder away from your ears and gaze forward.', '2021-03-31 04:32:51', '2021-03-31 04:32:51'),
(70, 42, 'Reach both arms overhead and interlace your fingers while leaving your index fingers extended and pointed toward the ceiling; this grip is known as a steeple grip in yoga.', '2021-03-31 04:32:51', '2021-03-31 04:32:51'),
(71, 42, 'Align your biceps with your ears.', '2021-03-31 04:32:51', '2021-03-31 04:32:51'),
(72, 42, 'Squeeze your inner thighs and activate your core for balance.', '2021-03-31 04:32:51', '2021-03-31 04:32:51'),
(73, 42, 'Take a breath in and gently bend your body to the right on your exhale. Lengthen from your left hips through your ribs. Pull your left arm over to the right side of the room.', '2021-03-31 04:32:51', '2021-03-31 04:32:51'),
(74, 41, ' Grasp a wall of the pool, a lane marker, or another stationary object that allows you to extend your body in the water behind it. Hold your arms out straight from the wall, with the rest of your body as horizontal as possible in the water.', '2021-03-31 04:34:07', '2021-03-31 04:34:07'),
(75, 41, 'Push one leg down in the water. Flex the hip of one leg slightly to push the leg down', '2021-03-31 04:34:07', '2021-03-31 04:34:07'),
(76, 41, 'Repeat with the opposite leg. Let the first leg float up in the water while you repeat the same kick with the opposite leg', '2021-03-31 04:34:07', '2021-03-31 04:34:07'),
(77, 41, 'Continue alternating legs to kick. Keep kicking one leg down while the other floats up, and increasing the speed until you are alternating quickly.', '2021-03-31 04:34:07', '2021-03-31 04:34:07'),
(78, 40, 'Start by swinging both arms behind you then bring them forward into a circular motion. Try to make them as big as you can and do so in a safe range of motion.', '2021-03-31 04:35:06', '2021-03-31 04:35:06'),
(79, 40, 'After completing forward circles be sure to perform them backward as well', '2021-03-31 04:35:06', '2021-03-31 04:35:06'),
(80, 40, '', '2021-03-31 04:35:06', '2021-03-31 04:35:06'),
(84, 38, 'Start by getting into a raised plank position, but resting on your hands instead of your forearms.', '2021-03-31 04:37:09', '2021-03-31 04:37:09'),
(85, 38, 'Make sure your body is in a straight line (Head, shoulders, hips, knees and toes), your shoulders are pushed', '2021-03-31 04:37:09', '2021-03-31 04:37:09'),
(86, 38, 'Breathe in, then breathe out as you jump your feet forwards so they land as close to your hands as you can get', '2021-03-31 04:37:09', '2021-03-31 04:37:09'),
(87, 38, 'Breathe in as you jump your feet back out to the start position, holding your core tight and making sure your', '2021-03-31 04:37:09', '2021-03-31 04:37:09'),
(88, 37, 'Lie on your right side and position the side of your right foot as well as your bottom elbow on the ground.', '2021-03-31 04:38:54', '2021-03-31 04:38:54'),
(89, 37, 'Slowly lift your hips so that your shoulders, ankles, and hips are in line. It is your starting position.', '2021-03-31 04:38:54', '2021-03-31 04:38:54'),
(90, 37, 'Now brace your core and keep your torso stable. Lift your top leg and avoid bending your knee', '2021-03-31 04:38:54', '2021-03-31 04:38:54'),
(91, 37, 'Return to the initial position', '2021-03-31 04:38:54', '2021-03-31 04:38:54'),
(92, 37, 'Do the desired number of sets and reps on each side.', '2021-03-31 04:38:54', '2021-03-31 04:38:54'),
(93, 36, 'From Makarasana (Crocodile Pose), inhale and turn towards the left side balancing the body on the left elbow supporting', '2021-03-31 04:40:13', '2021-03-31 04:40:13'),
(94, 36, 'Inhale and raise the right leg up holding the right toe with the right hand and stretch the leg and bring it towards you', '2021-03-31 04:40:13', '2021-03-31 04:40:13'),
(95, 36, 'Inhale to loosen the grip at the toes with your hands, exhale to stretch further engaging the core muscles', '2021-03-31 04:40:13', '2021-03-31 04:40:13'),
(96, 36, 'Remain in this posture for about 6 breaths, controlling the breathing process while maintaining the body in balance.', '2021-03-31 04:40:13', '2021-03-31 04:40:13'),
(97, 36, 'Release and relax', '2021-03-31 04:40:13', '2021-03-31 04:40:13'),
(98, 35, 'Stand on a flat surface & Begin jogging, lifting the knees high enough for your comfort level.', '2021-03-31 04:41:23', '2021-03-31 04:41:23'),
(99, 35, 'Then lift your knees to hip level but keep the core tight to support your back.', '2021-03-31 04:41:23', '2021-03-31 04:41:23'),
(100, 35, 'In advanced version, hold your hands straight at hip level and try to touch the knees to your hands.', '2021-03-31 04:41:23', '2021-03-31 04:41:23'),
(101, 35, 'Make sure to bring the knees towards your hands instead of reaching the hands to the knees!', '2021-03-31 04:41:23', '2021-03-31 04:41:23'),
(102, 34, 'Lie down on your back and place your hands under your glutes', '2021-03-31 04:42:33', '2021-03-31 04:42:33'),
(103, 34, 'Keep your legs straight and raise your heels off the ground so they are roughly three inches off the ground.', '2021-03-31 04:42:33', '2021-03-31 04:42:33'),
(104, 34, 'Next, simply raise your right foot up several inches and then as you lower it down, raise your left foot up.', '2021-03-31 04:42:33', '2021-03-31 04:42:33'),
(105, 34, 'Alternate back and forth in a \"fluttering\" motion.', '2021-03-31 04:42:33', '2021-03-31 04:42:33'),
(106, 33, 'Stand tall with arms at your side and feet shoulder-width apart.', '2021-03-31 04:43:31', '2021-03-31 04:43:31'),
(107, 33, 'Begin exercise by raising your left knee up toward your chest as high as you can. Step forward as you lower leg', '2021-03-31 04:43:31', '2021-03-31 04:43:31'),
(108, 33, 'Repeat with right knee, alternating back and forth while walking.', '2021-03-31 04:43:31', '2021-03-31 04:43:31'),
(109, 32, 'Find your balance on one leg by engaging your core and keeping a soft bend in the knee of the weighted leg.', '2021-03-31 04:45:05', '2021-03-31 04:45:05'),
(110, 32, 'Once balanced raise the non-weight knee to 90 degrees.', '2021-03-31 04:45:05', '2021-03-31 04:45:05'),
(111, 32, 'Then keeping your foot pointed at the ground rotate your hip open so your knee points to the side.', '2021-03-31 04:45:05', '2021-03-31 04:45:05'),
(112, 32, 'Finally rotate your hip so your knee points down to the ground and your foot to the back.', '2021-03-31 04:45:05', '2021-03-31 04:45:05'),
(113, 32, 'Bring your knee back up to 90 and follow the same steps.', '2021-03-31 04:45:05', '2021-03-31 04:45:05'),
(114, 32, 'Repeat 5 times then reverse the steps, working hip rotation in the opposite direction.', '2021-03-31 04:45:05', '2021-03-31 04:45:05'),
(115, 31, ' Measure the area where the half (knee) wall will be located', '2021-03-31 04:46:24', '2021-03-31 04:46:24'),
(116, 31, 'Use the framing gun to nail the studs to the top and bottom plates. Space the studs 16\" apart', '2021-03-31 04:46:24', '2021-03-31 04:46:24'),
(117, 31, 'Using a utility knife, cut the 1/2\" drywall to fit the half wall. Secure the drywall to the studs with the screw', '2021-03-31 04:46:24', '2021-03-31 04:46:24'),
(118, 30, 'Lie on your side on an exercise ma', '2021-03-31 04:48:04', '2021-03-31 04:48:04'),
(119, 30, 'Fully extend your legs with one resting on top of the other', '2021-03-31 04:48:04', '2021-03-31 04:48:04'),
(120, 30, 'Fully extend the top arm down the side of your body', '2021-03-31 04:48:04', '2021-03-31 04:48:04'),
(121, 30, 'Bend the arm at floor level to 90 degrees. Your upper arm should be parallel to your body,', '2021-03-31 04:48:04', '2021-03-31 04:48:04'),
(122, 30, '', '2021-03-31 04:48:04', '2021-03-31 04:48:04'),
(123, 29, 'Lie on your left side propped up on your left elbow and forearm, shoulders stacked over your elbow, legs stacked on top.', '2021-03-31 04:49:43', '2021-03-31 04:49:43'),
(124, 29, 'Raise your hips so that your body forms a straight line from head to heels. This is the starting position', '2021-03-31 04:49:43', '2021-03-31 04:49:43'),
(125, 29, 'Keeping your core braced and your glutes engaged, slowly lower your left hip, tapping it gently on the floor.', '2021-03-31 04:49:43', '2021-03-31 04:49:43'),
(126, 29, 'Reverse the move, returning to side plank position.', '2021-03-31 04:49:43', '2021-03-31 04:49:43'),
(127, 29, 'Repeat for reps, then switch sides, performing equal reps on each.', '2021-03-31 04:49:43', '2021-03-31 04:49:43'),
(128, 28, 'Start by performing a basic lunge with your right leg lunging forward.', '2021-03-31 04:51:15', '2021-03-31 04:51:15'),
(129, 28, 'After your right leg is lunged forward in front and you’re feeling stable, use your core to twist your torso', '2021-03-31 04:51:15', '2021-03-31 04:51:15'),
(130, 28, 'Twist your torso back to the center. Step back to standing with your right leg.', '2021-03-31 04:51:15', '2021-03-31 04:51:15'),
(131, 28, 'Switch legs and lunge forward with your left leg, and, once stabilized, twist to the left this time', '2021-03-31 04:51:15', '2021-03-31 04:51:15'),
(132, 27, 'Stand straight with your feet shoulder-width apart, shoulders relaxed, and palms together', '2021-03-31 04:53:01', '2021-03-31 04:53:01'),
(133, 27, 'Lift your right leg off the floor and place it wide apart, as shown in the image', '2021-03-31 04:53:01', '2021-03-31 04:53:01'),
(134, 27, 'Flex your right knee, keep your spine straight, and lower your body to the right', '2021-03-31 04:53:01', '2021-03-31 04:53:01'),
(135, 27, 'Get back to the starting position', '2021-03-31 04:53:01', '2021-03-31 04:53:01'),
(136, 27, 'Flex your left knee, keep your spine straight, and lower your body to the left. Make sure your right leg', '2021-03-31 04:53:01', '2021-03-31 04:53:01'),
(137, 26, 'Step up with the right foot, pressing through the heel to straighten your right leg.', '2021-03-31 04:54:41', '2021-03-31 04:54:41'),
(138, 26, 'Bring the left foot to meet your right foot on top of the step.', '2021-03-31 04:54:41', '2021-03-31 04:54:41'),
(139, 26, 'Bend your right knee and step down with the left foot.', '2021-03-31 04:54:41', '2021-03-31 04:54:41'),
(140, 26, 'Bring the right foot down to meet the left foot on the ground.', '2021-03-31 04:54:41', '2021-03-31 04:54:41'),
(141, 26, 'Repeat this for a specific number of repetitions, then lead with the left foot and repeat the same number of repetitions. A beginner may opt to do this for a set amount of time (one minute, for example), instead of a set number of reps.', '2021-03-31 04:54:41', '2021-03-31 04:54:41'),
(142, 25, 'Start on your hands and knees. If you are new to yoga or not especially flexible, prepare yourself', '2021-03-31 04:55:47', '2021-03-31 04:55:47'),
(143, 25, 'Push your seat to your heels. Keeping your hands in the same place, push your seat back towards', '2021-03-31 04:55:47', '2021-03-31 04:55:47'),
(144, 25, 'Get into plank pose. From child’s pose, inhale and hinge forward at your hips back onto your hands', '2021-03-31 04:55:47', '2021-03-31 04:55:47'),
(145, 25, 'Roll your body to the right. Exhale and roll your body to the right while lifting your right arm', '2021-03-31 04:55:47', '2021-03-31 04:55:47'),
(146, 24, 'Lie down on the floor on your back and bend your knees, placing your hands behind your head or across your chest', '2021-03-31 04:56:46', '2021-03-31 04:56:46'),
(147, 24, 'Pull your belly button towards your spine in preparation for the movement.', '2021-03-31 04:56:46', '2021-03-31 04:56:46'),
(148, 24, 'Slowly contract your abdominals, bringing your shoulder blades about 1 or 2 inches off the floor.', '2021-03-31 04:56:46', '2021-03-31 04:56:46'),
(149, 23, 'Lie on your side on an exercise mat.', '2021-03-31 04:57:51', '2021-03-31 04:57:51'),
(150, 23, 'Fully extend your legs with one resting on top of the other.', '2021-03-31 04:57:52', '2021-03-31 04:57:52'),
(151, 23, 'Fully extend the top arm down the side of your body.', '2021-03-31 04:57:52', '2021-03-31 04:57:52'),
(152, 22, 'Lie on your side on an exercise mat.', '2021-03-31 04:58:55', '2021-03-31 04:58:55'),
(153, 22, 'Fully extend your legs with one resting on top of the other.', '2021-03-31 04:58:55', '2021-03-31 04:58:55'),
(154, 22, 'Fully extend the top arm down the side of your body.', '2021-03-31 04:58:55', '2021-03-31 04:58:55'),
(155, 21, 'Place the head of the bench close to the cable pulley.', '2021-03-31 05:01:19', '2021-03-31 05:01:19'),
(156, 21, 'Attach a straight bar to the lowest notch on the cable system.', '2021-03-31 05:01:19', '2021-03-31 05:01:19'),
(157, 21, 'Lie on the bench so that your head is close to the bar', '2021-03-31 05:01:19', '2021-03-31 05:01:19'),
(158, 21, 'Grab the bar with both hands positioned about shoulder-width apart.', '2021-03-31 05:01:19', '2021-03-31 05:01:19'),
(159, 21, 'Keeping your elbows pointed toward the ceiling and close to your sides, extend your forearms by flexing your triceps.', '2021-03-31 05:01:19', '2021-03-31 05:01:19'),
(160, 21, 'Lower the bar to your forehead or behind your head until you feel a stretch in the triceps, and repeat.', '2021-03-31 05:01:19', '2021-03-31 05:01:19'),
(161, 20, 'Start on your hands and knees. If you are new to yoga or not especially flexible, prepare yourself ', '2021-03-31 05:02:50', '2021-03-31 05:02:50'),
(162, 20, 'Push your seat to your heels. Keeping your hands in the same place, push your seat back towards', '2021-03-31 05:02:50', '2021-03-31 05:02:50'),
(163, 20, 'Get into plank pose. From child’s pose, inhale and hinge forward at your hips back onto your hands', '2021-03-31 05:02:50', '2021-03-31 05:02:50'),
(164, 20, 'Roll your body to the right. Exhale and roll your body to the right while lifting your right arm', '2021-03-31 05:02:50', '2021-03-31 05:02:50'),
(165, 19, 'Sit on the edge of a sturdy chair or bench', '2021-03-31 05:04:42', '2021-03-31 05:04:42'),
(166, 19, 'Scoot your buttocks off the chair, supporting yourself with your hands. Driving your weight into the palms of your hands and the soles of your', '2021-03-31 05:04:42', '2021-03-31 05:04:42'),
(167, 19, 'Lower yourself by bending your elbows back until they reach a 90-degree angle. Engage your triceps as you dip down so that your lowering motion', '2021-03-31 05:04:42', '2021-03-31 05:04:42'),
(168, 19, 'Straighten your elbows fully to lift yourself back up. Pause for 1-2 seconds at the bottom of your dip to make sure your motions are in-control.', '2021-03-31 05:04:42', '2021-03-31 05:04:42'),
(169, 19, 'Repeat 5-7 times. If you are a beginner, start by building your strength rather than going all-out with tricep dips', '2021-03-31 05:04:42', '2021-03-31 05:04:42'),
(170, 18, 'Assume a standard push-up position. Next, get down on your knees instead of placing your weight on your feet.', '2021-03-31 05:05:43', '2021-03-31 05:05:43'),
(171, 18, 'Your body now should look like a check mark, with your feet crossed behind you, knees to head forming a straight', '2021-03-31 05:05:43', '2021-03-31 05:05:43'),
(172, 17, 'Start out on the mat in a push-up positions, hands and feet on the floor with your body off the mat', '2021-03-31 05:06:46', '2021-03-31 05:06:46'),
(173, 17, 'Perform a push-up by lowering your body to the mat and extending your self back up off the mat', '2021-03-31 05:06:46', '2021-03-31 05:06:46'),
(174, 17, 'Now rotate your body to the right by lifting your right arm off the mat and pointing it at the ceiling', '2021-03-31 05:06:46', '2021-03-31 05:06:46'),
(175, 17, 'Return your right hand to the mat, back into push-up position and then perform a push-up', '2021-03-31 05:06:46', '2021-03-31 05:06:46'),
(176, 16, 'Get down on the ground and place your palms flat on the floor at chest level', '2021-03-31 05:08:15', '2021-03-31 05:08:15'),
(177, 16, 'Make your body into a plank so that your toes and hands are only touching the ground (push-up position)', '2021-03-31 05:08:15', '2021-03-31 05:08:15'),
(178, 16, 'Bend at the elbows and lower your chest all the way to the ground', '2021-03-31 05:08:15', '2021-03-31 05:08:15'),
(179, 16, 'Lift both hands off the floor, place them back on the ground, and then push yourself back up', '2021-03-31 05:08:15', '2021-03-31 05:08:15'),
(180, 16, 'This completes one repetition', '2021-03-31 05:08:15', '2021-03-31 05:08:15'),
(181, 15, 'Learning Push Up Basics. Assume a face-down prone position on the floor. Keep your feet together.', '2021-03-31 05:09:20', '2021-03-31 05:09:20'),
(182, 15, 'Doing a Standard Push Up. Get down on the ground', '2021-03-31 05:09:20', '2021-03-31 05:09:20'),
(183, 15, ' Trying Advanced Push Ups. Do clap push ups.', '2021-03-31 05:09:20', '2021-03-31 05:09:20'),
(184, 15, 'Making Push Ups Easier. Push up from your knees.', '2021-03-31 05:09:20', '2021-03-31 05:09:20'),
(185, 14, 'Bending your legs, push your butt back to a 45-degree angle', '2021-03-31 05:10:23', '2021-03-31 05:10:23'),
(186, 14, 'Extend your arms straight in front of you.\r\n', '2021-03-31 05:10:23', '2021-03-31 05:10:23'),
(187, 14, 'Pause for a second, then slowly raise your body back up by pushing through your heels.', '2021-03-31 05:10:23', '2021-03-31 05:10:23'),
(188, 13, 'Stand up straight, hold your arms at your sides, and stand with your feet shoulder-width apart.', '2021-03-31 05:11:26', '2021-03-31 05:11:26'),
(189, 13, 'Jump and extend your arms overhead. With your feet shoulder width apart, slightly bend your knees so you can hop.', '2021-03-31 05:11:26', '2021-03-31 05:11:26'),
(190, 13, 'Extend your legs. As you jump, open your legs wider than shoulder width as you lift your arms overhead.', '2021-03-31 05:11:26', '2021-03-31 05:11:26'),
(191, 13, 'Land in the starting position. After jumping in the air, gently land in the first position with arms at your sides', '2021-03-31 05:11:26', '2021-03-31 05:11:26'),
(192, 12, 'Stand with your back pressing against a wall.', '2021-03-31 05:12:27', '2021-03-31 05:12:27'),
(193, 12, 'Slide downward into a squat position by moving your feet forward until your knees make a 90-degree angle', '2021-03-31 05:12:27', '2021-03-31 05:12:27'),
(194, 12, 'Hold this move as long as you can.', '2021-03-31 05:12:27', '2021-03-31 05:12:27'),
(195, 11, 'Get Into Position. With the barbell sitting at around shoulder height on the rack pins', '2021-03-31 05:13:44', '2021-03-31 05:13:44'),
(196, 11, 'Brace Your Body', '2021-03-31 05:13:44', '2021-03-31 05:13:44'),
(197, 11, 'Take Your Stance', '2021-03-31 05:13:44', '2021-03-31 05:13:44'),
(198, 11, 'Squat Down', '2021-03-31 05:13:44', '2021-03-31 05:13:44'),
(199, 11, 'Rise', '2021-03-31 05:13:44', '2021-03-31 05:13:44'),
(200, 10, 'Stand upright with your legs together, arms at your sides.', '2021-03-31 05:14:59', '2021-03-31 05:14:59'),
(201, 10, 'Bend your knees slightly, and jump into the air.', '2021-03-31 05:14:59', '2021-03-31 05:14:59'),
(202, 10, 'As you jump, spread your legs to be about shoulder-width apart. Stretch your arms out and over your head.', '2021-03-31 05:14:59', '2021-03-31 05:14:59'),
(203, 10, 'Jump back to starting position.', '2021-03-31 05:14:59', '2021-03-31 05:14:59'),
(204, 10, '', '2021-03-31 05:14:59', '2021-03-31 05:14:59'),
(205, 9, 'Lie flat on the floor with your lower back pressed to the ground and knees bent. Your feet should be on the floor and your hands are behind your head.', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(206, 9, 'Contract your core muscles, drawing in your abdomen to stabilize your spine.', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(207, 9, 'With your hands gently holding your head, pull your shoulder blades back and slowly raise your knees to about a 90-degree angle, lifting your feet from the floor.', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(208, 9, 'Exhale and slowly, at first, go through a bicycle pedal motion, bringing one knee up towards your armpit while straightening the other leg, keeping both elevated higher than your hips.', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(209, 9, 'Rotate your torso so you can touch your elbow to the opposite knee as it comes up.', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(210, 9, 'Alternate to twist to the other side while drawing that knee towards your armpit and the other leg extended until your elbow touches the alternate knee.', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(211, 9, 'Aim for 12 to 20 repetitions and three sets.\r\n', '2021-03-31 05:17:30', '2021-03-31 05:17:30'),
(212, 8, 'Stand on a flat surface & Begin jogging, lifting the knees high enough for your comfort level.', '2021-03-31 05:18:37', '2021-03-31 05:18:37'),
(213, 8, 'Then lift your knees to hip level but keep the core tight to support your back', '2021-03-31 05:18:37', '2021-03-31 05:18:37'),
(214, 8, 'In advanced version, hold your hands straight at hip level and try to touch the knees to your hands.', '2021-03-31 05:18:37', '2021-03-31 05:18:37'),
(215, 8, 'Make sure to bring the knees towards your hands instead of reaching the hands to the knees!', '2021-03-31 05:18:37', '2021-03-31 05:18:37'),
(216, 8, 'Repeat the above steps to further perform this exercise.', '2021-03-31 05:18:37', '2021-03-31 05:18:37'),
(217, 47, 'Start by assuming a pushup position and keep your hands at a shoulder-width Make sure that your shoulders, hips, and the ankles line up together. It is your initial position.', '2021-08-10 14:42:23', '2021-08-10 14:42:23'),
(218, 47, 'Brace your abs and raise the right leg off the floor until it is at your hip height. Pause for a second or two before lowering your leg to the original position.', '2021-08-10 14:42:23', '2021-08-10 14:42:23'),
(219, 47, 'Now lift your left leg and follow the same steps.', '2021-08-10 14:42:23', '2021-08-10 14:42:23'),
(220, 47, 'sd', '2021-08-10 14:42:23', '2021-08-10 14:42:23'),
(221, 39, 'Keep your weight on the balls of our feet and change sideways directions as needed.', '2021-08-16 13:15:22', '2021-08-16 13:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `ex_category`
--

CREATE TABLE `ex_category` (
  `id` int(11) NOT NULL,
  `cat_icon` varchar(70) CHARACTER SET latin1 NOT NULL,
  `cat_name` varchar(70) NOT NULL,
  `level` text NOT NULL,
  `description` text NOT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `is_deleted` enum('1','0') DEFAULT '0',
  `deleted_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ex_category`
--

INSERT INTO `ex_category` (`id`, `cat_icon`, `cat_name`, `level`, `description`, `created_at`, `updated_at`, `is_deleted`, `deleted_at`) VALUES
(56, 'category_1640669420.png', 'Beginner', 'Beginner', ' This is a beginner friendly version of the workout. We have replaced the harder exercises with alternatives that should be easier to perform.', '1617095680', '1640669419', '0', NULL),
(57, 'category_1640669407.png', 'Classic', 'Classic', ' Scientifically proven to improve health and fitness.', '1617095745', '1640669407', '0', NULL),
(58, 'category_1628664741.png', 'Abs', 'Abs', ' Want washboard abs? This is the workout for you. A short workout that targets every part of your abs.', '1617095787', '1628664741', '0', NULL),
(59, 'category_1628664711.png', 'Sweat', 'Sweat', ' High intensity workout that will get your heart rate up and make you sweat. Workout less but lose more!', '1617095836', '1628664711', '0', NULL),
(60, 'category_1640669391.png', 'Tabata', 'Tabata', ' A tabata inspired workout that includes a warmup and cooldown. Although short, this workout is intense. Make sure you are physically fit before attempting.', '1617095890', '1640669391', '0', NULL),
(61, 'category_1640669379.png', 'Complete', 'Complete', ' This is classic workout, but done 3 times in a row. Doing this complete workout will help you hit the doctor recommended 20 minute of exercise a day for better health', '1617095930', '1641350261', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_category`
--

CREATE TABLE `home_category` (
  `id` tinyint(4) DEFAULT NULL,
  `description` varchar(179) DEFAULT NULL,
  `tot_exercise` tinyint(4) DEFAULT NULL,
  `time` tinyint(4) DEFAULT NULL,
  `calories` tinyint(4) DEFAULT NULL,
  `type` varchar(8) DEFAULT NULL,
  `image` varchar(5) DEFAULT NULL,
  `name` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_category`
--

INSERT INTO `home_category` (`id`, `description`, `tot_exercise`, `time`, `calories`, `type`, `image`, `name`) VALUES
(1, 'This is a beginner friendly version of the classic 7 minute workout. We have replaced the harder exercises with alternatives that should be easier to perform.', 14, 6, 66, 'Beginner', 'one', '7M BEGINNER'),
(2, 'The classic 7 minute workout. Scientifically proven to improve health and fitness', 14, 6, 74, 'CLASSIC', 'two', '7M CLASSIC'),
(3, 'Want washboard abs? This is the workout for you. A short workout that targets every part of your abs.', 12, 6, 68, 'ABS', 'three', '7M ABS'),
(4, 'High intensity workout that will get your heart rate up and make you sweat. Workout less but lose more!', 15, 7, 82, 'SWEAT', 'foure', '7M SWEAT'),
(5, 'A tabata inspired workout that includes a warmup and cooldown. Although short,this workout is intense. Make sure you are physically fit befor attempting.', 10, 4, 50, 'TABATA', 'five', '7M TABATA'),
(6, 'This is the classic 7 minut workout, but done 3 times in a row. Doining this complete workout will help you hit the doctor recomended 20 minut of excercise a day for better health', 14, 6, 74, 'complete', 'six', '7M COMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `android_key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ios_key` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `android_key`, `ios_key`) VALUES
(1, 'AAAALD9EL4c:APA91bFBgJf-7MXq0K4LQrxbfRAcEhb3zrP5J0ZvT8FF3fNdSoJa-36wQv5q2w7YTw_3Q1fzqQc9YJkun-yzTdQOhcy_E4wnl7a9PFT6chwhIVvOpt3J1yWUjxmAIsVnlcWrsCH-4Qfx', '122334');

-- --------------------------------------------------------

--
-- Table structure for table `send_notification`
--

CREATE TABLE `send_notification` (
  `id` int(11) NOT NULL,
  `message` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(1500) DEFAULT NULL,
  `content` varchar(8000) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'about us', NULL, '2021-06-16 21:38:51', '2021-06-16 21:38:51'),
(2, 'privacy policy', NULL, '2021-06-16 21:39:11', '2021-06-16 21:39:11'),
(3, 'contact us', NULL, '2021-06-16 21:39:31', '2021-06-16 21:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `tokandata`
--

CREATE TABLE `tokandata` (
  `id` int(11) NOT NULL,
  `token` text NOT NULL,
  `type` varchar(20) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `delivery_boyid` int(11) NOT NULL DEFAULT '0',
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tokandata`
--

INSERT INTO `tokandata` (`id`, `token`, `type`, `user_id`, `delivery_boyid`, `datetime`) VALUES
(1, 'erMTTqLbT8qeBWnkcjri9m:APA91bGvWpea90YcB5ilTKijCEKbh3DgWkJBh5GB_CSJQZNe1hy1i8nIKdb4ehpa79KOY_ORcucTPP1-slb5qPJJ-hE27DzHu91kXcJyYtBfMkQfwc8EA7ZvNU0cyA477ExZwlZV58IV', 'android', 0, 0, '2022-01-11 06:26:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise_sets`
--
ALTER TABLE `exercise_sets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `ex_id` (`ex_id`),
  ADD KEY `ex_id_2` (`ex_id`),
  ADD KEY `cat_id_2` (`cat_id`);

--
-- Indexes for table `exercise_step`
--
ALTER TABLE `exercise_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ex_category`
--
ALTER TABLE `ex_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `send_notification`
--
ALTER TABLE `send_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokandata`
--
ALTER TABLE `tokandata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `exercise_sets`
--
ALTER TABLE `exercise_sets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `exercise_step`
--
ALTER TABLE `exercise_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `ex_category`
--
ALTER TABLE `ex_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `send_notification`
--
ALTER TABLE `send_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokandata`
--
ALTER TABLE `tokandata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exercise_sets`
--
ALTER TABLE `exercise_sets`
  ADD CONSTRAINT `exercise_sets_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `ex_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exercise_sets_ibfk_2` FOREIGN KEY (`ex_id`) REFERENCES `exercise` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
