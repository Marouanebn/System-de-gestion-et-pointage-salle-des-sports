<?php

$conn = mysqli_connect("localhost", "root", "", "lifestylebd");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Check if the user is already logged in, redirect to dashboard if true
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location:admin/pages/Dashboard.php");
    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $inputUsername = $_POST["username"];
    $inputPassword = $_POST["password"];

    // Query the database to validate credentials
    $sql = "SELECT username FROM login WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $inputUsername, $inputPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
        // Valid credentials
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $inputUsername;
        header("location:admin/pages/Dashboard.php");
    } else {
        // Invalid credentials
        echo "Invalid username or password.";
    }

    mysqli_stmt_close($stmt);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>	.customHeading {
    color:#2b2c16;
  }
  .custom-form-group label {
    color:#2b2c16;
    font-size:13px;
    font-weight:bold;
    letter-spacing:2px;
  }
  .custom-form-group span {
    width:32px;
    border-bottom:1px solid #5c5839;
    vertical-align:middle;
    color:#30c6b0;
    display:inline;
  }
  .custom-form-group input {
    width : calc(100% - 32px);
    border:none;
    border-bottom:1px solid #5c5839;
    box-sizing:content-box;
    outline:none;
  }
  .custom-btn {
    border-radius:32px;
    background: rgb(0,0,0);
background: linear-gradient(80deg, rgba(0,0,0,1) 0%, rgba(119,121,9,1) 100%);    border:2px solid transparent;
    color:#fff;
    height:50px;
  }
  .custom-btn:hover {
    background : #968c0200;
    border:none;
    border:2px solid #000000;
    color:#ab9d02;
  }
  #formPanel {
    min-width:280px;
    max-width:320px;
    width:100%;
    margin:0 auto;
  }
  .objectFit {
    object-fit:cover;
    width:100%;
    max-width:450px;
    min-height:60vh;
    margin:0 auto
  }
  #showCursor {
    cursor:pointer
  }</style>
<body>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="container ">
          <div class="row">
            <div class="col-sm-7 col-lg-10 mx-auto">
              <div class="shadow-lg">
                <div class="d-flex  align-items-center">
                  <div class="d-none  d-md-none d-lg-block">
                    <img  src="admin/img/lifestylelogo.jpg" class="objectFit "  />
                  </div>
                  <div class="p-4 col-sm-7" id="formPanel">
                    <div class="text-center mb-5">
                      <h1 class="customHeading h3 text-uppercase">Login</h1>
                    </div>
                    <form action="index1.php"  method="post" >
                      <div class="custom-form-group">
                        <label class="text-uppercase" for="username">Username</label>
                        <input type="text" id="username"  name="username" class="pb-1" /><span class="pb-1"><i class="fas fa-user"></i></span>
                      </div>
                      <div class="custom-form-group mt-3">
                        <label class="text-uppercase" for="password">Password</label>
                        <input type="password" id="password" name="password" class="pb-1" /><span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword(event)"></i></span>
                      </div>
                      <div class="mt-5">
                        <button type="submit" class="w-100 p-2 d-block custom-btn" >Login</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
      <script>	function showPassword(e){
        var input = document.getElementById('password')
        if(input.type === 'password'){
          input.type = "text"
          e.target.className = "fas fa-eye"
        }else{
          input.type = "password"
          e.target.className = "fas fa-eye-slash"
        }
      }</script>
</body>
</html>