function tampilkanTipeHP(str) 
{
      if (str=="") {
            document.getElementById("demo_pilih").innerHTML="";
            return;
      } 

      if (window.XMLHttpRequest) 
      {
            // kode utk IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
      } 
      else 
      { 
            // kode utk IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("demo_pilih").innerHTML=this.responseText;
        }
      }
      xmlhttp.open("GET", "get_tipe.php?id="+str, true);
      xmlhttp.send();
}
