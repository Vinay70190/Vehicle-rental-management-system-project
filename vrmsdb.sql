-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 06:34 AM
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
-- Database: `vrmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8989898911, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-04-01 01:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingcar`
--

CREATE TABLE `tblbookingcar` (
  `ID` int(10) NOT NULL,
  `VehicleID` varchar(20) DEFAULT NULL,
  `Userid` varchar(20) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Location` mediumtext DEFAULT NULL,
  `BookingDate` varchar(120) DEFAULT NULL,
  `ReturnDate` varchar(120) DEFAULT NULL,
  `BookingNumber` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `TotalCost` varchar(120) DEFAULT NULL,
  `Remark` varchar(120) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbookingcar`
--

INSERT INTO `tblbookingcar` (`ID`, `VehicleID`, `Userid`, `FullName`, `Email`, `MobileNumber`, `Location`, `BookingDate`, `ReturnDate`, `BookingNumber`, `CreationDate`, `TotalCost`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, '1', '7', 'Anuj  kumar', 'anc@test.com', 1234567809, 'gaur City Noida 201301', '2024-05-25', '2024-05-30', '854828421', '2024-05-18 03:17:28', '2500', 'Request approved.', 'Approved', '2024-05-18 03:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookingtwowheeler`
--

CREATE TABLE `tblbookingtwowheeler` (
  `ID` int(10) NOT NULL,
  `VehicleID` varchar(20) DEFAULT NULL,
  `Userid` varchar(20) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Location` mediumtext DEFAULT NULL,
  `BookingDate` varchar(120) DEFAULT NULL,
  `ReturnDate` varchar(120) DEFAULT NULL,
  `BookingNumber` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `TotalCost` varchar(120) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(120) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbookingtwowheeler`
--

INSERT INTO `tblbookingtwowheeler` (`ID`, `VehicleID`, `Userid`, `FullName`, `Email`, `MobileNumber`, `Location`, `BookingDate`, `ReturnDate`, `BookingNumber`, `CreationDate`, `TotalCost`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, '2', '7', 'Anuj  kumar', 'anc@test.com', 1234567809, 'River Hiegts Socitert Ghaziabad', '2024-05-20', '2024-05-21', '390328090', '2024-05-18 03:18:08', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `ID` int(10) NOT NULL,
  `BrandName` varchar(200) DEFAULT NULL,
  `BrandLogo` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`ID`, `BrandName`, `BrandLogo`, `CreationDate`) VALUES
(1, 'Honda', '55ccf27d26d7b23839986b6ae2e447ab.jpg', '2024-04-02 00:30:11'),
(2, 'Kinectic', '41b586905e6233e72b076191f8bf9512.png', '2024-04-02 00:30:11'),
(3, 'Bajaj', '7fdc1a630c238af0815181f9faa190f5.jpg', '2024-04-02 00:30:11'),
(4, 'Yamaha', '5c642ec854a6a92a56d7ebf0b9648eea.jpg', '2024-04-02 00:30:11'),
(5, 'TVS', 'c26be60cfd1ba40772b5ac48b95ab19b.png', '2024-04-02 00:30:11'),
(6, 'Mahindra', 'b64810fde7027715e614449aff1d595f.png', '2024-04-02 00:30:11'),
(7, 'Hyundai', '37e2b52f19da778fba43ab3c1897f840.png', '2024-04-02 00:30:11'),
(8, 'Renault', 'e76de47f621d84adbab3266e3239baee.png', '2024-04-02 00:30:11'),
(9, 'Volvo', '2d99ae9e904f880eef8feb4e61882b79.jpg', '2024-04-02 00:30:11'),
(10, 'Skoda', '4389d9b5e3ba297410a11afc0b8e101b.png', '2024-04-02 00:30:11'),
(11, 'Maruti Suzuki', '1f868f31d7bb9b00f86cad27759faf95.png', '2024-04-02 00:30:11'),
(12, 'Fiat', 'e9db84d0e11b5c26723e9951e4f7204b.jpg', '2024-04-02 00:30:11'),
(13, 'Toyoto', '2122001dca390ac45fd38a57fa8c51ea.png', '2024-04-02 00:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL,
  `UpdateDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `UpdateDate`) VALUES
(1, 'Two Wheeler', '2024-04-03 05:48:40'),
(2, 'Four Wheeler', '2024-04-03 05:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About Us', 'Vehicle Rental is a self-drive brand owned XYZ second-largest self-drive vehicle rental company currently managing more than 63,000 vehicles in our fleet in India. With&nbsp;<span style=\"display: inline !important;\">Vehicle Rental,</span>&nbsp;we endeavor to provide Indian users the Best in World Japanese service and technology at Indian prices.&nbsp;<span style=\"display: inline !important;\">Vehicle Rental is</span>&nbsp;currently present in 13 Indian cities including Bangalore, Pune, Mumbai, Delhi-NCR, Hyderabad, Chennai, Kolkata, Jaipur, Indore, Chandigarh, Ahmedabad, Surat and Vadodara.', NULL, NULL, '2024-04-05 00:59:28'),
(2, 'contactus', 'Contact Us', '#890 CFG Apartment, Mayur Vihar, Delhi-India', 'info@gmail.com', 8988858699, '2024-04-05 00:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(120) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(1, 'Rishi', 'Bhardwaj', 'rishi@gmail.com', 5646545645, '202cb962ac59075b964b07152d234b70', '2024-04-10 01:43:47'),
(2, 'Meenakashi', 'Singh', 'singh@gmail.com', 9878775464, '202cb962ac59075b964b07152d234b70', '2024-04-11 01:46:30'),
(3, 'Devesh', 'Gupta', 'devesh@gmail.com', 5656565656, '202cb962ac59075b964b07152d234b70', '2024-04-12 01:47:00'),
(4, 'Abir', 'Malhotra', 'abir@gmail.com', 2556444557, '202cb962ac59075b964b07152d234b70', '2024-04-12 01:47:35'),
(5, 'Perth', 'Kaushal', 'perth@gmail.com', 3232565690, '202cb962ac59075b964b07152d234b70', '2024-04-15 01:48:10'),
(6, 'Shagun', 'Mishra', 'shagun@gmail.com', 7897978798, '202cb962ac59075b964b07152d234b70', '2024-05-01 07:18:28'),
(7, 'Anuj', ' kumar', 'anc@test.com', 1234567809, 'f925916e2754e5e03f75dd58a5733251', '2024-05-09 23:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicle`
--

CREATE TABLE `tblvehicle` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `BrandName` varchar(50) DEFAULT NULL,
  `VehicleName` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `RentalPrice` varchar(120) DEFAULT NULL,
  `VehicleModel` varchar(120) DEFAULT NULL,
  `VehicleDescription` mediumtext DEFAULT NULL,
  `SeatingCapacity` int(10) NOT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Image1` varchar(200) DEFAULT NULL,
  `Image2` varchar(200) DEFAULT NULL,
  `Image3` varchar(200) DEFAULT NULL,
  `Image4` varchar(200) DEFAULT NULL,
  `Image5` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehicle`
--

INSERT INTO `tblvehicle` (`ID`, `CategoryName`, `BrandName`, `VehicleName`, `RegistrationNumber`, `RentalPrice`, `VehicleModel`, `VehicleDescription`, `SeatingCapacity`, `Image`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `CreationDate`) VALUES
(1, 'Two Wheeler', 'Yamaha', 'Yamaha YZF R15 V3', 'DEL-5676', '500', '2018', '\"\"The YZF-R15 changed the 150cc segment in the Indian market the way the CBZ did when it was launched. It was an everyday motorcycle that could genuinely be used as a trackday tool. The second version of the R15 traded practicality for more focused performance, but the advent of the KTM RC200 meant that a far better performance was available for the sportbike enthusiast at a similar price. The R15 Version 3.0 reduces that gap significantly with technology. On the list is an engine with a few more ccs, but featuring variable valve timing which takes the maximum power output to nearly 19bhp with a nominal decrease in torque which is now spread over a wider rev range. It also gets all-LED lamps and an all-digital LCD instrument cluster that displays a wealth of information, including when the Variable Valve Actuation switches to the different camshaft profile.\"\"', 2, 'af457c29a6bce1b40f45386173b51064.jpg', 'efc1a80c391be252d7d777a437f868701568817086.jpg', 'cff8ad28cf40ebf4fbdd383fe546098d1568817086.jpg', '19c10f4e66067da4b5eb1dac874e46721568817086.jpg', '74375080377499ab76dad37484ee7f151568817086.jpg', 'b9fb9d37bdf15a699bc071ce49baea531568817086.jpg', '2024-04-20 03:24:28'),
(2, 'Two Wheeler', 'Honda', 'Honda Activa 5G', 'DEL-7676876', '200', '2018', 'The very popular Honda Activa 5G received a major update at the Auto Expo 2018 in February, and now the company has listed the scooter on its website at a starting price of Rs 52,460 (ex-showroom) for the standard variant and Rs 54,325 (ex-showroom) for the Deluxe variant. Bookings were already underway for the Activa 5G since it was unveiled in February. The 2018 Honda Activa 5G comes with subtle changes to its design with all-LED headlamp with a position lamp along with new color options and minor changes to its styling. The mechanics of the Activa 5G, however, remains the same.', 2, '31bc5410ae14c6f60a47e9edd913b4d7.jpg', '941e62e1e18f45f7a4108c7bc692bc9e.jpg', 'e0ac3c5d2c5bcd60234e29de9477328e1568868021.jpg', '553d1f568dcda350727b015978f2456e1568868021.jpg', 'f490adaea0d324c2fc638b4162af61291568868021.jpg', 'fbd8be3d214221f1a4394fbfac8064ca1568868021.jpg', '2024-04-20 03:24:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehiclecar`
--

CREATE TABLE `tblvehiclecar` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `BrandName` varchar(120) DEFAULT NULL,
  `VehicleName` varchar(200) DEFAULT NULL,
  `RegistrationNumber` varchar(100) DEFAULT NULL,
  `RentalPrice` varchar(50) DEFAULT NULL,
  `VehicleModel` varchar(50) DEFAULT NULL,
  `VehicleDescription` mediumtext DEFAULT NULL,
  `SeatingCapacity` int(10) DEFAULT NULL,
  `Class` varchar(50) DEFAULT NULL,
  `Fuel` varchar(50) DEFAULT NULL,
  `Doors` varchar(50) DEFAULT NULL,
  `GearBox` varchar(50) DEFAULT NULL,
  `AirCondition` varchar(50) DEFAULT NULL,
  `ABS` varchar(50) DEFAULT NULL,
  `AirBags` varchar(50) DEFAULT NULL,
  `Bluetooth` varchar(50) DEFAULT NULL,
  `CarKit` varchar(50) DEFAULT NULL,
  `GPS` varchar(50) DEFAULT NULL,
  `Music` varchar(50) DEFAULT NULL,
  `CenterLocking` varchar(50) DEFAULT NULL,
  `Image` varchar(120) DEFAULT NULL,
  `Image1` varchar(120) DEFAULT NULL,
  `Image2` varchar(120) DEFAULT NULL,
  `Image3` varchar(120) DEFAULT NULL,
  `Image4` varchar(120) DEFAULT NULL,
  `Image5` varchar(120) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblvehiclecar`
--

INSERT INTO `tblvehiclecar` (`ID`, `CategoryName`, `BrandName`, `VehicleName`, `RegistrationNumber`, `RentalPrice`, `VehicleModel`, `VehicleDescription`, `SeatingCapacity`, `Class`, `Fuel`, `Doors`, `GearBox`, `AirCondition`, `ABS`, `AirBags`, `Bluetooth`, `CarKit`, `GPS`, `Music`, `CenterLocking`, `Image`, `Image1`, `Image2`, `Image3`, `Image4`, `Image5`, `CreationDate`) VALUES
(1, 'Four Wheeler', 'Hyundai', 'Hyundai Elite i20', 'Del-7889', '500', '2019', '\"Popular Korean car manufacturer, Hyundai has updated the Elite i20 range in India. The premium hatchback is available in four variants - Era, Magna Plus, Sportz Plus and Asta (O). The latest model continues to be powered by existing petrol and diesel engine options while changes are limited to cosmetic upgrades.  The Hyundai Elite i20 competes against the Maruti Suzuki Baleno, the Honda Jazz and the Volkswagen Polo in the premium hatchback segment in the Indian car market.\"', 5, 'Compact', 'Petrol and Diesel', '5', 'Manual and Automatic (CVT)', 'No', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '85521b836186ca3632770483a48a10db.jpg', '85521b836186ca3632770483a48a10db.jpg', '1fbf40517cdc7517629e1b62e15f0b161568964746.jpg', 'dab1051b997261c9f130a15c2bc6fe8f1568964746.jpg', 'fc6c1f4a82dc3123554208854de80ffa1568964746.gif', '91d295aa31f046a4aeb48704d6b94a1c1568964746.jpg', '2024-04-21 02:02:26'),
(2, 'Four Wheeler', 'Renault', 'Renault Kwid', 'Del-78907', '600', '2019', 'The entry-level product from Renault India, the Kwid, is available at an extremely competitive price and offers a good blend of practicality and efficiency. Named after the concept car that was shown at the 2014 Auto Expo, the Kwid finds itsâ€™ underpinnings on the Renaultâ€™s CMFA platform and is being produced at their Chennai factory.', 5, 'Compact', 'Petrol', '5', 'Manual and AMT', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '63c5ee8e7434754583cb02196d07ad141568965368.jpg', '938077061daafd39ed8fb52ae810f2311568965368.jpg', '938077061daafd39ed8fb52ae810f2311568965368.jpg', '1ff95e755485face77a49fe8e09a3d161568965368.jpg', '012228c710a8fc6500c92a7369d639a41568965368.jpg', '63c5ee8e7434754583cb02196d07ad141568965368.jpg', '2024-04-22 02:12:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `tblbookingcar`
--
ALTER TABLE `tblbookingcar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbookingtwowheeler`
--
ALTER TABLE `tblbookingtwowheeler`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BrandName` (`BrandName`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehiclecar`
--
ALTER TABLE `tblvehiclecar`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbookingcar`
--
ALTER TABLE `tblbookingcar`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbookingtwowheeler`
--
ALTER TABLE `tblbookingtwowheeler`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblvehicle`
--
ALTER TABLE `tblvehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblvehiclecar`
--
ALTER TABLE `tblvehiclecar`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
