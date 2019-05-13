<!DOCTYPE html>
<html>
<?php echo $head;?>
<head>
	<title></title>
</head>
<body id="page-top" onload="setItem()">
	<?php echo $navbar ?>
	<div id="wrapper">
		<?php echo $sidebar; ?>
	    <div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb">
		          <li class="breadcrumb-item">
		            <a href="<?php echo site_url('/transaction') ?>">Transaction</a>
		          </li>
		           <li class="breadcrumb-item">
		            <a href="<?php echo site_url('/transaction/details/'.$id_pembelian) ?>">Details</a>
		          </li>
		          <li class="breadcrumb-item active">Home</li>
		        </ol>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('/transaction/details/'.$id_pembelian) ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<form action="<?php echo site_url('/transaction/edit_details/'.$id.'/'.$id_pembelian) ?>" method="post" enctype="multipart/form-data">
				        <h3>Edit Pembelian Barang</h3>
				        <div class="form-group">
				        	<select id="selectItem" onchange="setItem()" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" name="nama">
				        		
				        		<?php
					        		foreach ($sepatu as $value) {
					        			
					        			if($value->id == $detail_item->id_sepatu){
											
					        	?>
					        	<option value="<?php echo $value->Nama ?>" id_sepatu="<?php echo $value->id ?>" jenis="<?php echo $value->jenis ?>" harga_satuan="<?php echo $value->harga_satuan ?>" selected><?php echo $value->Nama.' "'.$value->ukuran ?></option>
					        	<?php }else{ ?>
					        	<option value="<?php echo $value->Nama ?>" id_sepatu="<?php echo $value->id ?>" jenis="<?php echo $value->jenis ?>" harga_satuan="<?php echo $value->harga_satuan ?>"><?php echo $value->Nama.' "'.$value->ukuran ?></option>
					        <?php }} ?>
				        	</select>
				        	<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
							</div>
				        </div>
				        <input type="hidden" name="id" id="id">
				        <div class="form-group">
				        	<label>Jenis</label>
				        	<input type="text" id="jenis" class="form-control" readonly>
				        </div>
				        <div class="form-group">
				        	<label>Harga Satuan</label>
				        	<input type="text" id="harga_satuan" class="form-control" readonly>
				        </div>
				        <div class="form-group">
				        	<label>Jumlah</label>
				        	<input type="number" id="jumlah" name="jumlah" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" onchange="total()" value="<?php echo $detail_item->jumlah ?>">
				        	<div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
							</div>
				        </div>
				         <div class="form-group">
				        	<label>Subtotal</label>
				        	<input type="text" id="subtotal" class="form-control <?php echo form_error('subtotal') ? 'is-invalid':'' ?>" readonly="" name="subtotal" value="<?php echo $detail_item->harga ?>">
				        	<div class="invalid-feedback">
								<?php echo form_error('subtotal') ?>
							</div>
				        </div>
				        <input type="submit" name="" class="btn btn-info" value="Edit">
			        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		echo $scrolltop;	
		echo $js;

	?>
	<script type="text/javascript">
		function setItem(){
			let select = document.getElementById("selectItem");
			let index = select.selectedIndex;
			let opsi = select.children[index];
			document.getElementById('jenis').value = opsi.getAttribute("jenis");
			document.getElementById('harga_satuan').value = opsi.getAttribute("harga_satuan");
			document.getElementById('id').value = opsi.getAttribute("id_sepatu");
		}
		function total(){
			let harga = document.getElementById('harga_satuan').value;
			let jlh = document.getElementById('jumlah').value;
			document.getElementById('subtotal').value=harga*jlh;
		}
	</script>
</body>
</html>