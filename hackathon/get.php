<?php
@session_start();
if(!empty($_SESSION['st_user']) && !empty($_SESSION['priv']) && $_SESSION['priv']=="student"){
	if (isset($_POST['ggtype'])){ 
$_SESSION['gtype']=$_POST['ggtype'];
	}
require('header.php');
 ?>

  <?php
                    require_once("navbar.php");
                  ?>
<div class="container-fluid">
    <div class="row row-offcanvas row-offcanvas-left">

             
              <div class="col-md-4">
                <ul class="nav flex-column">
					  <li class="nav-item">
						<a class="nav-link active" href="get.php">New</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="getprocessing.php">Processing</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="getsolved.php">Solved</a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" href="getcancelled.php">Cancelled</a>
					  </li>
				</ul>
				</div>
				 <div class="col-md-8">
                <?php
				
				/*<form action="get.php" method="post">  <input type="hidden" name="sessvar" value="<?php echo $_POST['ggtype']; ?>" />
				  <input type="submit" value="new">
          			 </form>*/
                  require_once("grievance.php");
                  $obj = new grievance();
                  $res = $obj->getgrievancebyid($_SESSION['st_user'],"new",$_SESSION['gtype']);
                  if($res['status']==1 && !empty($res['ival'])){
					  
                    for($i=0; $i<$res['ival'];$i++){
                      ?>
					 
                      <div class="card">
                        <div class="card-header">
                          <?php echo ($res[$i]['raisedon']); ?>&nbsp;<span class="text-success">Status::New</span>
                        </div>
                        <div class="card-body">
                            <?php echo nl2br($res[$i]['complaint']); ?>
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
else {
  header('Location: ./');
}
 ?>
