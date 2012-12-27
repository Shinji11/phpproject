 <?php
$comcd = $_SESSION['comcd'];
$bracd = $_SESSION['bracd'];
$updatenum = $_POST["updatenum"];

for ($i = 1; $i < $updatenum; $i++) {
	$editusercd = $_POST["usercd".$i];
	$edituserid = $comcd.$bracd.$editusercd;
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
	$hours = 0;
	if ($six == 1) {
		$hours++;
	}
	if($seven == 1) {
		$hours++;
	}
	if($eight == 1) {
		$hours++;
	}
	if($nine == 1) {
		$hours++;
	}
	if($ten == 1) {
		$hours++;
	}
	if($eleven == 1) {
		$hours++;
	}
	if($twelve == 1) {
		$hours++;
	}
	if($thirteen == 1) {
		$hours++;
	}
	if($fourteen == 1) {
		$hours++;
	}
	if($fifteen == 1) {
		$hours++;
	}
	if($sixteen == 1) {
		$hours++;
	}
	if($seventeen == 1) {
		$hours++;
	}
	if($eighteen == 1) {
		$hours++;
	}
	if($nineteen == 1) {
		$hours++;
	}
	if($twenty == 1) {
		$hours++;
	}
	if($twentyone == 1) {
		$hours++;
	}
	if($twentytwo == 1) {
		$hours++;
	}
	if($twentythree == 1) {
		$hours++;
	}
	if($zero == 1) {
		$hours++;
	}
	if($one == 1) {
		$hours++;
	}

	if ($hours == 0) {
		$messagelist[] = "空行が存在します。削除するデータがある場合はまずDELETEボタンで消去して下さい。";
		break;
	} else {

$stmt = $db->prepare("UPDATE WORK_SCHEDULE
 							    SET HOURS = :hours
 							      , SIX = :six
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
	}
}
if(count($messagelist) == 0) {
	if ($flag) {
		$messagelist[] = "データは正しく更新されました。";
	} else {
		$messagelist[] = "データは正しく更新できませんでした。";
	}
}
 ?>