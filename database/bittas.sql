-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Oca 2017, 13:30:48
-- Sunucu sürümü: 5.6.21
-- PHP Sürümü: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `bittas`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_bolum`
--

CREATE TABLE IF NOT EXISTS `tbl_bolum` (
`id` int(11) NOT NULL,
  `bolum_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `fakulte_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_bolum`
--

INSERT INTO `tbl_bolum` (`id`, `bolum_adi`, `fakulte_id`) VALUES
(1, 'Yazılım Mühendisliği', 1),
(2, 'İnşaat Mühendisliği', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_danisman`
--

CREATE TABLE IF NOT EXISTS `tbl_danisman` (
`id` int(10) NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci DEFAULT NULL,
  `unvan` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `uni_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_danisman`
--

INSERT INTO `tbl_danisman` (`id`, `tc`, `unvan`, `user_id`, `uni_id`) VALUES
(1, '10845785652', 'Yardımcı Doçent Doktor', 2, 1),
(2, '1234567890', 'Öğretim Görevlisi', 5, 1),
(3, '12345678541', 'Yardımcı Doçent Doktor', 6, 1),
(5, '43235254654', 'Doçent Doktor', 8, 1),
(6, '63243154654', 'Yardımcı Doçent Doktor', 9, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_fakulte`
--

CREATE TABLE IF NOT EXISTS `tbl_fakulte` (
`id` int(11) NOT NULL,
  `uni_id` int(11) NOT NULL,
  `fakulte_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_fakulte`
--

INSERT INTO `tbl_fakulte` (`id`, `uni_id`, `fakulte_adi`) VALUES
(1, 1, 'Of Teknoloji'),
(2, 2, 'Mühendislik Fakültesi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_il`
--

CREATE TABLE IF NOT EXISTS `tbl_il` (
  `id` int(11) NOT NULL,
  `il` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_il`
--

INSERT INTO `tbl_il` (`id`, `il`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyonkarahisar'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ilce`
--

CREATE TABLE IF NOT EXISTS `tbl_ilce` (
  `id` int(11) NOT NULL,
  `il_id` int(11) DEFAULT NULL,
  `ilce` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_ilce`
--

INSERT INTO `tbl_ilce` (`id`, `il_id`, `ilce`) VALUES
(1, 1, 'Seyhan'),
(2, 1, 'Ceyhan'),
(3, 1, 'Feke'),
(4, 1, 'Karaisalı'),
(5, 1, 'Karataş'),
(6, 1, 'Kozan'),
(7, 1, 'Pozantı'),
(8, 1, 'Saimbeyli'),
(9, 1, 'Tufanbeyli'),
(10, 1, 'Yumurtalık'),
(11, 1, 'Yüreğir'),
(12, 1, 'Aladağ'),
(13, 1, 'İmamoğlu'),
(14, 1, 'Sarıçam'),
(15, 1, 'Çukurova'),
(16, 2, 'Adıyaman Merkez'),
(17, 2, 'Besni'),
(18, 2, 'Çelikhan'),
(19, 2, 'Gerger'),
(20, 2, 'Gölbaşı / Adıyaman'),
(21, 2, 'Kahta'),
(22, 2, 'Samsat'),
(23, 2, 'Sincik'),
(24, 2, 'Tut'),
(25, 3, 'Afyonkarahisar Merkez'),
(26, 3, 'Bolvadin'),
(27, 3, 'Çay'),
(28, 3, 'Dazkırı'),
(29, 3, 'Dinar'),
(30, 3, 'Emirdağ'),
(31, 3, 'İhsaniye'),
(32, 3, 'Sandıklı'),
(33, 3, 'Sinanpaşa'),
(34, 3, 'Sultandağı'),
(35, 3, 'Şuhut'),
(36, 3, 'Başmakçı'),
(37, 3, 'Bayat / Afyonkarahisar'),
(38, 3, 'İscehisar'),
(39, 3, 'Çobanlar'),
(40, 3, 'Evciler'),
(41, 3, 'Hocalar'),
(42, 3, 'Kızılören'),
(43, 4, 'Ağrı Merkez'),
(44, 4, 'Diyadin'),
(45, 4, 'Doğubayazıt'),
(46, 4, 'Eleşkirt'),
(47, 4, 'Hamur'),
(48, 4, 'Patnos'),
(49, 4, 'Taşlıçay'),
(50, 4, 'Tutak'),
(51, 5, 'Amasya Merkez'),
(52, 5, 'Göynücek'),
(53, 5, 'Gümüşhacıköy'),
(54, 5, 'Merzifon'),
(55, 5, 'Suluova'),
(56, 5, 'Taşova'),
(57, 5, 'Hamamözü'),
(58, 6, 'Altındağ'),
(59, 6, 'Ayaş'),
(60, 6, 'Bala'),
(61, 6, 'Beypazarı'),
(62, 6, 'Çamlıdere'),
(63, 6, 'Çankaya'),
(64, 6, 'Çubuk'),
(65, 6, 'Elmadağ'),
(66, 6, 'Güdül'),
(67, 6, 'Haymana'),
(68, 6, 'Kalecik'),
(69, 6, 'Kızılcahamam'),
(70, 6, 'Nallıhan'),
(71, 6, 'Polatlı'),
(72, 6, 'Şereflikoçhisar'),
(73, 6, 'Yenimahalle'),
(74, 6, 'Gölbaşı / Ankara'),
(75, 6, 'Keçiören'),
(76, 6, 'Mamak'),
(77, 6, 'Sincan'),
(78, 6, 'Kazan'),
(79, 6, 'Akyurt'),
(80, 6, 'Etimesgut'),
(81, 6, 'Evren'),
(82, 6, 'Pursaklar'),
(83, 7, 'Akseki'),
(84, 7, 'Alanya'),
(85, 7, 'Elmalı'),
(86, 7, 'Finike'),
(87, 7, 'Gazipaşa'),
(88, 7, 'Gündoğmuş'),
(89, 7, 'Kaş'),
(90, 7, 'Korkuteli'),
(91, 7, 'Kumluca'),
(92, 7, 'Manavgat'),
(93, 7, 'Serik'),
(94, 7, 'Demre'),
(95, 7, 'İbradı'),
(96, 7, 'Kemer / Antalya'),
(97, 7, 'Aksu / Antalya'),
(98, 7, 'Döşemealtı'),
(99, 7, 'Kepez'),
(100, 7, 'Konyaaltı'),
(101, 7, 'Muratpaşa'),
(102, 8, 'Ardanuç'),
(103, 8, 'Arhavi'),
(104, 8, 'Artvin Merkez'),
(105, 8, 'Borçka'),
(106, 8, 'Hopa'),
(107, 8, 'Şavşat'),
(108, 8, 'Yusufeli'),
(109, 8, 'Murgul'),
(110, 9, 'Bozdoğan'),
(111, 9, 'Çine'),
(112, 9, 'Germencik'),
(113, 9, 'Karacasu'),
(114, 9, 'Koçarlı'),
(115, 9, 'Kuşadası'),
(116, 9, 'Kuyucak'),
(117, 9, 'Nazilli'),
(118, 9, 'Söke'),
(119, 9, 'Sultanhisar'),
(120, 9, 'Yenipazar / Aydın'),
(121, 9, 'Buharkent'),
(122, 9, 'İncirliova'),
(123, 9, 'Karpuzlu'),
(124, 9, 'Köşk'),
(125, 9, 'Didim'),
(126, 9, 'Efeler'),
(127, 10, 'Ayvalık'),
(128, 10, 'Balya'),
(129, 10, 'Bandırma'),
(130, 10, 'Bigadiç'),
(131, 10, 'Burhaniye'),
(132, 10, 'Dursunbey'),
(133, 10, 'Edremit / Balıkesir'),
(134, 10, 'Erdek'),
(135, 10, 'Gönen / Balıkesir'),
(136, 10, 'Havran'),
(137, 10, 'İvrindi'),
(138, 10, 'Kepsut'),
(139, 10, 'Manyas'),
(140, 10, 'Savaştepe'),
(141, 10, 'Sındırgı'),
(142, 10, 'Susurluk'),
(143, 10, 'Marmara'),
(144, 10, 'Gömeç'),
(145, 10, 'Altıeylül'),
(146, 10, 'Karesi'),
(147, 11, 'Bilecik Merkez'),
(148, 11, 'Bozüyük'),
(149, 11, 'Gölpazarı'),
(150, 11, 'Osmaneli'),
(151, 11, 'Pazaryeri'),
(152, 11, 'Söğüt'),
(153, 11, 'Yenipazar / Bilecik'),
(154, 11, 'İnhisar'),
(155, 12, 'Bingöl Merkez'),
(156, 12, 'Genç'),
(157, 12, 'Karlıova'),
(158, 12, 'Kiğı'),
(159, 12, 'Solhan'),
(160, 12, 'Adaklı'),
(161, 12, 'Yayladere'),
(162, 12, 'Yedisu'),
(163, 13, 'Adilcevaz'),
(164, 13, 'Ahlat'),
(165, 13, 'Bitlis Merkez'),
(166, 13, 'Hizan'),
(167, 13, 'Mutki'),
(168, 13, 'Tatvan'),
(169, 13, 'Güroymak'),
(170, 14, 'Bolu Merkez'),
(171, 14, 'Gerede'),
(172, 14, 'Göynük'),
(173, 14, 'Kıbrıscık'),
(174, 14, 'Mengen'),
(175, 14, 'Mudurnu'),
(176, 14, 'Seben'),
(177, 14, 'Dörtdivan'),
(178, 14, 'Yeniçağa'),
(179, 15, 'Ağlasun'),
(180, 15, 'Bucak'),
(181, 15, 'Burdur Merkez'),
(182, 15, 'Gölhisar'),
(183, 15, 'Tefenni'),
(184, 15, 'Yeşilova'),
(185, 15, 'Karamanlı'),
(186, 15, 'Kemer / Burdur'),
(187, 15, 'Altınyayla / Burdur'),
(188, 15, 'Çavdır'),
(189, 15, 'Çeltikçi'),
(190, 16, 'Gemlik'),
(191, 16, 'İnegöl'),
(192, 16, 'İznik'),
(193, 16, 'Karacabey'),
(194, 16, 'Keles'),
(195, 16, 'Mudanya'),
(196, 16, 'Mustafakemalpaşa'),
(197, 16, 'Orhaneli'),
(198, 16, 'Orhangazi'),
(199, 16, 'Yenişehir / Bursa'),
(200, 16, 'Büyükorhan'),
(201, 16, 'Harmancık'),
(202, 16, 'Nilüfer'),
(203, 16, 'Osmangazi'),
(204, 16, 'Yıldırım'),
(205, 16, 'Gürsu'),
(206, 16, 'Kestel'),
(207, 17, 'Ayvacık / Çanakkale'),
(208, 17, 'Bayramiç'),
(209, 17, 'Biga'),
(210, 17, 'Bozcaada'),
(211, 17, 'Çan'),
(212, 17, 'Çanakkale Merkez'),
(213, 17, 'Eceabat'),
(214, 17, 'Ezine'),
(215, 17, 'Gelibolu'),
(216, 17, 'Gökçeada'),
(217, 17, 'Lapseki'),
(218, 17, 'Yenice / Çanakkale'),
(219, 18, 'Çankırı Merkez'),
(220, 18, 'Çerkeş'),
(221, 18, 'Eldivan'),
(222, 18, 'Ilgaz'),
(223, 18, 'Kurşunlu'),
(224, 18, 'Orta'),
(225, 18, 'Şabanözü'),
(226, 18, 'Yapraklı'),
(227, 18, 'Atkaracalar'),
(228, 18, 'Kızılırmak'),
(229, 18, 'Bayramören'),
(230, 18, 'Korgun'),
(231, 19, 'Alaca'),
(232, 19, 'Bayat / Çorum'),
(233, 19, 'Çorum Merkez'),
(234, 19, 'İskilip'),
(235, 19, 'Kargı'),
(236, 19, 'Mecitözü'),
(237, 19, 'Ortaköy / Çorum'),
(238, 19, 'Osmancık'),
(239, 19, 'Sungurlu'),
(240, 19, 'Boğazkale'),
(241, 19, 'Uğurludağ'),
(242, 19, 'Dodurga'),
(243, 19, 'Laçin'),
(244, 19, 'Oğuzlar'),
(245, 20, 'Acıpayam'),
(246, 20, 'Buldan'),
(247, 20, 'Çal'),
(248, 20, 'Çameli'),
(249, 20, 'Çardak'),
(250, 20, 'Çivril'),
(251, 20, 'Güney'),
(252, 20, 'Kale / Denizli'),
(253, 20, 'Sarayköy'),
(254, 20, 'Tavas'),
(255, 20, 'Babadağ'),
(256, 20, 'Bekilli'),
(257, 20, 'Honaz'),
(258, 20, 'Serinhisar'),
(259, 20, 'Pamukkale'),
(260, 20, 'Baklan'),
(261, 20, 'Beyağaç'),
(262, 20, 'Bozkurt / Denizli'),
(263, 20, 'Merkezefendi'),
(264, 21, 'Bismil'),
(265, 21, 'Çermik'),
(266, 21, 'Çınar'),
(267, 21, 'Çüngüş'),
(268, 21, 'Dicle'),
(269, 21, 'Ergani'),
(270, 21, 'Hani'),
(271, 21, 'Hazro'),
(272, 21, 'Kulp'),
(273, 21, 'Lice'),
(274, 21, 'Silvan'),
(275, 21, 'Eğil'),
(276, 21, 'Kocaköy'),
(277, 21, 'Bağlar'),
(278, 21, 'Kayapınar'),
(279, 21, 'Sur'),
(280, 21, 'Yenişehir / Diyarbakır'),
(281, 22, 'Edirne Merkez'),
(282, 22, 'Enez'),
(283, 22, 'Havsa'),
(284, 22, 'İpsala'),
(285, 22, 'Keşan'),
(286, 22, 'Lalapaşa'),
(287, 22, 'Meriç'),
(288, 22, 'Uzunköprü'),
(289, 22, 'Süloğlu'),
(290, 23, 'Ağın'),
(291, 23, 'Baskil'),
(292, 23, 'Elazığ Merkez'),
(293, 23, 'Karakoçan'),
(294, 23, 'Keban'),
(295, 23, 'Maden'),
(296, 23, 'Palu'),
(297, 23, 'Sivrice'),
(298, 23, 'Arıcak'),
(299, 23, 'Kovancılar'),
(300, 23, 'Alacakaya'),
(301, 24, 'Çayırlı'),
(302, 24, 'Erzincan Merkez'),
(303, 24, 'İliç'),
(304, 24, 'Kemah'),
(305, 24, 'Kemaliye'),
(306, 24, 'Refahiye'),
(307, 24, 'Tercan'),
(308, 24, 'Üzümlü'),
(309, 24, 'Otlukbeli'),
(310, 25, 'Aşkale'),
(311, 25, 'Çat'),
(312, 25, 'Hınıs'),
(313, 25, 'Horasan'),
(314, 25, 'İspir'),
(315, 25, 'Karayazı'),
(316, 25, 'Narman'),
(317, 25, 'Oltu'),
(318, 25, 'Olur'),
(319, 25, 'Pasinler'),
(320, 25, 'Şenkaya'),
(321, 25, 'Tekman'),
(322, 25, 'Tortum'),
(323, 25, 'Karaçoban'),
(324, 25, 'Uzundere'),
(325, 25, 'Pazaryolu'),
(326, 25, 'Aziziye'),
(327, 25, 'Köprüköy'),
(328, 25, 'Palandöken'),
(329, 25, 'Yakutiye'),
(330, 26, 'Çifteler'),
(331, 26, 'Mahmudiye'),
(332, 26, 'Mihalıççık'),
(333, 26, 'Sarıcakaya'),
(334, 26, 'Seyitgazi'),
(335, 26, 'Sivrihisar'),
(336, 26, 'Alpu'),
(337, 26, 'Beylikova'),
(338, 26, 'İnönü'),
(339, 26, 'Günyüzü'),
(340, 26, 'Han'),
(341, 26, 'Mihalgazi'),
(342, 26, 'Odunpazarı'),
(343, 26, 'Tepebaşı'),
(344, 27, 'Araban'),
(345, 27, 'İslahiye'),
(346, 27, 'Nizip'),
(347, 27, 'Oğuzeli'),
(348, 27, 'Yavuzeli'),
(349, 27, 'Şahinbey'),
(350, 27, 'Şehitkamil'),
(351, 27, 'Karkamış'),
(352, 27, 'Nurdağı'),
(353, 28, 'Alucra'),
(354, 28, 'Bulancak'),
(355, 28, 'Dereli'),
(356, 28, 'Espiye'),
(357, 28, 'Eynesil'),
(358, 28, 'Giresun Merkez'),
(359, 28, 'Görele'),
(360, 28, 'Keşap'),
(361, 28, 'Şebinkarahisar'),
(362, 28, 'Tirebolu'),
(363, 28, 'Piraziz'),
(364, 28, 'Yağlıdere'),
(365, 28, 'Çamoluk'),
(366, 28, 'Çanakçı'),
(367, 28, 'Doğankent'),
(368, 28, 'Güce'),
(369, 29, 'Gümüşhane Merkez'),
(370, 29, 'Kelkit'),
(371, 29, 'Şiran'),
(372, 29, 'Torul'),
(373, 29, 'Köse'),
(374, 29, 'Kürtün'),
(375, 30, 'Çukurca'),
(376, 30, 'Hakkari Merkez'),
(377, 30, 'Şemdinli'),
(378, 30, 'Yüksekova'),
(379, 31, 'Altınözü'),
(380, 31, 'Dörtyol'),
(381, 31, 'Hassa'),
(382, 31, 'İskenderun'),
(383, 31, 'Kırıkhan'),
(384, 31, 'Reyhanlı'),
(385, 31, 'Samandağ'),
(386, 31, 'Yayladağı'),
(387, 31, 'Erzin'),
(388, 31, 'Belen'),
(389, 31, 'Kumlu'),
(390, 31, 'Antakya'),
(391, 31, 'Arsuz'),
(392, 31, 'Defne'),
(393, 31, 'Payas'),
(394, 32, 'Atabey'),
(395, 32, 'Eğirdir'),
(396, 32, 'Gelendost'),
(397, 32, 'Isparta Merkez'),
(398, 32, 'Keçiborlu'),
(399, 32, 'Senirkent'),
(400, 32, 'Sütçüler'),
(401, 32, 'Şarkikaraağaç'),
(402, 32, 'Uluborlu'),
(403, 32, 'Yalvaç'),
(404, 32, 'Aksu / Isparta'),
(405, 32, 'Gönen / Isparta'),
(406, 32, 'Yenişarbademli'),
(407, 33, 'Anamur'),
(408, 33, 'Erdemli'),
(409, 33, 'Gülnar'),
(410, 33, 'Mut'),
(411, 33, 'Silifke'),
(412, 33, 'Tarsus'),
(413, 33, 'Aydıncık / Mersin'),
(414, 33, 'Bozyazı'),
(415, 33, 'Çamlıyayla'),
(416, 33, 'Akdeniz'),
(417, 33, 'Mezitli'),
(418, 33, 'Toroslar'),
(419, 33, 'Yenişehir / Mersin'),
(420, 34, 'Adalar'),
(421, 34, 'Bakırköy'),
(422, 34, 'Beşiktaş'),
(423, 34, 'Beykoz'),
(424, 34, 'Beyoğlu'),
(425, 34, 'Çatalca'),
(426, 34, 'Eyüp'),
(427, 34, 'Fatih'),
(428, 34, 'Gaziosmanpaşa'),
(429, 34, 'Kadıköy'),
(430, 34, 'Kartal'),
(431, 34, 'Sarıyer'),
(432, 34, 'Silivri'),
(433, 34, 'Şile'),
(434, 34, 'Şişli'),
(435, 34, 'Üsküdar'),
(436, 34, 'Zeytinburnu'),
(437, 34, 'Büyükçekmece'),
(438, 34, 'Kağıthane'),
(439, 34, 'Küçükçekmece'),
(440, 34, 'Pendik'),
(441, 34, 'Ümraniye'),
(442, 34, 'Bayrampaşa'),
(443, 34, 'Avcılar'),
(444, 34, 'Bağcılar'),
(445, 34, 'Bahçelievler'),
(446, 34, 'Güngören'),
(447, 34, 'Maltepe'),
(448, 34, 'Sultanbeyli'),
(449, 34, 'Tuzla'),
(450, 34, 'Esenler'),
(451, 34, 'Arnavutköy'),
(452, 34, 'Ataşehir'),
(453, 34, 'Başakşehir'),
(454, 34, 'Beylikdüzü'),
(455, 34, 'Çekmeköy'),
(456, 34, 'Esenyurt'),
(457, 34, 'Sancaktepe'),
(458, 34, 'Sultangazi'),
(459, 35, 'Aliağa'),
(460, 35, 'Bayındır'),
(461, 35, 'Bergama'),
(462, 35, 'Bornova'),
(463, 35, 'Çeşme'),
(464, 35, 'Dikili'),
(465, 35, 'Foça'),
(466, 35, 'Karaburun'),
(467, 35, 'Karşıyaka'),
(468, 35, 'Kemalpaşa'),
(469, 35, 'Kınık'),
(470, 35, 'Kiraz'),
(471, 35, 'Menemen'),
(472, 35, 'Ödemiş'),
(473, 35, 'Seferihisar'),
(474, 35, 'Selçuk'),
(475, 35, 'Tire'),
(476, 35, 'Torbalı'),
(477, 35, 'Urla'),
(478, 35, 'Beydağ'),
(479, 35, 'Buca'),
(480, 35, 'Konak'),
(481, 35, 'Menderes'),
(482, 35, 'Balçova'),
(483, 35, 'Çiğli'),
(484, 35, 'Gaziemir'),
(485, 35, 'Narlıdere'),
(486, 35, 'Güzelbahçe'),
(487, 35, 'Bayraklı'),
(488, 35, 'Karabağlar'),
(489, 36, 'Arpaçay'),
(490, 36, 'Digor'),
(491, 36, 'Kağızman'),
(492, 36, 'Kars Merkez'),
(493, 36, 'Sarıkamış'),
(494, 36, 'Selim'),
(495, 36, 'Susuz'),
(496, 36, 'Akyaka'),
(497, 37, 'Abana'),
(498, 37, 'Araç'),
(499, 37, 'Azdavay'),
(500, 37, 'Bozkurt / Kastamonu'),
(501, 37, 'Cide'),
(502, 37, 'Çatalzeytin'),
(503, 37, 'Daday'),
(504, 37, 'Devrekani'),
(505, 37, 'İnebolu'),
(506, 37, 'Kastamonu Merkez'),
(507, 37, 'Küre'),
(508, 37, 'Taşköprü'),
(509, 37, 'Tosya'),
(510, 37, 'İhsangazi'),
(511, 37, 'Pınarbaşı / Kastamonu'),
(512, 37, 'Şenpazar'),
(513, 37, 'Ağlı'),
(514, 37, 'Doğanyurt'),
(515, 37, 'Hanönü'),
(516, 37, 'Seydiler'),
(517, 38, 'Bünyan'),
(518, 38, 'Develi'),
(519, 38, 'Felahiye'),
(520, 38, 'İncesu'),
(521, 38, 'Pınarbaşı / Kayseri'),
(522, 38, 'Sarıoğlan'),
(523, 38, 'Sarız'),
(524, 38, 'Tomarza'),
(525, 38, 'Yahyalı'),
(526, 38, 'Yeşilhisar'),
(527, 38, 'Akkışla'),
(528, 38, 'Talas'),
(529, 38, 'Kocasinan'),
(530, 38, 'Melikgazi'),
(531, 38, 'Hacılar'),
(532, 38, 'Özvatan'),
(533, 39, 'Babaeski'),
(534, 39, 'Demirköy'),
(535, 39, 'Kırklareli Merkez'),
(536, 39, 'Kofçaz'),
(537, 39, 'Lüleburgaz'),
(538, 39, 'Pehlivanköy'),
(539, 39, 'Pınarhisar'),
(540, 39, 'Vize'),
(541, 40, 'Çiçekdağı'),
(542, 40, 'Kaman'),
(543, 40, 'Kırşehir Merkez'),
(544, 40, 'Mucur'),
(545, 40, 'Akpınar'),
(546, 40, 'Akçakent'),
(547, 40, 'Boztepe'),
(548, 41, 'Gebze'),
(549, 41, 'Gölcük'),
(550, 41, 'Kandıra'),
(551, 41, 'Karamürsel'),
(552, 41, 'Körfez'),
(553, 41, 'Derince'),
(554, 41, 'Başiskele'),
(555, 41, 'Çayırova'),
(556, 41, 'Darıca'),
(557, 41, 'Dilovası'),
(558, 41, 'İzmit'),
(559, 41, 'Kartepe'),
(560, 42, 'Akşehir'),
(561, 42, 'Beyşehir'),
(562, 42, 'Bozkır'),
(563, 42, 'Cihanbeyli'),
(564, 42, 'Çumra'),
(565, 42, 'Doğanhisar'),
(566, 42, 'Ereğli / Konya'),
(567, 42, 'Hadim'),
(568, 42, 'Ilgın'),
(569, 42, 'Kadınhanı'),
(570, 42, 'Karapınar'),
(571, 42, 'Kulu'),
(572, 42, 'Sarayönü'),
(573, 42, 'Seydişehir'),
(574, 42, 'Yunak'),
(575, 42, 'Akören'),
(576, 42, 'Altınekin'),
(577, 42, 'Derebucak'),
(578, 42, 'Hüyük'),
(579, 42, 'Karatay'),
(580, 42, 'Meram'),
(581, 42, 'Selçuklu'),
(582, 42, 'Taşkent'),
(583, 42, 'Ahırlı'),
(584, 42, 'Çeltik'),
(585, 42, 'Derbent'),
(586, 42, 'Emirgazi'),
(587, 42, 'Güneysınır'),
(588, 42, 'Halkapınar'),
(589, 42, 'Tuzlukçu'),
(590, 42, 'Yalıhüyük'),
(591, 43, 'Altıntaş'),
(592, 43, 'Domaniç'),
(593, 43, 'Emet'),
(594, 43, 'Gediz'),
(595, 43, 'Kütahya Merkez'),
(596, 43, 'Simav'),
(597, 43, 'Tavşanlı'),
(598, 43, 'Aslanapa'),
(599, 43, 'Dumlupınar'),
(600, 43, 'Hisarcık'),
(601, 43, 'Şaphane'),
(602, 43, 'Çavdarhisar'),
(603, 43, 'Pazarlar'),
(604, 44, 'Akçadağ'),
(605, 44, 'Arapgir'),
(606, 44, 'Arguvan'),
(607, 44, 'Darende'),
(608, 44, 'Doğanşehir'),
(609, 44, 'Hekimhan'),
(610, 44, 'Pütürge'),
(611, 44, 'Yeşilyurt / Malatya'),
(612, 44, 'Battalgazi'),
(613, 44, 'Doğanyol'),
(614, 44, 'Kale / Malatya'),
(615, 44, 'Kuluncak'),
(616, 44, 'Yazıhan'),
(617, 45, 'Akhisar'),
(618, 45, 'Alaşehir'),
(619, 45, 'Demirci'),
(620, 45, 'Gördes'),
(621, 45, 'Kırkağaç'),
(622, 45, 'Kula'),
(623, 45, 'Salihli'),
(624, 45, 'Sarıgöl'),
(625, 45, 'Saruhanlı'),
(626, 45, 'Selendi'),
(627, 45, 'Soma'),
(628, 45, 'Turgutlu'),
(629, 45, 'Ahmetli'),
(630, 45, 'Gölmarmara'),
(631, 45, 'Köprübaşı / Manisa'),
(632, 45, 'Şehzadeler'),
(633, 45, 'Yunusemre'),
(634, 46, 'Afşin'),
(635, 46, 'Andırın'),
(636, 46, 'Elbistan'),
(637, 46, 'Göksun'),
(638, 46, 'Pazarcık'),
(639, 46, 'Türkoğlu'),
(640, 46, 'Çağlayancerit'),
(641, 46, 'Ekinözü'),
(642, 46, 'Nurhak'),
(643, 46, 'Dulkadiroğlu'),
(644, 46, 'Onikişubat'),
(645, 47, 'Derik'),
(646, 47, 'Kızıltepe'),
(647, 47, 'Mazıdağı'),
(648, 47, 'Midyat'),
(649, 47, 'Nusaybin'),
(650, 47, 'Ömerli'),
(651, 47, 'Savur'),
(652, 47, 'Dargeçit'),
(653, 47, 'Yeşilli'),
(654, 47, 'Artuklu'),
(655, 48, 'Bodrum'),
(656, 48, 'Datça'),
(657, 48, 'Fethiye'),
(658, 48, 'Köyceğiz'),
(659, 48, 'Marmaris'),
(660, 48, 'Milas'),
(661, 48, 'Ula'),
(662, 48, 'Yatağan'),
(663, 48, 'Dalaman'),
(664, 48, 'Ortaca'),
(665, 48, 'Kavaklıdere'),
(666, 48, 'Menteşe'),
(667, 48, 'Seydikemer'),
(668, 49, 'Bulanık'),
(669, 49, 'Malazgirt'),
(670, 49, 'Muş Merkez'),
(671, 49, 'Varto'),
(672, 49, 'Hasköy'),
(673, 49, 'Korkut'),
(674, 50, 'Avanos'),
(675, 50, 'Derinkuyu'),
(676, 50, 'Gülşehir'),
(677, 50, 'Hacıbektaş'),
(678, 50, 'Kozaklı'),
(679, 50, 'Nevşehir Merkez'),
(680, 50, 'Ürgüp'),
(681, 50, 'Acıgöl'),
(682, 51, 'Bor'),
(683, 51, 'Çamardı'),
(684, 51, 'Niğde Merkez'),
(685, 51, 'Ulukışla'),
(686, 51, 'Altunhisar'),
(687, 51, 'Çiftlik'),
(688, 52, 'Akkuş'),
(689, 52, 'Aybastı'),
(690, 52, 'Fatsa'),
(691, 52, 'Gölköy'),
(692, 52, 'Korgan'),
(693, 52, 'Kumru'),
(694, 52, 'Mesudiye'),
(695, 52, 'Perşembe'),
(696, 52, 'Ulubey / Ordu'),
(697, 52, 'Ünye'),
(698, 52, 'Gülyalı'),
(699, 52, 'Gürgentepe'),
(700, 52, 'Çamaş'),
(701, 52, 'Çatalpınar'),
(702, 52, 'Çaybaşı'),
(703, 52, 'İkizce'),
(704, 52, 'Kabadüz'),
(705, 52, 'Kabataş'),
(706, 52, 'Altınordu'),
(707, 53, 'Ardeşen'),
(708, 53, 'Çamlıhemşin'),
(709, 53, 'Çayeli'),
(710, 53, 'Fındıklı'),
(711, 53, 'İkizdere'),
(712, 53, 'Kalkandere'),
(713, 53, 'Pazar / Rize'),
(714, 53, 'Rize Merkez'),
(715, 53, 'Güneysu'),
(716, 53, 'Derepazarı'),
(717, 53, 'Hemşin'),
(718, 53, 'İyidere'),
(719, 54, 'Akyazı'),
(720, 54, 'Geyve'),
(721, 54, 'Hendek'),
(722, 54, 'Karasu'),
(723, 54, 'Kaynarca'),
(724, 54, 'Sapanca'),
(725, 54, 'Kocaali'),
(726, 54, 'Pamukova'),
(727, 54, 'Taraklı'),
(728, 54, 'Ferizli'),
(729, 54, 'Karapürçek'),
(730, 54, 'Söğütlü'),
(731, 54, 'Adapazarı'),
(732, 54, 'Arifiye'),
(733, 54, 'Erenler'),
(734, 54, 'Serdivan'),
(735, 55, 'Alaçam'),
(736, 55, 'Bafra'),
(737, 55, 'Çarşamba'),
(738, 55, 'Havza'),
(739, 55, 'Kavak'),
(740, 55, 'Ladik'),
(741, 55, 'Terme'),
(742, 55, 'Vezirköprü'),
(743, 55, 'Asarcık'),
(744, 55, '19 Mayıs'),
(745, 55, 'Salıpazarı'),
(746, 55, 'Tekkeköy'),
(747, 55, 'Ayvacık / Samsun'),
(748, 55, 'Yakakent'),
(749, 55, 'Atakum'),
(750, 55, 'Canik'),
(751, 55, 'İlkadım'),
(752, 56, 'Baykan'),
(753, 56, 'Eruh'),
(754, 56, 'Kurtalan'),
(755, 56, 'Pervari'),
(756, 56, 'Siirt Merkez'),
(757, 56, 'Şirvan'),
(758, 56, 'Tillo'),
(759, 57, 'Ayancık'),
(760, 57, 'Boyabat'),
(761, 57, 'Durağan'),
(762, 57, 'Erfelek'),
(763, 57, 'Gerze'),
(764, 57, 'Sinop Merkez'),
(765, 57, 'Türkeli'),
(766, 57, 'Dikmen'),
(767, 57, 'Saraydüzü'),
(768, 58, 'Divriği'),
(769, 58, 'Gemerek'),
(770, 58, 'Gürün'),
(771, 58, 'Hafik'),
(772, 58, 'İmranlı'),
(773, 58, 'Kangal'),
(774, 58, 'Koyulhisar'),
(775, 58, 'Sivas Merkez'),
(776, 58, 'Suşehri'),
(777, 58, 'Şarkışla'),
(778, 58, 'Yıldızeli'),
(779, 58, 'Zara'),
(780, 58, 'Akıncılar'),
(781, 58, 'Altınyayla / Sivas'),
(782, 58, 'Doğanşar'),
(783, 58, 'Gölova'),
(784, 58, 'Ulaş'),
(785, 59, 'Çerkezköy'),
(786, 59, 'Çorlu'),
(787, 59, 'Hayrabolu'),
(788, 59, 'Malkara'),
(789, 59, 'Muratlı'),
(790, 59, 'Saray / Tekirdağ'),
(791, 59, 'Şarköy'),
(792, 59, 'Marmaraereğlisi'),
(793, 59, 'Ergene'),
(794, 59, 'Süleymanpaşa'),
(795, 60, 'Almus'),
(796, 60, 'Artova'),
(797, 60, 'Erbaa'),
(798, 60, 'Niksar'),
(799, 60, 'Reşadiye'),
(800, 60, 'Tokat Merkez'),
(801, 60, 'Turhal'),
(802, 60, 'Zile'),
(803, 60, 'Pazar / Tokat'),
(804, 60, 'Yeşilyurt / Tokat'),
(805, 60, 'Başçiftlik'),
(806, 60, 'Sulusaray'),
(807, 61, 'Akçaabat'),
(808, 61, 'Araklı'),
(809, 61, 'Arsin'),
(810, 61, 'Çaykara'),
(811, 61, 'Maçka'),
(812, 61, 'Of'),
(813, 61, 'Sürmene'),
(814, 61, 'Tonya'),
(815, 61, 'Vakfıkebir'),
(816, 61, 'Yomra'),
(817, 61, 'Beşikdüzü'),
(818, 61, 'Şalpazarı'),
(819, 61, 'Çarşıbaşı'),
(820, 61, 'Dernekpazarı'),
(821, 61, 'Düzköy'),
(822, 61, 'Hayrat'),
(823, 61, 'Köprübaşı / Trabzon'),
(824, 61, 'Ortahisar'),
(825, 62, 'Çemişgezek'),
(826, 62, 'Hozat'),
(827, 62, 'Mazgirt'),
(828, 62, 'Nazımiye'),
(829, 62, 'Ovacık / Tunceli'),
(830, 62, 'Pertek'),
(831, 62, 'Pülümür'),
(832, 62, 'Tunceli Merkez'),
(833, 63, 'Akçakale'),
(834, 63, 'Birecik'),
(835, 63, 'Bozova'),
(836, 63, 'Ceylanpınar'),
(837, 63, 'Halfeti'),
(838, 63, 'Hilvan'),
(839, 63, 'Siverek'),
(840, 63, 'Suruç'),
(841, 63, 'Viranşehir'),
(842, 63, 'Harran'),
(843, 63, 'Eyyübiye'),
(844, 63, 'Haliliye'),
(845, 63, 'Karaköprü'),
(846, 64, 'Banaz'),
(847, 64, 'Eşme'),
(848, 64, 'Karahallı'),
(849, 64, 'Sivaslı'),
(850, 64, 'Ulubey / Uşak'),
(851, 64, 'Uşak Merkez'),
(852, 65, 'Başkale'),
(853, 65, 'Çatak'),
(854, 65, 'Erciş'),
(855, 65, 'Gevaş'),
(856, 65, 'Gürpınar'),
(857, 65, 'Muradiye'),
(858, 65, 'Özalp'),
(859, 65, 'Bahçesaray'),
(860, 65, 'Çaldıran'),
(861, 65, 'Edremit / Van'),
(862, 65, 'Saray / Van'),
(863, 65, 'İpekyolu'),
(864, 65, 'Tuşba'),
(865, 66, 'Akdağmadeni'),
(866, 66, 'Boğazlıyan'),
(867, 66, 'Çayıralan'),
(868, 66, 'Çekerek'),
(869, 66, 'Sarıkaya'),
(870, 66, 'Sorgun'),
(871, 66, 'Şefaatli'),
(872, 66, 'Yerköy'),
(873, 66, 'Yozgat Merkez'),
(874, 66, 'Aydıncık / Yozgat'),
(875, 66, 'Çandır'),
(876, 66, 'Kadışehri'),
(877, 66, 'Saraykent'),
(878, 66, 'Yenifakılı'),
(879, 67, 'Çaycuma'),
(880, 67, 'Devrek'),
(881, 67, 'Ereğli / Zonguldak'),
(882, 67, 'Zonguldak Merkez'),
(883, 67, 'Alaplı'),
(884, 67, 'Gökçebey'),
(885, 68, 'Aksaray Merkez'),
(886, 68, 'Ortaköy / Aksaray'),
(887, 68, 'Ağaçören'),
(888, 68, 'Güzelyurt'),
(889, 68, 'Sarıyahşi'),
(890, 68, 'Eskil'),
(891, 68, 'Gülağaç'),
(892, 69, 'Bayburt Merkez'),
(893, 69, 'Aydıntepe'),
(894, 69, 'Demirözü'),
(895, 70, 'Ermenek'),
(896, 70, 'Karaman Merkez'),
(897, 70, 'Ayrancı'),
(898, 70, 'Kazımkarabekir'),
(899, 70, 'Başyayla'),
(900, 70, 'Sarıveliler'),
(901, 71, 'Delice'),
(902, 71, 'Keskin'),
(903, 71, 'Kırıkkale Merkez'),
(904, 71, 'Sulakyurt'),
(905, 71, 'Bahşili'),
(906, 71, 'Balışeyh'),
(907, 71, 'Çelebi'),
(908, 71, 'Karakeçili'),
(909, 71, 'Yahşihan'),
(910, 72, 'Batman Merkez'),
(911, 72, 'Beşiri'),
(912, 72, 'Gercüş'),
(913, 72, 'Kozluk'),
(914, 72, 'Sason'),
(915, 72, 'Hasankeyf'),
(916, 73, 'Beytüşşebap'),
(917, 73, 'Cizre'),
(918, 73, 'İdil'),
(919, 73, 'Silopi'),
(920, 73, 'Şırnak Merkez'),
(921, 73, 'Uludere'),
(922, 73, 'Güçlükonak'),
(923, 74, 'Bartın Merkez'),
(924, 74, 'Kurucaşile'),
(925, 74, 'Ulus'),
(926, 74, 'Amasra'),
(927, 75, 'Ardahan Merkez'),
(928, 75, 'Çıldır'),
(929, 75, 'Göle'),
(930, 75, 'Hanak'),
(931, 75, 'Posof'),
(932, 75, 'Damal'),
(933, 76, 'Aralık'),
(934, 76, 'Iğdır Merkez'),
(935, 76, 'Tuzluca'),
(936, 76, 'Karakoyunlu'),
(937, 77, 'Yalova Merkez'),
(938, 77, 'Altınova'),
(939, 77, 'Armutlu'),
(940, 77, 'Çınarcık'),
(941, 77, 'Çiftlikköy'),
(942, 77, 'Termal'),
(943, 78, 'Eflani'),
(944, 78, 'Eskipazar'),
(945, 78, 'Karabük Merkez'),
(946, 78, 'Ovacık / Karabük'),
(947, 78, 'Safranbolu'),
(948, 78, 'Yenice / Karabük'),
(949, 79, 'Kilis Merkez'),
(950, 79, 'Elbeyli'),
(951, 79, 'Musabeyli'),
(952, 79, 'Polateli'),
(953, 80, 'Bahçe'),
(954, 80, 'Kadirli'),
(955, 80, 'Osmaniye Merkez'),
(956, 80, 'Düziçi'),
(957, 80, 'Hasanbeyli'),
(958, 80, 'Sumbas'),
(959, 80, 'Toprakkale'),
(960, 81, 'Akçakoca'),
(961, 81, 'Düzce Merkez'),
(962, 81, 'Yığılca'),
(963, 81, 'Cumayeri'),
(964, 81, 'Gölyaka'),
(965, 81, 'Çilimli'),
(966, 81, 'Gümüşova'),
(967, 81, 'Kaynaşlı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_iletisim`
--

CREATE TABLE IF NOT EXISTS `tbl_iletisim` (
`id` int(11) NOT NULL,
  `facebook` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `gmail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `github` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `web_site` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_komisyon`
--

CREATE TABLE IF NOT EXISTS `tbl_komisyon` (
`id` int(11) NOT NULL,
  `adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `onay` int(11) NOT NULL,
  `foto` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimda` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_kullanici`
--

CREATE TABLE IF NOT EXISTS `tbl_kullanici` (
`id` int(11) NOT NULL,
  `adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `soyadi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `onay` int(11) NOT NULL,
  `foto` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimda` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_kullanici`
--

INSERT INTO `tbl_kullanici` (`id`, `adi`, `soyadi`, `mail`, `parola`, `rol`, `onay`, `foto`, `hakkimda`) VALUES
(1, 'Komisyon', '', 'komisyon@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 1, 'profil/komisyon.jpg', 'Yazılım Muhendisligi Bittas komisyonu'),
(2, 'Eyüp', 'Gedikli', 'gediklieyup@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 'profil/eyupgedikli.png', '4. Sınıf Tasarım Projelerinde Sorumlu Danışman'),
(3, 'Mustafa', 'Zorbaz', 'mustafazorbaz@hotmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/8883d440012a3571c09558fda8897ee7.jpg', '4. Sınıf Öğrencisi'),
(4, 'Sefa', 'Durmaz', 'yzmsefa@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/sefa.png', '4. Sınıf öğrencisi'),
(5, 'Celal', 'Atalar', 'celalatalar@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 'profil/celal_atalar.jpg', 'Öğretim görevlisi'),
(6, 'Özcan', 'Özyurt', 'oozyurt@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 'profil/özcan özyurt.jpg', '.'),
(8, 'H. Tolga', 'Kahraman', 'htolgakahraman@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 'profil/tolga-kahraman.jpg', '.'),
(9, 'Hacer', 'Özyurt', 'hacerozyurt@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 'profil/hacer-ozyurt.jpg', '.'),
(13, 'Halit', 'Ak', 'halitak@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/ae6771b68da60f57999f39323e56e567.jpg', '.'),
(15, 'Burak', 'Fırat', 'burakfiratz@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/e111de6d3e9ac8775ee88529f8b008c8.jpg', '.'),
(16, 'Zeyit', 'Başar', 'zeyitbasar@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/ba325ec0b511790dcd8499b1467a4f88.jpg', '.'),
(17, 'Mehmethan', 'Yüksel', 'mehmethanyuksel@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/240368b9d06680f7731234142189d290.jpg', 'Alanya/ANTALYA\r\n'),
(18, 'Ömür', 'Buruk', 'omurburuk@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/9fb0b30599d9157d0718a40881184d23.jpg', '.'),
(19, 'Said', 'Maraba', 'saidmaraba@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 1, 'profil/d5b6372a7689a94fde31b32d01eb8b1f.jpg', '.'),
(20, '', '', 'hidayetkara@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 0, 'profil/user.png', ''),
(21, '', '', 'sametetiz@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 0, 'profil/user.png', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_mesaj`
--

CREATE TABLE IF NOT EXISTS `tbl_mesaj` (
`id` int(11) NOT NULL,
  `gonderen_id` int(11) NOT NULL,
  `alici_id` int(11) NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `tarih` varchar(25) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_mesaj`
--

INSERT INTO `tbl_mesaj` (`id`, `gonderen_id`, `alici_id`, `konu`, `mesaj`, `durum`, `tarih`) VALUES
(1, 2, 4, 'Proje Hakkında', '<p>Sefa projenin raporlarını bu hafta gönder yoksa <u><b></b></u><b>almam</b><b></b>.<u></u><u></u></p><p><br></p>', 1, '9-1-2017'),
(2, 2, 16, 'Rapor Düzenlemesi', '<p>Zeyit raporlarını çivi yazısı ile yazma :)</p>', 0, '9-1-2017'),
(3, 2, 13, 'Projen İşe Yaramaz', '<p>Halit projeni yeniden gözden geçir yanıma gel.</p>', 0, '9-1-2017'),
(4, 2, 6, 'Hocam Bu Bir Deneme Dikkate Almayın ', '<p>deneme 123 deneme&nbsp;</p>', 0, '9-1-2017'),
(5, 2, 3, 'Selam', '<p>Tasarım projesinin evrakları bu hafta son</p>', 1, '9-1-2017'),
(6, 3, 2, 'Evrak Teslimi', '<p>Bugün teslim ederim hocam</p>', 0, '9-1-2017'),
(7, 3, 4, 'Evrak Teslimi Edilecek', '<p>Eyüp hoca mesaj att evrakları bugün teslim edelim.</p>', 1, '9-1-2017'),
(8, 3, 13, 'Evrak Teslimi Edilecek', '<p>Eyüp hoca mesaj attı evrakları bugün teslim edicez.Sefaya da mesaj attım.</p>', 0, '9-1-2017'),
(9, 4, 3, 'tamam', '<p>Bugün verelim &nbsp;</p>', 0, '9-1-2017'),
(10, 4, 2, 'Evrak Teslimi Edilecek', '<p>Bugün teslim edeceğiz hocam.</p>', 0, '9-1-2017'),
(13, 8, 4, 'Sınav Notu', '<p>Sefa 45 aldın&nbsp;</p>', 0, '9-1-2017'),
(14, 8, 2, 'Bitirme Projeleri', '<p>Hocam &nbsp;bitirme projesi için toplantı yapalım bu hafta müsaitseniz.</p>', 0, '9-1-2017');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ogrenci`
--

CREATE TABLE IF NOT EXISTS `tbl_ogrenci` (
`id` int(11) NOT NULL,
  `numara` int(15) NOT NULL,
  `cinsiyet` int(11) NOT NULL,
  `d_tarihi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `il` int(11) NOT NULL,
  `ilce` int(11) NOT NULL,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `uni` int(11) NOT NULL,
  `fakulte` int(11) NOT NULL,
  `bolum` int(11) NOT NULL,
  `sinif` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1012 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_ogrenci`
--

INSERT INTO `tbl_ogrenci` (`id`, `numara`, `cinsiyet`, `d_tarihi`, `il`, `ilce`, `adres`, `uni`, `fakulte`, `bolum`, `sinif`, `user_id`) VALUES
(1000, 305410, 1, '', 7, -1, 'Akyar Mah. Akyar Sok. No:309', 1, -1, -1, 4, 3),
(1001, 305419, 0, '', 1, -1, 'Şehitler mahallesi mezgitönü sokak 2000 li yapı kooperatifi no:26  Niğde/Merkez', -1, -1, -1, 0, 4),
(1003, 305401, 1, '', 1, -1, 'Adana Merkez', 1, -1, -1, 4, 13),
(1005, 305408, 1, '', 34, -1, 'Trabya Yalılar Sokak Fıratlar YALI No:6556496', 1, -1, -1, 0, 15),
(1006, 305420, 1, '', 1, -1, 'Karaman Karakoyun Mah. Sok. Karacaoğlan Bulvar koyunlu No:0001', 1, -1, -1, 4, 16),
(1007, 305427, 1, '', 7, -1, 'Alanya Kale Mah. Kalekale Sokak No:6546', 1, -1, -1, 4, 17),
(1008, 305429, 1, '', 61, -1, 'Akçabat', 1, -1, -1, 4, 18),
(1009, 305409, 1, '', 35, -1, 'Şehidler Caddesi 1502 Sokak No:2 Alsancak/İZMİR', 1, -1, -1, 4, 19),
(1010, 502404, 0, '', 0, 0, '', 0, 0, 0, 0, 20),
(1011, 456963, 0, '', 0, 0, '', 0, 0, 0, 0, 21);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ogrenci_danisman`
--

CREATE TABLE IF NOT EXISTS `tbl_ogrenci_danisman` (
`id` int(10) NOT NULL,
  `ogr_id` int(5) NOT NULL,
  `danisma_id` int(5) NOT NULL,
  `onay` int(1) NOT NULL,
  `proje_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_ogrenci_danisman`
--

INSERT INTO `tbl_ogrenci_danisman` (`id`, `ogr_id`, `danisma_id`, `onay`, `proje_id`) VALUES
(1, 1001, 1, 1, 1),
(2, 1000, 1, 1, 11),
(3, 1000, 3, 0, 11),
(4, 1000, 5, 0, 11),
(5, 1000, 6, 0, 11),
(6, 1006, 5, 1, 6),
(7, 1006, 2, 0, 6),
(8, 1001, 3, 0, 6),
(9, 1001, 5, 1, 6),
(10, 1007, 3, 1, 15),
(11, 1007, 5, 0, 15),
(12, 1009, 5, 1, 13),
(13, 1009, 1, 0, 13),
(14, 1009, 3, 0, 13),
(15, 1009, 6, 0, 13),
(16, 1009, 2, 0, 13),
(17, 1009, 1, 0, 19),
(18, 1009, 3, 1, 19),
(19, 1009, 6, 0, 19);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_ogrenci_proje`
--

CREATE TABLE IF NOT EXISTS `tbl_ogrenci_proje` (
`id` int(5) NOT NULL,
  `ogrenci_id` int(5) NOT NULL,
  `proje_id` int(5) NOT NULL,
  `onay` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_ogrenci_proje`
--

INSERT INTO `tbl_ogrenci_proje` (`id`, `ogrenci_id`, `proje_id`, `onay`) VALUES
(1, 1001, 1, 0),
(2, 1001, 2, 0),
(3, 1000, 3, 0),
(4, 1000, 11, 1),
(5, 1000, 13, 0),
(6, 1000, 4, 0),
(7, 1005, 4, 0),
(9, 1005, 6, 0),
(10, 1008, 14, 1),
(11, 1008, 13, 0),
(12, 1001, 6, 1),
(13, 1006, 6, 1),
(14, 1006, 4, 0),
(17, 1007, 15, 1),
(18, 1007, 4, 0),
(19, 1007, 6, 0),
(21, 1007, 16, 1),
(22, 1007, 9, 0),
(25, 1009, 19, 1),
(26, 1009, 13, 0),
(27, 1009, 18, 0),
(28, 1009, 17, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_proje`
--

CREATE TABLE IF NOT EXISTS `tbl_proje` (
`id` int(5) NOT NULL,
  `oneren_id` int(5) NOT NULL,
  `adi` text COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `turu` int(1) NOT NULL,
  `accept_date` date NOT NULL,
  `end_date` date NOT NULL,
  `kisi_sayisi` int(3) NOT NULL,
  `danisman_sayisi` int(5) NOT NULL,
  `projedurum_id` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_proje`
--

INSERT INTO `tbl_proje` (`id`, `oneren_id`, `adi`, `konu`, `turu`, `accept_date`, `end_date`, `kisi_sayisi`, `danisman_sayisi`, `projedurum_id`) VALUES
(1, 1001, 'Yapı Kontrol Otomasyonu', 'İnşaat firmalarının yapı malzemeleri ile ilgili işlemlerin yapıldığu otomasyondur.', 1, '2017-01-09', '0000-00-00', 1, 1, 1),
(2, 1001, 'Tarım İlaçları Takip Otomasyonu', 'Zirai tarım ilaçlarının bilgilerinin  kayıt ortamına alındığı ve işlemlerinin yapıldığı sistemdir.', 1, '0000-00-00', '0000-00-00', 1, 1, 0),
(3, 1000, 'Dişçi Otomasyonu', 'Diş polikliniklerinin hasta kayıtlarını ve randevularını  düzenli bir şekilde takip edilmesinden kullanılacak sistemdir.', 1, '0000-00-00', '0000-00-00', 1, 1, 0),
(4, 3, 'Algoritma Akış Diyagramları Tutorial', 'Algoritmadan akış diyagramlarını uygulayarak öğretecek bir eğitim uygulaması', 1, '0000-00-00', '0000-00-00', 2, 2, 1),
(6, 3, 'Yüz Algılama Sistemi', 'Güvenlik için bilgisayara girişte yüz algılaması yapan sistem', 1, '2017-01-09', '0000-00-00', 3, 1, 1),
(7, 2, 'Linux Sisteminin Çekirdeğine Erisme ve İnceleme Uygulaması', 'Linux dagilimlardan Ubuntu,Kali,Pardus ve  Mint  en az 2 si için yapılması gereklidir.', 2, '0000-00-00', '0000-00-00', 2, 1, 3),
(9, 6, 'Veri Yapıları Tutorial', 'Veri Yapıları dersi için  eğitim platformu oluşturma', 2, '2017-01-10', '0000-00-00', 1, 1, 1),
(10, 6, 'Veri Yapıları Android Tutorial', 'Android üzerinden eğitim platformu geliştirme', 2, '0000-00-00', '0000-00-00', 2, 1, 3),
(11, 6, 'Nesne Yönelimli Tutorial', 'Scrum modelini kullanarak nesne yönelimlimli tutorial uygulama geliştirme', 1, '2017-01-09', '0000-00-00', 1, 1, 1),
(12, 5, 'Yapay Zeka İle İnsansı Robol Similasyonu Yapma', 'Yapay zeka genetik algoritmanıs ve Yapay Sinir ağlarını kullanarak insansı robot similasyonu gerçekleştirme', 3, '0000-00-00', '0000-00-00', 3, 1, 2),
(13, 5, 'Yapay Sinir Ağlar Similasyonu', 'Tasarım Desenlerinden en az 10 tane  kullarak  yapay sinir ağları similasyonu gelistirmek', 1, '2017-01-10', '0000-00-00', 1, 1, 1),
(14, 1008, 'hepsiburadaoradasurada.com', 'Alış-Veriş İnşaat,Yazılım,Giyim,Politika,Teknoloji,Astroloji,Gastronomi vs. tüm seçenekler hepsiburadaoradasurada.com da', 1, '2017-01-09', '0000-00-00', 3, 2, 1),
(15, 1007, 'Sosyal Medya Platformu', 'facebook,twitter vs. sosyal medyaların en iyi özelllikleri kullanılarak asp ile proje geliştirme', 1, '2017-01-10', '0000-00-00', 1, 1, 4),
(16, 1, 'Unit Test Otomasyon Sistemi', 'Birim testlerin kayıtlarını tutan otomasyon sistemi', 2, '2017-01-10', '0000-00-00', 2, 1, 1),
(17, 1, 'Turing Makinesi Uygulaması', 'Teorik olarak ve yazılımsal olarak projenin gerçeklenmesi', 2, '0000-00-00', '0000-00-00', 5, 2, 1),
(18, 1, 'Sosyal Staj Projesi', 'Bitime ve Tasarım için geçerli proje', 3, '0000-00-00', '0000-00-00', 1, 1, 1),
(19, 1, 'Sosyal Staj Projesi	', 'Bitirme ve tasarım projesidir', 1, '2017-01-10', '0000-00-00', 1, 1, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_projedurum`
--

CREATE TABLE IF NOT EXISTS `tbl_projedurum` (
  `id` int(5) NOT NULL,
  `durum` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_projedurum`
--

INSERT INTO `tbl_projedurum` (`id`, `durum`) VALUES
(0, 'Pasif'),
(1, 'Aktif'),
(2, 'Revize'),
(3, 'Ret'),
(4, 'Sonlandı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_projeturu`
--

CREATE TABLE IF NOT EXISTS `tbl_projeturu` (
  `id` int(5) NOT NULL,
  `tur` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_projeturu`
--

INSERT INTO `tbl_projeturu` (`id`, `tur`) VALUES
(1, 'Tasarım Projesi'),
(2, 'Bitirime Projesi'),
(3, 'Bitirme Projesi(Tasarım Projesi)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_rapor`
--

CREATE TABLE IF NOT EXISTS `tbl_rapor` (
  `proje_id` int(5) NOT NULL,
`id` int(5) NOT NULL,
  `org_id` int(5) NOT NULL,
  `rapor_url` text COLLATE utf8_turkish_ci NOT NULL,
  `date` date NOT NULL,
  `puan` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_rapor`
--

INSERT INTO `tbl_rapor` (`proje_id`, `id`, `org_id`, `rapor_url`, `date`, `puan`) VALUES
(6, 1, 1006, 'raporlar/zeyit-basar-tasarm-projesi-raporu v1.0.rar', '2017-01-09', 0),
(6, 2, 1006, 'raporlar/zeyit-basar-tasarm-projesi-raporu v1.1.rar', '2017-01-09', 0),
(6, 3, 1006, 'raporlar/zeyit-basar-tasarm-projesi-raporu v1.2.rar', '2017-01-09', 0),
(6, 4, 1001, 'raporlar/sefa-durmaz-tasarm-projesi-raporu v1.0.rar', '2017-01-09', 0),
(6, 5, 1001, 'raporlar/sefa-durmaz-tasarm-projesi-raporu v1.1.rar', '2017-01-09', 0),
(11, 6, 1000, 'raporlar/mustafa-zorbaz-tasarm-projesi-raporu v1.0 genel test.rar', '2017-01-09', 0),
(11, 7, 1000, 'raporlar/mustafa-zorbaz-tasarm-projesi-raporu v1.1 birim testleri.rar', '2017-01-09', 0),
(15, 8, 1007, 'raporlar/Memehthan-yüksel-tasarım-projesi V.1.0.rar', '2017-01-10', 0),
(19, 10, 1009, 'raporlar/Said-maraba-tasarım-projesi V.1.0.rar', '2017-01-10', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_rol`
--

CREATE TABLE IF NOT EXISTS `tbl_rol` (
`id` int(11) NOT NULL,
  `rol` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_rol`
--

INSERT INTO `tbl_rol` (`id`, `rol`) VALUES
(1, 'Öğrenci'),
(2, 'Akademisyen'),
(3, 'işyeri');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tbl_uni`
--

CREATE TABLE IF NOT EXISTS `tbl_uni` (
`id` int(11) NOT NULL,
  `uni_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `tbl_uni`
--

INSERT INTO `tbl_uni` (`id`, `uni_adi`) VALUES
(1, 'Karadeniz Teknik Üniversitesi'),
(2, 'Sakarya university');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tbl_bolum`
--
ALTER TABLE `tbl_bolum`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_danisman`
--
ALTER TABLE `tbl_danisman`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `tc_kimlik_no` (`tc`);

--
-- Tablo için indeksler `tbl_fakulte`
--
ALTER TABLE `tbl_fakulte`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_il`
--
ALTER TABLE `tbl_il`
 ADD UNIQUE KEY `id` (`id`);

--
-- Tablo için indeksler `tbl_iletisim`
--
ALTER TABLE `tbl_iletisim`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_komisyon`
--
ALTER TABLE `tbl_komisyon`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_kullanici`
--
ALTER TABLE `tbl_kullanici`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_mesaj`
--
ALTER TABLE `tbl_mesaj`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_ogrenci`
--
ALTER TABLE `tbl_ogrenci`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_ogrenci_danisman`
--
ALTER TABLE `tbl_ogrenci_danisman`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_ogrenci_proje`
--
ALTER TABLE `tbl_ogrenci_proje`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_proje`
--
ALTER TABLE `tbl_proje`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_projedurum`
--
ALTER TABLE `tbl_projedurum`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_projeturu`
--
ALTER TABLE `tbl_projeturu`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_rapor`
--
ALTER TABLE `tbl_rapor`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_rol`
--
ALTER TABLE `tbl_rol`
 ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tbl_uni`
--
ALTER TABLE `tbl_uni`
 ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tbl_bolum`
--
ALTER TABLE `tbl_bolum`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_danisman`
--
ALTER TABLE `tbl_danisman`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_fakulte`
--
ALTER TABLE `tbl_fakulte`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_iletisim`
--
ALTER TABLE `tbl_iletisim`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_komisyon`
--
ALTER TABLE `tbl_komisyon`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_kullanici`
--
ALTER TABLE `tbl_kullanici`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_mesaj`
--
ALTER TABLE `tbl_mesaj`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_ogrenci`
--
ALTER TABLE `tbl_ogrenci`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1012;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_ogrenci_danisman`
--
ALTER TABLE `tbl_ogrenci_danisman`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_ogrenci_proje`
--
ALTER TABLE `tbl_ogrenci_proje`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_proje`
--
ALTER TABLE `tbl_proje`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_rapor`
--
ALTER TABLE `tbl_rapor`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_rol`
--
ALTER TABLE `tbl_rol`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `tbl_uni`
--
ALTER TABLE `tbl_uni`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
