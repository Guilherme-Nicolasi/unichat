<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Utalk</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
</head>
<body>
  <div class="wrapper outside">
    <section class="form login">
      <header>
        <svg width="45" height="45" viewBox="0 0 210 210" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="Frame 1">
            <g id="Rectangle 2">
              <rect width="210" height="210" rx="32" fill="rgb(15,165,250)"/>
              <rect width="210" height="210" rx="32"/>
            </g>
            <circle id="Ellipse 1" cx="49" cy="49" r="14" stroke="white" stroke-width="8"/>
            <circle id="Ellipse 3" cx="49" cy="126" r="14" stroke="white" stroke-width="8"/>
            <circle id="Ellipse 4" cx="161" cy="126" r="14" stroke="white" stroke-width="8"/>
            <circle id="Ellipse 5" cx="105" cy="162" r="14" stroke="white" stroke-width="8"/>
            <circle id="Ellipse 2" cx="161" cy="49" r="14" stroke="white" stroke-width="8"/>
            <path id="Line 1" d="M55 66C55 62.6863 52.3137 60 49 60C45.6863 60 43 62.6863 43 66H55ZM43 66V111H55V66H43Z" fill="white"/>
            <path id="Line 2" d="M167 66C167 62.6863 164.314 60 161 60C157.686 60 155 62.6863 155 66H167ZM155 66V111H167V66H155Z" fill="white"/>
            <line id="Line 3" x1="148.277" y1="137.351" x2="120.351" y2="156.744" stroke="white" stroke-width="12" stroke-linecap="round"/>
            <line id="Line 4" x1="88.4314" y1="156.745" x2="60.5055" y2="137.351" stroke="white" stroke-width="12" stroke-linecap="round"/>
          </g>
        </svg>
        <h2>Welcome back!</h2>
        <p>Please enter your details</p>
      </header>
      <form action="login.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="field input">
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="field recovery">
          <label for="remember">
            <input type="checkbox" id="remember" name="remember">
            Remember me
          </label>
          <a href="recovery.php">forgot password?</a>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Log In">
        </div>
      </form>
      <div class="link">Don't have an account yet? <a href="index.php">Sign up</a></div>
    </section>
    <aside class="form login banner">
    </aside>
  </div>
  <script src="javascript/login.js"></script>
  <script src="javascript/slide.js"></script>
</body>
</html>
