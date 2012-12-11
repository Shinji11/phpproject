function hidden() {
	for(i = 0; i < 3; i = i +1) {
	document.getElementById("cb" + i).style.display = "none";
	}
	for(i = 6; i < 24; i = i +1) {
document.getElementById("cb" + i).style.display = "none";
	}
}

function changeCheckbox(cb, bt) {
	var checkbox = document.getElementById(cb);
	var button = document.getElementById(bt);
 	if (checkbox.checked) {
 		checkbox.checked = false;
 		button.style.backgroundColor = "transparent";
 	} else {
		checkbox.checked = true;
 		button.style.backgroundColor = "yellow";
 	}
 }
 
 function changeDate() {
	var date = document.getElementById("calendar_hm3").value;
	document.getElementById("scheduledate").value = date;
}