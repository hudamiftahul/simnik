<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Pendaftaran</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Pendaftaran</a></li>
                    <li class="active">Tambah</li>
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
                                <h3 class="box-title mb-3 float-left">Tambah Pendaftaran</h3>
                            </div>
                            <div class="col-md-1">
                                <input type="text" readonly name="no_antrian" class="form-control float-right text-center bg-info text-white" value="<?= $no_antrian; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12">Id Daftar</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan id daftar ..." name="id_dftr">
                                    <i class="text-danger"><?= form_error('id_dftr'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Id Pasien</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan id pasien ..." name="id_pasien">
                                    <i class="text-danger"><?= form_error('id_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tanggal Daftar</label>
                                <div class="col-md-12">
                                    <input type="datetime-local" class="form-control" name="tgl_dftr">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Poli Tujuan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan poli tujuan ..." name="poli_tujuan">
                                    <i class="text-danger"><?= form_error('poli_tujuan'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">No RM</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan no RM ..." name="no_rm" id="no_rm" onkeyup="isi_otomatis()" data-url="<?= base_url(); ?>pendaftaran/getRM">
                                    <i class="text-danger"><?= form_error('no_rm'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Pasien</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan nama pasien ..." name="nm_pasien" id="nm_pasien">
                                    <i class="text-danger"><?= form_error('nm_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tempat Lahir</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan tempat lahir ..." name="tempat_lahir" id="tempat_lahir">
                                    <i class="text-danger"><?= form_error('tempat_lahir'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Tanggal Lahir</label>
                                <div class="col-md-12">
                                    <input type="date" class="form-control" placeholder="Masukkan tanggal lahir ..." name="tgl_lhr_pasien" id="tgl_lhr_pasien">
                                    <i class="text-danger"><?= form_error('tgl_lhr_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Umur</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan umur ..." name="umur" id="umur">
                                    <i class="text-danger"><?= form_error('umur'); ?></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Jenis Pasien</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="jenis_pasien">
                                        <option readonly>-- Pilih Jenis Pasien --</option>
                                        <option value="BPJS">BPJS</option>
                                        <option value="KIS">KIS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama KK</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan nama KK ..." name="kk_pasien" id="kk_pasien">
                                    <i class="text-danger"><?= form_error('kk_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Jenis Kelamin</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option readonly value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Alamat</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan alamat ..." name="almt_pasien" id="almt_pasien">
                                    <i class="text-danger"><?= form_error('almt_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kota</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan kota ..." name="kota_pasien" id="kota_pasien">
                                    <i class="text-danger"><?= form_error('kota_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Kecamatan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan kecamatan ..." name="kec_pasien" id="kec_pasien">
                                    <i class="text-danger"><?= form_error('kec_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Desa</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan desa ..." name="desa_pasien" id="desa_pasien">
                                    <i class="text-danger"><?= form_error('desa_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Pekerjaan</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan pekerjaan ..." name="pkjr_pasien" id="pkjr_pasien">
                                    <i class="text-danger"><?= form_error('pkjr_pasien'); ?></i>
                                </div>
                            </div>
                            <div class="form-group"></div>
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