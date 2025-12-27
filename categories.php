<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Equipment Categories</title>
</head>
<body>

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
        <td>Responsible Person</td>
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
    </tr>

    <tr>
      <td>Computers</td>
      <td>1</td>
      <td>My Company</td>
    </tr>
  </table>

</body>
</html>
