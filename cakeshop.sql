-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2023-04-25 07:49:23
-- 服务器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cakeshop`
--
CREATE DATABASE IF NOT EXISTS `cakeshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cakeshop`;

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `product`
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
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img_path`, `product_description`, `Type`, `quantity_in_stock`, `being_click`, `product_img_path2`) VALUES
('P001', 'CARTOON CAKE-SNOWFLAKE', '240', 'cartoon2.jpg', 'This is a blueberry-flavored sponge cake with a strawberry jam filling.', 'cartoon', 10, 0, 'cartoon2-snow.jpg'),
('P002', 'CARTOON CAKE-ROCKET', '220', 'cartoon1.jpg', 'This is a crispy chocolate cake with sponge cake inside and blueberry jam.', 'cartoon', 10, 0, 'cartoon1-roc.jpg'),
('P003', 'FRUITCAKE-BLUEBERRY', '185', 'fruit1.jpg', 'A sponge cake that fill with blueberries and has a deliciously soft and tender crumb with a slight hint of lemon. ', 'fruit', 10, 0, 'fruit1-blueberry.jpg'),
('P004', 'FRUITCAKE-PINEAPPLE', '155', 'fruit2.jpg', 'A moist cake with rich pineapple flavor topped with a fluffy whipped vanilla buttercream frosting and finished with slices of pineapple.', 'fruit', 10, 0, 'fruit2-pine.jpg'),
('P005', 'FRUITCAKE-STRAWBERRY', '190', 'fruit3.jpg', 'Moist white cream cake with fresh strawberry.', 'fruit', 10, 0, 'fruit3-straw.jpg'),
('P006', 'FRUITCAKE-ORANGE', '180', 'fruit4.jpg', 'Made of torn phyllo dough sheets and a mixture of orange juice, Greek yogurt and sugar. A cinnamon syrup is poured over the cooled cake.', 'fruit', 10, 0, 'fruit4-orange.jpg'),
('P007', 'CHOCOLATE CAKE', '200', 'chocolate1.jpg', 'a mousse cake that has a chocolate flavor and chocolate frosting.', 'chocolate', 10, 0, 'chocolate1-choco.jpg'),
('P008', 'CHOCOLATE PEANUT CAKE', '195', 'chocolate2.jpg', 'A moist chocolate cake with a peanut butter frosting.', 'chocolate', 10, 0, 'chocolate2-peanut.jpg'),
('P009', 'CHOCOLATE PEAR CAKE', '216', 'chocolate3.jpg', 'A moist chocolate cake made with fresh pears, cinnamon, nutmeg, vanilla and cocoa powder. It is generously coated with cinnamon sugar.', 'chocolate', 10, 0, 'chocolate3-pear.jpg'),
('P010', 'SOUR CREAM POUND CAKE', '125', 'traditional1.jpg', 'A dense, melt-in-your-mouth cake with a subtle vanilla-flavored crumb. We use less egg and comes out with a lighter exterior.', 'traditional', 10, 0, 'traditional1-sour.jpg'),
('P011', 'OLIVE OIL CAKE', '140', 'traditional2.jpg', 'A light and barely sweet cake, a final brush of olive oil just before serving brings the fruity flavor to the front of your palate as soon as you take a bite', 'traditional', 10, 0, 'traditional2-oil.jpg'),
('P012', 'VICTORIA SPONGE CAKE', '140', 'traditional3.jpg', 'A sponge cake is a soft cake and made in two layers with jam or cream, or both, between them.', 'traditional', 10, 0, 'traditional3-vic.jpg'),
('P013', 'ROSE CAKE', '205', 'wedding1.jpg', 'A rose cake is a cake flavored with rose water and paired with a rose buttercream. It is fittingly decorated with cream flowers', 'wedding', 10, 0, 'wedding1-cake.jpg'),
('P014', 'ROYAL WEDDING CAKE', '200', 'wedding3.jpg', 'A rose cake is a cake flavored with rose water and paired with a rose buttercream. It is fittingly decorated with cream flowers', 'wedding', 10, 0, 'wedding3-cake.jpg'),
('P015', 'LAVENDER CAKE', '225', 'wedding2.jpg', 'A three-tier sponge cake, is a moist layer cake flavored with vanilla tea.', 'wedding', 10, 0, 'wedding2-cake.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_payment_amount` int(20) NOT NULL,
  `order_time` date NOT NULL,
  `finish_time` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `user_id`, `product_id`, `payment_method`, `quantity`, `total_payment_amount`, `order_time`, `finish_time`, `status`) VALUES
('T0', 'gG12345', 'P001', 'unset', 1, 240, '2023-04-24', '2023-04-04', 'NULL'),
('T1', 'gG12345', 'P002', 'unset', 1, 220, '2023-04-24', '2023-04-04', 'NULL');

-- --------------------------------------------------------

--
-- 表的结构 `user`
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
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `password`, `person_name`, `birthday`, `gender`, `email`, `phone_number`) VALUES
('aaaaA1', '$2y$10$nE.OSVXL2jXIJcnEl5u4s.BwMk2F6R5LwryxgxxgPGoNLkOGkET62', 'sdf', '2023-04-06', 'Male', 'dsfa@asdf.com', '112121'),
('ffff', '$2y$10$EX8wU5WJj/g91RKClxag6OrNnUqi2ljsS8KA1pj/4wNEnyonw2B1C', 'jk', '2023-04-04', 'Male', 'asdf@afa.com', '8888888'),
('ggwp12345', '$2y$10$OEXKTSpxMHBKeG1n1QO1SOia.dUMX50QJidfoZZ9Rm8kNIwAVBGru', 'asdf', '2023-03-27', 'Male', 'sadf@sdaf.com', '1111'),
('jjjjJ1', '$2y$10$r4Q90E95WfXKmd9ck7oiE.RYjBEo6M/E22Ed7/dppm9ckWXbSPIbq', 'sadfa', '2023-03-29', 'Male', 'sdf@asdf.com', '412312'),
('submitA1', '$2y$10$i0IeoaLrBhh8UQUf.O4LUeFxs5sHGaJC6Lyz3K3Q/UHh3NOtlHII2', 'iiiii', '2023-04-20', 'Female', 'fffff@dsaf.com', '00000000');

--
-- 转储表的索引
--

--
-- 表的索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- 表的索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`,`user_id`,`product_id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
