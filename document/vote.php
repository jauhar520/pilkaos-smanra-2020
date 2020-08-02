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

if($pilihan != "belum") {
  header("location: credit.php");
  exit;
}

$satu = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datacalon WHERE nomor = 'satu'"));
$dua = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datacalon WHERE nomor = 'dua'"));
$tiga = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datacalon WHERE nomor = 'tiga'"));


if( isset($_POST["yakin"]) ){
  $pilihan = $_POST["yakin"];

  $update = "UPDATE datasiswa SET pilihan = '$pilihan' WHERE nisn = '$nisn'";

  mysqli_query($conn, $update);

  if ( mysqli_affected_rows($conn) > 0 ) {
    $fix = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM datasiswa WHERE nisn = '$nisn'"));

    $_SESSION["pilihan"] = $fix["pilihan"];

    header("location: credit.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/my.css">
    <link rel="stylesheet" href="../css/self.css">
    <title>Vote | PILKAOS</title>

    <link rel="shortcut icon" href="../img/logo.sma.png">

    <script src="../js/jquery.js"></script>
    <script src="../js/my.js"></script>
</head>

<body>
    <div class="popup-container" id="popup">
        <div class="popup" id="popup-satu" method="post">
            <div class="box">
                <p>Kamu yakin ingin memilih <span><?= $satu["nama"]; ?>?</span> </p>
                <form action="" method="post">
                    <button class="y" id="satu" value="satu" type="submit" name="yakin">Yakin!</button>
                </form>
            </div>
        </div>
        <div class="popup" id="popup-dua">
            <div class="box">
                <p>Kamu yakin ingin memilih <span><?= $dua["nama"]; ?>?</span> </p>
                <form action="" method="post">
                    <button class="y" id="satu" value="dua" type="submit" name="yakin">Yakin!</button>
                </form>
            </div>
        </div>
        <div class="popup" id="popup-tiga">
            <div class="box">
                <p>Kamu yakin ingin memilih <span><?= $tiga["nama"]; ?>?</span> </p>
                <form action="" method="post">
                    <button class="y" id="satu" value="tiga" type="submit" name="yakin">Yakin!</button>
                </form>
            </div>
        </div>
    </div>

    <div class="vote-cont">
        <header>
            <h1>CAKAOS SMANRA <br> 2020</h1>
        </header>
        <main>
            <div class="calon-cont">
                <div class="ca 1">
                    <div class="atas">
                        <img src="../img/<?= $satu["gambar"]; ?>" alt="Daffa Maulana D">
                        <div class="point">
                            <h2>Kandidat 1</h2>
                            <h3><?= $satu["nama"]; ?></h3>
                            <h3><?= $satu["kelas"]; ?></h3>
                            <h4>Alamat: <?= $satu["alamat"]; ?></h4>
                            <h4>TTL: <?= $satu["ttl"]; ?></h4>
                        </div>
                    </div>
                    <div class="tengah">
                        <div class="prestasi">
                            <h3>Prestasi</h3>
                            <p><?= $satu["prestasi"]; ?></p>
                        </div>
                        <div class="visimisi">
                            <h3>Visi :</h3>
                            <P><?= $satu["visi"]; ?></P>
                        </div>
                        <div class="visimisi">
                            <h3>Misi:</h3>
                            <p><?= $satu["misi"]; ?></p>
                        </div>
                    </div>
                    <div class="bawah">
                            <button type="button" id="pick-satu">Pilih</button>
                    </div>
                </div>
                <div class="ca 2">
                        <div class="atas">
                            <img src="../img/<?= $dua["gambar"]; ?>" alt="Daffa Maulana D">
                            <div class="point">
                                <h2>Kandidat 2</h2>
                                <h3><?= $dua["nama"]; ?></h3>
                                <h3><?= $dua["kelas"]; ?></h3>
                                <h4>Alamat: <?= $dua["alamat"]; ?></h4>
                                <h4>TTL: <?= $dua["ttl"]; ?></h4>
                            </div>
                        </div>
                        <div class="tengah">
                            <div class="prestasi">
                                <h3>Prestasi</h3>
                                <p><?= $dua["prestasi"]; ?></p>
                            </div>
                            <div class="visimisi">
                                <h3>Visi :</h3>
                                <P><?= $dua["visi"]; ?></P>
                            </div>
                            <div class="visimisi">
                                <h3>Misi:</h3>
                                <p><?= $dua["misi"]; ?></p>
                            </div>
                        </div>
                        <div class="bawah">
                                <button type="button" id="pick-dua">Pilih</button>
                        </div>
                    </div>
                    <div class="ca 3">
                    <div class="atas">
                            <img src="../img/<?= $tiga["gambar"]; ?>" alt="Daffa Maulana D">
                            <div class="point">
                                <h2>Kandidat 3</h2>
                                <h3><?= $tiga["nama"]; ?></h3>
                                <h3><?= $tiga["kelas"]; ?></h3>
                                <h4>Alamat: <?= $tiga["alamat"]; ?></h4>
                                <h4>TTL: <?= $tiga["ttl"]; ?></h4>
                            </div>
                        </div>
                        <div class="tengah">
                            <div class="prestasi">
                                <h3>Prestasi</h3>
                                <p><?= $tiga["prestasi"]; ?></p>
                            </div>
                            <div class="visimisi">
                                <h3>Visi :</h3>
                                <P><?= $tiga["visi"]; ?></P>
                            </div>
                            <div class="visimisi">
                                <h3>Misi:</h3>
                                <p><?= $tiga["misi"]; ?></p>
                            </div>
                        </div>
                        <div class="bawah">
                                <button type="button" id="pick-tiga">Pilih</button>
                        </div>
                    </div>
                </div>
                </div>
                
            </div>
        </main>
    </div>

    <script>
        $(document).ready(function() {
            // satu
            $('#pick-satu').click(function() {
                $('#popup').css('display', 'flex');
                $('#popup-satu').css('display', 'flex');
            })

            // dua
            $('#pick-dua').click(function() {
                $('#popup').css('display', 'flex');
                $('#popup-dua').css('display', 'flex');
            })

            // tiga
            $('#pick-tiga').click(function() {
                $('#popup').css('display', 'flex');
                $('#popup-tiga').css('display', 'flex');
            })

            // tutup
            $('#popup').click(function() {
                $('#popup').css('display', 'none');
                $('#popup-satu').css('display', 'none');
                $('#popup-dua').css('display', 'none');
                $('#popup-tiga').css('display', 'none');
            })
        })
    </script>
</body>

</html>