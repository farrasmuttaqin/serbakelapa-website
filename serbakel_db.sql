-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2019 at 05:50 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serbakel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(15) NOT NULL,
  `nama_lengkap` text,
  `username` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `pass`) VALUES
(3, 'Admin Serba Kelapa', 'serbakelapa', '348b875eb04ef2d02d411e4e4ee4518f'),
(4, 'farras', 'farras', '27b7597f25f85ef4a8c26443f7a0ebcf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id_contact` int(10) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id_contact`, `nama`, `email`, `subject`, `message`) VALUES
(2, 'a', 'serbakelapa@gmail.com', 'a', 'aaa'),
(3, '5c6ee204b92f9', 'stcroixguy@gmail.com', '', ''),
(4, '5c6ef659b29be', 'brenatm@gmail.com', '', ''),
(5, '5c6f427b3696a', 'constancedc9@gmail.com', '', ''),
(6, '5c6f4cf30effd', 'mudkipzmatt@aol.com', '', ''),
(7, '5c6ff55a49c97', 'oana_24_11@yahoo.com', '', ''),
(8, '5c7009dfc75e7', 'rmorenoseeds@gmail.com', '', ''),
(9, '5c7035c6f21ea', 'briami57@gmail.com', '', ''),
(10, '5c705d5a0b99e', 'carolyna849@gmail.com', '', ''),
(11, '5c7089c21c46a', 'dawng858@gmail.com', '', ''),
(12, '5c709bac17c47', 'roselinebaruch@gmail.com', '', ''),
(13, '5c70e8f393d52', 'lorena.m.lm29@gmail.com', '', ''),
(14, '5c7190e3cc4fb', 'thiiri.kimathi@gmail.com', '', ''),
(15, '5c72ee8c61332', 'dabouelh@gmail.com', '', ''),
(16, '5c7328827eccc', 'dbrito1987@yahoo.com', '', ''),
(17, '5c7371dd999b8', 'greenhausc@aol.com', '', ''),
(18, '5c73b780a7d76', 'rohit@teleasynet.com', '', ''),
(19, '5c73be972b1e3', 'haydengriffin200316@gmail.com', '', ''),
(20, '5c73db8a48f13', 'cyndiefinley4@gmail.com', '', ''),
(21, '5c7403ad98d75', 'jpschlep@gmail.com', '', ''),
(22, '5c74124057387', 'jwm3rd@yahoo.com', '', ''),
(23, '5c74356eeeb03', 'jwm3rd@yahoo.com', '', ''),
(24, '5c744d30554e8', 'istusa@aol.com', '', ''),
(25, '5c745b7517f45', 'kaczmarek25@yahoo.com', '', ''),
(26, '5c745fac98ba2', 'wjanwea@aol.com', '', ''),
(27, '5c74665bdcb35', 'michaelwsmith@fs.fed.us', '', ''),
(28, '5c746c37ee040', 'geigede@yahoo.com', '', ''),
(29, '5c74bae288160', 'jwm3rd@yahoo.com', '', ''),
(30, '5c74c86b71d15', 'jwm3rd@yahoo.com', '', ''),
(31, '5c7576699eb92', 'andrewdinhtk@gmail.com', '', ''),
(32, 'Winston', 'winreds773@thefirstpageplan.com', 'I like your site, quick question...', 'I just wondered if you\'ve planned any marketing yet for your site this new year.  I\'m self-employed achieving this for various businesses for a number of years now, I feed my family doing it so I won\'t complain.  I\'ve a means of getting immediate interested traffic and buyers to your website through social media marketing channels and email.  In addition to getting more likes, followers for all your social media accounts.  I have a brand new program that has just been completed that listens to all social mentions being made, if a certain word or phrase is detected, we instantly send back to them a message that they should visit your site.  We are able to use as much search terms as we want, 100\'s of targeted visits a day.  I can even assist you in making/updating your site, fix site errors add updates etc.  If you may want it. \r\n\r\nIn addition to that, I\'d also like to learn what your competitors have implimented that you havn\'t done yet and address those issues asap.  I\'d also like to make a video or two about your website and encourage them to rank high pretty quickly.  Lastly I have a sizable database of opt in customers which are thinking about what it is you do, so if you\'d prefer to expand your overall newsletter list i\'d like to know, I can enable you to get these records whenever you\'d like them. They\'d get you instant leads by supplying you with a set of people or businesses that are seeking what it really is you\'re offering. \r\n\r\nI use tools that a lot of individuals don\'t learn about or don\'t have the time to use for themselves and I wish to use them on your site. If your\'re to busy with current clients I understand, I was just wondering was all. I\'d like to know if you\'d like extra information or references, I have more than I know what to do with.\r\n\r\n\r\nWinston\r\n1.319.423.9473'),
(33, '5c758ffa376fb', 'blue_dragon1231@yahoo.com', '', ''),
(34, '5c75931729f59', 'mschottelkotte2@yahoo.com', '', ''),
(35, '5c75a7df4ae3c', 'bshell_2@yahoo.com', '', ''),
(36, '5c75ac13809cb', 'delichman@ismg.io', '', ''),
(37, '5c75af99c4674', 'paw504@aol.com', '', ''),
(38, '5c75b39b66559', 'darryllleiman24@aol.com', '', ''),
(39, '5c75b712cc76e', 'jwm3rd@yahoo.com', '', ''),
(40, '5c760cb83b208', 'kimninh@gmail.com', '', ''),
(41, '5c761a0830077', 'mripple2@gmail.com', '', ''),
(42, '5c763121e4650', 'zkrakovitz@gmail.com', '', ''),
(43, '5c76515923038', 'zkrakovitz@gmail.com', '', ''),
(44, '5c765b5355e04', 'zkrakovitz@gmail.com', '', ''),
(45, '5c7660646dd1e', 'mrskojak@aol.com', '', ''),
(46, '5c76a6db43abc', 'andrewdinhtk@gmail.com', '', ''),
(47, '5c76cf623c7b3', 'lukas.horlbeck@web.de', '', ''),
(48, '5c76e846bc809', 'alfredathomas@cox.net', '', ''),
(49, '5c771937aefac', 'rosaliesmail1@gmail.com', '', ''),
(50, '5c7756b360257', 'mrskojak@aol.com', '', ''),
(51, '5c77c83464dde', 'devonn_tradell@yahoo.com', '', ''),
(52, '5c7824c06b72f', 'paintpixy@yahoo.com', '', ''),
(53, '5c78343604bbf', 'snapier@malpractice4docs.com', '', ''),
(54, '5c7873f89b818', 'brandis727@aol.com', '', ''),
(55, '5c789571f36d9', 'zihaizi@gmail.com', '', ''),
(56, '5c789994be0f6', 'akapansat@yahoo.com', '', ''),
(57, '5c78ae6555b1e', 'marcusealfred@yahoo.com', '', ''),
(58, '5c78d0640c51f', 'devonn_tradell@yahoo.com', '', ''),
(59, '5c79500f8c885', 'bmkania3@yahoo.com', '', ''),
(60, '5c7969c904e8a', 'aneal41788@gmail.com', '', ''),
(61, '5c79719245350', 'bllyrussell@aol.com', '', ''),
(62, '5c79af0358a9d', 'miguelg72@icloud.com', '', ''),
(63, '5c79bc2ce51e3', 'karltinanoordam@shaw.ca', '', ''),
(64, '5c7a8dcb8df77', 'daparicci1@gmail.com', '', ''),
(65, '5c7b184021fc4', 'daparicci1@gmail.com', '', ''),
(66, '5c7c17d6d5962', 'mgjets12@gmail.com', '', ''),
(67, '5c7c26d870ec8', 'dgarate@aol.com', '', ''),
(68, '5c7c35c6483a1', 'slickman93@aol.com', '', ''),
(69, '5c7cbb70775d9', 'jrivlin15@gmail.com', '', ''),
(70, '5c7d04ac4ab85', 'bthomas220@gmail.com', '', ''),
(71, '5c7d1e2b444f4', 'shanonock@yahoo.com', '', ''),
(72, '5c7d55d9ea0c4', 'jcrugg@gmail.com', '', ''),
(73, '5c7d5f04d227c', 'maugugliaro@htk.com', '', ''),
(74, '5c7d6fe73709d', 'psflowers139@sbcglobal.net', '', ''),
(75, '5c7d784fcdbc8', 'nicoleruiz2323@gmail.com', '', ''),
(76, '5c7d8c3d7bf96', 'cthatcher@gmail.com', '', ''),
(77, '5c7d8d58d3589', 'mhalford_22@yahoo.com', '', ''),
(78, '5c7d939122bee', '807840742@qq.com', '', ''),
(79, '5c7da5dd7519b', 'sfrank2026@gmail.com', '', ''),
(80, '5c7da6af8ab66', 'donyuhas9@gmail.com', '', ''),
(81, '5c7db5b0685f1', 'jcrugg@gmail.com', '', ''),
(82, '5c7db8082d729', 'boxer2317@aol.com', '', ''),
(83, '5c7dc4b85add9', 'miguelg72@icloud.com', '', ''),
(84, '5c7dd1b5d5b0d', 'gmorg89@gmail.com', '', ''),
(85, '5c7dd893f038d', 'peter.dietz@grinding.com', '', ''),
(86, '5c7dee48ca1ab', 'bceasargib@aol.com', '', ''),
(87, '5c7e225873184', 'mizdeva@gmail.com', '', ''),
(88, '5c7e3d72b7225', 'lllarson@att.net', '', ''),
(89, '5c7e4005244df', 'stephanie.l.skipper@gmail.com', '', ''),
(90, '5c7e5fe748ca1', 'akapansat@yahoo.com', '', ''),
(91, '5c7e6d1840721', 'bludya72@gmail.com', '', ''),
(92, '5c7e7a44cfaef', 'akapansat@yahoo.com', '', ''),
(93, '5c7e7b48a005f', 'mgjets12@gmail.com', '', ''),
(94, '5c7e8cbcee45a', 'mrssarahhsieh@gmail.com', '', ''),
(95, '5c7e9a64331a4', 'owconslt@gmail.com', '', ''),
(96, '5c7e9ee28f90e', 'mrssarahhsieh@gmail.com', '', ''),
(97, '5c7ec06ab1034', 'drericks87@yahoo.com', '', ''),
(98, '5c7ec2ea0fbaf', 'infocentr.ro@gmail.com', '', ''),
(99, '5c7ed8a904854', 'antikfessler@aol.com', '', ''),
(100, '5c7ed8d8ca16e', 'peggyj@freenet.de', '', ''),
(101, '5c7f12022418b', 'jmm1190@aol.com', '', ''),
(102, '5c7fb24e883ea', 'ppelitservis@gmail.com', '', ''),
(103, '5c7fd1bba3957', 'tw111@aol.com', '', ''),
(104, '5c7ffccec2f29', 'kwood23001@yahoo.com', '', ''),
(105, '5c80200a4f567', 'hdeshazo2009@yahoo.com', '', ''),
(106, '5c8033bfd32e8', 'carolk0729@gmail.com', '', ''),
(107, '5c80407e55ac0', 'effoberman1@gmail.com', '', ''),
(108, '5c8044d9d004d', 'akloze@gmail.com', '', ''),
(109, '5c8061bae7078', 'jcallicoattej@aol.com', '', ''),
(110, '5c808c96226bb', 'jimrherder@aol.com', '', ''),
(111, '5c80983ff043a', 'bellealex@verizon.net', '', ''),
(112, '5c80a40241945', 'jjg0388@yahoo.com', '', ''),
(113, '5c80a53b3beb0', 'ap@griffittsohara.com', '', ''),
(114, '5c80c1dec5b24', 'carolk0729@gmail.com', '', ''),
(115, '5c80c1f54aaf7', 'yamilruiz16@gmail.com', '', ''),
(116, '5c80d6bce7697', 'jstreetman8@gmail.com', '', ''),
(117, '5c80e240c4915', 'hdeshazo2009@yahoo.com', '', ''),
(118, '5c80f7ebb573d', 'jjmeza54@gmail.com', '', ''),
(119, '5c81101896680', 'elive71@yahoo.com', '', ''),
(120, '5c8110798bd21', 'meavefoley@aol.com', '', ''),
(121, '5c811490629e8', 'yamilruiz16@gmail.com', '', ''),
(122, '5c811f27cd7f7', 'hdeshazo2009@yahoo.com', '', ''),
(123, '5c8130bd054c0', 'michaelhardie@sbcglobal.net', '', ''),
(124, '5c81379d66328', 'hdeshazo2009@yahoo.com', '', ''),
(125, '5c8142d352173', 'silverspringdentalcare@gmail.com', '', ''),
(126, '5c8144f1dc510', 'nathalie.pothier@gmail.com', '', ''),
(127, '5c814d6527f6b', 'boltassoc@aol.com', '', ''),
(128, '5c815624df0a7', 'mario@sommitafinancial.com', '', ''),
(129, '5c8159e667a98', 'noorabdi56@yahoo.com', '', ''),
(130, '5c8169c61d0f7', 'paulplain@gmail.com', '', ''),
(131, '5c8175486ed36', 'bplandscaping@sympatico.ca', '', ''),
(132, '5c81763161fe0', 'stu11445@gmail.com', '', ''),
(133, '5c81ad5ead9aa', 'derekjbedell@yahoo.com', '', ''),
(134, '5c81c1537946c', 'danielalbarian@yahoo.com', '', ''),
(135, '5c81d164a5d09', 'yamilruiz16@gmail.com', '', ''),
(136, '5c81dad73220b', 'cvhardscapes@yahoo.com', '', ''),
(137, '5c81e3814ee0e', 'first.dance.melbourne@gmail.com', '', ''),
(138, '5c81f3ae04c8c', 'paulplain@gmail.com', '', ''),
(139, '5c81fdb7002c1', 'roeser1984@aol.com', '', ''),
(140, '5c8204d9f3845', 'cdoremus@newh.net', '', ''),
(141, '5c822be4ecaa3', 'jlcrowley2@aol.com', '', ''),
(142, '5c823576cfbb6', 'paulplain@gmail.com', '', ''),
(143, '5c8252c33b9e1', 'yamilruiz16@gmail.com', '', ''),
(144, '5c825ef1d440b', 'ejwmonbilout@gmail.com', '', ''),
(145, '5c827ea24fd5a', 'joaoteixeira75@yahoo.com', '', ''),
(146, '5c82815f1ec02', 'yamilruiz16@gmail.com', '', ''),
(147, '5c82c96c3bacc', 'kgbeauty@yahoo.com', '', ''),
(148, '5c82d3ce1e85b', 'bigdaddie192@aol.com', '', ''),
(149, '5c83057d3b257', 'randy.kim926@gmail.com', '', ''),
(150, '5c83a3a1c60d3', 'kwhitham1@gmail.com', '', ''),
(151, '5c84856c5e101', 'terryward393@gmail.com', '', ''),
(152, '5c84b583b9f17', 'terryward393@gmail.com', '', ''),
(153, '5c85879684978', 'rawsonbari@gmail.com', '', ''),
(154, '5c85f9e5c2519', 'andrewkwin@gmail.com', '', ''),
(155, '5c85fd608aeb4', 'paulmdonovan@yahoo.com', '', ''),
(156, '5c8601730a408', 'tinamco@aol.com', '', ''),
(157, '5c86118479810', 'lovelyluna2019@gmail.com', '', ''),
(158, '5c8624942b846', 'rawsonbari@gmail.com', '', ''),
(159, '5c864a002d7a4', 'andrewkwin@gmail.com', '', ''),
(160, '5c865f137f731', 'ssjaskat@yahoo.com', '', ''),
(161, '5c8661ad28aa3', 'biancatavaresvip@gmail.com', '', ''),
(162, '5c8664c5b960b', 'andrewkwin@gmail.com', '', ''),
(163, '5c8676cd15943', 'leachpeach2012@gmail.com', '', ''),
(164, '5c86862e7db9d', 'elive71@yahoo.com', '', ''),
(165, '5c869458a6e38', 'hsaunders1323@gmail.com', '', ''),
(166, '5c86a21c37f62', 'andrewkwin@gmail.com', '', ''),
(167, '5c86be6334944', 'munishatwork79@gmail.com', '', ''),
(168, '5c86bf6354c8f', 'danielalbarian@gmail.com', '', ''),
(169, '5c86ec5fc91c7', 'krw4704@aol.com', '', ''),
(170, '5c86ef24b3428', 'mohsarlene@gmail.com', '', ''),
(171, '5c8720c385db8', 'danielalbarian@yahoo.com', '', ''),
(172, '5c8736742861f', 'helena.mastro@gmail.com', '', ''),
(173, '5c875872c144a', 'ap@griffittsohara.com', '', ''),
(174, '5c8760a5c98ec', 'juliakim90@hanmail.net', '', ''),
(175, '5c876275bfc8c', 'mercedesparjus143@gmail.com', '', ''),
(176, '5c876b59607d9', 'akariseattle@yahoo.com', '', ''),
(177, '5c87772ba8a9c', 'matthewrutski77@gmail.com', '', ''),
(178, '5c878ca4503a6', 'dville65@aol.com', '', ''),
(179, '5c879326098c8', 'rawsonbari@gmail.com', '', ''),
(180, '5c87dafdbe87c', 'ddenis.ai@gmail.com', '', ''),
(181, '5c880bbf002a5', 'trujillorafael@yahoo.com', '', ''),
(182, '5c8812d95601e', 'andrewkwin@gmail.com', '', ''),
(183, '5c881ecd55c04', 'durso@sig.com', '', ''),
(184, '5c882332ec742', 'peterparks@cox.net', '', ''),
(185, '5c8843bb18cc8', 'royallerkler123@gmail.com', '', ''),
(186, '5c884c6d11591', 'elive71@yahoo.com', '', ''),
(187, '5c88631e42448', 'searcyspcs@gmail.com', '', ''),
(188, '5c8880a062d93', 'rawsonbari@gmail.com', '', ''),
(189, '5c8895f87599e', 'lbhart77@gmail.com', '', ''),
(190, '5c889a20812a0', 'mohsarlene@gmail.com', '', ''),
(191, '5c88aac9e3767', 'kileygilley@yahoo.com', '', ''),
(192, '5c88e5441edc7', 'ksmithbuilder1@gmail.com', '', ''),
(193, '5c88f0b93d928', 'collincoakley@gmail.com', '', ''),
(194, '5c890af01e4a6', 'gwjwong@aol.com', '', ''),
(195, '5c8916acac7bb', 'grilldj@gmail.com', '', ''),
(196, '5c891b53c6a89', 'rwzehr@gmail.com', '', ''),
(197, '5c891cdb30976', 'mohsarlene@gmail.com', '', ''),
(198, '5c891f337c50b', 'phillips.rkhalil@gmail.com', '', ''),
(199, '5c894dd5c0c3a', 'sales@cornelishollander.com', '', ''),
(200, '5c8955f9380c0', 'usama.salik@gmail.com', '', ''),
(201, '5c89560e2cad6', 'louise.hodapp@gmail.com', '', ''),
(202, '5c8966820ec3b', 'elive71@yahoo.com', '', ''),
(203, '5c896cc40d468', 'hernan3280@gmail.com', '', ''),
(204, '5c89b0d121385', 'kmac12762@aol.com', '', ''),
(205, '5c89e2d5ed142', 'garymendez@aol.com', '', ''),
(206, '5c89ec080def6', 'synergyz.atl@gmail.com', '', ''),
(207, '5c8a184389c48', 'saravisconti.m@gmail.com', '', ''),
(208, '5c8a2a8d9ed72', 'matthewrutski77@gmail.com', '', ''),
(209, '5c8a65b870b00', 'jessedean05@yahoo.com', '', ''),
(210, '5c8a7b4a76ddc', 'kwhitham1@gmail.com', '', ''),
(211, '5c8a9b83e788e', 'ziv5r@yahoo.com', '', ''),
(212, '5c8ab4d27374e', 'spiel.1367@gmail.com', '', ''),
(213, '5c8ab6cb90a17', 'scarincic@aol.com', '', ''),
(214, '5c8aca2cf03f1', 'm.p.brancoveanu@gmail.com', '', ''),
(215, '5c8adb5ca3da8', 'gavinwong@uniquepl.biz', '', ''),
(216, '5c8b0be76c18b', 'wasserguy714@aol.com', '', ''),
(217, '5c8b3040b9eb4', 'ssmoss2003@gmail.com', '', ''),
(218, '5c8b54c2cfc09', 'ksmithbuilder1@gmail.com', '', ''),
(219, '5c8b6a40b7360', 'mikeyh3@gmail.com', '', ''),
(220, '5c8baef113e41', 'jagarlock@gmail.com', '', ''),
(221, '5c8be6e9b2aa3', 'louise.hodapp@gmail.com', '', ''),
(222, '5c8bec70ca4ad', 'johnsondk6@sfasu.edu', '', ''),
(223, '5c8c1575783a5', 'jandjbabb@aol.com', '', ''),
(224, '5c8c6e641800b', 'ncerikarn@carolina.rr.com', '', ''),
(225, '5c8c9366c559c', 'ddemaria@gmail.com', '', ''),
(226, '5c8d18be59c74', 'monicasborkar@yahoo.com', '', ''),
(227, 'serbakelapa.com', 'serbakelapa.com@domstates.su', 'serbakelapa.com', ''),
(228, '5c8d637d0fd23', 'tiffking_84@yahoo.com', '', ''),
(229, '5c8d84515a385', 'astonish621@gmail.com', '', ''),
(230, '5c8e50fb1f173', 'juarenze23@yahoo.com', '', ''),
(231, '5c8e92bf86cd7', 'jacq108@yahoo.com', '', ''),
(232, '5c8e9642d200d', 'ufcfighteredits@gmail.com', '', ''),
(233, '5c8e97dcb51a6', 'schuckcschuck@gmail.com', '', ''),
(234, '5c8eb0dd13336', 'ufcfighteredits@gmail.com', '', ''),
(235, '5c8ed57791cee', 'larrancel@gmail.com', '', ''),
(236, '5c8eee5086c61', 'hillarywieczorek@yahoo.com', '', ''),
(237, '5c8f045d82981', 'bfarragher88@gmail.com', '', ''),
(238, '5c8f260bd13d1', 'bobsimons@kc.rr.com', '', ''),
(239, '5c8f3abc8edff', 'detdk007@aol.com', '', ''),
(240, '5c8f499635c2a', 'jacobhopper@yahoo.com', '', ''),
(241, '5c8f8f84f3e41', 'jmcronander@yahoo.com', '', ''),
(242, '5c8f98b640c60', 'tserrao@aol.com', '', ''),
(243, '5c8fa05659573', 'bfarragher88@gmail.com', '', ''),
(244, '5c8fb56de67e6', 'tdula1@yahoo.com', '', ''),
(245, '5c8fba10da248', 'sibollc@gmail.com', '', ''),
(246, '5c8fc70594147', 'lauren2727@yahoo.com', '', ''),
(247, '5c8fc73f667b3', 'aliciajoyner@yahoo.com', '', ''),
(248, '5c8fc9ccb6061', 'cdsstack@comcast.net', '', ''),
(249, '5c8fd80eb3c6a', 'bcd@bodycircle.com', '', ''),
(250, '5c8fdb891d9d3', 'ada.gomez@gmail.com', '', ''),
(251, '5c8ffadbaac86', 'tasha56832000@yahoo.com', '', ''),
(252, '5c900095bc090', 'bettynut88@gmail.com', '', ''),
(253, '5c9001ba46302', 'wdempsey908@gmail.com', '', ''),
(254, '5c90340921c91', 'michaelamangini@yahoo.com', '', ''),
(255, '5c9057078cf6c', 'deepkyblueeyes@yahoo.com', '', ''),
(256, '5c906a226ca51', 'claywalkup13@gmail.com', '', ''),
(257, '5c906e9714f52', 'drewdoty1444@yahoo.com', '', ''),
(258, '5c907cdbe08a1', 'justlikehomefcc@gmail.com', '', ''),
(259, '5c9090c1a6614', 'klynn52@gmail.com', '', ''),
(260, '5c909b573ad76', 'krishnanstephanie@gmail.com', '', ''),
(261, '5c90b0d419f66', 'cmf7200@aol.com', '', ''),
(262, '5c90c67693c84', 'jjpoolspa@yahoo.com', '', ''),
(263, '5c90d707cedcf', '1964cid@gmail.com', '', ''),
(264, '5c90e5ce78623', 'gspike500022@gmail.com', '', ''),
(265, '5c90f48196743', 'chasetondonahoe@gmail.com', '', ''),
(266, '5c90fbf9629b7', 'josh.kaszuba@yahoo.com', '', ''),
(267, '5c9116d78643f', 'lopezcinthya058@gmail.com', '', ''),
(268, '5c91205c25443', 'michaelamangini@yahoo.com', '', ''),
(269, '5c913ab9bbe23', 'jalejandroguevara18@gmail.com', '', ''),
(270, '5c9148fdf1006', 'p5ggy@yahoo.com', '', ''),
(271, '5c916a359fa62', 'ahscott1963@aol.com', '', ''),
(272, '5c918842bcb60', 'furkan.kaan.ozgun123123@gmail.com', '', ''),
(273, '5c9197db8e36e', 'krishnanstephanie@gmail.com', '', ''),
(274, '5c91996103078', 'hpdp@aol.com', '', ''),
(275, '5c919a02f0d7f', 'kiranpatel15@yahoo.com', '', ''),
(276, '5c91b90414e3e', 'jthompson969@yahoo.com', '', ''),
(277, '5c91beeee6dea', 'kitoconnell@pobox.com', '', ''),
(278, '5c91d1d08879b', 'cdtribe55@gmail.com', '', ''),
(279, '5c91d2bdb78a0', 'jthompson969@yahoo.com', '', ''),
(280, '5c91eb02662f6', 'tim.mosca@yahoo.com', '', ''),
(281, '5c91fac7c3ef2', 'isaacchun11987@gmail.com', '', ''),
(282, '5c92517c56eb8', 'jorgeysalgado@yahoo.com', '', ''),
(283, '5c9269aa7d75a', 'tim.mosca@yahoo.com', '', ''),
(284, '5c928935e523a', 'jenniferliantonio@yahoo.com', '', ''),
(285, '5c92c3a8a0a19', 'jorgeysalgado@yahoo.com', '', ''),
(286, '5c92ce7463d69', 'bkgoldn@comcast.net', '', ''),
(287, '5c92d2c9e5c16', 'teach2two@yahoo.com', '', ''),
(288, '5c93097880364', 'jorgeysalgado@yahoo.com', '', ''),
(289, '5c9315959e4e7', 'gordonminier@gmail.com', '', ''),
(290, '5c935061bc840', 'josert95@gmail.com', '', ''),
(291, '5c936cf499d0c', 'markbfoster83@gmail.com', '', ''),
(292, '5c938b70e6e77', 'carody@bellsouth.net', '', ''),
(293, '5c93957565876', 'jenniferliantonio@yahoo.com', '', ''),
(294, '5c9395910aaaa', 'ljbecho@aol.com', '', ''),
(295, '5c9396b4b4944', 'christal@marineairinc.com', '', ''),
(296, '5c939df991357', 'strange_raspberry@yahoo.com', '', ''),
(297, '5c93a9856bcb9', 'medrano_perla@yahoo.com', '', ''),
(298, '5c93c453f2761', 'jhonnyprado93@yahoo.com', '', ''),
(299, '5c93c73a134d3', 'matt.mansfield90@yahoo.com', '', ''),
(300, '5c93d47330a16', 'ljohnso2559@yahoo.com', '', ''),
(301, '5c93e34d0884c', 'jsotiris@yahoo.com', '', ''),
(302, '5c93f24d8343a', 'carter4848@att.net', '', ''),
(303, '5c93fac4203d0', 'vcombs55@yahoo.com', '', ''),
(304, '5c946a3cdd20c', 'gitanazuk@gmail.com', '', ''),
(305, '5c9474db701a7', 'pixelgod51@yahoo.com', '', ''),
(306, '5c94929766503', 'karllazar34@gmail.com', '', ''),
(307, '5c95160d9df58', 'euro.business.net@gmail.com', '', ''),
(308, '5c951ba199a10', 'markbfoster83@gmail.com', '', ''),
(309, '5c95318db1bb1', 'jaychapin05@gmail.com', '', ''),
(310, '5c95517442109', 'kabopallets@yahoo.com', '', ''),
(311, 'serbakelapa.com', 'serbakelapa.com@domstates.su', 'serbakelapa.com', ''),
(312, 'serbakelapa.com', 'serbakelapa.com@domstates.su', 'serbakelapa.com', ''),
(313, 'Laurel Key', 'huntingtonbrimelow465@gmail.com', 'Laurel Key', NULL),
(314, 'serbakelapa.com', 'serbakelapa.com@domstat.su', 'serbakelapa.com', ''),
(315, 'serbakelapa.com', 'serbakelapa.com@domstat.su', 'serbakelapa.com', ''),
(316, 'serbakelapa.com', 'serbakelapa.com@domstat.su', 'serbakelapa.com', ''),
(317, 'Eric', 'eric@talkwithcustomer.com', 'It’s all about Perfect Timing', 'Hello serbakelapa.com,\r\n\r\nPeople ask, “why does TalkWithCustomer work so well?”\r\n\r\nIt’s simple.\r\n\r\nTalkWithCustomer enables you to connect with a prospective customer at EXACTLY the Perfect Time.\r\n\r\n- NOT one week, two weeks, three weeks after they’ve checked out your website serbakelapa.com.\r\n- NOT with a form letter style email that looks like it was written by a bot.\r\n- NOT with a robocall that could come at any time out of the blue.\r\n\r\nTalkWithCustomer connects you to that person within seconds of THEM asking to hear from YOU.\r\n\r\nThey kick off the conversation.\r\n\r\nThey take that first step.\r\n\r\nThey ask to hear from you regarding what you have to offer and how it can make their life better. \r\n\r\nAnd it happens almost immediately. In real time. While they’re still looking over your website serbakelapa.com, trying to make up their mind whether you are right for them.\r\n\r\nWhen you connect with them at that very moment it’s the ultimate in Perfect Timing – as one famous marketer put it, “you’re entering the conversation already going on in their mind.”\r\n\r\nYou can’t find a better opportunity than that.\r\n\r\nAnd you can’t find an easier way to seize that chance than TalkWithCustomer. \r\n\r\nCLICK HERE http://www.talkwithcustomer.com now to take a free, 14-day test drive and see what a difference “Perfect Timing” can make to your business.\r\n\r\nSincerely,\r\nEric\r\n\r\nPS:  If you’re wondering whether NOW is the perfect time to try TalkWithCustomer, ask yourself this:\r\n“Will doing what I’m already doing now produce up to 100X more leads?”\r\nBecause those are the kinds of results we know TalkWithCustomer can deliver.  \r\nIt shouldn’t even be a question, especially since it will cost you ZERO to give it a try. \r\nCLICK HERE http://www.talkwithcustomer.com to start your free 14-day test drive today.\r\n\r\nIf you\'d like to unsubscribe click here http://liveserveronline.com/talkwithcustomer.aspx?d=serbakelapa.com\r\n'),
(318, 'serbakelapa.com', 'serbakelapa.com@domstat.su', 'serbakelapa.com', ''),
(319, 'Aly Chiman', 'aly1@alychidesigns.com', 'Broken Links Update', 'Hello there, My name is Aly and I would like to know if you would have any interest to have your website here at serbakelapa.com  promoted as a resource on our blog alychidesign.com ?\r\n\r\n We are  updating our do-follow broken link resources to include current and up to date resources for our readers. If you may be interested in being included as a resource on our blog, please let me know.\r\n\r\n Thanks, Aly');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `nomor_invoice` int(30) DEFAULT NULL,
  `orderBiayaTotal` int(30) DEFAULT NULL,
  `orderBiayaPengiriman` int(30) DEFAULT NULL,
  `orderBeratKeranjang` float DEFAULT NULL,
  `orderDurasiPengiriman` varchar(100) DEFAULT NULL,
  `orderKurir` varchar(50) DEFAULT NULL,
  `orderPaketKurir` varchar(100) DEFAULT NULL,
  `orderProvinsi` varchar(100) DEFAULT NULL,
  `orderKota` varchar(100) DEFAULT NULL,
  `orderDetailAlamat` text,
  `orderBuktiTransaksi` varchar(150) DEFAULT NULL,
  `orderCatatan` text,
  `orderTanggalInvoice` varchar(100) DEFAULT NULL,
  `status_pengiriman_barang` varchar(100) DEFAULT NULL,
  `status_pembayaran` varchar(100) DEFAULT NULL,
  `metode_pembayaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `nomor_invoice`, `orderBiayaTotal`, `orderBiayaPengiriman`, `orderBeratKeranjang`, `orderDurasiPengiriman`, `orderKurir`, `orderPaketKurir`, `orderProvinsi`, `orderKota`, `orderDetailAlamat`, `orderBuktiTransaksi`, `orderCatatan`, `orderTanggalInvoice`, `status_pengiriman_barang`, `status_pembayaran`, `metode_pembayaran`) VALUES
(3, 6, 3, 92150, 26000, 1, '3-6 Hari', 'jne', '(OKE) Ongkos Kirim Ekonomis', 'Bali', 'Kabupaten Badung', 'sadsadasssssssssssssssssssssssssssssss', '1.jpg', 'asadaasdsad', '02:46 PM, 2019/04/24', 'Belum dikirim', 'Sudah dibayar', 'Transfer BCA'),
(4, 21, 4, 129225, 30000, 1, '2-3 Hari', 'jne', '(REG) Layanan Reguler', 'Bali', 'Kabupaten Badung', 'Jl kabupaten badung 05, kelurahan harapan jaya, bekasi utara', 'bca.png', 'Tolong kemas yang rapih', '06:02 PM, 2019/08/27', 'Belum dikirim', 'Sudah dibayar', 'Transfer BCA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id_order_detail` int(20) NOT NULL,
  `id_user` int(20) DEFAULT NULL,
  `id_product` int(20) DEFAULT NULL,
  `nomor_invoice` int(30) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id_order_detail`, `id_user`, `id_product`, `nomor_invoice`, `quantity`) VALUES
(3, 6, 2, 3, 3),
(4, 21, 6, 4, 1),
(5, 21, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_paper`
--

CREATE TABLE `tb_paper` (
  `id_paper` int(20) NOT NULL,
  `jenis` varchar(100) DEFAULT NULL,
  `judul` text,
  `tanggal_publish` varchar(100) DEFAULT NULL,
  `nama_pembuat` varchar(100) DEFAULT NULL,
  `isi` mediumtext,
  `tags` varchar(100) DEFAULT NULL,
  `kalimat_pendek` text,
  `thumbnail` varchar(100) DEFAULT NULL,
  `paperMetaDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paper`
--

INSERT INTO `tb_paper` (`id_paper`, `jenis`, `judul`, `tanggal_publish`, `nama_pembuat`, `isi`, `tags`, `kalimat_pendek`, `thumbnail`, `paperMetaDescription`) VALUES
(5, 'Events', 'Seminar dan Konfercab PC IAI Banyuwangi', '2019/02/20', 'Admin Serba Kelapa', '                                                                                                                                                                                \r\n<p>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"\r\n</p>\r\n                                <h4>What is Lorem Ipsum?</h4>\r\n                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <br><br>\r\n                                <br>\r\n                                <h4>Why do we use it?</h4>\r\n                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>                                                                                                                                                                                ', 'Seminar', '                                                                                                                                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.                                                                                                                                                                                ', 'events1.jpg', 'asdasdsadad'),
(20, 'Article', 'Minyak kelapa', '2019/02/22', 'Admin Serba Kelapa', '\r\n                                <h4>KHASIAT MINYAK KELAPA UNTUK KESEHATAN, KECANTIKAN KULIT</h4>\r\n                                Beberapa jenis minyak tidak hanya dapat digunakan untuk memasak agar masakan menjadi  enak, khasiat minyak kelapa juga dapat digunakan untuk merawat kesehatan dan kecantikan kulit.\r\n\r\n								Seperti khasiat minyak kelapa yang ternyata berkhasiat luar biasa, padahal banyak yang beranggapan bahwa minyak adalah zat yang tidak baik dan yang menyebabkan terjadinya penyakit berbahaya.\r\n\r\n								Manfaat minyak kelapa sendiri hanya populer untuk bidang kecantikan dan rambut. <br><br>\r\n                                <br>\r\n                                <h4>MINYAK KELAPA</h4>\r\n                                <p>Minyak kelapa murni (Inggris: virgin coconut oil) adalah minyak kelapa yang terbuat dari bahan utama kelapa segar, yang diproses dengan pemanasan secara teratur atau tidak dengan pemanasan sama sekali, tanpa menggunakan bahan kimia dan RDB.\r\n\r\n								Menyuling minyak kelapa seperti cara di atas mengakibatkan kandungan senyawa-senyawa esensial yang dibutuhkan tubuh tetap utuh.\r\n\r\n								Minyak kelapa murni dengan kandungan utama asam laurat ini memiliki sifat antibiotik, anti bakteri dan jamur.\r\n\r\n								Minyak kelapa murni, atau sekarang di kenal dengan nama Virgin Coconut Oil (VCO), adalah perbaikan proses pembuatan minyak kelapa.\r\n\r\n								Sehingga menghasilkan produk dengan kadar air dan kadar asam lemak bebas yang rendah, mempunyai warna yang bening, berbau harum, serta memiliki daya simpan yang cukup lama yaitu lebih dari 12 bulan.</p>\r\n\r\n								<h4>KEUNGULAN MINYAK KELAPA MURNI, YAITU:</h4>\r\n                                <p>tidak membutuhkan biaya yang mahal, karena bahan utama yang mudah di dapat dengan harga yang murah\r\n								pengolahan yang sederhana dan tidak terlalu rumit, serta\r\n								penggunaan energi yang sedikit, karena tidak menggunakan bahan bakar, sehingga\r\n								kandungan kimia dan nutrisinya tetap terjaga terutama asam lemak dalam minyak.\r\n								Jika dibandingkan dengan minyak kelapa biasa, atau sering disebut dengan minyak goreng (minyak kelapa kopra), minyak kelapa murni mempunyai kualitas yang lebih baik.\r\n\r\n								Minyak kelapa kopra akan berwarna kuning kecoklatan, berbau tidak harum, dan mudah berbau tidak enak, sehingga daya simpannya tidak bertahan lama (kurang dari dua bulan).\r\n\r\n								Dari segi ekonomi, minyak kelapa asli meiliki harga jual yang lebih tinggi dibandingkan minyak kelapa kopra, sehingga studi pembuatan VCO perlu dikembangkan.</p>\r\n', 'minyak kelapa, kelapa, kesehatan', 'Apakah kalian ingin tau khasiat yang terkandung di dalam minyak kelapa dan sangat berguna untuk kesehatan tubuh kita? oke kali ini saya akan membagikan artikel tentang Khasiat Minyak Kelapa Untuk Kesehatan dan Kecantikan Kulit.\r\n\r\nKebanyak jenis minyak, hanya untuk memasak agar menghasilkan masakan yang enak, tapi minyak kelapa juga dapat di gunakan untuk kesehatan dan kecantikan kulit.\r\n\r\nPadahal minyak seringkali dianggap menjadi zat yang tidak baik dan penyebab terjadinya penyakit berbahaya. Manfaat minyak kelapa sendiri sangat populer untuk bidang kecantikan dan rambut.', 'article1.png', '\r\n                                KHASIAT MINYAK KELAPA UNTUK KESEHATAN, KECANTIKAN KULIT\r\n                                Beberapa jenis minyak tidak hanya dapat digunakan untuk memasak agar masakan menjadi  enak, khasiat minyak kelapa juga dapat digunakan untuk merawat kesehatan dan kecantikan kulit.\r\n\r\n								Seperti khasiat minyak kelapa yang ternyata berkhasiat luar biasa, padahal banyak yang beranggapan bahwa minyak adalah zat yang tidak baik dan yang menyebabkan terjadinya penyakit berbahaya.\r\n\r\n								Manfaat minyak kelapa sendiri hanya populer untuk bidang kecantikan dan rambut.\r\n                               \r\n                                MINYAK KELAPA\r\n                                Minyak kelapa murni (Inggris: virgin coconut oil) adalah minyak kelapa yang terbuat dari bahan utama kelapa segar, yang diproses dengan pemanasan secara teratur atau tidak dengan pemanasan sama sekali, tanpa menggunakan bahan kimia dan RDB.\r\n\r\n								Menyuling minyak kelapa seperti cara di atas mengakibatkan kandungan senyawa-senyawa esensial yang dibutuhkan tubuh tetap utuh.\r\n\r\n								Minyak kelapa murni dengan kandungan utama asam laurat ini memiliki sifat antibiotik, anti bakteri dan jamur.\r\n\r\n								Minyak kelapa murni, atau sekarang di kenal dengan nama Virgin Coconut Oil (VCO), adalah perbaikan proses pembuatan minyak kelapa.\r\n\r\n								Sehingga menghasilkan produk dengan kadar air dan kadar asam lemak bebas yang rendah, mempunyai warna yang bening, berbau harum, serta memiliki daya simpan yang cukup lama yaitu lebih dari 12 bulan.\r\n\r\n								KEUNGULAN MINYAK KELAPA MURNI, YAITU:\r\n                                tidak membutuhkan biaya yang mahal, karena bahan utama yang mudah di dapat dengan harga yang murah\r\n								pengolahan yang sederhana dan tidak terlalu rumit, serta\r\n								penggunaan energi yang sedikit, karena tidak menggunakan bahan bakar, sehingga\r\n								kandungan kimia dan nutrisinya tetap terjaga terutama asam lemak dalam minyak.\r\n								Jika dibandingkan dengan minyak kelapa biasa, atau sering disebut dengan minyak goreng (minyak kelapa kopra), minyak kelapa murni mempunyai kualitas yang lebih baik.\r\n\r\n								Minyak kelapa kopra akan berwarna kuning kecoklatan, berbau tidak harum, dan mudah berbau tidak enak, sehingga daya simpannya tidak bertahan lama (kurang dari dua bulan).\r\n\r\n								Dari segi ekonomi, minyak kelapa asli meiliki harga jual yang lebih tinggi dibandingkan minyak kelapa kopra, sehingga studi pembuatan VCO perlu dikembangkan.\r\n'),
(23, 'Article', 'Manfaat Air Kelapa untuk Perawatan Wajah !', '2019/04/25', 'farras', '                                            <p>Air kelapa tidak hanya bermanfaat untuk tubuh tetapi juga kesehatan dan kecantikan kulit.</p>\r\n\r\n<p>Air kelapa mengandung nutrisi yang berguna untuk wajah seperti mineral dan vitamin C, B kompleks, serin, sistein, alanin, dan arginin.</p>\r\n\r\n<p>Bersumber dari <em>drhealthbenefits.com</em>, para ahli kecantikan di India mengatakan mencuci muka menggunakan air kelapa dapat memberikan manfaat-manfaat berikut ini.</p>\r\n\r\n<p><strong>1. Atasi Jerawat</strong></p>\r\n\r\n<p>Anda bisa mengaplikasikan air kelapa ke wajah saat akan tidur, air kelapa adalah salah satu cara menghilangkan jerawat dengan cepat secara alami.</p>\r\n\r\n<p>Pertama, siapkan 1 gelas air kelapa. Campurkan dengan 3 sendok makan bubuk kunyit yang telah di parut.</p>\r\n\r\n<p>Simpan di lemari es semalam. Setelah itu, saring kunyit dengan kain.</p>\r\n\r\n<p>Oleskan air ke permukaan kulit secara merata. Gosok sedikit dan biarkan selama 20 menit.</p>\r\n\r\n<p>Keesokan harinya bilas wajah dengan air bersih.</p>\r\n\r\n<p><strong>2. Mencerahkan kulit</strong></p>\r\n\r\n<p>Jika wajah Anda sering terkena sinar matahari, lakukan pencucian dengan air kelapa muda dua kali sehari untuk menjaga dan meningkatkan kecerahan kulit. </p>\r\n\r\n<p>Siapkan buah mentimun secukupnya, haluskan dengan blender dan tambahkan ½ cangkir air kelapa.</p>\r\n\r\n<p>Setelah itu oleskan pada kulit secara merata, biarkan selama 30 menit. Kemudian bilas dengan air bersih.</p>\r\n\r\n<p><strong>3. Bercak hitam</strong></p>\r\n\r\n<p>Bagi Anda yang memiliki flek hitam, air kelapa tua sangat baik untuk memudarkannya.</p>\r\n\r\n<p>Campurkan air kelapa tua dengan beberapa potongan kunyit, cuci wajah Anda dua kali sehari.</p>\r\n\r\n<p>Anda tidak akan mendapatkan hasil langsung tetapi butuh waktu dan lakukan secara rutin.</p>\r\n\r\n<p><strong>4. Membersihkan pori-pori kulit</strong></p>\r\n\r\n<p>Air kelapa memiliki sifat pelembab alami serta zat pemutih kulit.</p>\r\n\r\n<p>Air kelapa juga bisa digunakan untuk membersihkan pori-pori kulit kita yang kotor karena terkena polusi debu dan udara.</p>\r\n\r\n<p>Anda hanya perlu mengambil sepotong kapas dan membasahi  dengan air kelapa lalu gunakan untuk membersihkan wajah setiap hari.</p>\r\n\r\n<p><strong>5. Atasi kulit kering</strong></p>\r\n\r\n<p>Air kelapa sangat baik digunakan untuk melembabkan kulit kering.</p>\r\n\r\n<p>Selain diminum, Anda juga bisa menggunakan air kelapa sebagai masker.</p>\r\n\r\n<p>Cara membuat masker cukup dengan mencelupkan  kapas ke dalam air kelapa lalu oleskan ke wajah secara merata.</p>\r\n\r\n<p>Bersihkan wajah setelah 30 menit dengan air bersih. Lakukan ini setidaknya 3 kali seminggu untuk hasil yang maksimal.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n                                            ', 'kesehatan, wajah', '                                            <p>Air kelapa tidak hanya bermanfaat untuk tubuh tetapi juga kesehatan dan kecantikan kulit. Air kelapa mengandung nutrisi yang berguna untuk wajah seperti mineral dan vitamin C, B kompleks, serin, sistein, alanin, dan arginin.</p>\r\n\r\n<p>Bersumber dari <em>drhealthbenefits.com</em>, para ahli kecantikan di India mengatakan mencuci muka menggunakan air kelapa dapat memberikan manfaat-manfaat berikut ini</p>\r\n                                            ', 'powdered-coconut-flour47597953803.jpg', '                                            <p>Air kelapa tidak hanya bermanfaat untuk tubuh tetapi juga kesehatan dan kecantikan kulit.</p>\r\n\r\n<p>Air kelapa mengandung nutrisi yang berguna untuk wajah seperti mineral dan vitamin C, B kompleks, serin, sistein, alanin, dan arginin.</p>\r\n\r\n<p>Bersumber dari <em>drhealthbenefits.com</em>, para ahli kecantikan di India mengatakan mencuci muka menggunakan air kelapa dapat memberikan manfaat-manfaat berikut ini.</p>\r\n\r\n<p><strong>1. Atasi Jerawat</strong></p>\r\n\r\n<p>Anda bisa mengaplikasikan air kelapa ke wajah saat akan tidur, air kelapa adalah salah satu cara menghilangkan jerawat dengan cepat secara alami.</p>\r\n\r\n<p>Pertama, siapkan 1 gelas air kelapa. Campurkan dengan 3 sendok makan bubuk kunyit yang telah di parut.</p>\r\n\r\n<p>Simpan di lemari es semalam. Setelah itu, saring kunyit dengan kain.</p>\r\n\r\n<p>Oleskan air ke permukaan kulit secara merata. Gosok sedikit dan biarkan selama 20 menit.</p>\r\n\r\n<p>Keesokan harinya bilas wajah dengan air bersih.</p>\r\n\r\n<p><strong>2. Mencerahkan kulit</strong></p>\r\n\r\n<p>Jika wajah Anda sering terkena sinar matahari, lakukan pencucian dengan air kelapa muda dua kali sehari untuk menjaga dan meningkatkan kecerahan kulit. </p>\r\n\r\n<p>Siapkan buah mentimun secukupnya, haluskan dengan blender dan tambahkan ½ cangkir air kelapa.</p>\r\n\r\n<p>Setelah itu oleskan pada kulit secara merata, biarkan selama 30 menit. Kemudian bilas dengan air bersih.</p>\r\n\r\n<p><strong>3. Bercak hitam</strong></p>\r\n\r\n<p>Bagi Anda yang memiliki flek hitam, air kelapa tua sangat baik untuk memudarkannya.</p>\r\n\r\n<p>Campurkan air kelapa tua dengan beberapa potongan kunyit, cuci wajah Anda dua kali sehari.</p>\r\n\r\n<p>Anda tidak akan mendapatkan hasil langsung tetapi butuh waktu dan lakukan secara rutin.</p>\r\n\r\n<p><strong>4. Membersihkan pori-pori kulit</strong></p>\r\n\r\n<p>Air kelapa memiliki sifat pelembab alami serta zat pemutih kulit.</p>\r\n\r\n<p>Air kelapa juga bisa digunakan untuk membersihkan pori-pori kulit kita yang kotor karena terkena polusi debu dan udara.</p>\r\n\r\n<p>Anda hanya perlu mengambil sepotong kapas dan membasahi  dengan air kelapa lalu gunakan untuk membersihkan wajah setiap hari.</p>\r\n\r\n<p><strong>5. Atasi kulit kering</strong></p>\r\n\r\n<p>Air kelapa sangat baik digunakan untuk melembabkan kulit kering.</p>\r\n\r\n<p>Selain diminum, Anda juga bisa menggunakan air kelapa sebagai masker.</p>\r\n\r\n<p>Cara membuat masker cukup dengan mencelupkan  kapas ke dalam air kelapa lalu oleskan ke wajah secara merata.</p>\r\n\r\n<p>Bersihkan wajah setelah 30 menit dengan air bersih. Lakukan ini setidaknya 3 kali seminggu untuk hasil yang maksimal.</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n                                            '),
(24, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.36 (1).jpeg', '                                            Lorem Ipsum'),
(25, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.36.jpeg', '                                            Lorem Ipsum'),
(26, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.37.jpeg', '                                            Lorem Ipsum'),
(27, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.41.jpeg', '                                            Lorem Ipsum'),
(28, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.39.jpeg', '                                            Lorem Ipsum'),
(29, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.40 (1).jpeg', '                                            Lorem Ipsum'),
(30, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.40.jpeg', '                                            Lorem Ipsum'),
(31, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.09.41 (1).jpeg', '                                            Lorem Ipsum'),
(32, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.10.02 (1).jpeg', '                                            Lorem Ipsum'),
(33, 'Events', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'WhatsApp Image 2019-04-24 at 19.10.02.jpeg', '                                            Lorem Ipsum'),
(38, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article1.jpeg', '                                            Lorem Ipsum'),
(39, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article2.jpeg', '                                            Lorem Ipsum'),
(40, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article3.jpeg', '                                            Lorem Ipsum'),
(41, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article4.jpeg', '                                            Lorem Ipsum'),
(42, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article5.jpeg', '                                            Lorem Ipsum'),
(43, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article6.jpeg', '                                            Lorem Ipsum'),
(44, 'Article', 'Lorem Ipsum', '2019/04/25', 'farras', '                                            Lorem Ipsum', 'Lorem Ipsum', '                                            Lorem Ipsum', 'article7.jpeg', '                                            Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paper_comment`
--

CREATE TABLE `tb_paper_comment` (
  `id_paper_comment` int(20) NOT NULL,
  `id_paper` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `paperName` varchar(50) NOT NULL,
  `paperComment` text,
  `paperCommentDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paper_comment`
--

INSERT INTO `tb_paper_comment` (`id_paper_comment`, `id_paper`, `id_user`, `paperName`, `paperComment`, `paperCommentDate`) VALUES
(2, 5, 1, 'iqbal', 'events nya menarik.', '08:42 AM, 2019/02/18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id_product` int(20) NOT NULL,
  `productName` varchar(150) DEFAULT NULL,
  `productPrice` int(30) DEFAULT NULL,
  `productWeight` float DEFAULT NULL,
  `productDescription` text,
  `productImage` varchar(150) DEFAULT NULL,
  `productStock` int(30) DEFAULT NULL,
  `productMetaDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id_product`, `productName`, `productPrice`, `productWeight`, `productDescription`, `productImage`, `productStock`, `productMetaDescription`) VALUES
(1, 'Galenis Minyak Goreng 1 Liter', 35000, 1.5, 'Lebih sehat dari jenis-jenis minyak pada umumnya, karena Galenis minyak goreng 2 Liter mengandung MCFA (Medium Chain Fatty Acid), yaitukomponen asam lemak jenuh berantai sedang 93%, sehingga memilikisifat mudah diserap, dicerna & di ubah menjadi energy hampir 100%. Khas aoma kelapa & bisa memperbaiki resiko penyakit degenratif', 'galenis.png', 20, 'Lebih sehat dari jenis-jenis minyak pada umumnya, karena Galenis minyak goreng 2 Liter mengandung MCFA (Medium Chain Fatty Acid), yaitukomponen asam lemak jenuh berantai sedang 93%, sehingga memilikisifat mudah diserap, dicerna & di ubah menjadi energy hampir 100%. Khas aoma kelapa & bisa memperbaiki resiko penyakit degenratif'),
(2, 'TAZCO 250 Gram\r\n(Dessicated coconut)', 20000, 0.25, 'Tepung yang diperoleh dengan cara menghaluskan ampas kelapa yang telah \r\ndi keringkan yang dikeluarkan sebagian kandungan lemaknya melalui proses\r\nPRESSING. Tepung bebas GLUTEN, sangat baik untuk penderita penyakit CELIAC, \r\nYaitu penyakit alergi dari makanan tertentu. TAzco juga memiliki kandungan serat\r\nyang tinggi,protein tinggi, & bebas lemak.', 'tazco.png', 16, 'Tepung yang diperoleh dengan cara menghaluskan ampas kelapa yang telah \r\ndi keringkan yang dikeluarkan sebagian kandungan lemaknya melalui proses\r\nPRESSING. Tepung bebas GLUTEN, sangat baik untuk penderita penyakit CELIAC, \r\nYaitu penyakit alergi dari makanan tertentu. TAzco juga memiliki kandungan serat\r\nyang tinggi,protein tinggi, & bebas lemak.'),
(3, 'BOKABE Level 1\r\n(Abon kelapa Cabe)', 10000, 0.045, 'Campran antara cabe murni yang di jemur, dikeringkan dengan oven, lalu di giling\r\nhingga halus, kemudian di campur dengan Dessucated coconut sehingga \r\nmenciptakan rasa yang pedas & gurih', 'bokabe.png', 18, 'Campran antara cabe murni yang di jemur, dikeringkan dengan oven, lalu di giling\r\nhingga halus, kemudian di campur dengan Dessucated coconut sehingga \r\nmenciptakan rasa yang pedas & gurih'),
(4, 'HEVCO 255 Gram\r\n( Hot Extract Virgine Coconut Oil)', 70000, 0.255, 'Dalam proses pembuatannya melalui proses pemanasan terkendali dengan\r\nmesin khusus dengan suhu 60O C - 100o C dalam waktu 6-8 jam. Proses pembuatan\r\nHEVCO adalah murni hanya melalui proses pemanasan pada kelapa murni\r\nTanpa menggunakan campuran bahan kimia sehingga rasa lebih gurih,\r\nlebih stabil dan tahan lama, serta memiliki antioksidan alami lebih tinggi\r\ndari produk vco yang menggunakan proses fermentasi', 'hevco.png', 20, 'Dalam proses pembuatannya melalui proses pemanasan terkendali dengan\r\nmesin khusus dengan suhu 60O C - 100o C dalam waktu 6-8 jam. Proses pembuatan\r\nHEVCO adalah murni hanya melalui proses pemanasan pada kelapa murni\r\nTanpa menggunakan campuran bahan kimia sehingga rasa lebih gurih,\r\nlebih stabil dan tahan lama, serta memiliki antioksidan alami lebih tinggi\r\ndari produk vco yang menggunakan proses fermentasi'),
(6, 'Galenis Minyak Goreng 2 Liter', 70000, 2.5, 'Dikemas menggunakan Jerigen. <br>Lebih sehat karena mengandung MCFA (Medium Chain Fatty Acid), yaitu\r\nkomponen asam lemak jenuh berantai sedang 93%, sehingga memiliki\r\nsifat mudah diserap, dicerna & di ubah menjadi energy hampir 100%. \r\nKhas aoma kelapa & bisa memperbaiki resiko penyakit degenratif', 'galenis.png', 19, 'Lebih sehat karena mengandung MCFA (Medium Chain Fatty Acid), yaitu\r\nkomponen asam lemak jenuh berantai sedang 93%, sehingga memiliki\r\nsifat mudah diserap, dicerna & di ubah menjadi energy hampir 100%. \r\nKhas aoma kelapa & bisa memperbaiki resiko penyakit degenratif'),
(7, 'HEVCO 510 Gram ( Hot Extract Virgine Coconut Oil)', 130000, 0.51, 'Dikemas menggunakan Botol Bening. <br> Dalam proses pembuatannya melalui proses pemanasan terkendali dengan\r\nmesin khusus dengan suhu 60O C - 100o C dalam waktu 6-8 jam. Proses pembuatan\r\nHEVCO adalah murni hanya melalui proses pemanasan pada kelapa murni\r\nTanpa menggunakan campuran bahan kimia sehingga rasa lebih gurih,\r\nlebih stabil dan tahan lama, serta memiliki antioksidan alami lebih tinggi\r\ndari produk vco yang menggunakan proses fermentasi', 'hevco.png', 20, 'Dalam proses pembuatannya melalui proses pemanasan terkendali dengan\r\nmesin khusus dengan suhu 60O C - 100o C dalam waktu 6-8 jam. Proses pembuatan\r\nHEVCO adalah murni hanya melalui proses pemanasan pada kelapa murni\r\nTanpa menggunakan campuran bahan kimia sehingga rasa lebih gurih,\r\nlebih stabil dan tahan lama, serta memiliki antioksidan alami lebih tinggi\r\ndari produk vco yang menggunakan proses fermentasi'),
(8, 'HEVCO 1015 Gram ( Hot Extract Virgine Coconut Oil)', 200000, 1.015, 'Dikemas Menggunakan Botol Doff Susu. <br> Dalam proses pembuatannya melalui proses pemanasan terkendali dengan\r\nmesin khusus dengan suhu 60O C - 100o C dalam waktu 6-8 jam. Proses pembuatan\r\nHEVCO adalah murni hanya melalui proses pemanasan pada kelapa murni\r\nTanpa menggunakan campuran bahan kimia sehingga rasa lebih gurih,\r\nlebih stabil dan tahan lama, serta memiliki antioksidan alami lebih tinggi\r\ndari produk vco yang menggunakan proses fermentasi', 'hevco.png', 20, 'Dalam proses pembuatannya melalui proses pemanasan terkendali dengan\r\nmesin khusus dengan suhu 60O C - 100o C dalam waktu 6-8 jam. Proses pembuatan\r\nHEVCO adalah murni hanya melalui proses pemanasan pada kelapa murni\r\nTanpa menggunakan campuran bahan kimia sehingga rasa lebih gurih,\r\nlebih stabil dan tahan lama, serta memiliki antioksidan alami lebih tinggi\r\ndari produk vco yang menggunakan proses fermentasi'),
(9, 'TAZCO (Dessicated coconut) 500 Gram', 40000, 0.05, 'Tepung yang diperoleh dengan cara menghaluskan ampas kelapa yang telah  di keringkan yang dikeluarkan sebagian kandungan lemaknya melalui proses PRESSING. Tepung bebas GLUTEN, sangat baik untuk penderita penyakit CELIAC,  Yaitu penyakit alergi dari makanan tertentu. TAzco juga memiliki kandungan serat yang tinggi,protein tinggi, & bebas lemak.', 'tazco.png', 20, 'Tepung yang diperoleh dengan cara menghaluskan ampas kelapa yang telah  di keringkan yang dikeluarkan sebagian kandungan lemaknya melalui proses PRESSING. Tepung bebas GLUTEN, sangat baik untuk penderita penyakit CELIAC,  Yaitu penyakit alergi dari makanan tertentu. TAzco juga memiliki kandungan serat yang tinggi,protein tinggi, & bebas lemak.'),
(10, 'TAZCO (Dessicated coconut) 1000Gram', 60000, 0.1, 'Tepung yang diperoleh dengan cara menghaluskan ampas kelapa yang telah  di keringkan yang dikeluarkan sebagian kandungan lemaknya melalui proses PRESSING. Tepung bebas GLUTEN, sangat baik untuk penderita penyakit CELIAC,  Yaitu penyakit alergi dari makanan tertentu. TAzco juga memiliki kandungan serat yang tinggi,protein tinggi, & bebas lemak.', 'tazco.png', 20, 'Tepung yang diperoleh dengan cara menghaluskan ampas kelapa yang telah  di keringkan yang dikeluarkan sebagian kandungan lemaknya melalui proses PRESSING. Tepung bebas GLUTEN, sangat baik untuk penderita penyakit CELIAC,  Yaitu penyakit alergi dari makanan tertentu. TAzco juga memiliki kandungan serat yang tinggi,protein tinggi, & bebas lemak.'),
(11, 'BOKABE (Abon kelapa Cabe) Level 2', 12000, 0.045, 'Campran antara cabe murni yang di jemur, dikeringkan dengan oven, lalu di giling hingga halus, kemudian di campur dengan Dessucated coconut sehingga  menciptakan rasa yang pedas & gurih', 'bokabe.png', 20, 'Campran antara cabe murni yang di jemur, dikeringkan dengan oven, lalu di giling hingga halus, kemudian di campur dengan Dessucated coconut sehingga  menciptakan rasa yang pedas & gurih'),
(12, 'BOKABE (Abon kelapa Cabe) Level 3', 14000, 0.045, 'Campran antara cabe murni yang di jemur, dikeringkan dengan oven, lalu di giling hingga halus, kemudian di campur dengan Dessucated coconut sehingga  menciptakan rasa yang pedas & gurih', 'bokabe.png', 20, 'Campran antara cabe murni yang di jemur, dikeringkan dengan oven, lalu di giling hingga halus, kemudian di campur dengan Dessucated coconut sehingga  menciptakan rasa yang pedas & gurih'),
(13, 'PEO Sea Salt Body Wash', 35000, 0.6, 'PEO Sea Salt', 'produk2.jpeg', 20, 'PEO Sea Salt'),
(14, 'PEO Sea Salt Shampoo', 45000, 0.6, 'PEO Sea Salt Shampoo', 'produk4.jpeg', 20, 'PEO Sea Salt Shampoo'),
(15, 'CR Facial Wash 100 ml', 116579, 0.1, 'CR Facial Wash 100 ml', 'produk3.jpeg', 20, 'CR Facial Wash 100 ml'),
(16, 'PEO Natural Deodorant', 30000, 0.6, 'PEO Natural Deodorant', 'produk1.jpeg', 20, 'PEO Natural Deodorant');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_comment`
--

CREATE TABLE `tb_product_comment` (
  `id_product_comment` int(20) NOT NULL,
  `id_product` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `productRatingComment` varchar(50) DEFAULT NULL,
  `productReasonComment` varchar(100) DEFAULT NULL,
  `productComment` text,
  `productCommentDate` varchar(100) DEFAULT NULL,
  `productNamadepanreviews` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_product_comment`
--

INSERT INTO `tb_product_comment` (`id_product_comment`, `id_product`, `id_user`, `productRatingComment`, `productReasonComment`, `productComment`, `productCommentDate`, `productNamadepanreviews`) VALUES
(1, 1, 1, '5', 'Quality', 'sangat berkualitas produknya.', '18 February 2019', 'iqbal'),
(2, 2, 1, '4', 'Quality', 'menarikkkk', NULL, 'iqbal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int(20) NOT NULL,
  `nama_lengkap` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nomor_hp` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `hashh` varchar(40) DEFAULT NULL,
  `active` int(10) DEFAULT NULL,
  `awal_join` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `nama_lengkap`, `email`, `nomor_hp`, `pass`, `hashh`, `active`, `awal_join`) VALUES
(1, 'iqbal', 'iqbalabdurrazaq@gmail.com', '0895330579860', 'e10adc3949ba59abbe56e057f20f883e', '4a274358ae5fade0de74afe2445c1f14', 1, '18/02/2019'),
(3, 'rosemari kairupan', 'rosemari2018moto@gmail.com', '081933130416', '16ae31e49ef4a4efbb214e2d6a9a435c', 'a4a2c4dc8d1fca1ca59e889e7d356cfe', 1, '21/02/2019'),
(4, 'Nadit', 'skybreakin@gmail.com', '087877677724', 'e10adc3949ba59abbe56e057f20f883e', '01bc4dfc442b49ecf22bd7b87e2edd46', 0, '23/02/2019'),
(6, 'nao', 'naoilmiad@gmail.com', '081296886567', '1eb25ba9d1f85b057263869a334fb3a3', '739014b2ecb4239eb57b9b2dffcb1c2e', 1, '24/04/2019'),
(21, 'farrasmuttaqin', 'farrasmuttaqin@gmail.com', '081296886565', 'd107222a47df3d5d121171402ed75fc6', '4ae8412851bfe9b187b6d79886b8aaa3', 0, '27/08/2019'),
(22, 'nao ilmiad', 'naoilmiad1@gmail.com', '081255554444', 'd107222a47df3d5d121171402ed75fc6', 'b8a988bd9c6728f9583ee999618b1657', 0, '27/08/2019');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tb_paper`
--
ALTER TABLE `tb_paper`
  ADD PRIMARY KEY (`id_paper`);

--
-- Indexes for table `tb_paper_comment`
--
ALTER TABLE `tb_paper_comment`
  ADD PRIMARY KEY (`id_paper_comment`),
  ADD KEY `id_paper` (`id_paper`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_product_comment`
--
ALTER TABLE `tb_product_comment`
  ADD PRIMARY KEY (`id_product_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id_contact` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=320;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `id_order_detail` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_paper`
--
ALTER TABLE `tb_paper`
  MODIFY `id_paper` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_paper_comment`
--
ALTER TABLE `tb_paper_comment`
  MODIFY `id_paper_comment` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id_product` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_product_comment`
--
ALTER TABLE `tb_product_comment`
  MODIFY `id_product_comment` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD CONSTRAINT `tb_order_detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_paper_comment`
--
ALTER TABLE `tb_paper_comment`
  ADD CONSTRAINT `tb_paper_comment_ibfk_1` FOREIGN KEY (`id_paper`) REFERENCES `tb_paper` (`id_paper`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_paper_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_product_comment`
--
ALTER TABLE `tb_product_comment`
  ADD CONSTRAINT `tb_product_comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tb_product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_product_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
