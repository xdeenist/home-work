<?php
/**
*  This class sent reply email from contacts form
*/
class ContactsSent 
{
  
  function __construct()
  {
    # code...
  }

  public function Contacts(){
    if (isset($_POST['cont_contact'])) {
      if (!empty($_POST['name_contact'])) {
        if (!empty($_POST['e_mail_contact'])) {
          if (!empty($_POST['text_contact'])) {
            $name = trim($_POST['name_contact']);
            $email = trim($_POST['e_mail_contact']);
            $text = trim($_POST['text_contact']);
            $emailTo = 'xdeenist@gmail.com'; 
            $body = "Name: $name \n\nEmail: $email \n\nComments:\n $text";
            $headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
            $sent_mail = mail($emailTo, $body, $headers);
            if ($sent_mail) {
              return $emailSent = "Ваше сообщение отправлено, спасибо! ";
            }            
          } 
        }
      }
    } 
  }
}

$sent = new ContactsSent();
$emailSent = $sent->Contacts();
