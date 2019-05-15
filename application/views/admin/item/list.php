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
		          
		          <li class="breadcrumb-item active">Home</li>
		        </ol> 


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/item/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Name</th>
										<th>Brand</th>
										<th>Type</th>
										<th>Size</th>
										<th>Stock</th>
										<th>Price</th>
										<th>Image</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($item as $eq): ?>
									<tr>
										<td>
											<?php echo $eq->Nama ?>
										</td>
										<td width="150">
											<?php echo $eq->merk ?>
										</td>
										<td>
											<?php echo $eq->jenis ?>
										</td>
										<td>
											<?php echo $eq->ukuran ?>
										</td>
										<td>
											<?php echo $eq->stok ?>
										</td>
										<td>
											<?php echo $eq->harga_satuan ?>
										</td>
										<td>
											<img src="<?php echo base_url('assets/database/shoes/'.$eq->merk.'/'.$eq->image) ?>" width="64" />
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/item/edit/'.$eq->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/item/delete/'.$eq->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?> 

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>