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
                <h2>Please register below:</h2>
                <div class = "container">
                    <!-- <div class = "box form-box"> -->
                    <div class="card">
                        <div class="card-body">
        
                    
                        <?php
                            include "php/config.php";
                            if(isset($_POST['name'])){
                                $name = $_POST['name'];
                                $NHSnumber = $_POST['NHSnumber'];
                                $password = $_POST['password'];
                                $verify_query = mysqli_query($con, "SELECT * FROM users WHERE NHSnumber = '$NHSnumber'");
                                
                                if(mysqli_num_rows($verify_query) > 0){
                                    echo "<script>alert('NHS Number already exists')</script>";
                                } else {
                                    mysqli_query($con, "INSERT INTO users (name, NHSnumber, password) VALUES ('$name', '$NHSnumber', '$password')")
                                    or die(mysqli_error($con));
                                    echo "<script>alert('Registration Successful')</script>";
                                    echo "<a href='login.php'><button type='submit' class='btn btn-primary'>Go Back</button></a>";

                                }
                            }
                        ?>
                   
                        <form action = "" method = "post">
                            <div class = "field input">
                                <label for="Full_name">Full name</label>
                                <input type = "text" name = "name" autocomplete="off" required>
                                
                            </div>
                            <div class = "field input">
                                <label for="NHS_number">NHS number:</label>
                                <input type = "text" name = "NHSnumber" autocomplete="off" required>
                                
                            </div>
                            <div class = "field input">
                                <label for="Password">Password</label>
                                <input type = "password" name = "password" autocomplete="off" required>
                                
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                            <!-- <button type = "submit" class = "submit_btn">Register</button> -->
                            <div class="links">
                                Already have an account? <a href="login.php">Login</a>
                            </div>
                        </form>
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