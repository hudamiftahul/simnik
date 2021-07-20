<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Table</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Pendaftaran</a></li>
                    <li class="active">Index</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Data Pendaftaran</h3>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <a href="<?= base_url(); ?>/pendaftaran/create" class="btn btn-info mt-3 mb-4">Tambah</a>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Daftar</th>
                                    <th>No. Antrian</th>
                                    <th>Tanggal Daftar</th>
                                    <th>Poli Tujuan</th>
                                    <th>No RM</th>
                                    <th>Nama Pasien</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Jenis Pasien</th>
                                    <th>Nama KK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>Pekerjaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pendaftaran as $dftr) : ?>
                                    <tr>
                                        <td><?= $dftr['id_dftr']; ?></td>
                                        <td><?= $dftr['no_antrian']; ?></td>
                                        <td><?= date('d/m/Y h:i:s A', strtotime($dftr['tgl_dftr'])); ?></td>
                                        <td><?= $dftr['poli_tujuan']; ?></td>
                                        <td><?= $dftr['no_rm']; ?></td>
                                        <td><?= $dftr['nm_pasien']; ?></td>
                                        <td><?= $dftr['tempat_lahir']; ?></td>
                                        <td><?= date('d/m/Y', strtotime($dftr['tgl_lhr_pasien'])); ?></td>
                                        <td><?= $dftr['umur']; ?> Tahun</td>
                                        <td><?= $dftr['jenis_pasien']; ?></td>
                                        <td><?= $dftr['kk_pasien']; ?></td>
                                        <td><?= $dftr['j_kel_pasien']; ?></td>
                                        <td><?= $dftr['almt_pasien']; ?></td>
                                        <td><?= $dftr['kota_pasien']; ?></td>
                                        <td><?= $dftr['kec_pasien']; ?></td>
                                        <td><?= $dftr['desa_pasien']; ?></td>
                                        <td><?= $dftr['pkjr_pasien']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>pendaftaran/edit/<?= $dftr['id_dftr']; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>pendaftaran/delete/" class="btn btn-danger" onclick="return confirm('Yakin anda ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>