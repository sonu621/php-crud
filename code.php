<?php
// Start the session. This is used to store session variables like messages.
session_start();

// Include the database connection file to interact with the database.
require 'dbcon.php';

// Handle student deletion when the 'delete_student' button is pressed.
if(isset($_POST['delete_student'])){
    // Get the student ID from the form and sanitize it to prevent SQL injection.
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    // Create an SQL query to delete the student from the database using the ID.
    $querry = "DELETE FROM students WHERE id='$student_id' ";
    $querry_run = mysqli_query($con, $querry); // Execute the query.
    
    // Check if the student was deleted successfully.
    if($querry_run){
        // If successful, set a success message in the session and redirect to the main page.
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0); // Exit the script after redirection to prevent further execution.
    }
    else{
        // If deletion failed, set a failure message in the session and redirect to the main page.
        $_SESSION['message'] = "Student Not Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
}

// Handle student update when the 'update_student' button is pressed.
if(isset($_POST['update_student'])){ 
    // Get the student ID and other updated data from the form and sanitize them.
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // Create an SQL query to update the student details in the database.
    $querry = "UPDATE `students` SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    $querry_run = mysqli_query($con, $querry); // Execute the query.

    // Check if the student details were updated successfully.
    if($querry_run){
        // If successful, set a success message in the session and redirect to the main page.
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }else{
        // If update failed, set a failure message in the session and redirect to the main page.
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }
}

// Handle new student creation when the 'save_student' button is pressed.
if(isset($_POST['save_student'])){
    // Get the new student data from the form and sanitize it to prevent SQL injection.
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // Create an SQL query to insert the new student into the database.
    $querry = "INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`) VALUES (NULL, '$name', '$email', '$phone', '$course')";
    $querry_run = mysqli_query($con, $querry); // Execute the query.
    
    // Check if the student was created successfully.
    if($querry_run){
        // If successful, set a success message in the session and redirect to the student creation page.
        $_SESSION['message'] = "Student Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else{
        // If creation failed, set a failure message in the session and redirect to the student creation page.
        $_SESSION['message'] = "Student Not Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
}
?>
