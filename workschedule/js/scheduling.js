function hidden() {
	for(i = 0; i < 3; i = i +1) {
	document.getElementById("cb" + i).style.display = "none";
	}
	for(i = 6; i < 24; i = i +1) {
	document.getElementById("cb" + i).style.display = "none";
	}
}
 function changeCheckbox(cb, bt) {
 	if (document.getElementById(cb).checked) {
 		document.getElementById(cd).checked = false;
 		document.getElementById(bt).style.backgroundColor = 'transparent';
 	} else {
		document.getElementById(cb).checked = true;
 		document.getElementById(bt).style.backgroundColor = "yellow";
 	}
 }