<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>supergroceries</title>
    <link rel="stylesheet" href="styles.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
        <a href="index.php" id="navbar__logo"
          ><i class="fas fa-shopping-basket"></i>SUPER GROCERIES</a
        >
        <!--JS part-->
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
        <ul class="navbar__menu">
          <li class="navbar__item">
            <a href="index.php" class="navbar__links">Home</a>
          </li>
          
          </li>
          <li class="navbar__item">
            <a href="frontend/aisles.html" class="navbar__links">Products</a>
          </li>
         <?php

              if(file_exists('users/' . $_SESSION['username'] . '.xml')){
            echo '<li class="navbar__item">
            <a class="navbar__links">Welcome, ';
            echo $_SESSION['username'];
            echo '</a>
            </li>
            <li class="navbar__item">
        <a href="frontend/signout.php" class="navbar__links">Log out</a>
        </li>';
        }
    
         else {
            echo  '<li class="navbar__item">
            <a href="frontend\signin.php" class="navbar__links">Sign in</a>
            </li>';

            }
           
         ?>
          <li class="navbar__item">
            <a href="frontend/cart.php" class="navbar__links">
            Cart <i class=" fas fa-shopping-basket"></i></a>
            

          </li>

        </ul>
      </div>
    </nav>

    <div class="main">
      <div class="main__container">
        <div class="main__content">
          <h1>SUPER GROCERIES</h1>
          <p>Grocery delivery in Montreal</p>
        </div>
        <div class="main__img--container">
          <img id="main__img" src="images\main.jpg" alt="main website image">
        </div>
    </div>

    
    <script src="app.js"></script>
  </body>
</html>
