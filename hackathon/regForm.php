<?php
@session_start();
require_once('header.php');

$_SESSION['signupid'] = rand(1,10000);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Reg Form</title>
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
    <!-- Material form register -->
    <div class="">
        <br>
        <div class="row"> 
<div class="col-md-4">
</div>
<div class="col-md-4">
        <!-- Default form register -->
<form
 class="text-center border border-light p-5" action="register.php" method="POST" onsubmit="validate()">

    <p class="h4 mb-4">Sign up</p>

    <div class="form-row mb-4">
        <div class="col">
            <!--  name -->
            <input type="text" id="name" class="form-control" placeholder="Name" name="name" required>
        </div>
       
    </div>

        <div class="form-row mb-4">
        <div class="col">
            <!--  roll -->
            <input type="text" id="rollno" class="form-control" placeholder="Roll No" name="rollno" required>
        </div>
       
    </div>

    <!-- E-mail -->
    <input type="email" id="mail" class="form-control mb-4" placeholder="E-mail" name="mail" required>

    <!-- Password -->
    <input type="password" id="pwd" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="pwd" required>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>


    <!-- COnfirm Password -->
    <input type="password" id="cpwd" class="form-control" placeholder="Confirm Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="cpwd" required>
     <input type="hidden" name="sessvar" value="<?php echo $_SESSION['signupid']; ?>" />
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>



    

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Sign Up</button>

   

    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->
</div>
<div class="col-md-4">
</div>
</div>

</body>
<script >
 function validate()                              
{ 

    var name = document.getElementById("name");   
    var roll=document.getElementById("rollno")        
    var email =document.getElementById("mail"); 
    var conpwd=document.getElementById("cpwd");
    var password = document.getElementById("pwd"); 
    if (name.value == "")                                
    { 
        window.alert("Please enter your name."); 
        name.focus(); 
        return false; 
    } 
    if(roll.length()!=10)
    {
      alert("roll no should contain 10 characters"); 
        rollno.focus(); 
        return false;
    }

    
    if (email.value == "")                               
    { 
        alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 

    if (email.value.indexOf("@", 0) < 0)                 
    { 
        alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 

    if (email.value.indexOf(".", 0) < 0)                 
    { 
        alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 

   

    if (password.value == "")                    
    { 
        alert("Please enter your password"); 
        password.focus(); 
        return false; 
    } 
    if(password.value!=conpwd.value)
    {
        alert("Ur passwords should match");

        return false;
    }

    return true; 
}

</script>

<!-- Material form register -->


</html>