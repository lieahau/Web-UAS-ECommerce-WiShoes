<ul class="sidebar navbar-nav">
	      <li class="nav-item dropdown"> 
	        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-fw fa-chart-area"></i>
	          <span>Report</span></a>
	          <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="pagesDropdown1">
	            <h6 class="dropdown-header">Master Tables:</h6>
	            <a class="dropdown-item" href="<?php echo base_url('/index.php/report/') ?>">Procurement</a>
	            <a class="dropdown-item" href="<?php echo base_url('/index.php/report/fullfillment') ?>">Fullfillment</a>
	        </div>
	      </li>
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          <i class="fas fa-fw fa-table"></i>
	          <span>Master Tables</span>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="pagesDropdown">
	          <h6 class="dropdown-header">Master Tables:</h6>
	          <a class="dropdown-item" href="<?php echo base_url('/index.php/admin/supplier/') ?>">Supplier</a>
	          <a class="dropdown-item" href="<?php echo base_url('/index.php/admin/item/') ?>">Item</a>
	          <a class="dropdown-item" href="<?php echo base_url('/index.php/admin/user/') ?>">User</a>
	        </div>
	      </li>
	      
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url('/index.php/transaction/') ?>">
	          <i class="fas fa-money-bill-wave"></i>
	          <span>Transaction</span></a>
	      </li>
	    </ul>