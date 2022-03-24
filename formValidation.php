<?php 
  $nameError = "";
  $fnameError = "";
  $emailError = "";
  $phoneError = "";
  $passwordError = "";
  $confirm = "";
  $true =[];
  $success = "";

  if(isset($_POST['user'])){
    
      $name = $_POST['userName'];
      if($name==""){
            $nameError = "Please fill the User name !!";
      }elseif(strlen($name)<4){
            $nameError = " User name is too short !!";
      }else{
         echo $nameError;
              }
      $fname = $_POST['firstName'];
      if($fname==""){
            $fnameError = "Please fill the name !!";
      }elseif(strlen($fname)<4){
            $fnameError = "Name is too short !!";
      }else{
         $true = true;
      }

      $email = $_POST['email'];
      if($email==""){
            $emailError = "Please fill the email !!";
      }elseif(strpos($email,"@")==false){
            $emailError = "Please enter valid email '@' is missing !!";
      }else{
         $true = true;
      }
       
      $phone = $_POST['phone'];
      if($phone==""){
            $phoneError = "Please fill the Phone Number!!";
      }elseif(strlen($phone)<10){
            $phoneError = "phone number should be 10 digits long !!";
      }else{
         $true = true;
      }

//"^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$"

      $password = $_POST['password'];
      $passPtrn = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$@!%&*?])[A-Za-z\d#$@!%&*?]{8,30}$/";

      if(preg_match($passPtrn,$password)==0){
       $passwordError = "Password should contain 1 uppercase,lowercase,specialcharter,number Minimum 8";
      }else{
        $true = true;
      }
        
      $confirmPassword = $_POST['cpassword'];
      if($confirmPassword != $password){
        $confirm = "Password and confirmPassword should be same !!"; 
      } else{
         $true = true;
      }
       if($nameError=="" && $fnameError=="" && $emailError=="" && $phoneError=="" && $passwordError=="" && $confirm==""){
           $success = "Data Insert Successfully";
       }else{

       }
      
       
  } 




?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h3 class="text-center mt-4">Form Validation</h3>
         <?php
           echo "<h3 class='text-center' style='color:green';>".$success."</h3>";
          ?> 
          <form class="mt-3" method="POST" name="user" action="">
             <input type="text" class="form-control" name="userName" value="<?php echo isset($_POST['userName'])? $_POST['userName'] : '';?>" placeholder="User Name"><br>

             <?php 

             echo"<p style='color:red;'>".$nameError."<p>";
           ?>
             <input type="text" class="form-control" name="firstName" placeholder="First Name" value="<?php echo isset($_POST['firstName'])? $_POST['firstName'] : '';?>"><br>
             <?php echo"<p style='color:red;'>".$fnameError."</p>";?>
             <input type="num" class="form-control" name="email" placeholder="Enter Email" value="<?php echo isset($_POST['email'])? $_POST['email'] : '';?>"><br>
             <?php echo"<p style='color:red;'>".$emailError."</p>";?>
             <input type="num" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo isset($_POST['phone'])? $_POST['phone'] : '';?>"><br>
             <?php echo"<p style='color:red;'>".$phoneError."</p>";?>
             <input type="password" class="form-control" name="password" placeholder="password" value="<?php echo isset($_POST['password'])? $_POST['password'] : '';?>"><br>
             <?php echo"<p style='color:red;'>".$passwordError."</p>";?>
              <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password" value="<?php echo isset($_POST['cpassword'])? $_POST['cpassword'] : '';?>"><br>
              <?php echo"<p style='color:red;'>".$confirm."</p>";?>
         
             <input type="submit" class="btn btn-success btn-block" name="user"><br>

          </form>
        </div>
      </div>
    </div>
    
  </body>
</html>