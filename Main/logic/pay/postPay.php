<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include("$path/Main/dbaccess/connection.php");
//include("$path/dbaccess/connection.php");

$cutomerID =  $_POST['cutomerID'];
$orderID =  $_POST['orderID'];
$paytotal =  $_POST['paytotal'];
$totalRemaining =  $_POST['totalRemaining'];
$dateCash =  $_POST['dateCash'];
$type =  $_POST['type'];
$status =  $_POST['status'];
$totalCash =  $_POST['totalCash'];
$query = "INSERT INTO `orders` (`id`, `idCliente`, `idOrden`, `Status`, `remaining`, `totalPay`, `dateCreate`, `Total`) VALUES (NULL, $cutomerID, $orderID, '$status', $totalRemaining,$paytotal,'$dateCash', $totalCash);";
$data = array();
$resultado = mysqli_query($conn, $query);
while ($row = $resultado->fetch_assoc()) {
    $data[] = $row;
}

$finalresult = ['data' => $data, 'errors' => [], 'responseCode' => 200];
echo json_encode($finalresult);

$conn->close();
?>