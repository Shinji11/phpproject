 <?php
 $stt3 = $db->prepare("SELECT * FROM PERSONAL_SCHEDULE PS 
                          INNER JOIN AM_MEMBER ME 
                          		  ON ME.DEL_FLG = '0'
                                 AND ME.USER_ID = PS.USER_ID
                               WHERE PS.DEL_FLG = '0'
                                 AND ME.USER_ID = :userid 
                                 AND ME.COM_CD = :comcd 
                                 AND ME.BRA_CD = :bracd
                                 AND PS.YEAR = :year  
                                 AND PS.MONTH = :month 
                            ORDER BY PS.DAY");
 ?>