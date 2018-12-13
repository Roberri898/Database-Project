CREATE TABLE `Landlord` (
  `Landlord_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Landlord_FirstName` text(30) default NULL,
  `Landlord_LastName` text(30) default NULL,
  `Landlord_DOB` text(30) default NULL,
  
  PRIMARY KEY (`Landlord_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Landlord` (`Landlord_FirstName`,`Landlord_LastName`,`Landlord_DOB`) VALUES
("Jason","Broddy","1-5-1990"),
("Jack","Morison","2-5-1991"),
("Bob","Baxter","10-7-1980");


CREATE TABLE `Tenant` (
  `Tenant_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Tenant_FirstName` text(30) default NULL,
  `Tenant_LastName` text(30) default NULL,
  `Tenant_Age` int unsigned default 1,
  `Tenant_Gender` bit default 0 /* 0 for Male, 1 for Female*/,
  
  PRIMARY KEY (`Tenant_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Tenant` (`Tenant_FirstName`,`Tenant_LastName`,`Tenant_Age`,`Tenant_Gender`) VALUES
("Khonjin","House",20,0),
("Robert","Rob",18,0),
("Albert","Babs",21,0),
("Vickie","Santiago",32,1),
("Aljana","Wahat",31,1),
("Frank","Thompson",31,1),
("Bill","Wilson",34,1),
("Thomas","Guzman",38,1);

CREATE TABLE `Lease` (
  `Lease_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Lease_StartDay` int unsigned default 1,
  `Lease_StartMonth` int unsigned default 1,
  `Lease_StartYear` int unsigned default 2000,
  `Lease_Duration` int unsigned default 1,
  `Lease_EndDay` int unsigned default 1,
  `Lease_EndMonth` int unsigned default 1,
  `Lease_EndYear` int unsigned default 2001,
  
  PRIMARY KEY (`Lease_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Lease` (`Lease_StartDay`,`Lease_StartMonth`,`Lease_StartYear`,`Lease_Duration`,`Lease_EndDay`,`Lease_EndMonth`,`Lease_EndYear`) VALUES
(3,2,2019,365,3,2,2020),
(4,2,2019,365,4,2,2020),
(5,2,2019,365,5,2,2020),
(6,2,2019,365,6,2,2020),
(7,2,2019,365,7,2,2020);

CREATE TABLE `Features` (
  `Features_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Features_SquareFootage` int unsigned default 1,
  `Features_Bedrooms` int unsigned default 1,
  `Features_Bathrooms` int unsigned default 1,
  `Features_Pool` int unsigned default 0,
  `Features_Amenities` int unsigned default 1,

  PRIMARY KEY (`Features_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Features` (`Features_SquareFootage`,`Features_Bedrooms`,`Features_Bathrooms`,`Features_Pool`,`Features_Amenities`) VALUES
(50,2,1,0,3),
(50,2,1,0,3),
(25,1,1,0,4),
(50,2,1,1,6),
(70,4,2,1,10);


CREATE TABLE `Apartment` (
  `Apartment_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Apartment_Street` text(30) default NULL,
  `Apartment_Number` mediumint(8) unsigned default NULL,
  `Apartment_StreetNumber` mediumint(8) unsigned default 1000,
  `Apartment_City` text(30) default NULL,
  `Apartment_State` text(30) default NULL,
  `Apartment_County` text(30) default NULL,
  `Apartment_ApartmentPrice` decimal(65,2) default NULL,
  `Apartment_Occupied` bit default 0 /* 0 means unoccupied, 1 means occupied*/,

  PRIMARY KEY (`Apartment_ID`)
) AUTO_INCREMENT=1;


INSERT INTO `Apartment` (`Apartment_Street`,`Apartment_Number`,`Apartment_StreetNumber`,`Apartment_City`,
`Apartment_State`,`Apartment_County`,`Apartment_ApartmentPrice`,`Apartment_Occupied`) VALUES
("San Jackson", 2555, 10, "Mission", "Texas", "Hidalgo", 100.00, 0),
("San Jackson", 2556, 10, "Mission", "Texas", "Hidalgo", 100.00, 1),
("San Jackson", 2557, 10, "Mission", "Texas", "Hidalgo", 200.00, 0),
("San Jackson", 2558, 10, "Mission", "Texas", "Hidalgo", 300.00, 1),
("San Jackson", 2559, 10, "Mission", "Texas", "Hidalgo", 500.00, 0);

CREATE TABLE `Payment` (
  `Payment_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Payment_Amount` decimal(65,2) default 0,
  `Payment_Day` int unsigned default 1,
  `Payment_Month` int unsigned default 1,
  `Payment_Year` int unsigned default 2000,
  `Payment_Late` bit default 0 /*0 for not late, 1 for late*/,

  PRIMARY KEY (`Payment_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Payment` (`Payment_Amount`,`Payment_Day`,`Payment_Month`,`Payment_Year`,`Payment_Late`) VALUES
(5000, 4,4,2019,0),
(3340, 6,4,2018,1),
(4000, 7,2,2019,0),
(1298, 10,5,2018,1),
(1300, 6,4,2018,1),
(1320, 7,2,2019,0),
(5030, 10,5,2018,1),
(5432, 6,4,2018,1),
(5123, 7,2,2019,0),
(5034, 10,5,2018,1),
(5678, 6,4,2018,1),
(9687, 7,2,2019,0),
(2305, 10,5,2018,1),
(12346, 4,4,2019,0);

CREATE TABLE `Complaint` (
  `Complaint_Number` int,
  `Complaint_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Complaint_Issue` text default NULL,
  `Complaint_Day` int unsigned default 1,
  `Complaint_Month` int unsigned default 1,
  `Complaint_Year` int unsigned default 2000,
  `Complaint_Resolved` bit default 0 /* 0 for unresolved, 1 to resolved*/,

  PRIMARY KEY (`Complaint_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Complaint` (`Complaint_Number`,`Complaint_Issue`,`Complaint_Day`,`Complaint_Month`,`Complaint_Year`,`Complaint_Resolved`) VALUES
(0,"There's this angry red little girl walking inside the pool and now the pool has evaporated. Think you can get rid of her?", 5,6,2018,1);

CREATE TABLE `Maintainance` (
  `Maintenance_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Maintenance_Day` int unsigned default 1,
  `Maintenance_Month` int unsigned default 1,
  `Maintenance_Year` int unsigned default 2000,
  `Maintenance_Reason` text(30) default NULL,
  `Maintenance_Maintained` bit default 0 /* 0 for maintained, 1 for under maintenance*/,
  
  PRIMARY KEY (`Maintenance_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Maintainance` (`Maintenance_Day`,`Maintenance_Month`,`Maintenance_Year`,`Maintenance_Reason`,`Maintenance_Maintained`) VALUES
(6,6,2018,"Water Leakage at bathroom.",1),
(5,8,2018,"Removed the red girl. Yeah we don't know why she's there.",1),
(10,21,2018,"Hole in the wall.",0),
(11,2,2018,"Electrical outlet broken.",0),
(10,3,2018,"Plumage.",1);

CREATE TABLE `Utilities` (
  `Utilities_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Utilities_Month` int unsigned default 1,
  `Utilities_WaterPrice` decimal(65,2) default 0,
  `Utilities_WaterUsage` decimal(65,2) default 1,
  `Utilities_ElectrcityPrice` decimal(65,2) default 0,
  `Utilities_ElectrcityUsage` decimal(65,2) default 1,

  PRIMARY KEY (`Utilities_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Utilities` (`Utilities_Month`, `Utilities_WaterPrice`, `Utilities_WaterUsage`, `Utilities_ElectrcityPrice`, `Utilities_ElectrcityUsage`) VALUES
(10,45.00,5,50.50,50),
(10,45.00,5,50.50,50),
(10,90.00,10,202.00,200),
(10,45.00,5,50.50,50),
(10,45.00,5,50.50,50);


CREATE TABLE `Rent` (
  `Rent_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `Rent_Amount` decimal(65,2) default 0,
  `Rent_DueDay` int unsigned default 1,
  `Rent_DueMonth` int unsigned default 1,
  `Rent_DueYear` int unsigned Default 2000,
  `Rent_Paid` decimal(65,2) default 0,
  `Rent_Late` bit default 0 /*0 for not late, 1 for late */,

  PRIMARY KEY (`Rent_ID`)
) AUTO_INCREMENT=1;

INSERT INTO `Rent` (`Rent_Amount`,`Rent_DueDay`,`Rent_DueMonth`,`Rent_DueYear`,`Rent_Paid`,`Rent_Late`) VALUES
(500.00,12,1,2018,500.00,0),
(500.00,10,1,2018,200.00,1);


CREATE TABLE `Renting`  (
  `Tenant_ID` mediumint(8) unsigned default NULL,
  `Apartment_ID` mediumint(8) unsigned default NULL
);

INSERT INTO `Renting` (`Tenant_ID`,`Apartment_ID`) VALUES
(4,4);


CREATE TABLE `Pays` (
  `Payment_ID` mediumint(8) unsigned default NULL,
  `Tenant_ID` mediumint(8) unsigned default NULL
);

INSERT INTO `Pays` (`Tenant_ID`,`Payment_ID`) VALUES
(4,6),
(4,3),
(4,7),
(4,2);


CREATE TABLE `Lan_Ten` (
  `Landlord_ID` mediumint(8) unsigned default NULL,
  `Tenant_ID` mediumint(8) unsigned default NULL
);

INSERT INTO `Lan_Ten` (`Landlord_ID`, `Tenant_ID`) VALUES 
(1,2),
(1,4);






