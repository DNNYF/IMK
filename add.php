<?php
include('db.php');

// Mendefinisikan direktori penyimpanan gambar
$uploadDir = 'upload_images/';

// Memproses formulir pengunggahan
if(isset($_POST['submit'])){
    $u_card = $_POST['u_card'];
    $u_f_name = $_POST['u_f_name'];
    $u_l_name = $_POST['u_l_name'];
    $u_phone = $_POST['u_phone'];
    $u_family = $_POST['u_family'];
    $u_staff_id = $_POST['u_staff_id'];

    // Memeriksa apakah ada file yang diunggah
    if(isset($_FILES['image'])){
        $fileName = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];

        // Mendefinisikan path file tujuan penyimpanan
        $targetPath = $uploadDir . $fileName;

        // Memindahkan file yang diunggah ke folder tujuan
        if(move_uploaded_file($tmpName, $targetPath)){
            // Menyimpan informasi ke database
            $query = "INSERT INTO card_activation (u_card, u_f_name, u_l_name, u_phone, u_family, u_staff_id, image) VALUES ('$u_card', '$u_f_name', '$u_l_name', '$u_phone', '$u_family', '$u_staff_id', '$targetPath')";
            $result = mysqli_query($con, $query);

            if($result){
                echo "Data berhasil ditambahkan.";
				echo "<script>window.open('index.php', '_self')</script>";
            } else{
                echo "Terjadi kesalahan saat menambahkan data.";
            }
        } else{
            echo "Terjadi kesalahan saat mengunggah gambar.";
        }
    }
}


?>