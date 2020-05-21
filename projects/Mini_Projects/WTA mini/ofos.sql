-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 05:28 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(30) NOT NULL,
  `apassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `apassword`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `username` varchar(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `feed` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`username`, `rate`, `feed`) VALUES
('kumar', 3, 'testing rating'),
('meghana', 1, 'bad'),
('pavan', 4, 'it was so delicious'),
('afnan', 4, 'Good user experience');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `item_count` int(11) NOT NULL DEFAULT '0',
  `item1` int(11) NOT NULL,
  `quantity1` int(11) NOT NULL,
  `item2` int(11) NOT NULL,
  `quantity2` int(11) NOT NULL,
  `item3` int(11) NOT NULL,
  `quantity3` int(11) NOT NULL,
  `item4` int(11) NOT NULL,
  `quantity4` int(11) NOT NULL,
  `item5` int(11) NOT NULL,
  `quantity5` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL DEFAULT 'incart',
  `dated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`item_count`, `item1`, `quantity1`, `item2`, `quantity2`, `item3`, `quantity3`, `item4`, `quantity4`, `item5`, `quantity5`, `total_price`, `order_status`, `dated`, `username`) VALUES
(3, 104, 0, 103, 10, 101, 3, 0, 0, 0, 0, 2710, 'ordered', '2018-11-26 02:37:33', 'asdf'),
(1, 103, 1, 0, 0, 0, 0, 0, 0, 0, 0, 250, 'ordered', '2018-11-26 07:08:29', 'kumar'),
(2, 103, 1, 104, 1, 0, 0, 0, 0, 0, 0, 330, 'incart', '2018-11-26 09:02:44', 'madhukara'),
(1, 101, 1, 0, 0, 0, 0, 0, 0, 0, 0, 70, 'ordered', '2018-11-27 12:10:11', 'meghana'),
(2, 102, 1, 103, 1, 0, 0, 0, 0, 0, 0, 280, 'incart', '2018-11-30 19:18:37', 'pavan'),
(1, 102, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'incart', '2018-12-02 19:45:16', 'asd'),
(3, 101, 3, 110, 3, 128, 4, 0, 0, 0, 0, 570, 'ordered', '2018-12-02 19:54:17', 'afnan');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(5) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pprice` int(5) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `pprice`, `ptype`, `image`) VALUES
(101, 'Veg Burger', 70, 'snak', 'burger.jpeg'),
(102, 'Masala Dosa', 30, 'veg', 'dosa.jpeg'),
(103, 'Pizza', 250, 'snak', 'pizza.jpg'),
(104, 'Shawarma', 80, 'veg', 'shawarma.jpeg'),
(105, 'Pastha', 120, 'veg', 'pastha.jpg'),
(106, 'Chocolate Cake', 50, 'dsrt', 'chocolatecake.jpg'),
(107, 'Egg Toast', 60, 'nveg', 'egg.jpeg'),
(108, 'Idli', 50, 'veg', 'idli.jpg'),
(109, 'Pancake', 120, 'snak', 'pancake.jpg'),
(110, 'Bananas', 80, 'dsrt', 'bananas.jpg'),
(111, 'Black and White', 150, 'dsrt', 'bandw.jpg'),
(112, 'BlueBerry Cake', 180, 'dsrt', 'bbcake.jpeg'),
(113, 'Brownie', 130, 'dsrt', 'brownie.jpeg'),
(114, 'Champagne', 90, 'bvrg', 'champagne.jpeg'),
(115, 'Cheese Cake', 60, 'dsrt', 'cheeseCake.jpeg'),
(116, 'Chicken Burger', 120, 'nveg', 'chickenBurger.jpeg'),
(117, 'Choco Chip Cookies', 30, 'snak', 'ccCookies.jpg'),
(118, 'Chocolate Coffee', 60, 'bvrg', 'chococoffee.jpeg'),
(119, 'Coca Cola', 60, 'bvrg', 'cocacola.jpeg'),
(120, 'Cocktail Combo', 200, 'bvrg', 'cocktail.jpeg'),
(121, 'Coffee', 40, 'bvrg', 'coffee.jpeg'),
(122, 'Chocolate Icecream', 70, 'dsrt', 'chocolateic.jpg'),
(123, 'Cold Coffee', 40, 'bvrg', 'ccoffee.jpeg'),
(124, 'Cup Cake', 30, 'dsrt', 'cupcake.jpg'),
(125, 'Fish Fry', 120, 'nveg', 'fishfry.jpeg'),
(126, 'French Fries', 40, 'snak', 'frenchfries.jpeg'),
(127, 'Fried Chicken', 80, 'nveg', 'fchicken.jpeg'),
(128, 'Green Tea', 30, 'bvrg', 'gtea.jpeg'),
(129, 'Grilled Chicken', 120, 'nveg', 'gchicken.jpeg'),
(130, 'Caramel Bread', 60, 'veg', 'caramelbread.jpg'),
(131, 'Noodels', 60, 'veg', 'noodels.jpg'),
(132, 'Vegetable Salad', 60, 'veg', 'vegetablesalad.jpeg'),
(133, 'Prawn Fried Rice', 120, 'nveg', 'prawnrice.jpg'),
(134, 'Prawn Fry', 80, 'nveg', 'prawnfry.jpeg'),
(135, 'Roasted Chicken', 120, 'nveg', 'rchicken.jpeg'),
(136, 'Macaroons', 60, 'snak', 'macaroons.jpeg'),
(137, 'Straberry Shake', 60, 'bvrg', 'sshake.jpeg'),
(138, 'Haagen', 100, 'spcl', 'haagen.jpg'),
(139, 'Rainbow', 100, 'spcl', 'rainbow.jpg'),
(140, 'Sticky Toffey', 60, 'spcl', 'toffey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `daddress` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `repassword` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`username`, `email`, `address`, `daddress`, `password`, `repassword`) VALUES
('Afnan', 'afnan@gmail.com', 'Shivamogga', 'Thirthahalli', 'afnan', 'afnan'),
('asd', 'asd@gmail.com', 'Manglore', 'Mijar', 'asd', 'asd'),
('kumar', 'kumarvsk603@gmail.com', 'Manglore', 'Manglore', 'asd', 'asd'),
('madhukara', 'madhu13@gmail.com', 'mudur', 'mudur', '123', '123'),
('Meghana', 'meghanagr309@gmail.com', 'Manglore', 'Manglore', 'asd', 'asd'),
('Mukesh', 'mukeshhm1783@gmail.com', 'Manglore', 'Manglore', 'asd', 'asd'),
('pavan', 'pavan777@gmail.com', 'Manglore', 'Manglore', 'pavan', 'pavan'),
('Sanjay', 'sanjayniranjan4@gmail.com', 'Manglore', 'Manglore', 'asd', 'asd'),
('shridevi prabhu', 'shri@gmail.com', 'Manglore', 'Manglore', '123', '123'),
('Vinay', 'vini@vini.com', 'Manglore', 'Manglore', 'asd', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
