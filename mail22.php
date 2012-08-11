<?php
 require_once "Mail.php";
        $from = "picnicrus.ahmadhammad@gmail.com";
        $to = "ahmadnassr@gmail.com";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";

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
		
        if (@PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }
?>
