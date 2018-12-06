<html>
<meta http-equiv="refresh" content="4">
<head>
    <title>Admin Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="design2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<div class="background">

</div>
<div class="foreground">
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
          <!--  <a class="navbar-brand" href="index.php.php">Home</a>-->&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a class="navbar-brand" href="addProduct.php" >Add Product</a>
            <a class="navbar-brand" href="addStaff.php">Add Staff</a>
            <a  class="navbar-brand" href="staffDisplay.php">Staff display</a>
            &emsp;&emsp;&emsp;
        </div>

        <div style="margin-top: 8px;">
        <form method="post">
            <button type="submit" name="logout" style="background:lawngreen ;" class="btn">Logout</button>
        </form>
        </div>
    </div>
</nav>
<br>
    <div id="titl">
    <h3><center><font color="#7fff00">Product Details</font></center></h3>
    </div>
<div id = "rect4">
<?php
include('connection.php');
$sql = "SELECT * FROM product;";
$result = $con->query($sql);
if ($result->num_rows > 0) {
    echo '<form action="'.$_SERVER['PHP_SELF'].'" method="GET">';
    echo "<table><tr><th><center>Product ID</center></th><th><center> Name</center>  </th><th><center>Amount</center></th><th><center>Seller</center></th></tr>";

    while($row = mysqli_fetch_array($result)) {
        echo "<tr><td>".$row["prodID"]."</td><td>".$row["prodName"]."</td><td>".$row["amount"]."&nbsp</td><td>".$row["prodSeller"]."</td>";
        echo "</tr>";
    }
    echo "</form>";
    echo "</table>";

}
else {
    echo "0 results";
}
if(isset($_POST['logout'])) {

    unset($_SESSION['adid']);
    header('location:index.php');
    session_destroy();
}
if(isset($_POST['deleteRow']))
{
    $pid=$_POST['delID'];
    $show = "select * from product where prodID='$pid';";
    $res=$con->query($show);
    if($res->num_rows>0)
    {
        $del = "delete from product where prodID='$pid';";
        $result=$con->query($del);
        if($result)
        {
        echo "<script>document.getElementById('status').innerHTML='Deletion successful!'</script>";
        }
        else
        {
            echo "Error";
        }
    }
    else
    {
        echo "<script>document.getElementById('status').innerHTML='No such ID found!'</script>";
    }
}
?>
</div>
    <br>
    <div id="rectboxD">

    <form method="post" action="adminPortal.php">
       <center><b><font style="color: #b61924;" size="3px">Enter Product ID to delete</font></b></center>
        <center><input type="text" name="delID" required></center><br>
        <center><input type="submit" name="deleteRow" value="Delete" class="btn"></center>
        <p id="status"></p>
    </form>
    </div>

</div>
</body>
</html>
