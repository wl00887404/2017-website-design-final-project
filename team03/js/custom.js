var loginid =  "loginbuttom";
var navid = "nav";
changeWelcom(navid);

function changeWelcom(navid) {
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById(navid).childNodes[1].innerHTML+=this.responseText;
			//hide origin sign up buttom
			document.getElementById(loginid).parentElement.style.display = "none";	
		}
	}
		
	  xmlhttp.open("POST", "/team03/custom.php", true);
	  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  xmlhttp.send();
	}