<?php
session_start();
require "includes/scripts/connection.php";

// Fetch categories from equipment_catgory table
$category_result = $conn->query("SELECT eq_cat_id, name FROM equipment_catgory ORDER BY name");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Equipment Inventory</title>
</head>
<body>

  <h2>Equipment Inventory</h2>

  <?php if (isset($_SESSION['success'])): ?>
    <p style="color: green; font-weight: bold;">
      <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
    </p>
  <?php endif; ?>

  <?php if (isset($_SESSION['error'])): ?>
    <p style="color: red; font-weight: bold;">
      <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
    </p>
  <?php endif; ?>

  <!-- Add Equipment Form -->
  <h3>Register New Equipment</h3>

  <form method="post" action="insert_equipment.php">
    <table cellpadding="6">
      <tr>
        <td>Equipment Name</td>
        <td><input type="text" name="equipment_name" required></td>
      </tr>

      <tr>
        <td>Employee Name</td>
        <td><input type="text" name="employee_name" required></td>
      </tr>

      <tr>
        <td>Department</td>
        <td><input type="text" name="department" required></td>
      </tr>

      <tr>
        <td>Serial Number</td>
        <td><input type="text" name="serial_number" required></td>
      </tr>

      <tr>
        <td>Technician</td>
        <td><input type="text" name="technician" required></td>
      </tr>

      <tr>
        <td>Category</td>
        <td>
          <select name="category" required>
            <option value="">-- Select Category --</option>
            <?php if ($category_result && $category_result->num_rows > 0): ?>
              <?php while ($cat = $category_result->fetch_assoc()): ?>
                <option value="<?php echo $cat['eq_cat_id']; ?>">
                  <?php echo htmlspecialchars($cat['name']); ?>
                </option>
              <?php endwhile; ?>
            <?php else: ?>
              <option value="">No categories found</option>
            <?php endif; ?>
          </select>
        </td>
      </tr>

      <tr>
        <td>Company</td>
        <td><input type="text" name="company" required></td>
      </tr>

      <tr>
        <td colspan="2">
          <button type="submit">Save Equipment</button>
        </td>
      </tr>
    </table>
  </form>

  <br><hr><br>

  <!-- Equipment List -->
  <h3>Equipment List</h3>

  <table border="1" cellpadding="8">
    <tr>
      <th>Equipment Name</th>
      <th>Employee</th>
      <th>Department</th>
      <th>Serial Number</th>
      <th>Technician</th>
      <th>Category</th>
      <th>Company</th>
    </tr>

    <tr>
      <td>Samsung Monitor 15"</td>
      <td>Tejas Modi</td>
      <td>Admin</td>
      <td>MT/125/22778837</td>
      <td>Mitchell Admin</td>
      <td>Monitors</td>
      <td>My Company</td>
    </tr>
  </table>

</body>
</html>
