<?php
$currentUserDetails = getCurrentUserDetails();
$details = $currentUserDetails['details'];
$name = $details['firstname'].' '.$details['middlename'].' '.$details['lastname'];
?>
<!-- Navbar -->
  	<!-- Left navbar links -->
  	<ul class="navbar-nav">
	  	<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>
  	<ul class="navbar-nav ml-auto">

		<li class="nav-item d-none d-sm-inline-block">
			<a class="nav-link">
			<span class="hidden-xs"></i>Welcome, <?php echo strtoupper($name); ?></span>
			</a>
		</li>
		<li class="nav-item d-none d-sm-inline-block">
		<a class="nav-link" href="<?= base_url('logout') ?>" title="Log Out">
		<i class="nav-icon fas fa-sign-out col-2" aria-hidden="true"></i>
		<span class="hidden-xs">Log Out</span>
		</a>
		</li>
	</ul>
<!-- /.navbar -->