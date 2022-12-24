<?php
include('includes/connection.php');
include('functions/common_function.php');
//session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        .pay{
            width:500px;
        }
    </style>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
</head>
<body>

<?php
$user_ip=getIPAddress();
$select_query_payment="Select * from `user_table` where user_ip='$user_ip'";
$result_payment=mysqli_query($con,$select_query_payment);

$run_query=mysqli_fetch_array($result_payment);
$user_id=$run_query['user_id'];

?>
    <div class="container">
        <h2 class="text-center text-info mb-5">Payment Options</h2>
        <div class="row d-flex justifiy-content-center align-items-center my-5" >
        <div class="col-md-6">
                <a href="user_area/order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"><h2 class="text-center">Pay Online</h2></a>
            </div>
            <div class="col-md-6">
                <a href="user_area/order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"><h2 class="text-center">Pay Offline</h2></a>
            </div>
            
        </div>
    </div>
    
</body>
</html>