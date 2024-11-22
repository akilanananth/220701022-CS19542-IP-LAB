<?php
include 'db.php';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $edition = $_POST['edition'];
        $price = $_POST['price'];

        $sql = "INSERT INTO BOOK (TITLE, AUTHOR, PUBLISHER, EDITION, PRICE) VALUES ('$title', '$author', '$publisher', '$edition', '$price')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        $accno = $_POST['accno'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publisher = $_POST['publisher'];
        $edition = $_POST['edition'];
        $price = $_POST['price'];

        $sql = "UPDATE BOOK SET TITLE='$title', AUTHOR='$author', PUBLISHER='$publisher', EDITION='$edition', PRICE='$price' WHERE ACCNO=$accno";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $accno = $_POST['accno'];

        $sql = "DELETE FROM BOOK WHERE ACCNO=$accno";
        $conn->query($sql);
    }
}

// Fetch all books
$result = $conn->query("SELECT * FROM BOOK");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Library Management System</h1>
    
    <form method="POST">
        <input type="hidden" name="accno" placeholder="Acc No">
        <input type="text" name="title" placeholder="Title" required>
        <input type="text" name="author" placeholder="Author" required>
        <input type="text" name="publisher" placeholder="Publisher" required>
        <input type="text" name="edition" placeholder="Edition" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <button type="submit" name="add">Add Book</button>
        <button type="submit" name="update">Update Book</button>
        <button type="submit" name="delete">Delete Book</button>
    </form>

    <h2>Book List</h2>
    <table>
        <thead>
            <tr>
                <th>Acc No</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Edition</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['ACCNO']; ?></td>
                    <td><?php echo $row['TITLE']; ?></td>
                    <td><?php echo $row['AUTHOR']; ?></td>
                    <td><?php echo $row['PUBLISHER']; ?></td>
                    <td><?php echo $row['EDITION']; ?></td>
                    <td><?php echo $row['PRICE']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
