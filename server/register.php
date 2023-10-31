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

// Check if the AJAX call was made
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['firstName'])) {
    // Escape user inputs for security
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $dateOfBirth = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $address = $conn->real_escape_string($_POST['address']);
    $email = $conn->real_escape_string($_POST['email']);
    $mobilePhone = $conn->real_escape_string($_POST['mobilePhone']);
    $homePhone = $conn->real_escape_string($_POST['homePhone']);
    $parentName = $conn->real_escape_string($_POST['parentName']);
    $nic = $conn->real_escape_string($_POST['nic']);
    $contactNo = $conn->real_escape_string($_POST['contactNo']);

    // Attempt insert query execution
    $sql = "INSERT INTO Registration (firstName, lastName, dateOfBirth, gender, address, email, mobilePhone, homePhone, parentName, nic, contactNo) 
            VALUES ('$firstName', '$lastName', '$dateOfBirth', '$gender', '$address', '$email', '$mobilePhone', '$homePhone', '$parentName', '$nic', '$contactNo')";

    if ($conn->query($sql) === TRUE) {
        echo "Record Added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>