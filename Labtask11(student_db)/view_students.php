<?php
include("config.php");
$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>👨‍🎓 Manage Students</h2>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Course</th><th>Registered Date</th><th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['course'] ?></td>
            <td><?= $row['reg_date'] ?></td>
            <td>
                <a class="edit" href="edit_student.php?id=<?= $row['id'] ?>">✏ Edit</a>
                <a class="delete" href="delete_student.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">🗑 Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a class="back" href="index.php">⬅ Back to Dashboard</a>
</div>
</body>
</html>