<?php
    // Requirements for database and authentication operations
    include("includes/admin_auth_session.php");
    require('includes/db.php');
?>

<?php
    $id=(int) $_POST['id'];

    // sql to delete a record
    $sql = "DELETE FROM reservations WHERE id=".$id;

    if ($con->query($sql)) {
       header("Location: admin.php");
    } else {
        echo "Error deleting record: " . $con->error;
    }

    $con->close();

?>