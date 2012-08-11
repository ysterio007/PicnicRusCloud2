var xmlhttp;
var trigger=0;
function sh(limit,offset)
{

var element=document.getElementById('searchvalue');


alert(element.value+" "+limit+" "+offset);

}

function showTable(limit,offset,orderby,AD)
{
var element=document.getElementById('searchvalue');
xmlhttp=GetXmlHttpObject()
if (xmlhttp==null)
  {
  alert ("Your browser does not support XML HTTP Request");
  return;
  }
   // window.alert(trigger++);
//$limit=$_GET['limit'];//2;
//$offset=$_GET['offset'];//0
//$q=$_GET['q'];//silwad
//$orderby=$_GET['ob'];//id
//$orderby="picnics.id";
//$AD=$_GET['ad'];//ASC
//$AD="ASC";
if(orderby==0)
{
orderby="id";
}
if(orderby==1)
{
orderby="depature time";
}
if(orderby==2)
{
orderby="arrive time";
}
if(orderby==3)
{
orderby="return time";
}
if(orderby==4)
{
orderby="place";
}
if(orderby==5)
{
orderby="title";
}
if(orderby==6)
{
orderby="priceperperson";
}
if(trigger==0)
{
trigger=1;
AD="DESC";
}
else
{
trigger=0;
AD="ASC";
}
var url="picnictableformater.php";
element.value=element.value.replace("/", "")
url=url+"?q="+element.value;
url=url+"&limit="+limit;
url=url+"&offset="+offset;
url=url+"&ob="+orderby;
url=url+"&ad="+AD;
url=url+"&sid="+Math.random();
 //alert(url);
xmlhttp.onreadystatechange=stateChanged2 ;
xmlhttp.open("GET",url,true);
xmlhttp.send(null);
}

function stateChanged2()
{
if (xmlhttp.readyState==4)
  {
  document.getElementById("tableContent").innerHTML=xmlhttp.responseText;
  document.getElementById("tableContent").style.border="1px solid #A5ACB2";
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

function updateLimit(value)
{
//alert(value);
  var reg1 = /^([1-9]){1}([0-9]{0,2})$/;
  if (!reg1.test(value)) {
document.getElementById("resultperpage").style.border="5px solid red";
    return false;
	}
	else{
	document.getElementById("resultperpage").style.border="1px solid green";
document.getElementById("limitvalue").value=value;
return true;
}
}
function updateNNN(value)
{
var reg1 = /^([1-9]){1}([0-5]{0,1})$/;
  if (!reg1.test(value)) {
document.getElementById("info_numberofusers").className="numLabel";
	document.getElementById("number").value=1;
    return false;
	}
	else{


return true;
}
}