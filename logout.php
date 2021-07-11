    <!-- Copyright © faysal fadel maulana 20190140097 -->

<?php 
session_start();
// Unset all session variables
$_SESSION = array();
// Destroy the session.
session_destroy();
// Redirect to the login page
header("location:login.php");
exit();
?>

    <!-- Copyright © faysal fadel maulana 20190140097 -->
