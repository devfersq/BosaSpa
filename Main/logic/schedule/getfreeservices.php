<?php


$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "rsjpjmvn_crm_spa";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];

$query = "CALL ` Patient_GetFreeServices`($id)";

$data = array();
$result = mysqli_query($conn, $query);

while ($row = $result->fetch_assoc()) {
    $data[] = $row; 
}

$finalresult = ['data' => $data, 'errors' => [], 'responseCode' => 200];
echo json_encode($finalresult);

$conn->close();

?>

