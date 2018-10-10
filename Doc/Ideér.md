# Afsluttende projekt

## Idé-generering.

Vi har snakket om at have disse elementer ind over vores projekt.

![](.\billeder\43476120_247507859281397_2510296328815247360_n.jpg)

| Krav                    | Miljø / Produkt                   |
| ----------------------- | --------------------------------- |
| HTML, CSS, JS           | PHP Til DB forbindelse            |
| Xampp                   | JS, JQuery til animations styring |
| Målgruppe( Børn )       | Bootstrap til CSS                 |
| Mysql                   | Repository Patterns               |
| Navigation over 3 sider | MVC                               |
| Dagslog                 |                                   |

## Views og deres teoretiske functionaliteter

### Oversigt 

> *SolSystem* oversigt med mulighed for at trykke på en planet, for at gå over til **Info** skærmen.

* Zoom for *Mouse-over* på *elementer*.
* Mulighed for at lave *elementer* der drejer rundt om sig solen.

### Info

> *Hjulv-spinner* i toppen, med en infobox i bunden med information over *Elementet*.
> Med *back-knap* til **Oversigten**

* *Spinner*-navigation ved pile ( med animation ).
* Navigation ved tryk på *element*.

### Space - Wiki

> Tekstbaseret oversigt med information omkring abstracte elementer, hvor der skal være billede i højre samt en informationsbox og en menu i højre efter elementer alfabetisk

## Resten af Sitets functionalitet.

![](.\billeder\Overview.png)

### View 1 - Solsystem Oversigt



### View 2 - Solsystem Info



### View 3 - Wikipedia

## Planeter info til Database

![](.\billeder\info af planeter.png)

### Stored Procedure

#### view 1

``Select * from planets``

#### view 2

``select * from planets where planet.name = something``

#### view 3 

``select * from celestrialElements``

``select * from celestrialElements where celestrialelemets.name = something Else``

## Classes

View klasser har Dependency injection af Planets

​	