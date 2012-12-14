 <?php
 $stt5 = $db->prepare("SELECT * FROM PERSONAL_SCHEDULE PS 
                          INNER JOIN AM_MEMBER ME 
                          		  ON ME.DEL_FLG = '0'
                                 AND ME.USER_ID = PS.USER_ID
                               WHERE PS.DEL_FLG = '0'
                                 AND ME.USER_ID = :userid 
                                 AND PS.YEAR = :year  
                                 AND PS.MONTH = :month
                                 AND PS.DAY = :day
                            ORDER BY PS.DAY");
 ?>