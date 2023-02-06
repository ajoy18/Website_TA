<div>
    <div class="card-header py-3">
        <h6 id="header_soal_tambah" class="m-0 font-weight-bold text-danger"></h6>
    </div>
    <form id='formTambah' method="POST" enctype="multipart/form-data">
        <div class="form-group mt-4">
            <label for="exampleInputEmail1">Masukkan soal yang ingin ditambahkan</label>
            <!-- <input type="text" required class="form-control" id="soal" name="soal_txt"> -->
            <textarea required class="form-control" name="soal_txt" id="soal" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">masukkan jawaban (Kolom Hijau untuk jawaban benar dan yang kuning untuk yang salah)</label>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban1" id="radio1"> -->
                <input class="rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" name="jawaban_benar_txt"  id="benar" required>
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban2"> -->
                <input class="salah rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" name="jawaban_salah_txt[]" id="salah1" required>
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban3"> -->
                <input class="salah rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" name="jawaban_salah_txt[]"  id="salah2" required>
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban4"> -->
                <input class="salah rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" name="jawaban_salah_txt[]"  id="salah3" required>
            </p>
        </div>
        <!-- upload gambar -->
        <div>
            <img src="" alt="" style="width:30%" id="gambar">
            <input type="hidden" name="kategori_soal" value="<?php echo $_GET['kategori'] ?>">
            <div class="input-group mb-1 mt-1" style="width: 30%">
                <div class="custom-file">
                    <input name="imageupload" type="file" class="custom-file-input" id="inputFile">
                    <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                </div>
            </div>
        </div>

        <div>
            <button id="tambahSoal" type="button" class="btn btn-danger">Simpan</button>
            <a id="kembaliSoal" type="button" class="btn btn-warning" onclick="history.back()">Kembali</a>
        </div>

    </form>
</div>

</div>


<script>
    var kategori = <?php echo json_encode($_GET['kategori']) ?>;
    $(document).ready(function() {
        var token = sessionStorage.getItem("token");
        $('#header_soal_tambah').append('soal ' + kategori);
        $("#benar").css("background-color", "lightgreen");
        $(".salah").css("background-color", "lightyellow");
        $('#tambahSoal').click(function(e) {
            e.preventDefault();

            var form = new FormData($('#formTambah')[0]);
            var settings = {
                "url": urlBE+"soal/post_soal.php",
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

            var soal = $('#soal').val()
            var benar = $('#benar').val();
            var salah1 = $('#salah1').val();
            var salah2 = $('#salah2').val();
            var salah3 = $('#salah3').val();
            if(soal !== '' && benar !== '' && salah1 !== '' && salah2 !== '' && salah3 !== ''){

                $.ajax(settings).done(function(response) {
                console.log(response);
                alert("Berhasil menambahkan soal")
                window.location.href = urlFE+'index.php?page=soal&kategori=' + kategori;
                console.log(response);
            });
            } else {
                alert("Form input tidak boleh kosong !");
            }       
        });


    });


    $("#inputFile").change(function() {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                $("#gambar")
                    .attr("src", event.target.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>