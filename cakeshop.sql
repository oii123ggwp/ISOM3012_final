-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2023 年 04 月 14 日 09:00
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cakeshop`
--
CREATE DATABASE IF NOT EXISTS `cakeshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cakeshop`;

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `being_click` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img_path`, `product_description`, `Type`, `quantity_in_stock`, `being_click`) VALUES
('P001', 'CARTOON CAKE-SNOWFLAKE', '240', 'cartoon2.jpg', 'This is a blueberry-flavored sponge cake with a strawberry jam filling.', 'cartoon', 10, 0),
('P002', 'CARTOON CAKE-ROCKET', '220', 'cartoon1.jpg', 'This is a crispy chocolate cake with sponge cake inside and blueberry jam.', 'cartoon', 10, 0),
('P003', 'FRUITCAKE-BLUEBERRY', '185', 'fruit1.jpg', 'A sponge cake that fill with blueberries and has a deliciously soft and tender crumb with a slight hint of lemon. ', 'fruit', 10, 0),
('P004', 'FRUITCAKE-PINEAPPLE', '155', 'fruit2.jpg', 'A moist cake with rich pineapple flavor topped with a fluffy whipped vanilla buttercream frosting and finished with slices of pineapple.', 'fruit', 10, 0),
('P005', 'FRUITCAKE-STRAWBERRY', '190', 'fruit3.jpg', 'Moist white cream cake with fresh strawberry.', 'fruit', 10, 0),
('P006', 'FRUITCAKE-ORANGE', '180', 'fruit4.jpg', 'Made of torn phyllo dough sheets and a mixture of orange juice, Greek yogurt and sugar. A cinnamon syrup is poured over the cooled cake.', 'fruit', 10, 0),
('P007', 'CHOCOLATE CAKE', '200', 'chocolate1.jpg', 'a mousse cake that has a chocolate flavor and chocolate frosting.', 'chocolate', 10, 0),
('P008', 'CHOCOLATE PEANUT CAKE', '195', 'chocolate2.jpg', 'A moist chocolate cake with a peanut butter frosting.', 'chocolate', 10, 0),
('P009', 'CHOCOLATE PEAR CAKE', '216', 'chocolate3.jpg', 'A moist chocolate cake made with fresh pears, cinnamon, nutmeg, vanilla and cocoa powder. It is generously coated with cinnamon sugar.', 'chocolate', 10, 0),
('P010', 'SOUR CREAM POUND CAKE', '125', 'traditional1.jpg', 'A dense, melt-in-your-mouth cake with a subtle vanilla-flavored crumb. We use less egg and comes out with a lighter exterior.', 'traditional', 10, 0),
('P011', 'OLIVE OIL CAKE', '140', 'traditional2.jpg', 'A light and barely sweet cake, a final brush of olive oil just before serving brings the fruity flavor to the front of your palate as soon as you take a bite', 'traditional', 10, 0),
('P012', 'VICTORIA SPONGE CAKE', '140', 'traditional3.jpg', 'A sponge cake is a soft cake and made in two layers with jam or cream, or both, between them.', 'traditional', 10, 0),
('P013', 'ROSE CAKE', '205', 'wedding1.jpg', 'A rose cake is a cake flavored with rose water and paired with a rose buttercream. It is fittingly decorated with cream flowers', 'wedding', 10, 0),
('P014', 'ROYAL WEDDING CAKE', '200', 'wedding3.jpg', 'A rose cake is a cake flavored with rose water and paired with a rose buttercream. It is fittingly decorated with cream flowers', 'wedding', 10, 0),
('P015', 'LAVENDER CAKE', '225', 'wedding2.jpg', 'A three-tier sponge cake, is a moist layer cake flavored with vanilla tea.', 'wedding', 10, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `total_payment_amount` decimal(20,0) NOT NULL,
  `order_time` datetime(6) NOT NULL,
  `finish_time` datetime(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
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
('asdfads', '11111111qQ', 'asdf', '2023-04-05', 'Male', 'asdf@dasf.com', '2123'),
('fffff', '11111aA', 'dsf', '2023-04-01', 'Female', 'adsf@dsf.com', '2222'),
('ffffffff', 'aA11111', 'adfas', '2023-04-05', 'Male', 'adsf@dasf.com', '4444'),
('gggggg', '12345678Aa', 'asdfadsf', '2023-04-05', 'Male', 'asdf@asdf.com', 'a12121'),
('ggwp', 'aA12345', 'adsf', '2023-04-04', 'Male', 'adsf@df.com', '333333');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

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
