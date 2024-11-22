<?php
include 'header.php';
include 'db_connect.php';

// Process the transaction form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ano = $_POST['ano'];
    $ttype = $_POST['ttype'];  // 'D' for Deposit, 'W' for Withdrawal
    $tamount = $_POST['tamount'];
    $tdate = date('Y-m-d');

    // Fetch the current balance of the given account
    $balance_query = "SELECT BALANCE FROM ACCOUNT WHERE ANO = $ano";
    $balance_result = $conn->query($balance_query);

    if ($balance_result->num_rows > 0) {
        $row = $balance_result->fetch_assoc();
        $current_balance = $row['BALANCE'];

        // Perform the deposit or withdrawal operation
        if ($ttype == 'D') {
            $new_balance = $current_balance + $tamount;  // Deposit: Add amount
        } elseif ($ttype == 'W') {
            if ($tamount > $current_balance) {
                echo "Error: Insufficient funds!";
                exit;
            }
            $new_balance = $current_balance - $tamount;  // Withdrawal: Subtract amount
        }

        // Update the account balance in the database
        $update_query = "UPDATE ACCOUNT SET BALANCE = $new_balance WHERE ANO = $ano";
        $conn->query($update_query);

        // Insert the transaction into the TRANSACTION table
        $transaction_query = "INSERT INTO TRANSACTION (ANO, TTYPE, TDATE, TAMOUNT) 
                              VALUES ($ano, '$ttype', '$tdate', $tamount)";
        if ($conn->query($transaction_query) === TRUE) {
            echo "Transaction successful! New Balance: $new_balance";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: Account not found.";
    }
}
?>

<!-- Transaction Form -->
<form method="POST">
    <h2>New Transaction</h2>
    <label for="ano">Account No:</label>
    <input type="number" name="ano" id="ano" required>

    <label for="ttype">Transaction Type:</label>
    <select name="ttype" id="ttype" required>
        <option value="D">Deposit</option>
        <option value="W">Withdrawal</option>
    </select>

    <label for="tamount">Amount:</label>
    <input type="number" step="0.01" name="tamount" id="tamount" required>

    <button type="submit">Submit Transaction</button>
</form>

<!-- Display all transactions for the account -->
<?php
if (isset($_POST['ano'])) {
    $ano = $_POST['ano'];

    $transaction_query = "SELECT * FROM TRANSACTION WHERE ANO = $ano ORDER BY TDATE DESC";
    $result = $conn->query($transaction_query);

    if ($result->num_rows > 0) {
        echo "<h3>Transaction History for Account No: $ano</h3>";
        echo "<table>
                <tr>
                    <th>Transaction ID</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Amount</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['TID']}</td>
                    <td>{$row['TTYPE']}</td>
                    <td>{$row['TDATE']}</td>
                    <td>{$row['TAMOUNT']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No transactions found for this account.</p>";
    }
}
?>
