<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Table</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Tindakan</a></li>
                    <li class="active">Index</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Data Tindakan</h3>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <a href="<?= base_url(); ?>/tindakan/create" class="btn btn-info mt-3 mb-4">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Tindakan</th>
                                    <th>Nama Tindakan</th>
                                    <th>Kandungan Tindakan</th>
                                    <th>Tarif Dalam Tindakan</th>
                                    <th>Tarif Luar Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tindakan as $tindakan) : ?>
                                    <tr>
                                        <td><?= $tindakan['id_tindakan']; ?></td>
                                        <td><?= $tindakan['nm_tindakan']; ?></td>
                                        <td><?= $tindakan['kd_tindakan']; ?></td>
                                        <td><?= $tindakan['tarifdlm_tindakan']; ?></td>
                                        <td><?= $tindakan['tarifluar_tindakan']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>tindakan/edit/<?= $tindakan['id_tindakan']; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>tindakan/delete/<?= $tindakan['id_tindakan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin anda ingin menghapus data ini?')">Hapus</a>
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