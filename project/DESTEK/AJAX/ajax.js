var xmlHttp;
function show(judul) {
    xmlHttp=GetXmlHttpObject();
    var url="katalog.php";
    url=url+"?judul="+judul;
    xmlHttp.onreadystatechange=stateChanged;
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
}
function stateChanged() {
    if (xmlHttp.readyState==4||xmlHttp.readyState=="complete") {
        document.getElementById("duste").innerHTML=xmlHttp.responseText
    }
}
function GetXmlHttpObject() {
    var xmlHttp=null;
    try {
        xmlHttp=new XMLHttpRequest();
    }
    catch(e) {
        try {
            xmlHttp=new ActiveXObject("Msxm12.XMLHTTP");
        }
        catch (e) {
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}