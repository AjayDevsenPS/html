

<html>
<head>
    <title>Odd or Even Checker</title>
</head>
<body>

<form method="GET" action="">
    <label for="number">Enter a number:</label>
    <input type="text" id="number" name="number" required>
    <input type="submit" value="check">
</form>

<?php

if (isset($_GET['number'])) {
    $number = $_GET['number'];

    if (is_numeric($number)) {
	if($number==0){
	   echo"The number is zero.";
	}
        if (($number % 2 == 0)&&($number!=0)) {
            echo "{$number} is even.";
        }if(($number%2!==0)&&($number!=0)) {
            echo "{$number} is odd.";
        }
    } else {
        echo "Please enter a valid number.";
    }
} else {
    echo "Please enter a number.";
}
?>
</body>
</html>

