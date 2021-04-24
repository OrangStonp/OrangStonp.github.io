<!DOCTYPE html>
<html>
    <head>
        <title>Snacks</title>
        <meta name="description" content="This is the description">
        <link rel="stylesheet" href="../../products.css" />
        <link rel="stylesheet" href="../../storestyles.css"/>
        <script src="store.js" async></script>
    </head>
    <body>
     <nav class="navbar">
      <div class="navbar__container">
         <a href=" index.php" id="navbar__logo"
          ><i class="fas fa-shopping-basket"></i>SUPER GROCERIES</a
        >
        <!--JS part-->
        <div class="navbar__toggle" id="mobile-menu">
          <span class="bar"></span> <span class="bar"></span>
          <span class="bar"></span>
        </div>
         <ul class="navbar__menu">
          <li class="navbar__item">
            <a href=" index.php" class="navbar__links">Home</a>
          </li>
          
          </li>
          <li class="navbar__item">
            <a href=" aisles.html" class="navbar__links">Products</a>
          </li>
          <li class="navbar__item">
            <a href=" signin.php" class="navbar__links">Sign in</a>
          </li>
          <li class="navbar__item">
            <a href=" cart.php" class="navbar__links">
            Cart <i class=" fas fa-shopping-basket"></i></a>
            

          </li>

        </ul>
      </div>
       <div class="main">
          
    </nav>
    <section class="container content-section">
            <h2 class="section-header" style='color:white'>SNACKS</h2>
            <div class="shop-items">
    <?php
      $xml=simplexml_load_file('../../products.xml');
            $xml1=new DomDocument("1.0","UTF-8");
            $xml1->load("cart.xml");
            
            if(isset($_POST['add_to_cart'])){
            $xml3=simplexml_load_file("cart.xml") or die("Error: Cannot create object"); 
            $xml2=simplexml_load_file('../../products.xml');
            $counter=-1;
            $a=$_POST['a'];

             foreach($xml as $p){
            $counter++;
            if($xml2-> p[$counter]->id==$a){
               $name=$xml2-> p[$counter]->name;
               $price=$xml2-> p[$counter]->price;
               $id=$xml2-> p[$counter]->id;
               $pnew= $xml3->addChild('p');
               $pnew->addChild('id',$name);
               $pnew->addChild('name',$price);
               $pnew->addChild('quantity',$id);
               file_put_contents("cart.xml",$xml3->asXML());

            //    should add cart file
               echo'<script type="text/javascript">
               window.location = "snacks.php";
               </script>';
               }
            }
          }

                 $counter=16;
         foreach($xml as $p){
           if($xml-> p[$counter]-> aisles=="snack"){
           $name=$xml-> p[$counter]->name;
           $price=$xml-> p[$counter]->price;
           $quantity=$xml-> p[$counter]->quantity;
           $id=$xml-> p[$counter]->id;
           $a=$id;
           $counter++;


           echo "<div class='shop-item'>
           <span class='shop-item-title' style='color:white'>$name</span>
           <img class='shop-item-image' src='cartimages/$name.jpg'>
           <div class='shop-item-details'>
               <span class='shop-item-price' style='color:white'>$price</span>
               
               <form class='btn btn-primary shop-item-button' method='POST' action=''>
               <input type='submit' class='main__btn' name='add_to_cart' value='ADD TO CART'>
               <input type='hidden' style='color:white' name='a' value='$a'>
               </form>
           </div>
       </div>";
         }
          } 
?>

        
                <!-- <div class="shop-item">
                    <span class="shop-item-title">Tomatoes</span>
                    <img class="shop-item-image" src="../cartphp/cartimages/Tomatoes.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$12.99</span>
                   
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Meat</span>
                    <img class="shop-item-image" src="../cartphp/cartimages//Meat.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$14.99</span>
                        <button class="btn btn-primary shop-item-button"type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Milk</span>
                    <img class="shop-item-image" src="../cartphp/cartimages//Milk.jpg">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$9.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>  -->
               
            </div>

 </div>
        </section>


    
              <script type="text/javascript" src=".. app.js"></script>
       </div>
       
    </body>
</html>