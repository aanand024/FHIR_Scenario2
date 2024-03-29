<?php
    session_start();
    include('php/config.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $NHSnumber = $_POST['NHSnumber'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE NHSnumber = '$NHSnumber' AND password = '$password'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['loggedIn'] = true;
            header("location: home.php");
            exit();
        } else {
            echo "Invalid login details";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
<style>
    .carousel-control-prev,
    .carousel-control-next {
        color: black; 
    }
</style>

    
</head>

<body>
    <nav class="navbar">
        <div class="navbar__container">
            <a href="/" id="navbar__logo">RecovWell</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1 class="animated-title">Welcome!</h1>
            </div>
        </div>
    </div>

    <div class="login-container">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="images/img.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>See your Metrics Over Time </h5>
                            <p>View your heath data and metrics in real-time. Don’t worry, your Doctor will alert you if anything is out of order.</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="images/img2.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Get Expert Advice From Your Doctor </h5>
                            <p>Receive instant advice as you recover from the comfort of your home. </p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="images/img3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Take Control of Your Recovery Today</h5>
                            <p>With our App, we empower patients to feel more comfortable in their post-discharge care. We ensure you don’t feel alone and get relevant help when you need it most. </p>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
            </div>
            

            <div class="col-md-4">
                <h2>Please login below:</h2>
                <!-- <form class="login_form" action="#">
                    <div class="form_group">
                        <label for="NHS_number">NHS number:</label>
                        <input type="text" id="NHS_number" name="NHS_number" required>
                    </div>
    
                    <div class="form_group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
    
                    <div class="form_group">
                        <a href="home.php" class="btn btn-primary">Login</a>
                    </div>
                </form> -->
                <div class="container">
                    <!-- <div class = "box form-box"></div> -->
                    <div class="card">
                        <div class="card-body">

                            
                
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="NHS_number">NHS number:</label>
                                    <input type="text" id="NHS_number" name="NHSnumber" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                                <div class="row mt-4"></div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                            <div class="row mt-4"></div>
                
                            <div class="link">
                                Don't have an account? <a href="register.php">Sign Up Now</a>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        <div class="col-md-1">
            <img src="images/login.jpg" alt="Login Image" style="width: 300px; height: 400px; margin-top: 20px;">
        </div>
            

        </div>
    </div>
    <script>
    $('.carousel').carousel({
        interval: 3000 // Change slide every 3 seconds (3000 milliseconds)
    });
    </script>

</body>
</html>