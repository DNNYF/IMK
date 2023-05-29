<?php
include('db.php');

if (isset($_POST['update'])) {
    $edit_id = $_POST['edit_id'];
    $u_card = $_POST['u_card'];
    $u_f_name = $_POST['u_f_name'];
    $u_l_name = $_POST['u_l_name'];
    $u_phone = $_POST['u_phone'];
    $u_family = $_POST['u_family'];
    $u_staff_id = $_POST['u_staff_id'];

    // Logika unggah file
    $target_dir = "upload_images/"; // Tentukan direktori tempat file yang diunggah akan disimpan
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Periksa apakah file yang diunggah adalah gambar asli atau palsu
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan merupakan gambar.";
        $uploadOk = 0;
    }

    // Periksa ukuran file
    if ($_FILES["image"]["size"] > 1000000) {
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Izinkan format file tertentu
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG, & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Jika semuanya baik, coba unggah file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Lakukan query pembaruan database dengan jalur file gambar baru
            $update_query = "UPDATE card_activation SET u_card='$u_card', u_f_name='$u_f_name', u_l_name='$u_l_name', u_phone='$u_phone', u_family='$u_family', u_staff_id='$u_staff_id', image='$target_file' WHERE id='$edit_id'";
            $run_update = mysqli_query($con, $update_query);

            if ($run_update) {
                // Alihkan ke halaman tempat Anda menampilkan data yang diperbarui
                header("Location: index.php");
                exit();
            } else {
                // Tangani kesalahan pembaruan
                echo "Error saat memperbarui data: " . mysqli_error($con);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
        }
    }
}
?>
