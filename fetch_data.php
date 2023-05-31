<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'db_contador';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = 'SELECT
            ifnull(portaria1, 0) + ifnull(portaria2, 0) + ifnull(portaria3, 0) + ifnull(portaria4, 0) + 
            ifnull(portaria5, 0) + ifnull(portaria6, 0) + ifnull(portaria7, 0) + ifnull(portaria8, 0) + 
            ifnull(portaria9, 0) as quantidade_pessoas
            FROM
            db_contador.tb_contador ORDER BY id DESC LIMIT 1';
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
