<!-- jQuery -->
    <script src="/users/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/users/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="/users/vendor/bootstrap/js/bootstrap-confirmation.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/users/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/users/dist/js/sb-admin-2.js"></script>

    <script src="/users/tinymce/tinymce.min.js"></script>

    <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'image'
      });
    </script>

    <!-- DataTables JavaScript -->
<script src="/users/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/users/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/users/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>


</body>

</html>
