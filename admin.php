<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Console</title>
    <link rel="stylesheet" type="text/css" href="design1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body bgcolor="#788599">
<div class="background"><img src="cover.jpg"></div>
<div class="foreground">
    <center><h1>Admin Login</h1></center>
<div id="rectbox" align="center">
    <form method="post" action="admin.php">
        <h2 style="font-family: 'Helvetica Neue'">Login here</h2>
        <br><br>
        <input class="input_values" type="text" name="aid" placeholder="Admin id" required><br><br><br>
        <input class="input_values" type="password" name="pwd" placeholder="Password" required><br><br><br>
        <input type="submit" class="submit-btn" name="submit-btn" value="Submit">
    </form>
</div>
<?php
include('connection.php');
if(isset($_POST['submit-btn']))
{
    $admin_id=$_POST['aid'];
    $password=$_POST['pwd'];
    if($admin_id=='kumar' && $password=='123'|| $admin_id=='adarsh' && $password=='321' || $admin_id=='chaitra' && $password=='111')
    {
        header('location:adminPortal.php');
    }
    else
    {
        $result='<div class="alert alert-danger">Wrong login credentials</div>';
        echo $result;
    }
}
?>
</div>
</body>
</html>