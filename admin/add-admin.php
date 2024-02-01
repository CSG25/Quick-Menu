<?php include('partials/menu.php')?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <br>

    <?php
      if(isset($_SESSION['add'])) {

        echo $_SESSION['add'];
        unset($_SESSION['add']); //Removing Session Message
      }
    ?>



    <form action="" method="POST">

    <table class="tbl-30">
      <tr>
        <td>Full Name</td>
        <td ><input type="text" name="full_name" placeholder="Enter your Name"></td>
      </tr>

      <tr>
        <td>Username</td>
        <td><input type="text" name="username" placeholder="Enter your Username"></td>
      </tr>

      <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="Enter your Password"></td>
      </tr>

      <tr>
        <td colspan="2">
          <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
        </td>
      </tr>

    </table>

    </form>
  </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
  //Process the Value from Form and save it to Database
  //Check wheter the submit button is clicked

  if(isset($_POST['submit'])) {
    //Button Clicked

    //1. Get the data from Form

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);//Password Encryption with (md5)

    //2. SQL Query to Save the data intro database
    $sql = "INSERT INTO tbl_admin SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";

    //3. Execute Query and save Data in Database

    $res = mysqli_query($conn, $sql) or die(mysqli_error($errormsg));

    //4. Check wheter the Data is inserted or not and display a message
    if($res == TRUE) {
       // Data Inserted
       //Sesion variable to display the message
       $_SESSION['add'] = 'Admin Added Successfully';
       //Redirect to page Admin
       header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else {
      // Failed to insert Data
      $_SESSION['add'] = 'Failed to add ADmin';
      //Redirect to page add Admin
      header('location:'.SITEURL.'admin/add-admin.php');
    }
  }

?>