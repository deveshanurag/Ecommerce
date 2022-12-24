
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center" >
            <div class="col-lg-12 col-xl-6" >
                <form action="" method="post" entype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outliner mb-4 mt-5">

                    
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off
                        " required="required" name="user_username"/>
                    </div>
                    
                    
                    <!-- password -->

                    <div class="form-outliner mb-4">
                    <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off"
                         required="required" name="user_password"/>

                    </div>
                   
                   

                    <div class="text-center">
                        <input type="submit" value="login" class="bg-info py-2 px-3 border-0 "name="user_login">
                    </div>
                    <p class="fw-bold">Don't have an account?  <a href="user_registration.php" class="text-decoration-none">Register</a> </p>

                </form>
            </div>
        </div>
    </div>

    
</body>
</html>

<?php


$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}


function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  





if(isset($_POST['user_login']))
{
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    
    $select_login_query="Select * from `user_table` where username='$user_username' ";
    $result_login_query=mysqli_query($con,$select_login_query);
    $login_rows_count=mysqli_num_rows($result_login_query);
    $login_rows_data=mysqli_fetch_assoc($result_login_query);
    $user_ip=getIPAddress();

    //cart item

    $select_cart="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con, $select_cart);
    $cart_rows_count=mysqli_num_rows($result_cart);



    if($login_rows_count>0)
    {
        session_start();
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$login_rows_data['user_password']))
        {

            if($login_rows_count==1 and $cart_rows_count==0)
        {
         echo "<script>alert('You are successfully logged in')</script>";
         echo "<script>window.open('profile.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('You are successfully logged in')</script>";
         echo "<script>window.open('../payment.php','_self')</script>";
        }
        }
        else
        {
            echo "<script>alert('Invalid username or password')</script>";
        }
    }
    else
    {
        echo "<script>alert('Invalid username or password')</script>";
    }
}
?>