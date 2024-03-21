<!DOCTYPE html>
<html>
<head>
    <title>Form Input PHP</title>
</head>
<body>
    <h2>Form Input</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Nama: <input type="text" name="nama"><br>
        Tanggal Lahir: <input type="date" name="tanggal_lahir"><br>
        Pekerjaan:
        <select name="pekerjaan">
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Analyst">Analyst</option>
        </select><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Hitung umur
        $tgl_lahir = new DateTime($tanggal_lahir);
        $sekarang = new DateTime();
        $umur = $sekarang->diff($tgl_lahir)->y;

        // Tentukan gaji berdasarkan pekerjaan
        $gaji = 0;
        switch ($pekerjaan) {
            case 'Programmer':
                $gaji = 10000000;
                break;
            case 'Designer':
                $gaji = 8000000;
                break;
            case 'Analyst':
                $gaji = 12000000;
                break;
            default:
                $gaji = 0;
                break;
        }

        // Tampilkan hasil
        echo "<h2>Output</h2>";
        echo "Nama: $nama<br>";
        echo "Tanggal Lahir: $tanggal_lahir<br>";
        echo "Umur: $umur tahun<br>";
        echo "Pekerjaan: $pekerjaan<br>";
        echo "Gaji: Rp. $gaji";
    }
    ?>
</body>
</html>
