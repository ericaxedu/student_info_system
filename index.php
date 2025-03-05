<?php
include('partials/header.php');
include('partials/sidebar.php');
include ('database/database.php'); // Database connection

// Fetch students from database
$result = $conn->query("SELECT * FROM students");
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Student Information System</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Student List</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Student Records</h5>
                            <button class="btn btn-primary btn-sm mt-4 mx-3" data-bs-toggle="modal" data-bs-target="#addStudentModal">Add Student</button>
                        </div>

                        <!-- Student Table -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student ID</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Course</th>
                                    <th>Year Level</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $row['student_id']; ?></td>
                                        <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
                                        <td><?= $row['age']; ?></td>
                                        <td><?= $row['course']; ?></td>
                                        <td><?= $row['year_level']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['phone']; ?></td>
                                        <td class="d-flex justify-content-center">
                                        <button class="btn btn-success btn-sm mx-1 editStudentBtn"
                                              data-id="<?= $row['id']; ?>"
                                              data-student_id="<?= $row['student_id']; ?>"
                                              data-first="<?= $row['first_name']; ?>"
                                              data-last="<?= $row['last_name']; ?>"
                                              data-age="<?= $row['age']; ?>"
                                              data-course="<?= $row['course']; ?>"
                                              data-year="<?= $row['year_level']; ?>"
                                              data-email="<?= $row['email']; ?>"
                                              data-phone="<?= $row['phone']; ?>"
                                              data-bs-toggle="modal" 
                                              data-bs-target="#editStudentModal">
                                              Edit
                                          </button>
                                            <button class="btn btn-primary btn-sm mx-1 viewStudentBtn"
                                              data-id="<?= $row['student_id']; ?>"
                                              data-first="<?= $row['first_name']; ?>"
                                              data-last="<?= $row['last_name']; ?>"
                                              data-age="<?= $row['age']; ?>"
                                              data-course="<?= $row['course']; ?>"
                                              data-year="<?= $row['year_level']; ?>"
                                              data-email="<?= $row['email']; ?>"
                                              data-phone="<?= $row['phone']; ?>"
                                              data-bs-toggle="modal" 
                                              data-bs-target="#viewStudentModal">
                                              View
                                          </button>

                                            <form action="/IPT2-MIDTERM-PROJECT-GROUP2/database/delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                            <input type="hidden" name="student_id" value="<?= $row['id']; ?>">
                                                            <button type="submit" name="delete_student" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>



                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <!-- End Student Table -->
                    </div>

                    <!-- Pagination -->
                    <div class="mx-4">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Student Modal -->
        <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="database/create.php">
                    <label>Student ID:</label>
                    <input type="text" name="student_id" class="form-control" required>

                    <label>First Name:</label>
                    <input type="text" name="first_name" class="form-control" required>

                    <label>Last Name:</label>
                    <input type="text" name="last_name" class="form-control" required>

                    <label>Age:</label>
                    <input type="number" name="age" class="form-control" required>

                    <label>Course:</label>
                    <input type="text" name="course" class="form-control" required>

                    <label>Year Level:</label>
                    <input type="number" name="year_level" class="form-control" required>

                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>

                    <label>Phone:</label>
                    <input type="text" name="phone" class="form-control" required>

                    <button type="submit" name="submit" class="btn btn-primary mt-3">Add Student</button>
                </form> 
                    </div>
                </div>
            </div>
        </div>

          <!-- View Student Modal -->
          <div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p><strong>Student ID:</strong> <span id="studentID"></span></p>
                <p><strong>Name:</strong> <span id="studentName"></span></p>
                <p><strong>Age:</strong> <span id="studentAge"></span></p>
                <p><strong>Course:</strong> <span id="studentCourse"></span></p>
                <p><strong>Year Level:</strong> <span id="studentYear"></span></p>
                <p><strong>Email:</strong> <span id="studentEmail"></span></p>
                <p><strong>Phone:</strong> <span id="studentPhone"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

          <!-- edit Student Modal -->
          <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="database/update.php">
                    <input type="hidden" name="id" id="editID">

                    <label>Student ID:</label>
                    <input type="text" name="student_id" id="editStudentID" class="form-control" required>

                    <label>First Name:</label>
                    <input type="text" name="first_name" id="editFirstName" class="form-control" required>

                    <label>Last Name:</label>
                    <input type="text" name="last_name" id="editLastName" class="form-control" required>

                    <label>Age:</label>
                    <input type="number" name="age" id="editAge" class="form-control" required>

                    <label>Course:</label>
                    <input type="text" name="course" id="editCourse" class="form-control" required>

                    <label>Year Level:</label>
                    <input type="number" name="year_level" id="editYearLevel" class="form-control" required>

                    <label>Email:</label>
                    <input type="email" name="email" id="editEmail" class="form-control" required>

                    <label>Phone:</label>
                    <input type="text" name="phone" id="editPhone" class="form-control" required>

                    <button type="submit" name="update" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
    </section>
</main>

<?php include('partials/footer.php');?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".viewStudentBtn").click(function () {
            var studentId = $(this).data('id');
            var firstName = $(this).data('first');
            var lastName = $(this).data('last');
            var age = $(this).data('age');
            var course = $(this).data('course');
            var yearLevel = $(this).data('year');
            var email = $(this).data('email');
            var phone = $(this).data('phone');

            $("#studentID").text(studentId);
            $("#studentName").text(firstName + " " + lastName);
            $("#studentAge").text(age);
            $("#studentCourse").text(course);
            $("#studentYear").text(yearLevel);
            $("#studentEmail").text(email);
            $("#studentPhone").text(phone);

            $("#viewStudentModal").modal("show");
        });
    });
</script>
<script>
    $(document).ready(function () {
        $(".editStudentBtn").click(function () {
            var id = $(this).data('id');
            var studentId = $(this).data('student_id');
            var firstName = $(this).data('first');
            var lastName = $(this).data('last');
            var age = $(this).data('age');
            var course = $(this).data('course');
            var yearLevel = $(this).data('year');
            var email = $(this).data('email');
            var phone = $(this).data('phone');

            $("#editID").val(id);
            $("#editStudentID").val(studentId);
            $("#editFirstName").val(firstName);
            $("#editLastName").val(lastName);
            $("#editAge").val(age);
            $("#editCourse").val(course);
            $("#editYearLevel").val(yearLevel);
            $("#editEmail").val(email);
            $("#editPhone").val(phone);

            $("#editStudentModal").modal("show");
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".deleteStudentBtn").click(function () {
            var studentId = $(this).data("id");

            if (confirm("Are you sure you want to delete this student?")) {
                $.ajax({
                    type: "POST",
                    url: "database/delete.php",
                    data: { id: studentId },
                    success: function (response) {
                        if (response.trim() === "success") {
                            alert("Student deleted successfully!");
                            location.reload(); // Refresh page
                        } else {
                            alert("Error deleting student: " + response);
                        }
                    }
                });
            }
        });
    });
</script>