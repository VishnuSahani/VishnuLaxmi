<?php 
require('base.php');

 ?> <div class="container-fluid">
 	<div class="row " style="	background-color: #e26228;">
 		<div class="col-lg-4 ">
 			<img src="img/logo2.jpg" class="img img-fluid rounded-circle">
 		</div>
 		 		<div class="col-lg-4 ">

  			<p class="text-center h3 "><span style="font-size: 90px; color: white;" >M</span>aha<span style="font-size: 90px; color: white;">L</span>axmi <span style="font-size: 90px; color: white;">J</span>ewellers</p>

 		</div><!----------------col 4 close----------------->
</div>

 	
 </div><!--------------------container close---------------------->



<div class="container">
	<div class="row">
	
		<div class="col-lg-4 m-auto">
         
<div class="card border-0 border shadow bg-light shadow-lg p-3 mb-5 bg-white rounded jumbotron" style="margin-top:5px;">
	<div class="card-header" style="background-color:#e26228;">
    <h4 align="center" class="text-light"><b>Log In</b></h4>

	</div><!--card header--->
<div class="card-body shadow border">
 			<form method="post" action="index.php">


			 <div class="input-group mb-3">
  <div class="input-group-prepend" style="border-color:#e26228;">
    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user" style="color:#e26228;"></i></span>
  </div>
   	<input type="text" name="username" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" style="border-color: #e26228;background-color: transparent;" class="form-control">


</div>
   <small class="form-text text-muted">We'll never share your password with anyone else.</small>

<!------ ----->
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock" style="color:#e26228;"></i></span>
  </div>
 					

  <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon2" style="border-color:#e26228;background-color: transparent;">
</div>
<!---  ----->
<center>
	 <button type="submit" name="submit" onclick="login_fun();" class="btn btn-outline" style="background-color:#e26228;color:#FFFFFF;">Log in</button>

       </center>

              
             





</FORM>
		</div><!---card body--->
</div><!---card main-->
     	
		</div><!--col -->

	</div><!--roww-->

</div> <!--container--->
 <?php 
if (isset($_POST['submit'])) {
	  $username = $_POST['username'];
	 $password = $_POST['password'];
	 $a=1;
	 if($username=="hum" && $password=="tum")	
	 //if($a)
	 {
	 	header("location:bill-page.php");
	 			//echo"<script> window.open('/bill-page.php','_self')</script>";

	 	
	 }	
	 else
	 {
	 	echo "<h3 class='text-danger text-center'>Sorry! Your either username or password are wrong</h3>";
	 }

}

require('footer.php');
 ?>