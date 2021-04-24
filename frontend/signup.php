<?php
unset($errors);
$errors = array();
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $verifypass = $_POST['verify-pass'];
    $firstname = $_POST['first-name'];
    $lastname = $_POST['last-name'];
    $postcode = $_POST['postal-code'];
    $policy = $_POST['policy'];
     
    if(file_exists('../users/' . $username . '.xml')){
      $errors[] = "Username is taken";
  }

     
    if($email == ''){
        $errors[] = "Email is blank";
    }

    if($password == '' || $verifypass == ''){
        $errors[] = "Password is blank";
    }

    if($password !== $verifypass){
      $errors[] = "Passwords don't match"; 
    }
   
    
    if($firstname == '' || $lastname = ''){
        $errors[] = "Name is blank";
    }

    if($postcode == ''){
        $errors[] = "Postcode is blank";
    }

    if($username == ''){
        $errors[] = "Username is blank";
    }
    if(!isset($_POST['policy'])){
      $errors[] = "Please accept the terms and conditions";
    }
    
    if(count($errors) == 0){
    
        $xml = new SimpleXMLElement('<user></user>');
        $xml-> addChild('password', $password);
        $xml-> addChild('email', $email);
        $xml-> addChild('first-name', $firstname);
        $xml-> addChild('last-name', $lastname);
        $xml-> addChild('postal-code', $postcode);
        $xml-> addChild('type', 'customer');
        $xml->asXML('../users/' . $username . '.xml');
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');

  }
}
    

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign up</title>
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

  <!-- Signup Section -->
  <div class="main">
    <div class="account__container">
      <div class="main__content">
        <div class="login-content">
          <form action="" method="POST">
              
            <h2 class="title">Register</h2>
            <div class="input-div">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <input type="text" class="input" name="first-name" placeholder="*First Name" />
              </div>
            </div>
            <div class="input-div">
              <div class="i">
                <i class="fas fa-user"></i>
              </div>
              <div class="div">
                <input type="text" class="input" name="last-name" placeholder="*Last Name" />
              </div>
            </div>
            <div class="input-div">
              <div class="i">
                <i class="fas fa-user-circle"></i>
              </div>
              <div class="div">
                <input type="text" class="input" name="username" placeholder="*Username" />
              </div>
            </div>
            <div class="input-div">
              <div class="i">
                <i class="fas fa-home"></i>
              </div>
              <div class="div">
                <input type="text" class="input" name="postal-code" placeholder="*Postal Code" />
              </div>
            </div>
            <div class="input-div">
              <div class="i">
                <i class="fas fa-envelope"></i>
              </div>
              <div class="div">
                <input type="text" class="input" name="email" placeholder="*Email address" />
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <input type="password" class="input" name="password" placeholder="*Password"/>
              </div>
            </div>
            <div class="input-div pass">
              <div class="i">
                <i class="fas fa-lock"></i>
              </div>
              <div class="div">
                <input type="password" class="input" name="verify-pass" placeholder="*Verify Password"/>
              </div>
            </div>
            <em>*Required fields</em>
        </div>
      </div>
      <div class="main__content">
        <h4>Consent to Conditions of Use and Protection of Personal Information Policy</h4>
        </br>
        <h5><input type="checkbox" name="policy" value="true"/>&emsp;*Yes, I have read and accept the Conditions of Use and Protection of Personal Information Policy.</h5>
       </br></br>
       <h4>Subscription to e-communications</h4>
       </br>
       <h5><input type="checkbox" name="newsletter" value="true"/>&emsp;Yes, I would like to receive the supergroceries newsletter and occasional promotional offers.</h5>
       <br/>
       <input type="submit" class="button" value="CREATE ACCOUNT" name="submit">
       <br>
       <?php
        if (count($errors) > 0){
          foreach($errors as $problem)
          echo $problem . '<br>';
        }

       ?>
      </div>
    </form>
    </div>
  </div>
  </div>
  <script type="text/javascript" src="app.js"></script>
</body>
</html>