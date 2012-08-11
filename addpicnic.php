<html>
<head>
<title>Add Picnic</title>
<style type="text/css">

#workerLink{

  background:url(images/but1.jpg) repeat-x;
text-decoration:none;
width:130px;
height:10px;
font:16px cursive bold ;
  display: inline;
  color:#FFFFFF;
text-shadow:1px 1px 2px  #77A200;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;
line-height:200%;
  }
#workerLink:hover{
     background:url(images/but2.jpg) repeat-x;
text-decoration:none;
width:130px;
height:10px;
font:16px cursive bold ;
  display: inline;
  color:#FFFFFF;
text-shadow:1px 1px 5px  #000;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;
line-height:200%;
}

.FText:focus{
background:#dcfcc5;
}


#table1
{
width: 100%; border: 3px black solid; border-collapse: collapse;
;text-align:left;
}
tr:nth-of-type(odd) { background-color: #fff;}


tr:nth-of-type(even) { background-color: #F4F2FB; }

th{background-color: #25BBE8;
color:#FFFFFF;

text-shadow:1px 1px 2px  #000;
font:18px cursive bold ;

}

</style>
</head>

<body>
<?php
include('init.php');
$m1=new md();
$m2=new md();
$m3=new md();

require('globalvar.php');
$_SESSION['previous_page']=htmlentities($_SERVER['REQUEST_URI']); 
//dt , yt , mt
?>
<form name="mainpicnicform" action="insertpicnic.php" method="post">
<table id='table1'>
<tr><th width=30%>Field</th><th>Datain</th></tr>
<tr>
<td>Title : </td>
<td><input class='FText'type='text' name='title'></td>
</tr>
<!---->
<tr>
<td>Place : </td>
<td><?php getPlaces(); ?>
            <a id="workerLink" href="addphotos.php" >New Place</a>
</td>
</tr>
<!---->
<tr>
<td>Activities : </td>
<td><textarea class='FText' rows="4" cols="80" name='activities' ></textarea>
</tr>
<!---->
<tr>
<td>Food  : </td>
<td><textarea class='FText' rows="4" cols="80" name='food' ></textarea>
</tr>
<!---->
<tr>
<td>Depature Date : </td>
<td><?php $m1->getmydate("1"); ?> </td>
</tr>
<!---->
<tr>
<td>Arrive Date : </td>
<td><?php $m2->getmydate("2"); ?> </td>
</tr>
<!---->
<tr>
<td>Return Date : </td>
<td><?php $m3->getmydate("3"); ?> </td>
</tr>
<!---->
<tr>
<td>Transportation : </td>
<td><input class='FText' type='text' name='transportation'></td>
</tr>
<!---->
<tr>
<td>Price Per Person : </td>
<td><input class='FText' type='text' name='priceperperson'></td>
</tr>
<!---->
<tr>
<td>Children : </td>
<td><select name="children" >
<option value="0">NO</option>
<option value="1">YES</option>
</select></td>
</tr>
<!---->
<tr>
<td>Disabilities : </td>
<td><select name="disability" >
<option value="0">NO</option>
<option value="1">YES</option>
</select></td>
</tr>
<!---->
<tr>
<td>Babies : </td>
<td><select name="baby" >
<option value="0">NO</option>
<option value="1">YES</option>
</select></td>
</tr>
<!---->
<tr>
<td>Capacity : </td>
<td><input class='FText' type='text' name='capacity' value='30' ></td>
</tr>
<!---->
<tr>
<td>Contract : </td>
<td><?php getContracts(); ?> <a id="workerLink" href="addcontract.php" >New Contract</a>
</tr>

<!---->
<tr>
<td><input type='submit' value="Sumbit" />
<input type='reset' /></td>
<td></td>
</tr>
<!---->
</table>
</form>

<?php
/*
//$num = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31


$m1=new md();

$a=$m1->getmydate("1");
for($i=0;$i<count($a);$i++)
{
echo "<br />".$a[$i]."<br />";
}


//$m1->getmydate("2");
*/

class md
{
public $y=2000;
public $m=1;
public $d=1;
public function getmydate($e)
{

?>
<?php //echo "<form method='post' action='".$_SERVER['PHP_SELF']."' >"; ?>
<input type="text" class='FText' value=1 style='width:22;text-align:center;' name="<?php echo "dt".$e;?>" />
<select name="<?php echo "mt".$e;?>" >
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="<?php echo "yt".$e;?>" >
<option value=<?php echo date('Y')?>><?php echo date('Y'); ?></option>
<option value=<?php echo date('Y')+1;?>><?php echo date('Y')+1;?></option>
<option value=<?php echo date('Y')+2;?>><?php echo date('Y')+2;?></option>
</select>

<?php

//echo "<input type='submit' />
//</form>";

/*

$arr=array();
if(isset($_POST["daytxt".$e])){

$this->y=$_POST["yeartxt".$e];
$this->m=$_POST["monthtxt".$e];
$this->d=$_POST["daytxt".$e];

$arr[0]=$this->y;
$arr[1]=$this->m;
$arr[2]=$this->d;


}

return $arr;*/

}
}//end class
?>

<?php
function getContracts()
{


include('init.php');
$query="SELECT
contract.id
FROM `contract`;
";
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>");


echo "<select name='Contracts' >";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{

echo  "<option value=".$row['id'].">".$row['id']."</option>";
}
echo "</select>";
}
function getPlaces()
{
include('init.php');
$query="SELECT
place.`id`,
place.`name`
FROM `place`;";
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>");


echo "<select name='Places' >";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{

echo  "<option value=".$row['id'].">".$row['name']."</option>";
}
echo "</select>";
}

?>