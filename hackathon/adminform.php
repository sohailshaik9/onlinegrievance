<?php
@session_start();
require_once('header.php');

$_SESSION['loginid'] = rand(1,10000);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
   


    <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/css/mdb.min.css" rel="stylesheet">

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.5/js/mdb.min.js"></script>
</head>


<body>
  <!-- Default form login -->
  <div class="">
    <br>
  <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">

<form class="text-center border border-light p-5" action="admincheck.php" method="POST">

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="text" id="rollno" class="form-control mb-4" placeholder="user id" name="adminid" required>

    <!-- Password -->
    <input type="password" id="pwd" class="form-control mb-4" placeholder="Password" name="pwd" required>
 <input type="hidden" name="sessvar" value="<?php echo $_SESSION['loginid']; ?>" />
    
   

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

    <!-- Register -->
    

</form>
<!-- Default form login -->
</div>
<div class="col-md-4">
</div>

</div>
</div>
</body>
</html>