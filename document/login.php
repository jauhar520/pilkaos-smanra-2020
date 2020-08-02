<?php
session_start();

if( isset($_SESSION["siswa"]) ) {
    header("location: landing.php");
    exit;
}

require '../function/function.php';
if(isset($_POST["submit"])){
  $nisn = $_POST["nisn"];
  $password = $_POST["password"];

  $data = mysqli_query($conn, "SELECT * FROM datasiswa WHERE nisn = '$nisn'");

  //cek username
  if( mysqli_num_rows($data) === 1) {

    // password
    $row = mysqli_fetch_assoc($data);
    if ( $password == $row["password"] ) {
      // set session
      $_SESSION["siswa"] = true;
      $_SESSION["nama"] = $row["nama"];
      $_SESSION["nisn"] = $row["nisn"];
      $_SESSION["pilihan"] = $row["pilihan"];

      header("location: landing.php"); 
    }
  }
  $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login | PILKAOS</title>
    <link rel="shortcut icon" href="../img/logo.sma.png">
</head>

<body>
    <div class="login-cont">
        <header>
            <section class="sect1">
                <img class="gb1" src="../img/SAVE_20200720_131730.jpg" alt="archile">
                <img class="gb2" src="../img/logo.sma.png" alt="smanra">
            </section>
            <section class="sect2">
                <h1>PILKAOS SMANRA <br> 2020</h1>
            </section>
        </header>
        <main>
            <form action="" method="post">
                <section class="sect1">
                    <div class="box">
                        <input type="text" name="nisn" placeholder="NISN" autofocus autocomplete="off">
                        <input type="password" name="password" placeholder="Password" autocomplete="off">
                    </div>
                </section>
                <section class="sect2">
                    <h2>Petunjuk</h2>
                    <ol>
                        <li> Pastikan Anda terkoneksi dengan internet</li>
                        <li> isikan password (6 digit) dengan 4 digit terakhir NISN + 2 digit nomor Absen anda </li>
                        <li> Bacalah Visi Misi setiap Kandidat</li>
                        <li> PIlihlah 1 Kandidat yang terbaik menurut anda</li>
                        <li> Jika ada kendala silahkan DM ig <a href="https://www.instagram.com/mpkofficial/">@mpkofficial</a>
                            </>
                    </ol>
                    <div class="input">
                        <input type="checkbox" id="setuju" required> <label for="setuju" class="check">Saya sudah membaca petunjuk di atas</label>
                    </div>
                </section>
                <section class="tombol">
                        <button type="submit" name="submit" class="btn">Masuk</button>
                </section>
            </form>
        </main>
    </div>
</body>

</html>