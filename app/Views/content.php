<div class="content-wrapper">

    <section class="content mt-5">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">

                        <div class="card-header">
                            <h4 class="card-title my-auto">Data Crud</h4>

                            <div class="card-tools">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                                    Tambah Data
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-head-fixed text-nowrap tabel" id="<?= $uri ?>">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>HP</th>
                                        <th>PIC</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>


<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Crud</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <?php echo session()->info; ?>
                <?php echo form_open('crud/act', ' id="form"'); ?>
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" name="nama" id="nama">
                </div>


                <div class="form-group">
                    <label for="nama">PIC:</label>
                    <input type="text" class="form-control" name="pic" id="pic">
                </div>


                <div class="form-group">
                    <label for="nama">Alamat:</label>
                    <textarea class="form-control" name="al" id="al"></textarea>
                </div>

                <div class="form-group">
                    <label for="nama">HP:</label>
                    <input type="number" class="form-control" name="hp" id="hp">
                </div>

                <div class="form-group">
                    <label for="nama">Telp:</label>
                    <input type="text" class="form-control" name="telp" id="telp">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>