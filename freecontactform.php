<?php
echo "oi";
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "site@cyclus.com.br";
    $email_subject = "Contato pelo site";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
/*    if(!isset($_POST['fname']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
*/ 
     
 
    $first_name = $_POST['fname']; // required
    $email_from = $_POST['email']; // required
    $subject = $_POST['subject']; // required
#   $telephone = $_POST['telefone']; // not required
    $comments = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
#  if(!preg_match($email_exp,$email_from)) {
#    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
#  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
/* 
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
*/ 
    $email_message = "Detalhes da mensagem.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Nome: ".clean_string($first_name)."\n";
#    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
#    $email_message .= "Telepone: ".clean_string($telepone)."\n";
    $email_message .= "Assunto: ".clean_string($subject)."\n";
    $email_message .= "Mensagem: ".clean_string($comments)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  

 echo 'Sua mensagem foi enviada';
}
?>