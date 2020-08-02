<?php

session_start();

if( !isset($_SESSION["siswa"]) ) {
    header("location: login.php");
    exit;
}

if( $_SESSION["pilihan"] == "belum" ) {
    header("location: landing.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5; url=landing.php">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/my.css">

    <script src="../js/jquery.js"></script>
    <script src="../js/my.js"></script>

    <link rel="shortcut icon" href="logo.sma.png">
    <title>Terimakasih</title>
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

    <div class="credit-cont">
        <section class="sect1">
            <img src="../img/logo.sma.png" alt="logo smanra">
            <p>Terimakasih Telah Mengikuti <br> Pemilihan Ketua OSIS <br> SMA NEGERI 1 KARTASURA</p>
        </section>
        <section class="sect2">
            <h2>SUPPORT BY</h2>
            <div class="sponsor">
                <img class="gb1" src="../img/Logo-rohis.png" alt="rohis smanra">
            </div>
        </section>
        <section class="sect3">
            <h2>designed & made by</h2>
            <a href="https://www.instagram.com/dfmaulanad/">dfmaulanad</a>
            <a href="https://www.instagram.com/ihsn.jauhar/">| ihsnjauhar</a>
    </div>
    </section>
    </div>
</body>

</html>