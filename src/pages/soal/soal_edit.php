<form id="formUbah" method="POST" enctype="multipart/form-data">
    <div class="p-3">
        <div class="">
            <h3 class="mb-3" id="soal"></h3>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban1" id="radio1"> -->
                <label for="exampleInputEmail1">Ubah soal</label> <br>
                <!-- <input required class="rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" id="soal_txt" name="soal_txt"> -->
                <textarea required class="form-control" name="soal_txt" id="soal_txt" cols="30" rows="10"></textarea>
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban1" id="radio1"> -->
                <label for="exampleInputEmail1">Ubah jawaban benar</label> <br>
                <input required class="rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" id="jawaban_benar_txt" name="jawaban_benar_txt">
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban2"> -->
                <label for="exampleInputEmail1">Ubah jawaban salah</label> <br>
                <input required class="salah rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" id="jawaban_salah_txt_1" name="jawaban_salah_txt_1">
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban3"> -->
                <input required class="salah rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" id="jawaban_salah_txt_2" name="jawaban_salah_txt_2">
            </p>
            <p>
                <!-- <input type="radio" name="jawaban" value="jawaban4"> -->
                <input required class="salah rounded ml-2 pl-2" style="width: 30%; height:35px" type="text" id="jawaban_salah_txt_3" name="jawaban_salah_txt_3">
            </p>
            <input type="hidden" name="jawaban_salah_id_1" id="jawaban_salah_id_1">
            <input type="hidden" name="jawaban_salah_id_2" id="jawaban_salah_id_2">
            <input type="hidden" name="jawaban_salah_id_3" id="jawaban_salah_id_3">
            <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">


            <div>
                <img src="" alt="" style="width:30%" id="gambar">
                <div class="input-group mb-1 mt-1" style="width: 30%">
                    <div class="custom-file">
                        <input name="imageupload" type="file" class="custom-file-input" id="imageupload">
                        <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                    </div>
                </div>
            </div>


            <button id="btnSimpan" type="button" class="btn btn-success mt-3">Simpan</button>
            <a id="kembaliSoal" type="button" class="btn btn-warning mt-3" >Kembali</a>

        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        var id_soal = <?php echo json_encode($_GET['id']) ?>;
        var kategori_soal = '';
        var token = sessionStorage.getItem("token");
        var settings = {
            "url": urlBE+"soal/get_data_soal_id.php?id=" + id_soal,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer " + token
            },
        };

        $.ajax(settings).done(function(response) {
            // console.log(response);
            var json = JSON.parse(response);
            kategori_soal = json.data[0].kategori_soal;
            console.log(kategori_soal);
            $('#jawaban_benar_txt').val(json.data[0].jawaban_benar);
            // $("#radio1").prop("checked", true);
            $("#jawaban_benar_txt").css("background-color", "lightgreen");
            $(".salah").css("background-color", "lightyellow");
            // document.getElementById("soal").innerHTML = json.data[0].soal_txt;
            $('#soal_txt').val(json.data[0].soal_txt);
            for (let index = 0; index < json.data[0].jawaban_salah.length; index++) {
                $('#jawaban_salah_txt_1').val(json.data[0].jawaban_salah[index].jawaban_salah);
                $('#jawaban_salah_id_1').val(json.data[0].jawaban_salah[index].id);
                index++;
                $('#jawaban_salah_txt_2').val(json.data[0].jawaban_salah[index].jawaban_salah);
                $('#jawaban_salah_id_2').val(json.data[0].jawaban_salah[index].id);
                index++;
                $('#jawaban_salah_txt_3').val(json.data[0].jawaban_salah[index].jawaban_salah);
                $('#jawaban_salah_id_3').val(json.data[0].jawaban_salah[index].id);

            }
            document.getElementById("gambar").src = urlBE+"soal/image/" + json.data[0].gambar;

        });

        $("#imageupload").change(function() {
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

        $('#btnSimpan').click(function(e) {
            e.preventDefault();

            var form = new FormData($('#formUbah')[0]);

            console.log(form);
            var settingss = {
                "url": urlBE+"soal/ubah_soal.php",
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

            $.ajax(settingss).done(function(response) {
                console.log(response);
                alert("Soal berhasil diubah");
                // window.location.href = 'http://localhost/yapera/index.php?page=soal_edit&id=' + id_soal;
                location.reload();
                // // console.log(response);
            });

        });

        $('#kembaliSoal').click(function (e) { 
            e.preventDefault();
            location.replace(urlFE+'index.php?page=soal&kategori=' + kategori_soal)
        });
    });
</script>