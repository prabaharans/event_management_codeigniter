<?php
extract($details);

// if($status == "active") {$stat = 'success';}
// 	else if($status == "lock") {$stat = 'warning';}
// 	else if($status == "inactive") {$stat = 'warning';}
// 	else if($status == "delete") {$stat = 'danger';}

?>
<?= $this->extend(config('Auth')->views['logged_layout']) ?>

<?= $this->section('title') ?><?= lang('EventManagement.userInfo') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="col-md-9">
  <div class="card card-solid">
    <div class="card-header with-border"> <i class="fa fa-text-width col-1"></i>
      <h3 class="card-title">User Details</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <dl class="dl-horizontal">
        <dt>Name</dt>
        <dd><?php echo $firstname.' '.$middlename.' '.$lastname; ?></dd>

		<dt>Address</dt>
        <dd><?php echo $address1.' '.$address2; ?></dd>

		<dt>Email</dt>
        <dd><?php echo $email; ?></dd>

		<dt>Mobile</dt>
        <dd><?php echo $mobile; ?></dd>

        <dt>previousLogin</dt>
        <dd><?php echo $previousLogin->date->humanize(); ?></dd>

        <dt>lastLogin</dt>
        <dd><?php echo $lastLogin->date->humanize(); ?></dd>

		<dt>User Status</dt>
        <!-- <dd><span class="badge badge-<?php //echo $stat; ?>"><?php //echo ucfirst($status); ?></span></dd> -->

      </dl>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<?= $this->endSection() ?>
