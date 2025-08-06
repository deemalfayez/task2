<?php
// connect to database
$conn = new mysqli("localhost", "root", "", "info");

// get all records
$result = $conn->query("SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<head>
  <title>User Form</title>
</head>
<body>

  <!-- the input form -->
  <form method="POST" action="insert.php">
    Name: <input type="text" name="name" required>
    Age: <input type="number" name="age" required>
    <input type="submit" value="Submit">
  </form>

  <!-- the table of users -->
  <h3>Users Table</h3>
  <table border="1" cellpadding="8">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Age</th>
      <th>Status</th>
      <th>Action</th>
    </tr>

    <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['age'] ?></td>
        <td id="status-<?= $row['id'] ?>"><?= $row['status'] ?></td>
        <td>
          <button onclick="toggleStatus(<?= $row['id'] ?>)">Toggle</button>
        </td>
      </tr>
    <?php } ?>
  </table>

  <!-- JavaScript for AJAX toggle -->
  <script>
    function toggleStatus(id) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "toggle.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function () {
        if (xhr.status === 200) {
          document.getElementById("status-" + id).innerText = xhr.responseText;
        }
      };

      xhr.send("id=" + id);
    }
  </script>

</body>
</html>