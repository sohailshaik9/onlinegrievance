<?php
@session_start();
if(!empty($_SESSION['rollno']))
{

require('header.php');
?>
          <?php
                    require_once("navbar.php");
                  ?>
             
<?php
@session_start();

if( !empty($_POST['yos']) && !empty($_POST['gtype']) && !empty($_POST['complaint']) && !empty($_POST['program']))
{
	
              $rollno = $_SESSION['rollno'];
               $complaint = $_POST['complaint'];
               $yearofstudy = $_POST['yos'];
               $gtype = $_POST['gtype'];
               $program = $_POST['program'];
                  
                  

                  require_once("grievance.class.php");

                  $reg = new Grievance();
                  $res = $reg->addGrievance($rollno,$complaint,$yearofstudy,$program,$gtype);
                  if($res['status']==1)
                  {
                    ?>

        <div class="jumbotron">
      <div class="row">
        <div class="col-md-4">&nbsp;
        </div>
        <div class="col-md-4">
        <?php if(!empty($res['status']) && $res['status']==1){ echo '<div class="alert alert-success"> Grievance submitted successfully</div>'; } ?>
        </div>
        </div>
        <div class="col-md-4">&nbsp;
        </div>
    </div>

                    <?php
                  }
                  else
                  {
                    echo "fail";
                  }

            

}                 
else
{
  echo "hh";

 // header('Location: ./');
}
?>
</body>
</html>

<?php
}

else
{
  header('Location: loginForm.php');
}

?>






