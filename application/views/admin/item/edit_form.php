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
		          
		          <li class="breadcrumb-item active">Edit</li>
		        </ol> 

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/item/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/item/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $item->id?>" />
							<input type="hidden" name="merk" value="<?php echo $item->merk?>" />
							<input type="hidden" name="jenis" value="<?php echo $item->jenis?>" />
							

							<div class="form-group">
								<label for="merkdummy">Brand*</label>
								<input class="form-control"
								 type="text" name="merkdummy"  value="<?php echo $item->merk ?>"  disabled/>
							</div>

							<div class="form-group">
								<label for="jenisdummy">Type*</label>
								<input class="form-control "
								 type="text" name="jenisdummy"  value="<?php echo $item->jenis ?>"  disabled/>
							</div>

							<div class="form-group">
								<label for="ukuran">Size*</label>
								<input class="form-control <?php echo form_error('ukuran') ? 'is-invalid':'' ?>"
								 type="number" min="25" max="45" name="ukuran" placeholder="Size" value="<?php echo $item->ukuran ?>"  />
								<div class="invalid-feedback">
									<?php echo form_error('ukuran') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="stok">Stock</label>
								<input class="form-control <?php echo form_error('Stock') ? 'is-invalid':'' ?>"
								 type="number" name="stok" placeholder="Address" value="<?php echo $item->stok ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('stok') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="harga_satuan">Price*</label>
								<input class="form-control <?php echo form_error('harga_satuan') ? 'is-invalid':'' ?>"
								 type ="number" name="harga_satuan" placeholder="Price" value="<?php echo $item->harga_satuan ?>"/>
								<div class="invalid-feedback">
									<?php echo form_error('harga_satuan') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="image">Image</label>
								<input class="form-control-file <?php echo form_error('image') ? 'is-invalid':'' ?>"
								 type="file" name="image" />
								<input type="hidden" name="old_image" value="<?php echo $item->image ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('image') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Edit" />
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