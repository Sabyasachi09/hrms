
CREATE DATABASE IF NOT EXISTS `tenvicsp_hrms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tenvicsp_hrms`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

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
(1, 'Anil Kumble Sports Promotion Pvt Ltd', 'TA', 'TAP', 'TAC', 'TAI', 0, 1, '2019-02-28 23:08:52', '2019-03-01 15:38:52'),
(2, 'TENVIC Sports Education Pvt Ltd', 'TS', 'TP', 'TC', 'TI', 1, 1, '2019-02-28 23:05:29', '2019-03-01 15:35:29'),
(3, 'TENVIC Retail Pvt Ltd', 'TR', 'TRP', 'TRC', 'TRI', 1, 1, '2019-02-28 23:09:04', '2019-03-01 15:39:04');

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
(1, 'Grass Root Sports', '2019-02-28 17:35:52', '2019-03-01 10:05:52', 1),
(2, 'HR', '2019-02-28 17:35:52', '2019-03-01 10:05:52', 1),
(3, 'I.T', '2019-02-28 19:11:41', '2019-03-01 11:41:41', 1);

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
(2, 'HR Manager', '2019-02-28 17:20:40', '2019-04-03 12:33:05', 1),
(3, 'Finance Manager', '2019-02-28 17:20:40', '2019-04-03 12:45:41', 1),
(4, 'Manager', '2019-04-03 07:03:25', '2019-04-03 12:45:45', 1),
(5, 'Employee', '2019-04-03 07:15:55', '2019-04-03 12:45:55', 1);

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
(1, 'Full Time', 1, '2019-02-21 07:30:00', '2019-02-21 07:30:00', 1),
(2, 'Part Time', 2, '2019-02-21 07:30:00', '2019-02-21 07:30:00', 1),
(3, 'Consultant', 3, '2019-02-21 07:30:00', '2019-02-21 07:30:00', 1),
(4, 'Intern', 4, '2019-02-28 23:15:10', '2019-02-21 07:30:00', 1);

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

--
-- Dumping data for table `esi_details`
--

INSERT INTO `esi_details` (`id`, `employeeID`, `name`, `relation`, `dob`, `aadhar_number`, `created_at`, `updated_at`) VALUES
(1, 'AKSP0001', 'e', 'e', '2000-01-01', 'e', '2019-02-28 22:24:56', '2019-03-01 14:54:56'),
(2, 'AKSP0001', 'e2', 'e2', '2000-01-01', 'lnu', '2019-02-28 22:24:56', '2019-03-01 14:54:56'),
(3, 'AKSP0002', 'e', 'e', '2000-01-01', 'e', '2019-02-28 22:25:03', '2019-03-01 14:55:03'),
(4, 'AKSP0002', 'e2', 'e2', '2000-01-01', 'lnu', '2019-02-28 22:25:03', '2019-03-01 14:55:03'),
(23, 'TA0001', 's', 's', '2000-10-10', 'adsfasdf', '2019-03-20 06:09:56', '2019-03-20 11:39:56'),
(24, 'TS0001', 'oiuho', 'ioo', '2000-10-01', 'jkhiluhik', '2019-04-03 07:39:39', '2019-04-03 13:09:39');

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
(1, 'KLE', '2019-02-28 18:00:55', '2019-03-01 10:30:55', 1),
(2, 'DSA Stadium', '2019-02-28 18:00:55', '2019-03-01 10:30:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_quota`
--

DROP TABLE IF EXISTS `leave_quota`;
CREATE TABLE `leave_quota` (
  `id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `earned_quota` float NOT NULL,
  `casual_quota` float NOT NULL,
  `comp_quota` float DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_quota`
--

INSERT INTO `leave_quota` (`id`, `employeeID`, `earned_quota`, `casual_quota`, `comp_quota`, `created_at`, `updated_at`, `status`) VALUES
(8, 'AKSP0001', 0, 0, 0, '2019-03-12 15:00:20', '2019-03-26 05:42:50', 1),
(9, 'TA0001', 15, 8, 0, '2019-03-20 00:39:56', '2019-03-20 06:09:56', 1),
(10, 'TS0001', 11.5, 8, 0, '2019-04-03 02:09:39', '2019-04-03 07:39:39', 1);

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

--
-- Dumping data for table `leave_records`
--

INSERT INTO `leave_records` (`leave_id`, `employeeID`, `number_of_leave`, `leave_type`, `managerID`, `leave_from`, `leave_to`, `leave_reason`, `created_at`, `updated_at`, `leave_status`) VALUES
(1, 'AKSP0001', 4, 1, 'AKSP0002', '2019-03-23', '2019-03-26', 'sd', '2019-03-26 00:10:08', '2019-03-26 05:40:37', 2),
(2, 'AKSP0001', 12, 1, 'AKSP0002', '2019-03-23', '2019-04-03', 'add', '2019-03-26 00:11:50', '2019-03-26 05:41:56', 2),
(3, 'AKSP0001', 2, 1, 'AKSP0002', '2019-03-23', '2019-03-24', 'add', '2019-03-26 00:12:41', '2019-03-26 05:42:50', 2);

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
(1, 'Casual Leave', '2019-03-10 00:48:35', '2019-03-10 17:18:35', 1),
(2, 'Medical Leave', '2019-03-10 00:48:35', '2019-03-10 17:18:35', 1),
(3, 'Compensation off', '2019-03-10 21:59:33', '2019-03-11 14:29:33', 1);

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
(1, 'Bangalore', 1, '2019-02-21 10:47:14', '2019-02-21 10:47:14', 1),
(2, 'Delhi', 2, '2019-02-21 08:38:18', '2019-02-21 07:30:00', 1),
(3, 'Mumbai', 3, '2019-02-21 07:30:00', '2019-02-21 07:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lop_records`
--

DROP TABLE IF EXISTS `lop_records`;
CREATE TABLE `lop_records` (
  `lop_id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `lop` int(11) NOT NULL,
  `lop_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lop_records`
--

INSERT INTO `lop_records` (`lop_id`, `employeeID`, `lop`, `lop_date`, `created_at`, `updated_at`, `status`) VALUES
(1, 'AKSP0001', 3, '2019-03-26 11:11:56', '2019-03-26 00:11:56', '2019-03-26 05:41:56', 1),
(2, 'AKSP0001', 2, '2019-03-26 11:12:50', '2019-03-26 00:12:50', '2019-03-26 05:42:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_lists`
--

DROP TABLE IF EXISTS `menu_lists`;
CREATE TABLE `menu_lists` (
  `menu_id` int(11) NOT NULL,
  `sub_menu_of` int(11) NOT NULL,
  `sub_menu_title` varchar(150) NOT NULL,
  `sub_menu_link` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  `display_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_lists`
--

INSERT INTO `menu_lists` (`menu_id`, `sub_menu_of`, `sub_menu_title`, `sub_menu_link`, `role_id`, `display_order`) VALUES
(1, 1, 'Add Employee', '/user/create', 1, 1),
(2, 1, 'View Employees', '/user/viewall', 1, 2),
(3, 1, 'Add Employee', '/user/create', 2, 1),
(4, 1, 'View Employees', '/user/viewall', 2, 2),
(5, 1, 'Add Employee', '/user/create', 3, 1),
(6, 1, 'View Employees', '/user/viewall', 3, 2),
(7, 2, 'Request Leave', '/leave/request', 1, 1),
(8, 2, 'Review Leave', '/leave/approve', 1, 2),
(9, 2, 'Request Leave', '/leave/request', 2, 1),
(10, 2, 'Review Leave', '/leave/approve', 2, 2),
(11, 2, 'Request Leave', '/leave/request', 3, 1),
(12, 2, 'Review Leave', '/leave/approve', 3, 2),
(13, 2, 'Request Leave', '/leave/request', 4, 1),
(14, 2, 'Review Leave', '/leave/approve', 4, 2),
(15, 2, 'Request Leave', '/leave/request', 5, 1),
(16, 3, 'Generate Payslips', '/payroll', 1, 1),
(17, 3, 'Generate Payslips', '/payroll', 2, 1),
(18, 3, 'Generate Payslips', '/payroll', 3, 1);

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

--
-- Dumping data for table `mi_details`
--

INSERT INTO `mi_details` (`id`, `employeeID`, `name`, `relation`, `dob`, `aadhar_number`, `created_at`, `updated_at`) VALUES
(1, 'AKSP0001', 'mi', 'mi', '2000-01-01', 'mi', '2019-02-28 22:24:56', '2019-03-01 14:54:56'),
(2, 'AKSP0001', 'mi2', 'mi2', '2000-01-01', 'nkjnil', '2019-02-28 22:24:56', '2019-03-01 14:54:56'),
(3, 'AKSP0002', 'mi', 'mi', '2000-01-01', 'mi', '2019-02-28 22:25:03', '2019-03-01 14:55:03'),
(4, 'AKSP0002', 'mi2', 'mi2', '2000-01-01', 'nkjnil', '2019-02-28 22:25:03', '2019-03-01 14:55:03'),
(23, 'TA0001', 'f', 'f', '2000-01-01', 'kjjn', '2019-03-20 06:09:56', '2019-03-20 11:39:56'),
(24, 'TS0001', 'j', 'j', '2000-01-01', 'eafsad', '2019-04-03 07:39:39', '2019-04-03 13:09:39');

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

--
-- Dumping data for table `pf_details`
--

INSERT INTO `pf_details` (`id`, `employeeID`, `name`, `relation`, `dob`, `aadhar_number`, `created_at`, `updated_at`) VALUES
(1, 'AKSP0001', 'ni', 'ni', '2000-01-01', 'in', '2019-02-28 22:24:56', '2019-03-01 14:54:56'),
(2, 'AKSP0001', 'nm1', 'm', '2000-01-01', 'muujln', '2019-02-28 22:24:56', '2019-03-01 14:54:56'),
(3, 'AKSP0002', 'ni', 'ni', '2000-01-01', 'in', '2019-02-28 22:25:03', '2019-03-01 14:55:03'),
(4, 'AKSP0002', 'nm1', 'm', '2000-01-01', 'muujln', '2019-02-28 22:25:03', '2019-03-01 14:55:03'),
(23, 'TA0001', 'f', 'f', '2000-10-01', 'wefdsd', '2019-03-20 06:09:56', '2019-03-20 11:39:56'),
(24, 'TS0001', 'asd', 'asa', '2000-01-01', 'sdfasfd', '2019-04-03 07:39:39', '2019-04-03 13:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `rbacs`
--

DROP TABLE IF EXISTS `rbacs`;
CREATE TABLE `rbacs` (
  `rbac_id` int(11) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `main_menu_title` varchar(150) NOT NULL,
  `menu_description` varchar(150) NOT NULL,
  `menu_icon` varchar(150) NOT NULL,
  `role_id` int(11) NOT NULL,
  `display_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rbacs`
--

INSERT INTO `rbacs` (`rbac_id`, `main_menu_id`, `main_menu_title`, `menu_description`, `menu_icon`, `role_id`, `display_order`) VALUES
(1, 1, 'Employees', 'Manage Employees', 'fa fa-user', 1, 1),
(2, 1, 'Employees', 'Manage Employees', 'fa fa-user', 2, 1),
(3, 1, 'Employees', 'Manage Employees', 'fa fa-user', 3, 1),
(4, 2, 'Leave', 'Manage Leave', 'fas fa-user-tag', 1, 2),
(5, 2, 'Leave', 'Manage Leave', 'fas fa-user-tag', 2, 2),
(6, 2, 'Leave', 'Manage Leave', 'fas fa-user-tag', 3, 2),
(7, 2, 'Leave', 'Manage Leave', 'fas fa-user-tag', 4, 2),
(8, 2, 'Leave', 'Manage Leave', 'fas fa-user-tag', 5, 2),
(9, 3, 'Payroll', 'Manage Payroll', 'fas fa-money-check-alt', 1, 1),
(10, 3, 'Payroll', 'Manage Payroll', 'fas fa-money-check-alt', 2, 1),
(11, 3, 'Payroll', 'Manage Payroll', 'fas fa-money-check-alt', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_constants`
--

DROP TABLE IF EXISTS `salary_constants`;
CREATE TABLE `salary_constants` (
  `sconstant_id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `Basic` float DEFAULT '0',
  `HRA` float DEFAULT '0',
  `Conveyance_Allowance` float DEFAULT '0',
  `Medical_Allowance` float DEFAULT '0',
  `LTA` float DEFAULT '0',
  `Other_Allowance` float DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_constants`
--

INSERT INTO `salary_constants` (`sconstant_id`, `employeeID`, `Basic`, `HRA`, `Conveyance_Allowance`, `Medical_Allowance`, `LTA`, `Other_Allowance`, `created_at`, `updated_at`, `status`) VALUES
(1, 'AKSP0001', 20000, 10000, 5000, 2000, 500, 1000, '2019-03-26 08:08:05', '2019-03-27 19:09:24', 1),
(2, 'AKSP0002', 30000, 15000, 15000, 2000, 500, 1000, '2019-03-26 08:08:05', '2019-03-26 08:08:05', 1),
(3, 'TA0001', 40000, 20000, 10000, 20000, 0, 0, '2019-03-26 08:08:59', '2019-03-27 18:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary_variables`
--

DROP TABLE IF EXISTS `salary_variables`;
CREATE TABLE `salary_variables` (
  `svariables_id` int(11) NOT NULL,
  `employeeID` varchar(150) NOT NULL,
  `Pay_Days` float NOT NULL,
  `Present_Days` float NOT NULL,
  `Referral_Bonus` float DEFAULT '0',
  `ASP_Share` float DEFAULT '0',
  `Arrears` float DEFAULT '0',
  `Reimbursement` float DEFAULT '0',
  `Marriage_Bonus` float DEFAULT '0',
  `Total_Earning` float DEFAULT '0',
  `PF` float DEFAULT '0',
  `ESI` float DEFAULT '0',
  `PT` float DEFAULT '0',
  `TDS` float DEFAULT '0',
  `Recoveries` float DEFAULT '0',
  `Other_Deduction` float DEFAULT '0',
  `Medical_Insurance` float DEFAULT '0',
  `Loan_Recovery` float DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_variables`
--

INSERT INTO `salary_variables` (`svariables_id`, `employeeID`, `Pay_Days`, `Present_Days`, `Referral_Bonus`, `ASP_Share`, `Arrears`, `Reimbursement`, `Marriage_Bonus`, `Total_Earning`, `PF`, `ESI`, `PT`, `TDS`, `Recoveries`, `Other_Deduction`, `Medical_Insurance`, `Loan_Recovery`, `created_at`, `updated_at`, `status`) VALUES
(1, 'AKSP0001', 28, 28, 1000, 100, 200, 500, 400, NULL, 1500, 500, 200, 200, 200, 500, 500, 500, '2019-03-26 08:13:03', '2019-04-03 14:31:11', 1),
(2, 'AKSP0002', 28, 27, 2000, 1000, 300, 400, 500, NULL, 1200, 300, 200, 500, 300, 200, 500, 200, '2019-03-26 08:13:03', '2019-04-03 14:31:16', 1),
(3, 'TA0001', 26, 24, 2000, 400, 200, 1000, 3000, NULL, 2000, 200, 200, 1000, 500, 500, 500, 300, '2019-03-26 08:33:58', '2019-04-03 14:31:24', 1);

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
(1, 'Badminton', '2019-02-28 17:54:08', '2019-03-01 10:24:08', 1),
(2, 'Basketball', '2019-02-28 17:54:08', '2019-03-01 10:24:08', 1),
(3, 'Cricket', '2019-02-28 17:54:44', '2019-03-01 10:24:44', 1),
(4, 'Football', '2019-02-28 17:54:44', '2019-03-01 10:24:44', 1);

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
  `roleID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employeeID`, `password`, `firstname`, `lastname`, `roleID`, `created_at`, `updated_at`, `status`) VALUES
('AKSP0001', 'tenvic', 's', 's', 1, '2019-02-28 16:54:56', '2019-04-03 14:27:02', 1),
('AKSP0002', 'tenvic', 's', 's', 1, '2019-02-28 16:55:03', '2019-04-03 13:05:06', 1),
('TA0001', 'tenvic', 'S3', 'C', 1, '2019-03-20 00:39:56', '2019-03-20 06:09:56', 1),
('TS0001', 'tenvic', 'Employee1', 'one', 5, '2019-04-03 02:09:39', '2019-04-03 07:39:39', 1);

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
  `managerID` varchar(150) DEFAULT NULL,
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
  `personal_bank` varchar(150) DEFAULT NULL,
  `personal_ifsc` varchar(150) DEFAULT NULL,
  `personal_branch` varchar(150) DEFAULT NULL,
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

INSERT INTO `user_details` (`__id`, `employeeID`, `company`, `employee_type`, `designation`, `level`, `department`, `project_division`, `managerID`, `doj`, `exit_date`, `contract_from`, `contract_to`, `exit_remarks`, `school_academy`, `sport`, `location`, `mobile_no`, `emergency_contact_person`, `emergency_contact_number`, `official_email`, `personal_email`, `dob`, `gender`, `blood_group`, `maritial_status`, `educational_qualification`, `educational_qualification_details`, `sports_certification`, `experience_previous`, `pan_number`, `aadhar_number`, `uan`, `esic_number`, `passport_number`, `salary_ac`, `personal_ac`, `personal_bank`, `personal_ifsc`, `personal_branch`, `salary`, `gst`, `father_name`, `mother_name`, `pf_nominee_relation`, `pf_nominee_name`, `pf_nominee_dob`, `pf_nominee_aadhar`, `esi_nominee_relation`, `esi_nominee_name`, `esi_nominee_dob`, `esi_nominee_aadhar`, `present_address`, `permanent_address`, `created_at`, `updated_at`) VALUES
(1, 'AKSP0001', 1, 1, 1, 2, 3, NULL, 'AKSP0002', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 8787878788, 'jbkyu', 789698, 'dasljnliu', 'hbkyblh', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'AOIP3343324', 'yg iy', '33234543333', NULL, 'g iyggomh', '6897698769876', '76978698', NULL, NULL, NULL, 8769786986, '9769786987', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-01-01', 'e', 'adfZ', 'bbhlbh', '2019-02-28 16:54:56', '2019-02-28 16:54:56'),
(2, 'AKSP0002', 1, 1, 1, 2, 3, NULL, '', '2000-01-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 8787878788, 'jbkyu', 789698, 'dasljnliu', 'hbkyblh', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, NULL, NULL, 'AW89797Q23', 'yg iy', '34234123412', NULL, 'g iyggomh', '6897698769876', '76978698', NULL, NULL, NULL, 8769786986, '9769786987', 's', 's', 'n', 'n', '2000-01-01', 'n', 'e', 'e', '2000-01-01', 'e', 'adfZ', 'bbhlbh', '2019-02-28 16:55:03', '2019-02-28 16:55:03'),
(21, 'TA0001', 1, 1, 1, 2, 3, 'IT', NULL, '2016-09-01', NULL, NULL, NULL, NULL, NULL, NULL, 1, 9999999999, 's', 8787878787, 's@s.com', 's@s.com', '2000-01-01', 'Male', 'O+', 'Single', 'PG', NULL, 'd', 'd', 'AW89797454', 'asdfa', '22323432323', 'sfg', 'pdf', '7987', '89798', NULL, NULL, NULL, 9999999, '89707oyi', 's', 's', 'f', 'f', '2000-01-01', 'luhlhj', 's', 's', '2000-01-01', 'kjnn', 'nkj', 'nkjn', '2019-03-20 00:39:56', '2019-03-20 00:39:56'),
(22, 'TS0001', 2, 1, 5, 1, 3, 'IT', NULL, '2019-04-03', NULL, NULL, NULL, NULL, NULL, NULL, 1, 8888888888, 'Mr contact', 9889798709, 'abc@abc.com', 'abc@abc.com', '2019-04-01', 'Male', 'B-', 'Single', 'PG', NULL, 'asdfa', 'pdf', 'AW897879', 'A3423wer', '432141234134', '2342413245134', 'PAwe8u0if', '123412341234', '31241212431', NULL, NULL, NULL, 20000, '324123412', 'MR father', 'Mrs Mother', 'a', 'a', '2000-01-01', 'das', 'q', 'q', '2000-01-01', 'luhio7hiu;j', 'asdf', 'asdf', '2019-04-03 02:09:39', '2019-04-03 02:09:39');

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
-- Indexes for table `lop_records`
--
ALTER TABLE `lop_records`
  ADD PRIMARY KEY (`lop_id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `menu_lists`
--
ALTER TABLE `menu_lists`
  ADD PRIMARY KEY (`menu_id`);

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
-- Indexes for table `rbacs`
--
ALTER TABLE `rbacs`
  ADD PRIMARY KEY (`rbac_id`);

--
-- Indexes for table `salary_constants`
--
ALTER TABLE `salary_constants`
  ADD PRIMARY KEY (`sconstant_id`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `salary_variables`
--
ALTER TABLE `salary_variables`
  ADD PRIMARY KEY (`svariables_id`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_types`
--
ALTER TABLE `employee_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `esi_details`
--
ALTER TABLE `esi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_quota`
--
ALTER TABLE `leave_quota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `lop_records`
--
ALTER TABLE `lop_records`
  MODIFY `lop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu_lists`
--
ALTER TABLE `menu_lists`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mi_details`
--
ALTER TABLE `mi_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pf_details`
--
ALTER TABLE `pf_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rbacs`
--
ALTER TABLE `rbacs`
  MODIFY `rbac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salary_constants`
--
ALTER TABLE `salary_constants`
  MODIFY `sconstant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary_variables`
--
ALTER TABLE `salary_variables`
  MODIFY `svariables_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `sport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `__id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Constraints for table `lop_records`
--
ALTER TABLE `lop_records`
  ADD CONSTRAINT `lop_records_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

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
-- Constraints for table `salary_constants`
--
ALTER TABLE `salary_constants`
  ADD CONSTRAINT `salary_constants_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `salary_variables`
--
ALTER TABLE `salary_variables`
  ADD CONSTRAINT `salary_variables_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `users` (`employeeID`);
COMMIT;
