<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Penilaian Mahasantri</title>
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
            box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        }

        .card-header {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: white;
            border-radius: 18px 18px 0 0;
        }

        .form-control, .form-select {
            border-radius: 10px;
            padding: 10px 12px;
        }

        .btn-proses {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            border-radius: 30px;
            font-weight: 600;
        }

        .btn-proses:hover {
            opacity: 0.9;
        }

        .hasil {
            background: #f0fdf4;
            border-left: 5px solid #22c55e;
            padding: 15px;
            border-radius: 12px;
            animation: fade .4s ease;
        }

        @keyframes fade {
            from {opacity:0; transform: translateY(10px);}
            to {opacity:1; transform: translateY(0);}
        }
    </style>
</head>
<body>

<div class="container" style="max-width:520px;">
    <div class="card">
        <div class="card-header text-center py-3">
            <h4 class="mb-0">Form Penilaian Mahasantri</h4>
        </div>

        <div class="card-body p-4">

            <form method="POST" onsubmit="return validasiForm()">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan username">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Mata Kuliah</label>
                    <select name="matakuliah" id="matakuliah" class="form-select">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <option value="PPL">PPL</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nilai</label>
                    <input type="number" name="nilai" id="nilai" class="form-control" min="0" max="100" placeholder="0 - 100">
                </div>

                <button type="submit" name="proses" class="btn btn-proses w-100 py-2">
                    Proses Penilaian
                </button>
            </form>

            <?php
            if (isset($_POST['proses'])) {

                $username = htmlspecialchars($_POST['username']);
                $matkul   = $_POST['matakuliah'];
                $nilai    = (int) $_POST['nilai'];

                if ($nilai >= 85) {
                    $grade = "A";
                    $ket = "Sangat Baik";
                } elseif ($nilai >= 75) {
                    $grade = "B";
                    $ket = "Baik";
                } elseif ($nilai >= 65) {
                    $grade = "C";
                    $ket = "Cukup";
                } else {
                    $grade = "D";
                    $ket = "Tidak Lulus";
                }

                echo "<div class='hasil mt-4'>";
                echo "<h5 class='fw-bold text-success mb-2'>Hasil Penilaian</h5>";
                echo "<p class='mb-1'><b>Username:</b> $username</p>";
                echo "<p class='mb-1'><b>Mata Kuliah:</b> $matkul</p>";
                echo "<p class='mb-1'><b>Nilai:</b> $nilai</p>";
                echo "<p class='mb-1'><b>Grade:</b> $grade</p>";
                echo "<p class='mb-0'><b>Keterangan:</b> $ket</p>";
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
    let u = document.getElementById("username").value.trim();
    let p = document.getElementById("password").value.trim();
    let m = document.getElementById("matakuliah").value;
    let n = document.getElementById("nilai").value;

    if (u === "" || p === "" || m === "" || n === "") {
        alert("Semua field wajib diisi!");
        return false;
    }

    if (n < 0 || n > 100) {
        alert("Nilai harus antara 0 - 100!");
        return false;
    }

    return true;
}
</script>

</body>
</html>
