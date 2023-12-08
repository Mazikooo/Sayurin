


	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Segar & Berkualitas</p>
							<h1>Sayuran Terbaik Disini</h1>
							<div class="hero-btns">
								<a href="<?php echo site_url('Shop');?>" class="boxed-btn">Shop Now</a>
								<a href="<?php echo site_url('Contact');?>" class="bordered-btn">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">

			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Pengiriman Cepat</h3>
							<p>Berbagai Jasa Kirim Yang Profesional</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Support</h3>
							<p>Bantuan Setiap Hari</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Refund</h3>
							<p>Uang Kembali Jika Barang Tidak Sesuai</p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Produk</span> Kami</h3>
						<p>Kami menawarkan beragam produk berkualitas tinggi yang sesuai dengan kebutuhan Mu. Mulai dari Buah dan Sayuran, kami memiliki semuanya.</p>
					</div>
				</div>
			</div>

			<div class="row">
    <?php foreach ($tiga_barang_pertama as $barang) { ?>
        <div class="col-lg-4 col-md-6 text-center">
            <div class="single-product-item">
			<div class="product-image">
    <a href="<?php echo site_url('main/get_id/'.$barang->ID_Barang);?>">
        <img src="<?php echo base_url('./uploads/' . $barang->Gambar); ?>" alt="<?php echo $barang->NamaBarang; ?>">
    </a>
</div>

                <h3><?php echo $barang->NamaBarang; ?></h3>

				<p><strong><?php 
                                $this->load->helper('penjual');
                                $city = getDetailCity($barang->idKota);
                                echo $city['rajaongkir']['results']['city_name'].", ".$city['rajaongkir']['results']['province'];
                                ?> 
				</strong></p>

                <p class="product-price">
                    <span>Per 1Kg</span>
                    Rp <?php echo number_format($barang->Harga, 2); ?>
                </p>

                <?php if(empty($this->session->userdata('member'))){ ?>
                <!-- Jika pengguna belum login, tampilkan popup atau pesan -->
                <a href="#" class="cart-btn" onclick="showLoginPopup()"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            <?php } else { ?>
                <!-- Jika pengguna sudah login, arahkan ke controller Cart -->
                <a href="<?php echo site_url('cart/add_to_cart/' . $barang->ID_Barang); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            <?php } ?>

				
            </div>
        </div>
    <?php } ?>
</div>

<script>
    function showLoginPopup() {
        // Tampilkan SweetAlert untuk menampilkan pesan login yang menarik
        Swal.fire({
            title: 'Login Required!',
            text: 'Kamu Harus Login Dahulu Untuk Menambahkan Barang Di Keranjang.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the login page
                window.location.href = '<?php echo site_url('Register/login_member'); ?>';
                // Ganti 'login' dengan rute menuju halaman login di aplikasi Anda
            }
        });
    }
</script>
		</div>
	</div>
	<!-- end product section -->

	

	<!-- testimonail-section 
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Saira Hakim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>David Niph <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Jacob Sikim <span>Local shop owner</span></h3>
								<p class="testimonial-body">
									" Sed ut perspiciatis unde omnis iste natus error veritatis et  quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- end testimonail-section -->
	
	
	
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="<?php echo site_url('Shop');?>" class="cart-btn btn-lg">Shop Now</a>
        </div>
    </section>
	<!-- end shop banner -->

	<!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">


		
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Artikel</span> Kami</h3>
						<p>Dapatkan artikel terkini seputar dunia pertanian dan informasi menarik  seputar dunia pertanian di sini. Baca artikel kami yang mengulas trend terbaru, tips bercocok tanam, dan berbagai berita menarik lainnya yang dapat menambah pengetahuan Mu!</p>
					</div>
				</div>
			</div>
	

			
			<div class="row">
			<?php foreach ($artikel_terakhir as $artikel) { ?>
				<div class="col-lg-4 col-md-6">
				<div class="single-latest-news">
					<a href="<?php echo $artikel->Link; ?>"  target="_blank">
						<img src="<?php echo base_url('./uploads/artikel/' . $artikel->Gambar); ?>" alt="">
					</a>
					<div class="news-text-box">
						<h3><a href="<?php echo $artikel->Link; ?>"  target="_blank"><?php echo $artikel->Judul; ?></a></h3>
						<p class="excerpt"><?php echo $artikel->Judul; ?></p>
						<a href="<?php echo $artikel->Link; ?>" class="read-more-btn" target="_blank">read more <i class="fas fa-angle-right"></i></a>
					</div>
				</div>
			</div>

			<?php } ?>


					<!-- end latest news 
				<div class="col-lg-4 col-md-6">
					<div class="single-latest-news">
						<a href="single-news.html"><div class="latest-news-bg news-bg-2"></div></a>
						<div class="news-text-box">
							<h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>
							<p class="blog-meta">
								<span class="author"><i class="fas fa-user"></i> Admin</span>
								<span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
							</p>
							<p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
							<a href="single-news.html" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>-->

				
			</div>

			
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="<?php echo site_url('News');?>" class="boxed-btn">More News</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->

	<!-- logo carousel 
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- end logo carousel -->

	