<footer class="footer text-center"> 2021 &copy; Sistem Informasi Klinik Poli Umum </footer>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets'); ?>/bootstrap/dist/js/tether.min.js"></script>
<script src="<?= base_url('assets'); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('assets'); ?>/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?= base_url('assets'); ?>/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets'); ?>/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets'); ?>/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?= base_url('assets'); ?>/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    function isi_otomatis() {
        var no_rm = $("#no_rm").val();
        var url = $("#no_rm").data('url');
        $.ajax({
            url: url,
            data: "no_rm=" + no_rm,
            success: function(data) {
                var json = data,
                    obj = JSON.parse(json);
                if (obj != null) {
                    $('#id_pasien').val(obj.id_pasien)
                    $('#nm_pasien').val(obj.nm_pasien)
                    $('#tempat_lahir').val(obj.tempat_lahir)
                    $('#tgl_lhr_pasien').val(obj.tgl_lhr_pasien)
                    $('#umur').val(obj.umur)
                    $('#kk_pasien').val(obj.kk_pasien)
                    $('#jenis_kelamin').val(obj.j_kel_pasien).change()
                    $('#almt_pasien').val(obj.almt_pasien)
                    $('#kota_pasien').val(obj.kota_pasien)
                    $('#kec_pasien').val(obj.kec_pasien)
                    $('#desa_pasien').val(obj.desa_pasien)
                    $('#pkjr_pasien').val(obj.pkjr_pasien)
                } else {
                    $('#id_pasien').val("")
                    $('#nm_pasien').val("")
                    $('#tempat_lahir').val("")
                    $('#tgl_lhr_pasien').val("")
                    $('#umur').val("")
                    $('#kk_pasien').val("")
                    $('#jenis_kelamin').val("").change()
                    $('#almt_pasien').val("")
                    $('#kota_pasien').val("")
                    $('#kec_pasien').val("")
                    $('#desa_pasien').val("")
                    $('#pkjr_pasien').val("")
                }
            }
        });
    }
</script>
</body>

</html>