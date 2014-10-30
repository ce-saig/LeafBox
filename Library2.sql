-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2014 at 12:39 PM
-- Server version: 5.5.38
-- PHP Version: 5.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Library2`
--

-- --------------------------------------------------------

--
-- Table structure for table `BOOK`
--

CREATE TABLE IF NOT EXISTS `BOOK` (
  `IBOOK_NO` varchar(11) NOT NULL,
  `ISBN` text NOT NULL,
  `TITLE` text NOT NULL,
  `AUTHOR` text NOT NULL,
  `TRANSLATE` text NOT NULL,
  `PAGES` int(11) NOT NULL,
  `GRADE` text NOT NULL,
  `STATUS` text NOT NULL,
  `BTYPE` text NOT NULL,
  `BM_STATUS` text NOT NULL,
  `SETCM_STATUS` text NOT NULL,
  `SETDM_STATUS` text NOT NULL,
  `SETCD_STATUS` text NOT NULL,
  `SETDVD_STATUS` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BOOK`
--

INSERT INTO `BOOK` (`IBOOK_NO`, `ISBN`, `TITLE`, `AUTHOR`, `TRANSLATE`, `PAGES`, `GRADE`, `STATUS`, `BTYPE`, `BM_STATUS`, `SETCM_STATUS`, `SETDM_STATUS`, `SETCD_STATUS`, `SETDVD_STATUS`, `created_at`, `updated_at`) VALUES
('I0001', '974-472-362-1', 'ยิววิปโยค1', 'ไคลน์, เกอร์ดา1', 'ชิต สุนทโรทยาน1', 0, 'ม1', 'ว่าง', 'PRS', 'ไม่ผลิต', 'ไม่ผลิต', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ไม่ผลิต', '0000-00-00 00:00:00', '2014-08-31 14:21:59'),
('I0002', '974-472-362-2', 'ยิววิปโยค2', 'ไคลน์, เกอร์ดา2', 'ชิต สุนทโรทยาน2', 0, 'ม2', 'ว่าง', 'COM', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ไม่ผลิต', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('I0003', '974-472-362-3', 'ยิววิปโยค33', 'ไคลน์, เกอร์ดา3', 'ชิต สุนทโรทยาน3', 0, 'ม3', 'ว่าง', 'COM', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ผลิตเสร็จ', 'ไม่ผลิต', '0000-00-00 00:00:00', '2014-08-11 09:38:13'),
('I0004', '1303123-213123123', 'NEW BOOK', 'GOKU', 'GOKUZ', 5, 'D+', 'จองอ่าน', 'A', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', '2014-08-11 09:43:05', '2014-08-11 09:43:05'),
('I0005', '978-616-7539-19-5', 'ชาล้นถ้วย', 'ว.วชิรเมธี', '', 0, '', 'ว่าง', '', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', 'ผลิตเสร็จ', 'กำลังผลิต', '2014-08-18 15:15:33', '2014-08-18 15:17:08'),
('I0006', '974-443-074-5', 'โอนุกิ สารวัตรจอมป่วน ตอนแผนรายอุบายลวง', 'จิโร', 'โอะ จิเอะ', 0, '', 'ว่าง', '', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', 'กำลังผลิต', '2014-08-18 15:27:06', '2014-08-18 15:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `BRAILLE`
--

CREATE TABLE IF NOT EXISTS `BRAILLE` (
  `id` varchar(10) NOT NULL,
  `IBOOK_NO` varchar(11) NOT NULL,
  `NUMPART` int(11) NOT NULL,
  `RESERVED` text NOT NULL,
  `EXAMINER` text NOT NULL,
  `PRODUCED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BRAILLE`
--

INSERT INTO `BRAILLE` (`id`, `IBOOK_NO`, `NUMPART`, `RESERVED`, `EXAMINER`, `PRODUCED_DATE`) VALUES
('B0001', 'I0001', 24, 'no', 'คาลิล ยิบราน', '2014-03-01'),
('B0002', 'I0002', 20, 'no', 'วิชัย สนธิชัย', '2014-02-01'),
('B0003', 'I0003', 10, 'no', 'เจมส์ คลาเวล\r\n', '2014-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `BRAILLEBORROW`
--

CREATE TABLE IF NOT EXISTS `BRAILLEBORROW` (
`id` int(11) NOT NULL,
  `MEMBER_NO` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `BORROWED_DATE` date NOT NULL,
  `RETURNED_DATE` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `BRAILLEBORROW`
--

INSERT INTO `BRAILLEBORROW` (`id`, `MEMBER_NO`, `parent_id`, `BORROWED_DATE`, `RETURNED_DATE`) VALUES
(1, 0, 'B0001', '0000-00-00', '0000-00-00'),
(2, 0, 'B0002', '0000-00-00', '0000-00-00'),
(3, 0, 'B0003', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `CASSETTE`
--

CREATE TABLE IF NOT EXISTS `CASSETTE` (
  `id` varchar(11) NOT NULL,
  `IBOOK_NO` varchar(11) NOT NULL,
  `NUMPART` int(11) NOT NULL,
  `RESERVED` text NOT NULL,
  `PRODUCED_DATE` date NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CASSETTE`
--

INSERT INTO `CASSETTE` (`id`, `IBOOK_NO`, `NUMPART`, `RESERVED`, `PRODUCED_DATE`, `NOTES`) VALUES
('C0001', 'I0001', 1, 'no', '2014-03-12', ''),
('C0002', 'I0002', 6, 'yes', '2014-01-22', ''),
('C0003', 'I0002', 3, 'yes', '2014-07-09', ''),
('C0004', 'I0002', 2, 'no', '2014-08-16', 'CAS06'),
('C0005', 'I0002', 1, 'no', '2014-08-16', 'sdsd'),
('C0006', 'I0004', 0, 'yes', '2014-08-16', ''),
('C0007', 'I0004', 0, 'no', '2014-08-22', 'sdsdsd'),
('C0008', 'I0004', 0, 'no', '2014-08-22', 'sdsdsd'),
('C0009', 'I0004', 0, 'no', '2014-08-16', 'new'),
('C0010', 'I0004', 0, 'no', '2014-08-16', 'new'),
('C0011', 'I0004', 0, 'yes', '2014-08-29', ''),
('C0012', 'I0003', 0, 'no', '2014-08-16', ''),
('C0013', 'I0004', 0, 'no', '2014-08-16', ''),
('C0014', 'I0004', 0, 'no', '2014-08-16', ''),
('C0015', 'I0002', 0, 'no', '2014-08-16', ''),
('C0016', 'I0001', 3, 'yes', '2014-08-16', '');

-- --------------------------------------------------------

--
-- Table structure for table `CASSETTEBORROW`
--

CREATE TABLE IF NOT EXISTS `CASSETTEBORROW` (
`id` int(11) NOT NULL,
  `MEMBER_NO` int(11) NOT NULL DEFAULT '0',
  `parent_id` varchar(11) NOT NULL,
  `BORROWED_DATE` date NOT NULL DEFAULT '0000-00-00',
  `RETURNED_DATE` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `CASSETTEBORROW`
--

INSERT INTO `CASSETTEBORROW` (`id`, `MEMBER_NO`, `parent_id`, `BORROWED_DATE`, `RETURNED_DATE`) VALUES
(2, 4, 'C0003', '0000-00-00', '0000-00-00'),
(3, 0, 'C0002', '0000-00-00', '0000-00-00'),
(4, 0, 'C0005', '0000-00-00', '0000-00-00'),
(5, 0, 'C0004', '0000-00-00', '0000-00-00'),
(6, 0, 'C0001', '0000-00-00', '0000-00-00'),
(8, 0, 'C0007', '0000-00-00', '0000-00-00'),
(9, 0, 'C0010', '0000-00-00', '0000-00-00'),
(10, 3, 'C0011', '2014-08-08', '2014-08-30'),
(11, 0, 'C0012', '0000-00-00', '0000-00-00'),
(12, 1, 'C0006', '2014-08-21', '2014-08-30'),
(13, 0, 'C0013', '0000-00-00', '0000-00-00'),
(14, 0, 'C0014', '0000-00-00', '0000-00-00'),
(15, 0, 'C0015', '0000-00-00', '0000-00-00'),
(16, 1, 'C0016', '2014-08-20', '2014-08-30'),
(17, 0, 'C0008', '0000-00-00', '0000-00-00'),
(18, 0, 'C0009', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `CASSETTEDETAIL`
--

CREATE TABLE IF NOT EXISTS `CASSETTEDETAIL` (
`id` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `PART` int(11) NOT NULL,
  `STATUS` text NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `CASSETTEDETAIL`
--

INSERT INTO `CASSETTEDETAIL` (`id`, `parent_id`, `PART`, `STATUS`, `NOTES`) VALUES
(1, 'C0001', 1, 'ชำรุด', ''),
(2, 'C0002', 1, 'ชำรุด', 'Test1'),
(3, 'C0002', 2, 'ปกติ', 'test3'),
(4, 'C0003', 1, 'ปกติ', ''),
(5, 'C0003', 2, 'ปกติ', ''),
(6, 'C0003', 3, 'ปกติ', ''),
(7, 'C0002', 3, 'ปกติ', 'test44'),
(8, 'C0002', 4, 'ปกติ', ''),
(9, 'C0002', 5, 'ปกติ', ''),
(10, 'C0002', 6, 'ปกติ', ''),
(12, 'C0004', 2, 'ชำรุด', ''),
(13, 'C0005', 1, 'ปกติ', ''),
(14, 'C0016', 3, 'ปกติ', '3');

-- --------------------------------------------------------

--
-- Table structure for table `CD`
--

CREATE TABLE IF NOT EXISTS `CD` (
  `id` varchar(11) NOT NULL,
  `IBOOK_NO` varchar(11) NOT NULL,
  `NUMPART` int(11) NOT NULL,
  `RESERVED` text NOT NULL,
  `PRODUCED_DATE` date NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CD`
--

INSERT INTO `CD` (`id`, `IBOOK_NO`, `NUMPART`, `RESERVED`, `PRODUCED_DATE`, `NOTES`) VALUES
('CD801', 'I0001', 1, 'no', '2014-05-03', ''),
('CD802', 'I0002', 2, 'no', '2014-01-02', ''),
('CD803', 'I0003', 2, 'yes', '2014-03-04', '');

-- --------------------------------------------------------

--
-- Table structure for table `CDBORROW`
--

CREATE TABLE IF NOT EXISTS `CDBORROW` (
`id` int(11) NOT NULL,
  `MEMBER_NO` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `BORROWED_DATE` date NOT NULL DEFAULT '0000-00-00',
  `RETUNED_DATE` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `CDBORROW`
--

INSERT INTO `CDBORROW` (`id`, `MEMBER_NO`, `parent_id`, `BORROWED_DATE`, `RETUNED_DATE`) VALUES
(1, 1, 'CD803', '2014-07-01', '2014-07-10'),
(2, 0, 'CD801', '0000-00-00', '0000-00-00'),
(3, 0, 'CD802', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `CDDETAIL`
--

CREATE TABLE IF NOT EXISTS `CDDETAIL` (
`id` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `PART` int(11) NOT NULL,
  `STATUS` text NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `CDDETAIL`
--

INSERT INTO `CDDETAIL` (`id`, `parent_id`, `PART`, `STATUS`, `NOTES`) VALUES
(1, 'CD801', 1, 'ปกติ', ''),
(2, 'CD802', 1, 'ปกติ', ''),
(3, 'CD802', 2, 'ชำรุด', ''),
(4, 'CD803', 1, 'ปกติ', ''),
(5, 'CD803', 2, 'ปกติ', '');

-- --------------------------------------------------------

--
-- Table structure for table `DAISY`
--

CREATE TABLE IF NOT EXISTS `DAISY` (
  `id` varchar(11) NOT NULL,
  `IBOOK_NO` varchar(11) NOT NULL,
  `NUMPART` int(11) NOT NULL,
  `RESERVED` text NOT NULL,
  `PRODUCED_DATE` date NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `DAISY`
--

INSERT INTO `DAISY` (`id`, `IBOOK_NO`, `NUMPART`, `RESERVED`, `PRODUCED_DATE`, `NOTES`) VALUES
('D004', 'I0001', 2, 'no', '2014-08-31', ''),
('D005', 'I0001', 2, 'no', '2014-08-31', ''),
('D201', 'I0001', 2, 'yes', '2013-01-02', ''),
('D202', 'I0002', 1, 'no', '2013-02-03', ''),
('D203', 'I0003', 1, 'yes', '2013-04-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `DAISYBORROW`
--

CREATE TABLE IF NOT EXISTS `DAISYBORROW` (
`id` int(11) NOT NULL,
  `MEMBER_NO` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `BORROWED_DATE` date NOT NULL DEFAULT '0000-00-00',
  `RETURNED_DATE` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `DAISYBORROW`
--

INSERT INTO `DAISYBORROW` (`id`, `MEMBER_NO`, `parent_id`, `BORROWED_DATE`, `RETURNED_DATE`) VALUES
(1, 2, 'D201', '2014-07-01', '2014-07-10'),
(2, 0, 'D202', '0000-00-00', '0000-00-00'),
(3, 3, 'D203', '2014-08-13', '2014-09-17'),
(4, 0, 'D004', '0000-00-00', '0000-00-00'),
(5, 0, 'D005', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `DAISYDETAIL`
--

CREATE TABLE IF NOT EXISTS `DAISYDETAIL` (
`id` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `PART` int(11) NOT NULL,
  `STATUS` text NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `DAISYDETAIL`
--

INSERT INTO `DAISYDETAIL` (`id`, `parent_id`, `PART`, `STATUS`, `NOTES`) VALUES
(1, 'D201', 1, 'ปกติ', ''),
(2, 'D201', 2, 'ปกติ', ''),
(3, 'D202', 1, 'ปกติ', ''),
(4, 'D203', 1, 'ปกติ', ''),
(5, 'D004', 2, 'ปกติ', ''),
(6, 'D005', 2, 'ปกติ', '');

-- --------------------------------------------------------

--
-- Table structure for table `DVD`
--

CREATE TABLE IF NOT EXISTS `DVD` (
  `id` varchar(11) NOT NULL,
  `IBOOK_NO` varchar(11) NOT NULL,
  `NUMPART` int(11) NOT NULL,
  `RESERVED` text NOT NULL,
  `PRODUCED_DATE` date NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `DVDBORROW`
--

CREATE TABLE IF NOT EXISTS `DVDBORROW` (
`id` int(11) NOT NULL,
  `MEMBER_NO` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `BORROWED_DATE` date NOT NULL DEFAULT '0000-00-00',
  `RETURNED_DATE` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DVDDETAIL`
--

CREATE TABLE IF NOT EXISTS `DVDDETAIL` (
`id` int(11) NOT NULL,
  `parent_id` varchar(11) NOT NULL,
  `PART` int(11) NOT NULL,
  `STATUS` text NOT NULL,
  `NOTES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `MEMBER`
--

CREATE TABLE IF NOT EXISTS `MEMBER` (
  `MEMBER_NO` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `GENDER` text NOT NULL,
  `ADDRESS` text NOT NULL,
  `DISTRICT` text NOT NULL,
  `PROVINCE_POSTCODE` text NOT NULL,
  `MEMBER_STATUS` text NOT NULL,
  `PHONE_NO` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MEMBER`
--

INSERT INTO `MEMBER` (`MEMBER_NO`, `NAME`, `GENDER`, `ADDRESS`, `DISTRICT`, `PROVINCE_POSTCODE`, `MEMBER_STATUS`, `PHONE_NO`, `created_at`, `updated_at`) VALUES
(1, 'เพชรรัตน์ เตชวัชรา\r\n', 'male', '45 เย็นอากาศ แขวงทุ่งมหาเมฆ\r\n', 'เขตยานนาวา\r\n', 'กทม. 10600\r\n', 'user', '02-4379140\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'จรัญ จ้อยรุ่ง\r\n', 'male', '2014/6 ถ.ประชาสงเคราะห์  \r\n', 'แขวงดินแดง เขตดินแดง\r\n', 'กทม. 10400\r\n', 'institute', '02-6927800, 01-8746816\r\n', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `removed` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `province` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tel` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci NOT NULL,
  `twitter` text COLLATE utf8_unicode_ci NOT NULL,
  `website` text COLLATE utf8_unicode_ci NOT NULL,
  `occupation` text COLLATE utf8_unicode_ci NOT NULL,
  `company` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `removed`, `created_at`, `updated_at`, `email`, `password`, `name`, `role`, `image`, `gender`, `dob`, `province`, `tel`, `facebook`, `twitter`, `website`, `occupation`, `company`, `description`) VALUES
(15, 0, '2014-08-11 09:49:41', '2014-08-12 09:28:43', 'j.nuttawadee@gmail.com', '81633a90c8608b3d516f2631f0811cf74ea8a49a', 'Jelly Jub', 'admin', '', 'f', '1991-05-15', '', '', '', '', '', 'employee', '', ''),
(16, 0, '2014-08-13 18:35:49', '2014-08-13 18:35:49', 'test01@gmail.com', '9bc34549d565d9505b287de0cd20ac77be1d3f2c', 'Test01 Test', 'admin', '', 'f', '0000-00-00', '', '', '', '', '', 'employee', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BOOK`
--
ALTER TABLE `BOOK`
 ADD PRIMARY KEY (`IBOOK_NO`);

--
-- Indexes for table `BRAILLE`
--
ALTER TABLE `BRAILLE`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `BRAILLEBORROW`
--
ALTER TABLE `BRAILLEBORROW`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CASSETTE`
--
ALTER TABLE `CASSETTE`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CASSETTEBORROW`
--
ALTER TABLE `CASSETTEBORROW`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CASSETTEDETAIL`
--
ALTER TABLE `CASSETTEDETAIL`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CD`
--
ALTER TABLE `CD`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CDBORROW`
--
ALTER TABLE `CDBORROW`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CDDETAIL`
--
ALTER TABLE `CDDETAIL`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DAISY`
--
ALTER TABLE `DAISY`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DAISYBORROW`
--
ALTER TABLE `DAISYBORROW`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DAISYDETAIL`
--
ALTER TABLE `DAISYDETAIL`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DVDBORROW`
--
ALTER TABLE `DVDBORROW`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `DVDDETAIL`
--
ALTER TABLE `DVDDETAIL`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `MEMBER`
--
ALTER TABLE `MEMBER`
 ADD PRIMARY KEY (`MEMBER_NO`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `removed` (`removed`), ADD KEY `created_at` (`created_at`), ADD KEY `updated_at` (`updated_at`), ADD KEY `name` (`name`), ADD KEY `role` (`role`), ADD KEY `gender` (`gender`), ADD KEY `dob` (`dob`), ADD KEY `province` (`province`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BRAILLEBORROW`
--
ALTER TABLE `BRAILLEBORROW`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CASSETTEBORROW`
--
ALTER TABLE `CASSETTEBORROW`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `CASSETTEDETAIL`
--
ALTER TABLE `CASSETTEDETAIL`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `CDBORROW`
--
ALTER TABLE `CDBORROW`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CDDETAIL`
--
ALTER TABLE `CDDETAIL`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `DAISYBORROW`
--
ALTER TABLE `DAISYBORROW`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `DAISYDETAIL`
--
ALTER TABLE `DAISYDETAIL`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `DVDBORROW`
--
ALTER TABLE `DVDBORROW`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DVDDETAIL`
--
ALTER TABLE `DVDDETAIL`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
