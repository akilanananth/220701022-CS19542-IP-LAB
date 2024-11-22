<?php
$host = 'localhost';
$user = 'root'; // Default username
$password = ''; // Default password
$dbname = 'LibraryManagement';

// Connect to the database
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
