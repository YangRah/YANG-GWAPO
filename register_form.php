<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $status = mysqli_real_escape_string($conn, $_POST['status']);
   $pass = md5($password);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['status'];

   $select = "SELECT * FROM form WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   }else{
      if($pass != $cpass){
         $error[] = 'Passwords do not match!';
      }else{
         $insert = "INSERT INTO form (username, password, lastname, firstname, middlename, email, status) VALUES ('$username', '$pass', '$lastname', '$firstname', '$middlename', '$email', '$status')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">
   <form action="" method="post">
      <h2>Register Now</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="text" name="username" required placeholder="Enter your username">
      <input type="text" name="lastname" required placeholder="Enter your lastname">
      <input type="text" name="firstname" required placeholder="Enter your firstname">
      <input type="text" name="middlename" placeholder="Enter your middlename">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="status">
         <option value="active">Active</option>
         <option value="inactive">Inactive</option>
      </select>
      <input type="submit" name="submit" value="Register Now" class="form-btn">
      <p>Already have an account? <a href="login_form.php">Login Now</a></p>
   </form>
</div>

</body>
</html>