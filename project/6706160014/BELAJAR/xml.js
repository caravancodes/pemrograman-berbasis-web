var jadixml;
function jadi(){ //ini fungsi ajax bisa diganti, str disini maksudnya parameter
	jadixml = toxml();
	if (jadixml == null){
		alert("Tidak support request");
		return;
	}
	var url = "dbtoxml.php"; // ini nama file yang akan di panggil ajax
	jadixml.onreadystatechange = berubah;
	jadixml.open("GET",url,true);
	jadixml.send(null);
}
function berubah(){
	if(jadixml.readyState == 4 || jadixml.readyState == "complete"){
		document.getElementById("xml").innerHTML = jadixml.responseText; // ini untuk mengganti ID
	}
}
/* END OF OPTIONS*/

/*INI SYNTAX DEFAULT AJAX*/
function toxml(){
	var jadixml = null;
	try{
		jadixml = new XMLHttpRequest();
	}catch(e){
		try{
			jadixml = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			jadixml = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return jadixml;
}