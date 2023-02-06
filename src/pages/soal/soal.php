<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 id="header_soal" class="m-0 font-weight-bold text-danger"></h6>
    </div>
    <div class="card-body">

        <!-- TAMBAH SOAL -->
        <a id="btnTambahSoal" type="button" class="btn btn-danger mb-3">Tambah Soal</a>
        <a id="btnWaktuSoal" type="button" class="btn btn-danger mb-3">Atur Waktu Pengerjaan</a>

        <div class="table-responsive">
            <table id="tableSoal" class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>

                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

<script>
    var kategori = <?php echo json_encode($_GET['kategori']); ?>;
    // document.getElementById("header_soal").innerHTML = "Soal " + kategori;

    $(document).ready(function() {
        var token = sessionStorage.getItem("token");
        
        console.log(kategori);
        $('#header_soal').append('soal ' + kategori)
        $('#btnTambahSoal').attr('href', urlFE+'index.php?page=soal_tambah&kategori=' + kategori)
        $('#btnWaktuSoal').attr('href', urlFE+'index.php?page=ubah_waktu&kategori=' + kategori)

        var tableSoal = $("#tableSoal").DataTable({
            ajax: {
                "url": urlBE+"soal/get_data_soal.php?kategori=" + kategori,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer " + token
                },
            },
            // console.log(response);
            "Searching": false,
            columns: [

                {
                    data: null,
                    title: "No",
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },

                {
                    data: (items) => {
                        return (
                            items.soal_txt
                        );
                    },
                    title: "Soal"
                },
                // { data: "nama_kelas", title: "Kelas"},


                {
                    data: (items) => {
                        return (
                            `<a type="button" class="btn btn-success" href="${urlFE}index.php?page=soal_edit&id=${items.id}">Ubah</a>  <button id="id_delete" type="submit" class="btn btn-primary" data-id=${items.id}>Hapus</button>`

                        );
                    },
                    title: "Detil",
                },
            ]
        });



        $(document).on("click", "#id_delete", function(e) {
            e.preventDefault();
            // console.log($(this).data("id")) ; 
            var id_delete = $(this).data("id");
            var form = new FormData();
            form.append("id", id_delete);

            if (confirm("Apakah anda yakin menghapus soalnya?")) {
                var settings = {
                    "url": urlBE+"soal/hapus_soal.php",
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

                $.ajax(settings).done(function(response) {
                    // console.log(response);
                    tableSoal.ajax.reload();
                    alert("Data berhasil dihapus");
                });
            } else {
                // Do nothing!
                console.log('Thing was not saved to the database.');
            }

        })

    })
</script>