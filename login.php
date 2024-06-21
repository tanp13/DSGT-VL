<?php
if (isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}
require_once "config.php";
$username = $password = $username_err = $password_err = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $username_err = "Please enter username and password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }
    if (empty($username_err) && empty($password_err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username;

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        session_start();
                        $_SESSION["username"] = $username;
                        $_SESSION["id"] = $id;
                        $_SESSION["loggedin"] = true;

                        header("location: welcome.php");
                        exit;
                    } else {
                        $password_err = "Invalid password";
                    }
                }
            } else {
                $username_err = "Username not found";
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
    mysqli_close($conn);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
    footer {
        height: 14rem;
    }

    footer p {
        line-height: 1.3;
        font-size: 20px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        background-color: rgb(154, 4, 4);
        color: white;
        margin-top: 30px;
        text-align: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        width: 60wh;
        height: 70vh;
        border: 5px solid rgb(154, 4, 4);
        border-radius: 9px;
        margin-top: 52px;

    }
    .container1
    {
     display: flex;
     flex-direction: column;
     justify-content: center;
     align-items: center;
     width: 50wh;
  height: 70vh;
  border: 5px solid  rgb(154, 4, 4);
  border-radius: 9px ;
  margin-top: 52px;
  margin-left: 150px;
  margin-right: 150px;

    }
</style>

<body>
    <Body background="https://img.freepik.com/premium-photo/abstract-white-background-product-display-with-banner-background_655634-81.jpg" style="background-size: cover;">
    <div class="pat">
    <figure class="figure">
          <img src="final.png" class="figure-img img-fluid rounded" alt="Somaiya Trust" style="height: 100px; width:1500px">           
            <figcaption class="figure-caption"></figcaption>
          </figure>
        <nav class="navbar navbar-expand-lg "
            style="background-color: rgb(154, 4, 4); height: 15vh;margin-left: 20px;margin-right: 20px;">
            <div class="container-fluid">

                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php" style="font-size: 25px; color: #ffffff;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="about.php" style="font-size: 25px; color: #ffffff;">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="login.php" style="font-size: 25px; color: #ffffff;">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="register.php" style="font-size: 25px; color: #ffffff;">Sign up</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <link rel="shortcut icon" href="uploads\FAVICON1.png" type="image/x-icon">
        <div class="container1">
            <section class="col-lg-7">
                <h2 style="font-family: 'Poppins'; color:#9b2928; font-weight:bold; text-align:center">Login</h2>
                <hr>
                <div>
                </div>
                <div class="clearfix"></div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="usernameField"
                            style="font-family: 'Poppins';color:#9b2928; font-weight:bold; font-size:x-large">Username</label>
                        <input type="text" class="form-control" name="username" id="usernameField"
                            placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="passwordField"
                            style="font-family: 'Poppins';color:#9b2928; font-weight:bold; font-size:x-large">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordField"
                            placeholder="Password">
                    </div>

                    <div class="checkbox">
                        <label style="font-family: 'Poppins'; color:#9b2928; font-size:large">
                            <input name="remember" value="yes" type="checkbox" style="margin-top: 0.4em"> Remember Me
                        </label>
                        <a class="pull-right" href="password_recovery_link.php"
                            style="font-family: 'Poppins';color:#9b2928; font-size:large">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="background-color: rgb(156, 1, 1);color: rgb(247, 246, 246) ; --bs-btn-font-size:18px; border: 3px solid rgb(11, 1, 1);">
                        Login</button>
                </form>
            </section>
        </div>
        <br>
        <footer>
            <p>
                Department Of Computer Engineering<br>
                2023-24<br>
                Guided by: Prof. Pradnya Patil, Prof. Aarti Sahitya<br>

                Developed by: Saniya Patil, Kinjal Patel, Tanisha Patel, Urja Patel, Meet Nayak, Nikhil Panchal, Prem
                Panchal, Ravi Panchal</p>

        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"></script>
</body>
</html>