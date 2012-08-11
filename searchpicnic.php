<html>
<head>
<title>Picnics Search</title>
<script type="text/javascript" src="scripts/livesearch.js"></script>
<script type="text/javascript" src="scripts/tableformater.js"></script>
<script type="text/javascript" src="scripts/photoalbum.js"></script>
<script type="text/javascript" src="scripts/disalbum.js"></script>
  <style type="text/css">
.livesearch
  {
  display:none;
  width:260px;
  height:20px;
  z-index:2;
  background:#fff;
  position:relative;
  float:right;
-moz-box-shadow: 0 0 30px 5px #999;
-webkit-box-shadow: 0 0 30px 5px #999;
  right:142;
  }
.livesearch2
  {
  display:visible;
  width:260px;
  height:20px;
  z-index:2;
  position:relative;
  float:right;
-moz-box-shadow: 0 0 30px 5px #999;
-webkit-box-shadow: 0 0 30px 5px #999;
  right:142;
  }
   .livesearch2 a{color:#000;text-decoration:none;}
     .livesearch2 a:hover{color:green;text-decoration:underline;}
	 .livesearch2 td:hover
	 {
	 background:#e9feae;
	 }
  .livesearch2 a:visited{color:red;}
  #google
  {
  display:inline;
  }
  table
{
width: 100%; border: 3px black solid; border-collapse: collapse;
}
 
.livesearch2 table
{
border: 0px black solid;
} 
  
#bookLink{

  background:url(images/but1.jpg) repeat-x;
text-decoration:none;
width:150px;
height:40px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 2px  #77A200;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;

  }
#bookLink:hover{
     background:url(images/but2.jpg) repeat-x;
text-decoration:none;
width:150px;
height:40px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 5px  #000;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;
}

th{background-color: #25BBE8;
color:#FFFFFF;
text-shadow:1px 1px 2px  #000;
font:18px cursive bold ;
}
th a{text-decoration:none;color:#fff;}
th a:hover{text-decoration:none;color:#eee;}
tr:nth-of-type(odd) { background-color: #ccc; }


tr:nth-of-type(even) { background-color: #F4F2FB; }


#reference {
	border-bottom:1px solid #cccccc;
	padding-bottom: 2px; 
}
#reference:visited {
	color: #09C;
	text-decoration: none;
}
#reference:hover {
	color: #333333;
	border-bottom:3px solid #AD3417;
	padding-bottom: 2px;
	text-decoration: none;
}
#reference:active {
	color: #006;
	text-decoration: none;
}
#reference:link {
	text-decoration: none;
	}
#mytable{
width:100%;
text-align:center;
}	
	/********************************************************************/
	




.txtfield2 {
	width:60px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding:7px 8px;
	margin:0;
	display:inline;
	border-radius:5px 5px 5px 5px;
/*	border-top-right-radius:20px 10px;*/
	background:#E9E9E9;
	border:1px solid #CCC;	
}



.txtfield {
	width:260px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding:7px 8px;
	margin:0;
	display:inline;
	border-radius:5px 5px 5px 5px;
/*	border-top-right-radius:20px 10px;*/
	background:#E9E9E9;
	border:1px solid #CCC;	
}
.detailList {
	width:260px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding:7px 8px;
	margin:0;
	display:inline;
	border-radius:5px 5px 5px 5px;
/*	border-top-right-radius:20px 10px;
	background:#E9E9E9;*/
	border:1px solid #CCC;	
}

.txtfield:focus {
	background-color:#FFF;
	border:1px solid #999;
	outline:none;	
}


#submit {
	font-family:Arial, Helvetica, sans-serif;
	
	color:000;
	font-size:16px;
	text-shadow:1px 1px 1px #999;
	padding:7px 8px;
	/*border-bottom-right-radius:15px 7px;
	border-top-left-radius:15px 7px;*/
	display:inline;

}

#pagination
{
font-family:Arial,Helvetica,sans-serif;
font-size: .7em;
margin:7px;
}
#pagination ul
{
display:inline;
overflow:hidden:
list-style:none;
}
#pagination ul li
{
margin:3px;
display:inline;
overflow:hidden:
list-style:none;
}
#pagination ul li a
{
font-family:Arial,Helvetica,sans-serif;
border:1px solid #000080;
padding:2px 6px 6px;
text-decoration:none;
color:#000080;
}
#pagination ul li a:hover
{
background-color:#000080;
color:#FFF;
text-decoration:underline;
}
#tgoogle
{
border:0px;
}
#tgoogle tr:nth-of-type(odd) { background-color: #fff; }


#tgoogle tr:nth-of-type(even) { background-color: #fff; }
#livesearch tr:nth-of-type(odd) { background-color: #fff; }


#livesearch tr:nth-of-type(even) { background-color: #fff; }
#ttt
{
border:1px solid black;
}
    </style>

</head>

<body>
<div id="ttt">
   <form method="post" action=<?php "searchpicnic.php"?>>
   <table id="tgoogle">

   <tr><!--Row1-->
   <td><!--1-->
<input  id="submit" type="submit" value="Search" />
</td><!--End---1-->
   <td><!--2-->

<input type="hidden" name="submitted" value="true" />
<input type="hidden" id="searchvalue" name="searchvalue" value=<?php echo isset($_POST['criteria'])? $_POST['criteria']:"";?> />
<input type="hidden" id="limitvalue" name="limitvalue" value=<?php echo isset($_POST['limitvalue'])? $_POST['limitvalue']:15;?> />
<select name="category" class="detailList">
<option value="place">Place</option>
<option value="depature time">Depature Time</option>
<option value="arrive time">Arrive Time</option>
<option value="return time">Return Time</option>
</select>
</td><!--End---2-->
	   <td><!--3-->
   


    <input type="text" id="criteria" autocomplete="off" class="txtfield" name="criteria" value="" onkeyup="showResultSearch(this.value)" />
	</td><!--End---3-->
	<td><!--4-->
	 <input type="text" id="resultperpage" class="txtfield2" size="2" maxlength="3"  name="resultperpage" value=<?php echo isset($_POST['limitvalue'])? $_POST['limitvalue']:15;?> onkeyup="updateLimit(this.value)" />
</td><!--End---4-->


</tr><!--End---Row1-->

</table>
</form>
<div id="livesearch" class="livesearch" ></div>


</div>
<div id="tableContent">
<?php
require('globalvar.php');
include('init.php');
unset($_SESSION['picnicid']);
unset($_SESSION['placeid']);
if(isset($_POST['submitted']))
{
//connect to the database where $dbcon
include('init.php');

if (!$dbcon) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
//mysql_close($dbcon);
			   
mysql_select_db($DB_NAME);

$category=$_POST['category'];
$criteria=isset($_POST['criteria'])? $_POST['criteria']:"";
//----------------------------------------------------------------------------

 $qn="SELECT
count(*)
FROM
picnics ,
place
WHERE
picnics.place = place.id AND
place.`name` "." LIKE '%".$criteria."%' ";

$res=mysql_query($qn,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";
   $query_data = mysql_fetch_row($res);
$total_num_picnics = $query_data[0];
$limit=$_POST['limitvalue'];

$number_of_pages= ceil($total_num_picnics/$limit);

$currentpage=1;

//echo "<h1>".$number_of_pages."</h1>";

//----------------------------------------------------------------------------
if($category=="place"){
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson
FROM
picnics ,
place
WHERE
picnics.place = place.id AND
place.`name` "." LIKE '%".$criteria."%' ";
$offset=0;
$query=$query." ORDER BY picnics.id ASC";
$query=$query." LIMIT ".$limit;
$query=$query." OFFSET ".$offset;


//echo "<h1>". $total_num_picnics."</h1>";
}
else
{
//echo $criteria." hellow";
$timestamp = strtotime($criteria);
$criteria2=date("Y/m/d", $timestamp);

//echo $criteria2." hellow ";
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson
FROM `picnics`
WHERE
picnics.`".$category."` <= '".$criteria2."'";
$query=$query." ORDER BY picnics.id ASC";
//$query=$query." LIMIT ".$limit;
//$query=$query." OFFSET ".$offset;

}
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";
$num_rows=mysql_num_rows($result);
//echo "<a href='javascript:void(0);' onClick='showTable(".($limit).",0,0,0);'>gee</a>";
//echo "$num_rows results found";
//limit,offset,orderby(0,6),AD(0,1)
echo "<table id='mytable'>";
echo "<tr><th><a href='javascript:void(0);' onDblClick='showTable(".($limit).",0,0,0);' onclick='showTable(".($limit).",0,0,1);'>Reference #</a></th><th><a href='javascript:void(0);' ondblclick='showTable(".($limit).",0,1,1)' onclick='showTable(".($limit).",0,1,0)'>Depature time</a></th><th><a href='javascript:void(0);' ondblclick='showTable(".($limit).",0,2,1)' onclick='showTable(".($limit).",0,2,0)'>Arrive time</a></th><th><a href='javascript:void(0);' ondblclick='showTable(".($limit).",0,3,1)' onclick='showTable(".($limit).",0,3,0)'>Return time</a></th><th><a href='javascript:void(0);' ondblclick='showTable(".($limit).",0,4,1)' onclick='showTable(".($limit).",0,4,0)'>Place</a></th><th><a href='javascript:void(0);' ondblclick='showTable(".($limit).",0,5,1)' onclick='showTable(".($limit).",0,5,0)'>Description</a></th><th><a href='javascript:void(0);' ondblclick='showTable(".($limit).",0,6,1)' onclick='showTable(".($limit).",0,6,0)'>Price</a></th><th>Select</th></tr>";

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
echo "<tr><td>";
echo "<a  id='reference' onclick='showPlace(".$row['place'].")' href='javascript: void(0)' >".$row['id']."</a>";//1
echo "</td><td>";
echo $row['depature time'];//2
echo "</td><td>";
echo $row['arrive time'];//3
echo "</td><td>";
echo $row['return time'];//4
echo "</td><td>";
echo getplacename($row['place']);//5
echo "</td><td>";
echo $row['title'];//6
echo "</td><td>";
echo $row['priceperperson'];//7
echo "</td><td>";
echo "<a id='bookLink' href='"."psession.php?pcid=".$row['id']."&plid=".$row['place']."' >";
echo "book</a>";
echo "</td></tr>";
}

echo "</table>";
echo "<div id='pagination'>";

echo "<ul>";
echo "<li><a href='javascript:void(0);' onclick='showTable(".($limit).",".(0)*$limit.",0,0)'>First</a></li>";
echo "<li><a href='javascript:void(0);'>Prev</a></li>...";

//$offset=(($i+1)-1)*$limit; 
for($i=0;$i<$number_of_pages;$i++)
{//onclick='showTable(".($limit).",0,4,1)'
echo "<li><a href='javascript:void(0);' onclick='showTable(".($limit).",".(($i+1)-1)*$limit.",0,0)'>".($i+1)."</a></li>";
}
echo "...<li><a href='javascript:void(0);'>Next</a></li>";
echo "<li><a href='javascript:void(0);' onclick='showTable(".($limit).",".($number_of_pages-1)*$limit.",0,0)'>Last</a></li>";
echo "</ul>";

echo "</div>";
}// end of if statement




function getplacename($r){
$query="SELECT
place.`name`,
place.id
FROM `place` 
WHERE
place.id=".$r." ;";

if($query_run=mysql_query($query))
{
return mysql_result($query_run,0,'name');
}
}
?>
</div><!--TableContent-->
</body>
</html>