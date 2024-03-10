<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RecovWell</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>

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
        <!-- Apply the custom class to the h1 element -->
      
        <div class="row">
            <!-- Title Section -->
            <div class="col-md-12 mb-4">
                <h1 class="animated-title">Welcome to RecovWell!</h1>
                <h2 class="animated-title"> Use the navigation bar to select the relevant service above.</h2>
            </div>
        </div>
    
      

      <div class="container">
      <div class="row">

          <div class="col-md-6 mb-4">
              <div class="custom-card">
                  <div class="card-body">
                      <h4 class="card-title">Patient Details:</h4>
                      <p class="card-text">Name: John Smith</p>
                      <p> Age: 28</p>
                      <p> NHS Number: xxxxxxxxxxx</p>
                      <a href="data.php" class="btn btn-primary">Read More about your latest health data.</a>
                  </div>
              </div>
          </div>
  
        
          <div class="col-md-6">
              <img src="images/logo.jpg" class="img-fluid" alt="Responsive image">
          </div>
      </div>
  </div>

    



    

    <script>
        const mobileMenu = document.getElementById('mobile-menu');
        const navbarMenu = document.querySelector('.navbar__menu');

        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('is-active');
            navbarMenu.classList.toggle('active');
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
