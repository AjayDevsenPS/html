<?php
// Database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$database = "ajay";

// Create a database connection
$connection = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to sanitize user input
function sanitizeInput($data)
{
    global $connection;
    return mysqli_real_escape_string($connection, $data);
}

// Function to display messages
function showMessage($message)
{
    echo "<p>$message</p>";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = sanitizeInput($_POST["username"]);
    $password = sanitizeInput($_POST["password"]);

    // Query to check if the username and password match
    $query = "SELECT * FROM users WHERE username = '$username'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // Check if the username exists in the database
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Check if the password matches
            if (password_verify($password, $row['password'])) {
                // Redirect to the welcome page
                header("Location: welcome.php");
                exit();
            } else {
                showMessage("Incorrect password");
            }
        } else {
            showMessage("Incorrect username");
        }
    } else {
        showMessage("Error: " . mysqli_error($connection));
    }

    // Close the database connection
    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>

