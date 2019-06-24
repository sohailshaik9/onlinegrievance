<?php
@session_start();

if( !empty($_POST['gid']) && !empty($_POST['status']))
{

               $gid = $_POST['gid'];
               $status = $_POST['status'];
                  
                  

               require_once("viewgreivances.class.php");

                  $reg = new Viewgrievance();
                  $res = $reg->updGrievance($gid,$status);
                
                  
                        header('Location: viewgrievances.php');
                  
                 
}                 
else
{

 header('Location: loginForm.php');
}
?>



