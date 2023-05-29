<!-- Modal untuk Aktivasi Kartu Baru -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Aktivasi Kartu Baru</h4>
                </div>
                <div class="modal-body">
                    <form action="add.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="u_card">NIM:</label>
                            <input type="text" class="form-control" id="u_card" name="u_card" required>
                        </div>
                        <div class="form-group">
                            <label for="u_f_name">Nama Depan:</label>
                            <input type="text" class="form-control" id="u_f_name" name="u_f_name" required>
                        </div>
                        <div class="form-group">
                            <label for="u_l_name">Nama Belakang:</label>
                            <input type="text" class="form-control" id="u_l_name" name="u_l_name" required>
                        </div>
                        <div class="form-group">
                            <label for="u_phone">Telepon:</label>
                            <input type="text" class="form-control" id="u_phone" name="u_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="u_family">Keluarga:</label>
                            <input type="text" class="form-control" id="u_family" name="u_family" required>
                        </div>
                        <div class="form-group">
                            <label for="u_staff_id">ID Staf:</label>
                            <input type="text" class="form-control" id="u_staff_id" name="u_staff_id" required>
                        </div>
                        <div class="form-group">
                            <label for="image">Gambar:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    