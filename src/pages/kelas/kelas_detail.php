<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 id="header_kelas" class="m-0 font-weight-bold text-danger"></h6>
    </div>
    <div class="card-body">

        <a id="btnTambahSiswa" type="button" class="btn btn-danger">Tambah Siswa</a>
        <br>
        <br>
        <!-- <h6 class="text-center ml-4 font-weight-bold text-primary mb-1">Cari Tahun Ajaran / Nama / Nisn Pada Kolom Search</h6> -->
        <select name="tahun_ajaran" id="tahun_ajaran">
            <option>Tahun</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
        </select>
        <br>


        <div class="table-responsive">
            <table id="tableKelasDetail" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>

                    </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<script>
    // document.getElementById("header_kelas").innerHTML = "Siswa SMA An-Nurmaniyah Kelas " + id_kelas;
    // console.log(id_kelas)
    $(document).ready(function() {
        var id_kelas = <?php echo json_encode($_GET['id_kelas']) ?>;
        // $('#btnTambahSiswa').attr('href', 'index.php?page=form_tambah_siswa&title=X Bahasa&id_kelas=7')
        var token = sessionStorage.getItem("token");


        var settingss = {
            "url": urlBE + "kelas/get_data_kelas_by_id.php?id_kelas=" + id_kelas,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer " + token
            },
        };

        $.ajax(settingss).done(function(response) {
            var data = JSON.parse(response);
            var nama_kelas = data.data[0].nama_kelas;
            // console.log("data kelas = " + JSON.stringify(data));
            $('#header_kelas').append(nama_kelas)
            $('#btnTambahSiswa').attr('href', urlFE+'index.php?page=form_tambah_siswa&title=' + nama_kelas + "&id_kelas=" + id_kelas)
        })

        var settings = {
            "url": urlBE + "siswa/get_data_siswa.php?kelas=" + id_kelas,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Authorization": "Bearer " + token
            },
        };


        $.ajax(settings).done(function(response) {
            var data = JSON.parse(response);
            // console.log("hit " + response);
            var nama_kelas = data.data[0].nama_kelas

            var tableKelas = $("#tableKelasDetail").DataTable({
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
                                items.nisn
                            );
                        },
                        title: "NISN"
                    },
                    // { data: "nama_kelas", title: "Kelas"},
                    {
                        data: (items) => {
                            return (
                                items.nama
                            );
                        },
                        title: "Nama",
                    },

                    {
                        data: (items) => {
                            return (
                                items.tahun_ajaran
                            );
                        },
                        title: "Tahun Masuk",
                    },
                    {
                        data: (items) => {
                            if (items.flag == "1") {
                                return (
                                    `<img src="${urlFE}assets/img/aktif.png">`
                                );
                            } else {
                                return (
                                    `<img src="${urlFE}assets/img/nonaktif.png">`
                                );
                            }
                        },
                        title: "Aktif",
                    },
                    {
                        data: (items) => {
                            return (
                                `<a class="btn btn-success" type="button" href="${urlFE}index.php?page=form_ubah_siswa&id_siswa=${items.id}" id="detail_siswa">Ubah </a>   <a class="btn btn-danger" type="button" href="${urlFE}index.php?page=detail_siswa_id&id_siswa=${items.id}" id="detail_siswa">Detail </a> `
                            );
                        },
                        title: "Aksi",
                    },
                ]
            });

        });



        $('select').on('change', function(e) {
            var valueSelected = this.value;
            // console.log(id_kelas);
            $('#tableKelasDetail').dataTable().fnClearTable();
            var settings = {
                "url": urlBE + "siswa/get_data_siswa_tahun.php?kelas=" + id_kelas + "&tahun=" + valueSelected,
                "method": "GET",
                "timeout": 0,
                "headers": {
                    "Authorization": "Bearer " + token
                },
            };

            $.ajax(settings).done(function(response) {
                var data = JSON.parse(response);
                var json = JSON.stringify(data.data);
                // console.log("flag = " + data.data[0].flag);
                $('#tableKelasDetail').dataTable().fnAddData(data.data);

                var j = 1;
                for (var i = 0; i < data.data.length; i++) {

                    var x = document.getElementById("tableKelasDetail").rows[j].cells;
                    if (data.data[i].flag == "1") {
                        x[4].innerHTML = '<img src="http://localhost/yapera/assets/img/aktif.png">';
                    } else if (data.data[i].flag == "0") {
                        x[4].innerHTML = '<img src="http://localhost/yapera/assets/img/nonaktif.png">';
                    }
                    x[5].innerHTML = '<a class="btn btn-success" type="button" href="index.php?page=form_ubah_siswa&id_siswa=' + data.data[i].id + '" id="detail_siswa">Ubah </a> <a class="btn btn-danger" type="button" href="index.php?page=detail_siswa_id&id_siswa=' + data.data[i].id + '" id="detail_siswa">Detail </a>';
                    // x[4].innerHTML = '<a style="color:gray" href="index.php?page=detail_siswa_id&id_siswa=' + data.data[i].id + '" id="detail_siswa">Lihat Selengkapnya </a>';
                    j++;
                    // console.log(j);
                }



            });
        });

    });
</script>