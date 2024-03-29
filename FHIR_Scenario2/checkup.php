<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check up Questions</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <!-- 页面内容 -->
    <div class="container">
        <div class="box form-box">
            <?php
                session_start();
                include ('php/config.php');

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $question1 = mysqli_real_escape_string($con, $_POST['question1']);
                    $question2 = mysqli_real_escape_string($con, $_POST['question2']);
                    $question3 = mysqli_real_escape_string($con, $_POST['question3']);
                    $question4 = mysqli_real_escape_string($con, $_POST['question4']);

                    $sql = "INSERT INTO questions (question1, question2, question3, question4) VALUES ('$question1', '$question2', '$question3', '$question4')";

                    if ($con->query($sql) === TRUE) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $con->error;
                    }
                }
            ?>
        <div class="row">
            <!-- Title Section -->
            <div class="col-md-12 mb-4">
                <h1 class="animated-title">Check up Questions</h1>
                <h4 class="animated-title">Please answer the following questions：</h4>
            </div>
        </div>

    
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body pr-4">
                        <form action = "checkup.php" method = "post">
                            <h4>If you're finding it difficult to type, please go to the Your Dr page to voice-record symptoms.</h4>
                            <div class="form-group">
                                <label for="question1">Have you felt more fatigued than usual?</label>
                                <textarea id="question1" name="question1" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="question2">Were you able to climb the stairs?</label>
                                <textarea id="question2" name="question2" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="question3">Did you feel nauseous when getting up?</label>
                                <textarea id="question3" name="question3" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="question4">How high can you raise your arm now?</label>
                                <textarea id="question4" name="question4" class="form-control" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
    

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Weekly Tiredness</h5>
                                <canvas id="pieChart1" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Card for Emergency Appointment -->
                    <div class="col-md-6">
                        <div class="card mb-4 border-danger">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Emergency Appointment</h5>
                                <p class="card-text">If you think you require immediate medical assistance or have an emergency, please request an appointment here.</p>
                                <a href="dr.html" class="btn btn-danger">Schedule Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
          
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Hours of Sleep (Last Month)</h5>
                                <canvas id="barChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    

    <!-- Pie Charts -->
    <script>
        var pieData1 = {
            labels: ["Fatigue", "No Fatigue"],
            datasets: [{
                data: [3, 7], 
                backgroundColor: ['#ff6384', '#36a2eb']
            }]
        };
        var pieCanvas1 = document.getElementById('pieChart1').getContext('2d');
        var myPieChart1 = new Chart(pieCanvas1, {
            type: 'pie',
            data: pieData1
        });


        var barData = {
        labels: ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14", "Day 15", "Day 16", "Day 17", "Day 18", "Day 19", "Day 20", "Day 21", "Day 22", "Day 23", "Day 24", "Day 25", "Day 26", "Day 27", "Day 28", "Day 29", "Day 30", "Day 31"],
        datasets: [{
            label: 'Hours of Sleep',
            data: [7, 6, 7, 8, 6, 7, 8, 7, 6, 7, 8, 7, 6, 7, 8, 6, 7, 8, 7, 6, 7, 8, 7, 6, 7, 8, 7, 6, 7, 8, 7],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Get the canvas element for the bar chart
    var barCanvas = document.getElementById('barChart').getContext('2d');

    // Create the bar chart
    var myBarChart = new Chart(barCanvas, {
        type: 'bar',
        data: barData,
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

  
    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navbarMenu = document.querySelector('.navbar__menu');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('is-active');
            navbarMenu.classList.toggle('active');
        });
    </script>

</body>
</html>