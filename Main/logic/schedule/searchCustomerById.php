<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include("$path/Main/dbaccess/connection.php");
//include("$path/dbaccess/connection.php");

$id = $_POST['id'];
$query = "CALL Patient_GetById('$id');";

$data = array();
$resultado = mysqli_query($conn, $query);
while ($row = $resultado->fetch_assoc()) {
    $data[] = $row;
}

$finalresult = ['data' => $data, 'errors' => [], 'responseCode' => 200];
echo json_encode($finalresult);

$conn->close();
?>