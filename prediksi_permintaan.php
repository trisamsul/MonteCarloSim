<html>
	<head>
		<title>Program Simulasi Monte Carlo - Kelompok 2</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/main.css">
	  	<link rel="stylesheet" href="css/bootstrap.min.css">
	  	<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="icon" href="img/favicon.ico">
	  	<script src="js/jquery.js"></script>
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

	<!-- Container -->
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Deskripsi</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						   <li class="active"><a data-toggle="tab" href="#monte">Simulasi Monte Carlo</a></li>
						   <li><a data-toggle="tab" href="#sejarah">Sejarah</a></li>
						   <li><a data-toggle="tab" href="#batasan">Batasan</a></li>

						</ul>
			  			 <div class="tab-content">
			  			 	  <div id="monte" class="tab-pane fade in active" style="padding-top: 20px;">
							    	<div class="col-md-8">
							      		<p>Topik yang diambil pada Tugas Besar Teknik Simulasi dan Pemodelan ini adalah Simulasi Monte Carlo. </p>
										<p>
										Tahapan simulasi:
										<ul>
											<li>Tentukan jumlah data permintaan</li>
											<li>Perhitungan distribusi dari data permintaan yang telah dimasukan</li>
											<li>Simulasi berdasarkan distribusi di atas</li>
										</ul>
									   </p>
							      	</div>
							    </div>
							    <div id="sejarah" class="tab-pane fade" style="padding-top: 20px;">
										<p>Dalam sejarahnya, Simulasi Monte Carlo dikenal dengan istilah sampling simulation atau Monte Carlo Samling Technique. Istilah Monte Carlo pertama digunakan selama masa pengembangan bom atom yang merupakan nama kode dari simulasi nuclear fission. Simulasi ini sering digunakan untuk evaluasi dampak perubahan input dan resiko dalam pembuatan keputusan. Simulasi ini menggunakan data sampling yang telah ada (historical data) dan telah diketahui distribusi datanya. </p>
						    	</div>
						 </div>
		   		</div>
		   	</div>

		<div class="panel panel-primary">
					<div class="panel-heading">Input Data Permintaan</div>
						<div class="panel-body">
							<?php if(empty($_POST)): ?>
							<div class="input-group">
								<form action="prediksi_permintaan.php" method="post">
									<table class="custom-padding-table">
										<tr>
											<td>Masukan jumlah data</td>
											<td>:</td>
											<td><input type="number" name="jumlah" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
											<div class="input-group-btn">
											<td><input type="submit" value="Ok" class="btn btn-success"></td>
      										</div>
									</table>
								</form>
							</div>
							<?php else: ?>
								<?php $banyak = $_POST['jumlah'];?>
									<?php if(!empty($banyak)): ?>
									<div class="input-group">
									<h1><center>Tahap 1</center></h1>
									<p><center>Silahkan masukan data permintaan</center></p>
									  <form action="proses_prediksi_permintaan.php" method="post">
									  	<div class="table table-responsive">
										  <table class="table table-hover custom-table-header">
												  <tr>
													<th>Permintaan</th>
													<th>Frekuensi</th>
												  <tr>
											<?php for($i=0; $i<$banyak; $i++): ?>
												  <tr>
													  <td><input type=text name=demand[] placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
													  <td><input type=number name=freq[] placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
												  </tr>
											<?php endfor; ?>
										  </table>
										  <div class="input-group-btn">
											<center><input type="submit" value="Hitung" name="submit" class="btn btn-success" style="padding-left: 30px; padding-right: 30px;"></center>
										  </div>
										</div>
									  </form>
									</div>
									<?php endif; ?>
							<?php endif; ?>
									</div>
						</div>
					</div>

	</div>
	</body>

</html>
