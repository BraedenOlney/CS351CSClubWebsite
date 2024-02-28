<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="CSS/styles.css" rel="stylesheet">
    <title>PHP Greeting</title>
</head>
<body>



<!-- Meant for Creating an Account or Loging in-->
<?php
// Check if the form is submitted on the Apache Server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's name from the form
    $name = $_POST["name"];

    // Display a personalized greeting
    //if(user has been here before){
    //echo "<h2>Hello, $name! Welcome Back.</h2>";
    //}else{ // user created an account
    echo "<h2>Hello, $Name!</h2>";
    //}
}
?>


</body>
</html>
