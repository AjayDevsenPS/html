<html>
<head>
    <title>Factorial Calculator</title>
</head>
<body>

    <h2>Factorial Calculator</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Enter a number: <input type="text" name="number">
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    function calculateFactorial($num) {
        $factorial = 1;
        for ($i = 1; $i <= $num; $i++) {
            $factorial *= $i;
        }
        return $factorial;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = isset($_POST["number"]) ? $_POST["number"] : null;

        if (is_numeric($number) && $number >= 0) {
            $result = calculateFactorial($number);
            echo "Factorial of $number is $result";
        } else {
            echo "Please enter a non-negative numeric value.";
        }
    }
    ?>

</body>
</html>

