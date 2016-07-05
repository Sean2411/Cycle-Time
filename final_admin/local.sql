-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 18, 2014 at 04:04 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `CycleTime`
--

-- --------------------------------------------------------

--
-- Table structure for table `CAMPAIGN_Tbl`
--

CREATE TABLE `CAMPAIGN_Tbl` (
  `CAMPAIGN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PROFILE_ID` int(11) NOT NULL,
  `CampaignType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SubType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ORG_CPG_01_ID` int(11) NOT NULL,
  `ORG_CPG_02_ID` int(11) NOT NULL,
  PRIMARY KEY (`CAMPAIGN_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `CAMPAIGN_Tbl`
--

INSERT INTO `CAMPAIGN_Tbl` (`CAMPAIGN_ID`, `PROFILE_ID`, `CampaignType`, `SubType`, `ORG_CPG_01_ID`, `ORG_CPG_02_ID`) VALUES
(1, 0, 'Electronics', 'Wearables', 0, 0),
(2, 0, 'Automotive', 'GPS', 0, 0),
(3, 0, 'Toys', 'Action Figures', 0, 0),
(4, 0, 'Electronics', 'Televisions', 0, 0),
(5, 0, 'Automotive', 'adasdas', 0, 0),
(6, 0, 'dadasd', 'asdasd', 0, 0),
(7, 0, 'dadasd', 'GPS', 0, 0),
(8, 0, 'Automotive', 'Action Figures', 0, 0),
(9, 0, 'destory', 'pop', 0, 0),
(10, 0, 'Electronics', 'GPS', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `CT_Mapping_Tbl`
--

CREATE TABLE `CT_Mapping_Tbl` (
  `id_CTMapping` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `SRC_CT_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `JVA_CT_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EVT_Start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EVT_End` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_CTMapping`),
  KEY `SRC_ID` (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `CT_Mapping_Tbl`
--

INSERT INTO `CT_Mapping_Tbl` (`id_CTMapping`, `SRC_ID`, `SRC_CT_Name`, `JVA_CT_ID`, `EVT_Start`, `EVT_End`) VALUES
(1, 1, 'CT01', 'JVA_CT_37', 'JVA_DT_17', 'JVA_DT_80'),
(2, 1, 'CT02', 'JVA_CT_78', 'JVA_DT_80', 'JVA_DT_52'),
(3, 1, 'CT03', 'JVA_CT_42', 'JVA_DT_52', 'JVA_DT_66'),
(4, 1, 'CT04', 'JVA_CT_6', 'JVA_DT_66', 'JVA_DT_77'),
(5, 1, 'CT05', 'JVA_CT_60', 'JVA_DT_77', 'JVA_DT_47'),
(7, 1, 'CT06', 'JVA_CT_20', 'JVA_DT_47', 'JVA_DT_71'),
(8, 1, 'CT07', 'JVA_CT_54', 'JVA_DT_71', 'JVA_DT_42'),
(18, 4, 'CTT01', 'JVA_CT_8', 'JVA_DT_47', 'JVA_DT_24'),
(19, 4, 'CTT02', 'JVA_CT_17', 'JVA_DT_24', 'JVA_DT_42'),
(20, 4, 'CTT03', 'JVA_CT_46', 'JVA_DT_42', 'JVA_DT_42'),
(21, 4, 'CTT04', 'JVA_CT_67', 'JVA_DT_42', 'JVA_DT_67'),
(22, 4, 'CTT05', 'JVA_CT_65', 'JVA_DT_67', 'JVA_DT_20'),
(23, 4, 'CTT06', 'JVA_CT_18', 'JVA_DT_20', 'JVA_DT_63'),
(24, 1, 'CTT06', 'JVA_CT_7', 'JVA_DT_63', 'JVA_DT_66'),
(25, 4, 'CTT06', 'JVA_CT_7', 'JVA_DT_63', 'JVA_DT_66'),
(39, 5, 'CPG04', 'JVA_CT_0', 'JVA_DT_522', 'JVA_DT_47'),
(40, 5, 'CPG01', 'JVA_CT_72', 'JVA_DT_603', 'JVA_DT_80'),
(41, 5, 'CPG02', 'JVA_CT_11', 'JVA_DT_80', 'JVA_DT_640'),
(42, 5, 'CPG03', 'JVA_CT_84', 'JVA_DT_640', 'JVA_DT_522'),
(43, 13, 'CPL01', 'JVA_CT_28', 'JVA_DT_140', 'JVA_DT_71'),
(44, 13, 'CPL02', 'JVA_CT_40', 'JVA_DT_71', 'JVA_DT_954'),
(45, 1, 'CT-22-EW', 'JVA_CT_86', 'JVA_DT_71', 'JVA_DT_71'),
(46, 1, '', 'JVA_CT_30', 'JVA_DT_17', 'JVA_DT_17'),
(47, 16, 'Kppd', 'JVA_CT_90', 'JVA_DT_821', 'JVA_DT_80'),
(48, 16, 'Jpeaax', 'JVA_CT_38', 'JVA_DT_92', 'JVA_DT_821'),
(54, 23, 'PL01', 'JVA_CT_5', 'JVA_DT_42', 'JVA_DT_184'),
(55, 25, 'cdqw', 'JVA_CT_46', 'JVA_DT_42', 'JVA_DT_42'),
(56, 26, 'CG04', 'JVA_CT_46', 'JVA_DT_42', 'JVA_DT_42');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Customer_Id` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `FullName` varchar(50) CHARACTER SET utf8 NOT NULL,
  `PhoneNo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `FaxNo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`Customer_Id`),
  KEY `Cutomer_SRC` (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=70 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_Id`, `SRC_ID`, `CompanyId`, `FullName`, `PhoneNo`, `FaxNo`, `Email`) VALUES
(1, 1, 40793, 'Maria', '123-255-1000', '123-258-1000', 'GonzalesM@email.com'),
(2, 1, 7610, 'Randall', '123-255-1001', '123-258-1001', 'SalkR@email.com'),
(3, 1, 22978, 'Miguel', '123-255-1002', '123-258-1002', 'CittiM@email.com'),
(4, 1, 88765, 'Susanne', '123-255-1003', '123-258-1003', 'KarlS@email.com'),
(5, 1, 145714, 'Laufey', '123-255-1004', '123-258-1004', 'TrygL@email.com'),
(6, 1, 112455, 'Charles', '123-255-1049', '123-258-1049', 'MaciasC@email.com'),
(7, 1, 77308, 'Margarita', '123-255-1006', '123-258-1006', 'ArduoM@email.com'),
(8, 1, 82106, 'Carlos', '123-255-1007', '123-258-1007', 'AthetaC@email.com'),
(9, 1, 7545, 'Michael', '123-255-1008', '123-258-1008', 'JarrayM@email.com'),
(10, 1, 41950, 'Brian', '123-255-1009', '123-258-1009', 'Allentown B@email.com'),
(11, 1, 78418, 'Norzila', '123-255-1010', '123-258-1010', 'ZanudiN@email.com'),
(12, 1, 107124, 'Pedro', '123-255-1011', '123-258-1011', 'GonzalesP@email.com'),
(13, 1, 107569, 'Gabriela', '123-255-1012', '123-258-1012', 'SabanaG@email.com'),
(14, 1, 16598, 'Marta', '123-255-1013', '123-258-1013', 'MariposaM@email.com'),
(15, 1, 107977, 'Mary', '123-255-1014', '123-258-1014', 'DownerM@email.com'),
(16, 1, 107979, 'Dale', '123-255-1015', '123-258-1015', 'SteepD@email.com'),
(17, 1, 65487, 'Rebecca', '123-255-1017', '123-258-1017', 'CollinaR@email.com'),
(18, 1, 164328, 'Charles', '123-255-1018', '123-258-1018', 'WoodsterC@email.com'),
(19, 1, 117299, 'Melissa', '123-255-1047', '123-258-1047', 'BartonM@email.com'),
(20, 1, 108134, 'Ana', '123-255-1020', '123-258-1020', 'RiveraA@email.com'),
(21, 1, 111130, 'Juan', '123-255-1027', '123-258-1027', 'AngelicalJ@email.com'),
(22, 1, 77308, 'Margarita', '123-255-1029', '123-258-1029', 'ArdilaM@email.com'),
(23, 1, 82106, 'Carlos', '123-255-1030', '123-258-1030', 'ArtetaC@email.com'),
(24, 1, 112820, 'Julie', '123-255-1054', '123-258-1054', 'BrownJ@email.com'),
(25, 1, 108023, 'Blake', '123-255-1045', '123-258-1045', 'BullochB@email.com'),
(26, 1, 72294, 'Ellen', '123-255-1056', '123-258-1056', 'CrainesE@email.com'),
(27, 1, 91837, 'Ulrich', '123-255-1022', '123-258-1022', 'DeustchU@email.com'),
(28, 1, 107977, 'Mary', '123-255-1046', '123-258-1046', 'DowdM@email.com'),
(29, 1, 111131, 'David', '123-255-1028', '123-258-1028', 'EspinosaD@email.com'),
(30, 1, 111015, 'Fernand', '123-255-1025', '123-258-1025', 'FrenchyF@email.com'),
(31, 1, 112454, 'Marc', '123-255-1048', '123-258-1048', 'GorelickM@email.com'),
(32, 1, 81515, 'Mia', '123-255-1023', '123-258-1023', 'KohlsM@email.com'),
(33, 1, 112456, 'Jonathan', '123-255-1050', '123-258-1050', 'MaiselJ@email.com'),
(34, 1, 110944, 'Maria', '123-255-1024', '123-258-1024', 'PettersonM@email.com'),
(35, 1, 106347, 'Ram', '123-255-1057', '123-258-1057', 'ReddyR@email.com'),
(36, 1, 111016, 'HJ', '123-255-1026', '123-258-1026', 'RoelofseerH@email.com'),
(37, 1, 123364, 'Omar', '123-255-1055', '123-258-1055', 'SawlisterO@email.com'),
(38, 1, 107979, 'Dale', '123-255-1052', '123-258-1052', 'SteeleD@email.com'),
(39, 1, 112457, 'Michael', '123-255-1053', '123-258-1053', 'WeinstockM@email.com'),
(40, 3, 123, 'yingzizhu', '2019818099', '', 'ywang101@stevens.edu'),
(41, 3, 123, 'CustomerB', '2019818099', '', '707195586@qq.com'),
(42, 4, 123, 'yuun', '2019818099', '', 'ywang101@stevens.edu'),
(43, 4, 123, 'CustomerF', '2019818099', '', '707195586@qq.com'),
(51, 5, 123, 'kkpe', '2019818099', '', '707195586@qq.com'),
(52, 5, 123, 'cdsadasdasidasjdidddxx', '2019818099', '', 'ywang101@stevens.edu'),
(53, 11, 21379, 'Sponl', '788-819-1231', '498-734-2313', 'sponl@hotmail.com'),
(54, 12, 13879, 'Loon', '417-328-7348', '213-871-2934', 'loon@gmail.com'),
(55, 13, 123, 'yixxx', '2019818099', '', '707195586@qq.com'),
(56, 14, 123, 'yiwangddwawdda', '2019818099', '2019818099', 'ywang101@stevens.edu'),
(57, 14, 123, 'yi', '2019818099', '', 'ywang101@stevens.edu'),
(58, 14, 0, '', '', '', ''),
(59, 14, 12312, 'asdas', '123-255-1001', '123-258-1000', 'SalkR@email.com'),
(60, 16, 123, 'BOB O\\''HARA', '2019818099', '', '707195586@qq.com'),
(61, 16, 123, 'Jlien', '2019818099', '', '707195586@qq.com'),
(62, 22, 0, 'customerddd', '', '', ''),
(63, 22, 0, '', '', '', ''),
(64, 22, 0, '$!#@##', '', '', ''),
(65, 22, 123, 'yisss', '201-981-8099', '201-981-8099', 'ywang101@stevens.edu'),
(66, 22, 123, 'yingzizhusss', '201-981-8099', '201-981-8099', 'ywang101@stevens.edu'),
(67, 23, 123, 'ujnudw', '2019818099', '', 'ywang101@stevens.edu'),
(68, 25, 123, 'yiwangddwawdda', '201-981-8099', '201-981-8099', 'ywang101@stevens.edu'),
(69, 26, 1234, 'dddasasdas', '201-981-8099', '201-981-8099', 'ywang101@stevens.edu');

-- --------------------------------------------------------

--
-- Table structure for table `Customer_Address`
--

CREATE TABLE `Customer_Address` (
  `AddressId` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerId` int(11) NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8 NOT NULL,
  `City` varchar(50) CHARACTER SET utf8 NOT NULL,
  `State` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Zipcode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Country` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`AddressId`),
  KEY `Customer_id` (`CustomerId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=177 ;

--
-- Dumping data for table `Customer_Address`
--

INSERT INTO `Customer_Address` (`AddressId`, `CustomerId`, `Address`, `City`, `State`, `Zipcode`, `Country`) VALUES
(1, 1, '108 NE 1st St', 'Hoboken', 'NJ', '07030', 'USA'),
(2, 2, '800 St Marys Blvd', 'IowaCity', 'IA', '52246', 'USA'),
(3, 3, '77 Warren Street', 'Lebanon', 'MO', '65536', 'USA'),
(4, 4, 'Strandboulevarden 49', 'Kobenhavn', 'Kobenhavn', '2100', 'Denmark'),
(5, 5, 'Skogarhlid 8', 'Reykjavik', 'Reykjavik', '5420', 'Iceland'),
(6, 6, '6621 Fannin St', 'Houston', 'TX', '77030', 'Sweden'),
(7, 7, 'Calle 10  18-75', 'IowaCity', 'IA', '52246', 'Colombia'),
(8, 8, 'Clle 163  28-60', 'Lebanon', 'MO', '65536', 'Colombia'),
(9, 9, '8140 N Mopac Bldg. 3 Suite 120', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(10, 10, '1300 Badger St', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(11, 11, 'Jalan Pahang', 'Houston', 'TX', '77030', 'Malaysia'),
(12, 12, 'Insurgentes Sur 3700C', 'IowaCity', 'IA', '52246', 'Mexico'),
(13, 13, 'Avenida Professor Egas Moniz', 'Lebanon', 'MO', '65536', 'Portugal'),
(14, 14, 'Estrada IC 19', 'Kobenhavn', 'Kobenhavn', '2100', 'Portugal'),
(15, 15, '2401 Gilham Road', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(16, 16, '593 Eddy St', 'Houston', 'TX', '77030', 'USA'),
(17, 17, 'General Audits', 'IowaCity', 'IA', '52246', 'USA'),
(18, 18, 'Dept of Parts', 'Lebanon', 'MO', '65536', 'USA'),
(19, 1, '108 NE 1st St', 'Hoboken', 'NJ', '07030', 'USA'),
(20, 2, '800 St Marys Blvd', 'IowaCity', 'IA', '52246', 'USA'),
(21, 3, '77 Warren Street', 'Lebanon', 'MO', '65536', 'USA'),
(22, 4, 'Strandboulevarden 49', 'Kobenhavn', 'Kobenhavn', '2100', 'Denmark'),
(23, 5, 'Skogarhlid 8', 'Reykjavik', 'Reykjavik', '5420', 'Iceland'),
(24, 6, '6621 Fannin St', 'Houston', 'TX', '77030', 'Sweden'),
(25, 7, 'Calle 10  18-75', 'IowaCity', 'IA', '52246', 'Colombia'),
(26, 8, 'Clle 163  28-60', 'Lebanon', 'MO', '65536', 'Colombia'),
(27, 9, '8140 N Mopac Bldg. 3 Suite 120', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(28, 10, '1300 Badger St', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(29, 11, 'Jalan Pahang', 'Houston', 'TX', '77030', 'Malaysia'),
(30, 12, 'Insurgentes Sur 3700C', 'IowaCity', 'IA', '52246', 'Mexico'),
(31, 13, 'Avenida Professor Egas Moniz', 'Lebanon', 'MO', '65536', 'Portugal'),
(32, 14, 'Estrada IC 19', 'Kobenhavn', 'Kobenhavn', '2100', 'Portugal'),
(33, 15, '2401 Gilham Road', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(34, 16, '593 Eddy St', 'Houston', 'TX', '77030', 'USA'),
(35, 17, 'General Audits', 'IowaCity', 'IA', '52246', 'USA'),
(36, 18, 'Dept of Parts', 'Lebanon', 'MO', '65536', 'USA'),
(37, 19, '6071 West Outer Drive', 'Kobenhavn', 'MO', '2100', 'USA'),
(38, 20, 'Largo', 'Houston', 'TX', '77030', 'Portugal'),
(39, 21, 'Calle 51 45 93', 'IowaCity', 'IA', '52246', 'Colombia'),
(40, 22, 'Calle 10 18 75', 'Lebanon', 'MO', '65536', 'Colombia'),
(41, 1, '108 NE 1st St', 'Hoboken', 'NJ', '07030', 'USA'),
(42, 2, '800 St Marys Blvd', 'IowaCity', 'IA', '52246', 'USA'),
(43, 3, '77 Warren Street', 'Lebanon', 'MO', '65536', 'USA'),
(44, 4, 'Strandboulevarden 49', 'Kobenhavn', 'Kobenhavn', '2100', 'Denmark'),
(45, 5, 'Skogarhlid 8', 'Reykjavik', 'Reykjavik', '5420', 'Iceland'),
(46, 6, '6621 Fannin St', 'Houston', 'TX', '77030', 'Sweden'),
(47, 7, 'Calle 10  18-75', 'IowaCity', 'IA', '52246', 'Colombia'),
(48, 8, 'Clle 163  28-60', 'Lebanon', 'MO', '65536', 'Colombia'),
(49, 9, '8140 N Mopac Bldg. 3 Suite 120', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(50, 10, '1300 Badger St', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(51, 11, 'Jalan Pahang', 'Houston', 'TX', '77030', 'Malaysia'),
(52, 12, 'Insurgentes Sur 3700C', 'IowaCity', 'IA', '52246', 'Mexico'),
(53, 13, 'Avenida Professor Egas Moniz', 'Lebanon', 'MO', '65536', 'Portugal'),
(54, 14, 'Estrada IC 19', 'Kobenhavn', 'Kobenhavn', '2100', 'Portugal'),
(55, 15, '2401 Gilham Road', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(56, 16, '593 Eddy St', 'Houston', 'TX', '77030', 'USA'),
(57, 17, 'General Audits', 'IowaCity', 'IA', '52246', 'USA'),
(58, 18, 'Dept of Parts', 'Lebanon', 'MO', '65536', 'USA'),
(59, 19, '6071 West Outer Drive', 'Kobenhavn', 'MO', '2100', 'USA'),
(60, 20, 'Largo', 'Houston', 'TX', '77030', 'Portugal'),
(61, 21, 'Calle 51 45 93', 'IowaCity', 'IA', '52246', 'Colombia'),
(62, 22, 'Calle 10 18 75', 'Lebanon', 'MO', '65536', 'Colombia'),
(63, 23, 'Clle 163 28 60', 'Kobenhavn', 'MO', '2100', 'Colombia'),
(64, 24, '4800 Sand Point Way NE', 'Houston', 'TX', '77030', 'USA'),
(65, 25, 'Dept. of Toys', 'IowaCity', 'IA', '52246', 'USA'),
(66, 26, '1400 Pelham Parkway', 'Lebanon', 'MO', '65536', 'USA'),
(67, 27, 'Stuttgarter Str. 74', 'Kobenhavn', 'Kobenhavn', '2100', 'Germany'),
(68, 28, 'Toy Depart', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(69, 29, 'Calle 78B 69 240', 'Houston', 'TX', '77030', 'Colombia'),
(70, 30, '511 Jochemus Street', 'IowaCity', 'IA', '52246', 'South Africa'),
(71, 31, '9000 W Wisconsin Ave', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(72, 1, '108 NE 1st St', 'Hoboken', 'NJ', '07030', 'USA'),
(73, 2, '800 St Marys Blvd', 'IowaCity', 'IA', '52246', 'USA'),
(74, 3, '77 Warren Street', 'Lebanon', 'MO', '65536', 'USA'),
(75, 4, 'Strandboulevarden 49', 'Kobenhavn', 'Kobenhavn', '2100', 'Denmark'),
(76, 5, 'Skogarhlid 8', 'Reykjavik', 'Reykjavik', '5420', 'Iceland'),
(77, 6, '6621 Fannin St', 'Houston', 'TX', '77030', 'Sweden'),
(78, 7, 'Calle 10  18-75', 'IowaCity', 'IA', '52246', 'Colombia'),
(79, 8, 'Clle 163  28-60', 'Lebanon', 'MO', '65536', 'Colombia'),
(80, 9, '8140 N Mopac Bldg. 3 Suite 120', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(81, 10, '1300 Badger St', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(82, 11, 'Jalan Pahang', 'Houston', 'TX', '77030', 'Malaysia'),
(83, 12, 'Insurgentes Sur 3700C', 'IowaCity', 'IA', '52246', 'Mexico'),
(84, 13, 'Avenida Professor Egas Moniz', 'Lebanon', 'MO', '65536', 'Portugal'),
(85, 14, 'Estrada IC 19', 'Kobenhavn', 'Kobenhavn', '2100', 'Portugal'),
(86, 15, '2401 Gilham Road', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(87, 16, '593 Eddy St', 'Houston', 'TX', '77030', 'USA'),
(88, 17, 'General Audits', 'IowaCity', 'IA', '52246', 'USA'),
(89, 18, 'Dept of Parts', 'Lebanon', 'MO', '65536', 'USA'),
(90, 19, '6071 West Outer Drive', 'Kobenhavn', 'MO', '2100', 'USA'),
(91, 20, 'Largo', 'Houston', 'TX', '77030', 'Portugal'),
(92, 21, 'Calle 51 45 93', 'IowaCity', 'IA', '52246', 'Colombia'),
(93, 22, 'Calle 10 18 75', 'Lebanon', 'MO', '65536', 'Colombia'),
(94, 23, 'Clle 163 28 60', 'Kobenhavn', 'MO', '2100', 'Colombia'),
(95, 24, '4800 Sand Point Way NE', 'Houston', 'TX', '77030', 'USA'),
(96, 25, 'Dept. of Toys', 'IowaCity', 'IA', '52246', 'USA'),
(97, 26, '1400 Pelham Parkway', 'Lebanon', 'MO', '65536', 'USA'),
(98, 27, 'Stuttgarter Str. 74', 'Kobenhavn', 'Kobenhavn', '2100', 'Germany'),
(99, 28, 'Toy Depart', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(100, 29, 'Calle 78B 69 240', 'Houston', 'TX', '77030', 'Colombia'),
(101, 30, '511 Jochemus Street', 'IowaCity', 'IA', '52246', 'South Africa'),
(102, 31, '9000 W Wisconsin Ave', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(103, 32, 'University', 'Reykjavik', 'TX', '5420', 'Malaysia'),
(104, 33, '267 Grant St', 'Houston', 'TX', '77030', 'USA'),
(105, 34, 'Departamento Barros Luco', 'IowaCity', 'IA', '52246', 'Chile'),
(106, 35, '2222 Cherry St 2900', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(107, 36, '22 Pine Avenue 4th Flr', 'Houston', 'TX', '77030', 'South Africa'),
(108, 37, '4440 W 95th Street  185w', 'IowaCity', 'IA', '52246', 'USA'),
(109, 38, '593 Eddy St', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(110, 1, '108 NE 1st St', 'Hoboken', 'NJ', '07030', 'USA'),
(111, 2, '800 St Marys Blvd', 'IowaCity', 'IA', '52246', 'USA'),
(112, 3, '77 Warren Street', 'Lebanon', 'MO', '65536', 'USA'),
(113, 4, 'Strandboulevarden 49', 'Kobenhavn', 'Kobenhavn', '2100', 'Denmark'),
(114, 5, 'Skogarhlid 8', 'Reykjavik', 'Reykjavik', '5420', 'Iceland'),
(115, 6, '6621 Fannin St', 'Houston', 'TX', '77030', 'Sweden'),
(116, 7, 'Calle 10  18-75', 'IowaCity', 'IA', '52246', 'Colombia'),
(117, 8, 'Clle 163  28-60', 'Lebanon', 'MO', '65536', 'Colombia'),
(118, 9, '8140 N Mopac Bldg. 3 Suite 120', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(119, 10, '1300 Badger St', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(120, 11, 'Jalan Pahang', 'Houston', 'TX', '77030', 'Malaysia'),
(121, 12, 'Insurgentes Sur 3700C', 'IowaCity', 'IA', '52246', 'Mexico'),
(122, 13, 'Avenida Professor Egas Moniz', 'Lebanon', 'MO', '65536', 'Portugal'),
(123, 14, 'Estrada IC 19', 'Kobenhavn', 'Kobenhavn', '2100', 'Portugal'),
(124, 15, '2401 Gilham Road', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(125, 16, '593 Eddy St', 'Houston', 'TX', '77030', 'USA'),
(126, 17, 'General Audits', 'IowaCity', 'IA', '52246', 'USA'),
(127, 18, 'Dept of Parts', 'Lebanon', 'MO', '65536', 'USA'),
(128, 19, '6071 West Outer Drive', 'Kobenhavn', 'MO', '2100', 'USA'),
(129, 20, 'Largo', 'Houston', 'TX', '77030', 'Portugal'),
(130, 21, 'Calle 51 45 93', 'IowaCity', 'IA', '52246', 'Colombia'),
(131, 22, 'Calle 10 18 75', 'Lebanon', 'MO', '65536', 'Colombia'),
(132, 23, 'Clle 163 28 60', 'Kobenhavn', 'MO', '2100', 'Colombia'),
(133, 24, '4800 Sand Point Way NE', 'Houston', 'TX', '77030', 'USA'),
(134, 25, 'Dept. of Toys', 'IowaCity', 'IA', '52246', 'USA'),
(135, 26, '1400 Pelham Parkway', 'Lebanon', 'MO', '65536', 'USA'),
(136, 27, 'Stuttgarter Str. 74', 'Kobenhavn', 'Kobenhavn', '2100', 'Germany'),
(137, 28, 'Toy Depart', 'Reykjavik', 'Reykjavik', '5420', 'USA'),
(138, 29, 'Calle 78B 69 240', 'Houston', 'TX', '77030', 'Colombia'),
(139, 30, '511 Jochemus Street', 'IowaCity', 'IA', '52246', 'South Africa'),
(140, 31, '9000 W Wisconsin Ave', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(141, 32, 'University', 'Reykjavik', 'TX', '5420', 'Malaysia'),
(142, 33, '267 Grant St', 'Houston', 'TX', '77030', 'USA'),
(143, 34, 'Departamento Barros Luco', 'IowaCity', 'IA', '52246', 'Chile'),
(144, 35, '2222 Cherry St 2900', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(145, 36, '22 Pine Avenue 4th Flr', 'Houston', 'TX', '77030', 'South Africa'),
(146, 37, '4440 W 95th Street  185w', 'IowaCity', 'IA', '52246', 'USA'),
(147, 38, '593 Eddy St', 'Kobenhavn', 'Kobenhavn', '2100', 'USA'),
(148, 39, '1240 S Cedar Crest Blvd', 'Reykjavik', 'IA', '5420', 'USA'),
(149, 40, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(150, 41, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(151, 42, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(152, 43, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(154, 45, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(155, 46, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(156, 47, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(157, 48, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(158, 49, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(159, 50, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(160, 51, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(161, 52, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(162, 53, '294 Jeffeson ST', 'Jersey city', 'NJ', '07030', 'United States'),
(163, 54, '658 washington ST', 'NY', 'NY', '12312', 'USA'),
(164, 55, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(165, 56, 'wang', 'hoboken', 'Newjersey', '07030', 'UnitedStates'),
(166, 57, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(167, 58, '', '', '', '', ''),
(168, 59, 'wang', 'hoboken', 'NJ', '07030', 'usa'),
(169, 60, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(170, 61, '715 willow ave', 'hoboken', 'NJ', '07030', 'United States'),
(171, 62, '', '', '', '', ''),
(172, 64, '', '', '', '', ''),
(173, 65, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(174, 66, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(175, 67, 'wang', 'hoboken', 'New jersey', '07030', 'United States'),
(176, 69, '715 willow ave', 'hoboken', 'NJ', '07030', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_Mapping_Tbl`
--

CREATE TABLE `EVENT_Mapping_Tbl` (
  `idEVTMAP_Tbl` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `SRC_PROFILE_ID` int(11) NOT NULL,
  `JVA_EVT_ID` varchar(50) NOT NULL,
  `EVT_ID` varchar(50) NOT NULL,
  `CREATE_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idEVTMAP_Tbl`),
  KEY `event_mapping_tbl_ibfk_1` (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=332 ;

--
-- Dumping data for table `EVENT_Mapping_Tbl`
--

INSERT INTO `EVENT_Mapping_Tbl` (`idEVTMAP_Tbl`, `SRC_ID`, `SRC_PROFILE_ID`, `JVA_EVT_ID`, `EVT_ID`, `CREATE_DATE`) VALUES
(1, 1, 0, 'JVA_DT_17', 'EVT_54', '2014-12-10 02:56:30'),
(2, 1, 1, 'JVA_DT_80', 'EVT_90', '2014-12-10 02:56:30'),
(3, 1, 2, 'JVA_DT_52', 'EVT_81', '2014-12-10 02:56:30'),
(4, 1, 3, 'JVA_DT_66', 'EVT_14', '2014-12-10 02:56:30'),
(5, 1, 4, 'JVA_DT_77', 'EVT_23', '2014-12-10 02:56:30'),
(6, 1, 5, 'JVA_DT_47', 'EVT_58', '2014-12-10 02:56:30'),
(7, 1, 6, 'JVA_DT_71', 'EVT_46', '2014-12-10 02:56:30'),
(8, 1, 7, 'JVA_DT_42', 'EVT_30', '2014-12-10 02:56:30'),
(113, 4, 0, 'JVA_DT_47', 'EVT_80', '2014-12-11 09:06:00'),
(114, 4, 1, 'JVA_DT_24', 'EVT_49', '2014-12-11 09:06:00'),
(115, 4, 2, 'JVA_DT_42', 'EVT_73', '2014-12-11 09:06:00'),
(116, 4, 3, 'JVA_DT_42', 'EVT_18', '2014-12-11 09:06:00'),
(117, 4, 4, 'JVA_DT_67', 'EVT_68', '2014-12-11 09:06:00'),
(118, 4, 5, 'JVA_DT_20', 'EVT_12', '2014-12-11 09:06:00'),
(119, 4, 6, 'JVA_DT_63', 'EVT_39', '2014-12-11 09:06:00'),
(120, 4, 7, 'JVA_DT_66', 'EVT_86', '2014-12-11 09:06:00'),
(297, 5, 0, 'JVA_DT_603', 'EVT_471', '2014-12-12 01:42:40'),
(298, 5, 1, 'JVA_DT_80', 'EVT_490', '2014-12-12 01:42:40'),
(299, 5, 2, 'JVA_DT_640', 'EVT_299', '2014-12-12 01:42:40'),
(300, 5, 3, 'JVA_DT_522', 'EVT_957', '2014-12-12 01:42:40'),
(301, 5, 4, 'JVA_DT_47', 'EVT_264', '2014-12-12 01:42:40'),
(302, 11, 0, 'JVA_DT_17', 'EVT_450', '2014-12-13 01:15:49'),
(303, 11, 1, 'JVA_DT_52', 'EVT_970', '2014-12-13 01:15:49'),
(304, 11, 2, 'JVA_DT_42', 'EVT_364', '2014-12-13 01:15:49'),
(305, 11, 3, 'JVA_DT_640', 'EVT_662', '2014-12-13 01:15:49'),
(306, 12, 0, 'JVA_DT_47', 'EVT_440', '2014-12-13 01:19:07'),
(307, 12, 1, 'JVA_DT_603', 'EVT_538', '2014-12-13 01:19:07'),
(308, 12, 2, 'JVA_DT_47', 'EVT_4', '2014-12-13 01:19:07'),
(309, 12, 3, 'JVA_DT_47', 'EVT_516', '2014-12-13 01:19:07'),
(310, 13, 0, 'JVA_DT_140', 'EVT_508', '2014-12-13 01:23:54'),
(311, 13, 1, 'JVA_DT_71', 'EVT_126', '2014-12-13 01:23:54'),
(312, 13, 2, 'JVA_DT_954', 'EVT_692', '2014-12-13 01:23:54'),
(313, 16, 0, 'JVA_DT_92', 'EVT_263', '2014-12-13 03:15:08'),
(314, 16, 1, 'JVA_DT_821', 'EVT_973', '2014-12-13 03:15:08'),
(315, 16, 2, 'JVA_DT_80', 'EVT_553', '2014-12-13 03:15:08'),
(328, 22, 0, 'JVA_DT_42', 'EVT_822', '2014-12-16 03:05:47'),
(329, 22, 1, 'JVA_DT_184', 'EVT_677', '2014-12-16 03:05:47'),
(330, 25, 0, 'JVA_DT_861', 'EVT_89', '2014-12-17 09:29:22'),
(331, 26, 0, 'JVA_DT_17', 'EVT_132', '2014-12-18 03:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `EVENT_Tbl`
--

CREATE TABLE `EVENT_Tbl` (
  `idEVT_Tbl` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `SRC_PROFILE_ID` int(11) NOT NULL,
  `CampaignType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Subtype` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EVT_ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EVT_LEVEL` int(11) NOT NULL,
  `EVT_NAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `EVT_StartDate` date NOT NULL,
  `EVT_EndDate` date NOT NULL,
  `EVT_DESC` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idEVT_Tbl`),
  KEY `SRC_ID` (`SRC_ID`),
  KEY `SRC_PROFILE_ID` (`SRC_PROFILE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=340 ;

--
-- Dumping data for table `EVENT_Tbl`
--

INSERT INTO `EVENT_Tbl` (`idEVT_Tbl`, `SRC_ID`, `CustomerId`, `SRC_PROFILE_ID`, `CampaignType`, `Subtype`, `EVT_ID`, `EVT_LEVEL`, `EVT_NAME`, `EVT_StartDate`, `EVT_EndDate`, `EVT_DESC`) VALUES
(1, 1, 1, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(2, 1, 1, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-04-12', '0000-00-00', 'Ski'),
(3, 1, 1, 6, 'Electronics', 'Wearables', 'EVT_46', 0, 'Baseball', '2004-10-05', '2005-03-01', 'Base'),
(4, 1, 1, 7, 'Electronics', 'Wearables', 'EVT_30', 0, 'Soccer', '2005-03-01', '0000-00-00', 'Soccer'),
(5, 1, 2, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(6, 1, 2, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-04-12', '0000-00-00', 'Ski'),
(7, 1, 2, 6, 'Electronics', 'Wearables', 'EVT_46', 0, 'Baseball', '2004-10-13', '2004-12-21', 'Base'),
(8, 1, 2, 7, 'Electronics', 'Wearables', 'EVT_30', 0, 'Soccer', '2004-12-21', '0000-00-00', 'Soccer'),
(9, 1, 3, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(10, 1, 3, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-04-12', '0000-00-00', 'Ski'),
(11, 1, 3, 6, 'Electronics', 'Wearables', 'EVT_46', 0, 'Baseball', '2004-10-19', '2004-11-29', 'Base'),
(12, 1, 3, 7, 'Electronics', 'Wearables', 'EVT_30', 0, 'Soccer', '2004-11-29', '0000-00-00', 'Soccer'),
(13, 1, 4, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(14, 1, 4, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-04-12', '0000-00-00', 'Ski'),
(15, 1, 5, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(16, 1, 5, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-04-12', '0000-00-00', 'Ski'),
(17, 1, 5, 4, 'Electronics', 'Wearables', 'EVT_23', 0, 'Skateboarding', '2004-09-10', '2004-10-27', 'Skate'),
(18, 1, 5, 5, 'Electronics', 'Wearables', 'EVT_58', 0, 'Jumping', '2004-10-27', '0000-00-00', 'Jump'),
(19, 1, 6, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(20, 1, 6, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-04-12', '0000-00-00', 'Ski'),
(21, 1, 6, 4, 'Electronics', 'Wearables', 'EVT_23', 0, 'Skateboarding', '2004-09-14', '2004-11-24', 'Skate'),
(22, 1, 6, 5, 'Electronics', 'Wearables', 'EVT_58', 0, 'Jumping', '2004-11-24', '0000-00-00', 'Jump'),
(23, 1, 7, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '2004-07-30', 'Swim'),
(24, 1, 7, 1, 'Electronics', 'Wearables', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(25, 1, 7, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(26, 1, 7, 3, 'Electronics', 'Wearables', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(27, 1, 7, 4, 'Electronics', 'Wearables', 'EVT_23', 0, 'Skateboarding', '2005-05-25', '2005-06-10', 'Skate'),
(28, 1, 7, 5, 'Electronics', 'Wearables', 'EVT_58', 0, 'Jumping', '2005-06-10', '2005-08-27', 'Jump'),
(29, 1, 7, 6, 'Electronics', 'Wearables', 'EVT_46', 0, 'Baseball', '2005-08-27', '2005-09-06', 'Base'),
(30, 1, 7, 7, 'Electronics', 'Wearables', 'EVT_30', 0, 'Soccer', '2005-09-06', '0000-00-00', 'Soccer'),
(31, 1, 8, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '2004-07-30', 'Swim'),
(32, 1, 8, 1, 'Electronics', 'Wearables', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(33, 1, 8, 2, 'Electronics', 'Wearables', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(34, 1, 8, 3, 'Electronics', 'Wearables', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(35, 1, 8, 4, 'Electronics', 'Wearables', 'EVT_23', 0, 'Skateboarding', '2005-06-24', '2005-07-19', 'Skate'),
(36, 1, 8, 5, 'Electronics', 'Wearables', 'EVT_58', 0, 'Jumping', '2005-07-19', '0000-00-00', 'Jump'),
(37, 1, 9, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(38, 1, 9, 5, 'Electronics', 'Wearables', 'EVT_58', 0, 'Jumping', '2004-12-06', '2005-01-11', 'Jump'),
(39, 1, 9, 6, 'Electronics', 'Wearables', 'EVT_46', 0, 'Baseball', '2005-01-11', '2005-09-14', 'Base'),
(40, 1, 9, 7, 'Electronics', 'Wearables', 'EVT_30', 0, 'Soccer', '2005-09-14', '0000-00-00', 'Soccer'),
(41, 1, 10, 0, 'Electronics', 'Wearables', 'EVT_54', 0, 'Swimming', '2004-08-24', '0000-00-00', 'Swim'),
(42, 1, 10, 5, 'Electronics', 'Wearables', 'EVT_58', 0, 'Jumping', '2005-01-12', '2005-02-16', 'Jump'),
(43, 1, 10, 6, 'Electronics', 'Wearables', 'EVT_46', 0, 'Baseball', '2005-02-16', '2006-05-25', 'Base'),
(44, 1, 10, 7, 'Electronics', 'Wearables', 'EVT_30', 0, 'Soccer', '2006-05-25', '0000-00-00', 'Soccer'),
(45, 1, 11, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(46, 1, 11, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(47, 1, 11, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(48, 1, 11, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(49, 1, 11, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2004-10-25', '2005-07-06', 'Base'),
(50, 1, 11, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-07-06', '0000-00-00', 'Soccer'),
(51, 1, 12, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(52, 1, 12, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(53, 1, 12, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(54, 1, 12, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(55, 1, 12, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2004-09-10', '2004-10-18', 'Skate'),
(56, 1, 12, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-18', '2004-12-02', 'Jump'),
(57, 1, 12, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2004-12-02', '2005-05-11', 'Base'),
(58, 1, 12, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-05-11', '0000-00-00', 'Soccer'),
(59, 1, 13, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(60, 1, 13, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(61, 1, 13, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(62, 1, 13, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(63, 1, 13, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2004-09-16', '2005-06-10', 'Skate'),
(64, 1, 13, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-07', '2005-08-27', 'Jump'),
(65, 1, 13, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-01-13', '2005-09-06', 'Base'),
(66, 1, 13, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-04-18', '0000-00-00', 'Soccer'),
(67, 1, 14, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(68, 1, 14, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(69, 1, 14, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(70, 1, 14, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(71, 1, 14, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2004-10-11', '2004-10-12', 'Skate'),
(72, 1, 14, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-12', '2005-01-01', 'Jump'),
(73, 1, 14, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-01-01', '2005-06-29', 'Base'),
(74, 1, 14, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-06-29', '0000-00-00', 'Soccer'),
(75, 1, 15, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(76, 1, 15, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(77, 1, 15, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(78, 1, 15, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(79, 1, 15, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-29', '2005-01-04', 'Jump'),
(80, 1, 15, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-01-04', '2005-03-21', 'Base'),
(81, 1, 15, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-21', '0000-00-00', 'Soccer'),
(82, 1, 16, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(83, 1, 16, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(84, 1, 16, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(85, 1, 16, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(86, 1, 16, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-09-15', '2004-11-29', 'Jump'),
(87, 1, 16, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2004-11-29', '0000-00-00', 'Base'),
(88, 1, 1, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(89, 1, 1, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(90, 1, 1, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(91, 1, 1, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(92, 1, 1, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-03-15', '2005-03-15', 'Base'),
(93, 1, 1, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-15', '0000-00-00', 'Soccer'),
(94, 1, 17, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(95, 1, 17, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(96, 1, 17, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(97, 1, 17, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(98, 1, 17, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-11-19', '2004-12-03', 'Jump'),
(99, 1, 17, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2004-12-03', '2005-03-28', 'Base'),
(100, 1, 17, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-28', '0000-00-00', 'Soccer'),
(101, 1, 18, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(102, 1, 18, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(103, 1, 18, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(104, 1, 18, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(105, 1, 18, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-11-18', '2004-12-08', 'Jump'),
(106, 1, 18, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2004-12-08', '2005-03-18', 'Base'),
(107, 1, 18, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-18', '0000-00-00', 'Soccer'),
(108, 1, 19, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(109, 1, 19, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(110, 1, 19, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(111, 1, 19, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(112, 1, 19, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-28', '2005-01-17', 'Jump'),
(113, 1, 19, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-01-17', '2005-03-19', 'Base'),
(114, 1, 19, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-19', '0000-00-00', 'Soccer'),
(115, 1, 20, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(116, 1, 20, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(117, 1, 20, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(118, 1, 20, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(119, 1, 20, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2004-10-25', '2004-11-15', 'Skate'),
(120, 1, 20, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-11-15', '2004-12-09', 'Jump'),
(121, 1, 20, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2004-12-09', '2005-03-06', 'Base'),
(122, 1, 20, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-06', '0000-00-00', 'Soccer'),
(123, 1, 21, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(124, 1, 21, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(125, 1, 21, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(126, 1, 21, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(127, 1, 21, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-05-11', '2005-07-07', 'Skate'),
(128, 1, 21, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-07-07', '2005-09-05', 'Jump'),
(129, 1, 21, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-09-05', '2005-09-09', 'Base'),
(130, 1, 21, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-09-09', '0000-00-00', 'Soccer'),
(131, 1, 22, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(132, 1, 22, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(133, 1, 22, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(134, 1, 22, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(135, 1, 22, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-05-25', '2005-06-10', 'Skate'),
(136, 1, 22, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-06-10', '2005-08-27', 'Jump'),
(137, 1, 22, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-08-27', '2005-09-06', 'Base'),
(138, 1, 22, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-09-06', '0000-00-00', 'Soccer'),
(139, 1, 23, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(140, 1, 23, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(141, 1, 23, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(142, 1, 23, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(143, 1, 23, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-06-24', '2005-07-19', 'Skate'),
(144, 1, 23, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-07-19', '0000-00-00', 'Jump'),
(145, 1, 19, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(146, 1, 19, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(147, 1, 19, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(148, 1, 19, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(149, 1, 19, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2006-01-17', '2006-04-27', 'Jump'),
(150, 1, 19, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2006-04-27', '2006-09-15', 'Base'),
(151, 1, 19, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2006-09-15', '0000-00-00', 'Soccer'),
(152, 1, 24, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(153, 1, 24, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(154, 1, 24, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(155, 1, 24, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(156, 1, 24, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2006-04-30', '2007-04-24', 'Base'),
(157, 1, 24, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-04-24', '0000-00-00', 'Soccer'),
(158, 1, 25, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(159, 1, 25, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(160, 1, 25, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(161, 1, 25, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(162, 1, 25, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2005-08-31', '2005-10-08', 'Jump'),
(163, 1, 25, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-10-08', '2007-04-16', 'Base'),
(164, 1, 25, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-04-16', '0000-00-00', 'Soccer'),
(165, 1, 26, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(166, 1, 26, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(167, 1, 26, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(168, 1, 26, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(169, 1, 26, 4, 'Toys', 'Action Figures', 'EVT_23', 0, 'Skateboarding', '2006-05-01', '2006-05-26', 'Skate'),
(170, 1, 26, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2006-05-26', '2006-09-06', 'Jump'),
(171, 1, 26, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2006-09-06', '2006-09-06', 'Base'),
(172, 1, 26, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2006-09-06', '0000-00-00', 'Soccer'),
(173, 1, 27, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(174, 1, 27, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(175, 1, 27, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(176, 1, 27, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(177, 1, 27, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2004-09-27', '2004-10-15', 'Skate'),
(178, 1, 27, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-15', '2005-03-03', 'Jump'),
(179, 1, 27, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-03-03', '2005-05-02', 'Base'),
(180, 1, 27, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-05-02', '0000-00-00', 'Soccer'),
(181, 1, 28, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(182, 1, 28, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(183, 1, 28, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(184, 1, 28, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(185, 1, 28, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2005-09-23', '2005-10-28', 'Jump'),
(186, 1, 28, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-10-28', '2007-04-24', 'Base'),
(187, 1, 28, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-04-24', '0000-00-00', 'Soccer'),
(188, 1, 29, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(189, 1, 29, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(190, 1, 29, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(191, 1, 29, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(192, 1, 29, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-07-15', '2005-07-19', 'Skate'),
(193, 1, 29, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-07-19', '2005-09-08', 'Jump'),
(194, 1, 29, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-09-08', '2005-09-08', 'Base'),
(195, 1, 29, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-09-08', '0000-00-00', 'Soccer'),
(196, 1, 30, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(197, 1, 30, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(198, 1, 30, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(199, 1, 30, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(200, 1, 30, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-04-12', '2005-05-19', 'Skate'),
(201, 1, 30, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-05-19', '2005-06-05', 'Jump'),
(202, 1, 30, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-06-05', '2005-09-14', 'Base'),
(203, 1, 30, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-09-14', '0000-00-00', 'Soccer'),
(204, 1, 1, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(205, 1, 1, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(206, 1, 1, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(207, 1, 1, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(208, 1, 1, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-11-21', '2006-10-18', 'Base'),
(209, 1, 1, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2006-10-18', '0000-00-00', 'Soccer'),
(210, 1, 31, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(211, 1, 31, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(212, 1, 31, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(213, 1, 31, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(214, 1, 31, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-11-06', '2007-04-30', 'Base'),
(215, 1, 31, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-04-30', '0000-00-00', 'Soccer'),
(216, 1, 32, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(217, 1, 32, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(218, 1, 32, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(219, 1, 32, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(220, 1, 32, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-03-04', '2005-03-16', 'Skate'),
(221, 1, 32, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-03-16', '2005-05-09', 'Jump'),
(222, 1, 32, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-05-09', '2005-08-15', 'Base'),
(223, 1, 32, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-08-15', '0000-00-00', 'Soccer'),
(224, 1, 6, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(225, 1, 6, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(226, 1, 6, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(227, 1, 6, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(228, 1, 6, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2004-09-27', '2004-10-15', 'Skate'),
(229, 1, 6, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2004-10-15', '2005-01-17', 'Jump'),
(230, 1, 6, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-01-17', '2005-03-25', 'Base'),
(231, 1, 6, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-03-25', '0000-00-00', 'Soccer'),
(232, 1, 6, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(233, 1, 6, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(234, 1, 6, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(235, 1, 6, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(236, 1, 6, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2006-04-16', '2006-11-14', 'Base'),
(237, 1, 6, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2006-11-14', '0000-00-00', 'Soccer'),
(238, 1, 33, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(239, 1, 33, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(240, 1, 33, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(241, 1, 33, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(242, 1, 33, 4, 'Toys', 'Action Figures', 'EVT_23', 0, 'Skateboarding', '2005-08-23', '2005-09-01', 'Skate'),
(243, 1, 33, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2005-09-01', '2005-11-02', 'Jump'),
(244, 1, 33, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-11-02', '2007-01-25', 'Base'),
(245, 1, 33, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-01-25', '0000-00-00', 'Soccer'),
(246, 1, 34, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(247, 1, 34, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(248, 1, 34, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(249, 1, 34, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(250, 1, 34, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-05-03', '2005-06-07', 'Skate'),
(251, 1, 34, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-06-07', '2005-07-19', 'Jump'),
(252, 1, 34, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-07-19', '2005-09-08', 'Base'),
(253, 1, 34, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-09-08', '0000-00-00', 'Soccer'),
(254, 1, 35, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(255, 1, 35, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(256, 1, 35, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(257, 1, 35, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(258, 1, 35, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2006-09-25', '2006-11-08', 'Base'),
(259, 1, 35, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2006-11-08', '0000-00-00', 'Soccer'),
(260, 1, 36, 0, 'Automotive', 'GPS', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(261, 1, 36, 1, 'Automotive', 'GPS', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(262, 1, 36, 2, 'Automotive', 'GPS', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(263, 1, 36, 3, 'Automotive', 'GPS', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(264, 1, 36, 4, 'Automotive', 'GPS', 'EVT_23', 0, 'Skateboarding', '2005-04-12', '2005-05-19', 'Skate'),
(265, 1, 36, 5, 'Automotive', 'GPS', 'EVT_58', 0, 'Jumping', '2005-05-19', '2005-05-28', 'Jump'),
(266, 1, 36, 6, 'Automotive', 'GPS', 'EVT_46', 0, 'Baseball', '2005-05-28', '2005-08-15', 'Base'),
(267, 1, 36, 7, 'Automotive', 'GPS', 'EVT_30', 0, 'Soccer', '2005-08-15', '0000-00-00', 'Soccer'),
(268, 1, 37, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2004-07-30', '2004-07-30', 'Swim'),
(269, 1, 37, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2004-07-30', '2005-09-27', 'Dive'),
(270, 1, 37, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2005-09-27', '2005-12-31', 'Ski'),
(271, 1, 37, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2005-12-31', '0000-00-00', 'Run'),
(272, 1, 37, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2006-12-12', '2007-02-23', 'Jump'),
(273, 1, 37, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2007-02-23', '2007-04-25', 'Base'),
(274, 1, 37, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-04-25', '0000-00-00', 'Soccer'),
(275, 1, 38, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(276, 1, 38, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(277, 1, 38, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(278, 1, 38, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(279, 1, 38, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2005-09-14', '2005-11-07', 'Jump'),
(280, 1, 38, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-11-07', '2007-03-30', 'Base'),
(281, 1, 38, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-03-30', '0000-00-00', 'Soccer'),
(282, 1, 39, 0, 'Toys', 'Action Figures', 'EVT_54', 0, 'Swimming', '2005-06-27', '2005-06-27', 'Swim'),
(283, 1, 39, 1, 'Toys', 'Action Figures', 'EVT_90', 0, 'Diving', '2005-06-27', '2006-11-08', 'Dive'),
(284, 1, 39, 2, 'Toys', 'Action Figures', 'EVT_81', 0, 'Skiing', '2006-11-08', '2006-12-31', 'Ski'),
(285, 1, 39, 3, 'Toys', 'Action Figures', 'EVT_14', 0, 'Running', '2006-12-31', '0000-00-00', 'Run'),
(286, 1, 39, 4, 'Toys', 'Action Figures', 'EVT_23', 0, 'Skateboarding', '2005-09-13', '2005-09-13', 'Skate'),
(287, 1, 39, 5, 'Toys', 'Action Figures', 'EVT_58', 0, 'Jumping', '2005-09-13', '2005-10-24', 'Jump'),
(288, 1, 39, 6, 'Toys', 'Action Figures', 'EVT_46', 0, 'Baseball', '2005-10-24', '2007-04-23', 'Base'),
(289, 1, 39, 7, 'Toys', 'Action Figures', 'EVT_30', 0, 'Soccer', '2007-04-23', '0000-00-00', 'Soccer'),
(298, 3, 41, 0, 'Electronics', 'Televisions', 'EVT_70', 0, 'Business Meeting', '2014-04-05', '0000-00-00', 'this is Buiness'),
(299, 4, 43, 0, 'Electronics', 'Televisions', 'EVT_80', 0, 'cdcds', '2014-04-05', '2014-07-23', 'This is cd'),
(300, 4, 43, 1, 'Electronics', 'Televisions', 'EVT_49', 0, 'qwqww', '2013-03-31', '2013-05-24', 'qW'),
(301, 4, 43, 2, 'Electronics', 'Televisions', 'EVT_73', 0, 'cdcd', '2012-06-30', '2012-07-31', 'cd'),
(302, 4, 43, 3, 'Electronics', 'Televisions', 'EVT_18', 0, 'cewww', '2012-08-23', '2012-09-21', 'CE'),
(303, 4, 43, 4, 'Electronics', 'Televisions', 'EVT_68', 0, 'vfvd', '2012-10-30', '2012-11-02', 'VF'),
(304, 4, 43, 5, 'Electronics', 'Televisions', 'EVT_12', 0, 'gerfwe', '2012-11-07', '2012-11-16', 'ge'),
(305, 4, 43, 6, 'Electronics', 'Televisions', 'EVT_39', 0, 'sdcew', '2012-11-30', '2012-12-03', 'sd'),
(306, 4, 43, 7, 'Electronics', 'Televisions', 'EVT_86', 0, 'sadqwqww', '2012-12-08', '2012-12-23', 'sa'),
(323, 5, 52, 0, 'Electronics', 'Televisions', 'EVT_471', 0, 'Interport', '2004-08-24', '2014-06-06', 'dws'),
(324, 5, 52, 1, 'Electronics', 'Televisions', 'EVT_490', 0, 'Stuipt', '2004-08-24', '2012-09-21', 'cxs'),
(325, 5, 52, 2, 'Electronics', 'Televisions', 'EVT_299', 0, 'WHIIII', '2005-04-12', '2015-05-23', 'bvd'),
(326, 5, 52, 3, 'Electronics', 'Televisions', 'EVT_957', 0, 'Stevnnn', '2004-08-24', '2012-07-31', 'cxs'),
(327, 5, 52, 4, 'Electronics', 'Televisions', 'EVT_264', 0, 'Pushing', '2014-04-05', '0000-00-00', 'vedc'),
(328, 13, 55, 0, 'Electronics', 'Wearables', 'EVT_508', 0, 'Flipping', '2004-08-24', '2012-09-21', 'this is fliping'),
(329, 13, 55, 1, 'Electronics', 'Wearables', 'EVT_126', 0, 'Checking', '2004-12-21', '2004-12-21', 'this is bo'),
(330, 13, 55, 2, 'Electronics', 'Wearables', 'EVT_692', 0, 'Ess', '2005-04-12', '2012-07-31', 'over'),
(331, 16, 60, 0, 'Electronics', 'Wearables', 'EVT_263', 0, 'Pentyy', '2005-04-12', '2014-06-06', 'This is Penty'),
(332, 16, 61, 0, 'Electronics', 'Wearables', 'EVT_263', 0, 'Pentyy', '2004-08-24', '2015-05-23', 'dhisada'),
(333, 16, 61, 1, 'Electronics', 'Wearables', 'EVT_973', 0, 'Jieucas', '2004-08-13', '2014-06-06', 'Jsadsa'),
(334, 16, 61, 2, 'Electronics', 'Wearables', 'EVT_553', 0, 'cdsdew', '2004-08-24', '2015-05-23', 'fdfds'),
(335, 22, 66, 0, 'Electronics', 'GPS', 'EVT_822', 0, 'bread', '0000-00-00', '0000-00-00', 'this is bread$^$##$'),
(336, 23, 67, 0, 'Electronics', 'GPS', 'EVT_822', 0, 'bread', '0000-00-00', '0000-00-00', ''),
(337, 23, 67, 1, 'Electronics', 'GPS', 'EVT_677', 0, 'cupcake', '0000-00-00', '0000-00-00', 'This is cupcake'),
(338, 25, 56, 0, 'Electronics', 'Wearables', 'EVT_822', 0, 'Sting', '2014-04-05', '2015-04-05', 'This is Sting'),
(339, 26, 69, 0, 'Electronics', 'Wearables', 'EVT_822', 0, 'bread', '2014-04-05', '2015-04-05', 'this is bread');

-- --------------------------------------------------------

--
-- Table structure for table `Process_CT_Tbl`
--

CREATE TABLE `Process_CT_Tbl` (
  `id_Process_CT` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `Process_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CycleTime_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Order_Id` int(11) NOT NULL,
  PRIMARY KEY (`id_Process_CT`),
  KEY `Process_CT_tbl_ibfk_1` (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Process_CT_Tbl`
--

INSERT INTO `Process_CT_Tbl` (`id_Process_CT`, `SRC_ID`, `Process_Name`, `CycleTime_Id`, `Order_Id`) VALUES
(1, 5, 'Map07', 'CPG04', 2),
(2, 5, 'Map07', 'CPG02', 3),
(3, 13, 'Map07', 'CPL01', 0),
(4, 13, 'Map07', 'CPL02', 1),
(5, 13, 'Map02', 'CPL01', 0),
(6, 16, 'Map95', 'Jpeaax', 0),
(7, 16, 'Map95', 'Kppd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Process_SET_Detail_Tbl`
--

CREATE TABLE `Process_SET_Detail_Tbl` (
  `id_Set` int(11) NOT NULL AUTO_INCREMENT,
  `Set_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Aggreator` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Option_Id` int(11) NOT NULL,
  PRIMARY KEY (`id_Set`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Process_SET_Detail_Tbl`
--

INSERT INTO `Process_SET_Detail_Tbl` (`id_Set`, `Set_Name`, `Aggreator`, `Option_Id`) VALUES
(1, 'Set01', 'Minimum', 1),
(2, 'Set01', 'Minimum', 2),
(3, 'Set03', 'Minimum', 1),
(4, 'Set03', 'Minimum', 2),
(5, 'Set09', 'Median', 1),
(6, 'Set09', 'Median', 2),
(7, 'Set09', 'Median', 1),
(8, 'Set09', 'Median', 2),
(9, 'Set06', 'Minimum', 1),
(10, 'Set06', 'Minimum', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Process_Set_Option_Tbl`
--

CREATE TABLE `Process_Set_Option_Tbl` (
  `Option_Id` int(11) NOT NULL,
  `Set_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Dependency` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CycleTime_Id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Option_Tbl` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Option_Tbl`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Process_Set_Option_Tbl`
--

INSERT INTO `Process_Set_Option_Tbl` (`Option_Id`, `Set_Name`, `Dependency`, `CycleTime_Id`, `Option_Tbl`) VALUES
(1, 'Set01', 'CPG02', 'CPG04:CPG01', 1),
(2, 'Set01', 'CPG01', ':CPG04:CPG03', 2),
(1, 'Set03', 'CPG02', 'CPG04', 3),
(2, 'Set03', 'CPG04', ':CPG02:CPG03', 4),
(1, 'Set09', 'CPL02', 'CPL01', 5),
(2, 'Set09', 'CPL01', 'CPL02', 6),
(1, 'Set09', 'CPL02', 'CPL01', 7),
(2, 'Set09', 'CPL01', 'CPL02', 8),
(1, 'Set06', 'Jpeaax', 'Kppd', 9),
(2, 'Set06', 'Kppd', 'Jpeaax', 10);

-- --------------------------------------------------------

--
-- Table structure for table `Process_SET_Tbl`
--

CREATE TABLE `Process_SET_Tbl` (
  `id_Process_Set` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `Process_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Set_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Order_Id` int(11) NOT NULL,
  PRIMARY KEY (`id_Process_Set`),
  KEY `Process_Set_tbl_ibfk_1` (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Process_SET_Tbl`
--

INSERT INTO `Process_SET_Tbl` (`id_Process_Set`, `SRC_ID`, `Process_Name`, `Set_Name`, `Order_Id`) VALUES
(1, 5, 'Map07', 'Set01', 0),
(2, 5, 'Map07', 'Set03', 1),
(3, 13, 'Map07', 'Set09', 2),
(4, 13, 'Map02', 'Set09', 1),
(5, 16, 'Map95', 'Set06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Process_Tbl`
--

CREATE TABLE `Process_Tbl` (
  `id_Process` int(11) NOT NULL AUTO_INCREMENT,
  `SRC_ID` int(11) NOT NULL,
  `SRC_Process_ID` int(11) NOT NULL,
  `Process_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Process`),
  KEY `Process_tbl_ibfk_1` (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `Process_Tbl`
--

INSERT INTO `Process_Tbl` (`id_Process`, `SRC_ID`, `SRC_Process_ID`, `Process_Name`, `CreatedDate`) VALUES
(1, 5, 44, 'Map07', '2014-12-12 10:50:17'),
(2, 13, 0, 'Map07', '2014-12-13 01:26:18'),
(3, 13, 1, 'Map02', '2014-12-13 01:28:21'),
(23, 16, 0, 'Map95', '2014-12-13 03:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `Source`
--

CREATE TABLE `Source` (
  `SRC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(50) NOT NULL,
  `ClientName` varchar(50) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `workphone` varchar(50) NOT NULL,
  PRIMARY KEY (`SRC_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Source`
--

INSERT INTO `Source` (`SRC_ID`, `UserName`, `Password`, `ClientName`, `Email`, `workphone`) VALUES
(1, 'ClientA', '65362d44fde85a07a7fbede4e53e0fcf', '', '707195586@qq.com', '201-981-8099'),
(3, 'ClientB', '65362d44fde85a07a7fbede4e53e0fcf', '', 'ywang5000@gmail.com', '201-981-8099'),
(4, 'ClientC', '65362d44fde85a07a7fbede4e53e0fcf', '', '707195586@qq.com', '201-981-8099'),
(5, 'ClientGG', '65362d44fde85a07a7fbede4e53e0fcf', '', '707195586@qq.com', '201-981-8099'),
(8, 'ClientD', '', '', 'ywang101@stevens.edu', '201-981-8099'),
(9, 'ying', '', '', 'ywang101@stevens.edu', '201-981-8099'),
(10, 'sean', '', '', 'ywang101@stevens.edu', '201-981-8099'),
(11, 'jason', '', '', 'jason@gmail.com', '123-323-4053'),
(12, 'Lucy', '', '', 'lucy@qq.com', '857-326-4781'),
(13, 'ppel', '', '', 'ywang101@stevens.edu', '201-981-8099'),
(14, 'wangyi', '', '', 'ywang101@stevens.edu', '123-323-4053'),
(15, 'asdad', '', '', '707195586@qq.com', '201-932-3321'),
(16, 'ClientHJ', '', '', '707195586@qq.com', '201-981-8099'),
(17, '', '', '', 'ywang101@stevens.edu', '2019818099'),
(18, 'ddele', '', '', 'ywang101@stevens.edu', '2019818099'),
(19, 'ddelexx', 'ac0d43c6ea6fd4d56563e206db26e60c', 'Name11063', 'ywang101@stevens.edu', '2019818099'),
(20, 'ddelexxxrf', 'ac0d43c6ea6fd4d56563e206db26e60c', 'Name11063xe', 'ywang101@stevens.edu', '2019818099'),
(21, 'ddelexxxrf', 'ac0d43c6ea6fd4d56563e206db26e60c', 'Name11063xe', 'ywang101@stevens.edu', '2019818099'),
(22, 'UserCamp', 'ac0d43c6ea6fd4d56563e206db26e60c', 'DJH', '707195586@qq.com', '2019818099'),
(23, 'fsdf', '', '', 'ywang101@stevens.edu', '201-981-8099'),
(24, 'Stevens05', 'b10431d2fe42d158891395c7f44e3d00', 'wangying', 'ywang101@stevens.edu', '201-981-8099'),
(25, 'wangyi066', 'ac0d43c6ea6fd4d56563e206db26e60c', 'Stevens', 'ywang101@stevens.edu', '201-981-8099'),
(26, 'UserCCC', 'ac0d43c6ea6fd4d56563e206db26e60c', 'pending', 'ywang101@stevens.edu', '201-981-8099');

-- --------------------------------------------------------

--
-- Table structure for table `System`
--

CREATE TABLE `System` (
  `LoginId` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Active` int(11) NOT NULL,
  `question` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`LoginId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `System`
--

INSERT INTO `System` (`LoginId`, `Username`, `Password`, `Email`, `Active`, `question`, `answer`) VALUES
(1, 'wangyi05', '65362d44fde85a07a7fbede4e53e0fcf', 'ywang5000@gmail.com', 0, '', ''),
(2, 'ywang05', '65362d44fde85a07a7fbede4e53e0fcf', 'ywang5000@gmail.com', 0, '', ''),
(3, 'admin6', 'd054ba171daf921f9bc00f09435d9f95', '707195586@qq.com', 0, '', ''),
(4, 'userP', 'b70ed495ccedf13a3f7223d792d2941b', '707195586@qq.com', 0, '', ''),
(5, 'usercz', '25f9e794323b453885f5181f1b624d0b', 'ywang5000@gmail.com', 0, '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `CT_Mapping_Tbl`
--
ALTER TABLE `CT_Mapping_Tbl`
  ADD CONSTRAINT `ct_mapping_tbl_ibfk_1` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`);

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_SRC` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`),
  ADD CONSTRAINT `Cutomer_SRC` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`);

--
-- Constraints for table `Customer_Address`
--
ALTER TABLE `Customer_Address`
  ADD CONSTRAINT `Customer_id` FOREIGN KEY (`CustomerId`) REFERENCES `Customer` (`Customer_Id`);

--
-- Constraints for table `EVENT_Mapping_Tbl`
--
ALTER TABLE `EVENT_Mapping_Tbl`
  ADD CONSTRAINT `event_mapping_tbl_ibfk_1` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`);

--
-- Constraints for table `EVENT_Tbl`
--
ALTER TABLE `EVENT_Tbl`
  ADD CONSTRAINT `event_tbl_ibfk_1` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_Id`);

--
-- Constraints for table `Process_CT_Tbl`
--
ALTER TABLE `Process_CT_Tbl`
  ADD CONSTRAINT `Process_CT_tbl_ibfk_1` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`);

--
-- Constraints for table `Process_SET_Tbl`
--
ALTER TABLE `Process_SET_Tbl`
  ADD CONSTRAINT `Process_Set_tbl_ibfk_1` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`);

--
-- Constraints for table `Process_Tbl`
--
ALTER TABLE `Process_Tbl`
  ADD CONSTRAINT `Process_tbl_ibfk_1` FOREIGN KEY (`SRC_ID`) REFERENCES `Source` (`SRC_ID`);
