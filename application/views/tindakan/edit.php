<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Tindakan</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Tindakan</a></li>
                    <li class="active">Ubah</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <form class="form-horizontal" method="POST" action="">
                        <div class="form-group">
                            <div class="col-md-11">
                                <h3 class="box-title mb-3 float-left">Ubah Tindakan</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-12">Id Tindakan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan id tindakan ..." name="id_tindakan" value="<?= $tindakan['id_tindakan']; ?>" readonly>
                                    <i class="text-danger"><?= form_error('id_tindakan'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Tindakan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan nama tindakan ..." name="nm_tindakan" value="<?= $tindakan['nm_tindakan']; ?>">
                                    <i class="text-danger"><?= form_error('nm_tindakan'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kandungan Tindakan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan kandungan tindakan ..." name="kd_tindakan" value="<?= $tindakan['kd_tindakan']; ?>">
                                    <i class="text-danger"><?= form_error('kd_tindakan'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tarif Dalam Tindakan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan tarif dalam tindakan ..." name="tarifdlm_tindakan" value="<?= $tindakan['tarifdlm_tindakan']; ?>">
                                    <i class="text-danger"><?= form_error('tarifdlm_tindakan'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tarif Luar Tindakan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan tarif luar tindakan ..." name="tarifluar_tindakan" value="<?= $tindakan['tarifluar_tindakan']; ?>">
                                    <i class="text-danger"><?= form_error('tarifluar_tindakan'); ?></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info ml-3">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>