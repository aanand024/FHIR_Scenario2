<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
</head>
<body>
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.php" id="navbar__logo">RecovWell</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="checkup.php" class="navbar__links">
                        Check up Questions
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="Records.php" class="navbar__links">
                        Daily Health Records
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="data.php" class="navbar__links">
                        Health Data Summary
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="dr.php" class="navbar__links">
                        Your Dr
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="home.php" class="navbar__links">
                        Home
                    </a>
                </li>
            </ul>
        </div>
    </nav>

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

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <h1 class="animated-title">Previous Records</h1>
            <h2 class="animated-title">View your previous records here!</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4>Today</h4>
                    <p>Have you felt more fatigued than usual? <?php echo $row['question1']; ?></p>
                    <p>Were you able to climb the stairs? <?php echo $row['question2']; ?></p>
                    <p>Did you feel nauseous when getting up? <?php echo $row['question3']; ?></p>
                    <p>How high can you raise your arm now? <?php echo $row['question4']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
