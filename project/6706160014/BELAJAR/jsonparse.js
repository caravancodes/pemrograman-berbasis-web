var tarik;
function jsonparse(){ //ini fungsi ajax bisa diganti, str disini maksudnya parameter
	tarik = Goo();
	if (tarik == null){
		alert("Tidak support request");
		return;
	}
	var url = "jsonparse.php"; // ini nama file yang akan di panggil ajax
	tarik.onreadystatechange = yu;
	tarik.open("GET",url,true);
	tarik.send(null);
}
function yu(){
	if(tarik.readyState == 4 || tarik.readyState == "complete"){
		document.getElementById("jse").innerHTML = tarik.responseText; // ini untuk mengganti ID
	}
}
/* END OF OPTIONS*/

/*INI SYNTAX DEFAULT AJAX*/
function Goo(){
	var tarik = null;
	try{
		tarik = new XMLHttpRequest();
	}catch(e){
		try{
			tarik = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			tarik = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return tarik;
}