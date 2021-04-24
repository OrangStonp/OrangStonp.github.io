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
        $xml=simplexml_load_file("users.xml") or die("Error: Cannot create object"); 
        $xml=new DomDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $xml->preserveWhiteSpace=false;
        $xml->load("users.xml");
        if(!$xml)
        {
            $users=$xml->createElement("users");
            $xml->appendChild($users);
        }
        else
        {
            $users= $xml->firstChild;
        }

    if(isset($_POST['submit_Changes'])){
        $xml1=simplexml_load_file("users.xml") or die("Error: Cannot create object"); 
            $newUsername = $_POST["nusername"];
            $newEmail = $_POST["nemail"];
            $newPhonenb = $_POST["nphonenb"];
            $newPosition = $_POST["nposition"];
            $newId = $_POST["nid"];
            $a=$_POST['c'];  
            $counter=-1;
            foreach($xml1 as $p){
                $counter=$counter+1;
            if($xml1->  p[$counter]->id==$a){
                $xml1-> p[$counter]->username= $newUsername ;
                $xml1-> p[$counter]->email=$newEmail;
                $xml1-> p[$counter]->phonenb=$newPhonenb;
                $xml1-> p[$counter]->position= $newPosition ;
                $xml1-> p[$counter]->id= $newId ;            
            file_put_contents("users.xml",$xml1->saveXML());
          
            header("refresh:2;url=UserListPHP.php");
            echo"
            <div class='mostviewed'>
            <br>
            <h2> Changes have been submitted </h2>
            </div>";
            }
        }
    }

    if(isset($_POST['edit'])){
            $xml=simplexml_load_file("users.xml") or die("Error: Cannot create object"); 
            $c=$_POST['id'];
            $counter=-1;
            foreach($xml as $p){
                $counter=$counter+1;                             
            if($xml-> p[$counter]->id==$c){
                $username=$xml-> p[$counter]->username;
                $email=$xml-> p[$counter]->email;
                $phonenb=$xml-> p[$counter]->phonenb;
                $position=$xml-> p[$counter]->position;
                $id=$xml-> p[$counter]->id;
           
            echo"
            <div>
            <div class='image'>
                <form method='POST' action=''>
                    <br>
                    <h2>Change Username:</h2>
                    <form>
                    <input type='text' class='input' name='nusername' placeholder='New User Name...' value='$username' />
    
                    <h2>Change Email</h2>
                    <input type='text' class='input' name='nemail' placeholder='New Email...' value='$email'  />

                     <h2>Change Phone number</h2>
                    <input type='text' class='input' name='nphonenb' placeholder='New Contact Number...' value='$phonenb'  />

                    <h2>Change Position</h2>
                    <input type='text' class='input' name='nposition' placeholder='New Position...' value='$position'/>

                    
                    <h2>Change ID</h2>
                    <input type='text' class='input' name='nid' placeholder='New ID...' value='$id'/>

                    <input type='hidden' name='c' value='$c'/>
                    <br>
                    <input type='submit' name='submit_Changes'/>
                </form>
                <form method='POST' action='userlistPHP.php'>
             
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