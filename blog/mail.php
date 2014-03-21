<?php

 require_once "C:\wamp\bin\php\php5.3.8\pear\Mail.php";

function randomPassword() {
   $pass=array();
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $alphalength=strlen($alphabet)-1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, count($alphabet)-1);
        $pass[] = $alphabet[$n];
    }
    return $pass;
}
 
 $rpass=randomPassword();


 $username = 'micks.9093@gmail.com';
 $password = 'micks9093miraj';
 $host = 'ssl://smtp.gmail.com';
 $from = 'shalinchoksi92@gmail.com ';
 $to = 'dhruvil619@gmail.com';
 $subj = "Subject: noreply@domain.com\n";
 $body = "Welcome to Blogmakers,\nyuppppppppiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii this mail is using php mailer :PEAR";
 $port = '465';
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subj);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
    'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) 
 {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
 ?>