 <?php
$stmt = $db->prepare("UPDATE AM_MEMBER 
 							    SET AUTHORITY_CD = :authoritycd
 							      , USER_CD = :usercd
 							      , SIX = : 
 								  , SEVEN = :seven 
 								  , EIGHT = :eight 
 								  , NINE = :nine 
 								  , TEN = :ten 
 								  , ELEVEN = :eleven 
 								  , TWELVE = :twelve 
 								  , THIRTEEN = :thirteen
 								  , FOURTEEN = :fourteen 
 								  , FIFTEEN = :fifteen 
 								  , SIXTEEN = :sixteen
 								  , SEVENTEEN = :seventeen
 								  , EIGHTEEN = :eighteen 
 								  , NINETEEN = :nineteen
 								  , TWENTY = :twenty 
 								  , TWENTY_ONE = :twentyone 
 								  , TWENTY_TWO = :twentytwo 
 								  , TWENTY_THREE = :twentythree
 								  , ZERO = :zero
 								  , ONE = :one 
 								  , UPD_USER_ID = :upduserid 
 								  , UPD_TIMESTAMP = CURRENT_TIMESTAMP
 						     WHERE DEL_FLG = '0'
 						       AND USER_ID = :edituserid 
 							   AND SCHEDULE_DATE = :scheduledate");
 $stmt->bindValue(':edituserid', $edituserid);
 $stmt->bindValue(':scheduledate', $scheduledate);
 $stmt->bindValue(':hours', $hours);
 $stmt->bindValue(':six', $six);
 $stmt->bindValue(':seven', $seven);
 $stmt->bindValue(':eight', $eight);
 $stmt->bindValue(':nine', $nine);
 $stmt->bindValue(':ten', $ten);
 $stmt->bindValue(':eleven', $eleven); 
 $stmt->bindValue(':twelve', $twelve);
 $stmt->bindValue(':thirteen', $thirteen); 
 $stmt->bindValue(':fourteen', $fourteen);
 $stmt->bindValue(':fifteen', $fifteen);
 $stmt->bindValue(':sixteen', $sixteen);
 $stmt->bindValue(':seventeen', $seventeen);
 $stmt->bindValue(':eighteen', $eighteen);
 $stmt->bindValue(':nineteen', $nineteen);
 $stmt->bindValue(':twenty', $twenty);
 $stmt->bindValue(':twentyone', $twentyone);
 $stmt->bindValue(':twentytwo', $twentytwo);
 $stmt->bindValue(':twentythree', $twentythree);
 $stmt->bindValue(':zero', $zero);
 $stmt->bindValue(':one', $one);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();
  
	if ($flag) {
		$message = "データは正しく更新されました。";
	} else {
		$message = "データは正しく更新できませんでした。";
	}
}
 ?>