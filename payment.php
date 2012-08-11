<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation and Payment</title>

<style>Picnic</style>

 <style type="text/css">
#txtCVVNumber:focus{
background:#dcfcc5;
}
#txtNameOnCard:focus{
background:#dcfcc5;
}
#txtCardNumber:focus{
background:#dcfcc5;
}
    </style>


</head>

<body>

<table border=10>

<table width="100%" border="1" cellspacing="1" cellpadding="1">
<tr><th colspan=2 style="text-align:center;" ><img src="./images/creditcards.jpg" alt="credit cards" /></th><th>req</th></tr>
<?php

//connect to the database where $dbcon
include('init.php');

if (!$dbcon) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
//mysql_close($dbcon);
			   
mysql_select_db($DB_NAME);



$query="SELECT * FROM `creditcards`;";


$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";

$stringeod=<<< EOD

<tr>
<td width="40%" align="right"><strong>Credit Card Type:</strong></td>
<td width="30%">
EOD;
echo $stringeod;

echo "<select ONBLUR='validate_t1(this, 'inf_t1', true);' id='txtCardType' name='txtCardType' >";
//echo "<tr><th>reference number</th><th>depature time</th><th>arrive time</th><th>return time</th><th>place</th><th>brief description</th><th>price per person</th><th>select</th></tr>";

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
$stringeod2=<<< EOD

<option value=$row[name]>$row[name]</option>


EOD;
echo $stringeod2;
}
?>
</select>
</td>
<td width="30%"id="inf_t1">
</td>
</tr>
<tr>
<td align="right"><label>Name as on Credit Card:</label></td>
<td><input type="text" ONCHANGE="validate_t2(this, 'inf_t2', true);" name="txtNameOnCard" id="txtNameOnCard" size="35" value="" />
</td>
<td id="inf_t2">Required
</td>
</tr>
<tr>
<td align="right"><label>Credit Card Number:</label></td>
<td><input type="text" name="txtCardNumber" ONCHANGE="validate_t3(this, 'inf_t3', true);" id="txtCardNumber" size="35" value="" />
</td>
<td id="inf_t3">Required
</td>
</tr>
<tr>
<td align="right"><label>Card Expiry Date:</label></td>
<td><select name="txtMonth" id='txtMonth' ONCHANGE="validate_t4(this, 'inf_t4', true);" >
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
<select name="txtYear" >
<option value=<?php echo date('Y')?>><?php echo date('Y'); ?></option>
<option value=<?php echo date('Y')+1;?>><?php echo date('Y')+1;?></option>
<option value=<?php echo date('Y')+2;?>><?php echo date('Y')+2;?></option>
</select></td>
<td id="inf_t4">Required
</td>
</tr>
<tr>
<td align="right"><label>CVV Number:</label></td>
<td><input type="text" ONCHANGE="validate_t5(this, 'inf_t5', true);" name="txtCVVNumber" id="txtCVVNumber" size="4" maxlength="4" value="" />
</td>
<td id="inf_t5">Required
</td>
</tr>


</table >
</TABLE>
</body>
</html>