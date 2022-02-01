-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2021 at 10:47 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `philomena2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `afspraak`
--

CREATE TABLE `afspraak` (
  `id` int(11) NOT NULL,
  `tijd` time NOT NULL,
  `datum` date NOT NULL,
  `status` varchar(14) NOT NULL,
  `klantID` int(11) NOT NULL,
  `medID` int(11) NOT NULL,
  `behandelingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `afspraak`
--

INSERT INTO `afspraak` (`id`, `tijd`, `datum`, `status`, `klantID`, `medID`, `behandelingID`) VALUES
(1, '12:30:00', '2021-06-04', '1', 1, 6, 1),
(2, '10:30:00', '2021-07-06', '0', 1, 6, 1),
(3, '11:30:00', '2021-07-06', '0', 1, 1, 1),
(4, '16:00:00', '2021-06-14', '1', 4, 3, 2),
(5, '16:30:00', '2021-06-15', '0', 1, 1, 3),
(6, '16:30:00', '2021-06-15', '0', 3, 1, 3),
(7, '16:30:00', '2021-06-15', '0', 1, 1, 3),
(8, '16:30:00', '2021-06-15', '0', 2, 1, 3),
(9, '15:30:00', '2021-06-17', '1', 1, 6, 3),
(10, '12:30:00', '2021-06-15', '0', 2, 1, 23),
(11, '16:30:00', '2021-07-24', '0', 1, 1, 16),
(12, '13:30:00', '2021-06-23', '0', 3, 1, 28),
(13, '11:00:00', '2021-07-24', '0', 6, 1, 22);

-- --------------------------------------------------------

--
-- Table structure for table `behandeling`
--

CREATE TABLE `behandeling` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `categorie` varchar(144) NOT NULL,
  `type` varchar(10) NOT NULL,
  `prijs` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `behandeling`
--

INSERT INTO `behandeling` (`id`, `naam`, `categorie`, `type`, `prijs`) VALUES
(1, 'Naturel : Gel /powergel / acryl', 'nieuwe set', 'nagels', '50.00'),
(2, 'French manicure : gel / powergel/ acryll', 'nieuwe set', 'nagels', '55.00'),
(3, 'Gelpolish : gel/powergel/acryl', 'nieuwe set', 'nagels', '57.50'),
(4, 'Naturel: gel / powergel/ acryl', 'nabehandeling', 'nagels', '32.50'),
(5, 'French manicure: gel/powergel/acryl ', 'nabehandeling', 'nagels', '35.00'),
(6, 'Gelpolish: gel/powergel/acryl', 'nabehandeling', 'nagels', '37.50'),
(15, 'Kunstnagels verwijderen', 'nabehandeling', 'nagels', '30.00'),
(16, 'Gel op natuurlijke nagels', 'nabehandeling', 'nagels', '25.00'),
(17, 'Manicure 30 min', 'handen', 'nagels', '25.00'),
(18, 'Gelpolish op natuurlijke nagels', 'handen', 'nagels', '17.50'),
(19, 'Manicure incl. gelpolish', 'handen', 'nagels', '25.00'),
(20, 'Wpa pedicure: eelt verwijderen en verzorging 30 min.', 'voeten', 'nagels', '27.00'),
(21, 'Gelpolish op tenen nagels ', 'voeten', 'nagels', '25.00'),
(22, 'Gel met French manicure op teen nagels', 'voeten', 'nagels', '35.00'),
(23, 'Spa pedicure incl. Gelpolish', 'voeten', 'nagels', '40.00'),
(24, 'Knippen', 'Dames', 'haar', '25.00'),
(25, 'Knippen / drogen / zonder product', 'Dames', 'haar', '28.00'),
(26, 'Knippen / modelleren', 'Dames', 'haar', '32.00'),
(27, 'Wassen / knippen', 'Dames', 'haar', '28.00'),
(28, 'Wassen / knippen / drogen / zonder product', 'Dames', 'haar', '31.00'),
(29, 'Wassen / knippen / modelleren', 'Dames', 'haar', '35.00'),
(30, 'Knippen', 'Heren', 'haar', '25.00'),
(31, 'Wassen/Knippen', 'Heren', 'haar', '27.50'),
(32, 'Knippen', 'Kinderen tm 11 jaar', 'haar', '18.50'),
(33, 'Wassen / knippen', 'Kinderen tm 11 jaar', 'haar', '21.50'),
(34, 'Wassen / knippen / drogen', 'Kinderen tm 11 jaar', 'haar', '24.50'),
(35, 'Knippen', 'Kinderen 12 t/m 15 jaar', 'haar', '21.50'),
(36, 'Wassen / knippen', 'Kinderen 12 t/m 15 jaar', 'haar', '23.50'),
(37, 'Wassen / knippen / drogen', 'Kinderen 12 t/m 15 jaar', 'haar', '26.50');

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `straat` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `woonplaats` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`ID`, `voornaam`, `achternaam`, `straat`, `postcode`, `woonplaats`, `email`, `wachtwoord`) VALUES
(1, 'Thor', 'Odinson', 'Midgardlane 3', '1234AB', 'Asgard', 'thor@mail.com', '$2y$10$9V0REBpNeHw6zAv/PmlMxuUYq7QjVBejkAIZ51heA3bhCjgvLXWWS'),
(2, 'Diana', 'Prince', 'Amazonnelaan', '4444XE', 'Gouda', 'wonderwoman@mail.com', '$2y$10$Zuolr5to287AA2oWK6FVhuc./ZiuHORmHkb6eWz1RBIxPVyd1R0oq'),
(3, 'Sanne', 'Bergsluis', 'Boogschutterstraat', '2805 TE', 'Rotterdam', 'sanny@mail.com', '$2y$10$ggXmMnmc5r4DpNRx.fU8s.9kjmpfZ08Fl1HgpByBgIH1rNOvqiK9S'),
(4, 'Linde', 'de Maas', 'Steenbokstraat', '2805 TR', 'Rotterdam', 'linny@mail.com', '$2y$10$YRxey7rVmV5Vg584yFzkeurQYXA8Prexb7upOxSWtx3MkUkO0NENC'),
(5, 'Fleur', 'Reemer', 'Dordtselaan', '3333AB', 'Gouda', 'ikbenfleur@mail.com', '$2y$10$rXkA3WfXcwhrOPZctdrkDuIzPDic801tcsPG3y1y9KBSooeG3COZ.'),
(6, 'Natasha', 'Romanova', 'Zwartespinnenlaan', '2020RP', 'Amsterdam', 'blackwidow@mail.com', '$2y$10$uaBjww3Y0ocE26ZwBwgNru8RfuWpZZM//9RNvbdr09rgADM9dH6Hy');

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wachtwoord` varchar(100) NOT NULL,
  `functie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`id`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `functie`) VALUES
(1, 'Phil', 'Omena', 'philomena@mail.com', '$2y$10$9V0REBpNeHw6zAv/PmlMxuUYq7QjVBejkAIZ51heA3bhCjgvLXWWS', 'eind baas'),
(2, 'Kimberly', 'Kaptein', 'kimmy@mail.com', '$2y$10$9V0REBpNeHw6zAv/PmlMxuUYq7QjVBejkAIZ51heA3bhCjgvLXWWS', 'kapper'),
(3, 'Kevin', 'Franken', 'kapper@mail.com', '$2y$10$9V0REBpNeHw6zAv/PmlMxuUYq7QjVBejkAIZ51heA3bhCjgvLXWWS', 'kapper'),
(6, 'Melvin', 'Grutjes', 'info@kapper.com', '$2y$10$9V0REBpNeHw6zAv/PmlMxuUYq7QjVBejkAIZ51heA3bhCjgvLXWWS', 'stylist'),
(7, 'Kevin', 'Franken', 'info@kapper.com', '$2y$10$9V0REBpNeHw6zAv/PmlMxuUYq7QjVBejkAIZ51heA3bhCjgvLXWWS', 'stylist');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afspraak`
--
ALTER TABLE `afspraak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `behandeling`
--
ALTER TABLE `behandeling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afspraak`
--
ALTER TABLE `afspraak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `behandeling`
--
ALTER TABLE `behandeling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
