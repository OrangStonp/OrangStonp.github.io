
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
         <li><a href="InventoryPHP.php"><i class="fas fa-shopping-cart"></i><span> Inventory</span></a></li>
         <li><a href="Users List.html"><i class="fas fa-user-friends"></i><span> Users</span></a></li>
         <li><a href="Orders List.html"><i class="fas fa-file-invoice-dollar"></i><span> Orders</span></a></li>
         <li><a href="#" ><i class="fas fa-sign-out-alt"></i><span class="signout"> Sign out</span></a></li>
         </ul>
        </div>
 
         
    <?php    
        $xml=simplexml_load_file("../../products.xml") or die("Error: Cannot create object"); 
        $xml=new DomDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $xml->preserveWhiteSpace=false;
        $xml->load("../../products.xml");
        if(!$xml)
        {
            $products=$xml->createElement("products");
            $xml->appendChild($products);
        }
        else
        {
            $products= $xml->firstChild;
        }

    if(isset($_POST['submit_Changes'])){
        $xml1=simplexml_load_file("../../products.xml") or die("Error: Cannot create object"); 
            $newName = $_POST["nname"];
            $newPrice = $_POST["nprice"];
            $newStock = $_POST["nstock"];
            $newId = $_POST["nid"];
            $a=$_POST['c'];  
            $counter=-1;
            foreach($xml1 as $p){
                $counter=$counter+1;
            if($xml1->  p[$counter]->id==$a){
                $xml1-> p[$counter]->name= $newName ;
                $xml1-> p[$counter]->price=$newPrice;
                $xml1-> p[$counter]->stock= $newStock ;
                $xml1-> p[$counter]->id= $newId ;            
            file_put_contents("../../products.xml",$xml1->saveXML());
            echo'<script type="text/javascript">
            window.location = "InventoryPHP.php";
            </script>';            }
        }
    }

    if(isset($_POST['edit'])){
            $xml=simplexml_load_file("../../products.xml") or die("Error: Cannot create object"); 
            $c=$_POST['id'];
            $counter=-1;
            foreach($xml as $p){
                $counter=$counter+1;                             
            if($xml-> p[$counter]->id==$c){
                $name=$xml-> p[$counter]->name;
                $price=$xml-> p[$counter]->price;
                $stock=$xml-> p[$counter]->stock;
                $id=$xml-> p[$counter]->id;
           
            echo"
            <div>
            <div class='image'>
                <form method='POST' action=''>
                    <br>
                    <h2>Change name:</h2>
                    <form>
                    <input type='text' class='input' name='nname' placeholder='New Name...' value='$name' />
    
                    <h2>Change price</h2>
                    <input type='text' class='input' name='nprice' placeholder='New Price...' value='$price'  />
                    
                    <h2>Change quantity</h2>
                    <input type='text' class='input' name='nstock' placeholder='New Price...' value='$stock'/>

                    
                    <h2>Change ID</h2>
                    <input type='text' class='input' name='nid' placeholder='New Price...' value='$id'/>

                    <h2>import new image</h2>
                    <input type='file' class='input' name='image' placeholder='import new image' />
    
                    <h2>current product image:</h2>
    
                    <img src='$name.jpg' alt='$name' style='width:400px;height:400px;'>
                    <input type='hidden' name='c' value='$c'/>
                    <input type='submit' name='submit_Changes'/>
                </form>
                <form method='POST' action='inventoryPHP.php'>
                <input type='submit' name='delete'  value='delete' /> 
                <input type='hidden' name='name' value='$c'/>
                </form>
               
            </div>
            </div>";
        }
    }
    }
        ?>
 
</body>

</html>