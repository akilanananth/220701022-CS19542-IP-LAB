<?php
include 'header.php';
include 'db_connect.php';

$result = $conn->query("SELECT * FROM CUSTOMER");

if ($result->num_rows > 0) {
    echo "<h2>Customers</h2><table><tr><th>ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Address</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['CID']}</td><td>{$row['CNAME']}</td><td>{$row['PHONE']}</td><td>{$row['EMAIL']}</td><td>{$row['ADDRESS']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No customers found.";
}
?>
