<?php
echo '<link href="form_sty.css" rel="stylesheet" type="text/css" />';
if (isset($_POST['Bayar'])) {
	$serial = $_POST['serial'];
	$nama = $_POST['nama'];
	$bulan = $_POST['bulan'];
	$daya = $_POST['daya'];
	$smaw = $_POST['smaw'];
	$smak = $_POST['smak'];

	$time = date("d-m-Y H:i:s");

	switch ($daya) {
		case '450':
			$perkwh = 415;
			break;
		case '900':
			$perkwh = 1352;
			break;
		case '1300':
			$perkwh = 1467;
			break;
		case '2200':
			$perkwh = 1467;
			break;
		case '3500':
			$perkwh = 1467;
			break;
		case '6600':
			$perkwh = 1467;
			break;
	}
	if($smaw && $smak){
		$stot = $smak - $smaw;
		$kva = $daya / 1000;
		$jam = $stot / $kva;
		$biaya = $jam * $perkwh;
		$pajak = $biaya * 0.024;
		$pajak = round($pajak);
		$biaya = round($biaya);
		$tahun = date("Y");
			echo "<body>";
				echo "<center><h2>Pembayaran Listrik</h2></center>";
				echo "<center><h3>PT Aliran AC</h3></center>";
				echo '<div class  = "teks">';
					echo "<h2>Data Pelanggan</h2>";
					echo '<table>';
						echo '<tr>';
							echo '<td>Tanggal</td>';
							echo "<td>: $time</td>";
						echo '</tr>';
						echo '<tr>';
							echo '<td>ID Pelanggan </td>';
							echo "<td>: $serial</td>";
						echo '</tr>';
						echo '<tr>';
							echo '<td>Nama</td>';
							echo "<td>: $nama</td>";
						echo '</tr>';
						echo '<tr>';	
							echo '<td>Bulan-Tahun</td>';
							echo "<td>: $bulan $tahun</td>";
						echo '</tr>';
						echo '<tr>';
							echo '<td>Daya</td>';
							echo "<td>: $daya</td>";
						echo '</tr>';
						echo '<tr>';
							echo '<td>Stand Meter</td>';
							echo "<td>: $smaw - $smak</td>";
						echo '</tr>';		
					echo '</table>';
					echo "<br>";
					echo "<h2>Detail Tagihan</h2>";
					echo '<table>';
						echo '<tr>';
							echo '<td>Pajak</td>';
							echo "<td>: Rp $pajak</td>";
						echo '</tr>';
						echo '<tr>';
							echo '<td>Administrasi</td>';
							echo "<td>: Rp 2500</td>";
						echo '</tr>';
						echo '<tr>';
							echo '<td>Biaya Total</td>';
							echo "<td>: Rp $biaya</td>";
						echo '</tr>';
					echo '<table>';
				echo "</div>";
				echo "<center><h4>*Harap Simpan Bukti Pembayaran ini</h4></center>";
			echo "</body>";
	}
	

	


}
?>