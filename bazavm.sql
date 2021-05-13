-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2020 at 04:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT 0;
BEGIN TRANSACTION;
SET time_zone "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazavm`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE "korisnik" (
  "korisnik_id" int(11) NOT NULL,
  "tip_korisnika_id" int(11) NOT NULL,
  "korisnicko_ime" varchar(50) NOT NULL,
  "lozinka" varchar(50) NOT NULL,
  "ime" varchar(50) NOT NULL,
  "prezime" varchar(50) NOT NULL,
  "email" varchar(100) NOT NULL,
  "slika" text NOT NULL
) --ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO "korisnik" ("korisnik_id", "tip_korisnika_id", "korisnicko_ime", "lozinka", "ime", "prezime", "email", "slika") VALUES
(1, 0, "admin", "foi", "Administrator", "Admin", "admin@foi.hr", "korisnici/admin.jpg"),
(2, 1, 'voditelj', '123456', 'voditelj', 'Vodi', 'voditelj@foi.hr', 'korisnici/admin.jpg'),
(3, 2, 'pkos', '123456', 'Pero', 'Kos', 'pkos@fff.hr', 'korisnici/pkos.jpg'),
(4, 2, 'vzec', '123456', 'Vladimir', 'Zec', 'vzec@fff.hr', 'korisnici/vzec.jpg'),
(5, 2, 'qtarantino', '123456', 'Quentin', 'Tarantino', 'qtarantino@foi.hr', 'korisnici/qtarantino.jpg'),
(6, 2, 'mbellucci', '123456', 'Monica', 'Bellucci', 'mbellucci@foi.hr', 'korisnici/mbellucci.jpg'),
(7, 2, 'vmortensen', '123456', 'Viggo', 'Mortensen', 'vmortensen@foi.hr', 'korisnici/vmortensen.jpg'),
(8, 2, 'jgarner', '123456', 'Jennifer', 'Garner', 'jgarner@foi.hr', 'korisnici/jgarner.jpg'),
(9, 2, 'nportman', '123456', 'Natalie', 'Portman', 'nportman@foi.hr', 'korisnici/nportman.jpg'),
(10, 2, 'dradcliffe', '123456', 'Daniel', 'Radcliffe', 'dradcliffe@foi.hr', 'korisnici/dradcliffe.jpg'),
(11, 2, 'hberry', '123456', 'Halle', 'Berry', 'hberry@foi.hr', 'korisnici/hberry.jpg'),
(12, 2, 'vdiesel', '123456', 'Vin', 'Diesel', 'vdiesel@foi.hr', 'korisnici/vdiesel.jpg'),
(13, 2, 'ecuthbert', '123456', 'Elisha', 'Cuthbert', 'ecuthbert@foi.hr', 'korisnici/ecuthbert.jpg'),
(14, 2, 'janiston', '123456', 'Jennifer', 'Aniston', 'janiston@foi.hr', 'korisnici/janiston.jpg'),
(15, 2, 'ctheron', '123456', 'Charlize', 'Theron', 'ctheron@foi.hr', 'korisnici/ctheron.jpg'),
(16, 2, 'nkidman', '123456', 'Nicole', 'Kidman', 'nkidman@foi.hr', 'korisnici/nkidman.jpg'),
(17, 2, 'ewatson', '123456', 'Emma', 'Watson', 'ewatson@foi.hr', 'korisnici/ewatson.jpg'),
(18, 1, 'kdunst', '123456', 'Kirsten', 'Dunst', 'kdunst@foi.hr', 'korisnici/kdunst.jpg'),
(19, 2, 'sjohansson', '123456', 'Scarlett', 'Johansson', 'sjohansson@foi.hr', 'korisnici/sjohansson.jpg'),
(20, 2, 'philton', '123456', 'Paris', 'Hilton', 'philton@foi.hr', 'korisnici/philton.jpg'),
(21, 2, 'kbeckinsale', '123456', 'Kate', 'Beckinsale', 'kbeckinsale@foi.hr', 'korisnici/kbeckinsale.jpg'),
(22, 2, 'tcruise', '123456', 'Tom', 'Cruise', 'tcruise@foi.hr', 'korisnici/tcruise.jpg'),
(23, 2, 'hduff', '123456', 'Hilary', 'Duff', 'hduff@foi.hr', 'korisnici/hduff.jpg'),
(24, 2, 'ajolie', '123456', 'Angelina', 'Jolie', 'ajolie@foi.hr', 'korisnici/ajolie.jpg'),
(25, 2, 'kknightley', '123456', 'Keira', 'Knightley', 'kknightley@foi.hr', 'korisnici/kknightley.jpg'),
(26, 2, 'obloom', '123456', 'Orlando', 'Bloom', 'obloom@foi.hr', 'korisnici/obloom.jpg'),
(27, 2, 'llohan', '123456', 'Lindsay', 'Lohan', 'llohan@foi.hr', 'korisnici/llohan.jpg'),
(28, 2, 'jdepp', '123456', 'Johnny', 'Depp', 'jdepp@foi.hr', 'korisnici/jdepp.jpg'),
(29, 2, 'kreeves', '123456', 'Keanu', 'Reeves', 'kreeves@foi.hr', 'korisnici/kreeves.jpg'),
(30, 1, 'thanks', '123456', 'Tom', 'Hanks', 'thanks@foi.hr', 'korisnici/thanks.jpg'),
(31, 2, 'elongoria', '123456', 'Eva', 'Longoria', 'elongoria@foi.hr', 'korisnici/elongoria.jpg'),
(32, 2, 'rde', '123456', 'Robert', 'De', 'rde@foi.hr', 'korisnici/rde.jpg'),
(33, 2, 'jheder', '123456', 'Jon', 'Heder', 'jheder@foi.hr', 'korisnici/jheder.jpg'),
(34, 2, 'rmcadams', '123456', 'Rachel', 'McAdams', 'rmcadams@foi.hr', 'korisnici/rmcadams.jpg'),
(35, 2, 'cbale', '123456', 'Christian', 'Bale', 'cbale@foi.hr', 'korisnici/cbale.jpg'),
(36, 1, 'jalba', '123456', 'Jessica', 'Alba', 'jalba@foi.hr', 'korisnici/jalba.jpg'),
(37, 2, 'bpitt', '123456', 'Brad', 'Pitt', 'bpitt@foi.hr', 'korisnici/bpitt.jpg'),
(43, 2, 'apacino', '123456', 'Al', 'Pacino', 'apacino@foi.hr', 'korisnici/apacino.jpg'),
(44, 2, 'wsmith', '123456', 'Will', 'Smith', 'wsmith@foi.hr', 'korisnici/wsmith.jpg'),
(45, 2, 'ncage', '123456', 'Nicolas', 'Cage', 'ncage@foi.hr', 'korisnici/ncage.jpg'),
(46, 2, 'vanne', '123456', 'Vanessa', 'Anne', 'vanne@foi.hr', 'korisnici/vanne.jpg'),
(47, 2, 'kheigl', '123456', 'Katherine', 'Heigl', 'kheigl@foi.hr', 'korisnici/kheigl.jpg'),
(48, 2, 'gbutler', '123456', 'Gerard', 'Butler', 'gbutler@foi.hr', 'korisnici/gbutler.jpg'),
(49, 2, 'jbiel', '123456', 'Jessica', 'Biel', 'jbiel@foi.hr', 'korisnici/jbiel.jpg'),
(50, 2, 'ldicaprio', '123456', 'Leonardo', 'DiCaprio', 'ldicaprio@foi.hr', 'korisnici/ldicaprio.jpg'),
(51, 2, 'mdamon', '123456', 'Matt', 'Damon', 'mdamon@foi.hr', 'korisnici/mdamon.jpg'),
(52, 2, 'hpanettiere', '123456', 'Hayden', 'Panettiere', 'hpanettiere@foi.hr', 'korisnici/hpanettiere.jpg'),
(53, 2, 'rreynolds', '123456', 'Ryan', 'Reynolds', 'rreynolds@foi.hr', 'korisnici/rreynolds.jpg'),
(54, 2, 'jstatham', '123456', 'Jason', 'Statham', 'jstatham@foi.hr', 'korisnici/jstatham.jpg'),
(55, 2, 'enorton', '123456', 'Edward', 'Norton', 'enorton@foi.hr', 'korisnici/enorton.jpg'),
(56, 2, 'mwahlberg', '123456', 'Mark', 'Wahlberg', 'mwahlberg@foi.hr', 'korisnici/mwahlberg.jpg'),
(57, 2, 'jmcavoy', '123456', 'James', 'McAvoy', 'jmcavoy@foi.hr', 'korisnici/jmcavoy.jpg'),
(58, 2, 'epage', '123456', 'Ellen', 'Page', 'epage@foi.hr', 'korisnici/epage.jpg'),
(59, 2, 'mcyrus', '123456', 'Miley', 'Cyrus', 'mcyrus@foi.hr', 'korisnici/mcyrus.jpg'),
(60, 2, 'kstewart', '123456', 'Kristen', 'Stewart', 'kstewart@foi.hr', 'korisnici/kstewart.jpg'),
(61, 2, 'mfox', '123456', 'Megan', 'Fox', 'mfox@foi.hr', 'korisnici/mfox.jpg'),
(62, 2, 'slabeouf', '123456', 'Shia', 'LaBeouf', 'slabeouf@foi.hr', 'korisnici/slabeouf.jpg'),
(63, 2, 'ceastwood', '123456', 'Clint', 'Eastwood', 'ceastwood@foi.hr', 'korisnici/ceastwood.jpg'),
(64, 2, 'srogen', '123456', 'Seth', 'Rogen', 'srogen@foi.hr', 'korisnici/srogen.jpg'),
(65, 2, 'nreed', '123456', 'Nikki', 'Reed', 'nreed@foi.hr', 'korisnici/nreed.jpg'),
(66, 2, 'agreene', '123456', 'Ashley', 'Greene', 'agreene@foi.hr', 'korisnici/agreene.jpg'),
(67, 2, 'zdeschanel', '123456', 'Zooey', 'Deschanel', 'zdeschanel@foi.hr', 'korisnici/zdeschanel.jpg'),
(68, 2, 'dfanning', '123456', 'Dakota', 'Fanning', 'dfanning@foi.hr', 'korisnici/dfanning.jpg'),
(69, 2, 'tlautner', '123456', 'Taylor', 'Lautner', 'tlautner@foi.hr', 'korisnici/tlautner.jpg'),
(70, 2, 'rpattinson', '123456', 'Robert', 'Pattinson', 'rpattinson@foi.hr', 'korisnici/rpattinson.jpg'),
(71, 2, 'Novikorisnik', 'Lozinka12234', 'Novi', 'Korisnik', 'novi.korisnik@gmail.com', 'korisnici/admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sredstva`
--

CREATE TABLE "sredstva" (
  `sredstva_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `valuta_id` int(11) NOT NULL,
  `iznos` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sredstva`
--

INSERT INTO `sredstva` (`sredstva_id`, `korisnik_id`, `valuta_id`, `iznos`) VALUES
(1, 3, 1, 1000),
(2, 3, 2, 411.48316410776),
(3, 3, 3, 2000),
(4, 3, 6, 10000),
(5, 2, 1, 400),
(6, 2, 2, 360),
(7, 2, 4, 300),
(8, 2, 6, 10000),
(9, 4, 1, 100),
(10, 4, 2, 100),
(11, 4, 3, 200),
(12, 4, 6, 100),
(13, 5, 1, 1000),
(14, 5, 2, 1500),
(15, 5, 3, 2000),
(16, 5, 6, 10000),
(17, 5, 5, 1000),
(18, 6, 4, 1500),
(19, 6, 3, 2000),
(20, 6, 6, 10000),
(26, 2, 3, 79.657251882592),
(29, 1, 1, 150),
(35, 1, 2, 50),
(36, 4, 4, 10),
(38, 2, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `tip_korisnika_id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`tip_korisnika_id`, `naziv`) VALUES
(0, 'administrator'),
(1, 'voditelj'),
(2, 'korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `valuta`
--

CREATE TABLE `valuta` (
  `valuta_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `tecaj` double NOT NULL,
  `slika` text NOT NULL,
  `zvuk` text COMMENT '	',
  `aktivno_od` time DEFAULT NULL,
  `aktivno_do` time DEFAULT NULL,
  `datum_azuriranja` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='liga_id';

--
-- Dumping data for table `valuta`
--

INSERT INTO `valuta` (`valuta_id`, `moderator_id`, `naziv`, `tecaj`, `slika`, `zvuk`, `aktivno_od`, `aktivno_do`, `datum_azuriranja`) VALUES
(1, 2, 'EMU - EUR', 7.678376, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/300px-Flag_of_Europe.svg.png', '', '12:00:00', '20:00:00', '2020-08-18'),
(2, 2, 'SAD - USD', 6.686637, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/120px-Flag_of_the_United_States.svg.png', 'http://www.worldnationalanthem.com/wp-content/uploads/2015/05/National-Anthem-Of-The-United-States.mp3', '12:00:00', '14:00:00', '2020-08-14'),
(3, 2, 'Švicarska - CHF', 6.744428, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/120px-Flag_of_Switzerland.svg.png', 'https://www.redringtones.com/wp-content/uploads/2016/08/switzerland-national-anthem.mp3', '10:00:00', '12:00:00', '2020-08-15'),
(4, 2, 'Japan - JPY', 612.43062, 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Flag_of_Japan.svg/120px-Flag_of_Japan.svg.png', 'https://www.redringtones.com/wp-content/uploads/2016/09/japan-national-anthem.mp3', '12:00:00', '14:00:00', '2020-08-17'),
(5, 18, 'Velika Britanija - GBP', 8.601315, 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Flag_of_the_United_Kingdom.svg/120px-Flag_of_the_United_Kingdom.svg.png', '', '12:00:00', '14:00:00', '2020-08-14'),
(6, 2, 'Hrvatska - HRK', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/120px-Flag_of_Croatia.svg.png', '', '10:00:00', '12:00:00', '2020-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `zahtjev`
--

CREATE TABLE `zahtjev` (
  `zahtjev_id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `iznos` decimal(10,0) NOT NULL,
  `prodajem_valuta_id` int(11) NOT NULL,
  `kupujem_valuta_id` int(11) NOT NULL,
  `datum_vrijeme_kreiranja` datetime NOT NULL,
  `prihvacen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='korisnik_korisnik_id';

--
-- Dumping data for table `zahtjev`
--

INSERT INTO `zahtjev` (`zahtjev_id`, `korisnik_id`, `iznos`, `prodajem_valuta_id`, `kupujem_valuta_id`, `datum_vrijeme_kreiranja`, `prihvacen`) VALUES
(1, 3, '100', 1, 6, '2019-08-01 09:30:00', 1),
(2, 3, '200', 1, 6, '2019-08-02 09:30:00', 1),
(3, 3, '1000', 2, 6, '2019-08-03 09:30:00', 1),
(4, 3, '150', 3, 6, '2019-08-04 09:30:00', 1),
(5, 3, '110', 6, 1, '2019-08-05 09:30:00', 1),
(6, 3, '200', 1, 6, '2019-08-06 09:30:00', 0),
(7, 3, '100', 1, 6, '2019-08-07 09:30:00', 1),
(8, 2, '10', 1, 6, '2019-08-01 09:30:00', 1),
(9, 2, '20', 1, 6, '2019-08-02 09:30:00', 1),
(10, 2, '100', 2, 6, '2019-08-03 09:30:00', 0),
(11, 2, '15', 4, 6, '2019-08-04 09:30:00', 0),
(12, 2, '11', 6, 1, '2018-08-05 09:30:00', 1),
(13, 2, '20', 1, 6, '2018-08-06 09:30:00', 0),
(14, 2, '10', 1, 6, '2019-08-07 09:30:00', 1),
(15, 4, '1000', 1, 2, '2018-08-01 09:30:00', 1),
(16, 4, '2000', 1, 3, '2018-08-02 09:30:00', 1),
(17, 4, '1000', 2, 6, '2018-08-03 09:30:00', 0),
(18, 4, '1500', 3, 6, '2018-08-04 09:30:00', 0),
(19, 4, '1100', 6, 2, '2019-08-05 09:30:00', 0),
(20, 4, '2000', 2, 6, '2019-08-06 09:30:00', 0),
(21, 4, '1000', 2, 6, '2019-08-07 09:30:00', 1),
(119, 2, '20', 2, 3, '2020-08-18 17:01:44', 2),
(120, 2, '10', 6, 1, '2020-08-18 17:01:56', 2),
(121, 1, '10', 1, 4, '2020-08-18 17:09:49', 1),
(122, 1, '10', 1, 2, '2020-08-18 17:11:55', 2),
(123, 1, '10', 1, 3, '2020-08-18 17:12:07', 1),
(124, 1, '30', 1, 5, '2020-08-18 18:07:35', 2),
(125, 1, '20', 2, 6, '2020-08-18 18:08:06', 2),
(126, 1, '41', 1, 5, '2020-09-24 19:27:53', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnik_id`),
  ADD KEY `fk_korisnik_tip_korisnika_idx` (`tip_korisnika_id`);

--
-- Indexes for table `sredstva`
--
ALTER TABLE `sredstva`
  ADD PRIMARY KEY (`sredstva_id`),
  ADD KEY `fk_korisnik_has_utakmica_korisnik1_idx` (`korisnik_id`),
  ADD KEY `fk_sredstva_valuta1_idx` (`valuta_id`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`tip_korisnika_id`);

--
-- Indexes for table `valuta`
--
ALTER TABLE `valuta`
  ADD PRIMARY KEY (`valuta_id`),
  ADD KEY `fk_liga_korisnik1_idx` (`moderator_id`);

--
-- Indexes for table `zahtjev`
--
ALTER TABLE `zahtjev`
  ADD PRIMARY KEY (`zahtjev_id`),
  ADD KEY `fk_zahtjev_valuta1_idx` (`prodajem_valuta_id`),
  ADD KEY `fk_zahtjev_valuta2_idx` (`kupujem_valuta_id`),
  ADD KEY `fk_zahtjev_korisnik1_idx` (`korisnik_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `sredstva`
--
ALTER TABLE `sredstva`
  MODIFY `sredstva_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `tip_korisnika_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `valuta`
--
ALTER TABLE `valuta`
  MODIFY `valuta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zahtjev`
--
ALTER TABLE `zahtjev`
  MODIFY `zahtjev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `fk_korisnik_tip_korisnika` FOREIGN KEY (`tip_korisnika_id`) REFERENCES `tip_korisnika` (`tip_korisnika_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sredstva`
--
ALTER TABLE `sredstva`
  ADD CONSTRAINT `fk_korisnik_has_utakmica_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sredstva_valuta1` FOREIGN KEY (`valuta_id`) REFERENCES `valuta` (`valuta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `valuta`
--
ALTER TABLE `valuta`
  ADD CONSTRAINT `fk_liga_korisnik1` FOREIGN KEY (`moderator_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `zahtjev`
--
ALTER TABLE `zahtjev`
  ADD CONSTRAINT `fk_zahtjev_korisnik1` FOREIGN KEY (`korisnik_id`) REFERENCES `korisnik` (`korisnik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_valuta1` FOREIGN KEY (`prodajem_valuta_id`) REFERENCES `valuta` (`valuta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_zahtjev_valuta2` FOREIGN KEY (`kupujem_valuta_id`) REFERENCES `valuta` (`valuta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
