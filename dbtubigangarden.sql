-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2018 at 11:40 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtubigangarden`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccomodation`
--

CREATE TABLE `tblaccomodation` (
  `ACCOMID` int(11) NOT NULL,
  `ACCOMODATION` varchar(30) NOT NULL,
  `ACCOMDESC` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccomodation`
--

INSERT INTO `tblaccomodation` (`ACCOMID`, `ACCOMODATION`, `ACCOMDESC`) VALUES
(12, 'Standard Room', 'max 22hrs.'),
(13, 'Travelers Time', 'max of 12hrs.'),
(15, 'Bayanihan Room', 'max 22hrs.');

-- --------------------------------------------------------

--
-- Table structure for table `tblamenities`
--

CREATE TABLE `tblamenities` (
  `AMENID` int(11) NOT NULL,
  `AMENNAME` varchar(125) NOT NULL,
  `AMENDECS` varchar(125) NOT NULL,
  `AMENIMAGE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `GUESTID` int(11) NOT NULL,
  `REFNO` int(11) NOT NULL,
  `G_FNAME` varchar(30) NOT NULL,
  `G_LNAME` varchar(30) NOT NULL,
  `G_CITY` varchar(90) NOT NULL,
  `G_ADDRESS` varchar(90) NOT NULL,
  `DBIRTH` date NOT NULL,
  `G_PHONE` varchar(20) NOT NULL,
  `G_NATIONALITY` varchar(30) NOT NULL,
  `G_COMPANY` varchar(90) NOT NULL,
  `G_CADDRESS` varchar(90) NOT NULL,
  `G_TERMS` tinyint(4) NOT NULL,
  `G_UNAME` varchar(255) NOT NULL,
  `G_PASS` varchar(255) NOT NULL,
  `ZIP` int(11) NOT NULL,
  `LOCATION` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguest`
--

INSERT INTO `tblguest` (`GUESTID`, `REFNO`, `G_FNAME`, `G_LNAME`, `G_CITY`, `G_ADDRESS`, `DBIRTH`, `G_PHONE`, `G_NATIONALITY`, `G_COMPANY`, `G_CADDRESS`, `G_TERMS`, `G_UNAME`, `G_PASS`, `ZIP`, `LOCATION`) VALUES
(75, 0, 'Janry', 'Octavio', 'Kabankalan City', 'Coloso Street', '1989-11-07', '09123586545', 'Filipino', 'Snappy Trends', 'Coloso Street', 1, 'customer', 'b39f008e318efd2bb988d724a161b61c6909677f', 6111, 'guest/photos/hqdefault.jpg'),
(76, 0, 'Junjie', 'Villanueva', '', 'Coloso Street', '2015-10-15', '09123586545', 'Filipino', 'Snappy Trends', 'Coloso Street', 1, 'junjie', '84c73452a1e22cdaa2964e6302f1883e13cc2715', 6111, ''),
(77, 0, 'as', 'asd', '', 'sad', '2018-05-19', '123', 'sd', 'asd', 'asdasd', 1, 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 123, ''),
(78, 0, 'Jake', 'Tam', '', 'J Street', '2009-01-01', '21312312', 'Philippines', 'sadas', 'J Street', 1, 'j', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 6111, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `SUMMARYID` int(11) NOT NULL,
  `TRANSDATE` datetime NOT NULL,
  `CONFIRMATIONCODE` varchar(30) NOT NULL,
  `PQTY` int(11) NOT NULL,
  `GUESTID` int(11) NOT NULL,
  `SPRICE` double NOT NULL,
  `MSGVIEW` tinyint(1) NOT NULL,
  `STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`SUMMARYID`, `TRANSDATE`, `CONFIRMATIONCODE`, `PQTY`, `GUESTID`, `SPRICE`, `MSGVIEW`, `STATUS`) VALUES
(1, '2016-02-17 10:28:20', 'jmrtfpit', 2, 75, 1975, 1, 'Checkedout'),
(2, '2016-02-17 02:54:11', '865znauy', 2, 75, 2175, 0, 'Checkedout'),
(3, '2016-02-17 04:11:07', 'wttpna26', 1, 75, 725, 0, 'Checkedin'),
(4, '2016-02-22 09:07:51', 'ipqib4pw', 1, 76, 615, 1, 'Checkedout'),
(5, '2016-02-22 09:33:00', 'd6ktnesr', 2, 76, 1720, 1, 'Checkedin'),
(6, '2016-02-22 09:38:33', 'k0vyxcvc', 2, 76, 1340, 1, 'Confirmed'),
(7, '2018-05-19 04:00:06', 'mstwt0a2', 1, 77, 495, 0, 'Confirmed'),
(8, '2018-05-19 04:03:33', '6szenp8p', 1, 77, 615, 1, 'Confirmed'),
(9, '2018-05-19 04:05:08', 'eq0grm46', 1, 77, 615, 0, 'Confirmed'),
(10, '2018-05-19 04:05:24', 'mhoueg3h', 1, 77, 615, 1, 'Confirmed'),
(11, '2018-06-29 11:48:08', 'xid53v88', 1, 77, 725, 0, 'Pending'),
(12, '2018-09-10 11:02:46', 'c3zfhqjn', 1, 78, 725, 1, 'Confirmed'),
(13, '2018-09-10 11:04:41', '3es2bp4x', 1, 78, 615, 1, 'Confirmed'),
(14, '2018-09-10 11:05:47', 'xnxx5q7a', 1, 78, 615, 1, 'Confirmed'),
(15, '2018-09-10 11:06:14', 'cdmotr55', 1, 78, 615, 1, 'Confirmed'),
(16, '2018-09-10 11:36:46', 'ne3r5dmc', 2, 78, 1340, 1, 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `RESERVEID` int(11) NOT NULL,
  `CONFIRMATIONCODE` varchar(50) NOT NULL,
  `TRANSDATE` date NOT NULL,
  `ROOMID` int(11) NOT NULL,
  `ARRIVAL` datetime NOT NULL,
  `DEPARTURE` datetime NOT NULL,
  `RPRICE` double NOT NULL,
  `GUESTID` int(11) NOT NULL,
  `PRORPOSE` varchar(30) NOT NULL,
  `STATUS` varchar(11) NOT NULL,
  `BOOKDATE` datetime NOT NULL,
  `REMARKS` text NOT NULL,
  `USERID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreservation`
--

INSERT INTO `tblreservation` (`RESERVEID`, `CONFIRMATIONCODE`, `TRANSDATE`, `ROOMID`, `ARRIVAL`, `DEPARTURE`, `RPRICE`, `GUESTID`, `PRORPOSE`, `STATUS`, `BOOKDATE`, `REMARKS`, `USERID`) VALUES
(1, 'jmrtfpit', '2016-02-17', 16, '2016-02-16 00:00:00', '2016-02-17 00:00:00', 725, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(2, 'jmrtfpit', '2016-02-17', 15, '2016-02-16 00:00:00', '2016-02-17 00:00:00', 1250, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(3, '865znauy', '2016-02-17', 16, '2016-02-17 00:00:00', '2016-02-19 00:00:00', 1450, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(4, '865znauy', '2016-02-17', 12, '2016-02-17 00:00:00', '2016-02-18 00:00:00', 725, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(5, 'wttpna26', '2016-02-17', 16, '2016-02-17 00:00:00', '2016-02-17 00:00:00', 725, 75, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(6, 'ipqib4pw', '2016-02-22', 11, '2016-02-22 00:00:00', '2016-02-22 00:00:00', 615, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(7, 'd6ktnesr', '2016-02-22', 22, '2016-02-22 00:00:00', '2016-02-23 00:00:00', 995, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(8, 'd6ktnesr', '2016-02-22', 16, '2016-02-22 00:00:00', '2016-02-23 00:00:00', 725, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(9, 'k0vyxcvc', '2016-02-22', 11, '2016-02-22 00:00:00', '2016-02-23 00:00:00', 615, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(10, 'k0vyxcvc', '2016-02-22', 12, '2016-02-25 00:00:00', '2016-02-26 00:00:00', 725, 76, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(11, 'mstwt0a2', '2018-05-19', 14, '2018-05-19 00:00:00', '2018-05-19 00:00:00', 495, 77, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(12, '6szenp8p', '2018-05-19', 11, '2018-05-19 00:00:00', '2018-05-20 00:00:00', 615, 77, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(13, 'eq0grm46', '2018-05-19', 11, '2018-05-19 00:00:00', '2018-05-19 00:00:00', 615, 77, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(14, 'mhoueg3h', '2018-05-19', 11, '2018-05-19 00:00:00', '2018-05-20 00:00:00', 615, 77, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(15, 'xid53v88', '2018-06-29', 16, '2018-06-29 00:00:00', '2018-06-29 00:00:00', 725, 77, 'Travel', 'Pending', '0000-00-00 00:00:00', '', 0),
(16, 'c3zfhqjn', '2018-09-10', 16, '2018-09-10 00:00:00', '2018-09-10 00:00:00', 725, 78, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(17, '3es2bp4x', '2018-09-10', 11, '2018-09-10 00:00:00', '2018-09-10 00:00:00', 615, 78, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(18, 'xnxx5q7a', '2018-09-10', 11, '2018-09-10 00:00:00', '2018-09-10 00:00:00', 615, 78, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(19, 'cdmotr55', '2018-09-10', 11, '2018-09-10 00:00:00', '2018-09-10 00:00:00', 615, 78, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(20, 'ne3r5dmc', '2018-09-10', 11, '2018-09-10 00:00:00', '2018-09-10 00:00:00', 615, 78, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0),
(21, 'ne3r5dmc', '2018-09-10', 16, '2018-09-10 00:00:00', '2018-09-10 00:00:00', 725, 78, 'Travel', 'Confirmed', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `ROOMID` int(11) NOT NULL,
  `ROOMNUM` int(11) NOT NULL,
  `ACCOMID` int(11) NOT NULL,
  `ROOM` varchar(30) NOT NULL,
  `ROOMDESC` varchar(255) NOT NULL,
  `NUMPERSON` int(11) NOT NULL,
  `PRICE` double NOT NULL,
  `ROOMIMAGE` varchar(255) NOT NULL,
  `OROOMNUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`ROOMID`, `ROOMNUM`, `ACCOMID`, `ROOM`, `ROOMDESC`, `NUMPERSON`, `PRICE`, `ROOMIMAGE`, `OROOMNUM`) VALUES
(11, -4, 12, 'Wing A', 'without TV', 1, 615, 'rooms/Clash-of-Clans-Town-Hall-10-farm-walls.jpg', 3),
(12, 3, 12, 'Wing A', 'Without TV', 2, 725, 'rooms/Chrysanthemum.jpg', 3),
(13, 3, 13, 'Wing A', 'Without TV', 1, 445, 'rooms/Desert.jpg', 3),
(14, 3, 13, 'Wing A', 'Without TV', 2, 495, 'rooms/Desert.jpg', 3),
(15, 1, 15, 'Wing A', 'Without TV | for groups - minimum of 5 pax | 250php per person', 5, 1250, 'rooms/Hydrangeas.jpg', 1),
(16, 1, 12, 'Wing B & Ground Floor', 'With TV', 1, 725, 'rooms/Jellyfish.jpg', 2),
(17, 3, 12, 'Wing B & Ground Floor', 'With TV', 2, 835, 'rooms/Hydrangeas.jpg', 3),
(18, 3, 13, 'Wing B & Ground Floor', 'With TV', 1, 555, 'rooms/Jellyfish.jpg', 3),
(19, 3, 13, 'Wing B & Ground Floor', 'Without TV', 2, 605, 'rooms/Jellyfish.jpg', 3),
(20, 3, 12, 'Wing B & Ground Floor', 'Twin Beds with TV', 2, 845, 'rooms/Koala.jpg', 3),
(21, 3, 13, 'Wing B & Ground Floor', 'Twin Beds with TV', 2, 675, 'rooms/Lighthouse.jpg', 3),
(22, 3, 12, 'RM 223', 'With TV & Hot and Cold Shower', 2, 995, 'rooms/Sunset.jpg', 3),
(23, 3, 13, 'RM 223', 'With TV & Hot and Cold Shower', 2, 895, 'rooms/Tulips.jpg', 3),
(24, 3, 12, 'RM 224', '2 Beds with TV & Hot and Cold Shower', 2, 1650, 'rooms/Water lilies.jpg', 3),
(25, 3, 13, 'RM 224', '2 Beds with TV & Hot and Cold Shower', 2, 1430, 'rooms/Winter.jpg', 3),
(26, 3, 12, 'RM 111', '1 double & single bed with Hot and Cold Shower', 2, 1350, 'rooms/Winter.jpg', 3),
(27, 3, 13, 'RM 111', '1 double & single bed with Hot and Cold Shower', 2, 1100, 'rooms/Koala.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL,
  `UNAME` varchar(30) NOT NULL,
  `USER_NAME` varchar(30) NOT NULL,
  `UPASS` varchar(90) NOT NULL,
  `ROLE` varchar(30) NOT NULL,
  `PHONE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`USERID`, `UNAME`, `USER_NAME`, `UPASS`, `ROLE`, `PHONE`) VALUES
(1, 'Anonymous', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 912856478);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccomodation`
--
ALTER TABLE `tblaccomodation`
  ADD PRIMARY KEY (`ACCOMID`);

--
-- Indexes for table `tblamenities`
--
ALTER TABLE `tblamenities`
  ADD PRIMARY KEY (`AMENID`);

--
-- Indexes for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD PRIMARY KEY (`GUESTID`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`SUMMARYID`),
  ADD UNIQUE KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`),
  ADD KEY `GUESTID` (`GUESTID`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`RESERVEID`),
  ADD KEY `ROOMID` (`ROOMID`),
  ADD KEY `GUESTID` (`GUESTID`),
  ADD KEY `CONFIRMATIONCODE` (`CONFIRMATIONCODE`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`ROOMID`),
  ADD KEY `ACCOMID` (`ACCOMID`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccomodation`
--
ALTER TABLE `tblaccomodation`
  MODIFY `ACCOMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblamenities`
--
ALTER TABLE `tblamenities`
  MODIFY `AMENID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblguest`
--
ALTER TABLE `tblguest`
  MODIFY `GUESTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tblpayment`
--
ALTER TABLE `tblpayment`
  MODIFY `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `RESERVEID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `ROOMID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD CONSTRAINT `tblreservation_ibfk_1` FOREIGN KEY (`ROOMID`) REFERENCES `tblroom` (`ROOMID`),
  ADD CONSTRAINT `tblreservation_ibfk_2` FOREIGN KEY (`GUESTID`) REFERENCES `tblguest` (`GUESTID`);

--
-- Constraints for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD CONSTRAINT `tblroom_ibfk_1` FOREIGN KEY (`ACCOMID`) REFERENCES `tblaccomodation` (`ACCOMID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
