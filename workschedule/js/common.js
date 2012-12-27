function hidden() {
	for(var i = 6; i < 26; i = i +1) {
		document.getElementById("cb" + i).style.display = "none";
	}
}

function changeCheckbox(cb, bt, flg) {
	var checkbox = document.getElementById(cb);
	var button = document.getElementById(bt);
 	if (checkbox.checked) {
 		checkbox.checked = false;
 		button.style.backgroundColor = "transparent";
 	} else {
 		checkbox.checked = true;
 		if (flg == 1) {
 			button.style.backgroundColor = "yellow";
 		} else {
 			button.style.backgroundColor = "tomato";
	 	}
 	}
 }

function allChange() {
	for(var i = 6; i < 26; i = i +1) {
		var checkbox = document.getElementById("cb" + i);
		var button = document.getElementById("bt" + i);
		checkbox.checked = true;
 		button.style.backgroundColor = "tomato";
	}
}

function allClear() {
	for(var i = 6; i < 26; i = i +1) {
		var checkbox = document.getElementById("cb" + i);
		var button = document.getElementById("bt" + i);
		checkbox.checked = false;
 		button.style.backgroundColor = "transparent";
	}
}

function checkDelete() {

	if (window.confirm('本当に削除されますか？')) {
		sqlflg.value = flg;
		return true;
	} else {
		window.alert('キャンセルされました');
		return false;
	}
}

function changeEditColor(data, num, flg) {
	if (data == 1) {
		var checkbox = document.getElementById("cb" + num);
		var button = document.getElementById("bt" + num);
		checkbox.checked = true;
		if (flg == 1) {
			button.style.backgroundColor = "yellow";
		} else {
		button.style.backgroundColor = "tomato";
		}
	}
}

function hiddenCheckBox(num) {
		document.getElementById("cb" + num).style.display = "none";
}

//personalはここまで

function checkUpdateSchedule(flg) {
	var count = 0;
	for(var i = 6; i < 26; i = i + 1) {
		if (document.getElementById("cb" + i).checked) {
			count = count + 1;
		}
	}
	if (count == 0) {
		var errormessage = "削除される場合はDELETEボタンを押下してください";
		alert(errormessage)
		return false;
	} else {
	   changeSqlFlg(flg);
	   return true;
	}
}

function onUpdate() {
	var sqlflg = document.getElementById("sqlflg");
	sqlflg.value = 2;
}

function onDelete(num) {
	var sqlflg = document.getElementById("sqlflg");
	var rownum = document.getElementById("rownum");
	sqlflg.value = 3;
	rownum.value = num;
}

function onReturn() {
	document.returnform.submit();
}





 function changeDate() {
	var date = document.getElementById("calendar_hm3").value;
	document.getElementById("scheduledate").value = date;
}

function changeDate() {
	var date = document.getElementById("calendar_hm3").value;
	document.getElementById("scheduledate").value = date;
}
