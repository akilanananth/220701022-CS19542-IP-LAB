<?php
include 'header.php';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $atype = $_POST['atype'];
    $balance = $_POST['balance'];
    $cid = $_POST['cid'];

    $sql = "INSERT INTO ACCOUNT (ATYPE, BALANCE, CID) VALUES ('$atype', $balance, $cid)";
    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    <h2>Add New Account</h2>
    <select name="atype" required>
        <option value="S">Savings</option>
        <option value="C">Current</option>
    </select>
    <input type="number" step="0.01" name="balance" placeholder="Initial Balance" required>
    <input type="number" name="cid" placeholder="Customer ID" required>
    <button type="submit">Add Account</button>
</form>
