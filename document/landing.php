<?php
session_start();

if( !isset($_SESSION["siswa"]) ) {
  header("location: login.php");
  exit;
}

$nama = $_SESSION["nama"];
$pilihan = $_SESSION["pilihan"];
$nisn = $_SESSION["nisn"];
require '../function/function.php';

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datasiswa WHERE nisn = '$nisn'"));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo.sma.png">
    <link rel="stylesheet" href="../css/my.css">
    <title>Home | PILKAOS</title>

    <script src="../js/jquery.js"></script>
    <script src="../js/my.js"></script>
</head>

<body>
    <div class="loader-kotak" id="loader">
        <div class="isiKotak">
            <div class="middle">
                <span class="pilkaos">PILKAOS</span>
            </div>
            <div class="keterangan">
                <span class="keterangan">for better SMANRA</span>
            </div><br><br>
            <div class="middle">
                <div class="loader"></div>
            </div>
        </div>

        <div class="credit">
           <div class="isiCredit">by: jauhar, daffa</div>
        </div>
    </div>
    <div class="landing-cont">
        <header>
            <section class="sect1">
                <img class="gb1" src="../img/WhatsApp Image 2020-06-26 at 8.59.59 PM.jpeg" alt="archile">
                <img class="gb2" src="../img/logo.sma.png" alt="smanra">
            </section>
            <section class="sect2">
                <h1>Selamat Datang!</h1>
            </section>
        </header>
        <main>
            <section class="sect1">
                <h2 style="border: <?php if($pilihan == "belum"){
                    echo "2px solid #bd1a26";
                }else echo "2px solid lightgreen"; ?>;">Status : <?php if($pilihan == "belum"){
                    echo "Belum Memilih";
                }else echo "Sudah Memilih"; ?></h2>
            </section>
            <section class="sect2">
                <ul>
                    <li><?= $nama; ?></li>
                    <li><?= $nisn; ?></li>
                    <li><?= $data["kelas"]; ?></li>
                </ul>
            </section>
            <section class="tombol">
                    <a href="<?php if($pilihan == "belum"){
                    echo "vote.php";
                }else echo "logout.php"; ?>" style="text-decoration: none;"><button type="button"><?php if($pilihan == "belum"){
                    echo "Selanjutnya";
                }else echo "Logout"; ?></button><a>
            </section>

        </main>
    </div>
</body>

</html>