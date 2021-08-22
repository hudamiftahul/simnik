<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Data Lab</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Lab</a></li>
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
                            <div class="col-md-12">
                                <h3 class="box-title mb-3 float-left">Tambah Lab</h3>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-md-12">Id Lab</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan id lab ..." name="id_lab">
                                    <i class="text-danger"><?= form_error('id_lab'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Nama Lab</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan nama lab ..." name="nm_lab" id="nm_lab">
                                    <i class="text-danger"><?= form_error('nm_lab'); ?></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Harga Lab</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="Masukkan harga lab ..." name="trf_lab">
                                    <i class="text-danger"><?= form_error('trf_lab'); ?></i>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info ml-3 mt-3">Submit</button>
                        <button type="reset" class="btn btn-secondary mt-3">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>