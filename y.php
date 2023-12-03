<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pegawai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Form Input Pegawai</h2>

        <?php
        // Inisialisasi variabel
        $nama_pegawai = "";
        $agama = "";
        $status = "";
        $jumlah_anak = "";

        // Memproses form jika sudah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil nilai dari form
            $nama_pegawai = $_POST["nama_pegawai"];
            $agama = $_POST["agama"];
            $jabatan = $_POST["jabatan"];
            $status = $_POST["status"];

            // Jika status menikah, maka minta input jumlah anak
            if ($status == "menikah") {
                $jumlah_anak = $_POST["jumlah_anak"];
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Input untuk nama pegawai -->
            <label for="nama_pegawai">Nama Pegawai:</label>
            <input type="text" name="nama_pegawai" value="<?php echo $nama_pegawai; ?>" required>

            <!-- Input untuk agama -->
            <label for="agama">Agama:</label>
            <input type="text" name="agama" value="<?php echo $agama; ?>" required>
          
            <!-- Input untuk status jabatan -->
            <label for="jabatan">Status Pernikahan:</label>
            <select name="jabatan" required>
                <option value="manager" <?php if ($status == "") echo "selected"; ?>>manager</option>
                <option value="asisten" <?php if ($status == "asisten") echo "asisten"; ?>>asisten</option>
                <option value="kabag" <?php if ($status == "kabag") echo "selected"; ?>>kabag</option>
                <option value="staff" <?php if ($status == "staff") echo "selected"; ?>>staff</option>
            </select>

            <!-- Input untuk status pernikahan -->
            <label for="status">Status Pernikahan:</label>
            <select name="status" required>
                <option value="belum_menikah" <?php if ($status == "belum_menikah") echo "selected"; ?>>Belum Menikah</option>
                <option value="menikah" <?php if ($status == "menikah") echo "selected"; ?>>Menikah</option>
            </select>

            <!-- Input untuk jumlah anak (hanya muncul jika status menikah) -->
            <?php if ($status == "menikah") : ?>
                <label for="jumlah_anak">Jumlah Anak:</label>
                <input type="number" name="jumlah_anak" value="<?php echo $jumlah_anak; ?>" required>
            <?php endif; ?>

            <button type="submit">Submit</button>
        </form>
        <?php
        
        // Menampilkan hasil jika sudah dihitung
        if ($jumlah_anak != "") {
            echo "<h3>Hasil:</h3>";
            echo "<p><strong>Nama pegawai:</strong> $nama_pegawai</p>";
            echo "<p><strong>agama:</strong> $agama</p>";
            echo "<p><strong>jabatan:</strong> $jabatan</p>";
            echo "<p><strong>status:</strong> $status</p>";
            echo "<p><strong>jumlah anak:</strong> $jumlah_anak</p>";
        }
        ?>
   

    </div>

</body>
</html>
