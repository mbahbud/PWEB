<!DOCTYPE html>
<html lang="id">
<head>
    <title>Pendaftaran Mahasiswa SMK Coding</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #f0f4ff, #d9e2ff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 15px;
        }
        .main-card {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
            margin-top: 20px;
        }
        .form-control, .btn, .form-select {
            border-radius: 8px;
        }
        .form-control, .form-select {
            background-color: #f7f7f7;
            border: 1px solid #e0e0e0;
        }
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            background-color: #f7f9fd;
        }
    </style>
</head>
<body>

<div class="main-card">
    <div class="text-center mb-4">
        <h1 class="text-primary fw-bold">Pendaftaran Mahasiswa Baru</h1>
    </div>
    <hr>

    <div id="form-daftar" class="mb-5">
        <h3 class="mb-4 text-center">Formulir Pendaftaran</h3>
        <div class="alert-container">
            </div>
        
        <form id="form-pendaftaran">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" class="form-control" name="nim" id="nim" required>
            </div>

            <div class="mb-4">
                <label for="jurusan" class="form-label">Jurusan:</label>
                <select class="form-select" name="jurusan" id="jurusan" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Elektro">Teknik Elektro</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Manajemen Bisnis">Manajemen Bisnis</option>
                </select>
                </div>

            <button type="submit" class="btn btn-primary w-100">Daftar Mahasiswa Baru</button>
        </form>
    </div>

    <hr class="mb-4">

    <div id="list-siswa">
        <h3 class="mb-3 text-center">Daftar Mahasiswa Terdaftar</h3>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th>Nama</th>
                        <th style="width: 15%;">NIM</th>
                        <th style="width: 25%;">Jurusan</th>
                        </tr>
                </thead>
                <tbody id="list-siswa-body">
                    <tr><td colspan="4" class="text-center">Memuat data...</td></tr>
                </tbody>
            </table>
        </div>
    </div>

</div> <script>
$(document).ready(function() {

    function updateDaftarMahasiswa() {
        $.ajax({
            url: "ambil_data.php",
            type: "GET",
            dataType: "json",
            success: function(data) {
                var tableBody = $("#list-siswa-body");
                tableBody.empty();

                if (data.length === 0) {
                    tableBody.append('<tr><td colspan="4" class="text-center">Belum ada mahasiswa yang terdaftar.</td></tr>');
                    return;
                }

                $.each(data, function(index, mhs) {
                    var no = index + 1;
                    var row = "<tr>" +
                        "<td>" + no + "</td>" +
                        "<td>" + mhs.nama + "</td>" + 
                        "<td>" + mhs.nim + "</td>" + 
                        "<td>" + mhs.jurusan + "</td>" +
                        "</tr>";
                    tableBody.append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error("Gagal mengambil data mahasiswa: " + error);
                $("#list-siswa-body").html('<tr><td colspan="4" class="text-center text-danger">Gagal memuat data dari server.</td></tr>');
            }
        });
    }

    updateDaftarMahasiswa();
    setInterval(updateDaftarMahasiswa, 5000); 


    $("#form-pendaftaran").submit(function(e) {
        e.preventDefault(); 

        $.ajax({
            type: "POST",
            url: "daftar_proses.php",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                const container = $(".alert-container");
                container.empty();

                if (response.status === 'success') {
                    container.append('<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        response.message +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                    
                    $("#form-pendaftaran")[0].reset(); 
                    updateDaftarMahasiswa();
                } else {
                    container.append('<div class="alert alert-danger alert-dismissible fade show" role="alert">' +
                        (response.message || "Pendaftaran gagal.") +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
                }
            },
            error: function(xhr, status, error) {
                $(".alert-container").html('<div class="alert alert-danger">Terjadi kesalahan saat menghubungi server.</div>');
                console.error(error);
            }
        });
    });

});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>