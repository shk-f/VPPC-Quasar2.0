<?php
  session_start();

  include("db.php");

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $fullname= $_POST['name'];
    $gmail= $_POST['email'];
    $uname= $_POST['username'];
    $pwd= $_POST['password'];
    $cpwd= $_POST['cpassword'];
    $mob= $_POST['mobile'];

    if(!empty($gmail) && !empty($pwd) && !is_numeric($gmail))
    {
      $query = "insert into form (name,email,username,password,cpassword,mobile) values ('$fullname','$gmail','$uname','$pwd','$cpwd','$mob')";

      mysqli_query($con, $query);

      echo "<script type='text/javascript'> 
          alert('Successfully Registered');
          window.location.href = 'services.html';
      </script>";  
    }
    else{
      echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  </head>
  <body style="background-color: black;">
    <img src="logo.jpg" height="100px" width="200px" style="display: block; margin: 0 auto;" >

    <h4 class="text-blue text-center font-weight-bold" style="font-size: 20px; color:white">
      Sign Up
    </h4>

    <div class="container" >

      <div class="col-lg-5 m-auto d-block" >
        <form method="POST" action="#" onsubmit="return openServices()" class="bg-light">
          <div class="form-group" style="background-color: grey;">
            <label for="name" class="font-weight-regular"> Name </label>
            <input
              type="text"
              name="name"
              class="form-control"
              id="name"
              autocomplete="off"
            />
            <span id="Name" class="text-danger font-weight-regular"> </span>
          </div>

          <div class="form-group" style="background-color: grey;">
            <label class="font-weight-regular"> Email </label>
            <input
              type="text"
              name="email"
              class="form-control"
              id="emails"
              autocomplete="off"
            />
            <span id="emailids" class="text-danger font-weight-regular"> </span>
          </div>

          <div class="form-group" style="background-color: grey;">
            <label for="user" class="font-weight-regular"> Username </label>
            <input
              type="text"
              name="username"
              class="form-control"
              id="user"
              autocomplete="off"
            />
            <span id="username" class="text-danger font-weight-regular"> </span>
          </div>

          <div class="form-group" style="background-color: grey;">
            <label class="font-weight-regular"> Password </label>
            <input
              type="password"
              name="password"
              class="form-control"
              id="pass"
              autocomplete="off"
            />
            <span id="passwords" class="text-danger font-weight-regular">
            </span>
          </div>

          <div class="form-group" style="background-color: grey;">
            <label class="font-weight-regular"> Confirm Password </label>
            <input
              type="password"
              name="cpassword"
              class="form-control"
              id="conpass"
              autocomplete="off"
            />
            <span id="confrmpass" class="text-danger font-weight-regular">
            </span>
          </div>

          <div class="form-group" style="background-color: grey;">
            <label class="font-weight-regular"> Mobile Number </label>
            <input
              type="text"
              name="mobile"
              class="form-control"
              id="mobileNumber"
              autocomplete="off"
            />
            <span id="mobileno" class="text-danger font-weight-regular"> </span>
          </div>

          <input
            type="submit"
            name="submit"
            value="Submit"
            class="btn btn-primary"
            autocomplete="off"
            onclick="openServices()"
          />
          <input
            type="reset"
            name="reset"
            value="Reset"
            class="btn btn-secondary"
            autocomplete="off"
          />
          &emsp;&emsp;&emsp;Already have an account?
          <a href="login.php">Login</a>
        </form>

        <br /><br />
      </div>
    </div>

    <script src="./scripts/signup.js"></script>
  </body>
</html>
