<?php
// Start the session. This is necessary to store and retrieve session data (like user login details).
session_start();

// Include the database connection file to connect to the database and execute queries.
require 'dbcon.php';
?>

<?php
// Include the header file. It contains the page's top part like navigation, logo, etc.
include('includes/header.php');
?>

<div class="container mt-5">
    <?php
    // Include a file that displays messages (like success or error alerts) to the user.
    include('message.php');
    ?>

    <div class="row">
        <!-- Bootstrap grid system: makes sure the form takes up the whole page width on medium or larger screens. -->
        <div class="col-md-12">
            <!-- Card layout from Bootstrap. It gives a clean look to the content. -->
            <div class="card">
                <!-- Card header with a title and a back button that redirects to the main page (index.php). -->
                <div class="card-header">
                    <h4>Student Edit
                        <!-- The back button redirects to the student list page (index.php) -->
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    // Check if there's a student ID in the URL (e.g., edit_student.php?id=1).
                    if (isset($_GET['id'])) {
                        // Get the student ID from the URL and clean it up to prevent SQL errors.
                        $student_id = mysqli_real_escape_string($con, $_GET['id']);

                        // Query the database to get the student's details based on the ID.
                        $query = "SELECT * FROM students WHERE id = '$student_id' ";
                        $query_run = mysqli_query($con, $query);

                        // Check if the student exists in the database.
                        if (mysqli_num_rows($query_run) > 0) {
                            // Fetch the student's data from the database.
                            $student = mysqli_fetch_array($query_run);
                            ?>

                            <!-- Form to edit the student's information. -->
                            <form action="code.php" method="POST">
                                <!-- Hidden input field to carry the student's ID along with the form submission -->
                                <input type="hidden" name="student_id" value="<?= $student['id'] ?>">

                                <!-- Input field for the student's name -->
                                <div class="mb-3">
                                    <label for="name">Student Name</label>
                                    <input type="text" name="name" id="name" value="<?= $student['name']; ?>" class="form-control">
                                </div>

                                <!-- Input field for the student's email -->
                                <div class="mb-3">
                                    <label for="email">Student Email</label>
                                    <input type="email" name="email" id="email" value="<?= $student['email']; ?>" class="form-control">
                                </div>

                                <!-- Input field for the student's phone number -->
                                <div class="mb-3">
                                    <label for="phone">Student Phone</label>
                                    <input type="number" name="phone" id="phone" value="<?= $student['phone']; ?>" class="form-control">
                                </div>

                                <!-- Input field for the student's course -->
                                <div class="mb-3">
                                    <label for="course">Student Course</label>
                                    <input type="text" name="course" id="course" value="<?= $student['course']; ?>" class="form-control">
                                </div>

                                <!-- Button to submit the form and update the student's information -->
                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">Update Student</button>
                                </div>
                            </form>

                            <?php
                        } else {
                            // If no student is found with the given ID, show an error message.
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
// Include the footer file. It contains the bottom part of the page like copyright or additional links.
include('includes/footer.php');
?>
