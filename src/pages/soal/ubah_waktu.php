<div class="card shadow mb-4">
  <form id="formUbah">
    <div class="card-header py-3">
      <h6 id="header_ubah_waktu" class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="form-group col-md-5 mt-5">
      <div class="form-group">
        <label for="inputAddress2">Mulai</label>
        <div class='input-group date' id='datetimepicker1'>
          <input type='datetime-local' class="form-control" id="mulai" />

        </div>
      </div>

      <div class="form-group">
        <label for="inputAddress2">Berhenti</label>
        <div class='input-group date' id='datetimepicker2'>
          <input type='datetime-local' class="form-control" id="berhenti" />

        </div>
      </div>
      <input type="hidden" name="kategori" value="<?php echo $_GET['kategori']; ?>">

      <button id="btnSimpan" type="submit" class="btn btn-danger ml-3">Simpan</button>
      <a id="kembaliSoal" type="button" class="btn btn-warning" onclick="history.back()">Kembali</a>

    </div>
</div>
</form>
</div>

<script>
  $(document).ready(function() {
    var kategori = <?php echo json_encode($_GET['kategori']); ?>;

    var settings = {
      "url": urlBE+"soal/get_waktu_soal.php?kategori=" + kategori,
      "method": "GET",
      "timeout": 0,
      "headers": {
        "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMSIsIm5hbWEiOiJham95IHN5YW50aWsiLCJyb2xlIjoiYWRtaW5fcGVydGFtYSIsInVzZXJuYW1lIjoiYWpveSIsInBhc3N3b3JkIjoiJDJ5JDEwJFVIbmdkUzVKNGJGQXA4S2ZNWFBwdGVkNThDcElMYXZOLzVBdmV0LmYzTFd0cHlwSzIzeVhTIn19.L_ZTGtE9xT8riKlAkPoCy_jJt1w7y7I9wtZ_D5z1bd4"
      },
    };

    $.ajax(settings).done(function(response) {
      console.log(response);
      var json = JSON.parse(response);
      $('#mulai').val(json.data[0].mulai);
      $('#berhenti').val(json.data[0].berhenti);
    });

    $('#btnSimpan').click(function(e) {
      e.preventDefault();

      var mulai = $('#mulai').val();
      var berhenti = $('#berhenti').val();
      // console.log(mulai);

      var form = new FormData($('#formUbah')[0]);
      form.append("mulai", mulai);
      form.append("berhenti", berhenti);
      var settings = {
        "url": urlBE+"soal/ubah_waktu_soal.php",
        "method": "POST",
        "timeout": 0,
        "headers": {
          "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7ImlkIjoiMSIsIm5hbWEiOiJham95IHN5YW50aWsiLCJyb2xlIjoiYWRtaW5fcGVydGFtYSIsInVzZXJuYW1lIjoiYWpveSIsInBhc3N3b3JkIjoiJDJ5JDEwJFVIbmdkUzVKNGJGQXA4S2ZNWFBwdGVkNThDcElMYXZOLzVBdmV0LmYzTFd0cHlwSzIzeVhTIn19.L_ZTGtE9xT8riKlAkPoCy_jJt1w7y7I9wtZ_D5z1bd4"
        },
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
        "data": form
      };

      // console.log(form);

        $.ajax(settings).done(function(response) {
        console.log(response);
        alert('Waktu berhasil diubah')
      });
    });



  });
</script>