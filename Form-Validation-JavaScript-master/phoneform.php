<?php
  session_start();

  include("phonedb.php");

  if($_SERVER['REQUEST_METHOD']=="POST")
  {
    $fullname= $_POST['name'];
    $gmail= $_POST['email'];
    $phone= $_POST['phone'];
    $add= $_POST['address'];
    $pname= $_POST['pname'];
    $description= $_POST['description'];

    if(!empty($gmail) && !empty($phone) && !is_numeric($gmail))
    {
      $query = "insert into phoneform (name,email,phone,address,pname,description) values ('$fullname','$gmail','$phone','$add','$pname','$description')";

      mysqli_query($con, $query);

      echo "<script type='text/javascript'> 
          alert('Successfully Registered');
          window.location.href = 'technician.html';
      </script>";  
    }
    else{
      echo "<script type='text/javascript'> alert('Please Enter Valid Information')</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link
      rel="stylesheet"
      href="reg.css"
    />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: url("https://png.pngtree.com/thumb_back/fw800/background/20230718/pngtree-3d-render-of-a-smartphone-mobile-website-image_3903786.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        color:#aecef0;
    }

    .container {
        max-width: 500px;
        margin: 50px auto;
        background-color: none;
        backdrop-filter: blur(10px);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-sizing: border-box;
    }

    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        resize: vertical;
    }

    .form-group input[type="file"] {
        margin-top: 5px;
    }

    .form-group input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
        background-color: #0056b3;
    }
    #files{
        padding-bottom: 4px;
        padding-top: 4px;
    }
</style>
<script>
    function Submit() {
        if(document.getElementById("name").value===""){
            alert("Enter Name")
        }
        else if(document.getElementById("email").value===""){
            alert("Enter Email id")
        }
        else if(document.getElementById("phone").value===""){
            alert("Enter Phone no.")
        }
        else if(document.getElementById("address").value===""){
            alert("Enter Address")
        }
        else if(document.getElementById("product_name").value===""){
            alert("Enter Phone Name")
        }
        else if(document.getElementById("description").value===""){
            alert("Enter Description")

        }
        else
        window.open("Confirmationpage.html", "_blank");
  }
</script>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="product_name">Phone Name:</label>
            <input type="text" id="product_name" name="pname" required>
        </div>
        <div class="form-group">
            <label for="model">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div action="#" method="post" enctype="multipart/form-data">
            <label for="product_img"><b>Phone Image:</b></label><br>
            <input type="file" id="files" name="files[]" multiple>
            <br>
            <input type="submit" value="Upload">
        </div>
        <br>
        <div class="form-group" >
            <input type="submit" value="Submit" >
        </div>
    </form>
</div>

</body>
</html>