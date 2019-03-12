
CREATE DATABASE IF NOT EXISTS `tenvicsp_hrms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tenvicsp_hrms`;



DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(300) NOT NULL,
  `full_time_code` varchar(100) NOT NULL,
  `part_time_code` varchar(100) NOT NULL,
  `consultant_code` varchar(100) NOT NULL,
  `intern_code` varchar(100) NOT NULL,
  `parent_company` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `full_time_code`, `part_time_code`, `consultant_code`, `intern_code`, `parent_company`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anil Kumble Sports Promotion Pvt Ltd', 'TA', 'TAP', 'TAC', 'TAI', 0, 1, '2019-03-01 10:08:52', '2019-03-01 15:38:52'),
(2, 'TENVIC Sports Education Pvt Ltd', 'TS', 'TP', 'TC', 'TI', 1, 1, '2019-03-01 10:05:29', '2019-03-01 15:35:29'),
(3, 'TENVIC Retail Pvt Ltd', 'TR', 'TRP', 'TRC', 'TRI', 1, 1, '2019-03-01 10:09:04', '2019-03-01 15:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Grass Root Sports', '2019-03-01 04:35:52', '2019-03-01 10:05:52', 1),
(2, 'HR', '2019-03-01 04:35:52', '2019-03-01 10:05:52', 1),
(3, 'I.T', '2019-03-01 06:11:41', '2019-03-01 11:41:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

DROP TABLE IF EXISTS `designation`;
CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_desc` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation_desc`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Manager', '2019-03-01 04:20:40', '2019-03-01 09:50:40', 1),
(2, 'Coach', '2019-03-01 04:20:40', '2019-03-01 09:50:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_types`
--

DROP TABLE IF EXISTS `employee_types`;
CREATE TABLE `employee_types` (
  `id` int(11) NOT NULL,
  `emp_type` varchar(200) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_types`
--

INSERT INTO `employee_types` (`id`, `emp_type`, `display_order`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Full Time', 1, '2019-02-21 18:30:00', '2019-02-21 18:30:00', 1),
(2, 'Part Time', 2, '2019-02-21 18:30:00', '2019-02-21 18:30:00', 1),
(3, 'Consultant', 3, '2019-02-21 18:30:00', '2019-02-21 18:30:00', 1),
(4, 'Intern', 4, '2019-03-01 10:15:10', '2019-02-21 18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `esi_details`
--

DROP TABLE IF EXISTS `esi_details`;
CREATE TABLE `esi_details` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(200) NOT NULL,
  `name` varchar(150) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `aadhar_number` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

DROP TABLE IF EXISTS `institutes`;
CREATE TABLE `institutes` (
  `inst_id` int(11) NOT NULL,
  `institute` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`inst_id`, `institute`, `created_at`, `updated_at`, `status`) VALUES
(1, 'KLE', '2019-03-01 05:00:55', '2019-03-01 10:30:55', 1),
(2, 'DSA Stadium', '2019-03-01 05:00:55', '2019-03-01 10:30:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_quota`
--

DROP TABLE IF EXISTS `leave_quota`;
CREATE TABLE `leave_quota` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `casual_quota` int(11) NOT NULL,
  `medical_quota` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_records`
--

DROP TABLE IF EXISTS `leave_records`;
CREATE TABLE `leave_records` (
  `leave_id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `number_of_leave` int(11) NOT NULL,
  `leave_type` int(11) NOT NULL,
  `managerID` varchar(150) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date DEFAULT NULL,
  `leave_reason` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `leave_status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

DROP TABLE IF EXISTS `leave_types`;
CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL,
  `leave_desc` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_desc`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Casual Leave', '2019-03-10 11:48:35', '2019-03-10 17:18:35', 1),
(2, 'Medical Leave', '2019-03-10 11:48:35', '2019-03-10 17:18:35', 1),
(3, 'Compensation off', '2019-03-11 08:59:33', '2019-03-11 14:29:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `display_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location`, `display_order`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Bangalore', 1, '2019-02-21 21:47:14', '2019-02-21 21:47:14', 1),
(2, 'Delhi', 2, '2019-02-21 19:38:18', '2019-02-21 18:30:00', 1),
(3, 'Mumbai', 3, '2019-02-21 18:30:00', '2019-02-21 18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mi_details`
--

DROP TABLE IF EXISTS `mi_details`;
CREATE TABLE `mi_details` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(200) NOT NULL,
  `name` varchar(150) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `aadhar_number` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pf_details`
--

DROP TABLE IF EXISTS `pf_details`;
CREATE TABLE `pf_details` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(200) NOT NULL,
  `name` varchar(150) NOT NULL,
  `relation` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `aadhar_number` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE `sports` (
  `sport_id` int(11) NOT NULL,
  `sport_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`sport_id`, `sport_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Badminton', '2019-03-01 04:54:08', '2019-03-01 10:24:08', 1),
(2, 'Basketball', '2019-03-01 04:54:08', '2019-03-01 10:24:08', 1),
(3, 'Cricket', '2019-03-01 04:54:44', '2019-03-01 10:24:44', 1),
(4, 'Football', '2019-03-01 04:54:44', '2019-03-01 10:24:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `employeeID` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `roleID` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employeeID`, `password`, `firstname`, `lastname`, `roleID`, `created_at`, `updated_at`, `status`) VALUES
('AKSP0001', 'tenvic', 's', 's', 1, '2019-03-01 03:54:56', '2019-03-07 18:25:33', 1),
('AKSP0002', 'tenvic', 's', 's', 1, '2019-03-01 03:55:03', '2019-03-07 18:25:36', 1),
('TC0001', 'tenvic', 'ss', 's', 1, '2019-03-01 04:51:29', '2019-03-07 18:25:38', 1),
('TI0001', 'tenvic', 'ss', 's', 1, '2019-03-01 04:51:49', '2019-03-07 18:25:41', 1),
('TP0001', 'tenvic', 'ss', 's', 1, '2019-03-01 04:51:16', '2019-03-07 18:25:43', 1),
('TR0001', 'tenvic', 'ss', 's', 1, '2019-03-01 04:52:28', '2019-03-07 18:25:46', 1),
('TS0001', 'tenvic', 's', 's', 1, '2019-03-01 04:50:33', '2019-03-07 18:25:48', 1),
('TS0002', 'tenvic', 'ss', 's', 1, '2019-03-01 04:51:00', '2019-03-07 18:25:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `__id` int(11) NOT NULL,
  `employeeID` varchar(200) NOT NULL,
  `company` int(11) NOT NULL,
  `employee_type` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `level` int(11) DEFAULT '0',
  `department` int(11) NOT NULL,
  `project_division` varchar(150) DEFAULT NULL,
  `managerID` varchar(150) NOT NULL,
  `doj` date DEFAULT NULL,
  `exit_date` date DEFAULT NULL,
  `contract_from` date DEFAULT NULL,
  `contract_to` date DEFAULT NULL,
  `exit_remarks` text,
  `school_academy` int(150) DEFAULT NULL,
  `sport` int(100) DEFAULT NULL,
  `location` int(150) NOT NULL,
  `mobile_no` bigint(15) NOT NULL,
  `emergency_contact_person` varchar(300) NOT NULL,
  `emergency_contact_number` bigint(15) NOT NULL,
  `official_email` varchar(150) NOT NULL,
  `personal_email` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `maritial_status` varchar(50) NOT NULL,
  `educational_qualification` varchar(250) DEFAULT NULL,
  `educational_qualification_details` varchar(300) DEFAULT NULL,
  `sports_certification` varchar(300) DEFAULT NULL,
  `experience_previous` text,
  `pan_number` varchar(100) NOT NULL,
  `aadhar_number` varchar(100) NOT NULL,
  `uan` varchar(100) DEFAULT NULL,
  `esic_number` varchar(100) DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `salary_ac` varchar(150) NOT NULL,
  `personal_ac` varchar(150) NOT NULL,
  `salary` double NOT NULL,
  `gst` varchar(150) DEFAULT NULL,
  `father_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `pf_nominee_relation` varchar(150) NOT NULL,
  `pf_nominee_name` varchar(150) NOT NULL,
  `pf_nominee_dob` date DEFAULT NULL,
  `pf_nominee_aadhar` varchar(150) NOT NULL,
  `esi_nominee_relation` varchar(150) NOT NULL,
  `esi_nominee_name` varchar(150) NOT NULL,
  `esi_nominee_dob` date DEFAULT NULL,
  `esi_nominee_aadhar` varchar(150) NOT NULL,
  `present_address` varchar(300) NOT NULL,
  `permanent_address` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`__id`, `employeeID`, `company`, `employee_type`, `designation`, `level`, `department`, `project_division`, `managerID`, `doj`, `exit_date`, `contract_from`, `contract_to`, `exit_remarks`, `school_academy`, `sport`, `location`, `mobile_no`, `emergency_contact_person`, `emergency_contact_number`, `official_email`, `personal_email`, `dob`, `gender`, `blood_group`, `maritial_status`, `educational_qualification`, `educational_qualification_details`, `sports_certification`, `experience_previous`, `pan_number`, `aadhar_number`, `uan`, `esic_number`, `passport_number`, `salary_ac`, `personal_ac`, `salary`, `gst`, `father_name`, `mother_name`, `pf_nominee_relation`, `pf_nominee_name`, `pf_nominee_dob`, `pf_nominee_aadhar`, `esi_nominee_relation`, `esi_nominee_name`, `esi_nominee_dob`, `esi_nominee_aadhar`, `present_address`, `permanent_address`, `created_at`, `updated_at`) VALUES
(1, 'AKSP0001', 1, 1, 1, 2, 3, NULL, 'AKSP0002', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 8787878788, 'jbkyu', 789698, 'dasljnliu', 'hbkyblh', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'kyngi', 'yg iy', NULL, NULL, 'g iyggomh', '6897698769876', '76978698', 8769786986, '9769786987', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-01-01', 'e', 'adfZ', 'bbhlbh', '2019-03-01 03:54:56', '2019-03-01 03:54:56'),
(2, 'AKSP0002', 1, 1, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 8787878788, 'jbkyu', 789698, 'dasljnliu', 'hbkyblh', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'kyngi', 'yg iy', NULL, NULL, 'g iyggomh', '6897698769876', '76978698', 8769786986, '9769786987', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-01-01', 'e', 'adfZ', 'bbhlbh', '2019-03-01 03:55:03', '2019-03-01 03:55:03'),
(3, 'TS0001', 2, 1, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9898989898, 'liuhi', 8769876876, 'lmuhnyigm', 'jkygukyuyj', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'uo7yo9h', '9n7y7', NULL, NULL, 'noiuhoy9y', '87098', '98790709', 7097987, '098709798', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-02-02', 'sws', 'jhby', 'ii', '2019-03-01 04:50:33', '2019-03-01 04:50:33'),
(4, 'TS0002', 2, 1, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9898989898, 'liuhi', 8769876876, 'lmuhnyigm', 'jkygukyuyj', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'uo7yo9h', '9n7y7', NULL, NULL, 'noiuhoy9y', '87098', '98790709', 7097987, '098709798', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-02-02', 'sws', 'jhby', 'ii', '2019-03-01 04:51:00', '2019-03-01 04:51:00'),
(5, 'TP0001', 2, 2, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9898989898, 'liuhi', 8769876876, 'lmuhnyigm', 'jkygukyuyj', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'uo7yo9h', '9n7y7', NULL, NULL, 'noiuhoy9y', '87098', '98790709', 7097987, '098709798', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-02-02', 'sws', 'jhby', 'ii', '2019-03-01 04:51:16', '2019-03-01 04:51:16'),
(6, 'TC0001', 2, 3, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9898989898, 'liuhi', 8769876876, 'lmuhnyigm', 'jkygukyuyj', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'uo7yo9h', '9n7y7', NULL, NULL, 'noiuhoy9y', '87098', '98790709', 7097987, '098709798', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-02-02', 'sws', 'jhby', 'ii', '2019-03-01 04:51:29', '2019-03-01 04:51:29'),
(7, 'TI0001', 2, 4, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9898989898, 'liuhi', 8769876876, 'lmuhnyigm', 'jkygukyuyj', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'uo7yo9h', '9n7y7', NULL, NULL, 'noiuhoy9y', '87098', '98790709', 7097987, '098709798', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-02-02', 'sws', 'jhby', 'ii', '2019-03-01 04:51:49', '2019-03-01 04:51:49'),
(8, 'TR0001', 3, 1, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9898989898, 'liuhi', 8769876876, 'lmuhnyigm', 'jkygukyuyj', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'uo7yo9h', '9n7y7', NULL, NULL, 'noiuhoy9y', '87098', '98790709', 7097987, '098709798', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-02-02', 'sws', 'jhby', 'ii', '2019-03-01 04:52:28', '2019-03-01 04:52:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_types`
--
ALTER TABLE `employee_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esi_details`
--
ALTER TABLE `esi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `leave_quota`
--
ALTER TABLE `leave_quota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `leave_records`
--
ALTER TABLE `leave_records`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mi_details`
--
ALTER TABLE `mi_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `pf_details`
--
ALTER TABLE `pf_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`sport_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`employeeID`);

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
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `esi_details`
--
ALTER TABLE `esi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_quota`
--
ALTER TABLE `leave_quota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_records`
--
ALTER TABLE `leave_records`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mi_details`
--
ALTER TABLE `mi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pf_details`
--
ALTER TABLE `pf_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `__id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `esi_details`
--
ALTER TABLE `esi_details`
  ADD CONSTRAINT `esi_details_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `leave_quota`
--
ALTER TABLE `leave_quota`
  ADD CONSTRAINT `leave_quota_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `leave_records`
--
ALTER TABLE `leave_records`
  ADD CONSTRAINT `leave_records_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `mi_details`
--
ALTER TABLE `mi_details`
  ADD CONSTRAINT `mi_details_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `pf_details`
--
ALTER TABLE `pf_details`
  ADD CONSTRAINT `pf_details_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);
COMMIT;

