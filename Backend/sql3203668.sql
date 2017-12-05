-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: sql3.freemysqlhosting.net
-- Generation Time: Dec 01, 2017 at 01:56 AM
-- Server version: 5.5.54-0ubuntu0.12.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql3203668`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `account_name` tinytext NOT NULL,
  `account_email` tinytext NOT NULL,
  `account_password` tinytext NOT NULL,
  `reminders_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `24hr_reminder` tinyint(1) NOT NULL DEFAULT '1',
  `12hr_reminder` tinyint(1) NOT NULL DEFAULT '0',
  `2hr_reminder` tinyint(1) NOT NULL DEFAULT '1',
  `1hr_reminder` tinyint(1) NOT NULL DEFAULT '1',
  `30min_reminder` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_email`, `account_password`, `reminders_enabled`, `24hr_reminder`, `12hr_reminder`, `2hr_reminder`, `1hr_reminder`, `30min_reminder`) VALUES
(-5, 'Ariel Riggan - Admin', '', 'admin', 0, 0, 0, 0, 0, 0),
(-4, 'Bryan Heiser - Admin', '', 'admin', 0, 0, 0, 0, 0, 0),
(-3, 'Colin O\'Connell - Admin', '', 'admin', 0, 0, 0, 0, 0, 0),
(-2, 'Justin Davis - Admin', '', 'admin', 0, 0, 0, 0, 0, 0),
(-1, 'Michael Nicolaou - Admin', '', 'admin', 0, 0, 0, 0, 0, 0),
(1, 'John Doe', 'j.doe@fakeemail.net', 'Samplepass01', 1, 1, 0, 1, 1, 0),
(2, 'Jane Doe', 'jane.doe@fakeemail.net', 'Samplepass02', 1, 1, 0, 1, 1, 0),
(3, 'Jim Doe', 'jim.doe@gmail.com', 'Samplepass03', 1, 1, 0, 1, 1, 0),
(4, 'Annie Body', 'anybody@gmail.com', 'Samplepass04', 1, 1, 0, 1, 1, 0),
(5, 'Charles Darwin', 'fittest@survival.org', 'Samplepass05', 1, 1, 0, 1, 1, 0),
(6, 'Satan', 'satan@hell.edu', 'Samplepass06', 1, 1, 0, 1, 1, 0),
(7, 'Dr. Suess', 'redfishbluefish@onefishtwofish.com', 'Samplepass07', 1, 1, 0, 1, 1, 0),
(8, 'Steve Jobs', 'steve@apple.com', 'Samplepass08', 1, 1, 0, 1, 1, 0),
(9, 'Donald Trump', 'xXtotalfool69Xx420@whitehouse.gov', 'Strongestpassword1', 1, 1, 0, 1, 1, 0),
(10, 'Donald Trump', 'xXtotalfool69Xx420@whitehouse.gov', 'Strongestpassword1', 1, 1, 0, 1, 1, 0),
(11, 'Test Guy', 'blank@something.com', 'tE7ttest', 1, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_host_account_id` int(11) DEFAULT NULL,
  `event_title` varchar(40) NOT NULL,
  `event_start_date_time` datetime NOT NULL,
  `event_end_date_time` datetime NOT NULL,
  `event_location` tinytext NOT NULL,
  `event_description` mediumtext NOT NULL,
  `event_is_hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_host_account_id`, `event_title`, `event_start_date_time`, `event_end_date_time`, `event_location`, `event_description`, `event_is_hidden`) VALUES
(1, 0, 'Initial Test Event', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Nowhere', 'This is a test event', 0),
(2, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Boulder', 'insert from website', 0),
(3, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Somewhere', 'new test', 0),
(4, 0, 'Testttt', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'yourhouse', 'other test', 0),
(5, 0, 'FunGroup', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Africa', 'doing stuff', 0),
(6, 0, 'FunGroup', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Africa', 'doing stuff', 0),
(7, 0, 'FunGroup', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'Africa', 'doing stuff', 0),
(8, 0, 'newnewtest', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'place', 'new password', 0),
(9, 8, 'Test with datetime and better location', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '22 Baker Drive, Boulder, CO, United States', 'bla bla bla', 0),
(10, 8, 'Test with datetime again', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'DFW Airport, Grapevine, TX, United States', 'dfsd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_guests`
--

CREATE TABLE `event_guests` (
  `event_id` int(11) NOT NULL,
  `host_account_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(40) NOT NULL,
  `group_leader_account_id` int(11) DEFAULT NULL,
  `group_description` text NOT NULL,
  `group_is_private` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `group_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_guests`
--
ALTER TABLE `event_guests`
  ADD KEY `FK_event` (`event_id`),
  ADD KEY `FK_host` (`host_account_id`),
  ADD KEY `FK_guests` (`account_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `FK_leader` (`group_leader_account_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD KEY `FK_members` (`account_id`),
  ADD KEY `FK_group` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_guests`
--
ALTER TABLE `event_guests`
  ADD CONSTRAINT `FK_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_guests` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `FK_leader` FOREIGN KEY (`group_leader_account_id`) REFERENCES `accounts` (`account_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `FK_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_members` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
