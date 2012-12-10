$comcd = $_POST["comcd"];
  $bracd = $_POST["bracd"];
  $usercd = $_POST["comid"];
  $userid = $comcd.$bracd.$usercd;
  if (isset($_POST["lastnm"]) === true) {
  	$sql1 = $db->prepare('INSERT INTO AM_MEMBER 
  	                                ( DEL_FLG,
  	                              	  COM_CD,
  	                              	  BRA_CD,
  	                              	  AUTHORITY_CD,
  	                              	  USER_CD,
  	                              	  USER_ID,
  	                              	  LAST_NM,
  	                              	  FIRST_NM,
  	                              	  PASSWORD,
  	                              	  SEX_CD,
  	                              	  ADD_USER_ID,
  	                              	  ADD_TIMESTAMP,
  	                              	  UPD_USER_ID,
  	                              	  UPD_TIMESTAMP )
  							 VALUES ( "0",
  							    	  :comcd,
  							    	  :bracd,
  							    	  :authority,
  							    	  :usercd,
  							    	  ;userid,
  							    	  :lastnm,
  							    	  :firstnm,
  							    	  :password,
  							    	  :sexcd,
  							    	  :userid,
  							    	  CURRENT_TIMESTAMP,
  							    	  :userid,
  							    	  CURRENT_TIMESTAMP ');
	$sql1->bindValue(':comcd', $comcd);
	$sql1->bindValue(':bracd', $bracd);
	$sql1->bindValue(':authority', $_POST["authority"]);
	$sql1->bindValue(':usercd', $usercd);
	$sql1->bindValue(':userid', $userid);
	$sql1->bindValue(':lastnm', $_POST["lastnm"]);
	$sql1->bindValue(':firstnm', $_POST["firstnm"]);
	$sql1->bindValue(':password', $_POST["password"]);
	$sql1->bindValue(':sexcd', $_POST["sexcd"]);
	$sql1->bindValue(':userid', $_SESSION["userid"]);
  	$flag1 = $sql1->execute();

  if (isset($_POST['comcd']) === true) {
  	$sql2 = $db->prepare('INSERT INTO AM_COM 
  	                                ( DEL_FLG,
  	                              	  COM_CD,
  	                              	  COM_NM,
  	                              	  BRA_CD,
  	                              	  BRA_NM,
  	                              	  ADD_USER_ID,
  	                              	  ADD_TIMESTAMP,
  	                              	  UPD_USER_ID,
  	                              	  UPD_TIMESTAMP )
  							 VALUES ( "0",
  							    	  :comcd,
  							    	  :comnm,
  							    	  :bracd,
  							    	  :branm,
  							    	  :adduserid,
  							    	  CURRENT_TIMESTAMP,
  							    	  :upduserid,
  							    	  CURRENT_TIMESTAMP ');
	$sql2->bindValue(':comcd', $comcd);
	$sql2->bindValue(':comnm', $_POST["comnm"]);
	$sql2->bindValue(':bracd', $bracd);
	$sql2->bindValue(':branm', $_POST["branm"]);
	$sql2->bindValue(':adduserid', $_SESSION["userid"]);
	$sql2->bindValue(':upduserid', $_SESSION["userid"]);
  	$flag2 = $sql2->execute();
  	if ($flag1 && $flag2) {
  		$message = 'マスターにデータを追加しました';
  		print '<FONT COLOR="white">'.$message.'</FONT>';
  	} else {
  		$message = 'データの追加に失敗しました';
  		print '<FONT COLOR="white">'.$message.'</FONT>';
  	}
  	}
  } else {
  	$message = 'データに空が存在します。';
  	print '<FONT COLOR="white">'.$message.'</FONT>';
  }