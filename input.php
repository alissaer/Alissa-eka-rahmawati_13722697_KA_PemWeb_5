<?php
require 'dbcont.php';

// Ambil data dari tabel
$sql = "SELECT * FROM tb_pegawai";
$result = mysqli_query($conn, $sql);

// Menambahkan fungsi tambah data
if(isset($_POST['submit'])){
    $nip = htmlspecialchars($_POST['nip']);
    $nama = htmlspecialchars($_POST['nama']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $email = htmlspecialchars($_POST['email']);

    $query = "INSERT INTO tb_pegawai (nip, nama, jabatan, email) 
              VALUES ('$nip', '$nama', '$jabatan',  '$email')";

    if (mysqli_query($conn, $query)) {
        
        die("Error: " . mysqli_fetch_assoc($conn));
        header("Location: index.php");
        
        exit;
    } else {
        die("Error: " . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Mahasiswa</title>
</head>
<body>
    <h1>Menambah Data Mahasiswa</h1>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td><label for="nip">NIP</label></td>
                <td><input type="text" name="nip" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <!-- <tr>
                <td><label for="jabatan">JABATAN</label></td>
                <td><input type="teks" name="jabatan" required></td>
            </tr> -->
            <tr>
                <td><label for="jabatan">JABATAN</label></td>
                <td><select name="jabatan" id="jabatan">
                    <option value="admin">admin</option>
                    <option value="pegawai">pegawai</option>
                    <option value="kasir">kasir</option>
                    </select>
                </td>
            </tr>

            
            <tr>
                <td><label for="email">E-Mail</label></td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td><button type="reset">Reset</button></td>
                <td><button type="submit" name="submit">Tambah Data</button></td>
            </tr>
        </table>
    </form>
    </body>
</html>