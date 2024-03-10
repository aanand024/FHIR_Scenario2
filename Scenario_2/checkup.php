<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check up Questions</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* 你的页面样式可以在这里添加 */
    </style> 
</head>
<body>
    <!-- 导入导航栏 -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="index.html" id="navbar__logo">Healthcare</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="checkup.html" class="navbar__links">
                        Check up Questions
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="about.html" class="navbar__links">
                        Daily Health Records
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="services.html" class="navbar__links">
                        Health Data Summary
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="blog.html" class="navbar__links">
                        Lab Results
                    </a>
                </li>
                <li class="navbar__item">
                    <a href="contact.html" class="navbar__links">
                        Finding yourself
                    </a>
                </li>
            </ul>
        </div>
    </nav>
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

            <!-- 页面内容 -->
            <h1>Check up Questions</h1>
            <p>Please answer the following questions：</p>
            <form action = "checkup_result.php" method = "post">
                <div>
                    <label for="question1">Have you felt more fatigued than usual</label><br>
                    <textarea id="question1" name="question1" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <label for="question2">Were you able to climb the stairs</label><br>
                    <textarea id="question2" name="question2" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <label for="question3">Did you feel nauseous when getting up?</label><br>
                    <textarea id="question3" name="question3" rows="4" cols="50"></textarea>
                </div>
                <div>
                    <label for="question4">How high can you raise your arm now</label><br>
                    <textarea id="question4" name="question4" rows="4" cols="50"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>

    <!-- 导航栏的 JavaScript 功能 -->
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
