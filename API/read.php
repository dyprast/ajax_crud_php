<?php 
	include 'conn.php';

	$q = mysqli_query($conn, "SELECT * FROM tb_karyawan ORDER BY id DESC");
	$num = mysqli_num_rows($q);

	if ($num > 0) {
		while($res = mysqli_fetch_array($q)){
			$output = '<tr>
		      <th scope="row">'.$res["id"].'</th>
		      <td>'.$res["nip"].'</td>
		      <td>'.$res["nama"].'</td>
		      <td>'.$res["jenis_kelamin"].'</td>
		      <td>'.$res["alamat"].'</td>
		      <td><img src="images/'.$res["foto"].'" style="width:50px; height:50px;"></td>
		      <td>
		      	<button class="btn btn-secondary btn-sm edit" id="'.$res["id"].'"><i class="mdi mdi-pencil"></i></button>
		      	<button class="btn btn-danger btn-sm hapus" id="'.$res["id"].'"><i class="mdi mdi-delete"></i></button>
		      </td>
		    </tr>';
		    echo $output;
		}
	}
	else{
		echo "<tr><th colspan=7>Data Kosong</th></tr>";
	}
 ?>