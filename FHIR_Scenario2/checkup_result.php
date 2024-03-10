<?php
session_start();
include ('php/config.php');

$sql = "SELECT * FROM questions ORDER BY id DESC";

$result = mysqli_query($con, $sql);

if(!$result) {
    die("Query Failed: " . mysqli_error($con));
}

if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
} else {
    echo "No results found";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check up Results</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Check up Results</header>
            <p>Question 1: <?php echo $row['question1']; ?></p>
            <p>Question 2: <?php echo $row['question2']; ?></p>
            <p>Question 3: <?php echo $row['question3']; ?></p>
            <p>Question 4: <?php echo $row['question4']; ?></p>
        </div>
    </div>
</body>
</html>