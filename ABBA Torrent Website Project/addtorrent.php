<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "torrents";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$title = $_POST['title'];
$username = $_POST['username'];
$type = $_POST['type'];
$description = $_POST['description'];


$addnew = "INSERT INTO torrentlist (title, type, username, description)
VALUES ('$title', '$type', '$username', '$description')";

if ($conn->query($addnew) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $addnew . "<br>" . $conn->error;
}

$conn->close();

?>

