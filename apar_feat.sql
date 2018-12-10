CREATE TABLE `Apar_Feat` (
  `FA_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `FA_A`  mediumint(8) unsigned default NULL,
  `FA_F`  mediumint(8) unsigned default NULL,
  
  PRIMARY KEY (`FA_ID`)
) AUTO_INCREMENT=1;

INSERT INTO Apar_Feat (FA_F, FA_A) 
SELECT F.Features_ID, A.Apartment_ID 
FROM Features as F, Apartment as A
WHERE F.Features_ID = A.Apartment_ID;


