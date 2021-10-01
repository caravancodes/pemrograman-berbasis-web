var jadijson;
function jjson(){ //ini fungsi ajax bisa diganti, str disini maksudnya parameter
	jadijson = xml();
	if (jadijson == null){
		alert("Tidak support request");
		return;
	}
	var url = "dbtojson.php"; // ini nama file yang akan di panggil ajax
	jadijson.onreadystatechange = duste;
	jadijson.open("GET",url,true);
	jadijson.send(null);
}
function duste(){
	if(jadijson.readyState == 4 || jadijson.readyState == "complete"){
		document.getElementById("json").innerHTML = jadijson.responseText; // ini untuk mengganti ID
	}
}
/* END OF OPTIONS*/

/*INI SYNTAX DEFAULT AJAX*/
function xml(){
	var jadijson = null;
	try{
		jadijson = new XMLHttpRequest();
	}catch(e){
		try{
			jadijson = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			jadijson = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return jadijson;
}