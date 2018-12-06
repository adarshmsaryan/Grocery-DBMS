<?php
/**
 * Created by PhpStorm.
 * User: kumar
 * Date: 3/10/18
 * Time: 6:02 PM
 *
 */
include ('connection.php');
$id = $_GET['id'];
echo $id;
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
$sql = "DELETE FROM product WHERE prodID = $id";

if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location:adminPortal.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>