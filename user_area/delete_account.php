
    <h3 class="text-danger text-center mb-4">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto bg-info" name="delete" value="Delete Account"> 
            
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto bg-info" name="no_delete" value="Don't Delete Account"> 
            
        </div>
    </form>

    <?php
    $username_delete=$_SESSION['username'];
    if(isset($_POST['delete']))
    {
        $delete_query="delete from `user_table` where username='$username_delete'";
        $result_delete_query=mysqli_query($con,$delete_query);
        if($result_delete_query)
    
        {
            session_destroy();
            echo "<script>alert('account deleted')</script>";
            echo "<script>window.open('../index.php','_self')</script>";

        }

    }
    else if(isset($_POST['no_delete']))
    {
        echo "<script>window.open('profile.php','_self')</script>";
    }

    ?>
    
