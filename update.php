<?php
require 'dbcont.php';

$id = $_GET ['id'];
$sql = "SELECT * FROM tb_pegawai where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];

    $query = "UPDATE tb_pegawai set nip='$nip',nama='$nama', jabatan='$jabatan',email='$email'
    where id=$id";
    mysqli_query($conn, $query);
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> Update data mahasiswa</h1>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td><label for="nip">nip</label></td>
                <td><input type="text" name="nip" id="nip" value="<?= $row['nip'];?>"require></input></td>
            </tr>
            <tr>
                <td><label for="nama">NAMA</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $row['nama'];?>"require></input></td>
            </tr>
            <!-- <tr>
                <td><label for="jabatan">jabatan</label></td>
                <td><input type="text" name="jabatan" id="jabatan" value="<?= $row['jabatan'];?>"require></input></td>
            </tr> -->
            <tr>
                <td><label for="jabatan">JABATAN</label></td>
                <td><select name="jabatan" id="jabatan" value="<?= $row['jabatan'];?>">
                    <option value="admin">admin</option>
                    <option value="pegawai">pegawai</option>
                    <option value="kasir">kasir</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td><label for="email">E-MAIL</label></td>
                <td><input type="email" name="email" id="email" value="<?= $row['email'];?>"require></input></td>
            </tr>
            <tr>
                <td><button type="reset">reset</button></td>
                <td><button type="submit" name="submit">update data</button></td>
            </tr>
        </table>
    </form>
    
</body>
</html>