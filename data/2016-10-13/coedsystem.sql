-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2016 at 06:10 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coedsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `trs3_department`
--

CREATE TABLE `trs3_department` (
  `tmp_id` int(10) UNSIGNED NOT NULL,
  `tmp_dept` varchar(255) NOT NULL,
  `tmp_unit` varchar(255) NOT NULL,
  `tmp_sessid` text NOT NULL,
  `tmp_std_id` varchar(200) NOT NULL,
  `tmp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_department`
--

INSERT INTO `trs3_department` (`tmp_id`, `tmp_dept`, `tmp_unit`, `tmp_sessid`, `tmp_std_id`, `tmp_date`) VALUES
(4, 'หน่วยระบาดวิทยา', 'คณะแพทยศาสตร์', 'fq6hg4nnbdp2cuhgvainoecmh2', '5410121010', '2016-10-10'),
(5, 'หน่วยโสต', 'คณะแพทยศาสตร์', 'fq6hg4nnbdp2cuhgvainoecmh2', '5410121010', '2016-10-10'),
(7, 'a2', 'd2', 'nn986bc7uuhjrim78jge37r9u5', '1111111111', '2016-10-10'),
(10, 'หน่วยโสตศึกษา', 'คณะแพทยศาสตร์', 'r5a8p3ddaqffm1t831pluvlmf7', '1111111112', '2016-10-11'),
(11, 'หน่วยระบาด', 'คณะแพทยศาสตร์', 'r5a8p3ddaqffm1t831pluvlmf7', '1111111112', '2016-10-11'),
(13, 'หน่วยระบาดวิทยา', 'คณะแพทยศาสตร์', 'gnmb5dr2proq7u20dmq08ne6e6', '5312323232', '2016-10-12'),
(14, 'หน่วยโสต', 'คณะแพทยศาสตร์', 'gnmb5dr2proq7u20dmq08ne6e6', '5312323232', '2016-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_department_temporary`
--

CREATE TABLE `trs3_department_temporary` (
  `tmp_id` int(10) UNSIGNED NOT NULL,
  `tmp_dept` varchar(255) NOT NULL,
  `tmp_unit` varchar(255) NOT NULL,
  `tmp_sessid` text NOT NULL,
  `tmp_std_id` varchar(200) NOT NULL,
  `tmp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_department_temporary`
--

INSERT INTO `trs3_department_temporary` (`tmp_id`, `tmp_dept`, `tmp_unit`, `tmp_sessid`, `tmp_std_id`, `tmp_date`) VALUES
(1, 'a', 'a1', 't29vcd516vmqeodcsbr6s91i36', '5410121040', '2016-10-09'),
(2, 'a1', 'a12', 't29vcd516vmqeodcsbr6s91i36', '5410121040', '2016-10-09'),
(3, 'a1', 'a12', 't29vcd516vmqeodcsbr6s91i36', '5410121040', '2016-10-09'),
(4, 'a1', 'a12', 't29vcd516vmqeodcsbr6s91i36', '5410121040', '2016-10-09'),
(5, 'a1', 'a12', 't29vcd516vmqeodcsbr6s91i36', '5410121040', '2016-10-09'),
(6, 'a1', 'a12', 't29vcd516vmqeodcsbr6s91i36', '5410121040', '2016-10-09'),
(7, 'a1', 'a2', '4plqmfvu2egu6jepff5aljcg91', '5410121040', '2016-10-09'),
(8, 'b1', 'b2', '4plqmfvu2egu6jepff5aljcg91', '5410121040', '2016-10-09'),
(9, 'a1', 'a2', 'pd7vhdtl0asc12n44vj5t4u1q7', '5410121040', '2016-10-09'),
(10, 'หน่วยระบาดวิทยา', 'คณะแพทยศาสตร์', 'fq6hg4nnbdp2cuhgvainoecmh2', '5410121010', '2016-10-10'),
(11, 'หน่วยโสต', 'คณะแพทยศาสตร์', 'fq6hg4nnbdp2cuhgvainoecmh2', '5410121010', '2016-10-10'),
(12, 'a2', 'd2', 'nn986bc7uuhjrim78jge37r9u5', '1111111111', '2016-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_disease`
--

CREATE TABLE `trs3_disease` (
  `di_id` int(10) UNSIGNED NOT NULL,
  `di_desc` varchar(255) NOT NULL,
  `di_regid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_disease`
--

INSERT INTO `trs3_disease` (`di_id`, `di_desc`, `di_regid`) VALUES
(1, '', 3),
(2, 'a', 4),
(3, ' b', 4),
(4, ' b', 4),
(5, ' c', 4),
(6, 'a', 5),
(7, ' b', 5),
(8, ' b', 5),
(9, ' c', 5),
(10, 'a', 6),
(11, ' b', 6),
(12, ' b', 6),
(13, ' c', 6),
(14, 'หวัด ภูมิแพ้อากาศ เล็บขบ', 7),
(15, '', 8),
(16, '', 9),
(17, '', 10),
(18, '', 11),
(19, '', 12),
(20, '', 13),
(21, '', 14),
(22, '', 15),
(23, '', 16),
(24, '', 17),
(25, '', 18),
(26, '', 19),
(27, '', 20),
(28, '', 21),
(29, '', 22),
(30, '', 23),
(31, '', 24),
(32, '', 25);

-- --------------------------------------------------------

--
-- Table structure for table `trs3_questioniar`
--

CREATE TABLE `trs3_questioniar` (
  `qn_id` int(10) UNSIGNED NOT NULL,
  `qn_start` date NOT NULL,
  `qn_end` date NOT NULL,
  `qn_seltcontact` enum('NA','No','Yes') NOT NULL DEFAULT 'NA',
  `qn_selfcontactinfo` text NOT NULL,
  `qn_advicestatus` enum('Waiting','Disagree','Agree','Otheragree') NOT NULL DEFAULT 'Waiting',
  `qn_advicestatusinfo` text NOT NULL,
  `qn_adviceby` varchar(150) NOT NULL,
  `qn_applydate` date NOT NULL,
  `qn_advicedate` date NOT NULL,
  `qn_studentid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_questioniar`
--

INSERT INTO `trs3_questioniar` (`qn_id`, `qn_start`, `qn_end`, `qn_seltcontact`, `qn_selfcontactinfo`, `qn_advicestatus`, `qn_advicestatusinfo`, `qn_adviceby`, `qn_applydate`, `qn_advicedate`, `qn_studentid`) VALUES
(3, '0000-00-00', '0000-00-00', 'Yes', 'asd', 'Waiting', '', '', '2016-10-10', '0000-00-00', '5410121010'),
(4, '2016-12-12', '2017-03-01', 'Yes', 'qswe', 'Waiting', '', '', '2016-10-10', '0000-00-00', '1111111111'),
(6, '0000-00-00', '0000-00-00', 'No', '', 'Waiting', '', '', '2016-10-11', '0000-00-00', '1111111112'),
(7, '2016-12-01', '2017-01-31', 'No', '', 'Waiting', '', '', '2016-10-12', '0000-00-00', '5312323232');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_registration`
--

CREATE TABLE `trs3_registration` (
  `registration_id` int(10) UNSIGNED NOT NULL,
  `reg_year` varchar(6) NOT NULL,
  `std_id` varchar(10) NOT NULL,
  `std_fullname_th` varchar(150) NOT NULL,
  `std_fullname_en` varchar(150) NOT NULL,
  `std_profilepic` text NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `rel` enum('0','1','2','3','4','99') NOT NULL DEFAULT '0',
  `race` varchar(100) NOT NULL,
  `nation` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `gpa` varchar(10) NOT NULL,
  `ergen_person` varchar(150) NOT NULL,
  `ergen_relation` varchar(150) NOT NULL,
  `ergen_phone` varchar(100) NOT NULL,
  `train_start` date NOT NULL,
  `train_end` date NOT NULL,
  `job_attr` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `act_1` varchar(255) NOT NULL,
  `act_2` varchar(255) NOT NULL,
  `act_3` varchar(255) NOT NULL,
  `act_4` varchar(255) NOT NULL,
  `eng_skill` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `com_skill_1` varchar(255) NOT NULL,
  `com_skill_2` varchar(255) NOT NULL,
  `com_skill_3` varchar(255) NOT NULL,
  `reg_date` date NOT NULL,
  `confirm_status` enum('N','Y') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_registration`
--

INSERT INTO `trs3_registration` (`registration_id`, `reg_year`, `std_id`, `std_fullname_th`, `std_fullname_en`, `std_profilepic`, `dob`, `age`, `rel`, `race`, `nation`, `phone`, `email`, `address`, `gpa`, `ergen_person`, `ergen_relation`, `ergen_phone`, `train_start`, `train_end`, `job_attr`, `job_type`, `act_1`, `act_2`, `act_3`, `act_4`, `eng_skill`, `com_skill_1`, `com_skill_2`, `com_skill_3`, `reg_date`, `confirm_status`) VALUES
(6, '2559', '5910220012', 'รัชกาพร บุญวงศ์', 'Rajchadaporn Boonwong', 'asd', '1987-06-12', 29, '1', 'ไทย', 'ไทย', '0935761099', 'tagoon.p@gmail.com', '121/160', '2.35', 'ฐากูร ปราบปรี', 'พี่ชาย', '6867474082', '2016-12-01', '0000-00-00', 'a', 'b', '1', '2', '3', '4', '1', '5', '6', '7', '2016-09-30', 'N'),
(7, '2560', '5610121040', 'ฐากูร ปราบปรี', 'Tagoon Prappre', 'asd', '1987-08-12', 29, '1', 'ไทย', 'ไทย', '0935761099', 'tagoon.p@gmail.com', '103 หมู่ที่ 4 ต.ท่าแค', '2.87', 'ณัฐตินา วิชัยดิษฐ', 'ภริยา', '0867474082', '2017-01-01', '2017-02-28', '', '', '', '', '', '', '1', '', '', '', '2016-10-01', 'N'),
(15, '2559', '5710121040', 'ฐากูร ปราบปรี', 'Tagoon Prappre', 'asd', '1987-06-12', 29, '1', 'ไทย', 'ไทย', '0935761099', 'tagoon.p@gmail.com', 'asd', '2.12', 'ณั๘ตินา วิชัยดิษฐ', 'แฟน', '0842314413', '2016-12-01', '2017-01-31', '', '', '', '', '', '', '1', '', '', '', '2016-10-05', 'N'),
(21, '2559', '5410121010', 'asd', 'asd', '', '1987-06-12', 29, '1', 'ไทย', 'ไทย', '0941144234', 'tagoon.p@gmail.com', 'asd', '2.12', 'ณั๘ตินา วิชัยดิษฐ', 'แฟน', '0952626392', '2016-12-01', '2017-01-31', '', '', '', '', '', '', '2', '', '', '', '2016-10-10', 'N'),
(22, '2559', '1111111111', 'asd dsa', 'asd dsa', '', '1987-06-12', 29, '1', 'ไทย', 'ไทย', '0865123123', 'tagoon.p@gmail.com', 'asd', '2.12', 'ณั๘ตินา วิชัยดิษฐ', 'แฟน', '6867474082', '2016-12-12', '2017-02-12', '', '', '', '', '', '', '3', '', '', '', '2016-10-10', 'N'),
(24, '2559', '1111111112', 'การณ์ ปรสานสุข', 'Karn Prasarnsuk', '', '1987-06-12', 29, '1', 'ไทย', 'ไทย', '0935761099', 'tagoon.p@gmail.com', '121/160', '2.35', 'ณัฐตินา วิชัยดิษฐ', 'แฟน', '0931123123', '2016-12-01', '2017-01-30', '', '', 'ดนตรีสร้างสุข', 'ค่ายเยาชนชวนยิ้ม', '', '', '2', 'Ms office', 'เขียนโปรแกรม ภาษาซี', '', '2016-10-11', 'Y'),
(25, '2559', '5312323232', 'ฐากูร ปราบปรี', 'Tagoon Prappre', '', '1987-06-12', 29, '1', 'ไทย', 'ไทย', '0935761099', 'tagoon.p@psu.ac.th', '23/41 หมู่ที่ 3 ตำบลท่าแค อำเภอเมือง จังหวัดพัทลุง', '2.31', 'ณัฐตินา วิชัยดิษฐ', 'แฟน', '0923314212', '2016-12-01', '2017-01-31', '', '', '', '', '', '', '2', '', '', '', '2016-10-12', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_user`
--

CREATE TABLE `trs3_user` (
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype_id` int(11) NOT NULL,
  `active_status` enum('N','Y') NOT NULL DEFAULT 'N',
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_user`
--

INSERT INTO `trs3_user` (`username`, `password`, `email`, `usertype_id`, `active_status`, `reg_date`) VALUES
('1111111111', '7bbe7a5adffc272bb2ac5a25832c12b8', 'tagoon.p@gmail.com', 4, 'Y', '2016-10-10'),
('1111111112', '849a91eda2908b248acd00a7c136b6a7', 'tagoon.p@gmail.com', 4, 'Y', '2016-10-10'),
('5312323232', '3b4b2d1f6ba3fc5fa36636858ea04ed1', 'tagoon.p@psu.ac.th', 4, 'Y', '2016-10-12'),
('5410121010', '4f2b685625fbeffedc51cc0a5e06b3e0', 'tagoon.p@gmail.com', 4, 'Y', '2016-10-10'),
('5610121040', 'b78df4c858f0232ae01ef4e27d5b3921', 'tagoon.p@gmail.com', 4, 'Y', '2016-10-01'),
('5710121040', 'c3186c0a0a98ec52feb258bea6ac58af', 'tagoon.p@gmail.com', 4, 'Y', '2016-10-05'),
('administrator', '80294ab35e5cc7f851e02060fca2c9d3', 'tagoon.p@gmail.com', 1, 'Y', '2016-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_userinfo`
--

CREATE TABLE `trs3_userinfo` (
  `userinfo_id` int(10) UNSIGNED NOT NULL,
  `userinfo_prefix` varchar(50) NOT NULL,
  `userinfo_fname` varchar(150) NOT NULL,
  `userinfo_lname` varchar(150) NOT NULL,
  `userinfo_phone` varchar(13) NOT NULL,
  `userinfo_username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_userinfo`
--

INSERT INTO `trs3_userinfo` (`userinfo_id`, `userinfo_prefix`, `userinfo_fname`, `userinfo_lname`, `userinfo_phone`, `userinfo_username`) VALUES
(1, 'Mr.', 'Tagoon', 'Prappre', '935761099', 'administrator'),
(2, '', 'Tagoon', 'Prappre', '0935761099', '5610121040'),
(3, '', 'Tagoon', 'Prappre', '0935761099', '5710121040'),
(4, '', 'asd', 'dsa', '0865123123', '1111111111'),
(5, '', 'asd', 'asd', '0931231231', '1111111112'),
(6, '', 'Tagoon', 'Prappre', '0935761099', '5312323232');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_usertransection`
--

CREATE TABLE `trs3_usertransection` (
  `t_id` int(10) UNSIGNED NOT NULL,
  `t_date` date NOT NULL,
  `t_time` time NOT NULL,
  `t_desc` varchar(255) NOT NULL,
  `t_status` varchar(150) NOT NULL,
  `t_username` varchar(150) NOT NULL,
  `t_relateuser` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_usertransection`
--

INSERT INTO `trs3_usertransection` (`t_id`, `t_date`, `t_time`, `t_desc`, `t_status`, `t_username`, `t_relateuser`) VALUES
(1, '2016-10-12', '16:18:47', 'สมัครฝึกงานภาคฤดูร้อน', 'Success', '5312323232', '5312323232'),
(2, '2016-10-12', '16:18:47', 'สร้างบัญชีผู้ใช้งาน', 'Success', '5312323232', '5312323232'),
(3, '2016-10-12', '16:18:48', 'เข้าใช้งานระบบ', 'Success', '5312323232', '5312323232'),
(4, '2016-10-12', '16:19:28', 'ยืนยันการสมัคร', 'Success', '5312323232', '5312323232'),
(5, '2016-10-12', '16:30:55', 'ออกจากระบบ', 'Success', '5312323232', '5312323232'),
(6, '2016-10-12', '16:31:03', 'เข้าใช้งานระบบ', 'Success', '5312323232', '5312323232'),
(7, '2016-10-12', '16:31:17', 'ออกจากระบบ', 'Success', '5312323232', '5312323232'),
(8, '2016-10-12', '16:31:23', 'เข้าใช้งานระบบ', 'Fail', '5312323232', '5312323232'),
(9, '2016-10-12', '16:32:35', 'เข้าใช้งานระบบ', 'Success', '5312323232', '5312323232'),
(10, '2016-10-12', '19:56:06', 'เปลี่ยนรหัสผ่าน', 'Fail', '5312323232', '5312323232'),
(11, '2016-10-12', '19:56:35', 'เปลี่ยนรหัสผ่าน', 'Fail', '5312323232', '5312323232'),
(12, '2016-10-12', '19:56:40', 'ออกจากระบบ', 'Success', '5312323232', '5312323232'),
(13, '2016-10-12', '19:57:56', 'เข้าใช้งานระบบ', 'Success', '5312323232', '5312323232'),
(14, '2016-10-12', '19:58:06', 'เปลี่ยนรหัสผ่าน', 'Fail', '5312323232', '5312323232'),
(15, '2016-10-12', '19:58:24', 'เปลี่ยนรหัสผ่าน', 'Fail', '5312323232', '5312323232'),
(16, '2016-10-12', '19:58:34', 'เปลี่ยนรหัสผ่าน', 'Fail', '5312323232', '5312323232'),
(17, '2016-10-12', '19:58:51', 'เปลี่ยนรหัสผ่าน', 'Success', '5312323232', '5312323232'),
(18, '2016-10-12', '19:58:55', 'ออกจากระบบ', 'Success', '5312323232', '5312323232'),
(19, '2016-10-12', '19:59:00', 'เข้าใช้งานระบบ', 'Fail', '5312323232', '5312323232'),
(20, '2016-10-12', '19:59:04', 'เข้าใช้งานระบบ', 'Success', '5312323232', '5312323232'),
(21, '2016-10-12', '20:01:41', 'เปลี่ยนรหัสผ่าน', 'Fail', '5312323232', '5312323232'),
(22, '2016-10-12', '20:01:56', 'เปลี่ยนรหัสผ่าน', 'Success', '5312323232', '5312323232'),
(23, '2016-10-12', '20:02:05', 'ออกจากระบบ', 'Success', '5312323232', '5312323232'),
(24, '2016-10-12', '20:02:12', 'เข้าใช้งานระบบ', 'Success', '5312323232', '5312323232'),
(25, '2016-10-12', '20:02:20', 'ออกจากระบบ', 'Success', '5312323232', '5312323232'),
(26, '2016-10-12', '20:06:18', 'เข้าใช้งานระบบ', 'Fail', 'administrator', 'administrator'),
(27, '2016-10-12', '20:06:25', 'เข้าใช้งานระบบ', 'Success', 'administrator', 'administrator'),
(28, '2016-10-12', '20:07:07', 'ออกจากระบบ', 'Success', 'administrator', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `trs3_usertype`
--

CREATE TABLE `trs3_usertype` (
  `usertype_id` int(10) UNSIGNED NOT NULL,
  `usertype_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trs3_usertype`
--

INSERT INTO `trs3_usertype` (`usertype_id`, `usertype_desc`) VALUES
(1, 'Administrator'),
(2, 'Teaching staff'),
(3, 'Coordinator staff'),
(4, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trs3_department`
--
ALTER TABLE `trs3_department`
  ADD PRIMARY KEY (`tmp_id`);

--
-- Indexes for table `trs3_department_temporary`
--
ALTER TABLE `trs3_department_temporary`
  ADD PRIMARY KEY (`tmp_id`);

--
-- Indexes for table `trs3_disease`
--
ALTER TABLE `trs3_disease`
  ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `trs3_questioniar`
--
ALTER TABLE `trs3_questioniar`
  ADD PRIMARY KEY (`qn_id`);

--
-- Indexes for table `trs3_registration`
--
ALTER TABLE `trs3_registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `trs3_user`
--
ALTER TABLE `trs3_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `trs3_userinfo`
--
ALTER TABLE `trs3_userinfo`
  ADD PRIMARY KEY (`userinfo_id`);

--
-- Indexes for table `trs3_usertransection`
--
ALTER TABLE `trs3_usertransection`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `trs3_usertype`
--
ALTER TABLE `trs3_usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trs3_department`
--
ALTER TABLE `trs3_department`
  MODIFY `tmp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trs3_department_temporary`
--
ALTER TABLE `trs3_department_temporary`
  MODIFY `tmp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `trs3_disease`
--
ALTER TABLE `trs3_disease`
  MODIFY `di_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `trs3_questioniar`
--
ALTER TABLE `trs3_questioniar`
  MODIFY `qn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trs3_registration`
--
ALTER TABLE `trs3_registration`
  MODIFY `registration_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `trs3_userinfo`
--
ALTER TABLE `trs3_userinfo`
  MODIFY `userinfo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `trs3_usertransection`
--
ALTER TABLE `trs3_usertransection`
  MODIFY `t_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `trs3_usertype`
--
ALTER TABLE `trs3_usertype`
  MODIFY `usertype_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
