<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Dukungan 24 Jam</p>
						<h1>Hubungi Kami</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Ada pertanyaan?</h2>
						<p>Butuh bantuan atau memiliki pertanyaan? Jangan ragu untuk menghubungi kami melalui formulir di bawah ini!</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
					<form method="post" action="<?php echo site_url('contact/saveContact'); ?>" onSubmit="return valid_datas( this );">
							<p>
								<input required type="text" placeholder="Name" name="name" id="name">
								<input required type="email" placeholder="Email" name="email" id="email">
							</p>
							<p>
								<input required type="tel" placeholder="Phone" name="phone" id="phone">
								<input required type="text" placeholder="Subject" name="subject" id="subject">
							</p>
							<p><textarea required name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
						
							<p><input type="submit" value="Submit"></p>
							<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

								
									<?php if ($this->session->flashdata('success_message')): ?>
										<script>
								
											Swal.fire({
												icon: 'success',
												title: 'Success!',
												text: '<?php echo $this->session->flashdata('success_message'); ?>'
											});
										</script>
									<?php elseif ($this->session->flashdata('error_message')): ?>
										<script>
									
											Swal.fire({
												icon: 'error',
												title: 'Error!',
												text: '<?php echo $this->session->flashdata('error_message'); ?>'
											});
										</script>
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
					
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i>Kontak</h4>
							<p>Telepon: +62 889-8364-7096 <br> Email: sayurin@gmail.com</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->



	<!-- find our location -->
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p> <i class="fas fa-map-marker-alt"></i>Lokasi Kami</p>
				</div>
			</div>
		</div>
	</div>
	<!-- end find our location -->

	<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15813.12736111232!2d110.4090461!3d-7.7599049!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599bd3bdc4ef%3A0x6f1714b0c4544586!2sUniversity%20of%20Amikom%20Yogyakarta!5e0!3m2!1sen!2sid!4v1700046371504!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="embed-responsive-item"></iframe>
</div>
<!-- end google map section -->
