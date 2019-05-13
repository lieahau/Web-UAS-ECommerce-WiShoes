<!DOCTYPE html>
<html>
<head>
	<?php echo $head ?>
	<title></title>
</head>
<body id="page-top">
	<?php echo $navbar ?>
	<div id="wrapper">
		<?php echo $sidebar ?>
	    <div id="content-wrapper">
			<div class="container-fluid">
				<ol class="breadcrumb">
		          <li class="breadcrumb-item">
		            <a href="#">Transaction</a>
		          </li>
		          
		          <li class="breadcrumb-item active">Home</li>
		        </ol>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('transaction/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID pembelian</th>
										<th>Nama Supplier</th>
										<th>Alamat</th>
										<th>No Telp</th>
										<th>Date</th>
										<th>Diskon</th>
										<th>Pajak</th>
										<th>Total Harga</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									
									<?php foreach ($item as $eq): ?>
									<tr>
										<td width="150">
											<?php echo $eq->id ?>
										</td>
										<td>
											<?php echo $eq->nama ?>
										</td>
										<td>
											<?php echo $eq->alamat ?>
										</td>
										<td>
											<?php echo $eq->no_telp ?>
										</td>
										<td>
											<?php echo $eq->timestamp ?>
										</td>
										<td>
											<?php echo $eq->diskon.'%' ?>
										</td>
										<td>
											<?php echo $eq->pajak.'%' ?>
										</td>
										<td>
											<?php echo $eq->total_harga ?>
										</td>
										<td width="250">
											<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		         							 		<i class="fas fa-user-edit"></i>
		          									<span>Action</span>
		        							</a>
											<div class="dropdown-menu" aria-labelledby="pagesDropdown">
									          
									        <a href="<?php echo site_url('transaction/edit/'.$eq->id) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('transaction/del_pembelian/'.$eq->id) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
											 <a href="<?php echo site_url('transaction/details/'.$eq->id) ?>" class="btn btn-small text-info"><i class="fas fa-info"></i> Details</a>
									        </div>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
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
		function deleteConfirm(url){
			$('#btn-delete').attr('href', url);
			$('#deleteModal').modal();
		}
	</script>
</body>
</html>