<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>



<script>
    $(document).ready(function() {
        var logged = sessionStorage.getItem("user_logged_id");
        console.log(logged);
        switch (logged) {
            case true:
                $(location).attr('href', 'http://localhost/yapera/index.php');
                break;
            case null:
                $(location).attr('href', 'http://localhost/yapera/login.php');
                break;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $("#btn-logout").click(function() {
            sessionStorage.clear();
            $(location).attr('href', 'http://localhost/yapera/login.php');
        })
    });
</script>


<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/chart-area-demo.js"></script>
<script src="assets/js/demo/chart-pie-demo.js"></script>
<script src="assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.min.js"></script>

</body>


</html>