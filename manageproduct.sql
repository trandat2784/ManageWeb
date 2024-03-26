-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3309
-- Thời gian đã tạo: Th3 26, 2024 lúc 02:44 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `manageproduct`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `ID` int(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Address` text NOT NULL,
  `Role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`ID`, `Username`, `Password`, `Email`, `Address`, `Role`) VALUES
(0, 'tienmanh', '12345', 'dada', 'dadadad', 0),
(1, 'trandat', '12345', 'addada', 'dadadad', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manageproduce`
--

CREATE TABLE `manageproduce` (
  `ID` int(10) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `ImageProduce` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `ProduceCode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `manageproduce`
--

INSERT INTO `manageproduce` (`ID`, `Name`, `Price`, `ImageProduce`, `Amount`, `Genre`, `ProduceCode`) VALUES
(1, 'Mixed Nut', 20, 'Screenshot 2024-03-06 195429.png', 35, 'Fruits and Nut', 'MXN'),
(5, 'addad', 25, 'Screenshot 2024-03-09 210018.png', 35, 'affsad', 'adadad');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `manageproduce`
--
ALTER TABLE `manageproduce`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
