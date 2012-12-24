 <?php
$hours = $six + $seven + $eight + $nine + $ten + $eleven + $twelve + 
			$thirteen + $fourteen + $fifteen + $sixteen + $seventeen + $eighteen +
			 $nineteen + $twenty + $twentyone + $twentytwo + $twentythree + $zero + $one;
$comcd = $_SESSION['comcd'];
$bracd = $_SESSION['bracd'];
$userid = $_SESSION['userid'];
$usercd = $_POST['nameselect'];
$insertuserid = $comcd.$bracd.$usercd;
$stmt = $db->prepare("INSERT INTO WORK_SCHEDULE 
 								  (DEL_FLG, 
 								   USER_ID,
 								   SCHEDULE_DATE,
 								   HOURS, 
 								   SIX, 
 								   SEVEN, 
 								   EIGHT, 
 								   NINE, 
 								   TEN, 
 								   ELEVEN, 
 								   TWELVE, 
 								   THIRTEEN, 
 								   FOURTEEN, 
 								   FIFTEEN, 
 								   SIXTEEN, 
 								   SEVENTEEN, 
 								   EIGHTEEN, 
 								   NINETEEN, 
 								   TWENTY, 
 								   TWENTY_ONE, 
 								   TWENTY_TWO, 
 								   TWENTY_THREE, 
 								   ZERO, 
 								   ONE, 
 								   ADD_USER_ID, 
 								   ADD_TIMESTAMP, 
 								   UPD_USER_ID, 
 								   UPD_TIMESTAMP)
 						   VALUES ('0',
 						   	       :userid,
 						   	       :scheduledate,
 						   	       :hours,
 						   	       :six,
 						   	       :seven,
 						   	       :eight,
 						   	       :nine,
 						   	       :ten,
 						   	       :eleven,
 						   	       :twelve,
 						   	       :thirteen,
 						   	       :fourteen,
 						   	       :fifteen,
 						   	       :sixteen,
 						   	       :seventeen,
 						   	       :eighteen,
 						   	       :nineteen,
 						   	       :twenty,
 						   	       :twentyone,
 						   	       :twentytwo,
 						   	       :twentythree,
 						   	       :zero,
 						   	       :one,
 						   	       :adduserid,
 						   	       CURRENT_TIMESTAMP,
 						   	       :upduserid,
 						   	       CURRENT_TIMESTAMP)");
 $stmt->bindValue(':userid', $insertuserid);
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
 $stmt->bindValue(':adduserid', $userid);
 $stmt->bindValue(':upduserid', $userid);
 $flag = $stmt->execute();
  
if ($flag) {
	$messagelist[] = "データは正しく登録できました。";
} else {
	$messagelist[] = "データは正しく登録できませんでした。";
}

 ?>