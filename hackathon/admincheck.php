<?php
@session_start();

if(!empty($_POST['adminid']) && !empty($_POST['pwd']) && !empty($_POST['sessvar']) && !empty($_SESSION['loginid'])){
  if($_POST['sessvar']==$_SESSION['loginid']){
    unset($_SESSION['loginid']);

    $adminid = $_POST['adminid'];
    $pwd = $_POST['pwd'];
    /* */

    require_once("adminlogin.php");

    $obj = new Adminlogin();
    $res = $obj->checkLogin($adminid);

    if(!empty($res['status']) && $res['status']==1 && $res['pwd']==$pwd){
      $_SESSION['admin'] = $adminid;
      header('Location: admin.php');
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
