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
         <li><a href="Products List.html"><i class="fas fa-shopping-cart"></i><span> Inventory</span></a></li>
         <li><a href="Users List.html"><i class="fas fa-user-friends"></i><span> Users</span></a></li>
         <li><a href="Orders List.html"><i class="fas fa-file-invoice-dollar"></i><span> Orders</span></a></li>
         <li><a href="#" ><i class="fas fa-sign-out-alt"></i><span class="signout"> Sign out</span></a></li>
         </ul>
         <!--Functionn of the User pages-->
      </div>
    <!-- <h3>Select the user you want to edit:</h3> -->
    <main>
        <section class="recent">
            <div class="list-table-grid">
                <div class="list-table">
                    <h2><pre> User:</pre></h2>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Position</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--Tomatoes-->
                            <?php
                            $xml=simplexml_load_file('users.xml') ;
                            $xml1=new DomDocument("1.0","UTF-8");
                            $xml1->load("users.xml");

                            $counter=0;                          

                                if(isset($_POST['delete'])){
                                    $dname= $_POST['id'];
                                    $xpath=new DOMXPATH($xml1);
                                foreach($xpath->query("/users/p[id='$dname']") as $node)
                                    {
                                        $node-> parentNode->removeChild($node);
                                    }
                                    $xml1->save("users.xml");
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
                                $username=$xml-> p[$counter]->username;
                                $email=$xml-> p[$counter]->email;
                                $phonenb=$xml->p[$counter]->phonenb;
                                $position=$xml-> p[$counter]->position;
                                $id=$xml-> p[$counter]->id;                             

                                $counter=$counter+1;                             

                            echo "<div>
                                <tr>

                                    <td>$id</td>
                                    <td>$username </td>
                                    <td>$email</td>
                                    <td>$phonenb</td>
                                    <td>$position</td>
                                    
                                       <td>
                                       <form method='POST' action=''>
                                       <input type='submit' name='delete'  value='delete' /> 
                                       <input type='hidden' name='id' value='$id'/>
                                       </form> 
                                        
                                        <form method='POST' action='edit_users.php' target='_blank'>
                                        <input type='submit' name='edit'  value='edit' /> 
                                        <input type='hidden' name='id' value='$id'/>
                                        </td>
                                        </form> 
                                        </td>
                                </tr>
                                
                            </div>   ";
                            }
                            echo "<div><td>
                            <form method='POST' action='add_user.php' target='_blank'>
                           <input type='submit' name='add'  value='Add new user' />
                            </td> </div>";
                     ?>            
                            </tbody>
                    </table>
                </div>
            </div>
    </main>

</body>

</html>