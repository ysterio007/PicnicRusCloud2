var xmlhttp;

function showResult(str,id)
{

xmlhttp=GetXmlHttpObject()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
var url="showplacepicture.php";
url=url+"?q="+str;
url=url+"&id="+id;
url=url+"&sid="+Math.random();

xmlhttp.onreadystatechange=stateChanged ;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("leftdiv").innerHTML=xmlhttp.responseText;
  document.getElementById("myimage").className="imageAdapter";
  //document.getElementById("leftdiv").style.border="1px solid #A5ACB2";
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
function showResult2(str)
{
 alert ("Your browser does not support XML HTTP Request"+str);
 }