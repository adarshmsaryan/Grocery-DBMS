<html>
<meta http-equiv="refresh" content="10">
<head>
    <link rel="stylesheet" type="text/css" href="design2.css" >
    <title>Staff Details</title>
    <style>
        table td,th,tr{
            border: 1px solid black;
            margin: 4px auto;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>
<body>
<center><h3>Staff details display</h3></center>
<?php
include('connection.php');
$sql = "SELECT * FROM staff;";
$result = $con->query($sql);

if ($result->num_rows > 0) {
echo "<form action='staffDisplay.php' method='post'>";
  echo "<center>";
    echo "<table><tr><th>Staff ID  </th><th> Name  </th><th>Contact Number  </th><th>Address </th></tr>";

        while($row = mysqli_fetch_array($result)) {
        echo "<tr><td>".$row["staffID"]."</td><td>".$row["staffName"]."</td><td>".$row["staffcontactno"]."&nbsp</td><td>".$row["staffAddress"]."</td>";

            echo "</tr>";
        }
        echo "</form>";
echo "</table>";

}

else {
echo "0 results";
}
if(isset($_POST['deleteRow']))
{
    $pid=$_POST['delID'];
    $show = "select * from staff where staffID='$pid';";
    $res=$con->query($show);
    if($res->num_rows>0)
    {
        $del = "delete from staff where staffID='$pid';";
        $result=$con->query($del);
            echo "<script>document.getElementById('status').innerHTML='Deletion successful!'</script>";
    }
    else
    {
        echo "<script>document.getElementById('status').innerHTML='No such ID found!'</script>";
    }
}
?>
<div id="rectboxD">
<form method="post" action="staffDisplay.php">
    <center><b><font style="color: #b61924;" size="3px">Enter Staff ID to delete</font></b></center>
    <center><input type="text" name="delID" required></center><br>
    <center><input type="submit" name="deleteRow" value="Delete" class="btn"></center>
    <p id="status"></p>
</form>
</div>
<button class="btn"><a href="adminPortal.php">Go back</a></button>
</body>
</html>
