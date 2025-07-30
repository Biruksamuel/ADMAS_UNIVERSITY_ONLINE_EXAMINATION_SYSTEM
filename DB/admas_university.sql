-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 11:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admas_university`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Ad_ID` varchar(20) DEFAULT NULL,
  `Ad_password` varchar(30) DEFAULT NULL,
  `Ad_Fname` varchar(30) DEFAULT NULL,
  `Ad_lname` varchar(30) DEFAULT NULL,
  `Ad_email` varchar(80) DEFAULT NULL,
  `Ad_phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Ad_ID`, `Ad_password`, `Ad_Fname`, `Ad_lname`, `Ad_email`, `Ad_phone`) VALUES
('biruk', '4774', 'biruk', 'samuel', 'biruksasmuel@gmail.com', '0947740567');

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `exam_id` varchar(50) DEFAULT NULL,
  `for_section` varchar(50) DEFAULT NULL,
  `loaded_by` varchar(30) DEFAULT NULL,
  `course_name` varchar(50) DEFAULT NULL,
  `time_allowed` int(11) DEFAULT NULL,
  `question_statement` varchar(200) DEFAULT NULL,
  `option_a` varchar(100) DEFAULT NULL,
  `option_b` varchar(100) DEFAULT NULL,
  `option_c` varchar(100) DEFAULT NULL,
  `option_d` varchar(100) DEFAULT NULL,
  `correct_option` varchar(100) DEFAULT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`exam_id`, `for_section`, `loaded_by`, `course_name`, `time_allowed`, `question_statement`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `date`, `time`) VALUES
('Javamidexam', '4DRCS', NULL, 'Object oriented programing with Java', 1, 'Who invented Java Programming?', 'Guido van Rossum', 'James Gosling', 'Dennis Ritchie', 'Bjarne Structure', 'James Gosling', '9:00', '09-7-2024'),
('Javamidexam', '4DRCS', NULL, 'Object oriented programing with Java', 1, 'Methods can be added to objects', 'to move objects', 'to define behavior', 'to rotate objects', 'to turn objects', 'to define behavior', '9:00', '09-7-2024'),
('Javamidexam', '4DRCS', NULL, 'Object oriented programing with Java', 1, 'Which statement is true about Java?', 'Java is a sequence-dependent programming language', 'Java is a code dependent programming language', 'Java is a platform-dependent programming language', 'Java is a platform-independent programming language', 'Java is a platform-independent programming language', '9:00', '09-7-2024'),
('Javamidexam', '4DRCS', NULL, 'Object oriented programing with Java', 1, 'Which component is used to compile, debug and execute the java progra', 'JRE', 'JIT', 'JDK', 'JVM', 'JDK', '9:00', '09-7-2024'),
('Javamidexam', '4DRCS', NULL, 'Object oriented programing with Java', 1, 'The feature that allows the same operations to be carried out differently depending on the object is __', 'Polymorphism', 'Polygamy', 'Inheritane', 'Multitasking', 'Polymorphism', '9:00', '09-7-2024'),
('cppmidexam', '1DRCS', NULL, 'c++', NULL, '_______ refers to the process of locating and removing the errors in a program', 'Analyzing', 'Correcting', 'Debugging', 'Executing', 'Debugging', '', ''),
('cppmidexam', '1DRCS', NULL, 'c++', NULL, 'Who invented C++?', 'Dennis Ritchie', 'Ken Thompson', 'Brian Kernighan', 'Bjarne Stroustrup', 'Ken Thompson', '', ''),
('cppmidexam', '1DRCS', NULL, 'c++', NULL, 'What is C++?', 'C++ is an object-oriented programming language', 'C++ is a procedural programming language', 'C++ supports both procedural and object-oriented programming language', 'C++ is a functional programming language', 'C++ supports both procedural and object-oriented programming language', '', ''),
('cppmidexam', '1DRCS', NULL, 'c++', NULL, 'Which of the following is used for comments in C++?', '/* comment */', '// comment */', '// comment', 'both // comment or /* comment */', 'both // comment or /* comment */', '', ''),
('cppmidexam', '1DRCS', NULL, 'c++', NULL, 'Which is more effective while calling the C++ functions?', 'call by object', 'call by pointer', 'call by value', 'call by reference', 'call by reference', '', ''),
('lkjhgf', '4DRCS', 'biruk', 'computer programming', 1, 'werwteyruki', 'qwetrydtyiug', 'qretyertitu', 'qrteywreutirytu', 'qrtewyruetiyrout', 'weretyuiyrut', '', ''),
('lkjhgf', '4DRCS', 'biruk', 'computer programming', 1, 'ewteyrtiyrtuo', 'qrtewyrteuiryotu', 'qwretyritou', 'qwretwryetuiry', 'qwretyrit', 'qwretyretuiyru', '', ''),
('etewtwet', 'wetwet', 'biruk', 'wetwet', 1, 'werwteyruki', 'qwetrydtyiug', 'qretyertitu', 'qrteywreutirytu', 'qrtewyruetiyrout', 'weretyuiyrut', '', ''),
('etewtwet', 'wetwet', 'biruk', 'wetwet', 1, 'ewteyrtiyrtuo', 'qrtewyrteuiryotu', 'qwretyritou', 'qwretwryetuiry', 'qwretyrit', 'qwretyretuiyru', '', ''),
('etewtwet', 'wetwet', 'biruk', 'wetwet', 1, 'What is C++?', 'C++ is an object-oriented programming language', 'C++ is a procedural programming language', 'C++ supports both procedural and object-oriented programming language', 'C++ is a functional programming language', 'Java is a platform-independent programming language', '', ''),
('etewtwet33', 'wetwet', 'biruk', 'wetwet', 1, 'werwteyruki', 'qwetrydtyiug', 'qretyertitu', 'qrteywreutirytu', 'qrtewyruetiyrout', 'weretyuiyrut', '', ''),
('etewtwet33', 'wetwet', 'biruk', 'wetwet', 1, 'ewteyrtiyrtuo', 'qrtewyrteuiryotu', 'qwretyritou', 'qwretwryetuiry', 'qwretyrit', 'qwretyretuiyru', '', ''),
('etewtwet33', 'wetwet', 'biruk', 'wetwet', 1, 'What is C++?', 'C++ is an object-oriented programming language', 'C++ is a procedural programming language', 'C++ supports both procedural and object-oriented programming language', 'C++ is a functional programming language', 'Java is a platform-independent programming language', '', ''),
('1234', '4DRCS2', 'biruk', 'rere', 1, 'werwteyruki', 'qwetrydtyiug', 'qretyertitu', 'qrteywreutirytu', 'qrtewyruetiyrout', 'weretyuiyrut', '9:00', '09-7-2024');

-- --------------------------------------------------------

--
-- Table structure for table `instractor`
--

CREATE TABLE `instractor` (
  `Ins_ID` varchar(20) DEFAULT NULL,
  `Ins_password` varchar(30) DEFAULT NULL,
  `Ins_Fname` varchar(30) DEFAULT NULL,
  `Ins_lname` varchar(30) DEFAULT NULL,
  `Ins_email` varchar(80) DEFAULT NULL,
  `Ins_phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instractor`
--

INSERT INTO `instractor` (`Ins_ID`, `Ins_password`, `Ins_Fname`, `Ins_lname`, `Ins_email`, `Ins_phone`) VALUES
('ins_1', '4774', 'biruk', 'samuel', 'biruksamuel@gmail.com', '0947740567'),
('ins_2', 'sami123', 'samuel', 'hailu', 'sami@gmail.com', '0987654'),
('ins_3', 'Abex123', 'abebaayehu', 'woldie', 'abex@gmail.com', '0987654'),
('ins_4', 'musie123', 'musie', 'misgun', 'musie@gmail.com', '0987654'),
('ins_5', 'yab123', 'yabkassa', 'girma', 'yab@gmail.com', '0987654'),
('ins_6', 'abrish123', 'abreham', 'gebremedihin', 'abridh@gmail.com', '0987654');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `stud_ID` varchar(20) NOT NULL,
  `exam_id` varchar(50) NOT NULL,
  `answered_at` datetime DEFAULT current_timestamp(),
  `score` int(11) DEFAULT NULL,
  `out_of` int(11) NOT NULL,
  `stud_name` varchar(50) NOT NULL,
  `stud_section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `stud_ID`, `exam_id`, `answered_at`, `score`, `out_of`, `stud_name`, `stud_section`) VALUES
(8, 'ADMA/0987/21', 'javamidexam', '2024-04-30 20:21:55', 3, 5, 'samuel', '4DRCS'),
(9, 'ADMA/8888/21', 'cppmidexam', '2024-04-30 20:27:55', 4, 5, 'Behailu', '1DRCS'),
(14, 'ADMA/0783/21', 'javamidexam', '2024-05-08 18:44:48', 4, 5, 'yabkasa', '4DRCS'),
(15, 'ADMA/0918/21', 'javamidexam', '2024-05-08 18:55:22', 2, 5, 'biruk', '4DRCS');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_ID` varchar(20) NOT NULL,
  `stud_password` varchar(30) DEFAULT NULL,
  `stud_Fname` varchar(30) DEFAULT NULL,
  `stud_lname` varchar(30) DEFAULT NULL,
  `stud_department` varchar(50) DEFAULT NULL,
  `stud_section` varchar(30) DEFAULT NULL,
  `stud_email` varchar(80) DEFAULT NULL,
  `stud_phone` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_ID`, `stud_password`, `stud_Fname`, `stud_lname`, `stud_department`, `stud_section`, `stud_email`, `stud_phone`) VALUES
('ADMA/0783/21', 'yab123', 'Yabkasa', 'Girma', 'Computer_science', '4DRCS', 'yabkasagirma@gmail.com', '09'),
('ADMA/0802/21', 'dave123', 'Dawit', 'Kitaw', 'Computer_science', '4DRCS', 'dawitkitaw@gmail.com', '09'),
('ADMA/0918/21', '4774', 'Biruk', 'Samuel', 'Computer_science', '4DRCS', 'biruksamuel@gmail.com', '0947740567'),
('ADMA/0987/21', 'sami123', 'Samuel', 'Demlew', 'Computer_science', '4DRCS', 'samueldemlew@gmail.com', '09'),
('ADMA/1021/21', 'abex123', 'Abebayehu', 'Woldie', 'Computer_science', '4DRCS', 'abebayehuwoldie@gmail.com', '09'),
('ADMA/1051/21', 'mus123', 'Musie', 'misgun', 'Computer_science', '4DRCS', 'musiemisgun@gmail.com', '09'),
('ADMA/1181/21', 'mh123', 'Mihiret', 'Mulugeta', 'Computer_science', '4DRCS', 'mihiretmulugeta@gmail.com', '09'),
('ADMA/2222/21', 'abresh123', 'abreham', 'tesema', 'Computer_science', '4DRCS', 'abrehamtesema@gmail.com', '09'),
('ADMA/3333/21', 'hena123', 'Henok', 'Kebede', 'Computer_science', '1DRCS', 'henokkebede@gmail.com', '09'),
('ADMA/4444/21', 'hale123', 'Haleluya', 'Gebremeskel', 'Computer_science', '1DRCS', 'haleluyagebremeskel@gmail.com', '09'),
('ADMA/5555/21', 'berna123', 'Brnabas', 'Tariku', 'Computer_science', '1DRCS', 'brnabastariku@gmail.com', '09'),
('ADMA/6666/21', 'miki123', 'Mikiyas', 'Melese', 'Computer_science', '1DRCS', 'mikiyasmelese@gmail.com', '09'),
('ADMA/7777/21', 'beki123', 'Bereket', 'Wendimu', 'Computer_science', '1DRCS', 'bereketwendimu@gmail.com', '09'),
('ADMA/8888/21', 'baya123', 'Behailu', 'Mitiku', 'Computer_science', '1DRCS', 'behailumitiku@gmail.com', '09'),
('ADMA/9999/21', 'abe123', 'Abebe', 'Kasa', 'Computer_science', '1DRCS', 'abebekasa@gmail.com', '09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
