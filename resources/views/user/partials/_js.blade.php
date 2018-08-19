<!-- Javascript files-->
    <script src="/users/js/jquery.min.js"></script>
    <script src="/users/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/users/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/users/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/users/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="/users/js/charts-home.js"></script>
    <script src="/users/js/front.js"></script>

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

    <script src="/users/tinymce/tinymce.min.js"></script>

    <script>
      tinymce.init({
        selector: 'textarea',
        plugins: 'image'
      });
    </script>

  </body>
</html>
