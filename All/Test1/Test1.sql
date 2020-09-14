
--
-- Table structure for table `Animals`
--
Create database Test1;
use Test1;
CREATE TABLE `Animals` (
  `Cage_No` int(11) NOT NULL,
  `Animal_ID` varchar(6) NOT NULL,
  `Animal_Nick` varchar(30) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Animal_ClassID` varchar(6) NOT NULL,
  `Animal_age` int(3) NOT NULL,
  `Animal_weight` int(4) NOT NULL
);

--
-- Dumping data for table `Animals`
--

INSERT INTO `Animals` (`Cage_No`, `Animal_ID`, `Animal_Nick`, `Gender`, `Animal_ClassID`,`Animal_age`,`Animal_weight`) VALUES
(2, '001CNN', 'Browny  The Dog', 'M', 'CNN001',15,10),
(7, '001DLP', 'Manny The Dolphin', 'M', 'DLP001',10,78),
(6, '001EGL', 'Lawin The Eagle', 'M', 'EGL001',6,8),
(4, '001GRF', 'Arthur The Giraffe', 'M', 'GRF001',16,305),
(5, '001KPT', 'Whitney The Dove', 'F', 'DOV001',4,1),
(1, '001LIO', 'Leo The Lion', 'M', 'LIO001',24,275),
(3, '001MKY', 'Berta The Monkey', 'F', 'MKY001',12,10),
(8, '001SRK', 'Sharky The Shark', 'M', 'SRK001',7,127);

-- --------------------------------------------------------

--
-- Table structure for table `Animal_Class`
--

CREATE TABLE `Animal_Class` (
  `Animal_ClassID` varchar(6) NOT NULL,
  `Family_Name` varchar(30) NOT NULL,
  `Species_Name` varchar(30) NOT NULL,
  `Animal_color` varchar(15) NOT NULL,
  `Sfc_name` varchar(30) NOT NULL
);

--
-- Dumping data for table `Animal_Class`
--

INSERT INTO `Animal_Class` (`Animal_ClassID`, `Family_Name`, `Species_Name`,`Animal_color`,`Sfc_name`) VALUES
('CNN001', 'Dog', 'Domesticated Bulldog','Black','Canislupus familiaris'),
('DLP001', 'Dolphin', 'Blowhole Dolphin','Blue','Delphinus'),
('DOV001', 'Dove', 'Philippine White Dove','White','colombidae'),
('EGL001', 'Eagle', 'Philippine Eagle','Brown','Haliaeetus leucocephalus'),
('GRF001', 'Giraffe', 'Extra-Legged Giraffe','Brown','Giraffa camelopardalis'),
('LIO001', 'Lion', 'Golden Lion','Ash brown','Panthera leo'),
('MKY001', 'Monkey', 'Philippine Brown Monkey','Black','Macaca Fascicularis'),
('SRK001', 'Shark', 'Great White Shark','Light blue','Selachimorpha');

-- --------------------------------------------------------

--
-- Table structure for table `Cage`
--

CREATE TABLE `Cage` (
  `Station_ID` varchar(30) NOT NULL,
  `Cage_No` int(11) NOT NULL,
  `Cage_Type` varchar(30) NOT NULL,
  `Cage_size` varchar(15) NOT NULL,
  `Cage_material` varchar(15) Not NULL
);

--
-- Dumping data for table `Cage`
--

INSERT INTO `Cage` (`Station_ID`, `Cage_No`, `Cage_Type`,`Cage_size`,`Cage_material`) VALUES
('TER001', 1, 'Lion''s Den','Big','Iron'),
('TER001', 2, 'Dog Cage','Medium','Wood'),
('JNG001', 3, 'Extra Swing Set Cage','Medium','Metal'),
('JNG001', 4, 'High Gate Cage','Medium','Metal'),
('AVR001', 5, 'Dove Lane','Small','Steel'),
('AVR001', 6, 'Eagle Farm','medium','Iron'),
('AQU001', 7, 'Dolphin Tank','Big','Glass'),
('AQU001', 8, 'Shark Tank X2','Big','Glass'),
('JNG001', 9, 'Jungle Maternity Ward','Big','Metal Net'),
('AQU001', 10, 'Bangus Net','Medium','Iron net');

-- --------------------------------------------------------

--
-- Table structure for table `Shift_Assignment`
--

CREATE TABLE `Shift_Assignment` (
  `Shift_ID` int(11) NOT NULL,
  `Staff_ID` varchar(6) NOT NULL,
  `Station_ID` varchar(6) NOT NULL,
  `StartTime` int(11) NOT NULL,
  `EndTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Shift_Assignment`
--

INSERT INTO `Shift_Assignment` (`Shift_ID`, `Staff_ID`, `Station_ID`, `StartTime`, `EndTime`) VALUES
(1, 'SCH001', 'AQU001', 600, 1200),
(2, 'SMG001', 'AQU001', 600, 1200),
(3, 'SVT001', 'AQU001', 600, 1200),
(4, 'SCT001', 'AQU001', 600, 1200),
(5, 'SCH001', 'AQU001', 1200, 1800),
(6, 'SMG001', 'AQU001', 1200, 1800),
(7, 'SVT001', 'AQU001', 1200, 1800),
(8, 'SCT001', 'AQU001', 1200, 1800),
(9, 'SCH002', 'AVR001', 600, 1200),
(10, 'SMG002', 'AVR001', 600, 1200),
(11, 'SVT002', 'AVR001', 600, 1200),
(12, 'SCT002', 'AVR001', 600, 1200),
(13, 'SCH002', 'AVR001', 1200, 1800),
(14, 'SMG002', 'AVR001', 1200, 1800),
(15, 'SVT002', 'AVR001', 1200, 1800),
(16, 'SCT002', 'AVR001', 1200, 1800),
(17, 'SCH003', 'JNG001', 600, 1200),
(18, 'SMG003', 'JNG001', 600, 1200),
(19, 'SVT003', 'JNG001', 600, 1200),
(20, 'SCT003', 'JNG001', 600, 1200),
(21, 'SCH003', 'JNG001', 1200, 1800),
(22, 'SMG003', 'JNG001', 1200, 1800),
(23, 'SVT003', 'JNG001', 1200, 1800),
(24, 'SCT003', 'JNG001', 1200, 1800),
(25, 'SCH004', 'TER001', 600, 1200),
(26, 'SMG004', 'TER001', 600, 1200),
(27, 'SVT004', 'TER001', 600, 1200),
(28, 'SCT004', 'TER001', 600, 1200),
(29, 'SCH004', 'TER001', 1200, 1800),
(30, 'SMG004', 'TER001', 1200, 1800),
(31, 'SVT004', 'TER001', 1200, 1800),
(32, 'SCT004', 'TER001', 1200, 1800),
(33, 'SCT004', 'AQU001', 730, 1900);

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `Staff_ID` varchar(6) NOT NULL,
  `Staff_Name` varchar(30) NOT NULL,
  `Staff_Type` varchar(30) NOT NULL,
  `Staff_adress` Varchar(30) NOT NULL,
  `Staff_pno` Varchar(15) NOT NULL  
);

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Staff_ID`, `Staff_Name`, `Staff_Type`,`Staff_adress`,`Staff_pno`) VALUES
('SCH001', 'Dave Consejo', 'Cashier','Shimoga','9030604578'),
('SCH002', 'Lana Sendo', 'Cashier','Tirtahalli','8565952536'),
('SCH003', 'Lissandra Tores', 'Cashier','Agumbe','6958253645'),
('SCH004', 'Macy Solomon', 'Cashier','Tumkur','9030457895'),
('SCT001', 'Mary Calamba', 'Caretaker','Bidar','7896548975'),
('SCT002', 'Amigo Perez', 'Caretaker','Mysore','8989785826'),
('SCT003', 'Ness Calamay', 'Caretaker','Bangalore','9865321478'),
('SCT004', 'Viktor Lazer', 'Caretaker','Mangalore','7896598745'),
('SMG001', 'Joshua Diko', 'Manager','Udupi','9865321478'),
('SMG002', 'Elliot Campos', 'Manager','Karkala','8899559858'),
('SMG003', 'Grace Uy', 'Manager','Chikmagalore','7090963258'),
('SMG004', 'Darius Aquino', 'Manager','Badami','9480065035'),
('SVT001', 'Jane Malacca', 'Veterinarian','Kerala','9565969623'),
('SVT002', 'X Davide', 'Veterinarian','Yadagiri','6969695656'),
('SVT003', 'Jane Choi', 'Veterinarian','Chikkodi','6090307895'),
('SVT004', 'Teemo Daquis', 'Veterinarian','Sagara','8030607895');

-- --------------------------------------------------------

--
-- Table structure for table `Station`
--

CREATE TABLE `Station` (
  `Station_ID` varchar(6) NOT NULL,
  `Station_Name` varchar(30) NOT NULL,
  `Start_time`   Varchar(10) NOT NULL,
  `End_time`  Varchar(10) NOT NULL
);

--
-- Dumping data for table `Station`
--

INSERT INTO `Station` (`Station_ID`, `Station_Name`,`Start_time`,`End_time`) VALUES
('AQU001', 'Sea Water Park','9 AM','6 PM'),
('AVR001', 'Aviary Center','7 AM','7 PM'),
('JNG001', 'Jungle EcoPark','8 AM','6 PM'),
('TER001', 'Terra Station','9 AM','5 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Animals`
--
ALTER TABLE `Animals`
  ADD PRIMARY KEY (`Animal_ID`),
  ADD KEY `Animal_ClassID` (`Animal_ClassID`),
  ADD KEY `Cage_No` (`Cage_No`);

--
-- Indexes for table `Animal_Class`
--
ALTER TABLE `Animal_Class`
  ADD PRIMARY KEY (`Animal_ClassID`) USING BTREE,
  ADD UNIQUE KEY `Animal_ClassID` (`Animal_ClassID`);

--
-- Indexes for table `Cage`
--
ALTER TABLE `Cage`
  ADD PRIMARY KEY (`Cage_No`),
  ADD KEY `Station_ID` (`Station_ID`);

--
-- Indexes for table `Shift_Assignment`
--
ALTER TABLE `Shift_Assignment`
  ADD PRIMARY KEY (`Shift_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `Station_ID` (`Station_ID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`Station_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cage`
--
ALTER TABLE `Cage`
  MODIFY `Cage_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Shift_Assignment`
--
ALTER TABLE `Shift_Assignment`
  MODIFY `Shift_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Animals`
--
ALTER TABLE `Animals`
  ADD CONSTRAINT `Animals_ibfk_1` FOREIGN KEY (`Animal_ClassID`) REFERENCES `Animal_Class` (`Animal_ClassID`),
  ADD CONSTRAINT `Animals_ibfk_2` FOREIGN KEY (`Cage_No`) REFERENCES `Cage` (`Cage_No`),
  ADD CONSTRAINT `Animals_ibfk_3` FOREIGN KEY (`Animal_ClassID`) REFERENCES `Animal_Class` (`Animal_ClassID`),
  ADD CONSTRAINT `Animals_ibfk_4` FOREIGN KEY (`Cage_No`) REFERENCES `Cage` (`Cage_No`);

--
-- Constraints for table `Cage`
--
ALTER TABLE `Cage`
  ADD CONSTRAINT `Cage_ibfk_1` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`),
  ADD CONSTRAINT `Cage_ibfk_2` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`);

--
-- Constraints for table `Shift_Assignment`
--
ALTER TABLE `Shift_Assignment`
  ADD CONSTRAINT `Shift_Assignment_ibfk_11` FOREIGN KEY (`Staff_ID`) REFERENCES `Staff` (`Staff_ID`),
  ADD CONSTRAINT `Shift_Assignment_ibfk_22` FOREIGN KEY (`Staff_ID`) REFERENCES `Staff` (`Staff_ID`),
  ADD CONSTRAINT `Shift_Assignment_ibfk_33` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`),
  ADD CONSTRAINT `Shift_Assignment_ibfk_44` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
