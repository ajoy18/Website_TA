<?php

include "src/component/head.php"

?>
<body id="page-top">
    <script>
        // var urlProductionBE = "https://akmyapera.000webhostapp.com/be/";
        // var urlProductionFE = "https://akmyapera.000webhostapp.com/fe/";

        var urlDevBE = "http://localhost/TA_YAPERA/";
        var urlDevFE = "http://localhost/yapera/";

        var urlFE = urlDevFE;
        var urlBE = urlDevBE;
    </script>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'src/component/sidenav.php' ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'src/component/navbar.php' ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <?php


                    $page = (isset($_GET['page'])) ? $_GET['page'] : '';
                    switch ($page) {
                        case 'dashboard':
                            include "src/pages/dahboard.php";
                            break;
                        case 'detail_siswa_id':
                            include "src/pages/siswa/detail_siswa_id.php";
                            break;
                        case 'form_tambah_siswa':
                            include "src/pages/siswa/form_tambah_siswa.php";
                            break;
                        case 'form_ubah_siswa':
                            include "src/pages/siswa/form_ubah_siswa.php";
                            break;
                        case 'kelas':
                            include "src/pages/kelas/kelas.php";
                            break;
                        case 'kelas_detail' :
                            include "src/pages/kelas/kelas_detail.php";
                            break;
                        case 'soal':
                            include "src/pages/soal/soal.php";
                            break;
                        case 'soal_edit':
                            include "src/pages/soal/soal_edit.php";
                            break;
                        case 'ubah_waktu':
                            include "src/pages/soal/ubah_waktu.php";
                            break;
                        case 'soal_tambah' :
                            include "src/pages/soal/soal_tambah.php";
                            break;
                        default:
                            include "src/pages/dahboard.php";
                    }

                    ?>
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; SMA YAPERA 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <?php

        include 'src/component/footer.php';

        ?>