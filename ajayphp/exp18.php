<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "myDB";


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
echo "Database created successfully";
} else {
echo "Error creating database: " . $conn->error;
}



$sql = "CREATE TABLE book_details(
book_no INT(6) AUTO_INCREMENT PRIMARY KEY,
titile VARCHAR(30) NOT NULL,
edition VARCHAR(30) NOT NULL,
publisher VARCHAR(30))";
if ($conn->query($sql) === TRUE) {
echo "Table MyGuests created successfully";
} else {
echo "Error creating table: " . $conn->error;
}





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_no = $_POST["book_no"];
    $title = $_POST["title"];
    $edition = $_POST["edition"];
    $publisher = $_POST["publisher"];


    
    $sql = "INSERT INTO book_details (book_no, title, edition, publisher) VALUES ('$book_no', '$title', '$edition', '$publisher')";

    if ($conn->query($sql) === TRUE) {
        echo "Book information successfully added to the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$sql = "SELECT * FROM book_details";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Information</title>
</head>
<body>

    <h2>Book Information Form</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="book_no">Book Number:</label>
        <input type="text" name="book_no" required><br>

        <label for="title">Title:</label>
        <input type="text" name="title" required><br>

        <label for="edition">Edition:</label>
        <input type="text" name="edition" required><br>

        <label for="publisher">Publisher:</label>
        <input type="text" name="publisher" required><br>

        <input type="submit" name="submit" value="Add Book">
    </form>

    <h3>Details of All Books</h3>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>Book Number</th>
                <th>Title</th>
                <th>Edition</th>
                <th>Publisher</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["book_no"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["edition"] . "</td>
                <td>" . $row["publisher"] . "</td>
            </tr>";
        }

        echo "</table>";
    } else {
        echo "No books in the database.";
    }

   
    $conn->close();
    ?>

</body>
</html>

