<?php
include 'header.php';
include 'db_connect.php';

$sql = "SELECT A.ANO, A.ATYPE, A.BALANCE, C.CNAME 
        FROM ACCOUNT A 
        JOIN CUSTOMER C ON A.CID = C.CID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Accounts</h2><table><tr><th>Account No</th><th>Type</th><th>Balance</th><th>Customer</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['ANO']}</td><td>{$row['ATYPE']}</td><td>{$row['BALANCE']}</td><td>{$row['CNAME']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "No accounts found.";
}
?>
