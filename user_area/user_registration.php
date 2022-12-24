<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user regestration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center" >
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username -->
                    <div class="form-outliner mb-4">

                    
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off
                        " required="required" name="user_username"/>
                    </div>
                    <!-- email -->
                    <div class="form-outliner mb-4">
                    <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off
                        " required="required" name="user_email"/>

                    </div>
                    <!-- image -->
                    <div class="form-outliner mb-4">
                    <label for="user_imagee" class="form-label">User Image</label>
                        <input type="file" id="user_imagee" class="form-control" 
                         required="required" name="user_imagee"/>

                    </div>
                    <!-- password -->

                    <div class="form-outliner mb-4">
                    <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off"
                         required="required" name="user_password"/>

                    </div>
                    <!--confirm password -->

                    <div class="form-outliner mb-4">
                    <label for="confirm_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_user_password" class="form-control" placeholder="confirm your Password" autocomplete="off"
                         required="required" name="confirm_user_password"/>

                    </div>
                   <!-- address -->
                    <div class="form-outliner mb-4">

                    
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off
                        " required="required" name="user_address"/>
                    </div>
                    <!--contact -->

                    <div class="form-outliner mb-4">

                    
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your Contact" autocomplete="off
                        " required="required" name="user_contact"/>
                    </div>

                    <div class="text-center">
                        <input type="submit" value="register" class="bg-info py-2 px-3 border-0 "name="user_register">
                    </div>
                    <p class="fw-bold">Already have an account?  <a href="user_login.php" class="text-decoration-none">Login</a> </p>

                </form>
            </div>
        </div>
    </div>

    
</body>
</html>

<!-- connection -->
<?php
$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}



?>
<!-- php -->

<?php
if(isset($_POST['user_register']))
{
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password=$_POST['confirm_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_imagee=$_FILES['user_imagee']['name'];
    $user_imagee1=$_FILES['user_imagee']['tmp_name'];
    $user_ip=getIPAddress();

    // select
    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'  ";
    $result_select_query=mysqli_query($con,$select_query);
    $select_rows_count=mysqli_num_rows($result_select_query);
    if($select_rows_count>0)
    {
        echo "<script>alert('Username or email already present')</script>";
    }
    else if($confirm_user_password!=$user_password)
    {
        echo "<script>alert('Password and Confirm Password don't match')</script>";
    }
    else
    {




    // insert query
    move_uploaded_file($user_imagee1,"./user_images/$user_imagee");
    $insert_query="Insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
    values('$user_username','$user_email','$hash_password','$user_imagee','$user_ip','$user_address','$user_contact')
    ";
    $result_query=mysqli_query($con,$insert_query);
    



}

$select_cart="Select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart);
$cart_rows_count=mysqli_num_rows($result_cart);
if($cart_rows_count>0)
{
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}
else
{
    echo "<script>window.open('../index.php','_self')</script>";
}


}
?>