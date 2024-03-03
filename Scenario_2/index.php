<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href = "style/style.css">
    <title>Login</title>
</html>
<body>
        <div class = "container">
            <div class = "box form-box">
                <?php
                session_start();
                include ('php/config.php');

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $NHSnumber = $_POST['NHSnumber'];
                    $password = $_POST['password'];

                    $sql = "SELECT * FROM users WHERE NHSnumber = '$NHSnumber' AND password = '$password'";
                    
                    $result = mysqli_query($con, $sql);

                    if(mysqli_num_rows($result) == 1){
                        $_SESSION['loggedIn'] = true;
                        header("location: home.php");
                        exit();
                    }else{
                        echo "Invalid login details";
                    }
                }
                ?>
                <header>Login</header>
                <form action = "" method = "post">
                    <div class = "field input">
                        <input type = "text" name = "NHSnumber" required>
                        <label>NHS Number</label>
                    </div>
                    <div class = "field input">
                        <input type = "password" name = "password" required>
                        <label>Password</label>
                    </div>
                    <button type = "submit" class = "submit_btn">Login</button>
            </div>
            <div class = "link">
                Don't have an account? <a href = "register.php">Sign Up Now</a>
            </div>
        </div>
</body>
</html>
