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

						<a href="<?php echo site_url('admin/user/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/user/edit') ?>" method="post" enctype="multipart/form-data">

							<input type="hidden" name="id" value="<?php echo $user->id?>" />
							<input type="hidden" name="email" value="<?php echo $user->email?>" />
							<input type="hidden" name="status" value="<?php echo $user->status?>" />
							<input type="hidden" name="password" value="<?php echo $user->password?>" />

							<div class="form-group">
								<label for="emaildummy">Email</label>
								<input class="form-control"
								 type="email" name="emaildummy"  value="<?php echo $user->email ?>" disabled/>
							</div>

							<div class="form-group">
								<label for="statusdummy">Status</label>
								<input class="form-control"
								 type="text" name="statusdummy"  value="<?php echo $user->status ?>" disabled/>
							</div>

							<div class="form-group">
								<label for="username">UserName*</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="username" placeholder="UserName" value="<?php echo $user->username ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('username') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="first_name">FirstName*</label>
								<input class="form-control <?php echo form_error('fist_name') ? 'is-invalid':'' ?>"
								 type="text" name="first_name" placeholder="FirstName" value="<?php echo $user->first_name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('fist_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="last_name">LastName*</label>
								<input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>"
								 type="text" name="last_name" placeholder="LastName" value="<?php echo $user->last_name ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('last_name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="alamat">Address</label>
								<input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>"
								 type="text" name="alamat" placeholder="Address" value="<?php echo $user->alamat ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('alamat') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="no_telp">Phone*</label>
								<input class="form-control <?php echo form_error('no_telp') ? 'is-invalid':'' ?>"
								 name="no_telp" placeholder="Phone No" value="<?php echo $user->no_telp ?>"/>
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