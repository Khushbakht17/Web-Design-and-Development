<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id=$id");
    $student = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student Updated Successfully!'); window.location='view_students.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>✏ Edit Student</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $student['id'] ?>">
        <input type="text" name="name" value="<?= $student['name'] ?>" required>
        <input type="email" name="email" value="<?= $student['email'] ?>" required>
        <input type="text" name="course" value="<?= $student['course'] ?>" required>
        <button type="submit">Update Student</button>
    </form>
    <a class="back" href="view_students.php">⬅ Back to Manage Students</a>
</div>
</body>
</html>