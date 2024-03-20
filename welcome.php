<?php
session_start();

// Check if user is not logged in, redirect to login page
if(!isset($_SESSION['username'])) {
    header('Location: login_form.php');
    exit();
}

// Display username
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>welcome</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="welcome-container">
   <h3>Welcome, <?php echo $username; ?>!</h3>
   <p>THIS IS DANOSO PAGE</p>
   <p><a href="logout.php">Logout</a></p>
</div>

</body>
</html>