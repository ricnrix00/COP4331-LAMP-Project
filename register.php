<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <div style="display: flex; flex-wrap: wrap; width: 100%; justify-content: center; align-items: center; height: 100vh;">
            <div style="max-width: 500px;">
                <div class="brand animate__animated animate__fadeInDown">
                    <img src="icons8-contacts.png" alt="phonebook-icon" class="p-2 m-auto d-block"></img>
                </div>
                <div class="p-4 animate__animated animate__fadeIn animate__delay-1s rounded-3" style="box-shadow: 4px 6px 12px lightblue;">
                    <div class="col-12 pb-3">
                        <h1 class="text-center">Get Started</h1>
                        <h5 class="text-center fw-lighter">Fill in the form to create your account</h5>
                    </div>
                    <form class="row g-2" method="post" name="register">
                        <div class="col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="Enter your username" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="Enter your username" required>
                        </div>
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="example@example.com" required>
                        </div>
                        <div class="col-12">
                            <label for="userPassword">Password</label>
                            <input type="password" id="userPassword" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="col-12">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-control" placeholder="Enter your password" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                            <small class="fw-light">Format: 123-456-7890</small>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary">Register</button>
                            <a type="button" class="btn btn-link" onclick="window.location.href='login.php';">Already Registered? Click here to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</body>

</html>