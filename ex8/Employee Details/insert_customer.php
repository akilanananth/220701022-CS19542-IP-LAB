<?php
include 'header.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cname = $_POST['cname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO CUSTOMER (CNAME, PHONE, EMAIL, ADDRESS) 
            VALUES ('$cname', '$phone', '$email', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "Customer added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Add New Customer</h2>
    <input type="text" name="cname" placeholder="Customer Name" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="address" placeholder="Address" required>
    <button type="submit">Add Customer</button>
</form>
