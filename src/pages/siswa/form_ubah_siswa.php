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
        <label for="inputAddress2">Kelas</label>
        <br>
        <select name="id_kelas" id="id_kelas">
          <option></option>
        </select>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Tahun Ajaran</label>
        <input type="date" class="form-control" id="tahun_ajaran">
      </div>
      <input type="hidden" name="id_siswa" id="id_siswa" value="<?php echo $_GET['id_siswa'] ?>">

      <button id="btnSimpan" type="submit" class="btn btn-success ml-3">Simpan</button>
      <a id="kembaliSoal" type="button" class="btn btn-warning" onclick="history.back()">Kembali</a>

    </div>
</div>
</form>
</div>

<script>
  $(document).ready(function() {
    var id_kelas = document.getElementById("#id_kelas");
    var id_jurusan = 0;
    var id_siswa = <?php echo json_encode($_GET['id_siswa']); ?>;
    console.log(id_siswa);

    var settings = {
      "url": urlBE+"siswa/get_data_siswa_id.php?id=" + id_siswa,
      "method": "GET",
      "timeout": 0,
      "headers": {
        "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMSIsIm5hbWEiOiJham95IHN5YW50aWsiLCJyb2xlIjoiYWRtaW5fcGVydGFtYSIsInVzZXJuYW1lIjoiYWpveSIsInBhc3N3b3JkIjoiJDJ5JDEwJFVIbmdkUzVKNGJGQXA4S2ZNWFBwdGVkNThDcElMYXZOLzVBdmV0LmYzTFd0cHlwSzIzeVhTIn19.L_ZTGtE9xT8riKlAkPoCy_jJt1w7y7I9wtZ_D5z1bd4",
        "Content-Type": "application/x-www-form-urlencoded"
      },
    }

    $.ajax(settings).done(function(response) {
      var json = JSON.parse(response)
      console.log(json);
      $('#nisn').val(json.data[0].nisn);
      $('#nama_lengkap').val(json.data[0].nama);
      $('#tgl_lahir').val(json.data[0].tgl_lahir);
      $('#tahun_ajaran').val(json.data[0].tahun_ajaran);
      // id_kelas = json.data[0].id_kelas;
      var id_jurusan = json.data[0].id_jurusan;
      var id_kelas = json.data[0].id_kelas;


      //pr
      var settingsJurusan = {
        "url": urlBE+"kelas/get_data_kelas_by_id_jurusan.php?id_jurusan=" + json.data[0].id_jurusan,
        "method": "GET",
        "timeout": 0,
        "headers": {
          "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMSIsIm5hbWEiOiJham95IHN5YW50aWsiLCJyb2xlIjoiYWRtaW5fcGVydGFtYSIsInVzZXJuYW1lIjoiYWpveSIsInBhc3N3b3JkIjoiJDJ5JDEwJFVIbmdkUzVKNGJGQXA4S2ZNWFBwdGVkNThDcElMYXZOLzVBdmV0LmYzTFd0cHlwSzIzeVhTIn19.L_ZTGtE9xT8riKlAkPoCy_jJt1w7y7I9wtZ_D5z1bd4"
        },
      };

      $.ajax(settingsJurusan).done(function(res) {
        var jurusan = JSON.parse(res);
        console.log(jurusan.data[0].nama_kelas)
        var i = 0;
        for (i; i <= jurusan.data.length; i++) {
          $("#id_kelas").append(
            "<option value='" +
            jurusan.data[i].id +
            "'>" +
            jurusan.data[i].nama_kelas +
            "</option>"
          );
          $("#id_kelas option[value='" + id_kelas + "']").attr(
            "selected",
            "selected"
          );
        }
      });
      //end pr
    });






    $('#btnSimpan').click(function(e) {
      e.preventDefault();

      var nisn = $('#nisn').val();
      var nama_lengkap = $('#nama_lengkap').val();
      var tgl_lahir = $('#tgl_lahir').val();
      var tahun_ajaran = $('#tahun_ajaran').val();
      var id_kelas = $('#id_kelas').val();

      var settings = {
        "url": urlBE+"siswa/ubah_siswa.php",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMSIsIm5hbWEiOiJham95IHN5YW50aWsiLCJyb2xlIjoiYWRtaW5fcGVydGFtYSIsInVzZXJuYW1lIjoiYWpveSIsInBhc3N3b3JkIjoiJDJ5JDEwJFVIbmdkUzVKNGJGQXA4S2ZNWFBwdGVkNThDcElMYXZOLzVBdmV0LmYzTFd0cHlwSzIzeVhTIn19.L_ZTGtE9xT8riKlAkPoCy_jJt1w7y7I9wtZ_D5z1bd4",
          "Content-Type": "application/x-www-form-urlencoded"
        },
        "data": {
          "id": id_siswa,
          "nisn": nisn,
          "nama": nama_lengkap,
          "tgl_lahir": tgl_lahir,
          "tahun_ajaran": tahun_ajaran,
          "id_kelas": id_kelas,
        }
      };

      $.ajax(settings).done(function(response) {
        console.log(response);
        alert("Berhasil mengubah data siswa")
        window.location.href = urlFE+'index.php?page=kelas_detail&id_kelas=' + id_kelas;
        console.log(response);
      });
    })


  })
</script>