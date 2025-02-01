
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

<h2>Daftar Mahasiswa</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>jabatan</th>
            <th>E-Mail</th>            
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= htmlspecialchars($row['id']); ?></td>
                <td><?= htmlspecialchars($row['nip']); ?></td>
                <td><?= htmlspecialchars($row['nama']); ?></td>                
                <td><?= htmlspecialchars($row['jabatan']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td>
                    <a href="delete.php?id=<?= $row['id']; ?>" 
                       onclick="return confirm('Apakah Anda Yakin?')">Delete</a> |
                    <a href="update.php?id=<?= $row['id']; ?>">Update</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>