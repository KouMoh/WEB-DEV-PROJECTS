<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branch_name = $_POST['branch_name'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "library_students";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    $sql_check = "SELECT * FROM branches WHERE branch_name = '$branch_name'";
    $result = $connection->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Error: Branch name already exists";
    } else {
        $sql = "INSERT INTO branches (branch_name) VALUES ('$branch_name')";
        
        if ($connection->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    }

    $connection->close();
}
?>
