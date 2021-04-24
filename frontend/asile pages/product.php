<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Apples</title>
    <link rel="stylesheet" href="../../styles3.css" />
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
          <a href="aisles.html" class="navbar__links">Products</a>
        </li>
        <li class="navbar__item">
          <a href="signin.php" class="navbar__links">Sign in</a>
        </li>
        <li class="navbar__item">
          <a href="cart.php" class="navbar__links">
          Cart <i class=" fas fa-shopping-basket"></i></a>
          

        </li>

      </ul>
    </div>
  </nav>

           <?php
            $xml=simplexml_load_file('../../products.xml');
            $xml1=new DomDocument("1.0","UTF-8");
            $xml1->load("../../cart.xml");
            
            if(isset($_POST['add_to_cart'])){
            $xml3=simplexml_load_file("../../cart.xml") or die("Error: Cannot create object"); 
            $xml2=simplexml_load_file('../../products.xml');
            $counter=-1;
            $a=$_POST['a'];

             foreach($xml2 as $p){
            $counter++;
            if($xml2-> p[$counter]->id==$a){
               $name=$xml2-> p[$counter]->name;
               $price=$xml2-> p[$counter]->price;
               $id=$xml2-> p[$counter]->id;
               $pnew= $xml3->addChild('p');
               $pnew->addChild('id',$name);
               $pnew->addChild('name',$price);
               $pnew->addChild('stock',$id);
               file_put_contents("../../cart.xml",$xml3->asXML());
               echo'<script type="text/javascript">
               window.location = "products.php";
               </script>';
               }
            }
          }
            $counter=0;
          if($id = $_GET['product'])
          foreach($xml->xpath('//products[starts-with(id/text(), "$id"]') as $p){
      echo"
         <div class='product_container'>
        <div class='image_container'>
             <img src='images/$name.jpg' alt='.' class='product_image'>
        </div>
        <div class='product_description'>
            <h1>$name</h1>
            <details>
              <summary>Detailed description</summary>
              <p>$description</p>
            </details>
            <div class='buying'>
            <h3>Price: $price/1lb</h3>
            <div class='buy_item'>
              <form>
                  <input type='number' placeholder='Quantity' name='quantity' min='0' onchange='calculateAmount(this.value)' required>
                  <input type='submit' name='add_to_cart'>
              </form>
              <script>
                function calculateAmount(val) {
                    var total_price = val * 2.99;
                    var calc = document.getElementById('total_price');
                    calc.value = '$' + total_price.toFixed(2);
                }
            </script>
            <h3>Total:</h3>
            <input name='total_price' id='total_price' type='text' readonly>

          </div>

            </div>
            </div>
        </div>
              
    </div>";
              }
        ?>
  </body>
</html>