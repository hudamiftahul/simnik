<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Penyakit</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Penyakit</a></li>
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
                                <h3 class="box-title mb-3 float-left">Ubah Penyakit</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-12">Id Penyakit</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan id penyakit ..." name="id_pnykt" value="<?= $penyakit['id_pnykt']; ?>" readonly>
                                    <i class="text-danger"><?= form_error('id_pnykt'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Penyakit</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan nama penyakit ..." name="nm_pnykt" value="<?= $penyakit['nm_pnykt']; ?>">
                                    <i class="text-danger"><?= form_error('nm_pnykt'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kandungan Penyakit</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan kandungan penyakit ..." name="kd_pnykt" value="<?= $penyakit['kd_pnykt']; ?>">
                                    <i class="text-danger"><?= form_error('kd_pnykt'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Jenis Penyakit</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan jenis penyakit ..." name="jenis_pnykt" value="<?= $penyakit['jenis_pnykt']; ?>">
                                    <i class="text-danger"><?= form_error('jenis_pnykt'); ?></i>
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