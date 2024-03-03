<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style/style.css">
    <title>Register</title>
</html>
<body>
        <div class = "container">
            <div class = "box form-box">

            
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
                            echo "<a href='index.php'><button>Go Back</button></a>";
                        }
                    }
                ?>
                <header>Sign Up</header>
                <form action = "" method = "post">
                    <div class = "field input">
                        <input type = "text" name = "name" autocomplete="off" required>
                        <label>Full Name</label>
                    </div>
                    <div class = "field input">
                        <input type = "text" name = "NHSnumber" autocomplete="off" required>
                        <label>NHS Number</label>
                    </div>
                    <div class = "field input">
                        <input type = "password" name = "password" autocomplete="off" required>
                        <label>Password</label>
                    </div>
                    <button type = "submit" class = "submit_btn">Register</button>
            <div class="links">
                Already have an account? <a href="index.php">Login</a>
            </div>
        </div>
</body>
</html>
