<?php
$host = 'lmag6s0zwmcswp5w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'c9a6m6j3v8f2hla5';
$password = 'm57wrm41bvjpaqky';
$database = 'sd7h2o8wbwx5x5lt';

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$query = 'SELECT quantidadeTotal from sd7h2o8wbwx5x5lt.jawsdbcontador order by quantidadeTotal desc LIMIT 1';
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $lastValue = $row['quantidadeTotal'];

    echo json_encode(['success' => true, 'data' => $lastValue]);
} else {
    echo json_encode(['success' => false, 'error' => 'No data found']);
}

$conn->close();
?>
