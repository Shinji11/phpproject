 <?php
 
$editdate = explode("/", $_POST["editdate"]);
$day = $editdate[1];
$userid = $_SESSION['userid'];
$six = $_POST['cb6'];
$seven = $_POST['cb7'];
$eight = $_POST['cb8'];
$nine = $_POST['cb9'];
$ten = $_POST['cb10'];
$eleven = $_POST['cb11'];
$twelve = $_POST['cb12'];
$thirteen = $_POST['cb13'];
$fourteen = $_POST['cb14'];
$fifteen = $_POST['cb15'];
$sixteen = $_POST['cb16'];
$seventeen = $_POST['cb17'];
$eighteen = $_POST['cb18'];
$nineteen = $_POST['cb19'];
$twenty = $_POST['cb20'];
$twentyone = $_POST['cb21'];
$twentytwo = $_POST['cb22'];
$twentythree = $_POST['cb23'];
$zero = $_POST['cb24'];
$one = $_POST['cb25'];

$stmt = $db->prepare("UPDATE PERSONAL_SCHEDULE 
 							  SET SIX = :six 
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
 						     WHERE USER_ID = :userid 
 							   AND YEAR = :year 
 							   AND MONTH = :month 
 							   AND DAY = :day");
 $stmt->bindValue(':userid', $userid);
 $stmt->bindValue(':year', $year);
 $stmt->bindValue(':month', $month);
 $stmt->bindValue(':day', $day);
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
	$messagelist[] = "データは正しく更新できました。";
} else {
	$messagelist[] = "データは正しく更新できませんでした。";
}

 ?>