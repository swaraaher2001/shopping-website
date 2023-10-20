<?php

$usererr=$passerr="";
$user=$pass="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if ((empty($_POST["user"]))&&(empty($_POST["password"])))
    {
        header('location:congo3.php');
    }

    else
    {
        $user=$_POST["user"];
        $pass=$_POST["password"];

        if(!preg_match("/^[a-zA-Z ]*$/",$user))
        {
            $usererr="Only letters and whitespace allowed";
            header('location:signup.php');
        }
        elseif(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$pass))
        {
            $passerr="Must contain at least one uppercase,8 character and digits and special character";
            header('location:signup.php');
        }
        else
        {
        
            session_start();
            header('location:signup.php');
            $con = mysqli_connect('localhost','root');
            if($con)
                {
                
                    echo "connection successful";
                    header('location:congo.php');
                    
                }
            else
                {
                    echo "no connection";
                }

            mysqli_select_db($con,'project');

            $name = $_POST['user'];
            $pass = $_POST['password'];


            $q = " select * from signin where name = '$name' && password ='$pass' ";

            $result = mysqli_query($con,$q);

            $num = mysqli_num_rows($result);

            if($num == 1){
                echo "<br><br>dupicate data.";
                header('location:dup.php');
            }

            else{
                $qy = " insert into signin(name , password) values ('$name','$pass')";
                mysqli_query($con,$qy);
            }




            
        }

    }

}



?>



               