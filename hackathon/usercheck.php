<?php
@session_start();

if(!empty($_POST['rollno']) && !empty($_POST['pwd']) && !empty($_POST['sessvar']) && !empty($_SESSION['loginid'])){
  if($_POST['sessvar']==$_SESSION['loginid']){
    unset($_SESSION['loginid']);

    $rollno = $_POST['rollno'];
    $pwd = $_POST['pwd'];
    /* */

    require_once("login.php");

    $obj = new login();
    $res = $obj->checkLogin($rollno);
    

    if(!empty($res['status']) && $res['status']==1 && $res['pwd']==$pwd){
      $_SESSION['rollno'] = $rollno;
      header('Location: studentGrieForm.php');
    }
    else{
      echo "invalid credentials";
      //header('Location: loginerror.php');
    }
  }
  else{
    echo "invalid credentials";
     // header('Location: ./');
  }
}
else{
  echo "invalid credentials";
 // header('Location: ./');
}

?>
