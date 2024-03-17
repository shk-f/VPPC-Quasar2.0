<?php
  session_start();

  include("db.php");

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $uname= $_POST['username'];
    $pwd= $_POST['password'];

    if(!empty($uname) && !empty($pwd))
    {
      $query = "select * from form where username='$uname' ";

      $result= mysqli_query($con, $query);

      if($result){
        if($result && mysqli_num_rows($result)>0)
        {
          $user_data = mysqli_fetch_assoc($result);

          if($user_data['password']==$pwd)
          {
            header("location: services.html");
            die;
          
          }
        }
      }
      echo"<script type='text/javascript'> alert('wrong username or password')</script> ";
    }
    else{
      echo "<script type='text/javascript'> alert('wrong username or password')</script>";
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
      Login
    </h4>

    <div class="container">

      <div class="col-lg-5 m-auto d-block">
        <form action="#" onsubmit="return validation()" class="bg-light" method="POST">
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

          <input
            type="submit"
            name="submit"
            value="Submit"
            class="btn btn-success"
            autocomplete="off"
          />&emsp;&emsp;&emsp;&emsp; Did not have an account?
          <a href="signup.php">SignUp</a>
        </form>

        <br /><br />
      </div>
    </div>
    <script src="./scripts/login.js"></script>
  </body>
</html>
