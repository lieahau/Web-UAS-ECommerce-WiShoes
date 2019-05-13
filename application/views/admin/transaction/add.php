<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php echo $head ?>

</head>
<body id="page-top">
	<?php echo $navbar ?>
	<div id="wrapper">
		<?php echo $sidebar ?>
	    <div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb">
		          <li class="breadcrumb-item">
		            <a href="<?php echo site_url('/transaction') ?>">Transaction</a>
		          </li>
		          
		          <li class="breadcrumb-item active">Add</li>
		        </ol>
		        <?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>
		        <div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('/transaction') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
			        
			        <form action="<?php echo site_url('/transaction/addItem') ?>" method="post" enctype="multipart/form-data">
				        <h3>Barang</h3>
				        <div class="form-group">
				        	<select id="selectItem" onchange="setItem()" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" name="nama">
				        		<option disabled selected>-Select-</option>
				        		<?php
					        		foreach ($sepatu as $value) {
					        	?>
					        	<option value="<?php echo $value->Nama ?>" id_sepatu="<?php echo $value->id ?>" jenis="<?php echo $value->jenis ?>" harga_satuan="<?php echo $value->harga_satuan ?>"><?php echo $value->Nama.' "'.$value->ukuran ?></option>
					        <?php } ?>
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
				        	<input type="number" id="jumlah" name="jumlah" class="form-control <?php echo form_error('jumlah') ? 'is-invalid':'' ?>" onchange="total()">
				        	<div class="invalid-feedback">
									<?php echo form_error('jumlah') ?>
							</div>
				        </div>
				         <div class="form-group">
				        	<label>Subtotal</label>
				        	<input type="text" id="subtotal" class="form-control <?php echo form_error('subtotal') ? 'is-invalid':'' ?>" readonly="" name="subtotal">
				        	<div class="invalid-feedback">
								<?php echo form_error('subtotal') ?>
							</div>
				        </div>
				        <input type="submit" name="" class="btn btn-info">
			        </form>
			        <hr class="m-4">
			        <div class="table-responsive">
						<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
							<tr>
								
								<td>Nama Barang</td>
								<td>Jenis</td>
								<td>Jumlah</td>
								<td>Harga</td>
								<td>Action</td>
							</tr>
							<?php
								foreach ($temp_pembelian as $value) {
								
							?>
							<tr>
								
								<td><?php echo $value->Nama ?></td>
								<td><?php echo $value->jenis ?></td>
								<td><?php echo $value->jumlah ?></td>
								<td><?php echo $value->harga ?></td>
								<td>
								
								<a onclick="deleteConfirm('<?php echo base_url('index.php/transaction/delete/'.$value->id_sepatu) ?>')" href="#!" class="btn btn-small text-danger">
									<i class="fas fa-trash"></i> Hapus
								</a>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<hr class="m-4">
					<form action="<?php echo site_url('/transaction/addTransaction/'.$num) ?>" method="post" enctype="multipart/form-data">
						<h3>Supplier</h3>
				        <div class="form-group">
					        <label>Nama Supplier</label>
					        <select id="Nama_supplier" name="Nama_supplier" onchange="setSupplier()" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>">
					        	<option readonly selected>-Select-</option>
					        	<?php
					        		foreach ($supplier as $value) {
					        	?>
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
				        <hr class="m-4">
				        <div class="form-group">
				        	<label>Total :</label>
				        	<input type="text" id="total" value="<?php echo $total ?>" class="form-control col-md-3" readonly>
				        	<label>Pajak : </label>
				        	<input type="text" id="pajak" name="pajak" class="form-control col-md-3" placeholder="Pajak(%)" onchange="Grandtotal()">
				        	<label>Diskon : </label>
				        	<input type="text" id="diskon" name="diskon" class="form-control col-md-3" placeholder="Diskon(%)" onchange="Grandtotal()">
				        	<label>Grandtotal : </label>
				        	<input type="text" id="grandtotal" name="grandtotal" class="form-control col-md-3" value="<?php echo $total ?>" readonly>

				        </div>
				        <input type="submit" class="btn btn-info" value="Input">
			        </form>
			    </div>
		    </div>
		</div>
		<?php $this->load->view("admin/_partials/footer.php") ?> 
	</div>
	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?> 
	<script type="text/javascript">
		function setSupplier(){
			let select = document.getElementById("Nama_supplier");
			let index = select.selectedIndex;
			let opsi = select.children[index];
			document.getElementById('id_supplier').value = opsi.getAttribute("id_supplier");
			document.getElementById('alamat').value = opsi.getAttribute("alamat");
			document.getElementById('no_telp').value = opsi.getAttribute("no_telp");
		}
		function setItem(){
			let select = document.getElementById("selectItem");
			let index = select.selectedIndex;
			let opsi = select.children[index];
			document.getElementById('jenis').value = opsi.getAttribute("jenis");
			document.getElementById('harga_satuan').value = opsi.getAttribute("harga_satuan");
			document.getElementById('id').value = opsi.getAttribute("id_sepatu");
		}
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
		function total(){
			let harga = document.getElementById('harga_satuan').value;
			let jlh = document.getElementById('jumlah').value;
			document.getElementById('subtotal').value=harga*jlh;
		}
		function Grandtotal(){
			let total = document.getElementById('total').value;
			let diskon = document.getElementById('diskon').value;
			let pajak = document.getElementById('pajak').value;
			document.getElementById('grandtotal').value=total-(diskon/100*total)+(pajak/100*total);
		}
	</script>
</body>
</html>