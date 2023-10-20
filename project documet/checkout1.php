<?php

$firsterr=$lasterr=$emailerr=$phoneerr="";
$first=$last=$email=$phone="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if((empty($_POST["fn"]))&&(empty($_post["ln"]))&&(empty($_POST["ei"]))&&(empty($_post["pn"]))&&(empty($_post["ad"])))
    {
        header('location:congo4.php');
    }
    
     else
        {
            
            session_start();
            header('location:signup.php');
            $con = mysqli_connect('localhost','root');
            if($con)
                {
                  
                    echo "connection successful";
                    header('location:congo2.php');
                    
                }
            else
                {
                    echo "no connection";
                }
            
            mysqli_select_db($con,'project');
            
            $fn = $_POST['fn'];
            $ln = $_POST['ln'];
            $em = $_POST['ei'];
            $pn = $_POST['pn'];
            $ad = $_POST['ad'];
            $p = $_POST['tp'];
            
            $q = " select * from check1 where first = '$fn' && last ='ln' && email = '$em' && phone = '$pn' && address = '$ad' && price = '$p'" ;
            
            $result = mysqli_query($con,$q);
            
            $num = mysqli_num_rows($result);
            
            if($num == 1){
                echo "<br><br>dupicate data.";
                header('location:dup.php');
            }
            
            else{
                $qy = " insert into check1(first,last,email,phone,address,price) values ('$fn','$ln','$em','$pn','$ad','$p')";
                
                mysqli_query($con,$qy);
            }
            
            
            
            
            
            
            
            
        

    }
}
    
?>





