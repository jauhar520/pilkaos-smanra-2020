<?php
// $conn = mysqli_connect("localhost", "rohisman_jauhar", "kodokijo666", "rohisman_pilkaos");
$conn = mysqli_connect("localhost", "root", "", "pilkaos");

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);

  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }

  return $rows;
}

// tambah
function tambah($data) {
  global $conn;

  $nama = htmlspecialchars($data["nama"]);
  $password = htmlspecialchars($data["password"]);
  $absen = htmlspecialchars($data["absen"]);
  $kelas = htmlspecialchars($data["kelas"] . $data["jurusan"]);
  $nisn = htmlspecialchars($data["nisn"]);
  $pilihan = $data["pilihan"];

  $query = "  INSERT INTO datasiswa
              VALUES
              ('', '$nama', '$kelas', '$absen', '$nisn', '$pilihan', '', '$password')
              ";
  mysqli_query($conn, $query);
}

// query
function data($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}

// tambah calon
function calon($data) {
  global $conn;

  $ketua = htmlspecialchars($data["ketua"]);
  $kelas = htmlspecialchars($data["kelasketua"] . " " . $data["jurusanketua"]);
  $visi = htmlspecialchars($data["visi"]);
  $misi = htmlspecialchars($data["misi"]);
  $alamat = htmlspecialchars($data["alamat"]);
  $ttl = htmlspecialchars($data["ttl"]);
  $prestasi = htmlspecialchars($data["prestasi"]);
  $no = htmlspecialchars($data["nourut"]);

  // upload
  $gambar = upload();

  $query = "  INSERT INTO datacalon
              VALUES
              ('', '$ketua', '$kelas', '$ttl', '$alamat', '$prestasi', '$visi', '$misi', '$no', '$gambar')
              ";
  mysqli_query($conn, $query);
}


function upload() {
  $namaFile = $_FILES["gambar"]["name"];
  $tmpName = $_FILES["gambar"]["tmp_name"];

  // $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, '../../img/' . $namaFileBaru);

  return $namaFileBaru;
}
?>
