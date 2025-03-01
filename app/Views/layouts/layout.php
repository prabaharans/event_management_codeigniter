<!DOCTYPE html>
<html>
<head>
<?= $this->include(config('Auth')->views['header']) ?>
</head>
<body class="sidebar-mini layout-boxed">
<div class="wrapper">
  <header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-expand navbar-white navbar-light" role="navigation">
      <?= $this->include(config('Auth')->views['nav']) ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="brand-link logo-switch">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="brand-text font-weight-light"><b>Event Management</b></span> </a>
   <?= $this->include(config('Auth')->views['sidebar']) ?>
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Event Management <h6 class="text-muted blockquote-footer">manage your events easily.</h6> </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#" title="Home"><i class="fa fa-dashboard"></i></a></li>
            <li class="breadcrumb-item active">Calendar</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <?= $this->include(config('Auth')->views['messages']) ?>
          </div>
        </div>

        <div class="row">
          <?= $this->renderSection('content') ?>
        </div>
        <!-- /.row -->
       </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
        <?= $this->include(config('Auth')->views['footer']) ?>
	</footer>
</div>
<!-- ./wrapper -->
</body>
</html>