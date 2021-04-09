CREATE DATABASE 3dPrintShop;

use 3dPrintShop;

CREATE TABLE `Colour` (
  `Colour` varchar(50),
  `Amount` int,
  PRIMARY KEY (`Colour`)
);

INSERT INTO Colour VALUES ("Red", 100);
INSERT INTO Colour VALUES ("Blue", 100);
INSERT INTO Colour VALUES ("Yellow", 100);

CREATE TABLE `Discount` (
  `DiscountCode` VARCHAR(30),
  `ExpiryDate` date,
  `BeginDate` date,
  `Percentage` int,
  PRIMARY KEY (`DiscountCode`)
);

INSERT INTO `Discount` VALUES ("freemoney", "2010-10-10", "2010-05-10", "10");

CREATE TABLE `Shipping` (
  `ShippingType` VARCHAR(30) NOT NULL,
  `CostAddition` VARCHAR(30),
  PRIMARY KEY (`ShippingType`)
);

INSERT INTO `Shipping` VALUES ("Van", "10");

CREATE TABLE `Model` (
  `ModelID` int NOT NULL AUTO_INCREMENT,
  `ModelName` varchar(50),
  `ModelImage` varchar(100),
  `Category` varchar(50),
  `Size` varchar(2),
  `Infill` varchar(50),
  `Colour` varchar(50),
  `Cost` float,
  PRIMARY KEY (`ModelID`),
  FOREIGN KEY (`Colour`) REFERENCES `Colour`(Colour)
);

INSERT INTO Model (`ModelName`, `ModelImage`, `Size`,`Infill`, `Colour`,`Cost`) VALUES ("Earrings", "erraings", "L", "square", "red", 50);
INSERT INTO Model (`ModelName`, `ModelImage`, `Size`,`Infill`, `Colour`,`Cost`) VALUES ("Nintendo", "nintendo", "L", "square", "red", 400);
INSERT INTO Model (`ModelName`, `ModelImage`, `Size`,`Infill`, `Colour`,`Cost`) VALUES ("Headphone stand", "headphone_stand", "L", "square", "red", "50");
INSERT INTO Model (`ModelName`, `ModelImage`, `Size`,`Infill`, `Colour`,`Cost`) VALUES ("KeyChain", "key_chain", "L", "square", "red", "50");


CREATE TABLE `Account` (
  `AccountID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) UNIQUE,
  `Password` varchar(50),
  `FirstName` varchar(50),
  `LastName` varchar(50),
  `Address` varchar(50),
  `City` varchar(50),
  `PostalCode` varchar(6),
  `Phone` varchar(10),
  `isAdmin` bool,
  PRIMARY KEY (`AccountID`)
);

INSERT INTO `Account` (`Email`, `Password`, `FirstName`, `LastName`, `Address`, `City`, `PostalCode`, `Phone`, `isAdmin`) 
   VALUES ("username@email.com", "password", "User", "Name", "10 street", "place", "a0a0a0", "1112223344", true);

CREATE TABLE `Order` (
  `OrderID` int NOT NULL AUTO_INCREMENT,
  `AccountID` int,
  `RecipientName` varchar(100), 
  `PhoneNumber` varchar(20),
  `ShippingInstructions` varchar(100),
  `ShipDate` datetime,
  `ShipAddress` varchar(100),
  `ShippingType` varchar(50) null,
  `DiscountCode` varchar(50) null,
  `ifPaymentConfirmed` bool default false,
  `TotalCost` float default 0,
  `DeliveryCost` float default 0,
  `Tax` float default 0,
  `Type` varchar(50),
  `CardNumber` varchar(20),
  `ExpiryDate` varchar(5),
  PRIMARY KEY (`OrderID`),
  FOREIGN KEY (AccountID) REFERENCES Account(AccountID)
);

INSERT INTO `Order` (AccountId, RecipientName, PhoneNumber, ShippingInstructions, ShipDate, ShipAddress, ShippingType, ifPaymentConfirmed, TotalCost, DeliveryCost, Tax, `Type`, CardNumber, ExpiryDate)
VALUES ("1", "User", "1112223344", "leave at door", CURRENT_TIMESTAMP, "10 street", "ship", false, 100, 6,13,"debit", "1111", "03/24");

CREATE TABLE `OrderItem` (
 `OrderItemID` int NOT NULL AUTO_INCREMENT,
 `OrderID` int,
 `ModelID` int,
 `Quantity` int,
 PRIMARY KEY (`OrderItemID`),
 FOREIGN KEY (OrderID) REFERENCES `Order`(OrderID),
 FOREIGN KEY (ModelID) REFERENCES `Model`(ModelID)
);

CREATE TABLE `Cart` (
  `CartID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(50),
  `ModelID` int,
  `Quantity` int,
  `Cost` float,
  PRIMARY KEY (`CartID`),
  FOREIGN KEY (`ModelID`) REFERENCES Model(ModelID),
  FOREIGN KEY (`Email`) REFERENCES Account(Email)
);

-- change modelId before run
INSERT INTO `Cart` (ModelID, Quantity)VALUES (1, 1);
INSERT INTO `Cart` (ModelID, Quantity)VALUES (2, 2);

CREATE TABLE `Report` (
  `ReportType` varchar(50),
  `Message` varchar(150)
);

-- File Upload
CREATE TABLE `File` (
    `FileID` int NOT NULL AUTO_INCREMENT,
    `FileName` varchar(256) unique not null,
    `FileCreatedDate` datetime default CURRENT_TIMESTAMP not null,
    `FileData` varchar(100),
    `AccountID` int,
    PRIMARY KEY (`FileID`),
    FOREIGN KEY (`AccountID`) REFERENCES Account(`AccountID`)
);

insert into File (FileName, FileData, AccountID) values ('name', 'png', 1);
