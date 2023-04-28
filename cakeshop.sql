-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cakeshop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(20) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` mediumtext NOT NULL,
  `create_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `message`, `create_time`) VALUES
('F0', 'fsdfs', 'df@sfas.com', 'Enter your comments here...', '2023-04-25'),
('F1', 'fsdfs', 'df@sfas.com', 'Enter your comments here...', '2023-04-25'),
('F2', 'asdf', 'dfs@dfsf.com', 'adfadf', '2023-04-25'),
('F3', 'sdf', 'sdf@asdf.com', 'adfasdf', '2023-04-25'),
('F4', 'sdf', 'sdf@asdf.com', 'adfasdf', '2023-04-25'),
('F5', 'sdf', 'sdf@asdf.com', 'adfasdf', '2023-04-25'),
('F6', 'sdf', 'sdf@asdf.com', 'adfasdf', '2023-04-25'),
('F7', 'asdf', 'asdf@saf.com', 'adsfasdf', '2023-04-25'),
('F8', 'gggggggggg', 'asdfas@sf.com', 'asdfa', '2023-04-25');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` varchar(10) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_price` decimal(20,0) NOT NULL,
  `product_img_path` varchar(100) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `quantity_in_stock` int(100) NOT NULL,
  `being_click` int(11) NOT NULL,
  `product_img_path2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img_path`, `product_description`, `Type`, `quantity_in_stock`, `being_click`, `product_img_path2`) VALUES
('P001', 'CARTOON CAKE-SNOWFLAKE', '240', 'cartoon2.jpg', 'This is a blueberry-flavored sponge cake with a strawberry jam filling.', 'cartoon', 8, 2, 'cartoon2-snow.jpg'),
('P002', 'CARTOON CAKE-ROCKET', '220', 'cartoon1.jpg', 'This is a crispy chocolate cake with sponge cake inside and blueberry jam.', 'cartoon', 4, 3, 'cartoon1-roc.jpg'),
('P003', 'FRUITCAKE-BLUEBERRY', '185', 'fruit1.jpg', 'A sponge cake that fill with blueberries and has a deliciously soft and tender crumb with a slight hint of lemon. ', 'fruit', 10, 0, 'fruit1-blueberry.jpg'),
('P004', 'FRUITCAKE-PINEAPPLE', '155', 'fruit2.jpg', 'A moist cake with rich pineapple flavor topped with a fluffy whipped vanilla buttercream frosting and finished with slices of pineapple.', 'fruit', 8, 1, 'fruit2-pine.jpg'),
('P005', 'FRUITCAKE-STRAWBERRY', '190', 'fruit3.jpg', 'Moist white cream cake with fresh strawberry.', 'fruit', 10, 0, 'fruit3-straw.jpg'),
('P006', 'FRUITCAKE-ORANGE', '180', 'fruit4.jpg', 'Made of torn phyllo dough sheets and a mixture of orange juice, Greek yogurt and sugar. A cinnamon syrup is poured over the cooled cake.', 'fruit', 10, 1, 'fruit4-orange.jpg'),
('P007', 'CHOCOLATE CAKE', '200', 'chocolate1.jpg', 'a mousse cake that has a chocolate flavor and chocolate frosting.', 'chocolate', 10, 0, 'chocolate1-choco.jpg'),
('P008', 'CHOCOLATE PEANUT CAKE', '195', 'chocolate2.jpg', 'A moist chocolate cake with a peanut butter frosting.', 'chocolate', 10, 1, 'chocolate2-peanut.jpg'),
('P009', 'CHOCOLATE PEAR CAKE', '216', 'chocolate3.jpg', 'A moist chocolate cake made with fresh pears, cinnamon, nutmeg, vanilla and cocoa powder. It is generously coated with cinnamon sugar.', 'chocolate', 9, 1, 'chocolate3-pear.jpg'),
('P010', 'SOUR CREAM POUND CAKE', '125', 'traditional1.jpg', 'A dense, melt-in-your-mouth cake with a subtle vanilla-flavored crumb. We use less egg and comes out with a lighter exterior.', 'traditional', 10, 0, 'traditional1-sour.jpg'),
('P011', 'OLIVE OIL CAKE', '140', 'traditional2.jpg', 'A light and barely sweet cake, a final brush of olive oil just before serving brings the fruity flavor to the front of your palate as soon as you take a bite', 'traditional', 8, 2, 'traditional2-oil.jpg'),
('P012', 'VICTORIA SPONGE CAKE', '140', 'traditional3.jpg', 'A sponge cake is a soft cake and made in two layers with jam or cream, or both, between them.', 'traditional', 10, 0, 'traditional3-vic.jpg'),
('P013', 'ROSE CAKE', '205', 'wedding1.jpg', 'A rose cake is a cake flavored with rose water and paired with a rose buttercream. It is fittingly decorated with cream flowers', 'wedding', 10, 0, 'wedding1-cake.jpg'),
('P014', 'ROYAL WEDDING CAKE', '200', 'wedding3.jpg', 'A rose cake is a cake flavored with rose water and paired with a rose buttercream. It is fittingly decorated with cream flowers', 'wedding', 8, 2, 'wedding3-cake.jpg'),
('P015', 'LAVENDER CAKE', '225', 'wedding2.jpg', 'A three-tier sponge cake, is a moist layer cake flavored with vanilla tea.', 'wedding', 9, 1, 'wedding2-cake.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_payment_amount` int(20) NOT NULL,
  `order_time` date NOT NULL,
  `expected_finish_time` date NOT NULL,
  `finish_time` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `product_id`, `payment_method`, `quantity`, `total_payment_amount`, `order_time`, `expected_finish_time`, `finish_time`, `status`) VALUES
('92faf398-e5da-11ed-b', 'submitA11', 'P014', 'unset', 2, 400, '2023-04-28', '2023-05-01', NULL, 'unfihished'),
('T0', 'gG12345', 'P001', 'unset', 1, 240, '2023-04-24', '0000-00-00', '2023-04-04', 'NULL'),
('T1', 'gG12345', 'P002', 'unset', 1, 220, '2023-04-24', '0000-00-00', '2023-04-04', 'NULL'),
('T10', 'ff011121', 'P003', 'unset', 2, 0, '2023-04-28', '0000-00-00', '2023-04-13', 'NULL'),
('T11', 'ff011121', 'P003', 'unset', 2, 370, '2023-04-28', '0000-00-00', '2023-04-13', 'NULL'),
('T12', 'ff011121', 'P001', 'unset', 1, 240, '2023-04-28', '0000-00-00', '2023-04-12', 'NULL'),
('T13', 'ff011121', 'P004', 'unset', 1, 155, '2023-04-28', '0000-00-00', '2023-05-02', 'NULL'),
('T14', 'ff011121', 'P001', 'unset', 1, 240, '2023-04-28', '0000-00-00', '2023-04-11', 'NULL'),
('T15', 'ff011121', 'P002', 'unset', 2, 440, '2023-04-28', '0000-00-00', '2023-04-22', 'NULL'),
('T16', 'submitA11', 'P004', 'unset', 1, 155, '2023-04-28', '0000-00-00', '2023-04-26', 'NULL'),
('T17', 'submitA11', 'P011', 'unset', 1, 140, '2023-04-28', '0000-00-00', '2023-04-26', 'NULL'),
('T18', 'submitA11', 'P015', 'unset', 1, 225, '2023-04-28', '0000-00-00', '2023-05-03', 'NULL'),
('T19', 'submitA11', 'P002', 'unset', 3, 660, '2023-04-28', '0000-00-00', '2023-04-18', 'NULL'),
('T2', 'submitA11', 'P005', 'unset', 1, 190, '2023-04-25', '0000-00-00', '2023-04-04', 'NULL'),
('T20', 'submitA11', 'P009', 'unset', 1, 216, '2023-04-28', '0000-00-00', '2023-04-13', 'NULL'),
('T21', 'submitA11', 'P002', 'unset', 1, 220, '2023-04-28', '0000-00-00', '2023-04-11', 'NULL'),
('T22', 'submitA11', 'P011', 'unset', 1, 140, '2023-04-28', '2023-05-01', NULL, 'unfihished'),
('T3', 'submitA11', 'P006', 'unset', 2, 360, '2023-04-25', '0000-00-00', '2023-04-05', 'NULL'),
('T4', 'submitA11', 'P005', 'unset', 1, 190, '2023-04-25', '0000-00-00', '2023-04-04', 'NULL'),
('T5', 'submitA11', 'P006', 'unset', 2, 360, '2023-04-25', '0000-00-00', '2023-04-05', 'NULL'),
('T6', 'submitA11', 'P005', 'unset', 1, 190, '2023-04-25', '0000-00-00', '2023-04-04', 'NULL'),
('T7', 'submitA11', 'P006', 'unset', 2, 360, '2023-04-25', '0000-00-00', '2023-04-05', 'NULL'),
('T8', 'submitA11', 'P005', 'unset', 1, 190, '2023-04-25', '0000-00-00', '2023-04-04', 'NULL'),
('T9', 'ff011121', 'P003', 'unset', 3, 555, '2023-04-28', '0000-00-00', '2023-04-06', 'NULL');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20000) NOT NULL,
  `person_name` char(20) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `password`, `person_name`, `birthday`, `gender`, `email`, `phone_number`) VALUES
('aaaaA1', '$2y$10$nE.OSVXL2jXIJcnEl5u4s.BwMk2F6R5LwryxgxxgPGoNLkOGkET62', 'sdf', '2023-04-06', 'Male', 'dsfa@asdf.com', '112121'),
('ff011121', '$2y$10$zRFOZYY.tucAbc6zewOOiOhm0QWnecoVFK.LbO7nUuBIhinC/D1/6', 'sdfasf', '2023-03-28', 'Male', 'sf@asdf.com', '121212'),
('ffff', '$2y$10$EX8wU5WJj/g91RKClxag6OrNnUqi2ljsS8KA1pj/4wNEnyonw2B1C', 'jk', '2023-04-04', 'Male', 'asdf@afa.com', '8888888'),
('ggwp12345', '$2y$10$OEXKTSpxMHBKeG1n1QO1SOia.dUMX50QJidfoZZ9Rm8kNIwAVBGru', 'asdf', '2023-03-27', 'Male', 'sadf@sdaf.com', '1111'),
('ggwpG123', '$2y$10$XiutrdJnzdDGMzm6lhWg/OMlPilKmBAEfF/nSGlhqYc/OaanW7MhG', 'fsdfsdf', '2023-04-04', 'Female', 'fsd@sdaf.com', '3212312'),
('jjjjJ1', '$2y$10$r4Q90E95WfXKmd9ck7oiE.RYjBEo6M/E22Ed7/dppm9ckWXbSPIbq', 'sadfa', '2023-03-29', 'Male', 'sdf@asdf.com', '412312'),
('submitA1', '$2y$10$i0IeoaLrBhh8UQUf.O4LUeFxs5sHGaJC6Lyz3K3Q/UHh3NOtlHII2', 'iiiii', '2023-04-20', 'Female', 'fffff@dsaf.com', '00000000'),
('submitA11', '$2y$10$YdHGb8AjlS5UjOrPvTYi.uWOut.B1r4jpAKoikid.XagiJBxoT6ee', 'asdas', '2023-03-29', 'Female', 'dsf@dsaf.com', '121212');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- 資料表索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`,`user_id`,`product_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
