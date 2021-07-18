<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data User</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">User</a></li>
                    <li class="active">Ubah</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title mb-3">Ubah User</h3>
                    <form class="form-horizontal" method="POST" action="">
                        <!-- <div class="form-group">
                            <label class="col-md-12">Id User</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Masukkan id user ..." name="id_user" value="<?= $user['id_user']; ?>">
                                <i class="text-danger"><?= form_error('id_user'); ?></i>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label class="col-md-12">Nama</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Masukkan nama ..." name="nama" value="<?= $user['nm_user']; ?>">
                                <i class="text-danger"><?= form_error('nama'); ?></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Jenis Kelamin</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="jenis_kelamin">
                                    <option readonly>-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-Laki" <?= ($user['j_kel'] == "Laki-Laki") ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?= ($user['j_kel'] == "Perempuan") ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Nomor Telepon</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Masukkan nomor telepon ..." name="phone" value="<?= $user['phone']; ?>">
                                <i class="text-danger"><?= form_error('phone'); ?></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-12">Hak Akses</label>
                            <div class="col-sm-12">
                                <select class="form-control" name="id_hak">
                                    <option readonly>-- Pilih Hak Akses --</option>
                                    <?php foreach ($hak_akses as $ha) : ?>
                                        <option value="<?= $ha['id_hak']; ?>" <?= ($user['id_hak'] == $ha['id_hak']) ? 'selected' : '' ?>><?= $ha['nm_hak']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" class="form-control" placeholder="Masukkan password ..." name="password" value="<?= $user['pass_user']; ?>">
                                <i class="text-danger"><?= form_error('password'); ?></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>