<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Daftarkan Akun Penjualmu!</p>
						<h1>Register Penjual</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Buat Akun</h2>
						<p>Segera daftarkan akun Anda untuk memulai penjualan hasil tani mu di Sayurin!</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" id="fruitkha-contact" action="<?php echo site_url('Register/save_regpenjual');?>" onSubmit="return valid_datas( this );">
							<p>
								<input required type="text" placeholder="Username" name="username" id="username">
								<input required type="text" placeholder="Nama Penjual" name="nama" id="nama">
								
							</p>
							<p>
								<input required type="email" placeholder="Email" name="email" id="email">
								<input required type="text" placeholder="Phone" name="no_hp" id="no_hp">
								
							</p>

							<p>
						
								<input required type="password" placeholder="Password" name="password" id="password" style="width: 100%;">
							</p>

							<p>
								<select required id="province" name="province" class="form-control" placeholder="Provinsi" style="width: 100%;">
									<option>Pilih Provinsi</option>
								</select>
							</p>

							<p>
								<select required id="city" name="city" class="form-control" placeholder="Kota" style="width: 100%;">
									<option>Pilih Kota</option>
								</select>
							</p>

							<p>
								<input type="text" placeholder="Alamat Lengkap" name="alamat" id="alamat" style="width: 100%;">
							</p>

							
						
							<p><input type="submit" value="Submit"> </p> 
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
					<!-- end contact form 	<div class="contact-form-box">
						<h4><i class="fas fa-map"></i>Alamat</h4>
							<p>Jl. Ring Road Utara, Ngringin, Condongcatur <br>Kec. Depok, Kabupaten Sleman<br>Daerah Istimewa Yogyakarta.</p>
						</div>
					
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i>Kontak</h4>
							<p>Telepon: +62 889-8364-7096 <br> Email: sayurin@gmail.com</p>
						</div>-->

							<div class="contact-form-box">
							<h4><i class="far fa-user"></i>Register Pembeli</h4>
							<p>Mulai Penjualan Hasil Tani Mu <br> Dengan Daftarkan Akunmu <a href="<?php echo site_url('Register');?>">Disini!</a> </p>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->

	<script>


        function getProvince(){
            $.ajax({
					type: 'GET',
					url: "<?php echo site_url('Register/getProvince');?>",
                    success: function(hasil) {
                        console.log(hasil);
						$("#province").html(hasil);
					}
				});
        }

        $('#province').change(function()
        {
            $.ajax({
					type: 'GET',
					url: "<?php echo site_url('Register/getCity');?>"+"/"+$('#province').val(),
                    success: function(hasil) {
                        console.log(hasil);
						$("#city").html(hasil);
					}
				});
        });

        getProvince();
    </script>
