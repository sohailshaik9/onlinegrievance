<?php
@session_start();
if(!empty($_SESSION['rollno']))
{
  unset($_SESSION['rollno']);
  session_destroy();
  
}
  header('Location: loginForm.php');

 ?>
