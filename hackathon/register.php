<?php
@session_start();

if(!empty($_POST['rollno']) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['pwd']) && !empty($_POST['sessvar']) && !empty($_SESSION['signupid']))
{
	
          if($_POST['sessvar']==$_SESSION['signupid'])
          {

                  unset($_SESSION['signupid']);
            

                  $rollno = $_POST['rollno'];
                  $pwd = $_POST['pwd'];
              	$name=$_POST['name'];
                $mail=$_POST['mail'];
                  /* */

                  require_once("register.class.php");

                  $reg = new Register();
                  $res = $reg->checkRegister($rollno);
                  echo $rollno;
                   if($res['status']==0)
                       {
                        

                          $add=$reg->addDetails($rollno,$name,$mail,$pwd);
                                      if(!empty($add['status']) && $add['status']==1){
                                      
                             header('Location: registersuccess.php');
                            }
                            else{
                          
                             // header('Location: loginForm.php');
                            }
                          }

                          else{
                            
              header('Location: regFormerror.php');
          }
        }
        else{
          
          header('Location: loginForm.php');
        }
        }
else
{

  header('Location: loginForm.php');
}








?>
