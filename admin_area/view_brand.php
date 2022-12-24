<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Sl no</th>
            <th>Brand Id</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
    <?php
    $select_brand="select * from brands";
    $result_brand=mysqli_query($con,$select_brand);
    $number=1;
    while($row_data=mysqli_fetch_array($result_brand))
    {
        $brands_id=$row_data['brands_id'];
        $brands_title=$row_data['brands_title'];
    


    ?>


        <tr class=' text-center'>
            <td><?php echo $number  ?></td>
            <td><?php echo $brands_id  ?></td>
            <td><?php echo $brands_title  ?></td>
            
            <td><a href='index.php?edit_bran=<?php echo $brands_id  ?>'  class='text-light'><i class='fa-solid fa-pen-to-square'></i></a> </td>
            
            <td><a href='index.php?delete_bran=<?php echo $brands_id  ?>' type="button" class=" text-light" data-toggle="modal" data-target="#exampleModal" ><i class='fa-solid fa-trash'></i></a></td>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brand" class="text-light text-decoration-none"></a> No</button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_bran=<?php echo $brands_id  ?>'  class=" text-light text-decoration-none"  > Yes</a></button>
      </div> 
    </div>
  </div>
</div>