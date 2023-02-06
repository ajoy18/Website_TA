<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 id="header_kelas" class="m-0 font-weight-bold text-danger"></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tableKelas" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <!-- <tr>
                        <th>No</th>
                        <th>Jurusan</th>
                        <th>Kelas</th>
                        <th>Detil</th>

                    </tr> -->
                </thead>
                <tbody>
                    <!-- <tr>
                        <td>1</td>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>A</td>
                        <td><a style="text-decoration:none; color:gray" href="index.php?page=kelas_detail">Lihat Selengkapnya</a></td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Ilmu Pengetahuan Alam</td>
                        <td>B</td>
                        <td>Lihat Selengkapnya</td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ilmu Pengetahuan Sosial</td>
                        <td>A</td>
                        <td>Lihat Selengkapnya</td>

                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Ilmu Pengetahuan Sosial</td>
                        <td>B</td>
                        <td>Lihat Selengkapnya</td>

                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Kelas Bahasa</td>
                        <td>A</td>
                        <td>Lihat Selengkapnya</td>

                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Kelas Bahasa</td>
                        <td>B</td>
                        <td>Lihat Selengkapnya</td>

                    </tr> -->

                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var id_kelas = <?php echo json_encode($_GET['kelas']); ?>;
    document.getElementById("header_kelas").innerHTML = "Siswa SMA An-Nurmaniyah Kelas " + id_kelas;

    $(document).ready(function() {
        var token = sessionStorage.getItem("token");
        var settings = {
            "url": urlBE+"kelas/get_data_kelas.php?kelas=" + id_kelas,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer " + token
            },
        };

        $.ajax(settings).done(function(response) {
            // console.log(response);
            var data = JSON.parse(response);
            var tableKelas = $("#tableKelas").DataTable({
                "Searching": false,
                data: data.data,
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
                                items.nama_jurusan
                            );
                        },
                        title: "Nama Jurusan"
                    },
                    // { data: "nama_kelas", title: "Kelas"},
                    {
                        data: (items) => {
                            return (
                                items.nama_kelas
                            );
                        },
                        title: "Kelas",
                    },

                    {
                        data: (items) => {
                            return (
                                `<a style="color:gray" href="${urlFE}index.php?page=kelas_detail&id_kelas=${items.id_kelas}">Lihat Selengkapnya </a>`
                            );
                        },
                        title: "Detil",
                    },
                ]
            });

        });
    });
</script>

</div>