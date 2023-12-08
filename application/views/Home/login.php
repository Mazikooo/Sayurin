<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Masuk Ke Akunmu!</p>
						<h1>Login</h1>
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
						<h2>Masuk Ke Akun</h2>
						<p>Segera Mulai menikmati kemudahan berbelanja produk pertanian berkualitas di Sayurin!</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" id="fruitkha-contact" action="<?php echo site_url('Register/login_member');?>" onSubmit="return valid_datas( this );">
							<p>
								<input required type="text" placeholder="Username" name="username" id="username" style="width: 100%;">
								
								
							</p>
					
							<p>
								<input required type="password" placeholder="Password" name="password" id="password" style="width: 100%;">
							</p>

							<p>
							
							<p><input type="submit" value="Login"></p>
                            <?php if (!empty(validation_errors())): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo validation_errors(); ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $error; ?>
                                        </div>
                                    <?php endif; ?>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
						<h4><i class="fas fa-map"></i>Alamat</h4>
							<p>Jl. Ring Road Utara, Ngringin, Condongcatur <br>Kec. Depok, Kabupaten Sleman<br>Daerah Istimewa Yogyakarta.</p>
						</div>
						<!-- end contact form  <div class="contact-form-box">
							<h4><i class="far fa-clock"></i>Jam Kerja</h4>
							<p>SENIN - JUMAT: 08.00 WIB - 20.00 WIB <br> SAT - SUN: 10 to 8 PM </p>
						</div>-->
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i>Kontak</h4>
							<p>Telepon: +62 889-8364-7096 <br> Email: sayurin@gmail.com</p>
						</div>

						<div class="contact-form-box">
							<h4><i class="far fa-user"></i>Login Penjual</h4>
							<p>Mulai Penjualan Hasil Tani Mu <br> Dengan Masuk Ke Akunmu <a href="<?php echo site_url('Register/login_penjual');?>">Disini!</a> </p>
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
