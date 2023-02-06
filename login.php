<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AKM YAPERA</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-light">
  <script>
    // var urlProductionBE = "https://akmyapera.000webhostapp.com/be/";

    var urlDevBE = "http://localhost/TA_YAPERA/";

    var url = urlDevBE;
  </script>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5 bg-gradient-light">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <img src="assets/img/img_login.png" alt="">
              </div>
              <div class="col-lg-6">
                <div class="p-4 ml-5 mt-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-3 mt-4">Selamat Datang!</h1>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" id="txtUsername" name="txtUsername" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama Pengguna">
                    </div>
                    <div class="form-group">
                      <input type="password" id="txtPassword" name="txtPassword" class="form-control form-control-user" id="exampleInputPassword" placeholder="Kata Sandi">
                    </div>
                    <!-- <a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a> -->
                    <button id="btn_login" class="btn btn-danger btn-user btn-block">Masuk</button>
                    <div class="text-center mt-5">
                      <p class="">SMA AN-NURMANIYAH</p>
                    </div>
                    <div class="text-center">
                      <p class=""> &copy; 2023</p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>
  <script src="assets/js/jquery-3.6.1.min.js"></script>

  <script>
    // jallnin jquery 94
    $(document).ready(function() {
      // ambil #btn_login
      // click digunakan untuk post , update , delete
      $("#btn_login").click(function() {
        var username = $("#txtUsername").val();
        var password = $("#txtPassword").val();
        // ke server
        var settings = {
          "url": url+"admin/login_admin.php",
          "method": "POST",
          "timeout": 0,
          "headers": {
            // 'bearer'
            "Content-Type": "application/x-www-form-urlencoded"
          },
          // GET gausah make ini , hanya POST dan PUT
          "data": {
            "username": username,
            "password": password
          }
        };

        $.ajax(settings).done(function(response) {
          // convert data to json
          var json = JSON.parse(response);
          // console.log(json)
          // document.cookie = "token="+json.token+"id="+json.data.id+"nama="+json.data.nama+"mapel_id="+json.data.mapel_id;
          // isi dari login admin
          sessionStorage.setItem("user_logged_id", true);
          sessionStorage.setItem("token", json.token);
          sessionStorage.setItem("id", json.data.id);
          sessionStorage.setItem("nama", json.data.nama);
          // admion
          window.location.href = 'index.php';
        });
      })
    })
  </script>
</body>

</html>