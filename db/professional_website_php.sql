-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 01:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `professional_website_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_title_one` varchar(100) NOT NULL,
  `banner_title_two` varchar(150) NOT NULL,
  `banner_sub_title` varchar(255) NOT NULL,
  `banner_detail` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title_one`, `banner_title_two`, `banner_sub_title`, `banner_detail`, `image_location`, `active_sts`) VALUES
(1, 'MARKET ANALYSIS', 'STATISTICS', 'WE ARE READY TO HELP YOU', 'This finance HTML template is 100% free of charge provided by TemplateMo for everyone. This is a multiple-page version with different HTML pages.', 'uploads/banner/1.jpg', 1),
(2, 'MARKET ANALYSIS', 'STATISTICS  ', 'WE ARE READY TO HELP YOU', 'This finance HTML template is 100% free of charge provided by TemplateMo for everyone. This is a multiple-page version with different HTML pages.', 'uploads/banner/2.jpg', 1),
(3, 'MARKET ANALYSIS', 'STATISTICS	', 'WE ARE READY TO HELP YOU', 'This finance HTML template is 100% free of charge provided by TemplateMo for everyone. This is a multiple-page version with different HTML pages.', 'uploads/banner/3.jpg', 1),
(4, 'MARKET ANALYSIS', 'STATISTICS  ', 'WE ARE READY TO HELP YOU', 'This finance HTML template is 100% free of charge provided by TemplateMo for everyone. This is a multiple-page version with different HTML pages.', 'uploads/banner/4.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand_items`
--

CREATE TABLE `brand_items` (
  `id` int(11) NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_items`
--

INSERT INTO `brand_items` (`id`, `image_location`, `active_sts`) VALUES
(2, 'uploads/brand/2.png', 1),
(3, 'uploads/brand/3.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `company_infos`
--

CREATE TABLE `company_infos` (
  `id` int(11) NOT NULL,
  `white_head` varchar(100) NOT NULL,
  `green_head` varchar(100) NOT NULL,
  `sub_head` varchar(100) NOT NULL,
  `para_one` text NOT NULL,
  `para_two` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company_infos`
--

INSERT INTO `company_infos` (`id`, `white_head`, `green_head`, `sub_head`, `para_one`, `para_two`, `image_location`, `active_sts`) VALUES
(4, 'GET TO KNOW ABOUT', 'our company', 'WHO WE ARE ok', 'Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus', 'Praes end at dictum metus. Morbi id hendrerit lectus, nec dapibus ex. Etiam ipsum quam, luctus eu egestas eget, tincidunt', 'uploads/info_item/4.jpg', 2),
(5, 'LOREM IPSUM DOLOR SIT AMET', 'call back ok', 'ETIAM SUSCIPIT ANTE A ODIO CONSEQUAT ok', 'Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus', 'Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus', 'uploads/info_item/5.jpg', 2),
(6, 'OUR COMPANY', 'GET TO KNOW ABOUT', 'WHO WE ARE ok', 'Curabitur pulvinar sem a leo tempus facilisis. Sed non sagittis neque. Nulla conse quat tellus nibh, id molestie felis sagittis ut. Nam ullamcorper tempus ipsum in cursus', 'Praes end at dictum metus. Morbi id hendrerit lectus, nec dapibus ex. Etiam ipsum quam, luctus eu egestas eget, tincidunt', 'uploads/info_item/6.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funfact`
--

CREATE TABLE `funfact` (
  `id` int(11) NOT NULL,
  `white_head` varchar(100) NOT NULL,
  `green_head` varchar(100) NOT NULL,
  `sub_head` varchar(150) NOT NULL,
  `para_one` text NOT NULL,
  `para_two` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funfact`
--

INSERT INTO `funfact` (`id`, `white_head`, `green_head`, `sub_head`, `para_one`, `para_two`, `image_location`, `active_sts`) VALUES
(1, 'LOREM IPSUM DOLOR SIT AMET', 'Our solutions for your', 'business growth', 'Pellentesque ultrices at turpis in vestibulum. Aenean pretium elit nec congue elementum. Nulla luctus laoreet porta. Maecenas at nisi tempus, porta metus vitae, faucibus augue.', 'Fusce et venenatis ex. Quisque varius, velit quis dictum sagittis, odio velit molestie nunc, ut posuere ante tortor ut neque.', 'uploads/funfact/1.jpg', 1),
(2, 'GHF ', 'hg ', 'trerte', 'gfdth', 'ccvb', 'uploads/funfact/2.jpg', 2),
(5, 'LOREM IPSUM DOLOR SIT AMET', 'Our solutions for your', 'business growth', 'Pellentesque ultrices at turpis in vestibulum. Aenean pretium elit nec congue elementum. Nulla luctus laoreet porta. Maecenas at nisi tempus, porta metus vitae, faucibus augue.', 'Fusce et venenatis ex. Quisque varius, velit quis dictum sagittis, odio velit molestie nunc, ut posuere ante tortor ut neque.', 'uploads/funfact/5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funfact_items`
--

CREATE TABLE `funfact_items` (
  `id` int(11) NOT NULL,
  `funfact_counter` int(11) NOT NULL,
  `white_head` varchar(100) NOT NULL,
  `active_sts` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funfact_items`
--

INSERT INTO `funfact_items` (`id`, `funfact_counter`, `white_head`, `active_sts`) VALUES
(1, 807, 'Work Hours ', 1),
(2, 543, 'Great Reviews', 1),
(3, 245, 'Projects Done', 1),
(4, 12, 'Awards Won', 1),
(5, 10, 'Project Going', 2);

-- --------------------------------------------------------

--
-- Table structure for table `guest_messages`
--

CREATE TABLE `guest_messages` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `guest_email` varchar(100) NOT NULL,
  `guest_subject` varchar(100) NOT NULL,
  `guest_message` text NOT NULL,
  `read_sts` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_messages`
--

INSERT INTO `guest_messages` (`id`, `guest_name`, `guest_email`, `guest_subject`, `guest_message`, `read_sts`) VALUES
(123, 'zubair', 'zubair@gmail.com', 'message', 'mesage text', 1),
(124, 'farhan', 'farhan@gmail.com', 'subject', 'farhan mesaage korcha', 2),
(125, 'abdullah', 'ab@gmail.com', 'message ok', 'ab medssage', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_heads`
--

CREATE TABLE `message_heads` (
  `id` int(11) NOT NULL,
  `black_head` varchar(100) NOT NULL,
  `green_head` varchar(100) NOT NULL,
  `sub_head` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_heads`
--

INSERT INTO `message_heads` (`id`, `black_head`, `green_head`, `sub_head`) VALUES
(2, 'Request a  ', 'call back ', 'ETIAM SUSCIPIT ANTE A ODIO CONSEQUAT ');

-- --------------------------------------------------------

--
-- Table structure for table `service_heads`
--

CREATE TABLE `service_heads` (
  `id` int(11) NOT NULL,
  `service_black_head` varchar(100) NOT NULL,
  `service_green_head` varchar(100) NOT NULL,
  `service_sub_head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_heads`
--

INSERT INTO `service_heads` (`id`, `service_black_head`, `service_green_head`, `service_sub_head`) VALUES
(6, 'Financial ', 'Services ', 'ALIQUAM ID URNA IMPERDIET LIBERO MOLLIS HENDRERIT ');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

CREATE TABLE `service_items` (
  `id` int(11) NOT NULL,
  `service_head` varchar(100) NOT NULL,
  `service_detail` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `service_head`, `service_detail`, `image_location`, `active_sts`) VALUES
(1, 'DIGITAL ANALYSIS', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/1.jpg', 1),
(2, 'MARKET ANALYSIS', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/2.jpg', 1),
(3, 'DATA PROCESS', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/3.jpg', 1),
(4, 'DATA ENTY', 'Sed tincidunt dictum lobortis. Aenean tempus diam vel augue luctus dignissim. Nunc ornare leo tortor.', 'uploads/service/4.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` int(11) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon_search` varchar(255) DEFAULT NULL,
  `social_icon` varchar(255) NOT NULL,
  `active_sts` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `social_url`, `social_icon_search`, `social_icon`, `active_sts`) VALUES
(1, 'https://www.facebook.com/', 'fa-facebook', 'fab fa-facebook', 1),
(2, 'https://twitter.com/', 'fa-twitter', 'fa-twitter', 1),
(6, 'https://www.linkedin.com/', 'fa-linkedin', 'fa-linkedin', 1),
(9, 'https://www.facebook.com/', 'fas fa-burn', 'fa-adjust', 2),
(10, 'https://www.facebook.com/', 'fab fa-facebook-f', 'fa-address-book', 2),
(11, 'https://www.facebook.com/', 'fas fa-bullseye', 'fa-address-book-o', 2),
(12, 'https://www.facebook.com/', 'fas fa-arrow-circle-up', 'fa-500px', 2),
(13, 'https://twitter.com/', 'fas fa-desktop', 'fa-align-right', 2);

-- --------------------------------------------------------

--
-- Table structure for table `testimonal_heads`
--

CREATE TABLE `testimonal_heads` (
  `id` int(11) NOT NULL,
  `testimonal_black_head` varchar(100) NOT NULL,
  `testimonal_green_head` varchar(100) NOT NULL,
  `testimonal_sub_head` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonal_heads`
--

INSERT INTO `testimonal_heads` (`id`, `testimonal_black_head`, `testimonal_green_head`, `testimonal_sub_head`) VALUES
(2, 'What they say', 'about us', 'TESTIMONIALS FROM OUR GREATEST CLIENTS');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_items`
--

CREATE TABLE `testimonial_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `degination` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial_items`
--

INSERT INTO `testimonial_items` (`id`, `name`, `degination`, `detail`, `image_location`, `active_sts`) VALUES
(8, 'GEORGE WALKER', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/8.jpg', 2),
(9, 'GEORGE WALKER', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/9.jpg', 1),
(11, 'AKBOR KHAN', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/11.jpg', 2),
(12, 'JERIN KHAN', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `date_of_birth` varchar(55) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `number`, `date_of_birth`, `country`, `city`, `state`, `post_code`, `region`, `address`, `image_location`, `email`, `password`, `confirm_password`) VALUES
(7, 'zubair', 'ahmed', '', '01714350207', '1995-07-30', 'Bangladesh', 'dhaka', 'dhaka', '1209', 'islam', 'Dhaka,Bangladesh', 'uploads/profile/.jpg', 'zubair@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2', '70b4269b412a8af42b1f7b0d26eceff2'),
(12, 'zubair', 'ahmed', '', '01714350207', '2022-01-14', 'Bangladesh', 'dhaka', 'dhaka', '1209', 'islam', 'sf', NULL, 'zu@gmail.com', '10b8e822d03fb4fd946188e852a4c3e2', '10b8e822d03fb4fd946188e852a4c3e2'),
(13, 'zubair', 'ahmed', '', '01714350207', '2022-01-14', 'Bangladesh', 'dhaka', 'dhaka', '1209', 'islam', 'zcd', NULL, 'zuw@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2', '70b4269b412a8af42b1f7b0d26eceff2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_items`
--
ALTER TABLE `brand_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_infos`
--
ALTER TABLE `company_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funfact`
--
ALTER TABLE `funfact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funfact_items`
--
ALTER TABLE `funfact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_messages`
--
ALTER TABLE `guest_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_heads`
--
ALTER TABLE `message_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_heads`
--
ALTER TABLE `service_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonal_heads`
--
ALTER TABLE `testimonal_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_items`
--
ALTER TABLE `testimonial_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brand_items`
--
ALTER TABLE `brand_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_infos`
--
ALTER TABLE `company_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funfact`
--
ALTER TABLE `funfact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `funfact_items`
--
ALTER TABLE `funfact_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_messages`
--
ALTER TABLE `guest_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `message_heads`
--
ALTER TABLE `message_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_heads`
--
ALTER TABLE `service_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonal_heads`
--
ALTER TABLE `testimonal_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial_items`
--
ALTER TABLE `testimonial_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
