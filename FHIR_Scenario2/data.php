<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check up Questions</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
   
    </style>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1 class="animated-title">View your biometrics here</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="custom-card">
                <div class="card-body">
                    <div class="section">
                        <h2>Resting heart rate</h2>
                        <div class="chart-container">
                            <canvas id="restingHeartRateChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="custom-card">
                <div class="card-body">
                    <div class="section">
                        <h2>Hours of Sleep</h2>
                        <div class="chart-container">
                            <canvas id="sleepChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="custom-card">
                <div class="card-body">
                    <div class="section">
                        <h2>Daily Activity</h2>
                        <div class="chart-container">
                            <canvas id="activityChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="custom-card">
            <div class="card mb-4">
                
                <div class="card-body">
                    <h5 class="card-title">Your recent heart rate readings are below the threshold set by your doctor. </h5>
                    <h8>You are at risk of developing possbile complications. To help avoid this, please schedule an appointment now to see your Doctor.</h8>
                    <div class="spacer"></div>
                    
                    <a href="dr.php" class="btn btn-danger">Schedule an Appointment</a>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
            <div class="card mb-4">
                
                <div class="card-body">
                    <h5 class="card-title">Your number of sleeping hours are within the threshold set by your doctor.</h5>
                    <h8>Good job! Your sleeping patterns are within the recommended bracket.</h8>
                    <div class="spacer"></div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="custom-card">
            <div class="card mb-4">
                
                <div class="card-body">
                    <h5 class="card-title">Your activity can be improved according to the threshold set by your doctor.</h5>
                    <h6> Your Doctor has advised you the following: </h6>
                    <h9>I recommend increasing daily physical activity by incorporating brisk walking or jogging for at least 30 minutes a day. Additionally, integrating enjoyable activities like dancing or cycling can further enhance overall activity levels and contribute to improved health outcomes. </h9>
                    <div class="spacer"></div>
                </div>
                </div>
            </div>
        </div>
    </div>
   
</body>
</html>


   
    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navbarMenu = document.querySelector('.navbar__menu');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('is-active');
            navbarMenu.classList.toggle('active');
        });
    </script>

<script>
    // Resting heart rate chart data
    const restingHeartRateData = {
        labels: ["08/02/24", "09/02/24", "10/02/24", "11/02/24", "12/02/24", "13/02/24", "14/02/24"],
        datasets: [{
            data: [71, 78, 59, 65, 66, 57, 55],
            backgroundColor: 'rgba(20,26,177,1)'
        }]
    };

    const restingHeartRateConfig = {
        type: 'line',
        data: restingHeartRateData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Resting Heart Rate (BPM)'
                }
            }
        }
    };

    const restingHeartRateChart = new Chart(
        document.getElementById('restingHeartRateChart'),
        restingHeartRateConfig
    );
</script>
<script>
    // Sleep chart data
    const sleepData = {
        labels: ["08/02/24", "09/02/24", "10/02/24", "11/02/24", "12/02/24", "13/02/24", "14/02/24"],
        datasets: [{
            data: [8, 7, 6, 7, 8, 7, 6],
            backgroundColor: 'rgba(124,12,67,1)'
        }]
    };

    const sleepConfig = {
        type: 'bar', //  bar chart for sleep hours
        data: sleepData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Hours of Sleep'
                }
            }
        }
    };

    const sleepChart = new Chart(
        document.getElementById('sleepChart'),
        sleepConfig
    );
</script>
<script>
    // Daily activity chart data
    const activityData = {
        labels: ["08/02/24", "09/02/24", "10/02/24", "11/02/24", "12/02/24", "13/02/24", "14/02/24"],
        datasets: [{
            data: [5000, 7000, 6000, 8000, 5500, 6000, 7500],
            backgroundColor: 'rgba(34,139,34,1)'
        }]
    };

    const activityConfig = {
        type: 'bar', // bar chart for daily activity (steps)
        data: activityData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false,
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Daily Activity (Steps)'
                }
            }
        }
    };

    const activityChart = new Chart(
        document.getElementById('activityChart'),
        activityConfig
    );
</script>

</body>
</html>
