<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Contact Form</title>
	
	
	<link href="css/contactform.css" rel="stylesheet" type="text/css" />

	
 <style>
 
 #articles{display:block;}
 
#contact_info{
	background:#f9f9f9;
	width:97%;
	height:auto;
	float:left;
	margin:10px 10px 0 10px;
	padding:0;
	border-radius:20px;
	-moz-border-radius:20px;
	-webkit-border-radius:20px;
}

#contact_img img{
	width:200px;
	height:200px;
	margin:10px;
	padding:0;
	float:left;
	border-radius:20px;
	-moz-border-radius:20px;
	-webkit-border-radius:20px;
}

#contact_text{
	width:640px;

	margin:20px 0 0 0 ;
	text-align:center;
}

#contact_text a{
	color:#BA4A00;
}

#contact_text a:hover{
	color:red;
}

#contact_title{
	margin:10px 0 0px 0 ;
	padding:5px 0 5px 0;
	background:#ff6600;
	color:#ffffff;
	font-size:18px;
	font-weight:bold;

	width:90%;
	border-radius:8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
}



#contact_text p{
	margin:0;
	padding:0;	
	line-height:170%;	
}

#contact_text h4{
	margin:0;
	padding:0;
}

.label{
	border-radius:8px;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
border:1px  solid #ff6600;
}
 
 </style>
	
	
</head>

<body >

<div id="formWrap">

<div id=articles>	


	
	
		<div id=contact_info>
	<div id=contact_title>Formal Work hours</div><!-- contact_title -->
		<div id=contact_img>
			<a href="http://www.picnicrus.tk" target="_blank"><img src="images/contact_us_company.png"></a>
		</div><!-- contact_img -->		
		<div id=contact_text>
		<h4><a href="http://www.picnicrus.tk" target="_blank">Picnic R Us - Ahmad Hammad</a></h4>
		<p>
		Tel: 00972891186 | 00972891186
		</p>

		<p>Fax: 00972891186 | 00972891186</p>
		<p>Address: Ramallah - Birzeit University</p>
		<p>Email:picnicrus.ahmadhammad<img class=at src="images/atAhmadHammad.png">Gmail.com</p>
		<p>Days : from sunday to Friday</p>
		Hours : 8:00 am to 6:00 pm
		</div><!-- contact_text -->	
		
	</div><!-- contact_info -->

	
		<div id=contact_info>
<div id=contact_title>Outside Work Hours</div><!-- contact_title -->
		<div id=contact_img>
			<img src="images/contact_us_personal.jpg">
		</div><!-- contact_img -->				
		<div id=contact_text>
		<h4>Ahmad Hammad</h4>
		<p>Jawwal: 00972891186 | 00972891186</p>

		<p>Email:Ahmadnassr<img class=at src="images/atAhmadHammad.png">Gmail.com</p>
		
	<h4>Ahmad Hammad</h4>
		<p>Jawwal: 00972891186 | 00972891186</p>

		<p>Email:Ahmadnassr<img class=at src="images/atAhmadHammad.png">Gmail.com</p>
				
		</div><!-- contact_text -->	
		
	</div><!-- contact_info -->
</div><!-- articels -->	


		<div id=contact_info>
<div id=contact_title>Contact Form</div><!-- contact_title -->
<div id=contact_text>

<h2> &nbsp </h2>
<h2>PICNICRUS Appreciate Your Feedback!</h2>
<div id="form">

<form action="contactus.php" method="post" id="comments_form">
	<div class="row">
	<div class="label">Your Name</div> <!-- end .label -->
    <div class="input">
    <input type="text" id="fullname" class="detail" name="fullname" value="">
    </div><!-- end .input -->
    <div class="context">E.g. Ahmad Hammad or ja'afar</div><!-- end .context -->
    </div><!-- end .row -->
    
    <div class="row">
	<div class="label">Your Email Address</div> <!-- end .label -->
    <div class="input">
    <input type="text" id="email" class="detail" name="email" value="">    </div><!-- end .input -->
    <div class="context">We will not spam you with messages and we will not pass on your email address to anyone</div><!-- end .context -->
    </div><!-- end .row -->
       
    
		<div class="row">
	<div class="label">Your Location</div> <!-- end .label -->
    <div class="input">
    <input type="text" id="location" class="detail" name="location" value="">
    </div><!-- end .input -->
    <div class="context">E.g. Ramallah</div><!-- end .context -->
    </div><!-- end .row -->
	
	
			<div class="row">
	<div class="label">Type Of Contact</div> <!-- end .label -->
    <div class="input">
    <input type="text" id="typeofcontact" class="detail" name="typeofcontact" value="">
    </div><!-- end .input -->
    <div class="context">E.g. Picnic request , complain , suggestion</div><!-- end .context -->
    </div><!-- end .row -->
	
				<div class="row">
	<div class="label">Message Title</div> <!-- end .label -->
    <div class="input">
    <input type="text" id="title" class="detail" name="title" value="">
    </div><!-- end .input -->
    <div class="context">Subject Name</div><!-- end .context -->
    </div><!-- end .row -->
	
    <div class="row">
	<div class="label">Your Message</div> <!-- end .label -->
    <div class="input2">
   <textarea id="comment" name="comment" class="mess"></textarea>
    </div><!-- end .input -->
    </div><!-- end .row -->
    
    <div class="submit">
    <input type="submit" id="submit" name="submit" value="Send Message">
	<input type="reset" id="submit" name="submit" value="Reset Fields">
    </div><!-- end .submit -->
    </form>
    

</div><!-- end#form -->

		</div><!-- contact_text -->	
		
	</div><!-- contact_info -->
	
</div><!-- end #formWrap -->

<?php
if(isset($_POST['comment']))
{
if(!empty($_POST['comment'])&&isset($_POST['title'])&&!empty($_POST['title'])){
require('globalvar.php');
$_SESSION['subject']=$_POST['comment'];
        $_SESSION['mbody']=$_POST['title'];
ob_start();
header('Location:contactmailer.php');	
}	
}



?>


</body></html>