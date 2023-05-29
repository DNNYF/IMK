<?php
include('db.php');

if(isset($_POST['simpan'])){
    $edit_id = $_POST['edit_id'];
    $u_card = $_POST['u_card'];
    $u_f_name = $_POST['u_f_name'];
    $u_l_name = $_POST['u_l_name'];
    $u_phone = $_POST['u_phone'];
    $u_family = $_POST['u_family'];
    $u_staff_id = $_POST['u_staff_id'];

    // Proses update data ke database
    $update_query = "UPDATE card_activation SET u_card='$u_card', u_f_name='$u_f_name', u_l_name='$u_l_name', u_phone='$u_phone', u_family='$u_family', u_staff_id='$u_staff_id' WHERE id='$edit_id'";
    $run_update = mysqli_query($con, $update_query);

    if($run_update){
		echo "Berhasil mengupdate data.";
        // Jika update berhasil, redirect ke halaman utama
        header("Location: index.php");
        exit();
    }else{
        echo "Gagal mengupdate data.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Data Mahasiswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #DFEBEB">
    <div class="container">
        <h2 class="text-center">Detail Data Mahasiswa</h2><br><br>
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Aktivasi Kartu Baru
        </button>

        <hr>
        <table class="table table-bordered table-striped table-hover" id="myTable">
            <thead>
                <tr>
                    <th class="text-center" scope="col">No.</th>
                    <th class="text-center" scope="col">Nama</th>
                    <th class="text-center" scope="col">NIM</th>
                    <th class="text-center" scope="col">Telepon</th>
                    <th class="text-center" scope="col">ID Staf</th>
                    <th class="text-center" scope="col">Lihat</th>
                    <th class="text-center" scope="col">Edit</th>
                    <th class="text-center" scope="col">Hapus</th>
                </tr>
            </thead>
            <?php
            $get_data = "SELECT * FROM card_activation ORDER BY id DESC";
            $run_data = mysqli_query($con, $get_data);
            $i = 0;
            while ($row = mysqli_fetch_array($run_data)) {
                $sl = ++$i;
                $id = $row['id'];
                $u_card = $row['u_card'];
                $u_f_name = $row['u_f_name'];
                $u_l_name = $row['u_l_name'];
                $u_phone = $row['u_phone'];
                $u_family = $row['u_family'];
                $u_staff_id = $row['u_staff_id'];
                $image = $row['image'];

                echo "
                <tr>
                    <td class='text-center'>$sl</td>
                    <td class='text-left'>$u_f_name $u_l_name</td>
                    <td class='text-left'>$u_card</td>
                    <td class='text-left'>$u_phone</td>
                    <td class='text-center'>$u_staff_id</td>
                    <td class='text-center'>
                        <a href='#' data-toggle='modal' data-target='#modal-$id'>
                            <i class='fa fa-eye'></i>
                        </a>
                    </td>
                    <td class='text-center'>"
            ?>

                <a href="#?op=edit&id=<?php echo $id?>" data-toggle="modal" data-target="#editModal-<?php echo $id; ?>">
                    <i class="fa fa-pencil"></i>
                </a>
                <!-- Modal Edit -->
                <div class="modal fade" id="editModal-<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel-<?php echo $id; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="editModalLabel-<?php echo $id; ?>">Edit Data</h4>
                            </div>
                            <div class="modal-body">
                                <form action="edit.php" method="post" enctype="multipart/form-data">
                                    <!-- Isi form dengan data yang ingin diedit -->
                                    <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <label for="u_card">NIM:</label>
                                        <input type="text" class="form-control" id="u_card" name="u_card" value="<?php echo $u_card; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="u_f_name">Nama Depan:</label>
                                        <input type="text" class="form-control" id="u_f_name" name="u_f_name" value="<?php echo $u_f_name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="u_l_name">Nama Belakang:</label>
                                        <input type="text" class="form-control" id="u_l_name" name="u_l_name" value="<?php echo $u_l_name; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="u_phone">Telepon:</label>
                                        <input type="text" class="form-control" id="u_phone" name="u_phone" value="<?php echo $u_phone; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="u_family">Keluarga:</label>
                                        <input type="text" class="form-control" id="u_family" name="u_family" value="<?php echo $u_family; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="u_staff_id">ID Staf:</label>
                                        <input type="text" class="form-control" id="u_staff_id" name="u_staff_id" value="<?php echo $u_staff_id; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Gambar:</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                    <!-- Tombol untuk submit form edit -->
                                    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                echo "
                    </td>
                    <td class='text-center'>
                        <a href='delete.php?del=$id'>
                            <i class='fa fa-trash'></i>
                        </a>
                    </td>
                </tr>";

                // Modal untuk Lihat Data Mahasiswa
                echo "
                <div class='modal fade' id='modal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-dialog modal-lg'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                                <h4 class='modal-title' id='myModalLabel'>Detail Data Mahasiswa</h4>
                            </div>
                            <div class='modal-body'>
                                <div class='container'>
                                    <div class='row'>
                                        <div class='col-md-3'>
                                            <img src='$image' class='img-thumbnail' style='width: 200px; height: 200px'>
                                        </div>
                                        <div class='col-md-9'>
                                            <h4>Nama: $u_f_name $u_l_name</h4>
                                            <h4>NIM: $u_card</h4>
                                            <h4>Telepon: $u_phone</h4>
                                            <h4>ID Staf: $u_staff_id</h4>
                                            <h4>Keluarga: $u_family</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </table>
    </div>

    <?php
    include "modal_add.php";
    ?>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>
