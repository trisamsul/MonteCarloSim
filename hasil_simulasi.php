<html>
	<head>
		<title>Program Simulasi Monte Carlo - Kelompok 2</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
	  	<link rel="stylesheet" href="css/bootstrap.min.css">
	  	<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="icon" href="img/favicon.ico">
	  	<script src="js/jquery.min.js"></script>
	  	<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<h1>Prediksi Permintaan (Monte Carlo)</h1>
			</div>
		</div>
	</nav>
	<div class="container">

		<?php
			$jmlRandom = $_POST['jmlRandom'];
			$x0 = $_POST['x0'];
			$a = $_POST['a'];
			$c = $_POST['c'];
			$m = $_POST['m'];
			$biaya = $_POST['biaya'];
			$penjualan = $_POST['penjualan'];
			$angka_random = [];
			$hasil = [];
			$hasil[0] = $x0;
			$pangkat = $_POST['pangkat'];
			$amount = $_POST['amount'];
			$lowestInterval = $_POST['lowestInterval'];
			$dem = $_POST['demand'];
			$demand = unserialize(base64_decode($dem));
			$botInt = $_POST['botInterval'];
			$botInterval = unserialize(base64_decode($botInt));
			$topInt = $_POST['topInterval'];
			$topInterval = unserialize(base64_decode($topInt));
			$demandResult;
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">Hasil Perhitungan</div>
			<div class="panel-body">
				<div class="input-group">
				  <h1><center>Hasil Akhir</center></h1>
				  <p><center>Bilangan acak didapatkan dari metode RNG distribusi uniform</center></p>
				  <div class="table table-responsive">
					<table class="table table-hover custom-table-header">
						  <tr>
							  <th>Hari</th>
							  <th>Bilangan Acak</th>
							  <th>Permintaan</th>
						  </tr>
						<?php for($i=0; $i<$jmlRandom; $i++): ?>
						  <tr>
							  <td> <?php
									echo $i+1; ?>
							  </td>
							  <td>
								<?php
									//proses random dengan metode LCM
									$hasil[$i+1] = ($a*$hasil[$i] + $c) % $m;

									$angka_random[$i] = round($hasil[$i+1]/$m, 5);
									// $rBot[$i] = $lowestInterval * $pangkat;
									// $rTop[$i] = $topInterval[$amount-1] * $pangkat;
									//
									// $random[$i] = rand($rBot[$i], $rTop[$i]);
									//
									// $randomDec[$i] = $random[$i]/$pangkat;
									echo $angka_random[$i]."<br>";
									//echo $randomDec[$i] = 0.86;
								?>
							  </td>
							  <td>
								<?php
									for($j=0;$j<$amount;$j++){
										if($angka_random[$i] >= $botInterval[$j] && $angka_random[$i] <= $topInterval[$j]){
											$demandResult[$i] = $demand[$j];
											echo $demandResult[$i];
										}
									}
								?>
							  </td>
						  </tr>
						<?php endfor; ?>
					</table>
					<?php
						$total=0;
						for($i=0; $i<$jmlRandom; $i++):
							$total=$total+$demandResult[$i];
						endfor;

						$average = $total / $jmlRandom;
					?>
					<h4><center>Rata-rata jumlah permintaan: <b><?php echo $average; ?></b></center></h4><br/>
					<center>
					<form action="hitung_keuntungan.php" method="post">
						<table>
							<input type="hidden" value="<?php echo print base64_encode(serialize($demand)); ?>" name="demand">
							<input type="hidden" value="<?php echo print base64_encode(serialize($demandResult)); ?>" name="demandRes">
							<input type="hidden" value="<?php echo $amount; ?>" name="banyak">
							<input type="hidden" value="<?php echo $penjualan; ?>" name="penjualan">
							<input type="hidden" value="<?php echo $biaya; ?>" name="biaya">
							<input type="hidden" value="<?php echo $demandResult; ?>" name="demandResult">
							<input type="hidden" value="<?php echo $jmlRandom; ?>" name="jmlRandom">
							<tr>
								<td><input type="submit" class="btn btn-info" value="Prediksi Keuntungan" style="padding-left: 30px; padding-right: 30px;"></td>
							</tr>
						</table>
					</form>
					</center><br/>
					<center><a href="prediksi_permintaan.php">Kembali Ke Awal</a></center>
				  </div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>