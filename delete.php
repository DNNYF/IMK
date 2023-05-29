<?php
include('db.php');

if(isset($_GET['del'])) {
    $id = $_GET['del'];
    $delete_query = "DELETE FROM card_activation WHERE id = $id";
    mysqli_query($con, $delete_query);
    
    header("Location: index.php"); // Redirect ke halaman utama setelah penghapusan berhasil
    exit();
}
?>
