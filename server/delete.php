<?php
$servername = "localhost:3306";
$username = "root"; // Your MySQL username
$password = "12345678"; // Your MySQL password
$dbname = "student"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the regNo has been received

if (isset($_POST['regNo'])) {
    // Escape user input for security
    $regNo = $conn->real_escape_string($_POST['regNo']);

    // Attempt to delete the record
    $sql = "DELETE FROM Registration WHERE regNo = '$regNo'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No regNo received for deletion.";
}

$conn->close();
?>
