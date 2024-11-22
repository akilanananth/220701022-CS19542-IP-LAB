<?php
// Database connection details
$host = "localhost";
$username = "root";
$password = ""; // Add your MySQL root password if set
$database = "EmployeeDB";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully!<br>";

// Function to retrieve employee details
function getEmployeeDetails($conn) {
    $sql = "SELECT * FROM EMPDETAILS";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h3>Employee Details:</h3>";
        echo "<table border='1'><tr><th>EmpID</th><th>Name</th><th>Designation</th><th>Department</th><th>Date of Joining</th><th>Salary</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['EMPID']}</td>
                    <td>{$row['ENAME']}</td>
                    <td>{$row['DESIG']}</td>
                    <td>{$row['DEPT']}</td>
                    <td>{$row['DOJ']}</td>
                    <td>{$row['SALARY']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
}

// Function to update employee salary
function updateEmployeeSalary($conn, $empID, $newSalary) {
    $sql = "UPDATE EMPDETAILS SET SALARY = ? WHERE EMPID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $newSalary, $empID);

    if ($stmt->execute()) {
        echo "Salary updated successfully for EmpID: $empID<br>";
    } else {
        echo "Error updating salary: " . $stmt->error . "<br>";
    }
    $stmt->close();
}

// Insert sample data (optional)
// Uncomment below lines to insert sample data

$conn->query("INSERT INTO EMPDETAILS VALUES (1, 'John Doe', 'Manager', 'HR', '2020-05-15', 75000.00)");
$conn->query("INSERT INTO EMPDETAILS VALUES (2, 'Jane Smith', 'Analyst', 'Finance', '2019-08-22', 50000.00)");
$conn->query("INSERT INTO EMPDETAILS VALUES (3, 'Emily Davis', 'Developer', 'IT', '2021-01-10', 60000.00)");


// Call the functions
getEmployeeDetails($conn);
updateEmployeeSalary($conn, 1, 80000); // Example: Update salary for EmpID 1

// Display updated records
getEmployeeDetails($conn);

// Close connection
$conn->close();
?>
