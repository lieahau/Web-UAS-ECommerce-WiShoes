<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	
</head>

<body id="page-top">


	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<ol class="breadcrumb">
		          <li class="breadcrumb-item">
		            <a href="<?php echo site_url('/admin/item/') ?>">Item</a>
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
						<a href="<?php echo site_url('admin/item/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/item/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label>Nama*</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								 type="text" name="nama" placeholder="Name" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
							<div class="form-group">
								<label for="merk">Brand*</label>
								 <select class="form-control <?php echo form_error('merk') ? 'is-invalid':'' ?>" name="merk" >
									<option value="" disabled selected>Choose your option</option>
									<option value="Adidas">Adidas</option>
									<option value="Nike">Nike</option>
									<option value="Skechers">Skechers</option>
									<option value="Vans">Vans</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('merk') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jenis">Type*</label>
								<select class="form-control <?php echo form_error('jenis') ? 'is-invalid':'' ?>" name="jenis" >
									<option value="" disabled selected>Choose your option</option>
									<option value="FlatShoes">Flat Shoes</option>
									<option value="RunningShoes">Running Shoes</option>
									<option value="SportShoes">Sport Shoes</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('jenis') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="ukuran">Size*</label>
								<input class="form-control <?php echo form_error('ukuran') ? 'is-invalid':'' ?>"
								 type="number" min="25" max="45" name="ukuran" placeholder="Size"/>
								<div class="invalid-feedback">
									<?php echo form_error('ukuran') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="stok">Stock*</label>
								<input class="form-control <?php echo form_error('stok') ? 'is-invalid':'' ?>"
								 type="number" name="stok" placeholder="Stock"/>
								<div class="invalid-feedback">
									<?php echo form_error('stok') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga_satuan">Price*</label>
								<input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
								 type="number" name="harga_satuan" placeholder="Price"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga_satuan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="iamge">Image</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>


							<input class="btn btn-success" type="submit" name="btn" value="Save" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>