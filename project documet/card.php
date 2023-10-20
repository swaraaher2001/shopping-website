<?php
session_start();
$connect=mysqli_connect("localhost","root","","project");
?>


<html>
    <head>
        <title>

        </title>
        
    <style>
        body{
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color:#fff;
    background: url(c1.jpg);;
    background-size: cover;
}
    .navbar{

        overflow: hidden;
            background-color: crimson ;
            position: fixed;
            top: 0;
            width: 200%;
            padding:5px 100px;
            left: 05px;
         }

        
         .navbar a{
            float: left;
             display: block; 
             left: 200px;
             color:black;
             text-align:center;
             padding: 15px 65px;
             text-decoration: none;
             font-size: 22px;
            
         }
        
        

        .navbar a:hover{
        
            color:darkturquoise;
            border-radius: 30px;
        }

      



    .cards{
        
        width: 15%;
        float:left;
       
        padding:0 10px;
        height: 62%;
        color:crimson;
        display: inline-block;
        border-radius: 5px;
        margin: 56px;
        box-shadow: 2px 2px 10px black;
        margin-top: 20px;
        background-color:gray;
    }

    .main{
        
        margin-top: 8%;
        
    }

    .container{
        margin:0-5px;
    }

    .body{
        font-family: Arial, Helvetica, sans-serif;
    }

    .image{
        overflow:hidden;
        
        border-radius:10px;
       
        object-fit:contain;
        padding:25px;
    }
    
    .image img{
        width: 100%;
        height:130px;
        border-top-right-radius:5px;
        border-top-left-radius:5px;
        transition: all 1.5s ease;
        box-shadow: 2px 2px 10px red;
    }

    .image:hover img{
        
        transform: scale(1.5);
    }

    .title{
        text-align:center;
        margin-top:-20px;
        color:black;
        font-style:bold;
    text-shadow: 2px 2px 10px red;
    }

    .des{
        text-align:center;
        margin-top:5px;
    }

    .btn{
        margin-top: 10px;
        margin-left:60px;
        margin-bottom: 30px;
        background-color: white;
        border: 1px solid black;
        padding: 10px;
        border-radius: 5px;
    }

    .btn:hover{
        background-color:crimson;
        color: white;
        transition: .5s;
        cursor: pointer;

    }

    input{
        width:137px;
        margin-left:35px;
        padding: 4px 2px;
    }
    
    @media screen and (max-width:600px){.main{
        width:100%;
        display:block;
        margin-bottom:20px;
    }
    }
    </style>
    </head>
    <body>
    <div class="navbar">
   
    
    
    <a href="homepage.php">Home</a>
   
    
    <a href="card.php">Store</a>
    <a href="card1.php">Checkout</a>
    
    <a href="logout.php">Logout</a>
    <a  href=""  >Welcome <?php  
    echo $_SESSION['username'];
    ?></a>
    
</div>
<br>
   <br>
   <br><br>
   <br>
   <br><br>

            <div class="container" >
                
                <?php
                    $quary="select * from tbl_product order by id ASC";
                    $result=mysqli_query($connect,$quary);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                      
                    <div class="container" >
               
                        <form method="POST" action="card1.php?action=add&id=<?php echo $row["id"]; ?>">
                                <div class="cards">
                                    <div class="image">
                                        <img src="<?php echo $row["image"]; ?>" />
                                    </div>
                                    <div class="title">
                                   <p> <?php echo $row["name"]; ?></p>
                                   </div>
                                   <div class="des">
                                   <h4>$<?php echo $row["price"]; ?><h4>
                                    </div>
                                   <div class="text"> 
                                 <input type="text" name="quantity" value="1" />
                                    </div>  
                                 <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                                 <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                                   
                                    
                                    <button class="btn" name="add_to_card">Add to card</button>
                                    
                                </div> 
                        </form> 
                    </div>
                    <?php
                        }
                    }
                    ?>

</div>
 </body>
</html>