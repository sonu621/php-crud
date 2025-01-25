<?php
// Check if a session message exists. This would be set previously in the code.
if(isset($_SESSION['message'])) :
?>

<!-- 
  Display an alert box with a warning style. The message inside 
  the alert box will be dynamically generated from the session variable.
-->
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <!-- Display the session message. This will be the actual message set earlier -->
    <strong>Hey!</strong> <?php echo $_SESSION['message']; ?>  
    <!-- Close button to dismiss the alert. -->
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
// After the message is displayed, remove it from the session so it won't be shown again.
unset($_SESSION['message']);
endif;
?>
