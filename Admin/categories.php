<?php
session_start();
include("../includes/scripts/connection.php");
if(!isset($_SESSION['odoo_logedin_user_id'])){ header("Location: ../user-login/userlogin.php"); exit(); }

$user_id = $_SESSION['odoo_logedin_user_id'];
$user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT user_role FROM user_master WHERE user_id=$user_id"));

if($user['user_role'] != 3){ header("Location: 404.php"); exit(); }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Equipment Categories</title>
</head>
<body>

<?php
// include DB connection
require "../includes/scripts/connection.php";
?>

<h2>Equipment Categories</h2>

<!-- Add Category Form -->
<h3>Add New Category</h3>

<form method="post" action="add_catogery_action.php" enctype="multipart/form-data">
  <table>
    <tr>
      <td>Category Name</td>
      <td>
        <input type="text" name="name" required>
      </td>
    </tr>

    <tr>
      <td>Responsible Person (Admin ID)</td>
      <td>
        <input type="number" name="user_id" required>
      </td>
    </tr>

    <tr>
      <td>Company</td>
      <td>
        <input type="text" name="company" required>
      </td>
    </tr>

    <tr>
      <td colspan="2">
        <button name="submit" type="submit">Add Category</button>
      </td>
    </tr>
  </table>
</form>

<br><hr><br>

<!-- Category List -->
<h3>Category List</h3>

<table border="1" cellpadding="8">
  <tr>
    <th>Name</th>
    <th>Responsible</th>
    <th>Company</th>
    <th>Action</th>
  </tr>

  <?php
  // Fetch from DB
  $sql = "SELECT * FROM equipment_catgory ORDER BY eq_cat_id DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
          echo "<tr>
              <td>{$row['name']}</td>
              <td>{$row['admin_id']}</td>
              <td>{$row['company']}</td>
              <td>
                  <a href='editcategory.php?id={$row['eq_cat_id']}'>Edit</a> | 
                  <a href='deletecategory.php?id={$row['eq_cat_id']}' onclick='return confirm(\"Delete?\")'>Delete</a>
              </td>
          </tr>";
      }
  } else {
      echo "<tr><td colspan='4' style='color:red;'>No Category Found</td></tr>";
  }
  ?>

</table>

</body>
</html>
