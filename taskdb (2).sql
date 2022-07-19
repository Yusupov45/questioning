-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 29, 2022 at 12:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(10) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `login`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) NOT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `secondname` varchar(30) DEFAULT NULL,
  `patronymic` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `quality` varchar(500) DEFAULT NULL,
  `skills` varchar(100) DEFAULT NULL,
  `photo1` varchar(500) DEFAULT NULL,
  `photo2` varchar(500) DEFAULT NULL,
  `photo3` varchar(500) DEFAULT NULL,
  `photo4` varchar(500) DEFAULT NULL,
  `photo5` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `gender`, `firstname`, `secondname`, `patronymic`, `date`, `avatar`, `color`, `quality`, `skills`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`) VALUES
(32, 'Мужской', 'Сергей', 'Иванов', 'Иванович', '2022-06-01', '../uploads/1655750522ava1.jpg', '#8d4949', 'Биология', '  Опрятность  Трудолюбие', '../uploads/1655750564123.png', '../uploads/1655750564c++.jpg', '', '', ''),
(33, 'Женский', '', 'Еникеева', '', '2022-06-03', '', '#00ff7b', 'SQL', ' Усидчивость Опрятность Самообучаемость Трудолюбие', '', '', '', '', ''),
(34, 'Мужской', 'Андрей', 'Андреев', 'Андреевич', '2021-10-02', '../uploads/1655750653ava2.jpg', '#ff0000', 'Программирование', ' Усидчивость   Трудолюбие', '../uploads/1655750679123.png', '../uploads/1655750679ava2.jpg', '../uploads/1655750679c++.jpg', '../uploads/1655750679php.png', '../uploads/1655750679sql.png'),
(35, 'Мужской', '', 'Яблоков', '', '2021-01-01', '', '#000000', '', '    ', '', '', '', '', ''),
(36, 'Мужской', 'Тест', 'Тест', '', '2022-06-02', '', '#000000', '', '    ', '', '', '', '', ''),
(37, 'Мужской', '', 'Тест1', '', '2022-06-08', '', '#000000', '', '    ', '', '', '', '', ''),
(38, 'Мужской', '', 'Тест2', '', '2022-06-10', '', '#000000', '', '    ', '', '', '', '', ''),
(39, 'Мужской', '', 'Тест3', '', '2022-06-10', '', '#000000', '', '    ', '', '', '', '', ''),
(40, 'Мужской', '', 'Тест4', '', '2022-06-02', '', '#000000', '', '    ', '', '', '', '', ''),
(41, 'Мужской', 'Максим', 'Хлопцев', '', '2022-06-08', '', '#000000', '', '  Опрятность  Трудолюбие', '../uploads/1656500172Безымянный.png', '', '', '', ''),
(42, 'Мужской', '', 'Прохоров', '', '2022-06-01', '', '#000000', '', '    ', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
