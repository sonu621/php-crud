<?php
// Start a new session or resume the current session. This is useful for tracking user activity and maintaining state across pages.
session_start();
?>

<?php
// Include the header file, which typically contains the page's navigation bar, title, and other elements that appear at the top of the page.
include('includes/header.php');
?>

<div class="container mt-5">
    <?php
    // Include the message.php file. This file likely contains code to display flash messages (such as success, error, or warning messages) to the user.
    include('message.php');
    ?>

    <div class="row">
        <!-- The "col-md-12" class defines a full-width column on medium to large screens. It's part of the Bootstrap grid system for responsive design. -->
        <div class="col-md-12">
            <!-- Bootstrap card component to group the student form and make it visually distinct. -->
            <div class="card">
                <!-- Card header that contains the title and a "Back" button. -->
                <div class="card-header">
                    <h4>Student Add
                        <!-- The "Back" button directs the user to the "index.php" page. It uses Bootstrap's "btn-danger" class for styling and "float-end" to align it to the right. -->
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <!-- Card body that contains the form for adding a student. -->
                <div class="card-body">
                    <!-- The form submits data to "code.php" using the POST method. "code.php" will handle the form submission and save the student data. -->
                    <form action="code.php" method="POST">
                        <!-- "mb-3" class adds margin-bottom to space out the input fields. -->
                        <div class="mb-3">
                            <!-- Label for the student name input field -->
                            <label for="name">Student Name</label>
                            <!-- Input field for the student's name. The 'name' attribute is used when submitting the form, and the 'id' attribute is linked to the label. -->
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter student name" required>
                        </div>

                        <div class="mb-3">
                            <!-- Label for the student email input field -->
                            <label for="email">Student Email</label>
                            <!-- Input field for the student's email address. The 'type="email"' ensures the input is validated as an email address. -->
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter student email" required>
                        </div>

                        <div class="mb-3">
                            <!-- Label for the student phone input field -->
                            <label for="phone">Student Phone</label>
                            <!-- Input field for the student's phone number. The 'type="number"' restricts input to numbers only. -->
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter student phone" required>
                        </div>

                        <div class="mb-3">
                            <!-- Label for the student course input field -->
                            <label for="course">Student Course</label>
                            <!-- Input field for the student's course name. -->
                            <input type="text" name="course" id="course" class="form-control" placeholder="Enter student course" required>
                        </div>

                        <!-- Submit button that sends the form data to the "code.php" file. When clicked, the student information is saved. -->
                        <div class="mb-3">
                            <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Include the footer file, which typically contains footer content such as copyright information, additional navigation, or scripts.
include('includes/footer.php');
?>
