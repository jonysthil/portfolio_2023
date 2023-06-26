-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 26, 2023 at 02:32 AM
-- Server version: 10.3.38-MariaDB-1:10.3.38+maria~ubu2004
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jonysthil`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ab_id` int(11) NOT NULL,
  `ab_about` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`ab_id`, `ab_about`) VALUES
(1, 'I\'m Jonathan Jimenez, a Web Developer Frontend and backend developer with more than 3 years of experience in the Startup world. I love programming and everything related to the internet and new technologies, creating things and helping others.\nI\'m almost completely self-taught, so I am going to offer a lot of my knowledge to be able to help you easily and more quickly. jajajajaja');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_type` varchar(10) DEFAULT NULL,
  `ad_email` varchar(50) NOT NULL,
  `ad_password` varchar(50) NOT NULL,
  `ad_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_type`, `ad_email`, `ad_password`, `ad_name`) VALUES
(1, 'admin', 'jonysthil@gmail.com', 'pocoyojony12', 'Jonathan JG');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cnt_id` int(11) NOT NULL,
  `cnt_status` int(1) NOT NULL DEFAULT 1,
  `cnt_name` varchar(100) NOT NULL,
  `cnt_mail` varchar(100) NOT NULL,
  `cnt_phone` varchar(100) NOT NULL,
  `cnt_message` longtext NOT NULL,
  `cnt_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cnt_id`, `cnt_status`, `cnt_name`, `cnt_mail`, `cnt_phone`, `cnt_message`, `cnt_date`) VALUES
(1, 0, 'Jonathan Jimenez Gamero', 'jonysthil@gmail.com', '5538030380', 'Necesito ayuda', '2023-06-26'),
(2, 0, 'kljdfcgklj', 'josdfgo@kjk.dffd', '4566345fdghdf', 'sdfgsdfgsdfg', '2023-06-04'),
(3, 0, 'sdfgsdf', 'jonysthil@gmail.com', '3456345456', 'sdfgsdf', '2023-06-13'),
(4, 0, 'kdjfgklsdf', 'jonysthil@gmail.com', '5538030380', 'dfghdfghdfgh', '2023-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `edu_id` int(11) NOT NULL,
  `edu_status` int(1) NOT NULL DEFAULT 0,
  `edu_order` int(11) NOT NULL DEFAULT 0,
  `edu_place` varchar(250) DEFAULT NULL,
  `edu_title` varchar(100) NOT NULL,
  `edu_description` longtext DEFAULT NULL,
  `edu_month_start` varchar(4) DEFAULT NULL,
  `edu_year_start` varchar(4) DEFAULT NULL,
  `edu_month_finish` varchar(4) DEFAULT NULL,
  `edu_year_finish` varchar(4) DEFAULT NULL,
  `edu_current` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`edu_id`, `edu_status`, `edu_order`, `edu_place`, `edu_title`, `edu_description`, `edu_month_start`, `edu_year_start`, `edu_month_finish`, `edu_year_finish`, `edu_current`) VALUES
(3, 1, 0, 'Instituto Tecnológico de Gustavo A. Madero', 'Licenciatura en Ingeniería en Tecnologías de la Informacíon y Comunicaciones', 'Bachelor of engineering in information and communications technologies', '7', '2011', '8', '2016', 0),
(6, 1, 1, 'SCRUMstudy', 'Scrum Fundamentals Certified', NULL, '2', '2019', NULL, NULL, 1),
(7, 1, 2, 'Analytics Academy', 'Advanced Google Analytics course', NULL, '10', '2018', NULL, NULL, 1),
(8, 1, 3, 'Analytics Academy', 'Google Analytics for Beginners', NULL, '9', '2018', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `exp_id` int(11) NOT NULL,
  `exp_status` int(1) NOT NULL DEFAULT 0,
  `exp_order` int(11) NOT NULL DEFAULT 0,
  `exp_place` varchar(250) DEFAULT NULL,
  `exp_title` varchar(100) NOT NULL,
  `exp_description` longtext DEFAULT NULL,
  `exp_month_start` varchar(4) DEFAULT NULL,
  `exp_year_start` varchar(4) DEFAULT NULL,
  `exp_month_finish` varchar(4) DEFAULT NULL,
  `exp_year_finish` varchar(4) DEFAULT NULL,
  `exp_current` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`exp_id`, `exp_status`, `exp_order`, `exp_place`, `exp_title`, `exp_description`, `exp_month_start`, `exp_year_start`, `exp_month_finish`, `exp_year_finish`, `exp_current`) VALUES
(2, 1, 2, 'TSJDF (Tribunal Superior de Justicia del Distrito Federal).', 'Social service', 'Implement a web system that controls the shift of trades assigning them to the specific person or area.', '1', '2015', '7', '2015', 0),
(4, 1, 0, 'Proelium', 'Full-stack Web Developer', 'Development and design of databases, analysis and development of web platforms from sites to ecommers.', '9', '2017', NULL, NULL, 1),
(5, 1, 1, 'FONDESO (Fondo para el Desarrollo Social de la Ciudad de México).', 'Professional Residence', 'Implement a web system that allows the management and control of borrowers, for the Portfolio Recovery Management, through user roles.', '0', '2016', '8', '2016', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `prt_id` int(11) NOT NULL,
  `prt_status` int(1) NOT NULL DEFAULT 0,
  `prt_order` int(11) NOT NULL DEFAULT 0,
  `prt_title` varchar(250) NOT NULL,
  `prt_description` longtext DEFAULT NULL,
  `prt_date` date NOT NULL,
  `prt_slug` varchar(250) NOT NULL,
  `prt_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`prt_id`, `prt_status`, `prt_order`, `prt_title`, `prt_description`, `prt_date`, `prt_slug`, `prt_url`) VALUES
(4, 1, 17, 'Mexbest', 'MexBest is the institutional image created by SAGARPA, to present and promote agri-food products from the Mexican countryside with export quality, through the most important events and exhibitions in the agri-food and fishing sector, which take place in the main markets of export.\r\nMexBest promotes agri-food products from the Mexican countryside with export quality.', '2018-10-25', 'mexbest', 'https://www.mexbest.com/'),
(5, 1, 15, 'Danpal', 'They are manufacturers, marketers and installers of Danpal systems, with a presence in more than 80 countries, backed by more than 30 years of experience in high-level thermal-translucent systems for the architectural envelope.', '2022-06-06', 'danpal', 'http://www.danpal.mx/'),
(7, 1, 14, 'Medical Express', 'Administer and manage female patients in the gynecology area, maintaining control and registration of consultations, treatments, among other things.', '2019-08-22', 'medical-express', NULL),
(8, 1, 13, 'Tu corazón', 'DR. Elihu Durán Cortés, Clinical and interventional cardiologist.\r\n\r\nDevelopment of website and control panel.\r\nThe control panel allows the entry of blogs, banners, adding documents and videos.', '2019-10-01', 'tu-corazon', 'http://www.tucorazon.mx/'),
(11, 1, 10, 'KIP', 'At Kip we give well-being to the woman who offers her domestic cleaning services by having the ability to choose a place, hours and working days that suit her needs; they are our associates.\r\n\r\nAt Kip we give well-being to the woman who offers her domestic cleaning services by having the ability to choose a place, hours and working days that suit her needs; they are our associates.\r\n\r\nIn addition to the main website, it has two others:\r\n\r\nKIP Clients: clientes.kip.mx\r\nKIP Associates: asociadas.kip.mx\r\n\r\nEach one with its corresponding control panels.', '2019-08-09', 'kip', 'https://www.kip.mx'),
(12, 1, 11, 'Aressi Locutora', 'I offer you experience and knowledge of the medium, I have 20 years of working as an announcer and in the media. I know that you are looking for quality, punctuality, flexibility, cordial treatment, you simply want to trust that your project will be successful!', '2019-06-23', 'aressi-locutora', 'https://www.aressilocutora.com'),
(13, 1, 8, 'CloudNetwork', 'They are a one hundred percent Mexican company with more than 15 years of experience, dedicated to providing comprehensive services in the areas of networks, communication, security and civil works. Made up of an interdisciplinary team of certified and highly trained and qualified personnel to provide solutions according to the needs of our clients under the standards set by the industry.', '2020-02-13', 'cloudnetwork', 'https://www.cloudnetwork.mx'),
(14, 1, 9, 'GCI Grupo Consultor en Informática', 'We are a Mexican company founded in 1999. We are dedicated to providing maintenance, implementation and development of IT solutions that transcend borders.\r\nSomething that characterizes us is our commitment to our clients to provide the best response time and quality in preventive and corrective maintenance of the infrastructure.\r\n\r\nOur specialized professionals are key to making successful planning and implementations that exceed expectations and anticipate future problems.', '2022-03-22', 'gci-grupo-consultor-en-informatica', 'https://www.gci.mx/'),
(15, 1, 6, 'Educando con Valor', 'Life Mastery is a community where you will be able to express how you feel, you will receive empathy with the confidence of not being judged, you will be able to learn to listen to be understood, you will have tools and the space to reflect and generate a change in your life.\r\n\r\nIn this project, I only collaborated with a payment landing for the courses they offer, as well as a panel in which they manage payments, clients, and products.\r\n\r\nThe payment form was made through the STRIPE platform', '2023-01-13', 'educando-con-valor', 'https://www.educandoconvalor.com/pagos/index.php?prodId=3'),
(16, 1, 3, 'EVA English Academy', 'At EVA (Educating with Values) English Academy your goal is our goal, which is why we offer you personalized classes according to your needs. Learn in a fun, interesting environment where you can relax and enjoy yourself while learning a second language.\r\n\r\nIn this project, I only collaborated with a payment landing for the courses they offer, as well as a panel in which they manage payments, clients, and products.\r\n\r\nThe payment form was made through the STRIPE platform', '2023-01-13', 'eva-english-academy', 'https://www.evaenglishacademy.com/pagos/'),
(17, 1, 0, 'Karla Lara Coach', '\"Karla Lara is a professional in personal development. Passionate about human behavior and the sciences of happiness. Master & Coach in Neurolinguistic Programming. Specialist in Emotional Intelligence and Social Intelligence. High-impact professional speaker. Writer of \"Your Models of Love\" Author of Grupo Editorial Penguin Random House Host of the EXTRAordinario podcast Co host of the Sin Juzgar podcast\r\n\r\nDevelopment of multiple payment forms for your courses as well as their respective control panels, for the administration of clients, payments and products.', '2023-06-26', 'karla-lara-coach', 'https://karlalaracoach.com'),
(18, 1, 5, 'Akademus Administracion', 'Administration panel, which allows you to manage paid students, tickets, attendance, will announce announcements, events, among other options', '2022-10-05', 'akademus-administracion', NULL),
(19, 1, 4, 'Akademus Alumno', 'It allows the student\'s parent to review their registration payments, their child\'s report cards, review the latest announcements by the school among other options.', '2022-10-05', 'akademus-alumno', NULL),
(20, 1, 7, 'Rosy Ponce', 'Lecturer, Holistic Therapist and Consciousness Facilitator\r\nMy mission is to share with you practical tools that help you build environments of fulfillment from within.\r\n\r\nIn this project, I only collaborated with a payment landing for the courses they offer, as well as a panel in which they manage payments, clients, and products.\r\n\r\nThe payment form was made through the STRIPE platform', '2022-06-30', 'rosy-ponce', 'https://www.rosyponce.com/pagos/index.php?prodId=10'),
(21, 1, 12, 'Mastache Bienes Raíces', 'At Mastache Bienes Raíces we specialize in the sale, construction and design of real estate throughout the area of Lomas de Cocoyoc, Morelos.', '2109-07-26', 'mastache-bienes-raices', 'http://www.mastachebienesraices.com.mx/'),
(22, 1, 16, 'AMIC', 'The Mexican Association of Corporate Interior Design (AMICmx), brings together leading companies in the corporate interior design sector, managing to create a consolidated and cutting-edge vision around the evolution of this important industry in the national market.', '2022-10-05', 'amic', 'https://www.amicmexico.org.mx/'),
(23, 1, 1, 'Tribu EXTRAordinaria', 'Control panel, in which you manage your clients, courses, workshops, payments, among other activities.', '2023-06-26', 'tribu-extraordinaria', NULL),
(24, 1, 2, 'Tribu EXTRAordinaria Members', 'Customer panel in which you manage the courses you buy, you can add favorites, manage your profile', '2023-06-26', 'tribu-extraordinaria-members', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_category`
--

CREATE TABLE `portfolio_category` (
  `prtca_id` int(11) NOT NULL,
  `prt_id` int(11) NOT NULL,
  `pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `portfolio_category`
--

INSERT INTO `portfolio_category` (`prtca_id`, `prt_id`, `pc_id`) VALUES
(22, 4, 7),
(23, 4, 8),
(25, 4, 2),
(27, 5, 7),
(28, 5, 8),
(29, 5, 6),
(33, 7, 7),
(34, 7, 8),
(36, 8, 6),
(37, 8, 8),
(39, 11, 8),
(40, 11, 6),
(42, 11, 7),
(43, 12, 8),
(45, 12, 6),
(46, 13, 7),
(47, 13, 8),
(48, 13, 6),
(49, 13, 9),
(50, 12, 10),
(51, 14, 2),
(52, 14, 6),
(53, 14, 8),
(54, 15, 8),
(55, 15, 7),
(56, 15, 10),
(57, 15, 9),
(58, 16, 10),
(59, 16, 8),
(60, 16, 7),
(61, 16, 9),
(62, 17, 6),
(63, 17, 7),
(64, 17, 9),
(65, 17, 8),
(66, 17, 10),
(67, 18, 8),
(68, 18, 7),
(73, 19, 6),
(74, 20, 9),
(75, 20, 7),
(76, 21, 7),
(77, 21, 8),
(78, 21, 6),
(79, 22, 8),
(80, 22, 7),
(81, 22, 6),
(82, 23, 8),
(83, 23, 7),
(84, 23, 6),
(85, 24, 7),
(86, 24, 10);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_gallery`
--

CREATE TABLE `portfolio_gallery` (
  `pg_id` int(11) NOT NULL,
  `prt_id` int(11) NOT NULL,
  `pg_head` int(1) NOT NULL DEFAULT 0,
  `pg_order` int(11) NOT NULL DEFAULT 0,
  `pg_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `portfolio_gallery`
--

INSERT INTO `portfolio_gallery` (`pg_id`, `prt_id`, `pg_head`, `pg_order`, `pg_name`) VALUES
(12, 5, 1, 0, 'danpal_6490db0a20a18.webp'),
(14, 4, 1, 0, 'mexbest_64935fcde9254.webp'),
(15, 4, 0, 3, 'mexbest_64935fda26fba.webp'),
(16, 4, 0, 4, 'mexbest_64935fe1926d2.webp'),
(17, 4, 0, 5, 'mexbest_64935fea44140.webp'),
(18, 4, 0, 1, 'mexbest_64935ff1bf084.webp'),
(19, 4, 0, 2, 'mexbest_64935ffe21429.webp'),
(20, 4, 0, 0, 'mexbest_6493608272599.webp');

-- --------------------------------------------------------

--
-- Table structure for table `proyect_category`
--

CREATE TABLE `proyect_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `proyect_category`
--

INSERT INTO `proyect_category` (`pc_id`, `pc_name`) VALUES
(1, 'App'),
(2, 'Web Design'),
(6, 'Web Page'),
(7, 'CRM'),
(8, 'CMS'),
(9, 'Ecommerce'),
(10, 'Landing Page');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ser_id` int(11) NOT NULL,
  `ser_status` int(1) NOT NULL DEFAULT 0,
  `ser_order` int(11) NOT NULL DEFAULT 0,
  `ser_name` varchar(250) NOT NULL,
  `ser_description` longtext NOT NULL,
  `ser_icon` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ser_id`, `ser_status`, `ser_order`, `ser_name`, `ser_description`, `ser_icon`) VALUES
(1, 1, 2, 'Web Design', 'The most modern and high-quality design made at a professional level.', 'web-design_6498c9c74f3a1.webp'),
(2, 1, 1, 'Web Development', 'High-quality development of sites at the professional level.', 'web-development_6498c9920c45d.webp'),
(3, 1, 0, 'Mobile Apps', 'Professional development of applications for iOS and Android.', 'mobile-apps_6498c9232f1c8.webp'),
(4, 0, 3, 'Photography', 'I make high-quality photos of any category at a professional level.', 'photography.webp');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `sk_id` int(11) NOT NULL,
  `sk_status` int(1) NOT NULL DEFAULT 0,
  `sk_order` int(11) NOT NULL DEFAULT 0,
  `sk_title` varchar(100) NOT NULL,
  `sk_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`sk_id`, `sk_status`, `sk_order`, `sk_title`, `sk_image`) VALUES
(3, 1, 0, 'PHP', 'php_648759a7d43f0.webp'),
(4, 1, 7, 'JavaScript', 'javascript_64875ab45ee06.webp'),
(5, 1, 8, 'jQuery', 'jquery_64875cfac37ed.webp'),
(6, 1, 1, 'Laravel', 'laravel_64875d13000dd.webp'),
(10, 1, 4, 'React Native', 'react-native_64875e23a666c.webp'),
(11, 1, 3, 'React JS', 'react-js_64875e3da95d3.webp'),
(12, 1, 5, 'HTML', 'html_64879e067056c.webp'),
(13, 1, 6, 'CSS 3', 'css-3_64879e1e2c42d.webp'),
(14, 1, 2, 'CodeIgniter', 'codeigniter_64879e3853030.webp'),
(15, 1, 9, 'Wordpress', 'wordpress_64879e6144969.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ab_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cnt_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`exp_id`) USING BTREE;

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`prt_id`);

--
-- Indexes for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD PRIMARY KEY (`prtca_id`),
  ADD KEY `prtcaId_FK_prtId` (`prt_id`),
  ADD KEY `prtcaId_FK_pcId` (`pc_id`);

--
-- Indexes for table `portfolio_gallery`
--
ALTER TABLE `portfolio_gallery`
  ADD PRIMARY KEY (`pg_id`),
  ADD KEY `pgId_FK_prtId` (`prt_id`);

--
-- Indexes for table `proyect_category`
--
ALTER TABLE `proyect_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`sk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `edu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `exp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `prt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  MODIFY `prtca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `portfolio_gallery`
--
ALTER TABLE `portfolio_gallery`
  MODIFY `pg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `proyect_category`
--
ALTER TABLE `proyect_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `sk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `portfolio_category`
--
ALTER TABLE `portfolio_category`
  ADD CONSTRAINT `prtcaId_FK_pcId` FOREIGN KEY (`pc_id`) REFERENCES `proyect_category` (`pc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prtcaId_FK_prtId` FOREIGN KEY (`prt_id`) REFERENCES `portfolio` (`prt_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio_gallery`
--
ALTER TABLE `portfolio_gallery`
  ADD CONSTRAINT `pgId_FK_prtId` FOREIGN KEY (`prt_id`) REFERENCES `portfolio` (`prt_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
