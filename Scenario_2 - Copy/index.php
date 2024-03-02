<?php
    session_start();

?>
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
                /* problem: wont alert even if i entered a wrong NHS and password */
                    include("php/config.php");
                    if (isset($_POST['NHSnumber'])){
                        $name = $_POST['name'];
                        $NHSnumber = $_POST['NHSnumber'];
                        $password = $_POST['password'];
                        $query = "SELECT * FROM users WHERE NHSnumber = '$NHSnumber' AND password = '$password'";
                        $result = mysqli_query($con, "SELECT* FROM users WHERE NHSnumber = '$NHSnumber' AND password = '$password'") 
                        or die(mysqli_error($con));
                        $rows = mysqli_fetch_assoc($result);
                        
                        if($rows) {
                            $_SESSION['name'] = $rows['name'];
                            $_SESSION['NHSnumber'] = $rows['NHSnumber'];
                            $_SESSION['id'] = $rows['id'];
                        } else {
                            echo "<script>alert('Invalid NHS Number or Password')</script>";
                            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                        }
                        
                        if(isset($_SESSION['NHSnumber'])){
                            header("Location: home.php");
                            exit();
                        }
                    }else{
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
            <?php } ?>
        </div>
</body>
</html>
