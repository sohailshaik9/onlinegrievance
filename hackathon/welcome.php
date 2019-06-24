<?php
@session_start();
if(!empty($_SESSION['rollno'])){

require('header.php');
require('navbar.php');
 ?>
 
 <div class="container">
 <br /><br />
  <div class="row">
         <div class="col-md-4">&nbsp;
         </div>
           <div class="col-md-4">
<h1>welcome<h1>			
            </div>
          <div class="col-md-4">&nbsp;
          </div>
        </div>
  
</div>
   <?php
require('footer.php');
}
else {
  header('Location: loginForm.php');
}
 ?>
