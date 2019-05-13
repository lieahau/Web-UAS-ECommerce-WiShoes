<!DOCTYPE html>
<html>
<?php echo $head ?>
<head>
	<title></title>
</head>
<body id="page-top">
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
		            <a href="#">Details</a>
		          </li>
		          <li class="breadcrumb-item active">Home</li>
		        </ol>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('/transaction/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">
						<h3>Detail Pembelian</h3>
						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>Nama Barang</th>
										<th>Merk</th>
										<th>Ukuran</th>
										<th>Jumlah</th>
										<th>Harga</th>
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
											<?php echo $eq->Nama ?>
										</td>
										<td>
											<?php echo $eq->merk ?>
										</td>
										<td>
											<?php echo $eq->ukuran ?>
										</td>
										<td>
											<?php echo $eq->jumlah ?>
										</td>
										<td>
											<?php echo $eq->harga ?>
										</td>
										<td width="250">
								
									        <a href="<?php echo site_url('transaction/edit_details/'.$eq->id.'/'.$id_pembelian) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('transaction/del_details/'.$eq->id.'/'.$id_pembelian) ?>')"
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