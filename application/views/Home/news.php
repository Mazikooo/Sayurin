<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Informasi Pertanian</p>
						<h1>Artikel Berita</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- latest news -->
	<div class="latest-news mt-150 mb-150">
		<div class="container">
			<div class="row">

			<?php foreach ($data_artikel as $artikel) { ?>
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



				
			</div>

			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<div class="pagination-wrap">
								<ul>
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a class="active" href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->