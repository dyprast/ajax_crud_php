<?php 
	include 'conn.php';

	if (isset($_POST['status'])) {
		if ($_POST['status'] == "Tambah") {
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
		}
		if ($_POST['status'] == "get_data") {
			$id = $_POST['id'];
			$q = mysqli_query($conn, "SELECT * FROM tb_karyawan WHERE id='$id'");
			foreach($q as $res){
				$output['nip'] = $res['nip'];
				$output['nama'] = $res['nama'];
				$output['jenis_kelamin'] = $res['jenis_kelamin'];
				$output['alamat'] = $res['alamat'];
				$output['foto'] = $res['foto'];
				echo json_encode($output);
			}
		}
		if ($_POST['status'] == "Edit") {
			$id = $_POST['id'];
			$nip = $_POST['nip'];
			$nama = $_POST['nama'];
			$jenis_kelamin = $_POST['jenis_kelamin'];
			$alamat = $_POST['alamat'];
			if (!empty($_FILES['foto']['name'])) {
				$foto = $_FILES['foto']['name'];
				$foto_tmp = $_FILES['foto']['tmp_name'];
				$q = mysqli_query($conn, "UPDATE tb_karyawan SET nip='$nip', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', foto='$foto' WHERE id = '$id'");
				if ($q) {
					move_uploaded_file($foto_tmp, "../images/".$foto);
				}
			}
			else{
				$q = mysqli_query($conn, "UPDATE tb_karyawan SET nip='$nip', nama='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat' WHERE id = '$id'");
			}
		}
		if ($_POST['status'] == "Hapus") {
			$id = $_POST['id'];
			$q = mysqli_query($conn, "DELETE FROM tb_karyawan WHERE id='$id'");
			if ($q) {
				echo "Data Berhasil dihapus";
			}
		}
	}
 ?>