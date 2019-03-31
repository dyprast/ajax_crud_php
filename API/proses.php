<?php 
	include 'conn.php';
			$nip = $_POST['nip'];
			$nama = $_POST['nama'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$alamat = $_POST['alamat'];
			$foto = $_FILES['foto']['name'];
			$foto_tmp = $_FILES['foto']['tmp_name'];
			$q = mysqli_query($conn, "INSERT INTO tb_karyawan (nip, nama, jenis_kelamin, alamat, foto) VALUES ('$nip','$nama','$jenis_kelamin','$alamat','$foto')");
			if ($q) {
				move_uploaded_file($foto_tmp, "../images/".$foto);
			}
 ?>