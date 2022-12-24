<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Product Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        
        <?php
        
            $select_product="select * from `products`";
            $result_product=mysqli_query($con,$select_product);
            while($row_product=mysqli_fetch_array($result_product))
            {
                $product_id=$row_product['product_id'];
                $product_title=$row_product['product_title'];
                $product_price=$row_product['product_price'];
                $product_image1=$row_product['product_image1'];
                $product_status=$row_product['status'];

                echo 
                "
                <tr class=' text-center'>
                <td>$product_id</td>
            <td>$product_title</td>";
            ?>
            <td><img src="./product_images/<?php echo $product_image1 ?>" alt="" height="100px" width="100px"> </td>
            <?php
            echo "
            <td>$product_price</td>";
            ?>
            <?php
            $select_pro="select * from `order_pending` where product_id=$product_id";
            $run_pro=mysqli_query($con,$select_pro);
            $rows_count=mysqli_num_rows($run_pro);

            echo "<td>$rows_count</td>";
            ?>
            <?php
            echo"
            
            <td>$product_status</td>";
            ?>

            <td><a href='index.php?edit_products=<?php echo $product_id  ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a> </td>
            
            <td><a href='index.php?delete_products=<?php echo $product_id  ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
            <?php
            echo "
            </tr>";
                
                



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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_products" class="text-light text-decoration-none"></a> No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_products=<?php echo $product_id  ?>'  class=" text-light text-decoration-none"  > Yes</a></button>
      </div> 
    </div>
  </div>
</div>