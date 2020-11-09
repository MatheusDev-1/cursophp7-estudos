<?php

$conn = new mysqli("localhost", "root", "", "db_php7");

if ($conn->connect_error) {
	echo "Error: " . $conn->connect_error;
	exit;
};

// $stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES(?, ?)");

// $login = "em12106";
// $pass = "brscan22";

// $stmt->bind_param("ss", $login, $pass);

// $stmt->execute();

$result = $conn->query("SELECT * FROM tb_usuarios ORDER BY deslogin");

$data = array();

while ($row = $result->fetch_assoc()) {
	array_push($data, $row);
};

echo json_decode($data);


?>