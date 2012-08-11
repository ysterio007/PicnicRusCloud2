<html>
<head>
<title>Contract wizard</title>
<style type="text/css">

#workerLink{

  background:url(images/but1.jpg) repeat-x;
text-decoration:none;
width:150px;
height:30px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 2px  #77A200;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;

  }
#workerLink:hover{
     background:url(images/but2.jpg) repeat-x;
text-decoration:none;
width:150px;
height:30px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 5px  #000;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;
}


#table1
{
width: 100%; border: 3px black solid; border-collapse: collapse;
;text-align:center;
}
tr:nth-of-type(odd) { background-color: #fff;text-align:center;}


tr:nth-of-type(even) { background-color: #F4F2FB; }

th{background-color: #25BBE8;
color:#FFFFFF;

text-shadow:1px 1px 2px  #000;
font:18px cursive bold ;

}

</style>
</head>

<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table id='table1'>
<tr ><th colspan='6'>Contracts</th></tr>
<tr><th> # </th><th>contract Reference</th><th>Contract Name</th><th>View</th><th>Edit</th><th>Delete</th></tr>
<?php
include('init.php');
  include('globalvar.php');

 unset($_SESSION['tmp_cnt_id']); 
  unset($_SESSION['tmp_cnt_cn']); 
   unset($_SESSION['tmp_cnt_cd']); 
$query="SELECT * FROM `contract`";
if($query_run=mysql_query($query))
{
$query_num_rows=mysql_num_rows($query_run);
for($i=0;$i<$query_num_rows;$i++)
{
 
$cont_id=mysql_result($query_run,$i,'id');
$wishID= $cont_id;
$cont_name=mysql_result($query_run,$i,'name');
$cont_description=mysql_result($query_run,$i,'description');
echo "<tr><td>".($i+1)."</td><td>".$cont_id."</td><td>".$cont_name."</td>";
echo "<td><form name='viewWish' action='mainpage2.php?main=contractwizard' method='POST'>
            <input type='hidden' name='ContractViewer' value=".$wishID."/>
            <input type='submit' name='viewWish' value='view' />
        </form>
</td>";

echo "<td>
<form action='mainpage2.php?main=editcontract' method='POST'>
            <input type='hidden' name='contractreference' value='".$wishID."'/>
			<input type='hidden' name='cont_name' value='".$cont_name."'/>
			<input type='hidden' name='cont_description' value='".$cont_description."'/>
            <input type='submit' name='editWish' value='Edit' />
        </form>
</td>";

echo "<td>
<form name='deleteWish' action='#' method='POST'>".
            //<input type='hidden' name='wishID' value=".$wishID."/>
           " <input type='submit' name='deleteWish' value='Delete' />".
       " </form>
</td>";

echo "</tr>";
}
}
?>
	
</table>
<a id="workerLink" href="mainpage2.php?main=addcontract" >New Contact</a>
<!--
<select name="test2[]" multiple="yes">
	<option value="one">one</option>
	<option value="two">two</option>
	<option value="three">three</option>
	<option value="four">four</option>
	<option value="five">five</option>
</select>
<input type="submit" value="Send2" />

-->



<?php
	
	if (isset($_POST['ContractViewer'])){
	$t=$t=rtrim($_POST['ContractViewer'],"/");
	 
	 
	 $query2="
	 SELECT
contractitem.`name`
FROM
contractcontractitem ,
contractitem
WHERE
contractcontractitem.contractitemid = contractitem.id AND
contractcontractitem.contractreference = '".$t."';";

//echo $query2;

	

if($query_run2=mysql_query($query2))
{
$query_num_rows2=mysql_num_rows($query_run2);
echo "<table id='table1' >
<tr><th>Contract items</th></tr>
<tr><td colspan=2 >";
if($query_num_rows2>0){

echo "<select name='test2[]' multiple='yes' size=10>";
for($i=0;$i<$query_num_rows2;$i++){
$cont_name=mysql_result($query_run2,$i,'name');

echo "<option style='height:30px;' value='".$cont_name."'>(".($i+1).")".substr($cont_name,0,160)."......</option>";
}
}
echo "</select>";

}
echo "</td></tr>
</table>";
	 }
	
?>

<?php
	/*
	if (isset($_POST['test2'])){
	 foreach ($_POST['test2'] as $t){
	 echo "You selected ".$t."<br />";
	 }
	}*/
	
?>


</form>
</body>
</html>