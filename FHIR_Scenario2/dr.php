<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor notifications</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .schedule-button {
        margin-bottom: 10px; 
    }

    .alert {
        margin-top: 20px; 
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
        <!-- Title Section -->
        <div class="col-md-12 mb-4">
            <h1 class="animated-title"> Your Doctor Services</h1>
            <h2 class="animated-title"> Remember that we are here for you!</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="custom-card">
                <div class="card-body">
                    <h4 class="card-title">Schedule an Appointment:</h4>
                    Click the plus button on the right to start:
                    <button id="toggleButton" class="btn btn-sm btn-primary float-right" onclick="toggleAppointmentDetails()">+</button>
                </div>
                <div id="appointmentDetails" class="card-body" style="display:none;">
                    <form id="appointmentForm" action="submit-appointment.php" method="post">
                        <div class="form-group row">
                            <label for="appointmentDate" class="col-sm-7 col-form-label">Available Dates:</label>
                            <div class="col-sm-9">
                                <input type="text" id="appointmentDate" name="appointmentDate" class="form-control" data-toggle="flatpickr" data-alt-input="true" data-alt-format="d/m/Y" data-date-format="Y-m-d" data-min-date="today">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="appointmentTime" class="col-sm-7 col-form-label">Available Times:</label>
                            <div class="col-sm-9">
                                <input type="time" id="appointmentTime" name="appointmentTime" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="submit" value="Schedule" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-success" id="alertMessage" style="display:none;">
                        Appointment scheduled successfully! Please check your email for confirmation.
                    </div>
                </div>
            </div>
        </div>
        
         
                <div class="col-md-6">
                    <div class="custom-card">
                        <div class="card-body">
                            <h4 class="card-title">Send a Voice-Note to your Dr</h4>
                            <h5>Click on the button below to start:</h5>
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col">
                                        <button id="start-btn" class="btn btn-primary mr-2">Start Recognition</button>
                                        <button id="pause-btn" class="btn btn-secondary mr-2">Pause</button>
                                        <button id="reset-btn" class="btn btn-danger mr-2">Reset</button>
                                    </div>
                                </div>
                                <div class="mt-3"></div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <div id="transcript" class="bg-light p-3">Transcript will appear here...</div>
                                    </div>
                                </div>
                                <div class="mt-3"></div>
                                <form id="voiceForm">
                                    <div class="form-group row">
                                        <div class="col-sm-9">
                                            <input type="submit" value="Submit" class="btn btn-primary" id="submitBtn">
                                        </div>
                                    </div>
                                </form>
                                <div class="alert alert-success" id="alertMessage2" style="display: none;">
                                    Sent.
                                </div>
                            </div>
                        </div>
                    </div>
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
            flatpickr("#appointmentDate", {
                altInput: true,
                altFormat: "d/m/Y",
                dateFormat: "Y-m-d",
                minDate: "today",
            });

            flatpickr("#appointmentTime", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i", 
                time_24hr: true, 
                minuteIncrement: 30, 
            });




        function toggleAppointmentDetails() {
            const details = document.getElementById('appointmentDetails');
            const button = document.getElementById('toggleButton');
            if (details.style.display === "none") {
                details.style.display = "block";
                button.textContent = "-";
            } else {
                details.style.display = "none";
                button.textContent = "+";
            }
        }

    
        document.getElementById('appointmentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('alertMessage').style.display = 'block';
        });

  var recognition;
  var listening = false;

  if ('webkitSpeechRecognition' in window) {
    recognition = new webkitSpeechRecognition();
    recognition.continuous = true; 
    recognition.interimResults = true; 

    recognition.onstart = function() {
      listening = true;
      document.getElementById('pause-btn').innerText = 'Pause';
      document.getElementById('pause-btn').style.display = 'inline';
      document.getElementById('reset-btn').style.display = 'inline';
    };

    recognition.onerror = function(event) {
      console.error(event.error);
    };

    recognition.onend = function() {
      listening = false;
    };

    recognition.onresult = function(event) {
      var transcript = '';
      for (var i = event.resultIndex; i < event.results.length; ++i) {
        transcript += event.results[i][0].transcript;
      }
      document.getElementById('transcript').innerText = transcript;
    };

    document.getElementById('start-btn').onclick = function() {
      if (listening) {
        recognition.stop();
      } else {
        recognition.start();
      }
    };

    document.getElementById('pause-btn').onclick = function() {
      if (listening) {
        recognition.stop();
        document.getElementById('pause-btn').innerText = 'Continue';
      } else {
        recognition.start();
      }
    };

    document.getElementById('reset-btn').onclick = function() {
      recognition.stop();
      document.getElementById('transcript').innerText = 'Transcript will appear here...';
    };
  } else {
    console.log('Speech recognition not supported in this browser.');

  }
  document.getElementById('voiceForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Show the success message
            document.getElementById('alertMessage2').style.display = 'block';

            // Hide the success message after 3 seconds
            setTimeout(function() {
                document.getElementById('alertMessage2').style.display = 'none';
            }, 3000);

            // Reload the page after 5 seconds
            setTimeout(function() {
                location.reload();
            }, 5000);
        });



    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
