<footer class="page-footer">
    <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
</footer>
</div>
</div>
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<!-- Form Validation JS -->
<script src="./assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $("#form-admin").validate({
        rules: {
            nama: {
                minlength: 2,
                required: !0
            },
            username: {
                required: !0,
                minlength: 2
            },
            nomorhp: {
                required: !0,
                minlength: 5
            },
            alamat: {
                required: !0,
                minlength: 3
            },
            password: {
                minlength: 5
            },
            password_confirmation: {
                minlength: 5,
                equalTo: "#password"
            }
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });

    $("#form-kategori").validate({
        rules: {
            namakategori: {
                minlength: 2,
                required: !0
            },
            deskripsikategori: {
                required: !0,
                minlength: 3
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });

    $("#form-barang").validate({
        rules: {
            namabarang: {
                minlength: 2,
                required: !0
            },
            harga: {
                required: !0,
                minlength: 3
            },
            hargamodal: {
                required: !0,
                minlength: 3
            },
            jumlahtersedia: {
                minlength: 2,
                required: !0
            },
        },
        errorClass: "help-block error",
        highlight: function(e) {
            $(e).closest(".form-group.row").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group.row").removeClass("has-error")
        },
    });
</script>
<!-- Data tables -->
<script src="./assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
        });
    })
    $(document).ready(function() {
        $('#laporan-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf'
            ]
        });
    });
</script>
</body>

</html>