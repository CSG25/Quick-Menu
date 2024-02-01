
<?php include('partials/menu.php'); ?>


    <!-- Main Content Section Start -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Admin Manage</h1>
        
        <br/>

        <?php
          if(isset($_SESSION['add'])) {

            echo $_SESSION['add'];
            unset($_SESSION['add']); //Removing Session Message
          }

          if(isset($_SESSION['delete'])) {

            echo $_SESSION['delete'];
            unset ($_SESSION['delete']);

          }
          if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset ($_SESSION['update']);
          }
        //   if(isset($_SESSION['user-not-found'])) 
        //   {
        //     echo $_SESSION['user-not-found'];
        //     unset ($_SESSION['user-not-found']);
        //   }
        ?>

        <br/><br/>

        <!-- Button to Add Admin -->
        <a href="add-admin.php" class="btn-primary">Add Admin</a>

        <br/><br/><br/>

        <table class= "tbl-full">
          <tr>
            <th>S.N.</th>
            <th>Full Name</th>
            <th>Username</th>
            <th>Actions</th>
          </tr>

          <?php
            //Query to Get all Admin
            $sql= 'SELECT * FROM tbl_admin';

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Check wheter the Query is Executed

            if($res == TRUE) {

              // Count Rows to check if we have data
              $count = mysqli_num_rows($res); // Functions to get all the rows in data base

              $sn=1; //Create a vriable and assign the value

              // Check nr. of rows
              if($count>0)  {
                // Getting all the rows 
                while($rows=mysqli_fetch_assoc($res)){

                  //Get individual data

                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];

                  //Display the value in Our table from database
                  ?>
         
                    <tr>
                      <td><?php echo $sn++?></td>
                      <td><?php echo $full_name?></td>
                      <td><?php echo $username?></td>
                      <td>
                        
                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id;?>" class="btn-primary">Update Password</a>
                      </td>
                    </tr>
                  <?php

                }
              }
              else {

              }
            }
          ?>

        </table>
        

      </div>
    </div>
    <!-- Main Content Section End -->

    <?php include('partials/footer.php'); ?>
