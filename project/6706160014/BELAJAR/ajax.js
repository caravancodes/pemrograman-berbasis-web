var xmlHttp;
function barang(id){ //ini fungsi ajax bisa diganti, str disini maksudnya parameter
	xmlHttp = GetXmlHttpObject();
	if (xmlHttp == null){
		alert("Tidak support request");
		return;
	}
	var url = "barang.php"; // ini nama file yang akan di panggil ajax
	url = url+"?id_toko="+id;
	xmlHttp.onreadystatechange = ganti;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function ganti(){
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete"){
		document.getElementById("tdbarang").innerHTML = xmlHttp.responseText; // ini untuk mengganti ID
	}
}
/* END OF OPTIONS*/

/*INI SYNTAX DEFAULT AJAX*/
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