-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 11:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-care`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodgroup`
--

CREATE TABLE `bloodgroup` (
  `BL_id` int(11) NOT NULL,
  `BL_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bloodgroup`
--

INSERT INTO `bloodgroup` (`BL_id`, `BL_group`) VALUES
(1, 'A+'),
(2, 'AB+'),
(3, 'AB-'),
(4, 'B+'),
(5, 'B-'),
(6, 'O+'),
(7, 'O-');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `B_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL,
  `S_id` int(11) NOT NULL,
  `B_date` datetime NOT NULL DEFAULT current_timestamp(),
  `tokenno` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`B_id`, `P_id`, `D_id`, `S_id`, `B_date`, `tokenno`) VALUES
(1, 21, 6, 13, '2022-07-04 21:43:23', 1),
(2, 21, 7, 14, '2022-07-04 21:43:23', 1),
(4, 21, 6, 16, '2022-07-04 21:43:23', 1),
(5, 21, 6, 17, '2022-07-04 21:43:23', 1),
(6, 21, 6, 19, '2022-07-04 21:43:23', 1),
(7, 21, 6, 20, '2022-07-04 21:43:23', 1),
(8, 21, 6, 21, '2022-07-04 21:43:23', 1),
(9, 21, 6, 22, '2022-07-04 21:43:23', 1),
(10, 21, 6, 23, '2022-07-04 21:43:23', 1),
(11, 21, 8, 4, '2022-07-04 21:43:23', 1),
(12, 28, 8, 24, '2022-07-04 21:43:23', 1),
(13, 21, 8, 24, '2022-07-04 21:43:23', 2),
(14, 28, 6, 26, '2022-07-04 21:43:23', 1),
(15, 29, 6, 26, '2022-07-04 21:43:23', 2),
(16, 30, 6, 26, '2022-07-04 21:43:23', 3),
(17, 30, 9, 27, '2022-07-04 21:43:23', 1),
(18, 29, 9, 27, '2022-07-04 21:43:23', 2),
(19, 29, 8, 28, '2022-07-04 21:43:23', 1),
(20, 21, 6, 29, '2022-07-04 21:43:23', 1),
(21, 28, 6, 30, '2022-07-04 21:43:23', 1),
(22, 28, 6, 31, '2022-07-04 21:43:23', 1),
(23, 21, 6, 31, '2022-07-04 21:43:23', 2),
(24, 21, 7, 8, '2022-07-04 21:43:23', 1),
(25, 21, 6, 32, '2022-07-04 21:43:23', 1),
(33, 28, 6, 32, '2022-07-04 21:43:23', 2),
(39, 28, 6, 34, '2022-07-04 21:43:23', 1),
(41, 28, 6, 35, '2022-07-04 21:43:23', 1),
(42, 21, 6, 35, '2022-07-17 06:23:17', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dept_id` int(11) NOT NULL,
  `Dept_name` varchar(50) NOT NULL,
  `Dept_pic` varchar(50) NOT NULL,
  `Dept_about` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dept_id`, `Dept_name`, `Dept_pic`, `Dept_about`) VALUES
(1, 'Cardiology', 'cardiac.jpg', ''),
(2, 'Dermetology', 'dermetology.jfif', ''),
(3, 'ENT', 'ent.jfif', ''),
(4, 'General Medicine', 'gnr.jpg', ''),
(8, 'Dentist', 'dental.jpg', ''),
(9, 'Pediatric', 'gyn.jpg', ''),
(10, 'Gynaecology', 'gyn.jpg', ''),
(11, 'Neurology', 'neuro.jpg', 'E-care is a health care consortium having a renowned reputation. The Greams road facility boosts of multi-disciplinary treatment approach. Everyone in the family from the grandparents to grandchildren can get treated under the same roof by specialists. The neurosurgery and neurology departments work in sync with each other to form a cohesive neurosciences unit that tends to every nervous system injury from headaches to seizures.');

-- --------------------------------------------------------

--
-- Table structure for table `disease_his`
--

CREATE TABLE `disease_his` (
  `DH_id` int(11) NOT NULL,
  `Disease` varchar(50) NOT NULL,
  `P_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disease_his`
--

INSERT INTO `disease_his` (`DH_id`, `Disease`, `P_id`) VALUES
(13, 'Astma', 21),
(14, 'Heart desease', 21),
(15, 'Allergies', 21);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_id` int(11) NOT NULL,
  `Log_id` int(11) NOT NULL,
  `D_name` varchar(50) NOT NULL,
  `D_pos` varchar(50) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `D_phone` bigint(10) NOT NULL,
  `D_license` varchar(10000) NOT NULL,
  `D_specialization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_id`, `Log_id`, `D_name`, `D_pos`, `Dept_id`, `D_phone`, `D_license`, `D_specialization_id`) VALUES
(6, 91, 'Jobin Jose', 'Senoir', 1, 9090878765, 'Prototype.pdf', 1),
(7, 92, 'Rose', 'junior', 10, 7899877890, 'Prototype.pdf', 12),
(8, 93, 'Sam Mon', 'senoir', 1, 8907654321, 'office.pdf', 1),
(9, 94, 'Sonu Ribin', 'senoir', 4, 7890003456, 'Prototype.pdf', 15),
(13, 105, 'Joice John', 'junior', 2, 6776543412, 'android abhijith final doc.pdf', 8);

-- --------------------------------------------------------

--
-- Table structure for table `doctoreducation`
--

CREATE TABLE `doctoreducation` (
  `D_edu_id` int(11) NOT NULL,
  `D_edu_qualification` varchar(50) NOT NULL,
  `D_id` int(11) NOT NULL,
  `De_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctoreducation`
--

INSERT INTO `doctoreducation` (`D_edu_id`, `D_edu_qualification`, `D_id`, `De_status`) VALUES
(4, 'MBBS', 7, 0),
(7, 'MBBS', 6, 1),
(8, 'MBBS', 9, 1),
(10, 'MD', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `family_disease`
--

CREATE TABLE `family_disease` (
  `FD_id` int(11) NOT NULL,
  `FD_disease` varchar(50) NOT NULL,
  `P_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `family_disease`
--

INSERT INTO `family_disease` (`FD_id`, `FD_disease`, `P_id`) VALUES
(1, 'Astma', 21),
(2, 'Depression', 21),
(3, 'High Blood pressure', 21),
(4, 'Rheumatic fever', 21);

-- --------------------------------------------------------

--
-- Table structure for table `healthpackage`
--

CREATE TABLE `healthpackage` (
  `HP_id` int(11) NOT NULL,
  `HP_title` varchar(100) NOT NULL,
  `HP_patientno` int(50) NOT NULL,
  `HP_price` int(100) NOT NULL,
  `HP_from` date NOT NULL,
  `HP_upto` date NOT NULL,
  `HP_remark` varchar(500) NOT NULL,
  `HP_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `healthpackage`
--

INSERT INTO `healthpackage` (`HP_id`, `HP_title`, `HP_patientno`, `HP_price`, `HP_from`, `HP_upto`, `HP_remark`, `HP_pic`) VALUES
(2, 'Platinum health check', 0, 500, '2022-06-25', '2022-06-29', 'A comprehensive master health check-up package that completely covers all the basics of health care.', 'doctor.jpg'),
(15, 'Advanced Full body checkup', 17, 1500, '2022-06-23', '2022-06-29', 'A complete body checkup', 'full-body-checkup-thumb.jpg'),
(16, 'Basic Helth Checkup', 9, 1100, '2022-06-25', '2022-06-30', 'This checkup is ideal for individuals between 18-40 years of age.If you have a family history of or have been diagnosed with Renal Disorder, Filarial Infestation, Intellectual Abnormality, Liver Disorder and Thyroid Disorder, you should get this checkup.', 'whole-body-thumb.jpg'),
(17, 'Liver Functioning Test', 14, 100, '2022-07-09', '2022-07-10', 'Liver fuctioning', 'doctor.jpg'),
(18, 'Liver Functioning Test', 5, 100, '2022-07-19', '2022-07-23', 'Liver function tests are blood tests used to help diagnose and monitor liver disease or damage. The tests measure the levels of certain enzymes and proteins in your blood.', '17472.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hpack_assign`
--

CREATE TABLE `hpack_assign` (
  `HPA_id` int(11) NOT NULL,
  `HP_id` int(11) NOT NULL,
  `LB_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpack_assign`
--

INSERT INTO `hpack_assign` (`HPA_id`, `HP_id`, `LB_id`) VALUES
(1, 2, 1),
(15, 15, 1),
(16, 16, 1),
(17, 16, 2),
(18, 16, 3),
(19, 16, 4),
(20, 17, 2),
(21, 17, 3),
(22, 18, 2),
(23, 18, 3),
(24, 18, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hpack_book`
--

CREATE TABLE `hpack_book` (
  `HPB_id` int(11) NOT NULL,
  `HP_id` int(11) NOT NULL,
  `P_id` int(11) NOT NULL,
  `HPB_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpack_book`
--

INSERT INTO `hpack_book` (`HPB_id`, `HP_id`, `P_id`, `HPB_date`, `status`) VALUES
(1, 2, 21, '2023-06-22 09:49:37', 2),
(2, 16, 21, '2024-06-22 03:14:55', 0),
(3, 15, 21, '2029-06-22 12:20:37', 1),
(5, 15, 28, '2022-07-04 22:39:39', 2),
(6, 17, 28, '2022-07-04 22:44:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hpack_report`
--

CREATE TABLE `hpack_report` (
  `HR_id` int(11) NOT NULL,
  `HR_file` varchar(400) NOT NULL,
  `HPB_id` int(11) NOT NULL,
  `HR_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hpack_report`
--

INSERT INTO `hpack_report` (`HR_id`, `HR_file`, `HPB_id`, `HR_date`) VALUES
(3, 'Prototype.pdf', 1, '2022-07-03 12:38:28'),
(4, 'Table.pdf', 5, '2022-07-05 07:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `imr`
--

CREATE TABLE `imr` (
  `IMR_id` int(11) NOT NULL,
  `IMR_number` int(20) NOT NULL,
  `SMC_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imr`
--

INSERT INTO `imr` (`IMR_id`, `IMR_number`, `SMC_id`, `D_id`) VALUES
(12, 123334, 1, 9),
(13, 122234, 2, 6),
(14, 167345, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `labrefassign`
--

CREATE TABLE `labrefassign` (
  `LA_id` int(11) NOT NULL,
  `B_id` int(11) NOT NULL,
  `LA_date` datetime NOT NULL DEFAULT current_timestamp(),
  `LA_resultstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labrefassign`
--

INSERT INTO `labrefassign` (`LA_id`, `B_id`, `LA_date`, `LA_resultstatus`) VALUES
(10, 22, '2022-07-02 17:37:25', 2);

-- --------------------------------------------------------

--
-- Table structure for table `labreferal`
--

CREATE TABLE `labreferal` (
  `LBR_id` int(11) NOT NULL,
  `LB_id` int(11) NOT NULL,
  `LA_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labreferal`
--

INSERT INTO `labreferal` (`LBR_id`, `LB_id`, `LA_id`) VALUES
(27, 2, 10),
(28, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `labresult`
--

CREATE TABLE `labresult` (
  `LR_id` int(11) NOT NULL,
  `LR_file` varchar(500) NOT NULL,
  `LA_id` int(11) NOT NULL,
  `LR_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labresult`
--

INSERT INTO `labresult` (`LR_id`, `LR_file`, `LA_id`, `LR_date`) VALUES
(1, 'Prototype.pdf', 10, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `LB_id` int(11) NOT NULL,
  `LB_test` varchar(100) NOT NULL,
  `LB_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`LB_id`, `LB_test`, `LB_price`) VALUES
(1, 'ALT Blood Test', 200),
(2, 'Allergy Skin Test', 150),
(3, 'Lipid Profile Test', 400),
(4, 'Hepatitis B tests', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Log_id` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Utype_id` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Log_id`, `Username`, `Password`, `Utype_id`, `Status`) VALUES
(1, 'ecareadpro@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 1, 1),
(2, 'labecare@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 4, 0),
(77, 'kmabhijith1999@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 3, 1),
(78, 'jilsjacob111@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 3, 1),
(83, 'tomjoseph2022b@mca.ajce.in', 'f925916e2754e5e03f75dd58a5733251', 3, 1),
(91, 'jobinjoseph2501@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 2, 1),
(92, 'nimisha99@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 2, 1),
(93, 'sammonbabu2022b@mca.ajce.in', 'f925916e2754e5e03f75dd58a5733251', 2, 1),
(94, 'sonuribinka@gmail.com', 'f925916e2754e5e03f75dd58a5733251', 2, 1),
(95, 'joicejohn2022b@mca.ajce.in', 'f925916e2754e5e03f75dd58a5733251', 3, 1),
(96, 'jommeshjose2022b@mca.ajce.in', 'f925916e2754e5e03f75dd58a5733251', 3, 1),
(97, 'binukphilip2023a@mca.ajce.in', 'f925916e2754e5e03f75dd58a5733251', 3, 1),
(101, 'kmabhijithajce@gmail.com', '64ac8b30f99ac326224a7d8a411b1a02', 3, 1),
(105, 'traintest31@gmail.com', '274f63393fc9c58687d283012d114763', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `MedHis_id` int(10) NOT NULL,
  `P_id` int(11) NOT NULL,
  `MedHis_disease` varchar(50) NOT NULL,
  `MedHis_treatment` varchar(50) NOT NULL,
  `MedHis_detail` varchar(500) DEFAULT NULL,
  `MedHis_Report` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`MedHis_id`, `P_id`, `MedHis_disease`, `MedHis_treatment`, `MedHis_detail`, `MedHis_Report`) VALUES
(8, 21, 'Kidney failure', 'cured', NULL, 'Prototype.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `Medi_id` int(11) NOT NULL,
  `Med_name` varchar(100) NOT NULL,
  `Med_price` int(50) NOT NULL,
  `Med_stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`Medi_id`, `Med_name`, `Med_price`, `Med_stock`) VALUES
(1, 'Dolo 500mg', 5, 100),
(2, 'avil 50mg', 8, 10),
(3, 'Allegra 120mg', 20, 30),
(4, 'Aciloc 150', 30, 10);

-- --------------------------------------------------------

--
-- Table structure for table `medrecord`
--

CREATE TABLE `medrecord` (
  `Med_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `precuation` varchar(50) NOT NULL,
  `B_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medrecord`
--

INSERT INTO `medrecord` (`Med_id`, `title`, `discription`, `precuation`, `B_id`, `date`) VALUES
(3, 'Fever', 'temprature : 99c', 'take rest', 9, '2022-06-19 07:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_id` int(11) NOT NULL,
  `Log_id` int(11) NOT NULL,
  `P_name` varchar(50) NOT NULL,
  `P_address` varchar(50) NOT NULL,
  `P_gender` varchar(20) NOT NULL,
  `P_dob` date NOT NULL,
  `P_phone` bigint(10) NOT NULL,
  `BL_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_id`, `Log_id`, `P_name`, `P_address`, `P_gender`, `P_dob`, `P_phone`, `BL_id`) VALUES
(21, 77, 'Abhijith', 'gsgs', 'Male', '1999-03-29', 6363378759, 1),
(22, 78, 'jils', 'jilsebhavan', 'Male', '2022-02-04', 9876543222, 3),
(27, 83, 'Tom', 'Tom villa', 'Male', '1999-01-01', 8908909877, 2),
(28, 95, 'Joice', 'Karibana kuzhiyil', 'Male', '1999-06-23', 8089765432, 6),
(29, 96, 'Jomesh', 'jomi(h) palarivattam', 'Male', '1999-10-27', 9544247436, 1),
(30, 97, 'Binu', 'pulimootil (H) kannur', 'Male', '1999-05-27', 6708905432, 2),
(32, 101, 'James', 'palamatam(H) kannur', 'Male', '1999-05-27', 7907865432, 1);

-- --------------------------------------------------------

--
-- Table structure for table `priscription`
--

CREATE TABLE `priscription` (
  `Medi_id` int(11) NOT NULL,
  `medqty` int(10) NOT NULL,
  `meddose` varchar(100) NOT NULL,
  `med_id` int(11) NOT NULL,
  `B_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `priscription`
--

INSERT INTO `priscription` (`Medi_id`, `medqty`, `meddose`, `med_id`, `B_id`, `date`) VALUES
(1, 5, '1 * nyt', 15, 11, '2022-06-23 02:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `profileimages`
--

CREATE TABLE `profileimages` (
  `Pro_id` int(11) NOT NULL,
  `Pro_pics` varchar(2000) NOT NULL,
  `Log_id` int(11) NOT NULL,
  `Utype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileimages`
--

INSERT INTO `profileimages` (`Pro_id`, `Pro_pics`, `Log_id`, `Utype_id`) VALUES
(6, 'sndoct3.jpg', 91, 2),
(7, 'doct2.jpg', 92, 2),
(8, 'doct1.jpg', 93, 2),
(9, 'sndoc4.jpg', 94, 2),
(12, 'doct1.jpg', 105, 2);

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `referal_id` int(11) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  `D_id` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `B_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referal`
--

INSERT INTO `referal` (`referal_id`, `Dept_id`, `D_id`, `remarks`, `B_id`, `date`) VALUES
(2, 10, 7, 'hihi', 8, '2022-06-17 08:15:47'),
(3, 1, 6, 'fever', 11, '2022-06-24 03:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `S_id` int(11) NOT NULL,
  `S_Time` time NOT NULL,
  `E_time` time NOT NULL,
  `W_day` date NOT NULL,
  `D_id` int(11) NOT NULL,
  `S_sltno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`S_id`, `S_Time`, `E_time`, `W_day`, `D_id`, `S_sltno`) VALUES
(2, '10:28:57', '14:23:14', '2022-05-12', 6, 0),
(4, '08:00:00', '10:00:00', '2022-09-01', 8, 1),
(7, '12:34:27', '13:34:31', '2022-02-02', 7, 0),
(8, '09:12:15', '11:12:22', '2022-09-09', 7, 0),
(10, '09:37:00', '11:37:09', '2022-05-15', 6, 0),
(11, '10:42:30', '12:42:45', '2022-05-16', 6, 0),
(12, '12:43:07', '15:43:18', '2022-05-15', 6, 0),
(13, '14:23:33', '15:22:38', '2022-05-25', 6, 0),
(14, '14:59:45', '16:01:57', '2022-05-26', 7, 0),
(15, '10:02:23', '11:05:53', '2022-05-25', 7, 0),
(16, '10:17:46', '11:17:51', '2022-06-02', 6, 0),
(17, '11:59:12', '13:59:23', '2022-06-05', 6, 0),
(18, '12:00:25', '14:00:31', '2022-06-05', 6, 0),
(19, '09:29:57', '11:30:21', '2022-06-12', 6, 0),
(20, '14:00:42', '16:00:36', '2022-06-14', 6, 0),
(21, '11:06:35', '12:06:42', '2022-06-18', 6, 0),
(22, '15:19:21', '16:19:26', '2022-06-19', 6, 0),
(23, '11:09:54', '12:10:00', '2022-06-21', 6, 0),
(24, '09:03:43', '10:03:52', '2022-06-25', 8, 0),
(25, '09:14:09', '17:11:26', '2022-06-25', 6, 100),
(26, '09:27:41', '10:27:51', '2022-06-28', 6, 10),
(27, '10:29:31', '11:29:38', '2022-06-29', 9, 0),
(28, '13:11:43', '14:11:48', '2022-06-30', 8, 4),
(29, '09:49:35', '10:49:40', '2022-06-30', 6, 4),
(30, '13:21:22', '17:21:26', '2022-07-01', 6, 9),
(31, '12:01:11', '14:01:48', '2022-07-17', 6, 21),
(32, '16:16:27', '17:16:31', '2022-07-06', 6, 6),
(33, '09:29:08', '11:29:13', '2022-07-15', 6, 0),
(34, '09:10:28', '10:10:38', '2022-07-16', 6, 0),
(35, '09:22:44', '12:22:50', '2022-07-20', 6, 52),
(36, '09:20:42', '12:20:49', '2022-07-30', 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `social_his`
--

CREATE TABLE `social_his` (
  `SH_id` int(11) NOT NULL,
  `Tobacco` varchar(50) NOT NULL,
  `illegal_Drugs` varchar(50) NOT NULL,
  `Alcohole` varchar(50) NOT NULL,
  `P_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_his`
--

INSERT INTO `social_his` (`SH_id`, `Tobacco`, `illegal_Drugs`, `Alcohole`, `P_id`) VALUES
(1, 'No', 'No', 'No', 21);

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `D_specialization_id` int(11) NOT NULL,
  `D_specializations` varchar(50) NOT NULL,
  `Dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`D_specialization_id`, `D_specializations`, `Dept_id`) VALUES
(1, 'Cardiac surgeon', 1),
(8, 'dermet', 2),
(9, 'ent b', 3),
(10, 'derm', 2),
(11, 'Gynecologic Oncology', 10),
(12, 'General Gynecology', 10),
(13, 'Pediatric Pulmonology', 9),
(14, 'otolaryngology ', 3),
(15, 'Neurology', 4);

-- --------------------------------------------------------

--
-- Table structure for table `statemedicalcouncil`
--

CREATE TABLE `statemedicalcouncil` (
  `SMC_id` int(11) NOT NULL,
  `SMC_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statemedicalcouncil`
--

INSERT INTO `statemedicalcouncil` (`SMC_id`, `SMC_name`) VALUES
(1, 'Andhra Pradesh Medical Council'),
(2, 'Arunachal Pradesh Medical Council'),
(3, 'Assam Medical Council'),
(4, 'Bihar Medical Council'),
(5, 'Chattisgarh Medical Council');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `Utype_id` int(11) NOT NULL,
  `Usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`Utype_id`, `Usertype`) VALUES
(1, 'admin'),
(2, 'doctor'),
(3, 'user '),
(4, 'Lab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  ADD PRIMARY KEY (`BL_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `P_id` (`P_id`),
  ADD KEY `D_id` (`D_id`),
  ADD KEY `S_id` (`S_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dept_id`);

--
-- Indexes for table `disease_his`
--
ALTER TABLE `disease_his`
  ADD PRIMARY KEY (`DH_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `Log_id` (`Log_id`),
  ADD KEY `Dept_id` (`Dept_id`),
  ADD KEY `D_specialization_id` (`D_specialization_id`);

--
-- Indexes for table `doctoreducation`
--
ALTER TABLE `doctoreducation`
  ADD PRIMARY KEY (`D_edu_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `family_disease`
--
ALTER TABLE `family_disease`
  ADD PRIMARY KEY (`FD_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `healthpackage`
--
ALTER TABLE `healthpackage`
  ADD PRIMARY KEY (`HP_id`);

--
-- Indexes for table `hpack_assign`
--
ALTER TABLE `hpack_assign`
  ADD PRIMARY KEY (`HPA_id`),
  ADD KEY `HP_id` (`HP_id`),
  ADD KEY `LB_id` (`LB_id`);

--
-- Indexes for table `hpack_book`
--
ALTER TABLE `hpack_book`
  ADD PRIMARY KEY (`HPB_id`),
  ADD KEY `HP_id` (`HP_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `hpack_report`
--
ALTER TABLE `hpack_report`
  ADD PRIMARY KEY (`HR_id`),
  ADD KEY `HPB_id` (`HPB_id`);

--
-- Indexes for table `imr`
--
ALTER TABLE `imr`
  ADD PRIMARY KEY (`IMR_id`),
  ADD KEY `SMC_id` (`SMC_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `labrefassign`
--
ALTER TABLE `labrefassign`
  ADD PRIMARY KEY (`LA_id`),
  ADD KEY `B_id` (`B_id`);

--
-- Indexes for table `labreferal`
--
ALTER TABLE `labreferal`
  ADD PRIMARY KEY (`LBR_id`),
  ADD KEY `LB_id` (`LB_id`),
  ADD KEY `LA_id` (`LA_id`);

--
-- Indexes for table `labresult`
--
ALTER TABLE `labresult`
  ADD PRIMARY KEY (`LR_id`),
  ADD KEY `LA_id` (`LA_id`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`LB_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Log_id`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`MedHis_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`Medi_id`);

--
-- Indexes for table `medrecord`
--
ALTER TABLE `medrecord`
  ADD PRIMARY KEY (`Med_id`),
  ADD KEY `B_id` (`B_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `Log_id` (`Log_id`),
  ADD KEY `BL_id` (`BL_id`);

--
-- Indexes for table `priscription`
--
ALTER TABLE `priscription`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `B_id` (`B_id`),
  ADD KEY `Medi_id` (`Medi_id`);

--
-- Indexes for table `profileimages`
--
ALTER TABLE `profileimages`
  ADD PRIMARY KEY (`Pro_id`),
  ADD KEY `Log_id` (`Log_id`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`referal_id`),
  ADD KEY `B_id` (`B_id`),
  ADD KEY `Dept_id` (`Dept_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`S_id`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `social_his`
--
ALTER TABLE `social_his`
  ADD PRIMARY KEY (`SH_id`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`D_specialization_id`),
  ADD KEY `Dept_id` (`Dept_id`);

--
-- Indexes for table `statemedicalcouncil`
--
ALTER TABLE `statemedicalcouncil`
  ADD PRIMARY KEY (`SMC_id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`Utype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bloodgroup`
--
ALTER TABLE `bloodgroup`
  MODIFY `BL_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `B_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `disease_his`
--
ALTER TABLE `disease_his`
  MODIFY `DH_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctoreducation`
--
ALTER TABLE `doctoreducation`
  MODIFY `D_edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `family_disease`
--
ALTER TABLE `family_disease`
  MODIFY `FD_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `healthpackage`
--
ALTER TABLE `healthpackage`
  MODIFY `HP_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hpack_assign`
--
ALTER TABLE `hpack_assign`
  MODIFY `HPA_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hpack_book`
--
ALTER TABLE `hpack_book`
  MODIFY `HPB_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hpack_report`
--
ALTER TABLE `hpack_report`
  MODIFY `HR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `imr`
--
ALTER TABLE `imr`
  MODIFY `IMR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `labrefassign`
--
ALTER TABLE `labrefassign`
  MODIFY `LA_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `labreferal`
--
ALTER TABLE `labreferal`
  MODIFY `LBR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `labresult`
--
ALTER TABLE `labresult`
  MODIFY `LR_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `LB_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `MedHis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `Medi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medrecord`
--
ALTER TABLE `medrecord`
  MODIFY `Med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `priscription`
--
ALTER TABLE `priscription`
  MODIFY `med_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profileimages`
--
ALTER TABLE `profileimages`
  MODIFY `Pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `referal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `S_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `social_his`
--
ALTER TABLE `social_his`
  MODIFY `SH_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `D_specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `statemedicalcouncil`
--
ALTER TABLE `statemedicalcouncil`
  MODIFY `SMC_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `Utype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`S_id`) REFERENCES `schedule` (`S_id`);

--
-- Constraints for table `disease_his`
--
ALTER TABLE `disease_his`
  ADD CONSTRAINT `disease_his_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `doctor_ibfk_3` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  ADD CONSTRAINT `doctor_ibfk_5` FOREIGN KEY (`D_specialization_id`) REFERENCES `specializations` (`D_specialization_id`);

--
-- Constraints for table `doctoreducation`
--
ALTER TABLE `doctoreducation`
  ADD CONSTRAINT `doctoreducation_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `family_disease`
--
ALTER TABLE `family_disease`
  ADD CONSTRAINT `family_disease_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`);

--
-- Constraints for table `hpack_assign`
--
ALTER TABLE `hpack_assign`
  ADD CONSTRAINT `hpack_assign_ibfk_1` FOREIGN KEY (`HP_id`) REFERENCES `healthpackage` (`HP_id`),
  ADD CONSTRAINT `hpack_assign_ibfk_2` FOREIGN KEY (`LB_id`) REFERENCES `labtests` (`LB_id`);

--
-- Constraints for table `hpack_book`
--
ALTER TABLE `hpack_book`
  ADD CONSTRAINT `hpack_book_ibfk_1` FOREIGN KEY (`HP_id`) REFERENCES `healthpackage` (`HP_id`),
  ADD CONSTRAINT `hpack_book_ibfk_2` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`);

--
-- Constraints for table `hpack_report`
--
ALTER TABLE `hpack_report`
  ADD CONSTRAINT `hpack_report_ibfk_1` FOREIGN KEY (`HPB_id`) REFERENCES `hpack_book` (`HPB_id`);

--
-- Constraints for table `imr`
--
ALTER TABLE `imr`
  ADD CONSTRAINT `imr_ibfk_1` FOREIGN KEY (`SMC_id`) REFERENCES `statemedicalcouncil` (`SMC_id`),
  ADD CONSTRAINT `imr_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `labrefassign`
--
ALTER TABLE `labrefassign`
  ADD CONSTRAINT `labrefassign_ibfk_1` FOREIGN KEY (`B_id`) REFERENCES `booking` (`B_id`);

--
-- Constraints for table `labreferal`
--
ALTER TABLE `labreferal`
  ADD CONSTRAINT `labreferal_ibfk_4` FOREIGN KEY (`LB_id`) REFERENCES `labtests` (`LB_id`),
  ADD CONSTRAINT `labreferal_ibfk_5` FOREIGN KEY (`LA_id`) REFERENCES `labrefassign` (`LA_id`);

--
-- Constraints for table `labresult`
--
ALTER TABLE `labresult`
  ADD CONSTRAINT `labresult_ibfk_1` FOREIGN KEY (`LA_id`) REFERENCES `labrefassign` (`LA_id`);

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`);

--
-- Constraints for table `medrecord`
--
ALTER TABLE `medrecord`
  ADD CONSTRAINT `medrecord_ibfk_1` FOREIGN KEY (`B_id`) REFERENCES `booking` (`B_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`),
  ADD CONSTRAINT `patient_ibfk_3` FOREIGN KEY (`BL_id`) REFERENCES `bloodgroup` (`BL_id`);

--
-- Constraints for table `priscription`
--
ALTER TABLE `priscription`
  ADD CONSTRAINT `priscription_ibfk_1` FOREIGN KEY (`B_id`) REFERENCES `booking` (`B_id`),
  ADD CONSTRAINT `priscription_ibfk_2` FOREIGN KEY (`Medi_id`) REFERENCES `medicine` (`Medi_id`);

--
-- Constraints for table `profileimages`
--
ALTER TABLE `profileimages`
  ADD CONSTRAINT `profileimages_ibfk_1` FOREIGN KEY (`Log_id`) REFERENCES `login` (`Log_id`);

--
-- Constraints for table `referal`
--
ALTER TABLE `referal`
  ADD CONSTRAINT `referal_ibfk_1` FOREIGN KEY (`B_id`) REFERENCES `booking` (`B_id`),
  ADD CONSTRAINT `referal_ibfk_2` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`),
  ADD CONSTRAINT `referal_ibfk_3` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_3` FOREIGN KEY (`D_id`) REFERENCES `doctor` (`D_id`);

--
-- Constraints for table `social_his`
--
ALTER TABLE `social_his`
  ADD CONSTRAINT `social_his_ibfk_1` FOREIGN KEY (`P_id`) REFERENCES `patient` (`P_id`);

--
-- Constraints for table `specializations`
--
ALTER TABLE `specializations`
  ADD CONSTRAINT `specializations_ibfk_1` FOREIGN KEY (`Dept_id`) REFERENCES `department` (`Dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
