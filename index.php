<!DOCTYPE html>
<html>
<head>
    <title>Papan Kata</title>
    <style>
        /* CSS langsung digabung di sini dan diset full-width biar lebar */
        body { margin: 0; padding: 0; font-family: Arial, sans-serif; }
        .container { width: 100%; padding: 20px; box-sizing: border-box; }
        .pesan-card { background: #f9f9f9; padding: 15px; margin-bottom: 10px; border-left: 5px solid #ff4757; }
        .form-input { width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; }
    </style>
</head>
<body>
<div class="container">
    <h2>Papan Kata Publik</h2>
    
    <form method="POST" action="">
        <input type="text" name="pesan" class="form-input" placeholder="Tulis sesuatu...">
        <button type="submit" name="submit">Kirim</button>
    </form>

    <?php
    // Panggil file koneksi di sini
    include 'koneksi.php';
    
    // Proses masukin data ke tabel kata
    if(isset($_POST['submit'])){
        $pesan = $_POST['pesan'];
        mysqli_query($conn, "INSERT INTO kata (isi_kata) VALUES ('$pesan')");
    }

    // Nampilin data (Versi Rentan XSS untuk eksperimen pertama)
    $query = mysqli_query($conn, "SELECT * FROM kata ORDER BY id DESC");
    while ($baris = mysqli_fetch_assoc($query)) {
        echo "<div class='pesan-card'>" . $baris['isi_kata'] . "</div>";
    }
    ?>
</div>
</body>
</html>
