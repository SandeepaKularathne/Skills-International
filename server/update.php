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

// Escape user inputs for security
$regNo = $conn->real_escape_string($_POST['regNo']);
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



// SQL UPDATE query
$sql = "UPDATE Registration 
        SET 
        firstName='$firstName',
        lastName='$lastName',
        dateOfBirth='$dateOfBirth',
        gender='$gender',
        address='$address',
        email='$email',
        mobilePhone='$mobilePhone',
        homePhone='$homePhone',
        parentName='$parentName',
        nic='$nic',
        contactNo='$contactNo'
        WHERE regNo='$regNo'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
