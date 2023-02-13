<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
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
                <div class="p-4 needs-validation animate__animated animate__fadeIn animate__delay-1s rounded-3" method="post" name="login" style="box-shadow: 2px 6px 12px lightblue;" novalidate>
                    <div class="col-12 pb-3">
                        <h1 class="text-center">Welcome!</h1>
                        <h5 class="text-center fw-lighter">Please enter your username and password</h5>
                    </div>
                    <form class="form row g-2" method="post" name="login">
                        <div class="col-12">
                            <label for="fname">Username</label>
                            <input type="text" class="form-control" placeholder="Enter your username" required data-error-msg="missing your username">
                            <div class="invalid-tooltip">
                                Please choose a unique and valid username.
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="lname">Password</label>
                            <input type="text" class="form-control" placeholder="Enter your password" required data-error-msg="missing your password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-outline-primary">Log In</button>
                            <a type="button" class="btn btn-link" onclick="window.location.href='register.php';">First time? Click here to register</a>
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