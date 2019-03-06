-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2019 at 07:02 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenvicsp_hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `__id` int(11) NOT NULL,
  `employeeID` varchar(200) NOT NULL,
  `employee_type` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `project_division` int(11) NOT NULL,
  `doj` int(11) NOT NULL,
  `exit_date` date DEFAULT NULL,
  `contract_from` date DEFAULT NULL,
  `contract_to` date DEFAULT NULL,
  `remarks` text,
  `school_academy` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `emergency_contact_person` varchar(300) NOT NULL,
  `emergency_contact_number` bigint(15) NOT NULL,
  `official_email` varchar(150) NOT NULL,
  `personal_email` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `current_age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `maritial_status` varchar(50) NOT NULL,
  `educational_qualification` varchar(250) NOT NULL,
  `sports_certification` varchar(300) NOT NULL,
  `experience_tenvic` varchar(100) NOT NULL,
  `experience_previous` varchar(100) NOT NULL,
  `pan_number` varchar(100) NOT NULL,
  `aadhar_number` varchar(100) NOT NULL,
  `uan` varchar(100) NOT NULL,
  `esic_number` varchar(100) NOT NULL,
  `passport_number` varchar(100) NOT NULL,
  `salary_ac` varchar(150) NOT NULL,
  `personal_ac` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `esi_nominee` varchar(200) NOT NULL,
  `esi_family_details` varchar(300) NOT NULL,
  `pf_nominee` varchar(200) NOT NULL,
  `pf_family_details` varchar(300) NOT NULL,
  `medical_insurance_fdetails` varchar(300) NOT NULL,
  `present_address` varchar(300) NOT NULL,
  `permanent_address` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`__id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `__id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
