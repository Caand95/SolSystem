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

create table Planetfacts(
    ID int(10) auto_increment,
    Name varchar(100),
    Fact varchar(1000),
    primary key(ID),
    foreign key (Name) references Planet(Name)
);

create procedure GetPlanetFacts()
    select * from Planetfacts;

delimiter //
Create procedure GetPlanetFactByName(In PlanetName varchar(100))
    begin
        select * from PlanetFacts where name = planetName
    end //
delimiter ;

delimiter //
create procedure GetPlanetFactByID(in FactID int(10))
    begin
        select * from PlanetFacts where id =FactID
    end //
delimiter ;

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

INSERT INTO Planet VALUES ('Mars','Mars er den fjerde planet i Solsystemet talt fra Solen, og naboplanet til vores egen planet Jorden. Som Jorden har Mars en atmosfære, om end denne er ganske tynd og næsten udelukkende består af kuldioxid. Mars kaldes også den røde planet på grund af sin karakteristiske farve.',NULL,'#dd5252',6792,227.9,687,0.642,-65,2,0,'Terrestrial');

INSERT INTO Planet VALUES ('Jupiter','Jupiter is the fifth planet from the Sun and the largest in the Solar System. It is a giant planet with a mass one-thousandth that of the Sun, but two-and-a-half times that of all the other planets in the Solar System combined. Jupiter and Saturn are gas giants; the other two giant planets, Uranus and Neptune, are ice giants. Jupiter has been known to astronomers since antiquity. The Romans named it after their god Jupiter. When viewed from Earth, Jupiter can reach an apparent magnitude of −2.94, bright enough for its reflected light to cast shadows, and making it on average the third-brightest natural object in the night sky after the Moon and Venus.',NULL,'#e2daa1',142984,778.6,4331,1898,-110,67,1,'Gas');

INSERT INTO Planet VALUES ('Saturn','Saturn er den sjette planet fra solen i vores solsystem. Det er den næststørste planet i solsystemet efter Jupiter. Saturn kendes på sine markante ringe, som består af utallige små is- og stenpartikler. Tidligere mente man, at dette ringsystem var noget enestående for Saturn, men det har senere vist sig at både Jupiter, Uranus og Neptun har tilsvarende, men langtfra så markante ringsystemer. Ved planetens nordlige pol befinder sig et fænomen kaldt Saturns heksagon.',NULL,'#f4e64b',120536,1433.5,10747,568,-140,62,1,'Gas');

INSERT INTO Planet VALUES ('Uranus','Uranus er den syvende planet fra Solen i Solsystemet og var den første planet der blev opdaget i historisk tid. William Herschel opdagede d. 13. marts 1781 en tåget klat, som han først troede var en fjern komet. I slutningen af 1781 konkluderede han at himmellegemet bevægede sig i en planetbane[2]. Uranus er en gasplanet og er, målt på diameteren, solsystemets tredjestørste planet efter Jupiter og Saturn. Uranus er opkaldt efter Jupiters morfar og farfar Uranos.',NULL,'#76e2bc',5118,2872.5,30589,86.8,-195,27,1,'Ice');

INSERT INTO Planet VALUES ('Neptun','Neptun er den ottende planet i vores solsystem. Den er den fjerdestørste målt efter diameter og den tredjestørste efter masse. Neptuns masse er 17 gange så stor som jordens og en lille smule større end dens nærmest beslægtede i solsystemet, Uranus, der er 14 jordmasser. Neptun er dog en lille smule mindre end Uranus pga. en højere densitet. Planeten er opkaldt efter Jupiters storebroder; havguden Neptunus (Poseidon). Neptuns astronomiske symbol (♆, Unicode U+2646) er en stiliseret udgave af Poseidons trefork.',NULL,'#6799ea',49528,4495.1,59.8,102,-200,14,1,'Ice');

INSERT INTO Planet VALUES ('Pluto','Pluto er en dværgplanet beliggende i Kuiperbæltet i udkanten af vores solsystem. Den er opkaldt efter Pluton, den romerske gud for dødsriget, svarende til Hades i den græske mytologi.',NULL,'#8793a5',2370,5906.4,90.56,0.0146,-225,5,0,'Terrestrial');