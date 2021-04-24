<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>supergroceries website editing menu</title>
   <link type="text/css" rel="stylesheet" href="mainstyle.css">
   <link type="text/css" rel="stylesheet" href="Liststyle.css">
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
         <center>
            <img src="User image.jpg" class="profile_image" alt=" Josh Lee.jpg">
            <h4>Josh Lee</h4>
         </center>
         <ul>
         <li><a href="index.php"><span> Dashboard</span></a></li>
         <li><a href="inventoryPHP.html"><i class="fas fa-shopping-cart"></i><span> Inventory</span></a></li>
         <li><a href="Users List.html"><i class="fas fa-user-friends"></i><span> Users</span></a></li>
         <li><a href="Orders List.html"><i class="fas fa-file-invoice-dollar"></i><span> Orders</span></a></li>
         <li><a href="#" ><i class="fas fa-sign-out-alt"></i><span class="signout"> Sign out</span></a></li>
         </ul>
         <!--Functionn of the Products pages-->
      </div>
    <!-- <h3>Select the order you want to edit:</h3> -->
    <main>
        <section class="recent">
            <div class="list-table-grid">
                <div class="list-table">
                    <h2><pre> Product:</pre></h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Images</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Tomatoes-->
                            <?php
                            $xml=simplexml_load_file('../../products.xml') ;
                            $xml1=new DomDocument("1.0","UTF-8");
                            $xml1->load("../../products.xml");

                            $counter=0;                          

                                if(isset($_POST['delete'])){
                                    $dname= $_POST['id'];
                                    $xpath=new DOMXPATH($xml1);
                                foreach($xpath->query("/products/p[id='$dname']") as $node)
                                    {
                                        $node-> parentNode->removeChild($node);
                                    }
                                    $xml1->save("../../products.xml");
                                   echo'<script > 
                                   window.onload = function() {
                                    if(!window.location.hash) {
                                        window.location = window.location + "#loaded";
                                        window.location.reload();
                                    }
                                }
                                          </script>' ;
                                }


                                

                            foreach($xml as $p){
                                $name=$xml-> p[$counter]->name;
                                $price=$xml-> p[$counter]->price;
                                $stock=$xml-> p[$counter]->stock;
                                $id=$xml-> p[$counter]->id;

                                $counter=$counter+1;                             

                            echo "<div>
                                <tr>

                                    <td>$id</td>
                                    <td> <img src='$name.jpg' alt='$name' style='width:100px;height:100px'></td>
                                    <td>$name </td>
                                   
                                    <td>$price / lbs</td>
                                    <td>
                                    $stock 
                                      </td>
                                       <td>
                                       <form method='POST' action=''>
                                       <input type='submit' name='delete'  value='delete' /> 
                                       <input type='hidden' name='id' value='$id'/>
                                       </form> 
                                        
                                        <form method='POST' action='edit_products.php'>
                                        <input type='submit' name='edit'  value='edit' /> 
                                        <input type='hidden' name='id' value='$id'/>
                                        </td>
                                        </form> 
                                        </td>
                                </tr>
                                
                            </div>   ";
                            }
                            echo "<div><td>
                            <form method='POST' action='add_product.php'>
                           <input type='submit' name='add'  value='add a new product' />
                            </td> </div>";
                     ?>            
                            </tbody>
                    </table>
                </div>
            </div>
    </main>

</body>

</html>