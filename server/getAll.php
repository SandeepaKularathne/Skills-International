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

// Prepare the SELECT statement
$stmt = $conn->prepare("SELECT regNo,firstName, lastName, dateOfBirth, gender, address, email, mobilePhone, homePhone, parentName, nic, contactNo FROM Registration");
$stmt->execute();
$stmt->bind_result($regNo,$firstName, $lastName, $dateOfBirth, $gender, $address, $email, $mobilePhone, $homePhone, $parentName, $nic, $contactNo);

// Create an array to store the data
$data = array();
while ($stmt->fetch()) {
    $item = array(
        'regNo' => $regNo,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dateOfBirth' => $dateOfBirth,
        'gender' => $gender,
        'address' => $address,
        'email' => $email,
        'mobilePhone' => $mobilePhone,
        'homePhone' => $homePhone,
        'parentName' => $parentName,
        'nic' => $nic,
        'contactNo' => $contactNo
    );
    array_push($data, $item);
}

// Convert the array to a JSON string
$json_string = json_encode($data);

// Output the JSON string
echo $json_string;

$stmt->close();
$conn->close();


?>
