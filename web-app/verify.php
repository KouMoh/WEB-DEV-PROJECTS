<?php

define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "website");

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if ($conn->connect_error) { 
    die("Connection failure: " . $conn->connect_error); 
}

$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM `login` WHERE `email` = ? AND `password` = ?");
$stmt->bind_param("ss",$email, $password);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    
    header("Location:http://localhost/project/pfp.html");
    exit();
} else {
    
    echo "<script>alert('Incorrect login credentials'); window.location.href = 'register.html';</script>";
}

$stmt->close();
$conn->close();

?>
