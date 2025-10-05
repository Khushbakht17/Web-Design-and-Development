<?php
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, email, course) VALUES ('$name', '$email', '$course')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student Added Successfully!'); window.location='view_students.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>➕ Add New Student</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter Full Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="text" name="course" placeholder="Enter Course" required>
        <button type="submit">Add Student</button>
    </form>
    <a class="back" href="index.php">⬅ Back to Dashboard</a>
</div>
</body>
</html>