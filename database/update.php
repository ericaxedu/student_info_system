<?php
include '../database/database.php'; // Ensure the database file path is correct

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Correct UPDATE query
    $stmt = $conn->prepare("UPDATE students SET student_id=?, first_name=?, last_name=?, age=?, course=?, year_level=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("ssssisssi", $student_id, $first_name, $last_name, $age, $course, $year_level, $email, $phone, $id);

    if ($stmt->execute()) {
        header("Location: ../index.php?update=success");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
