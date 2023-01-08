<!DOCTYPE html>
<html>
<head>
	<title>TS - Assessment</title>
	<link href="<?php echo base_url('asset/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('asset/fontawesome/fontawesome.css') ?>" rel="stylesheet">
	
	<script  src="<?php echo base_url('asset/bootstrap/js/bootstrap.min.js')  ?>"></script>
	<script  src="<?php echo base_url('asset/fontawesome/fontawesome.js')  ?>"></script>
	<script  src="<?php echo base_url('asset/jquery.js')  ?>"></script>
</head>
<body class="">

	
	<div aria-live="polite" aria-atomic="true" class="position-relative" style="z-index: 1">
 
	  <div class="toast-container position-absolute top-0 end-0 p-3">

		<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" >
		  <div class="toast-header">
		    
		    <strong class="me-auto"> <?php  print_r($this->session->flashdata('header'));   ?></strong>

		    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
		  </div>
		  <div class="toast-body" style="background-color: white">
		    <?php echo $this->session->flashdata('message') ?>
		  </div>
		</div>

		</div>
	</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
	<div class="container-fluid" style="text-align: right; float: right !important; z-index: 999">
	 	
    	
	</div>
  	
  	<div class="dropdown">
	  <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
	    Administrator
	  </button>
	  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
	    <li><a class="dropdown-item" href="<?php echo base_url('welcome/logout') ?>"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
	    
	  </ul>
	</div>
</nav>
