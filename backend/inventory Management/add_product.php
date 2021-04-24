<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>supergroceries website editing menu</title>
   <link type="text/css" rel="stylesheet" href="mainstyle.css">
   <link type="text/css" rel="stylesheet" href="Liststyle.css">
   <link type="text/css" rel="stylesheet" href="styles.css">
   <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

</head>

<body>
   <div class="main_conntainer">
      <div class="left_area">
         <header>
            <h1><strong>SuperGroceries </strong><span>Admin</span></h1>
         </header>
      </div>

      <!-- Sidebar -->
      <div class="sidebar">
            <img src="User image.jpg" class="profile_image" alt=" Josh Lee.jpg">
            <h4>Josh Lee</h4>
         <ul>
         <li><a href="index.php"><span> Dashboard</span></a></li>
         <li><a href="Products List.html"><i class="fas fa-shopping-cart"></i><span> Inventory</span></a></li>
         <li><a href="Users List.html"><i class="fas fa-user-friends"></i><span> Users</span></a></li>
         <li><a href="Orders List.html"><i class="fas fa-file-invoice-dollar"></i><span> Orders</span></a></li>
         <li><a href="#" ><i class="fas fa-sign-out-alt"></i><span class="signout"> Sign out</span></a></li>
         </ul>
        </div>

        <?php
         if(isset($_POST['add_product'])){
            $xml3=simplexml_load_file("../../products.xml") or die("Error: Cannot create object"); 
            $pnew= $xml3->addChild('p');
            $pnew->addChild('id',$_POST['aid']);
            $pnew->addChild('name',$_POST['aname']);
            $pnew->addChild('stock',$_POST['astock']);
            $pnew->addChild('price',$_POST['aprice']);
            file_put_contents("../../products.xml",$xml3->asXML());
            echo'<script type="text/javascript">
            window.location = "InventoryPHP.php";
            </script>';
       }
         echo "<div>
         <div class='image'>
             <form method='POST' action='' >
                 <br>
                 <h2> name:</h2>

                 <input type='text' class='input' name='aname' placeholder='New Name...'  />
 
                 <h2> price</h2>
                 <input type='text' class='input' name='aprice' placeholder='New Price...'  />
                 
                 <h2> quantity</h2>
                 <input type='text' class='input' name='astock' placeholder='New Price...'/>

                 <h2>ID</h2>
                 <input type='text' class='input' name='aid' placeholder='New Price...' />

                 <h2>import new image</h2>
                 <input type='file' class='input' name='image' placeholder='import new image' />
 
                 <input type='submit' name='add_product'/>

             </form>
         </div>
         </div>";
        
        ?>