// change table content
loadDoc("tableOne","九族文化村");
loadDoc("tableTwo","六福村");
loadDoc("tableThree","劍湖山");



//Ajax func
	//load table
function loadDoc(tableId, parkname) {
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(tableId).innerHTML = this.responseText;
		}
	}
		
	  xmlhttp.open("POST", "/team03/showtable.php", true);
	  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xmlhttp.send("parkname="+parkname);
	}
	
	// add to cart

