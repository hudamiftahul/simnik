<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Table</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Obat</a></li>
                    <li class="active">Index</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Data Obat</h3>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>
                    <a href="<?= base_url(); ?>/obat/create" class="btn btn-info mt-3 mb-4">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Harga Obat</th>
                                    <th>Stok Obat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($obat as $obt) : ?>
                                    <tr>
                                        <td><?= $obt['id_obt']; ?></td>
                                        <td><?= $obt['nm_obt']; ?></td>
                                        <td><?= $obt['hrg_obt']; ?></td>
                                        <td><?= $obt['stok_obt']; ?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>obat/edit/<?= $obt['id_obt']; ?>" class="btn btn-success">Edit</a>
                                            <a href="<?= base_url(); ?>obat/delete/<?= $obt['id_obt']; ?>" class="btn btn-danger" onclick="return confirm('Yakin anda ingin menghapus data ini?')">Hapus</a>
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