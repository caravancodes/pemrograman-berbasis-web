var xmlparse;
function xmlparse(){ //ini fungsi ajax bisa diganti, str disini maksudnya parameter
	xmlparse = xml();
	if (xmlparse == null){
		alert("Tidak support request");
		return;
	}
	var url = "xmlparse.php"; // ini nama file yang akan di panggil ajax
	xmlparse.onreadystatechange = stateChanged;
	xmlparse.open("GET",url,true);
	xmlparse.send(null);
}
function stateChanged(){
	if(xmlparse.readyState == 4 || xmlparse.readyState == "complete"){
		document.getElementById("xmlparse").innerHTML = xmlparse.responseText; // ini untuk mengganti ID
	}
}
/* END OF OPTIONS*/

/*INI SYNTAX DEFAULT AJAX*/
function xml(){
	var xmlparse = null;
	try{
		xmlparse = new XMLHttpRequest();
	}catch(e){
		try{
			xmlparse = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			xmlparse = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlparse;
}