<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM students WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Student Deleted Successfully!'); window.location='view_students.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>