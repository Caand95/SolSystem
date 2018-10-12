CREATE DATABASE PlanetDB;

USE PlanetDB;
CREATE TABLE PlanetType (
​    Name VARCHAR(100),
​	PRIMARY KEY (Name)
);
​	
USE PlanetDB;
CREATE TABLE CelestialElement (
​    Name VARCHAR(100),
​    Description TEXT,
​    ImagePath VARCHAR(100),
​	PRIMARY KEY (Name)
);

USE PlanetDB;
CREATE TABLE Planet (
​    Name VARCHAR(100),
​    Description TEXT,
​    ImagePath VARCHAR(100),
​    HexColor VARCHAR(100),
​    KmDiameter INT(10) UNSIGNED,
​    SunDistance DECIMAL(8,2),
​	OrbitalPeriodDays SMALLINT UNSIGNED,
​    Mass DECIMAL(9,4),
​	Temperature SMALLINT,
​    MoonCount SMALLINT UNSIGNED,
​    HasRings TINYINT(1),
​    PlanetType VARCHAR(100),
​	PRIMARY KEY (Name),
​    FOREIGN KEY (PlanetType) REFERENCES PlanetType(Name)
);

CREATE PROCEDURE GetPlanets()
​	SELECT * FROM Planet;

CREATE PROCEDURE GetCelestialElements()
​	SELECT * FROM CelestialElement;

DELIMITER //
CREATE PROCEDURE GetPlanet(IN PlanetName VARCHAR(100))
 BEGIN
 Select * FROM Planet WHERE Name = PlanetName;
 END //
DELIMITER;

DELIMITER //
CREATE PROCEDURE GetCelestialElement(IN GetCelestialElementName VARCHAR(100))
 BEGIN
 Select * FROM CelestialElement WHERE Name = GetCelestialElementName;
 END //
DELIMITER;



INSERT INTO `planettype` VALUES ('Terrestrial');
INSERT INTO `planettype` VALUES ('Gas');
INSERT INTO `planettype` VALUES ('Ice');
INSERT INTO `planettype` VALUES ('Giant');



INSERT INTO Planet VALUES ('Jorden','Jorden er den tredje planet i solsystemet regnet fra Solen og har den største diameter, masse og tæthed af jordplaneterne. Jorden benævnes også Verden, (Jord)kloden og Tellus efter en romersk gudinde eller Terra efter dens latinske betegnelse.','C:\Users\zbcchdin2\Documents\GitHub\SolSystem\Doc\ImageWeb','#3eba1f',12756,149.6,365,5.97,15,1,0,'Terrestrial');

INSERT INTO Planet VALUES ('Merkur','Merkur er planeten tættest på Solen og den mindste planet i
Solsystemet, med en omløbstid om Solen på 87,969 dage. Merkurs kredsløb har
den største excentricitet af alle Solsystemets planeter og den mindste
aksehældning.','C:\Users\zbcchdin2\Documents\GitHub\SolSystem\Doc\ImageWeb','#f7bd4a',4879,57.9,88,0.330,167,0,0,'Terrestrial');

INSERT INTO Planet VALUES ('Venus','**Venus** er planet nr. to i vores solsystem, talt fra Solen. Den omtales ofte som Jordens søsterplanet, idet Jorden og Venus har
omtrent samme størrelse og masse.','C:\Users\zbcchdin2\Documents\GitHub\SolSystem\Doc\ImageWeb','#f7834a',12104,108.2,224.7,4.87,464,0,0,'Terrestrial');