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
    <title>Admin Registration</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body{
        overflow-x: hidden;
    }
</style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6">
                <img src="./product_images/bike1.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholde="Enter
                        your username" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholde="Enter
                        your email" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"  required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="confirm_password" id="confirm_password" name="confirm_password"  required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Regisration">
                    </div>
                    <p class="fw-bold mt-5">Already have an account? <a href="admin_login.php" class="text-decoration-none">Login</a> </p>
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
if(isset($_POST['admin_registration']))
{
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password=$_POST['confirm_password'];
    $admin_ip=getIPAddress();

    // select
    $select_query="Select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'  ";
    $result_select_query=mysqli_query($con,$select_query);
    $select_rows_count=mysqli_num_rows($result_select_query);
    if($select_rows_count>0)
    {
        echo "<script>alert('Username or email already present')</script>";
    }
    else if($confirm_admin_password!=$admin_password)
    {
        echo "<script>alert('Password and Confirm Password don't match')</script>";
    }
    else
    {

         // insert query
    
    $insert_query="Insert into `admin_table`(admin_name,admin_email,admin_password)
    values('$admin_username','$admin_email','$hash_password')
    ";
    $result_query=mysqli_query($con,$insert_query);
    if($result_query)
    {
        echo "<script>alert('You have successfully registered.Please login to continue')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
    
}
}
?>