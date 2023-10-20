<?php
session_start();
$connect=mysqli_connect("localhost","root","","project");
if(isset($_POST["add_to_card"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"],"item_id");

        if(!in_array($_GET["id"],$item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            $item_array= array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST['hidden_price'],
                'item_quantity' => $_POST['quantity']
            );
            $_SESSION["shopping_cart"][$count]=$item_array;
        }

        else
        {
            echo '<script>alert("Item already added")</script>';
            echo '<script>window.location="card1.php"</script>';


        }
    }
    else{
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST['hidden_price'],
            'item_quantity' => $_POST['quantity'] );

        $_SESSION["shopping_cart"][0]=$item_array;
    }
}

if(isset($_GET["action"]))
{
    if($_GET["action"]=="delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys=>$values)
        {
            if($values["item_id"]==$_GET["id"])
            {
                unset($_SESSION["shopping_cart"] [$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="card.php"</script>';

            }
        }
    }
}

?>
<html>
<head>
<style>
body{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color:black;
    background: url(c9.jpg)no-repeat center fixed;
    background-size: cover;
   
   
}

.table{
    padding: 90px 5px;
    
            
           left:2px;
}

table,td,th{
    border:2px solid crimson;
    border-collapse:collapse;
    height:20%;
    background-color:darkgray;
    box-shadow: 2px 2px 10px red;
}

.text1{
    padding: 8px 12px;
            position: absolute;
            top:100px;
           left:250px;
           font-size:23px;
           font-style:italic;
           color:orangered;
}

.sbtn{
    padding: 10px 50px;
            position: absolute;
            top: 550px;
            left: 960px;
           border-radius: 10px;
           background-color: orangered;
           color: white;
           cursor: pointer;
           border: transparent;
}

.text2{
    padding: 15px 30px;
            position: absolute;
            top: 110px;
            left:950px;
            border: transparent;
           background-color: transparent;
           color: black;
           font-size:25px;
           cursor: pointer;
           style:bold;
}


.txt3{
    
            
            top: 20px;
            left:900px;
            border: transparent;
           background-color: transparent;
           color: black;
           font-size:18px;
           cursor: pointer;
}

.txt3:hover{
   
    color:orangered;

}

.i1{
    padding: 15px 30px;
            position: absolute;
            top: 170px;
            left:850px;
           color: black;
           font-size:20px;
           cursor: pointer;    
}

.i11{
    padding: 15px 30px;
            position: absolute;
            top: 230px;
            left:850px;
           color:black;
           font-size:20px;
           cursor: pointer;    
}

.i12{
    padding: 15px 30px;
            position: absolute;
            top: 290px;
            left:850px;
           color: black;
           font-size:20px;
           cursor: pointer;    
}

.i13{
    padding: 15px 30px;
            position: absolute;
            top: 350px;
            left:850px;
           color: black;
           font-size:20px;
           cursor: pointer;    
}

.i14{
    padding: 15px 30px;
            position: absolute;
            top: 410px;
            left:850px;
           color: black;
           font-size:20px;
           cursor: pointer;    
}

.i15{
    padding: 15px 30px;
            position: absolute;
            top: 470px;
            left:850px;
           color: black;
           font-size:20px;
           cursor: pointer;    
}




input{

    width:200px;
    height:30px;
    border:none;
    color:white;
    border-bottom: 2px solid white;
    background: transparent;
    align:center;
    font-size:20px;
}

.navbar{

overflow: hidden;
    background-color: crimson;
    position: fixed;
    top: 0;
    width: 200%;
    padding:5px 100px;
    left: 0;
 }



.navbar a{
            float: left;
             display: block; 
             left: 200px;
             color:black;
             text-align:center;
             padding: 15px 65px;
             text-decoration: none;
             font-size: 20px;
             font-style: bold;
         }

        

        .navbar a:hover{
        
            color:darkturquoise;
            border-radius: 30px;
        }

        .cong{
                    background: rgba(169, 169, 169, 0.829);
                    padding: 15px 30px;
                    display:absolute;
                height: 450px;
                margin-left: 180px;
                width: 340px;
                margin:830px;
                margin-top: -340px;
                box-shadow: 2px 2px 10px crimson;

        }
</style>
</head>
<body>
<div class="navbar">
   
    
    
    <a href="homepage.php" >Home</a>
   
    
    <a href="card.php">Store</a>
    <a href="card1.php">Checkout</a>
    
    <a href="logout.php">Logout</a>
    <a  href=""  >Welcome <?php  
    echo $_SESSION['username'];
    ?></a>
</div>
<form action="checkout1.php" method="POST">

    <div style="clear:both">
    </div>
    <br>
    <br>
    <br>
    <br>
    <p class="text1" style="color:orangered"> Order Details</p>

    <div class="table">
        <table  width="50%" height="80%" >
            <tr>
            <th width="30%" height="50%">Item Name</th>
            <th width="20%">Quantity</th>
            <th width="20%">Price</th>
            <th width="20%">Total</th>
            <th width="20%">Action</th>
            </tr>
            <?php 
            if(!empty($_SESSION["shopping_cart"]))
            {
                $total=0;
                foreach($_SESSION["shopping_cart"] as $key => $values)
                {
            ?>
                <tr>
                    <td align="center"><?php echo $values["item_name"]; ?></td>
                    <td align="center"><?php echo $values["item_quantity"]; ?></td>
                    <td align="center"><?php echo $values["item_price"]; ?></td>
                    <td align="center"><?php echo number_format($values["item_quantity"]*$values["item_price"],2); ?></td>
                    <td align="center"><a href="card1.php?action=delete&id=<?php  echo $values["item_id"]; ?>" style="color:red">Remove</a></td>
                </tr>
                <?php 

                $total= $total +($values["item_quantity"] * $values["item_price"]);
               
                }
                ?>
                <tr>
                <td colspan="2" align="center" ><button class="txt3"  onclick="a()">Back to store</button></td>
                <td  align="right">Total</td>
                <td align="center">$<?php echo number_format($total,2); ?></td>
               
               <script>
                   function a(){
                       window.open("card.php");
                   }
                   </script>
        </tr>
                <?php

                }
             ?> </table>

    </div>  

    <br>
            </form>
    <div >

    <p  class="text2" > Checkout</p>
    </div>
 <div class="cong">   
<form method="POST" action="checkout1.php">
    <p class="i1">First Name:         <input type="text" name="fn" /></p>
    <p class="i11">Last Name:             <input type="text" name="ln" /></p>
    <p class="i12">Email-Id:             <input type="text" name="ei" /></p>
    <p class="i13">Phone-No:             <input type="text" name="pn" /></p>
    <p class="i14">Address:             <input type="text" name="ad" /></p>
    
    <p class="i15">Total Price:         <input type="text" name="tp" value="$<?php echo number_format($total,2); ?> "/></p>

    <button  type="submit" class="sbtn" name="bt1" value="submit" >Submit</button>
   
</form>

</div>

</body>
</html>