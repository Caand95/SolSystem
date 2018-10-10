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