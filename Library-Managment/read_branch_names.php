<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_students";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select branch names
$sql = "SELECT branch_name FROM branches";
$result = $conn->query($sql);

$branchNames = [];
if ($result->num_rows > 0) {
    // Fetching rows
    while ($row = $result->fetch_assoc()) {
        $branchNames[] = $row['branch_name']; // Corrected to 'branch_name'
    }
}

// Close connection
$conn->close();

// Return branch names as JSON
echo json_encode($branchNames);
?>
