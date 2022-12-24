<?php
include('../includes/connection.php');
session_start();
if(isset($_GET['order_id']))

{
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id='$order_id'";
    $result_data=mysqli_query($con,$select_data);
    $row_data=mysqli_fetch_array($result_data);
    $data_invoice_number= $row_data['invoice_number'];
    $data_amount_due= $row_data['amount_due'];

    
}
if(isset($_POST['confirm_payment']))
{
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $payment_order_id=$order_id;
    

    $insert_query="insert into `user_payments`(	order_id,	invoice_number,	amount,	payment_mode,	date) values($payment_order_id,
    $invoice_number,$amount,'$payment_mode',NOW())";
    $run_query=mysqli_query($con,$insert_query);
    if($run_query)
    {
        echo "<script>alert('Payment Successful')</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_table="update `user_orders` set order_status='Complete' where order_id=$payment_order_id";
    $run_update=mysqli_query($con,$update_table);



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
     <!-- bootstrap css link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   
</head>
<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $data_invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $data_amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" id="" class="form-select w-50 m-auto">
                    <option >Select Payment Mode</option>
                    <option >UPI</option>
                    <option >Netbanking</option>
                    <option >Paypal</option>
                    <option >Cash On Deliery</option>
                    <option >Pay Offline</option>
                </select>
                <div class="form-outline my-4 text-center w-50 m-auto">
                    <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
                </div>    
            </div>

        </form>
    </div>
    
</body>
</html>