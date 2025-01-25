<?php
// Include the database connection file. This file connects to the database to allow querying.
require 'dbcon.php';
?>

<?php
// Include the header file, which typically contains the top section of the page like navigation, title, etc.
include('includes/header.php');
?>

<div class="container mt-5">
    <div class="row">
        <!-- Bootstrap grid system: "col-md-12" makes this section take up the full width on medium and larger screens. -->
        <div class="col-md-12">
            <!-- A Bootstrap card element to style and group the content visually. -->
            <div class="card">
                <!-- Card header with the page title and a "Back" button that redirects to the index page. -->
                <div class="card-header">
                    <h4>Student View Details
                        <!-- The "Back" button redirects to the index.php page (which might show a list of students). -->
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    // Check if there's an "id" in the URL (e.g., student_view.php?id=1).
                    if (isset($_GET['id'])) {
                        // Get the student ID from the URL and clean it up to avoid any SQL errors or security issues.
                        $student_id = mysqli_real_escape_string($con, $_GET['id']);

                        // Query the database to fetch the student's details based on the ID.
                        $query = "SELECT * FROM students WHERE id = '$student_id' ";
                        $query_run = mysqli_query($con, $query);

                        // Check if a student was found with the given ID.
                        if (mysqli_num_rows($query_run) > 0) {
                            // Fetch the student record from the database.
                            $student = mysqli_fetch_array($query_run);
                            ?>

                            <!-- Display the student's information (name, email, phone, and course). -->
                            <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                            <div class="mb-3">
                                <label for="stname">Student Name</label>
                                <!-- Display student's name in a non-editable field. -->
                                <p class="form-control"> <?=$student['name'];?> </p>
                            </div>

                            <div class="mb-3">
                                <label for="email">Student Email</label>
                                <!-- Display student's email in a non-editable field. -->
                                <p class="form-control"> <?=$student['email'];?> </p>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Student Phone</label>
                                <!-- Display student's phone number in a non-editable field. -->
                                <p class="form-control"> <?=$student['phone'];?> </p>
                            </div>

                            <div class="mb-3">
                                <label for="course">Student Course</label>
                                <!-- Display student's course in a non-editable field. -->
                                <p class="form-control"> <?=$student['course'];?> </p>
                            </div>

                            <?php
                        } else {
                            // Display an error message if no student is found with the given ID.
                            echo "<h4>No such Id Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer file, which typically contains the footer content like copyright info, or additional links.
include('includes/footer.php');
?>
