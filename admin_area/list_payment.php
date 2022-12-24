<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Amount</th>
            <th>Invoice number</th>
            <th>Payment mode</th>
            <th>Payment date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $select_payment="select * from user_payments";
    $result_payment=mysqli_query($con,$select_payment);
    $number=1;
    while($row_data=mysqli_fetch_array($result_payment))
    {
        $payment_id=$row_data['payment_id'];
        $payment_amount=$row_data['amount'];
        $payment_invoice_number=$row_data['invoice_number'];
        $payment_mode=$row_data['payment_mode'];
        $payment_date=$row_data['date'];
        // $order_due_amount=$row_data['amount_due'];
        ?>
        <tr>
            <td><?php echo $number ?></td>
            
            <td><?php echo $payment_amount ?></td>
            <td><?php echo $payment_invoice_number ?></td>
            <td><?php echo $payment_mode ?></td>
            <td><?php echo "success"  ?></td>
            <td><?php echo $payment_date ?></td>
            
            <td><a href='index.php?delete_payment=<?php echo $payment_id  ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal" ><i class='fa-solid fa-trash'></i></a></td>
            <?php
            echo "
        </tr>";
        $number++;
    }
    ?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payment" class="text-light text-decoration-none"></a> No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_payment=<?php echo $payment_id  ?>'  class=" text-light text-decoration-none"  > Yes</a></button>
      </div> 
    </div>
  </div>
</div>