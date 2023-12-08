<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Segar dan Berkualitas</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                    <li class="" data-filter="*"><a href="<?php echo site_url('shop');?>">All</a></li>
                    <li class="" data-filter="batang"><a href="<?php echo site_url('shop/batang');?>">Batang</a></li>
                    <li class="active" data-filter="daun"><a href="<?php echo site_url('shop/daun');?>">Daun</a></li>
                    <li class="" data-filter="biji"><a href="<?php echo site_url('shop/biji');?>">Biji</a></li>
                    <li class="" data-filter="buah"><a href="<?php echo site_url('shop/buah');?>">Buah</a></li>




                     <!--     <?php foreach ($kategori as $kat) { ?>
                            <li data-filter=".<?php echo $kat->ID_Kategori; ?>"><?php echo $kat->NamaKategori; ?></li>
                        <?php } ?>     -->
                     
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterItems = document.querySelectorAll('.product-filters ul li');
        const productItems = document.querySelectorAll('.product-lists .single-product-item');

        filterItems.forEach((filter) => {
            filter.addEventListener('click', function () {
                const selectedFilter = filter.getAttribute('data-filter');

                filterItems.forEach((item) => {
                    item.classList.remove('active');
                });

                filter.classList.add('active');

                productItems.forEach((item) => {
                    if (selectedFilter === '*' || item.classList.contains(selectedFilter.replace('.', ''))) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>

                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <?php foreach ($databarang as $barang) { ?>
                <div class="col-lg-4 col-md-6 text-center kategori-<?php echo $barang->ID_Kategori; ?>">
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
                            <a href="#" class="cart-btn" onclick="showLoginPopup()"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <?php } else { ?>
                            <a href="<?php echo site_url('cart/add_to_cart/' . $barang->ID_Barang); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>

   


<script> function showLoginPopup() {
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
	<!-- end products -->