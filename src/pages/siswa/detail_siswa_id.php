<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 id="header_detail_siswa" class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tableDetailSiswa" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Mengerjakan</th>
                        <th>Numerasi</th>
                        <th>Literasi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody id="tr">
                </tbody>
            </table>


            <a id="kembaliSiswa" type="button" class="btn btn-warning" onclick="history.back()">Kembali</a>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<script>
    var id_siswa = <?php echo json_encode($_GET['id_siswa']); ?>;
    $(document).ready(function() {
        var token = sessionStorage.getItem("token");
        var settings = {
            "url": urlBE+"siswa/get_data_siswa_detail.php?id_siswa=" + id_siswa,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer " + token
            },
        };

        $.ajax(settings).done(function(response) {
            var siswa = JSON.parse(response);
            var dataLoop = siswa.data[0].data;
            var dataNilai = dataLoop.data_nilai
            console.log(siswa.data[0].data);
            $('#header_detail_siswa').append(siswa.data[0].nisn, " - ", siswa.data[0].nama)

            for (i = 0; i < dataLoop.length; i++) {
                let thn = dataLoop[i].tahun;
                var tahun = thn.split("-");
                let j = i + 1;
                $("#tr").append('<tr><td>' +
                    j +
                    '</td><td>' +
                    tahun[0] + "-" + tahun[1] +
                    '</td><td>' + dataLoop[i].data_nilai[0].nilai +
                    '</td><td>' + dataLoop[i].data_nilai[1].nilai +
                    '</td><td>' + dataLoop[i].detail +
                    '</td></tr>');
            }
        });
    });
</script>