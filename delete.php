<?php

require 'dbcont.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE From tb_pegawai where id=$id");
header("location:index.php");
exit;
?>