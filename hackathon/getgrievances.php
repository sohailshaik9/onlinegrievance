<?php

@session_start();
if(!empty($_SESSION['rollno']))
{

require('header.php');
require_once("navbar.php");
                  ?>


                  <div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">

             
              <div class="col-md-4">
          &nbsp;
				</div>
				 <div class="col-md-8">
                <?php
			            require_once("grievance.class.php");
                
                  $obj=new Grievance();
                  $res = $obj->getgrievancebyid($_SESSION['rollno']);
                
                  if($res['xstatus']==1 && !empty($res['ival'])){
					  
                    for($i=0; $i<$res['ival'];$i++){
                      ?>
					 
                      <div class="card">
                        <div class="card-header">
                          <?php echo $res[$i]['raisedon']; ?>&nbsp;<span class="text-success">Status::<?php echo $res[$i]['status']; ?></span>
                        </div>
                        <div class="card-body">
                            <?php echo $res[$i]['complaint']; ?>
                        </div>
                      </div>
					 
					 

                      <?php
                    }
					?>
					</div>
					<?php
                  }
				  
                  else {
					  ?>
                   
                    <div class="card">
                      <div class="card-body"><br/>
                        <h4>No New Grievances</h4>
                      </div>
                    </div> <!-- panel info -->
                    <?php
                  }
                 ?>

             
        </div>
</div>
<?php
require('footer.php');
}
else
{

  header('Location: loginForm.php');
}

 ?>


