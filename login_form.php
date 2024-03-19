<?php
global $con;
session_start();
include 'connection.php';



$error = []; // Initialize the $error array

if(isset($_POST['submit'])){
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('Location: admin_page.php');
         exit(); // Add an exit statement after the header redirect
      } elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('Location: user_page.php');
         exit(); // Add an exit statement after the header redirect
      }
   } else {
      $error[] = 'Incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
   <!-- <style>
      input{
         border-radius: none;
      }
      .form-container{
         background: white;
      }
      .form-container form{
         width: auto;
         height: auto;
         background: white;
         border-radius: 0;
         box-shadow: none;
      }
      label {
         display: block;
         text-align: left;
      }
      .log{
         display: flex;
         justify-content: center;
         align-items: center;

      }
      .form-container form input,
      .form-container form select{
         width: 100%;
         padding:10px 15px;
         font-size: 17px;
         margin:8px 0;
         background: white;
         border: 1px solid black;
         border-radius: 5px;
      }
      .form-container form .form-btn{
         background: #f1f1f1;
         color:black;
         text-transform: capitalize;
         font-size: 20px;
         cursor: pointer;
      }
      .form-container form .form-btn:hover{
         background:black;
         color:white;
         text-transform: capitalize;
         font-size: 20px;
         cursor: pointer;
      }
      .login{ 
         text-decoration: underline;
      }
      .login:visited{
         text-decoration: underline black;
      }
      .register:visited>h3{
         color: gray;
      }
      .register{
         margin-left: 50px;
         text-decoration: underline gray;
      }
      .register:hover{
         background-color: black;
      }
      .register:hover>h3{
         color: white;
      }
      .form-btn{
         background: gray;
         color: black;
      }
   </style> -->
</head>
<body>
   <div class="wrap">
      <div class="form-container wrap-log">

      <form action="" method="post">
         <div class="log">
            <a href="login_form.php" class="login"><h3>Login</h3>
               <hr>
            </a>

         </div>
      
         <?php
         if(!empty($error)){ // Use !empty() instead of isset() to check if $error is not empty
            foreach($error as $errorMsg){
               echo '<span class="error-msg">'.$errorMsg.'</span>';
            }
         }
         ?>
         <label class="em" for="" style="text-align: right">EMAIL</label>
         <input style="border-radius:0;border-color:#000;" type="email" name="email" required placeholder="Email">
         <label class="pw" style="text-align: left" for="">PASSWORD</label>
         <input type="password" style="border-radius:0;border-color:#000;" name="password" required placeholder="Password">

         <input style="border-radius:0;border-color:#000;" type="submit" name="submit" value="Login Now" class="form-btn">
         <p>Don't have an account? <a href="register_fo rm.php">Register Now</a></p>
      </form>

   </div>

   </div>

</body>
</html>