<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Due Amount</th>
            <th>Invoice number</th>
            <th>Total Products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $select_order="select * from user_orders";
    $result_order=mysqli_query($con,$select_order);
    $number=1;
    while($row_data=mysqli_fetch_array($result_order))
    {
        $order_id=$row_data['order_id'];
        $order_due_amount=$row_data['amount_due'];
        $order_invoice_number=$row_data['invoice_number'];
        $order_total_products=$row_data['total_products'];
        $order_status=$row_data['order_status'];
        $order_date=$row_data['order_date'];
        // $order_due_amount=$row_data['amount_due'];
        ?>
        <tr>
            <td><?php echo $number ?></td>
            
            <td><?php echo $order_due_amount ?></td>
            <td><?php echo $order_invoice_number ?></td>
            <td><?php echo $order_total_products ?></td>
            <td><?php echo $order_date  ?></td>
            <td><?php echo $order_status ?></td>
            
            <td><a href='index.php?delete_order=<?php echo $order_id  ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal" ><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-light text-decoration-none"></a> No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_order=<?php echo $order_id  ?>'  class=" text-light text-decoration-none"  > Yes</a></button>
      </div> 
    </div>
  </div>
</div>