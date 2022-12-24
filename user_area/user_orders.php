<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success">All My Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sl no</th>
                <th>Amount Due</th>
                <th>Total products</th>
                <th>Invoice number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
        <?php
          $select_username=$_SESSION['username'];
          $select_user="Select * from `user_table` where username='$select_username' ";
          $result_user=mysqli_query($con,$select_user);
          $get_user=mysqli_fetch_array($result_user);
          $select_userid=$get_user['user_id'];

          $select_product="Select * from `user_orders` where user_id='$select_userid' ";
          $result_product=mysqli_query($con,$select_product);
          $number=1;
          while($row_product=mysqli_fetch_array($result_product))
        {
            $product_amount_due=$row_product['amount_due'];
            $product_invoice_number=$row_product['invoice_number'];
            $product_total_products=$row_product['total_products'];
            $product_order_date=$row_product['order_date'];
            $product_order_status=$row_product['order_status'];
            $product_order_id=$row_product['order_id'];
            if($product_order_status=='pending')
            {
                $product_order_statuss='Incomplete';

            }
            else
            {
                $product_order_statuss='Complete';
            }
            
            //$product_invoice_number=$row_product['invoice_number'];
            //$product_invoice_number=$row_product['invoice_number'];
        
        echo "
            <tr>
                <td>$number</td>
                <td>$product_amount_due</td>
                <td>$product_total_products</td>
                <td>$product_invoice_number</td>
                <td>$product_order_date</td>
                
                <td>$product_order_statuss</td>";
                ?>

                <?php
                if($product_order_status=='pending')
            {echo "
                <td><h5><a href='confirm_payment.php?order_id=$product_order_id' class='text-light text-decoration-none'>Confirm</a></h5></td>
            </tr>";
            }
            else
            {
                echo"<td><h5 class='text-light text-decoration-none'>Paid</a></td>
                </tr>";
            }
        
        $number++;
        }



        ?>

        </tbody>
    </table>
</body>
</html>