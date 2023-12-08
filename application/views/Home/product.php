	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Lihat Lebih Lengkap</p>
						<h1>Detail Produk</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?php echo base_url('./uploads/' . $barang->Gambar); ?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?php echo $barang->NamaBarang; ?></h3>
						<p class="single-product-pricing"> <span>Per Kg</span> Rp <?php echo number_format($barang->Harga, 2); ?></p>
						<p><strong>Dijual Oleh </strong>  <?php
                            foreach ($penjual as $nama) {
                                if ($nama->ID_Penjual === $barang->ID_Penjual) {
                                    echo $nama->Username;
                                    break;
                                }
                            }
                            ?> </p>

<p><strong><?php 
                                $this->load->helper('penjual');
                                $city = getDetailCity($barang->idKota);
                                echo $city['rajaongkir']['results']['city_name'].", ".$city['rajaongkir']['results']['province'];
                                ?> 
				</strong></p>
                            
                       
						<p><?php echo $barang->Deskripsi; ?></p>
						<div class="single-product-form">
						
					<!-- 	<form id="addToCartForm" action="<?php echo site_url('cart/add_to_cart/' . $barang->ID_Barang); ?>" method="post">
    <input id="quantityInput" type="number" placeholder="0" name="qty"> Tambahkan ID untuk input jumlah -->
</form>

							<?php if(empty($this->session->userdata('member'))){ ?>
                <!-- Jika pengguna belum login, tampilkan popup atau pesan -->
                <a href="#" class="cart-btn" onclick="showLoginPopup()"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            <?php } else { ?>
                <!-- Jika pengguna sudah login, arahkan ke controller Cart -->
                <a href="<?php echo site_url('cart/add_to_cart/' . $barang->ID_Barang); ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
            <?php } ?>
							
							
							<p><strong>Kategori: </strong>
                            <?php
                            foreach ($kategori as $kat) {
                                if ($kat->ID_Kategori === $barang->ID_Kategori) {
                                    echo $kat->NamaKategori;
                                    break;
                                }
                            }
                            ?>
                        </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<script>

const form = document.getElementById('addToCartForm');
    const quantityInput = document.getElementById('quantityInput');

    // Tambahkan event listener untuk menangani submit form
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Menghentikan aksi default form

        const qty = parseInt(quantityInput.value); // Mengambil nilai jumlah
        if (qty <= 0) {
            alert('Jumlah barang harus lebih dari 0.'); // Tambahkan validasi jumlah
            return;
        }

        // Lakukan pengiriman form menggunakan AJAX jika jumlah valid
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('cart/add_to_cart/' . $barang->ID_Barang); ?>",
            data: { qty: qty }, // Kirim nilai qty sebagai data POST
            success: function(response) {
                console.log('Barang telah ditambahkan ke keranjang.');
                // Lakukan tindakan tambahan setelah barang ditambahkan ke keranjang
            }
        });
    });


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

	<!-- more products 
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3>Strawberry</h3>
						<p class="product-price"><span>Per Kg</span> 85$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
						</div>
						<h3>Berry</h3>
						<p class="product-price"><span>Per Kg</span> 70$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
						</div>
						<h3>Lemon</h3>
						<p class="product-price"><span>Per Kg</span> 35$ </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- end more products -->