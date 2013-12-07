<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);



$to      = 'cjayanti@ratemymp.co.in';
$subject = 'sendmail test';
$message = 'If we can read this, it means that our test Sendmail setup works!';
$headers = 'From: satnam.singh@venturepact.com' . "\r\n" .
           'Reply-To: satnam.singh@venturepact.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

echo mail($to, $subject, $message, $headers);

die('Failure: Email was not sent!');
?>