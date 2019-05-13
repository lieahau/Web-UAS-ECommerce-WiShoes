<!DOCTYPE html>
<html>
<?php echo $head ?>
<head>
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
		            <a href="#">Fullfilment Report</a>
		          </li>
		          
		          <li class="breadcrumb-item active">Home</li>
		        </ol>

				<div class="card mb-3">
					<div class="card-header">
						<h3>Fullfilment Report</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
							<label>Month</label>
							<select class="form-control col-md-3" id="month">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
						</div>
						<input type="button" name="" class="btn btn-info" value="Show" id="show">
						
					</div>
				</div>
				<div>
				<canvas id="myChart" style="width: 50%;height: 50%;"></canvas>
				</div>
			</div>
		</div>
	</div>
	<?php 
		echo $modal;
		echo $scrolltop;
		
		echo $js;

	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#show').click(function(){
				let opsi="";
				opsi = document.getElementById('month').value;
				let ctx = document.getElementById('myChart').getContext('2d');
				let url = "<?php echo site_url('/report/requestFull/') ?>"+opsi;
				
				  $.ajax({url: url, success: function(result){
				  	let label =[];
				  	let data = [];
				  	for(let i=0;i<result.length;i++){
				  		label.push(result[i].timestamp);
				  		data.push(result[i].total);
				  	}
				  	 
				      var myChart = new Chart(ctx,{
						   // The type of chart we want to create
						    type: 'line',

						    // The data for our dataset
						    data: {
						        labels: label,
						        datasets: [{
						            label: 'Data Penjualan',
						           
						            data: data
						        }]
						    },

						    // Configuration options go here
						    options: {}
						    
						})
				   }});
			    
			})
		});
	</script>
</body>

</html