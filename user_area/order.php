<?php
include('../includes/connection.php');
include('../functions/common_function.php');
session_start();
if(isset($_GET['user_id']))
{

    $user_sessionn_name=$_SESSION['username'];
    $selectt_query="Select * from `user_table` where username='$user_sessionn_name'";
    $resultt_query=mysqli_query($con,$selectt_query);
    $row_fetchh=mysqli_fetch_assoc($resultt_query);
    $user_id=$row_fetchh['user_id'];




    //$user_id=$_GET['user_id'];
}
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price))
{
    $product_id=$row_price['product_id'];
    $select_product="Select * from `products` where product_id=$product_id";
    $result_product=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($result_product))
    {
        $product_price=array($row_product_price['product_price']);
        $product_value=array_sum($product_price);
        $total_price+=$product_value;

    }
}


// getting quantity from quantity

$get_cart="Select * from`cart_details`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0)
{
    $quantity=1;
    $subtotal=$total_price;


}
else
{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

$insert_orders="Insert into `user_orders`(user_id,amount_due,	invoice_number,	total_products,	order_date,	order_status	
) values($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($insert_orders)

{
    echo "<script>alert('Orders are submitted successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// pending

$insert_pendings_orders="Insert into `order_pending`(user_id,	invoice_number,	product_id,	quantity,	order_status
) values($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_query=mysqli_query($con,$insert_pendings_orders);


//delete cart

$empty_cart="Delete from `cart_details`  where ip_address='$get_ip_address'";
$result_delete_query=mysqli_query($con,$empty_cart);




?>