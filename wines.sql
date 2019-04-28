-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 28, 2019 at 11:29 AM
-- Server version: 5.5.56
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `21354000`
--

-- --------------------------------------------------------

--
-- Table structure for table `wines`
--

CREATE TABLE `wines` (
  `wineID` int(22) NOT NULL,
  `wineName` varchar(40) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `typeID` varchar(22) NOT NULL,
  `originID` varchar(88) NOT NULL,
  `picture` varchar(2080) NOT NULL,
  `available` int(22) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `year` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wines`
--

INSERT INTO `wines` (`wineID`, `wineName`, `price`, `typeID`, `originID`, `picture`, `available`, `code`, `year`) VALUES
(2, 'World\'s End Rocksteady', '100.00', 'Red', 'USA', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/d/e/de_montille_greves_web.jpg', 44, 'aaaa', 1959),
(3, 'Domaine de Montille', '220.00', 'Red', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/d/e/de_montille_malconsorts_web.jpg', 44, 'bbbb', 2000),
(4, 'Varner Foxglove', '105.50', 'Red', 'USA', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/f/o/foxglove_zinfandel_new_web_6_2.jpg', 44, 'cccc', 1984),
(5, 'Eisele Vineyard', '49.99', 'Red', 'USA', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/e/i/eisele_alta_cab_web.jpg', 44, 'dddd', NULL),
(6, 'Domaine Francois Raquillet ', '100.00', 'Red', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/r/a/raquillet_mercurey_vv_web.jpg', 44, 'eeee', NULL),
(7, 'Castello di Neive', '75.00', 'White', 'Italy', 'https://cdn1.wine-searcher.net/images/labels/23/17/castello-di-neive-sulfites-free-barbera-d-alba-piedmont-italy-10902317.jpg', 44, 'ffff', NULL),
(8, 'Vette di San Leonardo ', '115.75', 'White', 'Italy', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/v/e/vette_web_6_1_1.jpg', 44, 'gggg', NULL),
(9, 'Ch&#226;teau Graville-Lacoste', '84.80', 'White', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/g/r/graville-lacoste_web.jpg', 44, 'hhhh', NULL),
(10, 'Pic and Chapoutier', '100.00', 'White', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/p/i/pic_chapoutier_peray_web.jpg', 44, 'iiii', NULL),
(11, 'Alpha Domus', '100.00', 'White', 'New Zealand', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/t/h/the_pilot_sauv.jpg', 44, 'jjjj', NULL),
(12, 'Wiston Estate Ros&#233;', '69.50', 'Sparkiling', 'Australia', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/w/i/wiston_rose_14_web_1.jpg', 50, 'kkkk', NULL),
(13, 'Krug Champagne', '211.00', 'Sparkling', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/k/r/krug_nv_web.jpg', 30, 'llll', NULL),
(14, 'Bollinger R.D. Champagne', '128.40', 'Sparkling', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/b/o/bollinger_web_2_2.jpg', 10, 'mmmm', NULL),
(15, 'Dom P&#233;rignon Ros&#233;', '245.00', 'Sparkling', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/d/o/dom_p_rose_gift_box_1_.jpg', 9, 'nnnn', NULL),
(16, 'Nyetimber B. de Blancs magnum', '138.00', 'Sparkling', 'UK', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/n/y/nyetimber_bdb_07_wb_web.jpg', 30, 'oooo', NULL),
(17, 'Nyetimber Blanc de Blancs', '118.00', 'Sparkling', 'UK', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/n/y/nyetimber_bb_no_badge_web.jpg', 9, 'pppp', NULL),
(18, 'Dom Perignon', '140.00', 'Sparkling', 'France', 'https://www.honestgrapes.co.uk/pub/media/catalog/product/cache/a95ad56dd2a79ef00be2f8cdc9ab0431/d/o/dom_perignon_2008_web.jpg', 52, 'qqqq', NULL),
(19, 'Celler Alimara Llumi Rosat', '81.95', 'Rose', 'Spain', 'https://i.ibb.co/Dfk2j2R/llumi-rosat-6.jpg', 80, 'rrrr', NULL),
(20, 'Dal Bello Rosa della Regina', '59.90', 'Sparkling', 'Italy', 'https://i.ibb.co/bNzpRkM/rose1.jpg', 65, 'ssss', NULL),
(21, '2016 Chateau Pontet Labrie', '151.00', 'Red', 'France', 'https://cdn1.wine-searcher.net/images/labels/60/77/chateau-pontet-labrie-saint-emilion-grand-cru-france-10906077.jpg', 8, 'a1', 2016),
(22, 'Quinta do Correio Tinto', '44.00', 'Red', 'Portugal', 'https://i.ibb.co/x8bSH2d/1469541680496.jpg', 71, 'a2', 2012),
(23, 'Philippe Pacalet Chenas', '37.40', 'Red', 'France', 'https://www.honestgrapes.co.uk/media/catalog/product/p/a/pacalet_chenas_web.jpg', 44, 'a3', 2016),
(24, 'Pattersons Reserve Chardonnay', '80.80', 'White', 'Australia', 'https://i.ibb.co/PCYnMtT/pattersons-chard.jpg', 35, 'a4', 2015),
(25, 'Whispering Angel', '60.00', 'Rose', 'France', 'https://i.ibb.co/qgGzqHP/738960-1.jpg', 55, 'a4', 2018),
(26, 'Quinta da Alorna 2017 Ros&#233;', '44.00', 'Rose', 'Portugal', 'https://i.ibb.co/JFmHfyt/quinta-da-alorna-2017-rose-wine.jpg', 26, 'a6', 2017),
(27, 'Beringer Zinfandel ros&#233;', '71.00', 'Rose', 'USA', 'https://i.ibb.co/xqGY2Lw/414-72052996-761058-A12-ALT10.jpg', 64, 'a7', 2012),
(28, '2018 Barton Winemaker\'s Reserve', '61.61', 'Red', 'South Africa', 'https://i.pinimg.com/originals/2c/36/67/2c3667f3c076e56ae0edc8899a46c339.png', 51, 'a5', 2018),
(29, 'Taittinger NV Brut Ros&#233;', '170.00', 'Sparkling', 'France', 'https://noblegrape.co.uk/pub/media/catalog/product/cache/small_image/380x514/beff4985b56e3afdbeabfc89641a4582/t/a/taittinger_r.png', 8, 'a9', NULL),
(30, 'Castello Di Torre Elephas', '60.00', 'White', 'Spain', 'https://www.honestgrapes.co.uk/media/catalog/product/e/l/elephas_bianco_15_web.png', 130, 'aa', 2015),
(31, 'Celler Alimara Llumi Blanc', '35.00', 'White', 'Spain', 'https://www.honestgrapes.co.uk/media/catalog/product/l/l/llumi_blanc_badge_web.jpg', 48, 'jha', NULL),
(32, 'Woodbrook 2016 Chardonnay', '28.00', 'White', 'Australia', 'https://noblegrape.co.uk/pub/media/catalog/product/cache/small_image/380x514/beff4985b56e3afdbeabfc89641a4582/w/o/woodbrookch.png', 62, 'qwdr', 2016),
(33, 'Felix Solis Penasol Mousseux', '91.00', 'Sparkling', 'Spain', 'https://i.ibb.co/mFqm17Z/10870891.jpg', 22, 'sdfg', NULL),
(34, 'Bozeto de Exopto Ros&#233;', '22.00', 'Rose', 'Spain', 'https://i.ibb.co/Gc4tCPq/36426-hr.jpg', 62, 'ggfg', NULL),
(35, 'Casal Mendes Rose, Bairrada', '22.00', 'Rose', 'Portugal', 'https://i.ibb.co/c6925y2/casal-mendes-rose-1095528-456x615.jpg', 31, 'sdf', NULL),
(36, 'Paco de Teixeiro Rose', '31.00', 'Rose', 'Portugal', 'https://i.ibb.co/G3Ldqw5/paco-de-teixeiro-rose-portugal-10569821.jpg', 28, 'ffg', NULL),
(37, ' Ca dei Frati \'Rosa dei Frati\'', '38.00', 'Rose', 'Italy', 'https://i.ibb.co/SVhM0X0/ca-dei-frati-rose.jpg', 17, 'sdvf', NULL),
(38, 'San Giorgio Pinot Grigio Rose', '22.00', 'Rose', 'Italy', 'https://i.ibb.co/RSkN7Q4/W0033-31986-1517256503-1280-1280.jpg', 6, 'sdft', NULL),
(39, 'Clos Des Brusquieres', '41.00', 'Red', 'France', 'https://www.honestgrapes.co.uk/media/catalog/product/b/r/brusquieres_nv_web.jpg', 11, 'asfh', 2010),
(40, 'Comprar Aster Finca El Otero', '71.00', 'Red', 'Portugal', 'https://i.ibb.co/9cD30fY/bot-aster-fincaelotero-2014.jpg', 4, 'dfhtk', 2014),
(41, 'Trapezio Malbec', '31.00', 'Red', 'Argentina', 'https://i.pinimg.com/originals/aa/ee/7b/aaee7bae48d047edd677b7dc36298ecc.png', 53, 'hjkghj', NULL),
(42, 'Ochota Barrels, The Fugazi Grenache', '91.19', 'Red', 'Australia', 'http://imbibe.com/wp-content/uploads/Ochota-barrels.png', 61, 'ykyhk', 2015);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wines`
--
ALTER TABLE `wines`
  ADD PRIMARY KEY (`wineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wines`
--
ALTER TABLE `wines`
  MODIFY `wineID` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
