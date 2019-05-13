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
		            <a href="<?php echo site_url('/admin/user/') ?>">User</a>
		          </li>
		          
		          <li class="breadcrumb-item active">Home</li>
		        </ol>


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>UserName</th>
										<th>Email</th>
										<th>Status</th>
										<th>FirstName</th>
										<th>LastName</th>
										<th>Addresss</th>
										<th>Phone</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $usr): ?>
									<tr>
										<td width="150">
											<?php echo $usr->username ?>
										</td>
										<td>
											<?php echo $usr->email ?>
										</td>
										<td>
											<?php echo $usr->status ?>
										</td>
										<td>
											<?php echo $usr->first_name ?>
										</td>
										<td>
											<?php echo $usr->last_name ?>
										</td>
										<td>
											<?php echo $usr->alamat ?>
										</td>
										<td>
											<?php echo $usr->no_telp ?>
										</td>
										<td width="250">
											<a href="<?php echo site_url('admin/user/edit/'.$usr->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/user/delete/'.$usr->id) ?>')"
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