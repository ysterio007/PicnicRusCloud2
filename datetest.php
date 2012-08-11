
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
<input type="text" value=1 style='width:22;text-align:center;' name="<?php echo "daytxt".$e;?>" />
<select name="<?php echo "monthtxt".$e;?>" >
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
<select name="<?php echo "yeartxt".$e;?>" >
<option value=<?php echo date('Y')?>><?php echo date('Y'); ?></option>
<option value=<?php echo date('Y')+1;?>><?php echo date('Y')+1;?></option>
<option value=<?php echo date('Y')+2;?>><?php echo date('Y')+2;?></option>
</select>

<?php

//echo "<input type='submit' />
//</form>";



$arr=array();
if(isset($_POST["daytxt".$e])){

$this->y=$_POST["yeartxt".$e];
$this->m=$_POST["monthtxt".$e];
$this->d=$_POST["daytxt".$e];

$arr[0]=$this->y;
$arr[1]=$this->m;
$arr[2]=$this->d;


}

return $arr;

}
}
?>
