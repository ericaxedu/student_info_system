<?php
include 'database.php'; // Connect to database

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert query
    $sql = "INSERT INTO students (student_id, first_name, last_name, age, course, year_level, email, phone) 
            VALUES ('$student_id', '$first_name', '$last_name', '$age', '$course', '$year_level', '$email', '$phone')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Student added successfully!');
                window.location.href = '../index.php'; // Redirect back to index.php
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>