<?php
session_start(); // Ensure the session is started for message handling

include('database.php'); // Ensure this contains the $conn connection

if (isset($_POST['delete_student'])) {
    $id = $_POST['student_id']; // Ensure this matches your form input name

    // Prepare the delete query
    $query = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    // Check if the delete was successful
    if ($stmt->execute()) {
        $_SESSION['message'] = "Student deleted successfully!";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error deleting student: " . $conn->error;
        $_SESSION['msg_type'] = "danger";
    }

    // Close the prepared statement and the connection
    $stmt->close();
    $conn->close();

    // Redirect after deletion
    header("Location: /IPT2-MIDTERM-PROJECT-GROUP2/index.php"); // Adjust the path if needed
    exit(); // Make sure no further code runs
}
?>
