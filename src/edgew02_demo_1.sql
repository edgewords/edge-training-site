-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2018 at 09:25 AM
-- Server version: 5.6.38-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edgew02_demo_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_users`
--

CREATE TABLE `access_users` (
  `user` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `pw` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT 'BLANK'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_users`
--

INSERT INTO `access_users` (`user`, `pw`) VALUES
('EwordsJbsM', '*1B1D4C050D7803DBF9FCC7099791F7FB3B07920B'),
('Ewords7Tlw', '*1B1D4C050D7803DBF9FCC7099791F7FB3B07920B'),
('EwordsRfv3', '*1B1D4C050D7803DBF9FCC7099791F7FB3B07920B'),
('EwordspOBB', '*1B1D4C050D7803DBF9FCC7099791F7FB3B07920B'),
('EwordsSrAX', '*1B1D4C050D7803DBF9FCC7099791F7FB3B07920B'),
('Marcus1', '*7883E24D822042F31C33E0E3BC09568AD5513F34'),
('tommillichamp', '*1B1D4C050D7803DBF9FCC7099791F7FB3B07920B'),
('tester1', '*668425423DB5193AF921380129F465A6425216D0'),
('tester2', '*337D90AA815113C121B6F05B5F57C63939D2888E'),
('harrymilli', '*83BA394EFD2D9C097EB7A99B3CE129187620646A'),
('millichamps', '*0DFC89BF84A9078912A4BC107996015BE387580D'),
('edgewords', '*90E67318968CBAEA9965E495B16B6ECA0BED8FB8'),
('raghu0509', '*6566889D753FBA606103C365A79AC8D2839F9C8B'),
('webdriver', '*90E67318968CBAEA9965E495B16B6ECA0BED8FB8'),
('testannette', '*1B170EC35E1D58A74D6A328011E5D6194D95E74A'),
('asdfghjkl', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B'),
('EdgewordsTom', '*90E67318968CBAEA9965E495B16B6ECA0BED8FB8');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `name` varchar(50) NOT NULL,
  `town` varchar(50) DEFAULT NULL,
  `house` varchar(50) DEFAULT NULL,
  `AL_1` varchar(50) DEFAULT NULL,
  `county` varchar(50) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `uname` varchar(15) NOT NULL,
  `pin` varchar(6) NOT NULL,
  `pw` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`name`, `town`, `house`, `AL_1`, `county`, `postcode`, `uname`, `pin`, `pw`) VALUES
('fred blogs', NULL, NULL, NULL, NULL, NULL, 'freddy123', '2345', '*81C5C15F77325990C332FAF962216938B7A95E9F'),
('Test R', NULL, NULL, NULL, NULL, NULL, 'testrobin', '3456', '*D32C80A8BEEC55BABD46661F73E9F656383889BD'),
('Test R', NULL, NULL, NULL, NULL, NULL, 'testr1', '3456', '*D32C80A8BEEC55BABD46661F73E9F656383889BD'),
('Test S', NULL, NULL, NULL, NULL, NULL, 'tests1', '4567', '*CC1BFDF956B9F154760B8CC7C77C951BAA1D258A'),
('Test A', NULL, NULL, NULL, NULL, NULL, 'testa1', '1234', '*2A6246F0EE883EEEB81B078C08600818B0F41841'),
('Test b', NULL, NULL, NULL, NULL, NULL, 'testb1', '2345', '*F9CB973AB23F5DE24A26FAD54884AFC22B51BD7D'),
('Test c', NULL, NULL, NULL, NULL, NULL, 'testc1', '1234', '*2A6246F0EE883EEEB81B078C08600818B0F41841'),
('Test e', NULL, NULL, NULL, NULL, NULL, 'teste1', '1234', '*2A6246F0EE883EEEB81B078C08600818B0F41841'),
('Test f', NULL, NULL, NULL, NULL, NULL, 'testf2', '2345', '*F9CB973AB23F5DE24A26FAD54884AFC22B51BD7D'),
('Test G', NULL, NULL, NULL, NULL, NULL, 'testg1', '5678', '*145A43914CBA5CA7F0268153318217934CFDECB2'),
('Test z', NULL, NULL, NULL, NULL, NULL, 'testz1', '5678', '*145A43914CBA5CA7F0268153318217934CFDECB2'),
('Test H', NULL, NULL, NULL, NULL, NULL, 'testh1', '4567', '*2A6246F0EE883EEEB81B078C08600818B0F41841'),
('Test I', NULL, NULL, NULL, NULL, NULL, 'testi1', '6789', '*7B958B260CBD189B64BD401007E3D93B98B8B8A6'),
('Test24', NULL, NULL, NULL, NULL, NULL, 'test24one', '1003', '*A035110BF04DA2FE5DD760249E0861C82D2190B9'),
('test25', NULL, NULL, NULL, NULL, NULL, 'test25two', '1004', '*95BB7DA027595B10CF72C70CAB2C701663DE6863'),
('Nick Gerritz', NULL, NULL, NULL, NULL, NULL, 'NickG123', '1234', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B'),
('bobby', NULL, NULL, NULL, NULL, NULL, 'bobjonesnew', '9999', '*0DFC89BF84A9078912A4BC107996015BE387580D'),
('rob picken', NULL, NULL, NULL, NULL, NULL, 'robpicken', '1234', '*A74323820DE94EEFE38BD379404327BEE2A3F779'),
('sue', NULL, NULL, NULL, NULL, NULL, 'suejones', '1234', '*0DFC89BF84A9078912A4BC107996015BE387580D'),
('bobjonesnewnew', NULL, NULL, NULL, NULL, NULL, 'bobjonesnewnew', '9999', '*0DFC89BF84A9078912A4BC107996015BE387580D'),
('John Doe', NULL, NULL, NULL, NULL, NULL, 'DoeJohn12', '1234', '*9BC79735D97DC88D0198CDE9D6DAA64933EF251F'),
('tom jones', NULL, NULL, NULL, NULL, NULL, 'tomjones3', '9999', '*90E67318968CBAEA9965E495B16B6ECA0BED8FB8'),
('ade', NULL, NULL, NULL, NULL, NULL, 'adessssss', '6788', '*7074BEF30F1CEB4EAD4A82075E2F30DD4E1544C0'),
('Raghu123', NULL, NULL, NULL, NULL, NULL, 'Raghu1234', '1111', '*6566889D753FBA606103C365A79AC8D2839F9C8B'),
('Raghu 1234', NULL, NULL, NULL, NULL, NULL, 'raghu12345', '1111', '*6566889D753FBA606103C365A79AC8D2839F9C8B'),
('Jim1234', NULL, NULL, NULL, NULL, NULL, 'jim1234', '1111', '*6566889D753FBA606103C365A79AC8D2839F9C8B'),
('owyn', NULL, NULL, NULL, NULL, NULL, 'owyndwight', '1234', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B'),
('abcd', 'adsfa', '34', 'asdf', 'adf', 'bn7 2yu', 'abcdefg', '123456', '*951011BE8419FA2562BBA4F04A03D7C125E4076F'),
('Tola', NULL, NULL, NULL, NULL, NULL, 'arsenalll', '1234', '*38D4C2250B41C18291323A912EC1A7F840792633'),
('Bimbo', NULL, NULL, NULL, NULL, NULL, 'liverpoollll', '123456', '*FFC7FA280977B6C739A8793660209840653E4E0E'),
('John', NULL, NULL, NULL, NULL, NULL, 'liverpool222', '123498', '*375CCAB365D924479B628C14A66F7FD70C94FBF4'),
('Gabriel', NULL, NULL, NULL, NULL, NULL, 'liverpool999', '188898', '*A0AC9845676D3DE3399C3F91442547B826F6B96D'),
('John', NULL, NULL, NULL, NULL, NULL, 'liverpool555', '188898', '*375CCAB365D924479B628C14A66F7FD70C94FBF4'),
('Boffh', NULL, NULL, NULL, NULL, NULL, 'liverpbbgg000', '14475', '*B30AE60E6E69097FFD1E8EC210F5F40D466F161E'),
('KKffh', NULL, NULL, NULL, NULL, NULL, 'livkkpbbgg000', '14475', '*B481A3A918972C2E73B5093DF5BCFD721D62FE27'),
('bob', NULL, NULL, NULL, NULL, NULL, 'bobjones', '1234', '*0DFC89BF84A9078912A4BC107996015BE387580D'),
('test', NULL, NULL, NULL, NULL, NULL, 'testowyn', '1234', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B'),
('Paul', NULL, NULL, NULL, NULL, NULL, 'PabloMoose', '1234', '*92730FC5917887C7AC5C4AA870453297EF32DD66'),
('tester', NULL, NULL, NULL, NULL, NULL, 'tester1', '1234', '*7EE969BBE0A3985C8BFF9FA65A06345C67FE434A'),
('tester', NULL, NULL, NULL, NULL, NULL, 'testerMay', '1234', '*7EE969BBE0A3985C8BFF9FA65A06345C67FE434A'),
('TestTest', NULL, NULL, NULL, NULL, NULL, 'TestTestTest', '1234', '*5995DA4FCA185D37F2A5C812A75D3DEC3042D2C8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_users`
--
ALTER TABLE `access_users`
  ADD UNIQUE KEY `user` (`user`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD UNIQUE KEY `uname` (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
