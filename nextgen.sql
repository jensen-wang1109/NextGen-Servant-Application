-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 09:42 AM
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
-- Database: `nextgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `tanggal_mulai_event` date NOT NULL,
  `tanggal_selesai_event` date NOT NULL,
  `tema_event` varchar(255) NOT NULL,
  `preview_event` text NOT NULL,
  `ref_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `tanggal_mulai_event`, `tanggal_selesai_event`, `tema_event`, `preview_event`, `ref_user_id`) VALUES
(1, '2022-10-02', '2022-10-02', 'Kompetisi Public Speaking', 'Indonesian tourism competition, also known as Kompetisi Pariwisata Indonesia (KPI) is the largest national level of tourism competition in Indonesia hosted by Politeknik Negeri Bandung in collaboration with Telkom University, Universitas Pendidikan Indonesia, and STIEPAR YAPARI Bandung.\r\nThe competition aims to provide a platform for university students to showcase their skills and abilities in tourism.\r\nIn 2020 KPI will be held for the 11th time with a theme of “Techno-Creative Tourism”.  The slogan of KPI 11 is “???????????????????????????????? ???????? ????????????????????????????????????????, ???????????????????????????????? ???????????????? ????????????????????????????????????????”.\r\n????????????\r\n1. Guiding Contest (Advance & Beginner)\r\n2. Business Event Proposal (Exhibition & Festival)\r\n3. Tour Package (Domestic & International)\r\n4. Sabre\r\n5. Tourism Quiz Competition\r\n6. Paper Contest\r\n7. Travel Writing\r\n8. Tourism Speech Contest\r\n9. Tourism Debate Contest\r\n10. Fruit Carving\r\n11. Flower Arrangement\r\n12. Tray On the Road\r\n13. Table set up\r\n14. Appetizer Challenge\r\n15. Plating Dessert\r\n16. Battle Cooking\r\n17. Making Pie\r\n18. Making Bed\r\n19. Front Office Knowledge\r\nGENERAL COMPETITION:\r\n1. Traditional Dance\r\n2. Video Blog (Vlog)\r\n3. Tourism Advertising Video\r\n4. E-Poster\r\n5. Photography\r\n6. Augmented Reality (Instagram Filter Competition)\r\n7. Travel Selfie Contest\r\nAre you guys ready for it?!\r\nFor more information: ????????????\r\nDon’t forget to check our official account????\r\nInstagram : @kpi11_\r\nTwitter : @kpi_sebelas\r\nLine : @zkc1719k\r\nYouTube : Kompetisi Pariwisata Indonesia 11\r\nThank you! let’s prepare and do the best!\r\n© KOMPETISI PARIWISATA INDONESIA 11\r\n#kpi11 #techno #creative #tourism\r\n#technocreativetourism #kompetisipariwisataindonesia\r\n#kompetisipariwisataindonesia11 #indonesiantourismcompetition #eventnasional #kompetisinasional #wonderfulindonesia #pesonaindonesia\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ibadah`
--

CREATE TABLE `ibadah` (
  `ibadah_id` int(11) NOT NULL,
  `tanggal_ibadah` date NOT NULL,
  `shift` int(11) NOT NULL,
  `ref_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ibadah`
--

INSERT INTO `ibadah` (`ibadah_id`, `tanggal_ibadah`, `shift`, `ref_user_id`) VALUES
(1, '2022-10-02', 1, 1),
(2, '2022-10-02', 2, 1),
(3, '2022-10-09', 1, 1),
(4, '2022-10-09', 2, 1),
(5, '2022-10-16', 1, 1),
(6, '2022-10-16', 2, 1),
(7, '2022-10-23', 1, 1),
(8, '2022-10-23', 2, 1),
(9, '2022-10-30', 1, 1),
(10, '2022-10-30', 2, 1),
(11, '2022-11-06', 1, 1),
(12, '2022-11-06', 2, 1),
(13, '2022-11-13', 1, 1),
(14, '2022-11-13', 2, 1),
(15, '2022-11-20', 1, 1),
(16, '2022-11-20', 2, 1),
(17, '2022-11-27', 1, 1),
(18, '2022-11-27', 2, 1),
(19, '2022-12-04', 1, 1),
(20, '2022-12-04', 2, 1),
(21, '2022-12-11', 1, 1),
(22, '2022-12-11', 2, 1),
(23, '2022-12-18', 1, 1),
(24, '2022-12-18', 2, 1),
(25, '2022-12-25', 1, 1),
(26, '2023-01-01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `nama_jabatan`) VALUES
(1, 'MENTOR'),
(2, 'PELAYAN'),
(3, 'JEMAAT');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_jemaat`
--

CREATE TABLE `jabatan_jemaat` (
  `jabatan_jemaat_id` int(11) NOT NULL,
  `jemaat_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan_jemaat`
--

INSERT INTO `jabatan_jemaat` (`jabatan_jemaat_id`, `jemaat_id`, `jabatan_id`, `start_date`, `end_date`) VALUES
(1, 1, 3, '2018-05-12', '2018-12-31'),
(2, 1, 2, '2019-01-01', '2020-09-01'),
(3, 1, 1, '2020-10-01', NULL),
(4, 2, 3, '2019-11-19', '2022-12-31'),
(5, 2, 2, '2022-01-01', '2022-03-31'),
(6, 2, 1, '2022-04-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jemaat`
--

CREATE TABLE `jemaat` (
  `jemaat_id` int(11) NOT NULL,
  `fullname_jemaat` varchar(255) NOT NULL,
  `phone_number_jemaat` varchar(20) NOT NULL,
  `address_jemaat` text NOT NULL,
  `gender_jemaat` varchar(20) NOT NULL,
  `dob_jemaat` date NOT NULL,
  `job_jemaat` varchar(255) DEFAULT NULL,
  `studies_jemaat` varchar(255) DEFAULT NULL,
  `status_jemaat` varchar(255) DEFAULT NULL,
  `ref_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jemaat`
--

INSERT INTO `jemaat` (`jemaat_id`, `fullname_jemaat`, `phone_number_jemaat`, `address_jemaat`, `gender_jemaat`, `dob_jemaat`, `job_jemaat`, `studies_jemaat`, `status_jemaat`, `ref_user_id`) VALUES
(1, 'Jensen Wang', '081807163327', 'Jl. Gedong Panjang II No. 14G', 'Laki-laki', '2001-09-11', 'Fullstack Developer at PT. Adicipta Inovasi Teknologi', 'Universitas Tarumanagara, Jurusan Sistem Informasi', 'Aktif', 1),
(2, 'Johnsen', '085967161716', 'Jl. Kapuk Kebon Jahe No 69B', 'Laki-laki', '2000-05-26', 'Auditor at PwC', 'STIE Trisakti, Jurusan Akuntansi', 'Aktif', 1),
(3, 'Karen Laurencia', '0881025790951', 'Jl. Sama Rasa 1 No. 29a', 'Perempuan', '1999-11-14', NULL, 'Binus, Jurusan Manajemen', 'Aktif', 1),
(4, 'Maxmillion Budiman', '0816733701', '-', 'Laki-laki', '2001-07-12', NULL, 'Universitas Atma Jaya, Jurusan Kedokteran', 'Aktif', 1),
(5, 'Ari Suciadi', '081212086261', 'Jl. Gedong Panjang I', 'Laki-laki', '2001-12-02', 'Content Creator Manager at BARDI', 'SMAN 17 Jakarta, Jurusan MIPA', 'Aktif', 1),
(6, 'Joevian Geraldo', '089526170404', '-', 'Laki-laki', '2000-10-05', NULL, 'Universitas Esa Unggul', 'Aktif', 1),
(7, 'Axel Revinson', '085156684384', '-', 'Laki-laki', '2001-11-10', 'Staff Acounting at PT. Nulah Pharmaceutical Indonesia', 'Universitas Kwik Kian Gie, Jurusan Akuntansi', 'Aktif', 1),
(8, 'Ervina', '081511191463', 'Jl. Jelambar Baru III No. 46', 'Perempuan', '2000-04-13', 'Programmer at PT. Penguin Indonesia', 'Binus, Jurusan Teknik Informatika', 'Aktif', 1),
(9, 'Irene Vanessa', '089519821219', '-', 'Perempuan', '2001-07-12', NULL, 'Universitas Atma Jaya, Jurusan Kedokteran', 'Aktif', 1),
(10, 'Jessica Virginia', '08176659888', '-', 'Perempuan', '2000-08-28', NULL, NULL, 'Aktif', 1),
(11, 'Jennifer Patricia', '082110102859', '-', 'Perempuan', '2002-04-13', NULL, NULL, 'Aktif', 1),
(12, 'Billy Prakarsa', '081296670541', '-', 'Laki-laki', '2000-04-18', NULL, NULL, 'Aktif', 1),
(13, 'Lisah', '083190590320', '-', 'Perempuan', '1999-12-03', NULL, NULL, 'Aktif', 1),
(14, 'Michelle Lim', '083151442608', '-', 'Perempuan', '2000-11-14', 'Wealth Specialist', 'Universitas Indonesia, Jurusan Ilmu Komunikasi', 'Aktif', 1),
(15, 'Nichollas Farellino', '085959308012', '-', 'Laki-laki', '2001-10-05', NULL, 'Universitas Padjadjaran', 'Aktif', 1),
(16, 'Andino', '081315497023', '-', 'Laki-laki', '1995-06-12', NULL, NULL, 'Aktif', 1),
(17, 'Risky Kurniawan', '081213693717', '-', 'Laki-laki', '1995-05-04', NULL, NULL, 'Aktif', 1),
(18, 'Alisha Sabrina', '081317775887', '-', 'Perempuan', '2001-04-03', NULL, NULL, 'Aktif', 1),
(19, 'Laurencia Adeline', '000', '-', 'Perempuan', '2004-02-05', NULL, NULL, 'Aktif', 1),
(20, 'Hansen Steven', '085157833986', '-', 'Laki-laki', '1995-04-03', NULL, NULL, 'Aktif', 1),
(21, 'Michael', '081318236547', '-', 'Laki-laki', '1992-09-05', NULL, NULL, 'Aktif', 1),
(22, 'Hertanto Purnama', '000', '-', 'Laki-laki', '1976-12-25', NULL, NULL, 'Aktif', 1),
(23, 'Matius', '000', '-', 'Laki-laki', '1996-03-10', NULL, NULL, 'Aktif', 1),
(24, 'Jason Lim', '000', '-', 'Laki-laki', '2002-10-18', NULL, NULL, 'Aktif', 1),
(25, 'Wijaya Kusuma', '085772704811', '-', 'Laki-laki', '2008-04-18', NULL, NULL, 'Aktif', 1),
(26, 'Johannes Irawan', '089603765696', '-', 'Laki-laki', '2003-01-23', NULL, 'UKRIDA', 'Aktif', 1),
(27, 'Felix Rafael', '000', '-', 'Laki-laki', '2003-04-27', NULL, NULL, 'Aktif', 1),
(28, 'Vincent Lee', '081283736262', '-', 'Laki-laki', '1998-04-24', NULL, 'Binus, Jurusan Perhotelan', 'Aktif', 1),
(29, 'Kevin Wandy', '087879175450', '-', 'Laki-laki', '1995-12-13', 'Guru Drum Private', 'STT Bethel', 'Aktif', 1),
(30, 'Kenny Kristanto', '089529947653', '-', 'Laki-laki', '1998-10-28', NULL, NULL, 'Aktif', 1),
(31, 'Alvandy Tando', '083877912845', '-', 'Laki-laki', '1995-06-30', NULL, 'UBM, Jurusal Ilmu Komunikasi', 'Aktif', 1),
(32, 'Dandy', '087781433687', '-', 'Laki-laki', '1999-03-22', NULL, NULL, 'Aktif', 1),
(33, 'Yehezkiel Xaverius', '081282797602', '-', 'Laki-laki', '1999-12-19', NULL, NULL, 'Aktif', 1),
(34, 'Jessica Irawan', '085839977730', '-', 'Perempuan', '1999-08-22', NULL, NULL, 'Aktif', 1),
(35, 'Queen', '000', '-', 'Perempuan', '2007-09-17', NULL, NULL, 'Aktif', 1),
(36, 'Evelyn', '000', '-', 'Perempuan', '2007-05-23', NULL, NULL, 'Aktif', 1),
(37, 'Audrey Nikki', '000', '-', 'Perempuan', '2007-05-06', NULL, NULL, 'Aktif', 1),
(38, 'Felicya Dayani', '000', '-', 'Perempuan', '2007-02-22', NULL, NULL, 'Aktif', 1),
(39, 'Jeslyn Ananda', '000', '-', 'Perempuan', '2008-12-16', NULL, NULL, 'Aktif', 1),
(40, 'Michelle Clarissa', '000', '-', 'Perempuan', '2004-10-29', NULL, NULL, 'Aktif', 1),
(41, 'Silvia Emor', '087759831759', '-', 'Perempuan', '2000-03-24', NULL, NULL, 'Aktif', 1),
(42, 'Agnes Rifa', '087880260556', '-', 'Perempuan', '1998-02-28', NULL, NULL, 'Aktif', 1),
(43, 'Ria Lestari', '000', '-', 'Perempuan', '1999-09-02', NULL, NULL, 'Aktif', 1),
(44, 'Matthew', '000', '-', 'Laki-laki', '2004-04-24', NULL, NULL, 'Aktif', 1),
(45, 'Yolanda Maren', '000', '-', 'Perempuan', '2003-03-31', NULL, NULL, 'Aktif', 1),
(46, 'Lawrend Kimbella', '000', '-', 'Perempuan', '2004-10-13', NULL, NULL, 'Aktif', 1),
(47, 'Larissa Rahel ', '088212328103', '-', 'Perempuan', '2005-06-22', NULL, 'SMAN 19 Jakarta, Jurusan IPS', 'Aktif', 1),
(48, 'Eko Wijaya', '081297090610', '-', 'Laki-laki', '1999-03-25', NULL, NULL, 'Aktif', 1),
(49, 'Alvin Leonard', '089653306023', '-', 'Laki-laki', '2000-08-18', NULL, 'BINUS, Jurusan Business Creation', 'Aktif', 1),
(50, 'Louis Danny', '000', '-', 'Laki-laki', '2000-02-24', NULL, NULL, 'Aktif', 1),
(51, 'Novalundi ', '000', '-', 'Laki-laki', '1998-11-09', NULL, NULL, 'Aktif', 1),
(52, 'Laurencia Caroline', '000', '-', 'Perempuan', '2010-01-14', NULL, NULL, 'Aktif', 1),
(53, 'Donata Gabriela', '000', '-', 'Perempuan', '2008-05-27', NULL, NULL, 'Aktif', 1),
(54, 'Ferren Intannia', '085892474967', '-', 'Perempuan', '2002-01-17', NULL, NULL, 'Aktif', 1),
(55, 'Kezia Hakim', '087883851430', '-', 'Perempuan', '2000-06-20', NULL, NULL, 'Aktif', 1),
(56, 'Lauretta Inneza', '000', '-', 'Perempuan', '2006-02-14', NULL, NULL, 'Aktif', 1),
(57, 'Joanna Maren', '000', '-', 'Perempuan', '2005-11-02', NULL, 'SMAN 19 Jakarta, Jurusan MIPA', 'Aktif', 1),
(58, 'Cicilia Halim', '000', '-', 'Perempuan', '2002-06-15', NULL, NULL, 'Aktif', 1),
(59, 'Fei Fei', '000', '-', 'Perempuan', '2003-10-30', NULL, NULL, 'Keluar Kota/Negeri', 1),
(60, 'Fanny Felicia', '000', '-', 'Perempuan', '2000-11-03', NULL, NULL, 'Aktif', 1),
(61, 'Angel Emeralda', '000', '-', 'Perempuan', '1995-08-17', NULL, NULL, 'Aktif', 1),
(62, 'Ashley Tara', '000', '-', 'Perempuan', '2005-11-16', NULL, NULL, 'Aktif', 1),
(63, 'Stephanie Immanuel', '000', '-', 'Perempuan', '2008-11-16', NULL, NULL, 'Aktif', 1),
(64, 'Gracia Natashya', '000', '-', 'Perempuan', '2006-08-17', NULL, NULL, 'Aktif', 1),
(65, 'Nadilla Sekar', '000', '-', 'Perempuan', '2000-08-22', NULL, NULL, 'Aktif', 1),
(66, 'Priscilia Gisela', '000', '-', 'Perempuan', '2003-09-11', NULL, NULL, 'Aktif', 1),
(67, 'Gilbert Wandy', '085882748737', '-', 'Laki-laki', '2007-01-16', NULL, NULL, 'Aktif', 1),
(68, 'Cindy Stefany', '000', '-', 'Perempuan', '2003-09-02', NULL, NULL, 'Aktif', 1),
(69, 'Petronela Dakdakur', '000', '-', 'Perempuan', '2001-06-09', NULL, NULL, 'Aktif', 1),
(70, 'Jovanka Felicia', '000', '-', 'Perempuan', '2008-08-01', NULL, NULL, 'Aktif', 1),
(71, 'Shannon Florencia', '000', '-', 'Perempuan', '2008-04-14', NULL, NULL, 'Aktif', 1),
(72, 'Marc Vano', '081210029107', '-', 'Laki-laki', '2001-11-27', NULL, NULL, 'Aktif', 1),
(73, 'Aldy Mancini', '081388328814', '-', 'Laki-laki', '1995-05-05', NULL, NULL, 'Aktif', 1),
(74, 'Dhestania', '085782437071', '-', 'Perempuan', '2001-10-21', NULL, 'Universitas Sahid, Jurusan Perhotelan', 'Aktif', 1),
(75, 'Christin Hanny', '089622625550', '-', 'Perempuan', '1994-09-19', NULL, NULL, 'Aktif', 1),
(76, 'Gracelia', '081282287115', '-', 'Perempuan', '1996-06-01', NULL, 'Universitas Tarumanagara, Jurusan Desain Interior', 'Aktif', 1),
(77, 'Jessica Evania', '087780750773', '-', 'Perempuan', '1995-03-17', NULL, NULL, 'Aktif', 1),
(78, 'Jennifer Nadia', '087812100458', '-', 'Perempuan', '1998-05-18', NULL, NULL, 'Aktif', 1),
(79, 'Margaret Rifa', '087787040453', '-', 'Perempuan', '1994-12-06', NULL, NULL, 'Aktif', 1),
(80, 'Abigail Jeanette', '0811131033', '-', 'Perempuan', '1997-10-13', NULL, 'Binus', 'Aktif', 1),
(81, 'Keren Kristanto', '082113506598', '-', 'Perempuan', '2000-10-08', NULL, 'LSPR', 'Aktif', 1),
(82, 'Praditha Dwi Setyo', '081299906909', '-', 'Perempuan', '1997-07-20', NULL, NULL, 'Aktif', 1),
(83, 'Michelle Aretha', '000', '-', 'Perempuan', '1998-01-02', NULL, NULL, 'Tidak ada kejelasan', 1),
(84, 'Jason Bunyamin', '000', '-', 'Laki-laki', '2004-04-29', NULL, NULL, 'Aktif', 1),
(85, 'Ferry Daniel', '000', '-', 'Laki-laki', '2003-02-11', NULL, NULL, 'Aktif', 1),
(86, 'Richie Fernaldy', '081211135597', '-', 'Laki-laki', '2004-04-06', NULL, NULL, 'Aktif', 1),
(87, 'Ryozky Frederich', '081289680319', '-', 'Laki-laki', '2003-08-12', NULL, NULL, 'Aktif', 1),
(88, 'Willy Wandy', '000', '-', 'Laki-laki', '2000-09-02', NULL, NULL, 'Aktif', 1),
(89, 'Hendry Shekoski', '000', '-', 'Laki-laki', '2000-06-12', NULL, NULL, 'Aktif', 1),
(90, 'Hannie', '000', '-', 'Perempuan', '2004-11-17', NULL, NULL, 'Aktif', 1),
(91, 'Junaedi', '082123572528', '-', 'Laki-laki', '1992-05-25', '-', 'Sistem Informasi di BINUS', 'Aktif', 1),
(92, 'Revani', '000', '-', 'Perempuan', '2005-04-26', NULL, NULL, 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pemusik`
--

CREATE TABLE `jenis_pemusik` (
  `jenis_pemusik_id` int(11) NOT NULL,
  `nama_jenis_pemusik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pemusik`
--

INSERT INTO `jenis_pemusik` (`jenis_pemusik_id`, `nama_jenis_pemusik`) VALUES
(1, 'Worship Leader'),
(2, 'Keyboard'),
(3, 'Gitar Elektrik'),
(4, 'Gitar Akustik'),
(5, 'Bass'),
(6, 'Drum'),
(7, 'Kajon'),
(8, 'Saxophone'),
(9, 'Suling');

-- --------------------------------------------------------

--
-- Table structure for table `musik_ibadah`
--

CREATE TABLE `musik_ibadah` (
  `musik_ibadah_id` int(11) NOT NULL,
  `ibadah_id` int(11) NOT NULL,
  `pemusik_id` int(11) NOT NULL,
  `jenis_pemusik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `musik_ibadah`
--

INSERT INTO `musik_ibadah` (`musik_ibadah_id`, `ibadah_id`, `pemusik_id`, `jenis_pemusik_id`) VALUES
(1, 1, 1, 3),
(2, 1, 2, 2),
(3, 1, 3, 5),
(4, 1, 4, 6),
(5, 1, 5, 1),
(6, 1, 6, 1),
(7, 1, 7, 1),
(8, 2, 8, 1),
(9, 2, 9, 1),
(10, 2, 10, 1),
(11, 2, 11, 3),
(12, 2, 12, 2),
(13, 2, 13, 6),
(14, 2, 14, 5),
(15, 3, 15, 1),
(16, 3, 16, 1),
(17, 3, 17, 1),
(18, 3, 18, 6),
(19, 3, 19, 3),
(20, 3, 20, 2),
(21, 3, 21, 5),
(22, 4, 22, 1),
(23, 4, 23, 1),
(24, 4, 24, 1),
(25, 4, 25, 6),
(26, 4, 26, 3),
(27, 4, 27, 2),
(28, 4, 28, 5),
(29, 5, 29, 1),
(30, 6, 30, 1),
(31, 5, 31, 1),
(32, 5, 32, 1),
(33, 6, 33, 1),
(34, 6, 34, 1),
(35, 5, 35, 6),
(36, 5, 36, 3),
(37, 5, 37, 2),
(38, 5, 38, 5),
(39, 6, 39, 6),
(40, 6, 40, 3),
(41, 6, 41, 2),
(42, 6, 42, 5),
(43, 7, 43, 1),
(44, 7, 44, 1),
(45, 7, 45, 1),
(46, 7, 46, 6),
(47, 7, 47, 3),
(48, 7, 48, 2),
(49, 7, 49, 5),
(50, 8, 50, 1),
(51, 8, 51, 1),
(52, 8, 52, 1),
(53, 8, 53, 6),
(54, 8, 54, 3),
(55, 8, 55, 2),
(56, 8, 56, 5),
(57, 9, 57, 1),
(58, 9, 58, 1),
(59, 9, 59, 1),
(60, 9, 60, 6),
(61, 9, 61, 3),
(62, 9, 62, 2),
(63, 9, 63, 5),
(64, 10, 64, 1),
(65, 10, 65, 1),
(66, 10, 66, 1),
(67, 10, 67, 6),
(68, 10, 68, 3),
(69, 10, 69, 2),
(70, 10, 70, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pemusik`
--

CREATE TABLE `pemusik` (
  `pemusik_id` int(11) NOT NULL,
  `jemaat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemusik`
--

INSERT INTO `pemusik` (`pemusik_id`, `jemaat_id`) VALUES
(16, 3),
(23, 3),
(6, 5),
(9, 5),
(5, 6),
(8, 6),
(31, 6),
(33, 6),
(45, 9),
(52, 9),
(4, 15),
(13, 15),
(2, 26),
(12, 26),
(20, 26),
(27, 26),
(60, 29),
(37, 32),
(41, 32),
(48, 32),
(55, 32),
(62, 32),
(69, 32),
(15, 33),
(22, 33),
(57, 33),
(64, 33),
(1, 49),
(11, 49),
(47, 49),
(54, 49),
(61, 49),
(68, 49),
(43, 50),
(50, 50),
(32, 52),
(34, 52),
(17, 56),
(24, 56),
(7, 57),
(10, 57),
(59, 64),
(66, 64),
(18, 67),
(25, 67),
(35, 67),
(39, 67),
(46, 67),
(53, 67),
(67, 67),
(44, 76),
(51, 76),
(29, 80),
(30, 80),
(58, 80),
(65, 80),
(3, 88),
(14, 88),
(21, 88),
(28, 88),
(38, 88),
(42, 88),
(49, 88),
(56, 88),
(63, 88),
(70, 88),
(19, 89),
(26, 89),
(36, 89),
(40, 89);

-- --------------------------------------------------------

--
-- Table structure for table `pengkhotbah`
--

CREATE TABLE `pengkhotbah` (
  `pengkhotbah_id` int(11) NOT NULL,
  `ibadah_id` int(11) NOT NULL,
  `jemaat_id` int(11) DEFAULT NULL,
  `pengkhotbah_luar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengkhotbah`
--

INSERT INTO `pengkhotbah` (`pengkhotbah_id`, `ibadah_id`, `jemaat_id`, `pengkhotbah_luar_id`) VALUES
(1, 1, 14, NULL),
(2, 2, 32, NULL),
(3, 3, 55, NULL),
(4, 4, 12, NULL),
(5, 5, 30, NULL),
(6, 6, 33, NULL),
(7, 7, 81, NULL),
(8, 8, 6, NULL),
(9, 9, 87, NULL),
(10, 10, 77, NULL),
(11, 13, 2, NULL),
(12, 14, 80, NULL),
(13, 15, 28, NULL),
(14, 16, NULL, 1),
(15, 17, 13, NULL),
(16, 18, 74, NULL),
(17, 19, NULL, 2),
(18, 20, NULL, 2),
(19, 23, 3, NULL),
(20, 24, 31, NULL),
(21, 25, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengkhotbah_luar`
--

CREATE TABLE `pengkhotbah_luar` (
  `pengkhotbah_luar_id` int(11) NOT NULL,
  `nama_pengkhotbah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengkhotbah_luar`
--

INSERT INTO `pengkhotbah_luar` (`pengkhotbah_luar_id`, `nama_pengkhotbah`) VALUES
(1, 'Dieter Nicholas'),
(2, 'Daniel Sidarta'),
(3, 'Ika dina pujiningtyas');

-- --------------------------------------------------------

--
-- Table structure for table `ref_user`
--

CREATE TABLE `ref_user` (
  `ref_user_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `role` varchar(55) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `status` text NOT NULL,
  `code` mediumint(9) NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_user`
--

INSERT INTO `ref_user` (`ref_user_id`, `fullname`, `email`, `username`, `password`, `phone_number`, `role`, `gender`, `status`, `code`, `photo`) VALUES
(1, 'Admin', 'teachings.nextgenhop@gmail.com', 'admin', '$2y$10$s6iEGywT3IaVv5EQw5294e5XpouHWk9SmFUr4FHuSoy42zdqtv4SO', '08123456798', 'Super User', 'Pria', 'verified', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `renungan`
--

CREATE TABLE `renungan` (
  `renungan_id` int(11) NOT NULL,
  `tanggal_renungan` date NOT NULL,
  `tema_renungan` varchar(255) NOT NULL,
  `preview_renungan` text NOT NULL,
  `ref_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renungan`
--

INSERT INTO `renungan` (`renungan_id`, `tanggal_renungan`, `tema_renungan`, `preview_renungan`, `ref_user_id`) VALUES
(1, '2022-12-01', 'Apakah saya dipanggil menjadi Hamba Tuhan?', 'Apakah benar saya dipanggil menjadi \"vocational (profesi) Hamba Tuhan” (untuk selanjutnya disingkat HT)? Bagaimana mendapat kepastian dalam hal ini? Ada beberapa prinsip yang harus dipahami dan dipertimbangkan:\r\n1. Tuhan yang memanggil adalah Tuhan yang memberi kebebasan. Tuhan memberikan kehendak bebas/pilihan kepada tiap anak-Nya untuk berkarya bagi-Nya dalam profesi apapun. Tidak ada profesi yang lebih suci daripada yang lain asal profesi tersebut tidak berdosa pada dirinya sendiri. Segala yang dilakukan untuk Tuhan sesuai dengan kehendak Tuhan dan prinsip-prinsip kebenaranNya adalah pelayanan yang sah bagi Tuhan.\r\n2. Tuhan yang memanggil adalah Tuhan yang melengkapi dan mempersiapkan. Jika memang memilih profesi sebagai Ev./G.I./Vic./Rev. adalah yang terbaik untuk berbuah bagi Kristus, maka sudah sewajarnya Anda diperlengkapi dengan hati seorang gembala/pengajar dan hati yang bisa merasakan enjoyment ketika menjalankan fungsi-fungsi gembala dan pemberitaan Firman, sekalipun masih belum menjadi Ev./G.I./Vic./Rev.\r\n3. Tuhan yang memanggil adalah Tuhan yang memberi beban dan gairah (passion). Jika menjadi Ev./G.I./Vic./Rev. adalah profesi/bidang yang sesuai dengan letak beban pelayanan dan gairah melayani yang selama ini Tuhan sudah tanamkan, maka kemungkinan besar memang menjadi Ev./G.I./Vic./Rev. adalah yang paling sesuai.Ini berarti:\r\n1. Tuhan tidak selalu memanggil anak-anak-Nya untuk jadi HT melalui cara-cara yang extraordinary, misalnya: lewat mimpi, suara-suara, mujizat, dan lain-lain.\r\n2. Tuhan kerap kali mengizinkan kita menggunakan kehendak bebas dan menuntut tanggung jawab kita sebagai orang yang sudah dewasa rohani untuk mengambil keputusan. Namun, apapun keputusan yang diambil, yang diserahkan kepada Tuhan, dan yang bermotivasi hanya untuk kepentingan Kerajaan Allah adalah keputusan yang baik.\r\n3. Apapun profesi yang Anda pilih, asalkan Anda lakukan untuk menyenangkan hati Tuhan, melalui berbuah selebat mungkin, adalah profesi yang baik dan berkenan di hati Tuhan.\r\n4. Namun, profesi yang terbaik adalah profesi yang sesuai dengan bakat, minat, dan beban, yakni profesi yang nantinya memberi kesempatan terbaik buat kita untuk berbuah semaksimal mungkin bagi Tuhan. Ada konfirmasi internal (dari dalam diri) dan eksternal (beban di luar diri kita dan pengakuan orang-orang di sekitar kita terhadap bakat dan talenta kita untuk profesi tersebut). Hanya dengan kesesuaian inilah kita bisa yakin dan pasti bahwa Tuhan sudah mempersiapkan kita untuk profesi tersebut.\r\n\r\nKeraguan:Keraguan adalah bagian dari hidup dan juga bagian dari proses peneguhan. Kadangkala sebagai orang Kristen pun kita mengalami keraguan. Itu sebabnya kita perlu memikirkan dan mengambil keputusan yang matang, dewasa, dan bijaksana. Jika kita sendiri sudah jelas dengan panggilan kita, maka keraguan hanya bisa memurnikan panggilan tersebut, dan tidak akan bisa menjauhkan kita dari panggilan tersebut. Tuhan yang memanggil maka Tuhan yang meneguhkan (lihat Musa, Samuel, Gideon, Daud, Nathanael, Petrus, Thomas, dan lain-lain).\r\n\r\nPersimpangan:Dalam tiap persimpangan, faktor-faktor yang menentukan adalah: bakat, minat, beban, konfirmasi internal dan eksternal. Seperti kalau kita mau pilih jalan, jangan lupa lihat kiri-kanan, tanya orang-orang yang lewat, baru kemudian ambil keputusan. Jangan berpikiran sempit. Biarkan diri terbuka selebar mungkin dan biarkan Tuhan memimpin sebebas mungkin. Kumpulkan pilihan sebanyak mungkin dan  berdoa sebanyak dan sekhusyuk mungkin. Kiranya Tuhan menuntun Anda dalam mengambil keputusan penting bagi masa depan hidup Anda yang hanya satu kali nan singkat itu! \r\nRekan seperjalanan Anda, Ev. Yuzo Adhinarta (STT Reformed Indonesia)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tema_bulanan`
--

CREATE TABLE `tema_bulanan` (
  `tema_bulanan_id` int(11) NOT NULL,
  `judul_tema_bulanan` varchar(255) NOT NULL,
  `preview_tema_bulanan` text NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema_bulanan`
--

INSERT INTO `tema_bulanan` (`tema_bulanan_id`, `judul_tema_bulanan`, `preview_tema_bulanan`, `month`, `year`) VALUES
(1, 'Light Of The World (Matius 5:14-16)', 'Membahas mengenai anak muda yang menjadi terang dan teladan untuk sekitarnya dan menanamkan value Kristus dalam kehidupannya.', 'October', '2022'),
(2, 'Mathetes / Murid / Disciple (Yesaya 50:4)', 'Membahas mengenai kesiapan hati untuk menjadi seorang yang dimuridkan.', 'November', '2022'),
(3, 'Heart of Worship (Yohanes 4:22-23;Roma 12:1;Kejadian 22:1-14)', 'Membahas mengenai memiliki hati untuk menyembah Tuhan dengan benar.', 'December', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `tema_mingguan`
--

CREATE TABLE `tema_mingguan` (
  `tema_mingguan_id` int(11) NOT NULL,
  `judul_tema_mingguan` varchar(255) NOT NULL,
  `preview_tema_mingguan` text NOT NULL,
  `tema_bulanan_id` int(11) NOT NULL,
  `ibadah_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tema_mingguan`
--

INSERT INTO `tema_mingguan` (`tema_mingguan_id`, `judul_tema_mingguan`, `preview_tema_mingguan`, `tema_bulanan_id`, `ibadah_id`) VALUES
(1, 'GODLY COMMUNITY', 'Membahas tentang membangun komunitas yang sehat di dalam Tuhan', 1, 1),
(2, 'GODLY COMMUNITY', 'Membahas tentang membangun komunitas yang sehat di dalam Tuhan', 1, 2),
(3, 'Reconciliation (1 Yoh 1:9, Rom 5:10)', 'bahas mengenai, sebelum kita berdamai dengan\r\ndiri kita sendiri dan orang lain dan jadi terang. Kita harus mulai berdamai dgn Tuhan terlebih\r\ndahulu. Mirip spt pembahasan hati bapa (boleh altar call)', 1, 3),
(4, 'Reconciliation (1 Yoh 1:9, Rom 5:10)', 'bahas mengenai, sebelum kita berdamai dengan\r\ndiri kita sendiri dan orang lain dan jadi terang. Kita harus mulai berdamai dgn Tuhan terlebih\r\ndahulu. Mirip spt pembahasan hati bapa (boleh altar call)', 1, 4),
(5, 'Relationship (Yoh 8:12)', 'bahas ttg bangun hubungan sma Tuhan, terang itu no\r\ntipu2. Ga bisa kita jadi terang klo ga deket sma sumbernya', 1, 5),
(6, 'Relationship (Yoh 8:12)', 'bahas ttg bangun hubungan sma Tuhan, terang itu no\r\ntipu2. Ga bisa kita jadi terang klo ga deket sma sumbernya', 1, 6),
(7, 'Saved to save (Mat 28:19-20, Yes 49:6, Rom 10:14, 1 Kor 9:16)', 'bahas mengenai bahwa kita ini diselamatkan untuk mengajak orang utk diselamatkan juga. Dan\r\nitu hrs menjadi misi setiap org kristen untuk menyebarkan firman Tuhan.', 1, 7),
(8, 'Saved to save (Mat 28:19-20, Yes 49:6, Rom 10:14, 1 Kor 9:16)', 'bahas mengenai bahwa kita ini diselamatkan untuk mengajak orang utk diselamatkan juga. Dan\r\nitu hrs menjadi misi setiap org kristen untuk menyebarkan firman Tuhan.', 1, 8),
(9, 'Light in the dark (Yoh 1:5)', 'bahas mengenai bahwa kegelapan di dunia itu pasti akan terus ada serta berdampingan. Tapi bagaimana respon anak Tuhan menjadi cahaya dalam kegelapan', 1, 9),
(10, 'Light in the dark (Yoh 1:5)', 'bahas mengenai bahwa kegelapan di dunia itu pasti akan terus ada serta berdampingan. Tapi bagaimana respon anak Tuhan menjadi cahaya dalam kegelapan', 1, 10),
(11, 'GOD’S DISCIPLE', 'Membahas tentang menjadi murid Kristus yang taat dan setia.', 2, 11),
(12, 'GOD’S DISCIPLE', 'Membahas tentang menjadi murid Kristus yang taat dan setia.', 2, 12),
(13, 'Vessel (Wahyu 3:19-20; Ibrani 12:6-17)', 'membahas tentang seorang murid harus menjadi seperti bejana yang siap dibentuk dan siap diproses agar bisa menjadi seorang pribadi yang lebih baik', 2, 13),
(14, 'Vessel (Wahyu 3:19-20; Ibrani 12:6-17)', 'membahas tentang seorang murid harus menjadi seperti bejana yang siap dibentuk dan siap diproses agar bisa menjadi seorang pribadi yang lebih baik', 2, 14),
(15, 'Disciple’s Quality (Yoh 6:60-66; Yesaya 50:4)', 'membahas tentang kualitas dan mental yang harus dimiliki dari seorang murid (boleh tambahin tentang murid-murid Yesus yang ikut kemanapun Yesus pergi)', 2, 15),
(16, 'Disciple’s Quality (Yoh 6:60-66; Yesaya 50:4)', 'membahas tentang kualitas dan mental yang harus dimiliki dari seorang murid (boleh tambahin tentang murid-murid Yesus yang ikut kemanapun Yesus pergi)', 2, 16),
(17, 'Role Model (Yohanes 13:15; 1 Petrus 2:21; 1 Tim 4:12)', 'membahas tentang role model yang seharusnya seorang murid Kristus miliki adalah Yesus, bahas tentang apa yang membuat Yesus layak kita jadikan role model, value apa yang Ia tanamkan dalam hidup kita, keteladanan Yesus yang harus kita ikuti', 2, 17),
(18, 'Role Model (Yohanes 13:15; 1 Petrus 2:21; 1 Tim 4:12)', 'membahas tentang role model yang seharusnya seorang murid Kristus miliki adalah Yesus, bahas tentang apa yang membuat Yesus layak kita jadikan role model, value apa yang Ia tanamkan dalam hidup kita, keteladanan Yesus yang harus kita ikuti', 2, 18);

-- --------------------------------------------------------

--
-- Table structure for table `usher`
--

CREATE TABLE `usher` (
  `usher_id` int(11) NOT NULL,
  `jemaat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usher`
--

INSERT INTO `usher` (`usher_id`, `jemaat_id`) VALUES
(23, 1),
(18, 2),
(24, 2),
(29, 2),
(10, 3),
(39, 3),
(19, 4),
(43, 4),
(20, 9),
(44, 9),
(4, 12),
(40, 12),
(3, 13),
(41, 13),
(17, 15),
(7, 16),
(16, 16),
(33, 16),
(48, 16),
(46, 18),
(37, 21),
(9, 33),
(28, 34),
(5, 40),
(15, 40),
(22, 40),
(45, 40),
(6, 41),
(27, 41),
(36, 41),
(35, 43),
(25, 46),
(49, 46),
(14, 65),
(34, 65),
(8, 72),
(1, 73),
(11, 75),
(13, 75),
(30, 76),
(21, 78),
(42, 78),
(51, 78),
(2, 79),
(12, 81),
(47, 81),
(31, 86),
(26, 90),
(32, 90),
(38, 91),
(50, 92);

-- --------------------------------------------------------

--
-- Table structure for table `usher_ibadah`
--

CREATE TABLE `usher_ibadah` (
  `usher_ibadah_id` int(11) NOT NULL,
  `ibadah_id` int(11) NOT NULL,
  `usher_id` int(11) NOT NULL,
  `keterangan_usher` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usher_ibadah`
--

INSERT INTO `usher_ibadah` (`usher_ibadah_id`, `ibadah_id`, `usher_id`, `keterangan_usher`) VALUES
(1, 1, 1, 'Lead Usher'),
(2, 1, 2, 'Peduli Lindungi'),
(3, 1, 3, 'Masker'),
(4, 1, 4, 'Anggur Perjamuan Kudus'),
(5, 1, 5, 'Main Hall (Welcoming Team)'),
(6, 1, 6, 'Main Hall (Welcoming Team)'),
(7, 2, 7, 'Lead Usher'),
(8, 2, 8, 'Peduli Lindungi'),
(9, 2, 9, 'Masker'),
(10, 2, 10, 'Anggur Perjamuan Kudus'),
(11, 2, 11, 'Main Hall (Welcoming Team)'),
(12, 2, 12, 'Main Hall (Welcoming Team)'),
(13, 3, 13, 'Lead Usher'),
(14, 3, 14, 'Peduli Lindungi'),
(15, 3, 15, 'Masker'),
(16, 3, 16, 'Main Hall (Welcoming Team)'),
(17, 3, 17, 'Main Hall (Welcoming Team)'),
(18, 4, 18, 'Lead Usher dan Masker'),
(19, 4, 19, 'Peduli Lindungi'),
(20, 4, 20, 'Main Hall (Welcoming Team)'),
(21, 4, 21, 'Main Hall (Welcoming Team)'),
(22, 5, 22, 'Lead Usher'),
(23, 5, 23, 'Peduli Lindungi'),
(24, 5, 24, 'Masker'),
(25, 5, 25, 'Main Hall (Welcoming Team)'),
(26, 5, 26, 'Main Hall (Welcoming Team)'),
(27, 6, 27, 'Lead Usher'),
(28, 6, 28, 'Peduli Lindungi'),
(29, 6, 29, 'Masker'),
(30, 6, 30, 'Main Hall (Welcoming Team)'),
(31, 6, 31, 'Main Hall (Welcoming Team)'),
(32, 7, 32, 'Lead Usher'),
(33, 7, 33, 'Peduli Lindungi'),
(34, 7, 34, 'Masker'),
(35, 7, 35, 'Main Hall (Welcoming Team)'),
(36, 7, 36, 'Main Hall (Welcoming Team)'),
(37, 8, 37, 'Lead Usher'),
(38, 8, 38, 'Peduli Lindungi'),
(39, 8, 39, 'Masker'),
(40, 8, 40, 'Main Hall (Welcoming Team)'),
(41, 8, 41, 'Main Hall (Welcoming Team)'),
(42, 9, 42, 'Lead Usher'),
(43, 9, 43, 'Peduli Lindungi'),
(44, 9, 44, 'Masker'),
(45, 9, 45, 'Main Hall (Welcoming Team)'),
(46, 9, 46, 'Main Hall (Welcoming Team)'),
(47, 10, 47, 'Lead Usher'),
(48, 10, 48, 'Peduli Lindungi'),
(49, 10, 49, 'Masker'),
(50, 10, 50, 'Main Hall (Welcoming Team)'),
(51, 10, 51, 'Main Hall (Welcoming Team)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `fk_event_jemaat` (`ref_user_id`);

--
-- Indexes for table `ibadah`
--
ALTER TABLE `ibadah`
  ADD PRIMARY KEY (`ibadah_id`),
  ADD KEY `fk_user_ibadah` (`ref_user_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jabatan_jemaat`
--
ALTER TABLE `jabatan_jemaat`
  ADD PRIMARY KEY (`jabatan_jemaat_id`),
  ADD KEY `fk_jabatan_jemaat_1` (`jemaat_id`),
  ADD KEY `fk_jabatan_jemaat_2` (`jabatan_id`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`jemaat_id`),
  ADD KEY `fk_user_jemaat` (`ref_user_id`);

--
-- Indexes for table `jenis_pemusik`
--
ALTER TABLE `jenis_pemusik`
  ADD PRIMARY KEY (`jenis_pemusik_id`);

--
-- Indexes for table `musik_ibadah`
--
ALTER TABLE `musik_ibadah`
  ADD PRIMARY KEY (`musik_ibadah_id`),
  ADD KEY `fk_musik_ibadah` (`ibadah_id`),
  ADD KEY `fk_musik_pemusik` (`pemusik_id`),
  ADD KEY `fk_musik_jenis_pemusik` (`jenis_pemusik_id`);

--
-- Indexes for table `pemusik`
--
ALTER TABLE `pemusik`
  ADD PRIMARY KEY (`pemusik_id`),
  ADD KEY `fk_pemusik_jemaat` (`jemaat_id`);

--
-- Indexes for table `pengkhotbah`
--
ALTER TABLE `pengkhotbah`
  ADD PRIMARY KEY (`pengkhotbah_id`),
  ADD KEY `fk_pengkhotbah_ibadah` (`ibadah_id`),
  ADD KEY `fk_pengkhotbah_luar` (`pengkhotbah_luar_id`),
  ADD KEY `fk_pengkhotbah_dalam` (`jemaat_id`);

--
-- Indexes for table `pengkhotbah_luar`
--
ALTER TABLE `pengkhotbah_luar`
  ADD PRIMARY KEY (`pengkhotbah_luar_id`);

--
-- Indexes for table `ref_user`
--
ALTER TABLE `ref_user`
  ADD PRIMARY KEY (`ref_user_id`);

--
-- Indexes for table `renungan`
--
ALTER TABLE `renungan`
  ADD PRIMARY KEY (`renungan_id`),
  ADD KEY `fk_renungan_user` (`ref_user_id`);

--
-- Indexes for table `tema_bulanan`
--
ALTER TABLE `tema_bulanan`
  ADD PRIMARY KEY (`tema_bulanan_id`);

--
-- Indexes for table `tema_mingguan`
--
ALTER TABLE `tema_mingguan`
  ADD PRIMARY KEY (`tema_mingguan_id`),
  ADD KEY `fk_tema_bulanan_mingguan` (`tema_bulanan_id`),
  ADD KEY `fk_tema_mingguan_ibadah` (`ibadah_id`);

--
-- Indexes for table `usher`
--
ALTER TABLE `usher`
  ADD PRIMARY KEY (`usher_id`),
  ADD KEY `fk_usher_jemaat` (`jemaat_id`);

--
-- Indexes for table `usher_ibadah`
--
ALTER TABLE `usher_ibadah`
  ADD PRIMARY KEY (`usher_ibadah_id`),
  ADD KEY `fk_usher_ibadah_2` (`ibadah_id`),
  ADD KEY `fk_usher_ibadah` (`usher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ibadah`
--
ALTER TABLE `ibadah`
  MODIFY `ibadah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jabatan_jemaat`
--
ALTER TABLE `jabatan_jemaat`
  MODIFY `jabatan_jemaat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `jemaat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `jenis_pemusik`
--
ALTER TABLE `jenis_pemusik`
  MODIFY `jenis_pemusik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `musik_ibadah`
--
ALTER TABLE `musik_ibadah`
  MODIFY `musik_ibadah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pemusik`
--
ALTER TABLE `pemusik`
  MODIFY `pemusik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pengkhotbah`
--
ALTER TABLE `pengkhotbah`
  MODIFY `pengkhotbah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengkhotbah_luar`
--
ALTER TABLE `pengkhotbah_luar`
  MODIFY `pengkhotbah_luar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_user`
--
ALTER TABLE `ref_user`
  MODIFY `ref_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `renungan`
--
ALTER TABLE `renungan`
  MODIFY `renungan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tema_bulanan`
--
ALTER TABLE `tema_bulanan`
  MODIFY `tema_bulanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tema_mingguan`
--
ALTER TABLE `tema_mingguan`
  MODIFY `tema_mingguan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usher`
--
ALTER TABLE `usher`
  MODIFY `usher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `usher_ibadah`
--
ALTER TABLE `usher_ibadah`
  MODIFY `usher_ibadah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_event_jemaat` FOREIGN KEY (`ref_user_id`) REFERENCES `ref_user` (`ref_user_id`);

--
-- Constraints for table `ibadah`
--
ALTER TABLE `ibadah`
  ADD CONSTRAINT `fk_user_ibadah` FOREIGN KEY (`ref_user_id`) REFERENCES `ref_user` (`ref_user_id`);

--
-- Constraints for table `jabatan_jemaat`
--
ALTER TABLE `jabatan_jemaat`
  ADD CONSTRAINT `fk_jabatan_jemaat_1` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaat` (`jemaat_id`),
  ADD CONSTRAINT `fk_jabatan_jemaat_2` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`);

--
-- Constraints for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD CONSTRAINT `fk_user_jemaat` FOREIGN KEY (`ref_user_id`) REFERENCES `ref_user` (`ref_user_id`);

--
-- Constraints for table `musik_ibadah`
--
ALTER TABLE `musik_ibadah`
  ADD CONSTRAINT `fk_musik_ibadah` FOREIGN KEY (`ibadah_id`) REFERENCES `ibadah` (`ibadah_id`),
  ADD CONSTRAINT `fk_musik_jenis_pemusik` FOREIGN KEY (`jenis_pemusik_id`) REFERENCES `jenis_pemusik` (`jenis_pemusik_id`),
  ADD CONSTRAINT `fk_musik_pemusik` FOREIGN KEY (`pemusik_id`) REFERENCES `pemusik` (`pemusik_id`);

--
-- Constraints for table `pemusik`
--
ALTER TABLE `pemusik`
  ADD CONSTRAINT `fk_pemusik_jemaat` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaat` (`jemaat_id`) ON DELETE SET NULL;

--
-- Constraints for table `pengkhotbah`
--
ALTER TABLE `pengkhotbah`
  ADD CONSTRAINT `fk_pengkhotbah_dalam` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaat` (`jemaat_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_pengkhotbah_ibadah` FOREIGN KEY (`ibadah_id`) REFERENCES `ibadah` (`ibadah_id`),
  ADD CONSTRAINT `fk_pengkhotbah_luar` FOREIGN KEY (`pengkhotbah_luar_id`) REFERENCES `pengkhotbah_luar` (`pengkhotbah_luar_id`);

--
-- Constraints for table `renungan`
--
ALTER TABLE `renungan`
  ADD CONSTRAINT `fk_renungan_user` FOREIGN KEY (`ref_user_id`) REFERENCES `ref_user` (`ref_user_id`);

--
-- Constraints for table `tema_mingguan`
--
ALTER TABLE `tema_mingguan`
  ADD CONSTRAINT `fk_tema_bulanan_mingguan` FOREIGN KEY (`tema_bulanan_id`) REFERENCES `tema_bulanan` (`tema_bulanan_id`),
  ADD CONSTRAINT `fk_tema_mingguan_ibadah` FOREIGN KEY (`ibadah_id`) REFERENCES `ibadah` (`ibadah_id`);

--
-- Constraints for table `usher`
--
ALTER TABLE `usher`
  ADD CONSTRAINT `fk_usher_jemaat` FOREIGN KEY (`jemaat_id`) REFERENCES `jemaat` (`jemaat_id`) ON DELETE SET NULL;

--
-- Constraints for table `usher_ibadah`
--
ALTER TABLE `usher_ibadah`
  ADD CONSTRAINT `fk_usher_ibadah` FOREIGN KEY (`usher_id`) REFERENCES `usher` (`usher_id`),
  ADD CONSTRAINT `fk_usher_ibadah_2` FOREIGN KEY (`ibadah_id`) REFERENCES `ibadah` (`ibadah_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
