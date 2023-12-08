	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Segar dan Berkualitas</p>
						<h1>Keranjang</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Gambar Produk</th>
									<th class="product-name">Nama</th>
									<th class="product-price">Harga</th>
									<th class="product-quantity">Jumlah</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($cartItems as $item){ ?>
								<tr class="table-body-row">
									<td class="product-remove"><a href="<?php  echo site_url('cart/delete_cart/'.$item['rowid']);?>"><i class="far fa-window-close"></i></a></td>

									<td class="product-image"><img src="<?php echo base_url('./uploads/'.$item['image']);?>" alt=""></td>
									<td class="product-name"><?php echo $item['name'];?></td>

									<td class="product-price">Rp.<?php echo $item['price'];?></td>

									<td class="product-quantity"><input type="number" placeholder="0"  id="quantity_<?php echo $item['rowid']; ?>" value="<?php echo $item['qty']; ?>"></td>

									<td class="product-total">Rp <?php echo $item['price']*$item['qty'];?></td>

								</tr>
								<?php } ?>


			



							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td><?php echo  $total;?></td>
								</tr>

								<tr class="total-data">
    <td><strong>Dikirim Dari: </strong></td>
    <td>
        <?php 
            $this->load->helper('penjual');
            $city = getDetailCity($kota_asal);

         
            if(isset($city['rajaongkir']['results']['city_name']) && isset($city['rajaongkir']['results']['province'])) {
                echo $city['rajaongkir']['results']['city_name'].", ".$city['rajaongkir']['results']['province'];
            } else {
                echo "Informasi tidak tersedia";
            }
        ?>
    </td>
</tr>

<tr class="total-data">
    <td><strong>Tujuan: </strong></td>
    <td>
        <?php 
            $this->load->helper('penjual');
            $city = getDetailCity($kota_tujuan);

            
            if(isset($city['rajaongkir']['results']['city_name']) && isset($city['rajaongkir']['results']['province'])) {
                echo $city['rajaongkir']['results']['city_name'].", ".$city['rajaongkir']['results']['province'];
            } else {
                echo "Informasi tidak tersedia";
            }
        ?>
    </td>
</tr>


										<tr class="total-data">
									<td><strong>Kurir: </strong></td>
									<td>   JNE </td>
								</tr>



								<tr class="total-data">
									<td><strong>Ongkir: </strong></td>
									<td>   <?php 
                                $this->load->helper('penjual');
                                $ongkir = getOngkir($kota_asal,$kota_tujuan,'1000','jne');
                                $ongkir_value = $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
                                echo $ongkir['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
                            ?> </td>
								</tr>

								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td><?php echo $total+$ongkir_value;?></td>
								</tr>
							</tbody>
						</table>
							<div class="cart-buttons">
							<a id="pay-button" class="boxed-btn black">Check Out</a>
						
						<script type="text/javascript">
                    $('#pay-button').click(function (event) {
                      event.preventDefault();
                      $(this).attr("disabled", "disabled");
                  
                  $.ajax({
                      url: '<?=site_url()?>/payment/proses_tran',
                      cache: false,

                      success: function(data) {
                        //location = data;

                        console.log('token = '+data);
                        
                        var resultType = document.getElementById('result-type');
                        var resultData = document.getElementById('result-data');

                        function changeResult(type,data){
                          $("#result-type").val(type);
                          $("#result-data").val(JSON.stringify(data));
                          //resultType.innerHTML = type;
                          //resultData.innerHTML = JSON.stringify(data);
                        }

                        snap.pay(data, {
                          
                          onSuccess: function(result){
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                          },
                          onPending: function(result){
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                          },
                          onError: function(result){
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                          }
                        });
                      }
                    });
                });

                  </script>

							

<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js" 
data-client-key="SB-Mid-client-l132-U8I07f3_lBP"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
	


    $(document).ready(function() {
        $('input[type="number"]').on('change', function() {
            var rowid = $(this).attr('id').split('_')[1];
            var newQuantity = $(this).val();


            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Cart/update_cart'); ?>",
                data: {rowid: rowid, qty: newQuantity},
                success: function(response) {
                    
                    location.reload(); 
                }
            });
        });
    });


</script>


						</div>

					</div>

					

					<!--<div class="coupon-section">
						<h3>Gunakan Kupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Kode Kupon"></p>
								<p><input type="submit" value="Gunakan"></p>
							</form>
						</div>
					</div>-->
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->