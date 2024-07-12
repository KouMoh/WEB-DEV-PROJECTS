<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_students";

$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if (isset($_GET['branch_code'])) {
    $branch_code = $_GET['branch_code'];
    $sql = "SELECT * FROM branches WHERE branch_code = $branch_code AND is_delted = FALSE";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    }
} else {
    $sql = "SELECT * FROM branches WHERE is_delted = 0";
    $result = $connection->query($sql);
    $rows = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rows[] = [
                'branch_code' => $row['branch_code'],
                'branch_name' => $row['branch_name'],
                'created_at' => $row['created_at']
            ];
        }
    }
    echo json_encode($rows);
}

$connection->close();
?>
