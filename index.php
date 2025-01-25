<?php
session_start(); // Start the session to access session variables
require 'dbcon.php'; // Include database connection
?>

<?php
include('includes/header.php'); // Include header part of the page
?>
<div class="container mt-4">
    <?php 
        include('message.php'); // Include the message section for any alerts or notifications
    ?>


    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <h4>Student Details
                    <a href="student-create.php" class="btn btn-primary float-end">Add Students</a>
                    <!-- Button to add new students -->
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th>Action</th> <!-- Column for action buttons (view, edit, delete) -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              // Query to fetch all students from the database
              $query = "SELECT * FROM students";
              $query_run = mysqli_query($con, $query);

              if(mysqli_num_rows($query_run) > 0){
              $sno = 0; // Initialize SNO counter
              while($student = mysqli_fetch_assoc($query_run)){   
              $sno++;  // Increment SNO for each row
                ?>
                        <tr>
                            <td>
                                <?php echo $sno; ?>
                                <!-- Display Serial Number -->
                            </td>
                            <td>
                                <?php echo $student['name']; ?>
                                <!-- Display student name -->
                            </td>
                            <td>
                                <?php echo $student['email']; ?>
                                <!-- Display student email -->
                            </td>
                            <td>
                                <?php echo $student['phone']; ?>
                                <!-- Display student phone number -->
                            </td>
                            <td>
                                <?php echo $student['course']; ?>
                                <!-- Display student course -->
                            </td>
                            <td>
                                <!-- Action buttons for viewing, editing, or deleting a student -->
                                <a href="student-view.php?id=<?= $student['id']; ?>"
                                    class="btn btn-info btn-sm">View</a>
                                <a href="student-edit.php?id=<?= $student['id']; ?>"
                                    class="btn btn-success btn-sm">Edit</a>
                                <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_student" value="<?= $student['id'];?>"
                                        class="btn btn-danger btn-sm">Delete</button> <!-- Delete student -->
                                </form>
                            </td>
                        </tr>
                        <?php
            }
        } else {
            echo "<h5>No record found</h5>"; // Show message if no students are found
        }
        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<?php
    include('includes/footer.php'); // Include footer part of the page
    ?>