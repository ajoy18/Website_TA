<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: rgba(255, 44, 38, 0.82) !important;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center ml-2 my-2" href="index.php?page=dashboard">
        <div class="sidebar-brand-icon">
            <img src="assets/img/logo_ypr.png" alt="smayapera" width="50">
        </div>
        <div class="sidebar-brand-text mx-1 mr-2 text-lg text-black-50">SMA YAPERA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php?page=dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">

    </div>

    <!-- Nav Item - SISWA Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Siswa/i</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">SISWA</h6> -->
                <a class="collapse-item" href="index.php?page=kelas&kelas=10">Kelas 10</a>
                <a class="collapse-item" href="index.php?page=kelas&kelas=11">Kelas 11</a>
                <a class="collapse-item" href="index.php?page=kelas&kelas=12">Kelas 12</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span>Soal</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <a class="collapse-item" href="index.php?page=soal&kategori=numerasi">Numerasi</a>
                <a class="collapse-item" href="index.php?page=soal&kategori=literasi">Literasi</a>
            </div>
        </div>
    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>