<?php
  include('globalvar.php');

if(isset($_SESSION['tmp_cnt_id']))
{
$t=$_SESSION['tmp_cnt_id'];
$query33="SELECT contract.`name`, contract.description FROM contract WHERE contract.id = '".$t."' ;";






?>
<form method="post" action="saveContractandback.php" >

<label for="tref" >Contract reference</label><br />
<div style="border: 3px  solid; width:150px;"><label > <?php echo $t;?> </label><br /></div><hr />
<label for="tref2" >Contract Name</label><br />
<input type='text' name="tref2" value='' /><br /><hr />
<label for='ta' >Contract Description</label><br/><textarea rows="4" cols="80" name='ta' value='' >
</textarea><br /><br /><hr />

<?php
		include('init.php');
	//if (isset($_POST['test'])){
	
	 
	 
	 $query="
	 SELECT
	 contractitem.`id`,
contractitem.`name`
FROM
contractcontractitem ,
contractitem
WHERE
contractcontractitem.contractitemid = contractitem.id AND
contractcontractitem.contractreference = '".$t."';";

//echo $query;
 $wishID =array();
	

if($query_run=mysql_query($query))
{
$query_num_rows=mysql_num_rows($query_run);
echo "</div><table width=80% border=6>
<tr ><th colspan='4'>Contract included items</th></tr>
<tr><th> # </th><th>contract item id</th><th>Description of item</th><th>delete</th></tr>";
if($query_num_rows>0){


for($i=0;$i<$query_num_rows;$i++){
echo "<tr>";
$cont_id=mysql_result($query_run,$i,'id');
$cont_name=mysql_result($query_run,$i,'name');
   $wishID= $cont_id;
//echo "<option style='height:30px;' value='".$cont_name."'>(".$cont_id.")".substr($cont_name,0,190)."......</option>";
echo "<td>".($i+1)."</td>";
echo "<td>".($cont_id)."</td>";
echo "<td>".substr($cont_name,0,150)."...</td>";
          echo "<td><form name='deleteWish' action='deletecontractitem.php' method='POST'>
            <input type='hidden' name='wishID' value=".$wishID."/>
            <input type='submit' name='deleteWish' value='Delete' />
			<input type='hidden' name='contractreference' value=".$t ."/>
        </form></td>";
echo "</tr>";
}
}


}
echo "</td></tr>
</table></div>";
	// }

?>


<p>
	 
<?php

	 
	 
	 $query="SELECT * FROM `contractitem` ";

//echo $query;
 $wishID =array();
	

if($query_run=mysql_query($query))
{
$query_num_rows=mysql_num_rows($query_run);
echo "</div><table width=80% border=6>
<tr ><th colspan='4'>All Items List</th></tr>
<tr><th>Contract item id </th><th>description of item</th><th>Add</th></tr>";
if($query_num_rows>0){


for($i=0;$i<$query_num_rows;$i++){
echo "<tr>";
$cont_id=mysql_result($query_run,$i,'id');
$cont_name=mysql_result($query_run,$i,'name');
   $wishID2= $cont_id;
//echo "<option style='height:30px;' value='".$cont_name."'>(".$cont_id.")".substr($cont_name,0,190)."......</option>";
echo "<td>".($cont_id)."</td>";
echo "<td>".substr($cont_name,0,150)."...</td>";
          echo "<td><form name='deleteWish' action='addcontractitem.php' method='POST'>
            <input type='hidden' name='wishID2' value=".$wishID2."/>
            <input type='submit' name='addWish' value='Add' />
			<input type='hidden' name='contractreference' value=".$t ."/>
        </form></td>";
echo "</tr>";
}
}


}
echo "</td></tr>
</table></div>";

echo '<input type="submit" value="Save And Back"/>';
}

?>

</p>

</form>