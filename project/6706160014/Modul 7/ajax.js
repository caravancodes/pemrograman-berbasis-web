var xmlHttp;
function tampil(judul) {
	xmlHttp=GetXmlHttpObject();
	var url="php.php";
	url=url+"?judul="+judul;
	xmlHttp.onreadystatechange=stateChanged;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function stateChanged(){
	if (xmlHttp.readyState==4||xmlHttp.readyState=="complete") {
		document.getElementById("kosong").innerHTML=xmlHttp.responseText
	}
}
function GetXmlHttpObject(){
	var xmlHttp=null;
	try{
		xmlHttp=new XMLHttpRequest();
	}
	catch(e){
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}	