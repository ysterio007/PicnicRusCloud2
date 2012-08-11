
var xmlhttp;


function showitems(v)
{

xmlhttp=GetXmlHttpObject()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }

if(v==1||v==2){
var url="menuprinter.php";
url=url+"?v="+v;
url=url+"&sid="+Math.random();
 //alert(url);
xmlhttp.onreadystatechange=stateChanged_1 ;
}
if(v==3){
var url="aboutus.php";

url=url+"?sid="+Math.random();
 //alert(url);
xmlhttp.onreadystatechange=stateChanged_2 ;
}
if(v==4){
var url="contactus.php";

url=url+"?sid="+Math.random();
 //alert(url);
xmlhttp.onreadystatechange=stateChanged_2 ;
}
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged_1()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("nav").innerHTML=xmlhttp.responseText;
 // document.getElementById("tableContent").style.border="1px solid #A5ACB2";
  }
}

function stateChanged_2()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("disp").innerHTML=xmlhttp.responseText;
 // document.getElementById("tableContent").style.border="1px solid #A5ACB2";
  }
}

function GetXmlHttpObject()
{
if (window.XMLHttpRequest)
  {
  // code for IE7+, Firefox, Chrome, Opera, Safari
  return new XMLHttpRequest();
  }
if (window.ActiveXObject)
  {
  // code for IE6, IE5
  return new ActiveXObject("Microsoft.XMLHTTP");
  }
return null;
}



