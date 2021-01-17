-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 12:18 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nsu_clubs`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `UserId` int(6) NOT NULL,
  `UserEmail` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`UserId`, `UserEmail`) VALUES
(2, 'adnansadi52@gmail.com'),
(3, 'adnansadi51@gmail.com'),
(4, 'Shanto@gmail.com'),
(5, 'abu.sadi05@northsouth.edu'),
(6, 'ASadi@gmail.com'),
(7, 'Suad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `ClubId` int(3) NOT NULL,
  `Club_Name` varchar(80) NOT NULL,
  `Description` varchar(1024) DEFAULT NULL,
  `Club_fname` varchar(32) DEFAULT NULL,
  `Club_logo` varchar(32) DEFAULT NULL,
  `Club_DP` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`ClubId`, `Club_Name`, `Description`, `Club_fname`, `Club_logo`, `Club_DP`) VALUES
(1, 'ACM', 'The NSU ACM Chapter primarily serve the wide scope of ACM to advance computing as a science and profession by supporting and training NSU students.', 'Association for Computing Machin', 'nsu_acm_logo.png', '2018_acm_group_pic.jpg'),
(2, 'APC', 'NSUPC - The Art Force of NSU! As its motto says, is a major outlet of creativity for the students in NSU. Our goal is to develop quality photographers and to establish a network between established and amateur photographers.', 'Art & Photography Club', 'nsu_apc_logo.jpg', 'NSU_APC_Cover.jpg'),
(3, 'SS', 'North-south University Shangskritik Shangathan (NSUSS), started in 1992 along with two other clubs collectively as the Green Club. The organization then decided to separate its roots and in 1993, NSUSS was established as a distinct club whose main aim was to bring out the cultural aspects of Bangladesh and portray them in innovative ways. NSUSS initially structured two main events, Rabindro Joyonti and Nazrul Joyonti. In 1994, NSUSS successfully orchestrated the first Annual Cultural Evening (also known as ACE) of North South University which took place in the Osmany Auditorium.\r\nAs the University set foot to its new campus (Bashundhara), NSUSS made NAC 1046 and NAC 1047 (located on the 10th floor) their new home. With new beginnings, the NSUSS brought out new possibilities. In 2012 NSUSS started celebrating events such as Boshonto and Boishakh, on a massive scale where the members took the ingenuity to decorate the entire campus with handmade adornments (especially for these occasions). Alongside, NSUSS orga', 'Shangskritik Shangathan', 'nsu_ss_logo.jpg', NULL),
(4, 'CEC', 'North South University Computer and Engineering Club (NSU CEC) is the one and only Engineering club in ECE department of North South University, established in Fall 2015, affiliated from three of the most reputed clubs of NSU, which are NSU Computer Club (NSUCC), NSU Wireless Forum (NSU WF) and NSU Society of Science, Engineering and Technology (NSU SSET). NSUCEC has devoted itself towards one large goal, ‘Creating Tech Leaders of Tomorrow’, with all the active members of CC, WF, and SSET. The main objective of NSUCEC is to promote the ECE department of NSU to offer an extensive study of the IT and Telecom industries of Bangladesh through seminars, workshops, publications and study tours. It is also the mission of NSUCEC to create a relationship between industries and the academy.', 'Computer & Engineering Club', 'nsu_cec_logo.jpg', NULL),
(5, 'AC', 'Born in 1995, North South University Athletics Club or popularly known as NSUAC is the 1st and ONLY club as well as organization that Promotes, Organizes and Controls ALL THE SPORTING ACTIVITIES of North South University.', 'Athletics Club', 'nsu_nusac_logo.png', NULL),
(6, 'CDC', 'NSU Cine & Drama Club (NSUCDC) can be described as a club that aims to promote the appreciation of the art of cinema and theatre. The tag line of the club is \"Explore Yourself.\"', 'Cine and Drama Club', 'nsu_cdc_logo.jpg', NULL),
(7, 'SSC', 'Established in the spring of 1994, North South University Social Services Club (NSUSSC) is one of the oldest clubs of North South University and also the only club whose main objective is to offer assistance to the underprivileged and the unfortunate in the society.\r\n\r\nWith most of the people living below the poverty line, and the country facing an endless barrage of natural calamities, there is almost no end to the societal problems, which are mostly due to the lack of education, money and the lack of facilities and support provided by the government to the poor. Inadequate funds have left cancer and AIDS patients, acid victims, orphans, drug addicts with little or no hope; the situation is simply heartrending. Natural calamities such as floods and cyclones have left many on the breadline – this is the common scenario in Bangladesh. NSUSSC believes that it is a moral duty as citizens of Bangladesh, more importantly as human beings, to help out the people in need. NSUSSC tries its best to contribute and offer', 'Social Services Club', 'nsu_ssc_logo.jpg', NULL),
(8, 'IEEE', 'IEEE NSU Student Branch (INSB) is a technical subunit of IEEE societies which associates with valuable resources available from IEEE.\r\nINSB is basically here to fulfill the needs of members and the mission of IEEE.\r\nIt provides an opportunity for student members to begin networking in their areas of interest, and future profession as well as enjoy all the benefits and facilities of being an IEEE member.', 'Institute of Electrical and Elec', 'nsu_ieee_logo.jpg', NULL),
(9, 'DC', 'NSU Debate Club is one of the most popular and most successful clubs in North South University. Established in 1993, the first student activity club of NSU.', 'Debate Club', 'nsu_dc_logo.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `club_links`
--

CREATE TABLE `club_links` (
  `id` int(3) NOT NULL,
  `link` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Dept_Id` int(3) NOT NULL,
  `Dept_Name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Dept_Id`, `Dept_Name`) VALUES
(1, 'Accounting & Finance'),
(6, 'Architecture'),
(13, 'Biochemistry and Microbiology'),
(7, 'Civil and Environmental Engineering'),
(4, 'Economics'),
(5, 'Electrical and Computer Engineering'),
(9, 'English & Modern Languages'),
(16, 'Environmental Science and Management'),
(11, 'History & Philosophy'),
(12, 'Law'),
(3, 'Management'),
(2, 'Marketing & International Business'),
(8, 'Mathematics & Physics'),
(15, 'Pharmaceutical Sciences'),
(10, 'Political Science & Sociology'),
(14, 'Public Health');

-- --------------------------------------------------------

--
-- Table structure for table `eventphotos`
--

CREATE TABLE `eventphotos` (
  `PhotoId` int(10) NOT NULL,
  `EventID` int(6) NOT NULL,
  `Path` varchar(128) NOT NULL,
  `Uploaded_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `eventphotos`
--
DELIMITER $$
CREATE TRIGGER `After_Delete_Event_Photo` AFTER DELETE ON `eventphotos` FOR EACH ROW BEGIN
        INSERT INTO photos_archive(Serial,Photoid,Eventid,Path,Uploaded_on,Title,Deleted_On)
         VALUES(DEFAULT,OlD.PhotoID,OLD.EventID,OLD.Path,OLD.Uploaded_On,OLD.Title,DEFAULT);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Eventid` int(6) NOT NULL,
  `ClubId` int(3) DEFAULT NULL,
  `EventName` varchar(128) NOT NULL,
  `EventDescription` varchar(512) DEFAULT NULL,
  `Date` date NOT NULL,
  `eventDP` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `events`
--
DELIMITER $$
CREATE TRIGGER `After_Delete_Event` AFTER DELETE ON `events` FOR EACH ROW BEGIN
        DELETE FROM eventphotos
        WHERE Eventid = old.eventID;
        DELETE FROM eventvideos
        WHERE Eventid = old.eventID;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `eventvideos`
--

CREATE TABLE `eventvideos` (
  `VideoId` int(10) NOT NULL,
  `EventID` int(6) NOT NULL,
  `Path` varchar(128) NOT NULL,
  `Uploaded_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `eventvideos`
--
DELIMITER $$
CREATE TRIGGER `After_Delete_Event_Video` AFTER DELETE ON `eventvideos` FOR EACH ROW BEGIN
        INSERT INTO videos_archive(Serial,Videoid,Eventid,Path,Uploaded_on,Title,Deleted_On)
         VALUES(DEFAULT,OLD.VideoId,OLD.EventID,OLD.Path,OLD.Uploaded_On,OLD.Title,DEFAULT);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `executive_members`
--

CREATE TABLE `executive_members` (
  `m_id` int(6) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executive_members`
--

INSERT INTO `executive_members` (`m_id`, `Photo`) VALUES
(27, '659928512.jpg'),
(29, '520511068.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `followclubs`
--

CREATE TABLE `followclubs` (
  `Follower_id` int(6) NOT NULL,
  `UserId` int(6) DEFAULT NULL,
  `ClubId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followclubs`
--

INSERT INTO `followclubs` (`Follower_id`, `UserId`, `ClubId`) VALUES
(1, 6, 1),
(2, 6, 2),
(5, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `goingtoevents`
--

CREATE TABLE `goingtoevents` (
  `Man_id` int(6) NOT NULL,
  `UserId` int(6) DEFAULT NULL,
  `EventId` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE `google_users` (
  `G_uid` int(6) NOT NULL,
  `First_Name` varchar(30) DEFAULT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `google_users`
--

INSERT INTO `google_users` (`G_uid`, `First_Name`, `Last_Name`, `Email`, `Created_At`) VALUES
(1, 'Adnan', 'Sadi', 'adnansadi51@gmail.com', '2021-01-06 13:42:05'),
(2, 'Abu Adnan Sadi', '1912186042', 'abu.sadi05@northsouth.edu', '2021-01-11 11:16:59');

--
-- Triggers `google_users`
--
DELIMITER $$
CREATE TRIGGER `after_G_users_inserted` AFTER INSERT ON `google_users` FOR EACH ROW BEGIN
IF NOT EXISTs(SELECT 1 FROM all_users WHERE UserEmail = new.Email) THEN
   INSERT INTO all_users(UserEmail) VALUES (New.Email);
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `managesclub`
--

CREATE TABLE `managesclub` (
  `Man_id` int(6) NOT NULL,
  `UserId` int(6) DEFAULT NULL,
  `ClubId` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `m_id` int(6) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `NsuId` int(11) DEFAULT NULL,
  `ClubId` int(3) DEFAULT NULL,
  `Dept_Id` int(3) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `PhoneNum` varchar(15) DEFAULT NULL,
  `Position` varchar(30) DEFAULT NULL,
  `Date_Joined` date DEFAULT NULL,
  `Added_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `Name`, `NsuId`, `ClubId`, `Dept_Id`, `Email`, `PhoneNum`, `Position`, `Date_Joined`, `Added_On`) VALUES
(9, 'Smith', 1712349503, 1, 5, 'smith@yahoo.com', '0183293294', 'General Member', '2018-06-17', '2021-01-07 09:11:10'),
(10, 'Monica', 1675649504, 1, 5, 'monica@hotmail.com', '0195193294', 'Senior Member', '2017-01-18', '2021-01-07 09:11:10'),
(12, 'Max', 1932989587, 1, 5, 'Max@gmail.com', '01687193294', 'Probationary Member', '2020-01-28', '2021-01-07 09:11:10'),
(13, 'Chloe', 2012349503, 1, 3, 'Chloe@gmail.com', '0171193294', 'Senior Member', '2018-06-18', '2021-01-07 09:11:10'),
(14, 'Micheal', 1732630503, 1, 8, 'Micheal@yahoo.com', '0168888294', 'Probationary Member', '2017-11-11', '2021-01-07 09:11:10'),
(16, 'Rachel', 1912871833, 1, 5, 'green@yahoo.com', '0183777294', 'Senior Member', '2019-06-01', '2021-01-07 09:11:10'),
(17, 'Rick', 1932333503, 1, 8, 'rick@hotmail.com', '0193242197', 'General Member', '2019-10-17', '2021-01-07 09:11:10'),
(18, 'Kaley', 1732388703, 1, 5, 'Kaley@gmail.com', '0172093200', 'Probationary Member', '2018-01-21', '2021-01-07 09:11:10'),
(19, 'Yennefer', 1632499703, 1, 5, 'Yenn@gmail.com', '0162093200', 'Senior Member', '2018-06-11', '2021-01-07 09:11:10'),
(20, 'Sheldon Cooper', 1912186082, 1, 7, 'SCooper@gmail.com', '01928384742', 'Senior Member', '2019-07-25', '2021-01-07 11:16:22'),
(27, 'Adnan', 2141543, 1, 7, 'Sadi@gmail.com', '43245231', 'President', '2017-10-25', '2021-01-07 14:15:14'),
(29, 'shanto', 151353125, 1, 5, 'Shanto@gmail.com', '43245231', 'Vice President', '2017-10-25', '2021-01-09 12:59:30'),
(30, 'Willie Ford', 1813131710, 2, 2, 'Ford@yahoo.com', '01819247366', 'General Member', '2018-06-17', '2021-01-11 08:12:28'),
(31, 'Carla Gross', 1920431890, 2, 2, 'Carla @hotmail.com', '01919252714', 'Senior Member', '2017-01-18', '2021-01-11 08:12:28'),
(32, 'Shawna Zimmerman', 1815869278, 2, 1, 'Zimmerman@yahoo.com', '01711402772', 'General Member', '2018-09-08', '2021-01-11 08:12:28'),
(33, 'Rose Mcdonald', 1737486756, 2, 1, 'Mcdonald@gmail.com', '01715765210', 'Probationary Member', '2020-01-28', '2021-01-11 08:12:28'),
(34, 'Elisa Nunez', 1729450734, 2, 9, 'Nunez@gmail.com', '01716091800', 'Senior Member', '2018-06-18', '2021-01-11 08:12:28'),
(35, 'Tami Summers', 1610547112, 2, 10, 'Summers@yahoo.com', '01819221547', 'Probationary Member', '2017-11-11', '2021-01-11 08:12:28'),
(36, 'Camille James', 1923340990, 2, 1, 'James@hotmail.com', '01911568083', 'Senior Member', '2015-09-27', '2021-01-11 08:12:28'),
(37, 'Evelyn Crawford', 1934851278, 2, 1, 'Crawford@yahoo.com', '01911815618', 'Senior Member', '2019-06-01', '2021-01-11 08:12:28'),
(38, 'Ebony Reed', 1822947756, 2, 5, 'Ebony@hotmail.com', '01817031515', 'General Member', '2019-10-17', '2021-01-11 08:12:28'),
(39, 'Deborah Joseph', 1714241834, 2, 13, 'Deborah @gmail.com', '01611966414', 'Probationary Member', '2018-01-21', '2021-01-11 08:12:28'),
(40, 'Lindsey Campbell', 1816869012, 2, 1, 'Lindsey@gmail.com', '01819843847', 'Senior Member', '2018-06-11', '2021-01-11 08:12:28'),
(41, 'Calvin Lane', 1813131710, 3, 9, 'lane@yahoo.com', '01711901456', 'General Member', '2018-06-11', '2021-01-11 08:20:16'),
(42, 'Alonzo Wilkerson', 1920431890, 3, 9, 'Alonzo@hotmail.com', '01819146262', 'Senior Member', '2017-01-14', '2021-01-11 08:20:16'),
(43, 'Rene Ellis', 1815869278, 3, 5, 'Ellisn@yahoo.com', '01611484384', 'General Member', '2018-09-01', '2021-01-11 08:20:16'),
(44, 'Michele Carson', 1737486756, 3, 9, 'Carson@gmail.com', '01819251431', 'Probationary Member', '2020-01-20', '2021-01-11 08:20:16'),
(45, 'Becky Conner', 1729450734, 3, 9, 'Becky@gmail.com', '01711643745', 'Senior Member', '2018-06-18', '2021-01-11 08:20:16'),
(46, 'Donald Burns', 1610547112, 3, 10, 'Burns@yahoo.com', '01911004592', 'Probationary Member', '2017-11-19', '2021-01-11 08:20:16'),
(47, 'Camille James', 1923340990, 3, 1, 'James1@hotmail.com', '01819239065', 'Senior Member', '2015-09-17', '2021-01-11 08:20:16'),
(48, 'Justin Leonard', 1934851278, 3, 1, 'Leonard@yahoo.com', '01615436278', 'Senior Member', '2019-06-11', '2021-01-11 08:20:16'),
(49, 'Guadalupe Powell', 1822947756, 3, 5, 'Guadalupe@hotmail.com', '01917270447', 'General Member', '2019-10-07', '2021-01-11 08:20:16'),
(50, 'Hazel Cohen', 1714241834, 3, 9, 'Cohen@gmail.com', '01611949570', 'Probationary Member', '2018-01-21', '2021-01-11 08:20:16');

--
-- Triggers `members`
--
DELIMITER $$
CREATE TRIGGER `before_members_delete` BEFORE DELETE ON `members` FOR EACH ROW BEGIN
  INSERT INTO members_archive(Name,NsuId,ClubId,Dept_Id,Email,PhoneNum,Position,Date_Joined) VALUES
  (OLD.Name,OLD.NsuId,OLD.ClubId,OLD.Dept_Id,OLD.Email,OLD.PhoneNum,OLD.Position,OLD.Date_Joined);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `members_archive`
--

CREATE TABLE `members_archive` (
  `m_id` int(6) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `NsuId` int(11) DEFAULT NULL,
  `ClubId` int(3) DEFAULT NULL,
  `Dept_Id` int(3) DEFAULT NULL,
  `Email` varchar(64) DEFAULT NULL,
  `PhoneNum` varchar(15) DEFAULT NULL,
  `Position` varchar(30) DEFAULT NULL,
  `Date_Joined` date DEFAULT NULL,
  `Deleted_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_archive`
--

INSERT INTO `members_archive` (`m_id`, `Name`, `NsuId`, `ClubId`, `Dept_Id`, `Email`, `PhoneNum`, `Position`, `Date_Joined`, `Deleted_On`) VALUES
(1, 'John', 1512349789, 1, 2, 'John@hotmail.com', '0183290001', 'Senior Member', '2015-09-27', '2021-01-07 12:12:27'),
(7, 'Sheldon', 1812349765, 1, 7, 'Cooper@yahoo.com', '0173293001', 'General Member', '2018-09-08', '2021-01-08 12:33:47'),
(8, 'Jax', 1742940212, 1, 1, 'jax@gmail.com', '019492012', 'Vice President', '2017-10-25', '2021-01-09 09:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `photos_archive`
--

CREATE TABLE `photos_archive` (
  `PhotoId` int(10) NOT NULL,
  `EventID` int(6) NOT NULL,
  `Path` varchar(128) NOT NULL,
  `Uploaded_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Title` varchar(128) NOT NULL,
  `Deleted_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(6) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `First_Name` varchar(30) DEFAULT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Alt_Email` varchar(64) DEFAULT NULL,
  `Password` varchar(128) NOT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `UserName`, `First_Name`, `Last_Name`, `Email`, `Alt_Email`, `Password`, `Image`, `Created_At`) VALUES
(2, 'Adnan12', NULL, 'sadi', 'adnansadi52@gmail.com', NULL, '$2y$10$hXlvVvwy7oNfRkMd6eAqF.7WyB3SUSBOT75MmT7S1a.k0tpLHvvWy', NULL, '2021-01-06 13:29:53'),
(3, 'Shanto12', 'Saeem', 'Shanto', 'Shanto@gmail.com', NULL, '$2y$10$IB7Ysvl32cs4wKqtcoi0FOywxF/xgx7KUBaOsKNIt..04YcRb0Cvy', NULL, '2021-01-06 13:43:17'),
(4, 'AduBoi69', 'Adnan', 'Sadi', 'adnansadi51@gmail.com', NULL, '$2y$10$Jkp/Te2Q7MVYKCS88kNk9u4eWT7pe9q3Bm6a3r2dS2WSc.zInqtO2', NULL, '2021-01-06 14:28:50'),
(6, 'Adnan21', 'Adnan', 'Sadi', 'ASadi@gmail.com', 'Adnan69@gmail.com', '$2y$10$40zrfBQ.5WaCKLYEBzSXiuRBAogr3IPfIry06EVWZkiM2DoocdBFy', '747677418.jpg', '2021-01-12 08:48:02'),
(7, 'Suad123', 'Salman', 'Suad', 'Suad@gmail.com', NULL, '$2y$10$pPYPQfxrH1zfhHNWx/XGmePSaW0U96.1QRsy3Nd53KmLIHns5PXpS', '807525433.jpg', '2021-01-14 06:11:09');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_users_inserted` AFTER INSERT ON `users` FOR EACH ROW BEGIN
IF NOT EXISTs(SELECT 1 FROM all_users WHERE UserEmail = new.Email) THEN
   INSERT INTO all_users(UserEmail) VALUES (New.Email);
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `videos_archive`
--

CREATE TABLE `videos_archive` (
  `VideoId` int(10) NOT NULL,
  `EventID` varchar(16) NOT NULL,
  `Path` varchar(128) NOT NULL,
  `Uploaded_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Title` varchar(128) NOT NULL,
  `Deleted_On` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`ClubId`);

--
-- Indexes for table `club_links`
--
ALTER TABLE `club_links`
  ADD KEY `id` (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Dept_Id`),
  ADD UNIQUE KEY `Dept_Name` (`Dept_Name`);

--
-- Indexes for table `eventphotos`
--
ALTER TABLE `eventphotos`
  ADD PRIMARY KEY (`PhotoId`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Eventid`),
  ADD KEY `ClubId` (`ClubId`);

--
-- Indexes for table `eventvideos`
--
ALTER TABLE `eventvideos`
  ADD PRIMARY KEY (`VideoId`),
  ADD KEY `EventID` (`EventID`);

--
-- Indexes for table `executive_members`
--
ALTER TABLE `executive_members`
  ADD KEY `m_id` (`m_id`);

--
-- Indexes for table `followclubs`
--
ALTER TABLE `followclubs`
  ADD PRIMARY KEY (`Follower_id`),
  ADD UNIQUE KEY `Unic_Follower` (`UserId`,`ClubId`),
  ADD KEY `ClubId` (`ClubId`);

--
-- Indexes for table `goingtoevents`
--
ALTER TABLE `goingtoevents`
  ADD PRIMARY KEY (`Man_id`),
  ADD UNIQUE KEY `Unic_Man` (`UserId`,`EventId`),
  ADD KEY `EventId` (`EventId`);

--
-- Indexes for table `google_users`
--
ALTER TABLE `google_users`
  ADD PRIMARY KEY (`G_uid`);

--
-- Indexes for table `managesclub`
--
ALTER TABLE `managesclub`
  ADD PRIMARY KEY (`Man_id`),
  ADD UNIQUE KEY `Unic_Man` (`UserId`,`ClubId`),
  ADD KEY `ClubId` (`ClubId`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `UC_Member` (`NsuId`,`ClubId`),
  ADD KEY `ClubId` (`ClubId`),
  ADD KEY `Dept_Id` (`Dept_Id`);

--
-- Indexes for table `members_archive`
--
ALTER TABLE `members_archive`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `UC_Member` (`NsuId`,`ClubId`),
  ADD KEY `ClubId` (`ClubId`),
  ADD KEY `Dept_Id` (`Dept_Id`);

--
-- Indexes for table `photos_archive`
--
ALTER TABLE `photos_archive`
  ADD UNIQUE KEY `Unic_Photo` (`PhotoId`,`EventID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `videos_archive`
--
ALTER TABLE `videos_archive`
  ADD UNIQUE KEY `Unic_Photo` (`VideoId`,`EventID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `UserId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `ClubId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Dept_Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `eventphotos`
--
ALTER TABLE `eventphotos`
  MODIFY `PhotoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Eventid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `eventvideos`
--
ALTER TABLE `eventvideos`
  MODIFY `VideoId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `followclubs`
--
ALTER TABLE `followclubs`
  MODIFY `Follower_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `goingtoevents`
--
ALTER TABLE `goingtoevents`
  MODIFY `Man_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `google_users`
--
ALTER TABLE `google_users`
  MODIFY `G_uid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managesclub`
--
ALTER TABLE `managesclub`
  MODIFY `Man_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `m_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `members_archive`
--
ALTER TABLE `members_archive`
  MODIFY `m_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `club_links`
--
ALTER TABLE `club_links`
  ADD CONSTRAINT `club_links_ibfk_1` FOREIGN KEY (`id`) REFERENCES `clubs` (`ClubId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventphotos`
--
ALTER TABLE `eventphotos`
  ADD CONSTRAINT `eventphotos_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `events` (`Eventid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`ClubId`) REFERENCES `clubs` (`ClubId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventvideos`
--
ALTER TABLE `eventvideos`
  ADD CONSTRAINT `eventvideos_ibfk_1` FOREIGN KEY (`EventID`) REFERENCES `events` (`Eventid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `executive_members`
--
ALTER TABLE `executive_members`
  ADD CONSTRAINT `executive_members_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `members` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `followclubs`
--
ALTER TABLE `followclubs`
  ADD CONSTRAINT `followclubs_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `all_users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followclubs_ibfk_2` FOREIGN KEY (`ClubId`) REFERENCES `clubs` (`ClubId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `goingtoevents`
--
ALTER TABLE `goingtoevents`
  ADD CONSTRAINT `goingtoevents_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `all_users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goingtoevents_ibfk_2` FOREIGN KEY (`EventId`) REFERENCES `events` (`Eventid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managesclub`
--
ALTER TABLE `managesclub`
  ADD CONSTRAINT `managesclub_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `all_users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `managesclub_ibfk_2` FOREIGN KEY (`ClubId`) REFERENCES `clubs` (`ClubId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`ClubId`) REFERENCES `clubs` (`ClubId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`Dept_Id`) REFERENCES `departments` (`Dept_Id`);

--
-- Constraints for table `members_archive`
--
ALTER TABLE `members_archive`
  ADD CONSTRAINT `members_archive_ibfk_1` FOREIGN KEY (`ClubId`) REFERENCES `clubs` (`ClubId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `members_archive_ibfk_2` FOREIGN KEY (`Dept_Id`) REFERENCES `departments` (`Dept_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
