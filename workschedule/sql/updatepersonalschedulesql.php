 <?php

$editdate = explode("/", $_POST["editdate"]);
$day = $editdate[1];
$userid = $_SESSION["userid"];
$updatenum = $_POST["updatenum"];

for ($i = 1; $i < $updatenum; $i++) {
$rowdate = explode("/", $_POST["editrowdate".$i]);
$rowday = $rowdate[1];
$six = $_POST["cb".$i."16"];
$seven = $_POST["cb".$i."17"];
$eight = $_POST["cb".$i."18"];
$nine = $_POST["cb".$i."19"];
$ten = $_POST["cb".$i."20"];
$eleven = $_POST["cb".$i."21"];
$twelve = $_POST["cb".$i."22"];
$thirteen = $_POST["cb".$i."23"];
$fourteen = $_POST["cb".$i."24"];
$fifteen = $_POST["cb".$i."25"];
$sixteen = $_POST["cb".$i."26"];
$seventeen = $_POST["cb".$i."27"];
$eighteen = $_POST["cb".$i."28"];
$nineteen = $_POST["cb".$i."29"];
$twenty = $_POST["cb".$i."30"];
$twentyone = $_POST["cb".$i."31"];
$twentytwo = $_POST["cb".$i."32"];
$twentythree = $_POST["cb".$i."33"];
$zero = $_POST["cb".$i."34"];
$one = $_POST["cb".$i."35"];

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
 $stmt->bindValue(':day', $rowday);
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

}
if ($flag) {
	$messagelist[] = "データは正しく更新できました。";
} else {
	$messagelist[] = "データは正しく更新できませんでした。";
}

 ?>