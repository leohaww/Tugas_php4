<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Mahasantri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #e0f2fe, #f8fafc);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Segoe UI", sans-serif;
        }
        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        .card-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border-radius: 18px 18px 0 0;
        }
        .hasil {
            background: #f0fdf4;
            border-left: 5px solid #22c55e;
            padding: 15px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container" style="max-width:520px;">
    <div class="card">
        <div class="card-header text-center py-3">
            <h4 class="mb-0">Form Pendaftaran Mahasantri</h4>
        </div>
        <div class="card-body p-4">

            <form method="POST" onsubmit="return validasiForm()">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" value="Laki-laki">
                        <label class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk" value="Perempuan">
                        <label class="form-check-label">Perempuan</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Hobi</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Ngoding">
                        <label class="form-check-label">Ngoding</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Desain">
                        <label class="form-check-label">Desain</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="hobi[]" value="Membaca">
                        <label class="form-check-label">Membaca</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control" placeholder="Masukkan alamat"></textarea>
                </div>

                <button type="submit" name="daftar" class="btn btn-primary w-100 rounded-pill py-2">
                    Daftar
                </button>
            </form>

            <?php
            if (isset($_POST['daftar'])) {

                $nama   = htmlspecialchars($_POST['nama']);
                $jk     = $_POST['jk'] ?? '';
                $alamat = htmlspecialchars($_POST['alamat']);

                if (isset($_POST['hobi'])) {
                    $hobi = implode(", ", $_POST['hobi']);
                } else {
                    $hobi = "Tidak ada";
                }

                echo "<div class='hasil mt-4'>";
                echo "<h5 class='fw-bold text-success mb-2'>Hasil Data Pendaftaran</h5>";
                echo "<p class='mb-1'><b>Nama:</b> $nama</p>";
                echo "<p class='mb-1'><b>Jenis Kelamin:</b> $jk</p>";
                echo "<p class='mb-1'><b>Hobi:</b> $hobi</p>";
                echo "<p class='mb-0'><b>Alamat:</b> $alamat</p>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript Validasi -->
<script>
function validasiForm() {
    let nama = document.getElementById("nama").value.trim();
    let alamat = document.getElementById("alamat").value.trim();
    let jk = document.querySelector('input[name="jk"]:checked');

    if (nama === "") {
        alert("Nama lengkap harus diisi!");
        return false;
    }

    if (!jk) {
        alert("Silakan pilih jenis kelamin!");
        return false;
    }

    if (alamat === "") {
        alert("Alamat harus diisi!");
        return false;
    }

    return true;
}
</script>

</body>
</html>
