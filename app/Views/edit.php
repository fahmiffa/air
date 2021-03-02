<div class="content-wrapper">

    <section class="content mt-5">
        <div class="container">
            <!-- /.row -->
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php echo session()->info; ?>
                            <?php echo form_open('crud/act', ' id="form"'); ?>
                            <input type="hidden" name="id" id="id" value="<?= (!empty($da) ? $da->Pelanggan_ID : null) ?>">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= (!empty($da) ? $da->Pelanggan_Nama : null) ?>">
                            </div>


                            <div class=" form-group">
                                <label for="nama">PIC:</label>
                                <input type="text" class="form-control" name="pic" id="pic" value="<?= (!empty($da) ? $da->Pelanggan_PIC : null) ?>">
                            </div>


                            <div class=" form-group">
                                <label for="nama">Alamat:</label>
                                <textarea class="form-control" name="al" id="al"><?= (!empty($da) ? $da->Pelanggan_Alamat : null) ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="nama">HP:</label>
                                <input type="number" class="form-control" name="hp" id="hp" value="<?= (!empty($da) ? $da->Pelanggan_HP : null) ?>">
                            </div>

                            <div class=" form-group">
                                <label for="nama">Telp:</label>
                                <input type="text" class="form-control" name="telp" id="telp" value="<?= (!empty($da) ? $da->Pelanggan_Telp : null) ?>">
                            </div>

                            <button type=" submit" class="btn btn-primary">Save</button>
                            </form>
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