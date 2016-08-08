-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 10:57 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--
CREATE DATABASE IF NOT EXISTS `c9` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `c9`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'our teas'),
(2, 'tea accessories');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parameter` varchar(50) NOT NULL,
  `value` varchar(200) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`id`, `parameter`, `value`) VALUES
(1, 'VAT', '50'),
(2, 'currency', 'shekel'),
(3, 'order_statuses', '{"1":"Received", "2":"Shipped", "3":"Cancelled"}');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE IF NOT EXISTS `details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `header_id` bigint(11) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` smallint(6) NOT NULL,
  `currency` varchar(10) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `header_id`, `product_id`, `product_name`, `product_qty`, `product_price`, `currency`) VALUES
(1, 1, 100001, 'BALANCE', 1, 12, '&#8362;'),
(2, 1, 100002, 'CHOCOLATE HONEYBUSH', 5, 12, '&#8362;'),
(3, 1, 100003, 'CLASSIC EARL GREY', 1, 12, '&#8362;'),
(4, 3, 100001, 'BALANCE', 3, 11, '&#8364;');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `customer_details` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `status`, `customer_details`, `total`) VALUES
(1, '2016-08-08 06:03:20', 1, '{"fname":"Anna","lname":"Ku","email":"anna@k","phone":"123-34-45","country":"Australia","zip":"123456","address":"QQQ st., 12\\/23"}', 84),
(3, '2016-08-08 22:18:57', 1, '{"fname":"Anna ","lname":"KU","email":"a@a","phone":"123-123-123","country":"Australia","zip":"123456","address":"11,qqq"}', 33);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `price` int(20) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100051 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img_path`, `category_id`, `price`) VALUES
(100001, 'BALANCE', 'For those long days when you''re too busy and overwhelmed to hit the yoga mat, our Balance herbal tea is like a stress-relieving, energy-boosting workout in a cup.\n\nTake a moment and let this spicy combo of cardamom, licorice, coriander, fennel, ginger roots and rose petals reinvigorate your body and give you the energy and balance you need to face the rest of your day.\n\nSteep for 5-7 minutes.  Longer steep times will enhance the licorice notes.\n\n* Note: Every 2 ounces (oz.) of tea can brew approximately 20 cups. (i.e. 2 oz. = 20 cups, 4 oz. = 40 cups, etc.)', 'Balance_Loose_large.jpg', 1, 10),
(100002, 'CHOCOLATE HONEYBUSH', 'Anyone who says chocolate can''t be good for you obviously hasn''t tried our Chocolate Honeybush tea.\n\nThis delectably creamy blend of honeybush, chocolate bits and rose petals is also packed full of antioxidants to fight aging and keep your complexion clear and glowing—and it''s still got zero calories! If drinking this tea is wrong, then you''ll never want to be right.\n\nSteep for 5-7 minutes. Longer steep times will enhance chocolate overtone.\n\n* Note: Every 2 ounces (oz.) of tea can brew approximately 20 cups. (i.e. 2 oz. = 20 cups, 4 oz. = 40 cups, etc.)', 'Honey_Bush_Loose_large.jpg', 1, 10),
(100003, 'CLASSIC EARL GREY', 'A cashmere sweater. A pearl necklace. The little black dress. Simple things always stay classic.\n\nOur Earl Grey stays true to the classic traditional blend of Chinese black tea flavored with bergamot for its signature full-bodied citrus taste. Want to spin a classic? Try with milk and sugar.\n\nSteep for 3-5 minutes. Longer steep times increase the tea''s acidity (great for adding milk and sugar).\n\n* Note: Every 2 ounces (oz.) of tea can brew approximately 20 cups. (i.e. 2 oz. = 20 cups, 4 oz. = 40 cups, etc.)\n\n', 'Earl_Grey_Loose_large.jpg', 1, 10),
(100004, 'ENGLISH BREAKFAST', 'ake one sip of this classic blend of Ceylon and India whole tea leaves and you''ll understand why it''s been the traditional morning drink of royalty for centuries.\n\nThis USDA Organic, full-bodied black tea is a perfect accompaniment to a quick morning toast or a hearty Sunday brunch. You can savor the citrusy overtones on their own, or mix with milk and honey for a truly refined experience.\n\nSteep for 3-5 minutes.  Longer steep times increase the tea''s tannin, acidity and bitterness (great for adding milk and sugar).\n\n* Note: Every 2 ounces (oz.) of tea can brew approximately 20 cups. (i.e. 2 oz. = 20 cups, 4 oz. = 40 cups, etc.)\n\n', 'English_Breakfast_Loose_large.jpg', 1, 10),
(100005, 'GEISHA BEAUTY', 'Geishas have traditionally been associated with beauty, subtlety, and sophistication, and those three ingredients are the inspiration behind this refined blend. \n\nWe''ve combined black tea, green tea, sunflower leaves, rose petals, and other natural flavors to create a rich tea with strong undertones of peach. Try it iced or paired with agave nectar for sweeter tasting notes. \n\nSteep for 3-5 minutes.  Longer steep times will increase the tea''s acidity and tannin.\n* Note: Every 2 ounces (oz.) of tea can brew approximately 20 cups. (i.e. 2 oz. = 20 cups, 4 oz. = 40 cups, etc.)', 'Geisha_Beauty_Loose_large.jpg', 1, 10),
(100006, 'CEREMONIAL GRADE MATCHA POWDER', 'If you''re looking for more ways to incorporate green tea into your lifestyle, try matcha powder. Our matcha powder is ceremonial grade, meaning it is made from shade-grown green tea leaves harvested early in the spring and then stone-ground to a fine powder. So you can expect it to be bright green in color, and have more intense sweetness and deeper flavor than standard or courser grades harvested later in the year.\n\nPreparing matcha in the ancient Japanese tradition is veiled in detailed ritual and ceremony, but don''t let that stop you from trying it at home. You''ll reap more health benefits from matcha than you do from other teas because you''re ingesting the whole leaf rather than discarding it after steeping.\n\nAt its core matcha is really quite simple to prepare if you have a matcha set: place 1-2 tsp of matcha powder into the matcha bowl and pour in approximately 2-3 oz of not-quite-boiling water.  Wisk it rapidly until the powdered tea is completely dissolved.\n\nCeremonial grade matcha is meant to be savored as a standalone beverage without sugar or milk (unlike "culinary" or "restaurant grade" matcha), but we will admit it makes a pretty fantastic latte with milk and sugar.\n\nThese simple instructions will get you started, but enhancing your technique and style can make for a lifelong project (invite us over when you''ve perfected it!)', 'Matcha_Loose_large.jpg', 1, 28),
(100007, 'THE TILTING LOOSE LEAF TEA CUP', 'The perfect loose leaf tea cup is finally here! With these cups there is no more need for messy tea bags or strainers. This is the all in one loose leaf tea cup that allows you to strain, steep, and enjoy your tea with three easy steps. Begin by placing tea leaves into the filter, then pour hot water over the leaves, and let steep until desired brew strength. To prevent the loose leaf from getting stronger, simply tilt the cup and enjoy.\n', 'Magisso_White_Teacup_large.jpeg', 2, 25),
(100008, 'GLASS TEAPOT', 'Loose tea devotees will love this modern teapot. This large glass pot is perfectly designed for showing off the gorgeous color of your tea or simply watching it brew. Includes a roomy removable glass infuser to let the leaves fully steep and expand.\r\n\r\nHolds up to 24 ounces and measures 5.8" H x 5.7" W x 3" D.', 'Glass_Teapot_large.jpg', 2, 30),
(100009, 'MATCHA WHISK SET', 'This elegant set comes with all the utensils you need to make traditional Japanese Matcha Tea: the Chawan (tea bowl), Chasen (tea whisk), and Chashaku (tea scoop). The bowl is made of fine ceramic inspired by Japanese pottery, while the whisk and scoop are handmade from natural bamboo and designed specifically for the art of making matcha. \r\n\r\nAdd about 2 scoops of our Green Tea Matcha Powder to the bowl and add hot water to taste, then use the whisk to briskly mix until there are no more lumps. Serve with sweet confections for the ideal experience.', 'Matcha_Set_large.jpg', 2, 18),
(100010, 'BASKET INFUSER', 'With no need for tea bags, this classic tea infuser is the environmentally friendly way to enjoy your tea. Simply fill with loose tea leaves and steep as long as desired. And because you&#39;re using loose tea, you can infuse again to limit waste. Made from stainless steel and dishwasher safe', '57a90ccf63ad0579429819.jpg', 2, 57),
(100050, 'TEST', 'TEST PRODUCT', '57a90dd7535d2188982656.jpg', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty_in_stock` smallint(6) NOT NULL,
  `qty_reserved` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
