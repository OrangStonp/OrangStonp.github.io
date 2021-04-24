<?php
$error = false;
if(isset($_POST['login'])){
  $error = false;
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(file_exists('../users/' . $username . '.xml')){
        $xml = new SimpleXMLElement('../users/' . $username . '.xml', 0, true);
        if($password == $xml->password){
            session_start();
            $_SESSION ['username'] = $username;
            if($xml->type == 'customer'){
            header('Location: index.php');
            }
            elseif($xml->type == 'admin'){
              header('Location: ../backend\inventory Management\inventoryPHP.php');

            }
        }
      }    

     
$error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in</title>
  <link rel="stylesheet" href="../account.css" />
  <link rel="stylesheet" href="../styles.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap"
    integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body>
  <!-- Navbar Section -->
  <nav class="navbar">
    <div class="navbar__container">
      <a href="index.php" id="navbar__logo">
        <i class="fas fa-shopping-basket"></i>SUPER GROCERIES</a>
      
      <!--JS part-->
      <div class="navbar__toggle" id="mobile-menu">
        <span class="bar"></span> <span class="bar"></span>
        <span class="bar"></span>
      </div>
      <ul class="navbar__menu">
        <li class="navbar__item">
          <a href="index.php" class="navbar__links">Home</a>
        </li>
        <li class="navbar__item">
          <a href="aisles.html" class="navbar__links">Products</a>
        </li>
        <li class="navbar__item">
          <a href="signin.php" class="navbar__links">Sign in</a>
        </li>
        <li class="navbar__item">
          <a href="cart.php" class="navbar__links">Cart <i class=" fas fa-shopping-basket"></i></a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Login Section -->
  <div class="main">
    <div class="account__container">
      <div class="main__content">
        <div class="login-content">
          <form action="" method="POST">
            <h2 class="title">Welcome</h2>
            <div class="input-div">
              <div class="i">
                <i class="fas fa-user-circle"></i>
              </div>
              <div class="div">
                <input type="text" class="input" placeholder="Username" name="username" />
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <input type="password" class="input" placeholder="Password" name="password"/>
              </div>
              
            </div>
            <a href="#">Forgot Password?</a>
            <button class="button" type="submit" name="login">SIGN IN</button>
            <?php
            /*
              if($accterror = true){
                  echo 'Account does not exist';
              }
              if($passerror = true){
                echo 'Invalid username or password';
              }
              */
              if($error){
                echo 'Invalid username or password';
              }
              ?>
          </form>
        </div>
      </div>
      <div class="main__content">
        <h2>No Account?</h2></br>
        <button class="button" onclick="window.location.href='signup.php';">SIGN UP NOW!</button>
      </div>
    </div>
    </div>
  </div>
  <script type="text/javascript" src="app.js"></script>
</body>
</html>