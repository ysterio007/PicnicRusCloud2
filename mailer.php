<?php
 require_once "Mail.php";
 include('globalvar.php');
        $from = "picnicrus.ahmadhammad@gmail.com";
        $to = $_SESSION['tmp_email'];//$_SESSION['mto'];//
        $subject = "registration picnicrus!";
        $body = $_SESSION['mbody'];//"Hi,\n\nHow are you?";

        $host = "ssl://smtp.gmail.com";//"smtp.gmail.com";
        $port = "465";//"587";
        $username = "picnicrus.ahmadhammad";
        $password = "sterio12345";
        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp =@ Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));
        $mail = @$smtp->send($to, $headers, $body);
		echo "Trying to send email ....";
		
        if (@PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }
?>
