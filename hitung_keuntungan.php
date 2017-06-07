<?php
	
	$biaya = $_POST['biaya'];
	$penjualan = $_POST['penjualan'];
	$banyak = $_POST['banyak'];
	$jmlRandom = $_POST['jmlRandom'];
	$res = $_POST['demandRes'];
	$demandRes = unserialize(base64_decode($res));
	$dem = $_POST['demand'];
	$demand = unserialize(base64_decode($dem));
	$hasilTotal = [];
	
	for($i=0; $i<$banyak; $i++) {
		$hasilTotal[$i] = 0;
	}
?>

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
	
	<div class="panel panel-primary">
			<div class="panel-heading">Hasil Perhitungan</div>
			<div class="panel-body">
				<div class="input-group">
				  <h1><center>Prediksi Keuntungan</center></h1>
				  <p><center>Order Quantity (Q) diambil dari nilai-nilai Demand (D)</center></p>
				  <div class="table table-responsive">
					<table class="table table-hover custom-table-header" border="0">
						  <tr>
							  <th rowspan="2">Hari</th>
							  <th>Quantity Order</th>
							<?php 
								for($i=0; $i<$banyak; $i++) {
							?><th><?php echo $demand[$i]; ?></th>
							<?php } ?>
						  </tr>
						  <tr>
							  <th>Permintaan</th>
							  <?php 
								for($i=0; $i<$banyak; $i++) {
							?><th></th>
							<?php } ?>
						  </tr>
						<?php for($i=0; $i<$jmlRandom; $i++): ?>
						  <tr>
							  <td> <?php
									echo $i+1; ?>
							  </td>
							  <td>
								<?php
									echo $demandRes[$i];
								?>
							  </td>
							  <?php
							  for($j=0; $j<$banyak; $j++){ ?>
								  <td>
									<?php 
										$result = ($demandRes[$i]*$penjualan)-($demand[$j]*$biaya);
										echo $result;
									?>
								  </td>
					   <?php } ?>
						  </tr>
						  <?php
								for($j=0; $j<$banyak; $j++) {
									for($k=0; $k<$jmlRandom; $k++):
										$hasil = ($demandRes[$k]*$penjualan)-($demand[$j]*$biaya);
										$hasilTotal[$j] += $hasil;
									endfor;
								}
							endfor; ?>
						<tr>
							<th colspan="2"><strong>Rata-rata profit</strong></th>
							<?php 
								for($i=0; $i<$banyak; $i++) {
									$avg = $hasilTotal[$i]/$jmlRandom;
							?>
									<th>
										<strong><?php echo round($avg/$jmlRandom, 2);// $hasilTotal[$i]; ?></strong>
									</th>
							<?php } ?>
						</tr>
					</table>
					<br/>
					<br/>
					<br/>
					<center><a href="prediksi_permintaan.php">Kembali Ke Awal</a></center>
				  </div>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
