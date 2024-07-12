<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branch_code = $_POST['branch_code'];
    $branch_name = $_POST['branch_name'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library_students";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql_check = "SELECT * FROM branches WHERE branch_name = '$branch_name' AND branch_code != $branch_code";
    $result = $connection->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Error: Branch name already exists";
    } else {
        $sql = "UPDATE branches SET branch_name = '$branch_name' WHERE branch_code = $branch_code";
        
        if ($connection->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

    $connection->close();
}
?>
