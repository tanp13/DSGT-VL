<?php
require_once "config.php";
 $username = $password ="";
$username_err = $password_err="";

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(empty(trim($_POST["username"])))
    {
        $username_err= "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);

            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    $username_err = "This username is already taken";
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
 mysqli_stmt_close($stmt);
if(empty(trim($_POST['password'])))
{
$password_err = "Password cannot be blank";
}

elseif(strlen(trim($_POST['password']))<8)
{
    $password_err = "Password cannot be less than 8 characters";
}
else{
    $password = trim($_POST['password']);
}
if(empty($username_err) && empty($password_err))
{
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt)
    {
       mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

       $param_username = $username;
       $param_password = password_hash($password, PASSWORD_DEFAULT);
       
       //try to execute query

       if(mysqli_stmt_execute($stmt))
       {
        header("location: login.php");
       }
       else{
        echo "Something went wrong... cannot redirect!";
       }
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
  <title>VL HOMEPAGE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<style>
.container
{
  display: flex;
  flex-direction: row;
 justify-content: center;
  width: 60wh;
  height: 70vh;
  border: 5px solid  rgb(154, 4, 4);
  border-radius: 9px ;
  margin-top: 52px;
}
.label
{
  
  display: flex;
  flex-direction: row;
 justify-content: center;
    font-weight: bold;
    margin-right: 10px;
    margin-top: 20px;
}
.flag h1{
  color: rgb(154, 4, 4);
  font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
  font-size: 40px;
}
.buton{
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 50px;
  margin-left: 350px;
  margin-right: 350px;
}
.button{
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 50px;
  margin-left: 350px;
  margin-right: 350px;
  
}
footer{
    height:14rem;
}
footer p{
    line-height:1.3;
    font-size:20px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    background-color:rgb(154, 4, 4) ;
    color: white;
    margin-top: 30px;
    text-align: center;
    padding-top: 40px;
    padding-bottom: 40px;
}
.form-inline
{
text-align: center;

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
      <img src="Somaiya Full Logo.png" class="figure-img img-fluid rounded" alt="KJSIT" style="height: 100px; width: 600px;">
      <figcaption class="figure-caption"></figcaption>
    </figure>
    <figure class="figure">
      <img src="download.png" class="figure-img img-fluid rounded" alt="Somaiya Trust" style="height: 80px; width: 90px;margin-left: 800px;">
      <figcaption class="figure-caption"></figcaption>
    </figure>
  <nav class="navbar navbar-expand-lg " style="background-color: rgb(154, 4, 4); height: 15vh;margin-left: 20px;margin-right: 20px;">
    <div class="container-fluid">
     
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.html" style="font-size: 25px; color: #ffffff;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="about.html" style="font-size: 25px; color: #ffffff;">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="login.html" style="font-size: 25px; color: #ffffff;">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="signup.html" style="font-size: 25px; color: #ffffff;">Sign up</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>
  
  <link rel="shortcut icon" href="uploads\FAVICON1.png" type="image/x-icon">
  <div class="container1">
      <section class="col-lg-7">
          <h2 style="font-family: 'Poppins'; color:#9b2928; font-weight:bold; text-align:center">Sign-up</h2>
          <hr>
          <div>
          </div>
          <div class="clearfix"></div>
          <form action="" method="post">
              <div class="form-group">
                  <label for="usernameField"
                      style="font-family: 'Poppins';color:#9b2928; font-weight:bold; font-size:x-large">E-mail</label>
                  <input type="text" class="form-control" name="E-mail" id="E-mail" placeholder="name@example.com">
              </div>
              <div class="form-group">
                <label for="usernameField"
                    style="font-family: 'Poppins';color:#9b2928; font-weight:bold; font-size:x-large">Username</label>
                <input type="text" class="form-control" name="username" id="E-mail" placeholder="Enter your name">
            </div>
            <div class="form-group">
              <label for="usernameField"
                  style="font-family: 'Poppins';color:#9b2928; font-weight:bold; font-size:x-large">Department</label>
              <input type="text" class="form-control" name="department" id="E-mail" placeholder="Eg.BSH,COMPS,IT,AIDS,EXTC">
          </div>
              <div class="form-group">
                  <label for="passwordField"
                      style="font-family: 'Poppins';color:#9b2928; font-weight:bold; font-size:x-large">Password</label>
                  <input type="password" name="password" class="form-control" id="passwordField"
                      placeholder="Must be atleat 8 character long">
              </div>
              <input type="hidden" name="token" value="+691ipoZ3mRX+ZU57Pi/xMcJpaf4RwFbzOd9ybDWDxc="><br>
              <button type="submit" class="btn btn-primary" 
                  style="background-color: rgb(156, 1, 1);color: rgb(247, 246, 246) ; --bs-btn-font-size:18px; border: 3px solid rgb(11, 1, 1); ">
            Submit</button>
          </form>

      </section>

  </div>
  </div>
  <footer>
    <p>
        Department Of Computer Engineering<br>
     2023-24<br>
   Guided by:  Prof. Pradnya Patil, Prof. Aarti Sahitya<br>
 
   Developed by: Saniya Patil, Kinjal Patel, Tanisha Patel, Urja Patel, Meet Nayak, Nikhil Panchal, Prem Panchal, Ravi Panchal</p>
  
</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</body>

</html>
