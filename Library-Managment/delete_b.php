<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branch_code = $_POST['branch_code'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library_students";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql = "UPDATE branches SET is_deleted = TRUE WHERE branch_code = $branch_code";

    if ($connection->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>
