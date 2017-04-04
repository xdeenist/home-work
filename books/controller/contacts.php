<?php
require_once '../model/select.class.php';
session_start();
/**
*  This class sent reply email from contacts form
*/
class ContactsSent extends Select
{
  
  function __construct()
  {
  }

  public function InsFromUser(){
    if (isset($_POST['cont_contact'])) {
      if (!empty($_POST['name_contact'])) {
        if (!empty($_POST['e_mail_contact'])) {
          if (!empty($_POST['text_contact'])) {
            $param = array(":name" => $_POST['name_contact'], ":mail" => $_POST['e_mail_contact'], ":c_text" => $_POST['text_contact'], ":user" => $_SESSION['user_id']);
            $insert = parent::insert("INSERT INTO contact SET cont_name = :name, cont_mail = :mail, cont_text = :c_text, user_id = :user", $param);
            return $emailSent = "Ваше сообщение отправлено, спасибо! ";
          }
        }
      }
    }
  }

  public function SelectCont(){
    if (isset($_SESSION['userstatus']) &&  $_SESSION['userstatus'] == "admin") {
      if (!isset($_GET['read'])) {      
        return $a = parent::selectAll("SELECT cont_name AS name, cont_mail AS mail, cont_text AS message, create_time AS messageTime, contact_id FROM contact WHERE reed IS NULL"); 
      } elseif ($_GET['read'] == "read"){
        return $a = parent::selectAll("SELECT cont_name AS name, cont_mail AS mail, cont_text AS message, create_time AS messageTime, contact_id FROM contact WHERE reed IS NOT NULL"); 
      }
    }
  }

  public function ReadMessage(){
    if (isset($_GET['reed'])) {
      parent::update("UPDATE contact SET reed = 1 WHERE contact_id = " . $_GET['reed']);
      header("Location: contacts.php");
    }
  }

  public function DelMessage(){
    if (isset($_GET['del'])) {
      parent::update("DELETE FROM contact WHERE contact_id = " . $_GET['del']);
      header("Location: contacts.php");
    }
  }

  public function Contacts(){
    if (isset($_POST['ans_contact'])) {
      if (!empty($_POST['ans'])) {
        if (!empty($_POST['ans_text_contact'])) {
          $email = "goopdr56@gmail.com";
          $text = trim($_POST['ans_text_contact']);
          $emailTo = "Admin <" . $_GET['em'] . ">"; 
          $subject = "To: ".  trim($_POST['ans']) . " From: " .  $email;
          $message = 'From: Admin Books Site.  Reply-To: ' . $email . "\n Comments:\n" .  $text ;
          $sent_mail = mail($emailTo, $subject, $message);
          if ($sent_mail) {
            header("Location: contacts.php");
            return $emailSent = "Ваше сообщение отправлено, спасибо! ";
          }            
        } 
      }
    } 
  }
}

$sent = new ContactsSent();
$emailSent = $sent->Contacts();
$insert_user = $sent->InsFromUser();
$sel_unreed = $sent->SelectCont();
$update = $sent->ReadMessage();
$del = $sent->DelMessage();