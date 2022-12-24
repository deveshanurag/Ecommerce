<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
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
        <h2 class="text-center mb-5">Admin Login</h2>
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
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"  required="required" class="form-control">
                    </div>
                    
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                    </div>
                    <p class="fw-bold mt-5">Don't have an account? <a href="admin_registration.php" class="text-decoration-none">Registration</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>


<?php


$con=mysqli_connect('localhost','root','','mystore');
if(!$con)
{
    die(mysqli_error($con));
}

if(isset($_POST['admin_login']))
{
    $admin_username=$_POST['username'];
    $admin_password=$_POST['password'];
    
    $select_login_query="Select * from `admin_table` where admin_name='$admin_username' ";
    $result_login_query=mysqli_query($con,$select_login_query);
    $login_rows_count=mysqli_num_rows($result_login_query);
    $login_rows_data=mysqli_fetch_assoc($result_login_query);
    
    if($login_rows_count>0)
    {
        session_start();
        $_SESSION['admin_name']=$admin_username;
        if(password_verify($admin_password,$login_rows_data['admin_password']))
        {

            if($login_rows_count==1 )
        {
         echo "<script>alert('You are successfully logged in')</script>";
         echo "<script>window.open('index.php','_self')</script>";
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