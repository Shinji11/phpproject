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
 
 function changeDate() {
	var date = document.getElementById("calendar_hm3").value;
	document.getElementById("scheduledate").value = date;
}

function changeDate() {
	var date = document.getElementById("calendar_hm3").value;
	document.getElementById("scheduledate").value = date;
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

function changeEditData(data, num) {
	if (data == 1) {
		var checkbox = document.getElementById("cb" + num);
		var button = document.getElementById("bt" + num);
		checkbox.checked = true;
		button.style.backgroundColor = "yellow";
	}

}