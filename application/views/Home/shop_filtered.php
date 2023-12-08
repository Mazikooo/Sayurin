<!-- shop_filtered.php --> <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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