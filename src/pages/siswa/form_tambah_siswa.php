<div class="card shadow mb-4">
  <form id="formTambah">
    <div class="card-header py-3">
      <h6 id="header_tambah_siswa" class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="form-group col-md-5 mt-5">
      <label for="inputAddress">NISN</label>
      <input type="text" class="form-control mb-3" id="nisn">
      <div class="form-group">
        <label for="inputAddress2">Nama Lengkap</label>
        <input type="text" class="form-control mb-3" id="nama_lengkap">
      </div>
      <div class="form-group">
        <label for="inputAddress2">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir">
      </div>

      <div class="form-group">
        <label for="inputAddress2">Tahun Ajaran</label>
        <input type="date" class="form-control" id="tahun_ajaran">
      </div>
      <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $_GET['id_kelas'] ?>">

      <button id="btnTambah" type="submit" class="btn btn-danger ml-3">Tambah</button>
      <a id="kembaliSoal" type="button" class="btn btn-warning" onclick="history.back()">Kembali</a>

    </div>
</div>
</form>
</div>

<script>
  var id_kelas = <?php echo json_encode($_GET['id_kelas']) ?>;
  var nama_kelas = <?php echo json_encode($_GET['title']) ?>;
  $(document).ready(function() {
    var token = sessionStorage.getItem("token");
    $('#header_tambah_siswa').append(nama_kelas);
    $('#btnTambah').click(function(e) {
      e.preventDefault();

      var nisn = $('#nisn').val();
      var nama_lengkap = $('#nama_lengkap').val();
      var tgl_lahir = $('#tgl_lahir').val();
      var tahun_ajaran = $('#tahun_ajaran').val();

      var settings = {
        "url": urlBE+"siswa/post_siswa.php",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Authorization": "Bearer "+token,
          "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
          "nisn": nisn,
          "nama": nama_lengkap,
          "tgl_lahir": tgl_lahir,
          "tahun_ajaran": tahun_ajaran,
          "id_kelas": id_kelas
        }
      };

      $.ajax(settings).done(function(response) {
        alert("Berhasil Menambah Siswa")
        window.location.href = urlFE+'index.php?page=kelas_detail&id_kelas='+id_kelas;
        console.log(response);
      });
    });
  })
</script>