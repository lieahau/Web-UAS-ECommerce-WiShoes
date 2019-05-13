<!DOCTYPE html>
<html>
<?php echo $head ?>
<head>
	<title></title>
</head>
<body id="page-top" onload="setData()">
	<?php echo $navbar ?>
	<div id="wrapper">
		<?php echo $sidebar; ?>
	    <div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb">
		          <li class="breadcrumb-item">
		            <a href="<?php echo site_url('/transaction') ?>">Transaction</a>
		          </li>
		          
		          <li class="breadcrumb-item active">Edit</li>
		        </ol>

				<div class="card mb-3">

					<div class="card-header">
						<a href="<?php echo site_url('/transaction/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<h3>Edit Transaksi Pembelian</h3>
						<form action="<?php echo site_url('/transaction/runedit') ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo $pembelian->id ?>">
						 <div class="form-group">
					        <label>Nama Supplier</label>
					        <select id="Nama_supplier" name="Nama_supplier" onchange="setData()" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>">
					        	
					        	<?php

					        		foreach ($supplier as $value) {
					        			if($value->id==$pembelian->id_supplier){
					        	?>
					        	<option value="<?php echo $value->nama ?>" alamat="<?php echo $value->alamat ?>" no_telp="<?php echo $value->no_telp ?>" id_supplier="<?php echo $value->id ?>" id="opsi" selected><?php echo $value->nama ?></option>

					        	<?php continue;} ?>

					        	<option value="<?php echo $value->nama ?>" alamat="<?php echo $value->alamat ?>" no_telp="<?php echo $value->no_telp ?>" id_supplier="<?php echo $value->id ?>" id="opsi"><?php echo $value->nama ?></option>
					        <?php } ?>
					        </select>
					        <div class="invalid-feedback">
									<?php echo form_error('Nama_supplier') ?>
							</div>
				        </div>
				        <input type="hidden" name="id_supplier" id="id_supplier">
				        <div class="form-group">
				        	<label>Alamat</label>
				        	<input type="text" id="alamat" class="form-control" readonly>
				        </div>
				        <div class="form-group">
				        	<label>No Telp</label>
				        	<input type="text" id="no_telp" class="form-control" readonly>
				        </div>
				        <div class="form-group">
				        	<label>Date</label>
				        	<input type="text" id="date" name="date" value="<?php echo $pembelian->timestamp ?>" class="form-control" readonly>
				        </div>
				        <div class="form-group">
				        	<label>Grand total</label>
				        	<input type="text" id="grandtotal" name="grandtotal" value="<?php echo $pembelian->total_harga ?>" class="form-control" readonly>
				        </div>
				        <input type="submit" name="" class="btn btn-warning" value="edit">
				    </form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		echo $modal;
		echo $scrolltop;
		
		echo $js;

	?>
	<script type="text/javascript">
		function setData(){
			let select = document.getElementById("Nama_supplier");
			let index = select.selectedIndex;
			let opsi = select.children[index];
			document.getElementById('id_supplier').value = opsi.getAttribute("id_supplier");
			document.getElementById('alamat').value = opsi.getAttribute("alamat");
			document.getElementById('no_telp').value = opsi.getAttribute("no_telp");
		}
	</script>
</body>
</html>