<?php
// Database connection
$servername = "localhost:3306";
$username = "root"; // Your MySQL username
$password = "12345678"; // Your MySQL password
$dbname = "student"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'));

    if (isset($data->username) && isset($data->password)) {
        $username = $data->username;
        $password = $data->password;

        // Check if the username and password match the records in the database
        $sql = "SELECT * FROM Logins WHERE usename = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Successful login
            echo json_encode(true);
        } else {
            // Failed login
            echo json_encode(false);
        }
    } else {
        echo json_encode(false);
    }
}

$conn->close();
?>
