<?php

$path = $_SERVER['DOCUMENT_ROOT'];
 include("$path/Main/dbaccess/connection.php");
//include("$path/dbaccess/connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM accesos WHERE Usuario = '$username' AND Password = '$password'";
$users = mysqli_query($conn, $query);

if($users->num_rows == 1)
{
    echo json_encode(array('error' => false));
}
else
{
    echo json_encode(array('error' => true));
}

$conn->close();

?>