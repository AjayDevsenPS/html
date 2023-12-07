<html>
<head>
    <title>Student Details</title>
</head>
<body>

    <h2>Student Details Form</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="email">Email ID:</label>
        <input type="email" name="email" required><br>

        <label for="address">Address:</label>
        <textarea name="address" rows="4" required></textarea><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" checked> Male
        <input type="radio" name="gender" value="Female"> Female<br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" required><br>

        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : "";
        $email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
        $address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : "";
        $gender = isset($_REQUEST["gender"]) ? $_REQUEST["gender"] : "";
        $dob = isset($_REQUEST["dob"]) ? $_REQUEST["dob"] : "";

        echo "<h3>Student Details:</h3>";
        echo "Name: $name<br>";
        echo "Email ID: $email<br>";
        echo "Address: $address<br>";
        echo "Gender: $gender<br>";
        echo "Date of Birth: $dob<br>";
    }
    ?>

</body>
</html>

