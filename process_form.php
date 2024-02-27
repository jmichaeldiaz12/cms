<?php
// Ensure that form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $cnumber = $_POST["number"];
    $password = $_POST["password"];
    $package = $_POST["selection"];

    // Hash the password (use a secure hashing algorithm)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "TWIS";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert data
    $sql = "INSERT INTO CLIENTS (name, email, cnumber, password, package) VALUES ('$name', '$email', '$cnumber', '$hashedPassword', '$package')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
