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
		          
		          <li class="breadcrumb-item active">Add</li>
		        </ol>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/user/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="username">UserName*</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="UserName" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="email">Email*</label>
								<input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>"
								 type="email" name="email" placeholder="Email" />
								<div class="invalid-feedback">
									<?php echo form_error('email') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="password">Password*</label>
								<input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>"
								 type="password" name="password" />
								<div class="invalid-feedback">
									<?php echo form_error('password') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="status">Status*</label>
								<select class="form-control <?php echo form_error('status') ? 'is-invalid':'' ?>" name="status" >
									<option value="" disabled selected>Choose your option</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option>
								</select>
								<div class="invalid-feedback">
									<?php echo form_error('status') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="first_name">FirstName*</label>
								<input class="form-control <?php echo form_error('first_name') ? 'is-invalid':'' ?>"
								 type="text" name="first_name" placeholder="FirstName" />
								<div class="invalid-feedback">
									<?php echo form_error('first_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="last_name">LastName</label>
								<input class="form-control <?php echo form_error('last_name') ? 'is-invalid':'' ?>"
								 type="text" name="last_name" placeholder="LastName" />
								<div class="invalid-feedback">
									<?php echo form_error('last_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Address*</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Address" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>
							
							<div class="form-group">
								<label for="no_telp">Phone*</label>
								<input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>"
								 type="text" name="no_telp" placeholder="Phone No"/>
								<div class="invalid-feedback">
									<?php echo form_error('no_telp') ?>
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