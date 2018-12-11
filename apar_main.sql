CREATE TABLE `Apar_Main` (
  `AM_ID` mediumint(8) unsigned NOT NULL auto_increment,
  `AM_A`  mediumint(8) unsigned default NULL,
  `AM_M`  mediumint(8) unsigned default NULL,
  
  PRIMARY KEY (`AM_ID`)
) AUTO_INCREMENT=1;

INSERT INTO Apar_Main (AM_M, AM_A) 
SELECT F.Features_ID, M.Maintenance_ID 
FROM Features as F, Maintainance as M
WHERE F.Features_ID = M.Maintenance_ID;


