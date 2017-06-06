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
						   <li><a data-toggle="tab" href="#metode">Metode</a></li>

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
						    	<div id="batasan" class="tab-pane fade" style="padding-top: 20px;">
									<ol>
										<li>Apabila suatu persoalan sudah dapat diselesaikan atau dihitung jawabannya secara matematis dengan tuntas, maka hendaknya jangan menggunakan simulasi ini.</li>
										<li>Apabila sebagian persoalan tersebut dapat diselesaikan secara analitis dengan baik, maka penyelesaiannya lebih baik dilakukan secara terpisah. Sebagian secara analitis dan sebagian lagi simulasi.</li>
										<li>Apabila mungkin dapat digunakan simulasi perbandingan.</li>
									</ol>
						    	</div>
								<div id="metode" class="tab-pane fade" style="padding-top: 20px;">
										<p><b>Linear Congruent Method (LCM)</b></p>
										<p>Pada Simulasi Monte Carlo ini, kami menggunakan metode Linear Congruential Method. Linear Congruent Method (LCM) merupakan metode pembangkitkan bilangan acak yang banyak digunakan dalam program komputer. LCM memanfaatkan model linier untuk membangkitkan bilangan acak. Untuk menghasilkan urutan bilangan bulat X1, X2, ... antara 0 dan m -1 dengan mengikuti hubungan rekursif:</p>
											<pre><b> Xi+1 = (aXi+c) mod m,   i=0,1,2...</b></pre>
											<p> Di mana :
												<ul> 
													<li>Xi = adalah bilangan acak ke i</li>
													<li>a dan c adalah konstanta LCM</li>
													<li>m adalah batas maksimum bilangan acak</li>
												</ul>
											</p>
											<hr/>
										<p> Asumsikan: m > 0 dan a < m, c < m, X0 < m. Pemilihan nilai untuk a, c, m, dan X0 secara drastis mempengaruhi sifat statistik dan panjang siklus. Bilangan bulat acak Xi dihasilkan pada [0, m -1]. Kemudian mengkonversi bilangan bulat Xi menjadi bilangan acak</p>
										<p> Ketentuan-ketentuan pemilihan setiap parameter pada persamaan di atas adalah sebagai berikut : 
											<ol>
												<li>m = modulus, 0 < m</li>
												<li>a = multiplier (pengganda), 0 < a < m</li>
												<li>c = Increment (pertambahan nilai), 0 = c < m</li>
												<li>X0 = nilai awal, 0 = X0 < m</li>
												<li>c dan m merupakan bilangan prima relatif</li>
												<li>a – 1 dapat dibagi oleh faktor prima dari m</li>
												<li>a – 1 merupakan kelipatan 4 jika m juga kelipatan 4</li>
												<li>a harus sangat besar</li>
											</ol>
										</p>
										<p>Ciri khas dari LCM adalah terjadi pengulangan pada periode waktu tertentu atau setelah sekian kali pembangkitan, hal ini adalah salah satu sifat dari metode ini, dan pseudo random generator pada umumnya. Penentuan konstanta LCM (a, c dan m) sangat menentukan baik tidaknya bilangan acak yang diperoleh dalam arti memperoleh bilangan acak yang seakan-akan tidak terjadi pengulangan.</p>
										<p><b>LCG memiliki periode penuh jika dan hanya jika tiga kondisi berikut bertahan (Hull dan Dobell, 1962):</b> 
											<ol>
												<li>Satu-satunya bilangan bulat positif yang (persis) membagi kedua m dan c adalah 1</li>
												<li>Jika q adalah bilangan prima yang membagi m, maka q membagi a-1</li>
												<li>Jika 4 membagi m, maka 4 membagi a-1</li>
											</ol>
										</p>
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
											<td><input type="number" min="0" name="jumlah" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
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
													  <td><input type=number min=0 name=demand[] placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
													  <td><input type=number min=1 name=freq[] placeholder="0" class="form-control" required="" oninvalid="this.setCustomValidity('Harap di isi !')" oninput="setCustomValidity('')"></td>
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
