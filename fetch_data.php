<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'db_contador';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = 'SELECT quantidade_pessoas FROM tb_contador ORDER BY id DESC LIMIT 1';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastValue = $row['quantidade_pessoas'];

    echo json_encode(['success' => true, 'data' => $lastValue]);
} else {
    echo json_encode(['success' => false, 'error' => 'No data found']);
}

$conn->close();
?>
