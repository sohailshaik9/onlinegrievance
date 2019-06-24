<?php
@session_start();
if(!empty($_SESSION['admin']))
{
  unset($_SESSION['admin']);
  session_destroy();
  
}
  header('Location: adminform.php');

 ?>
