var xmlHttp;
function showRuang(str){
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null){
		alert("Tidak support request");
		return;
	}
	var url = "get_ruangan.php";
	url = url+"?idGedung="+str;
	xmlHttp.onreadystatechange = stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function stateChanged(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("divRuangan").innerHTML = xmlHttp.responseText;
	}
}
/* END OF OPTIONS*/

function showHint(str) {  //function dari onkeyup dimana str = inputan dari input text
	if (str.length == 0) {  //pertama, cek apakah field str kosong (str.length == 0)
		document.getElementById("txtHint").innerHTML = "";  //hapus konten dari element dengan id "txtHint", lalu exit function
		return;
	} else {
		xmlHttp = GetXmlHttpObject();  //pembuatan sebuah objek XMLHttpRequest
		xmlHttp.onreadystatechange = stateTyped;
		var url = "get_hint.php";
		url = url+"?q="+str;
		xmlHttp.onreadystatechange = stateTyped;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
}
function stateTyped(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
	}
}
/*END OF SEARCH*/

function GetXmlHttpObject(){
	var xmlHttp = null;
	try{
		xmlHttp = new XMLHttpRequest();
	}catch(e){
		try{
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}