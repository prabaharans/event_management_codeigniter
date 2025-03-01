<?= $this->extend(config('Auth')->views['logged_layout']) ?>

<?= $this->section('title') ?><?= lang('EventManagement.dashboard') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="col-md-8">
  <?= $this->include(config('Auth')->views['calendar']) ?>
</div>
<!-- /.col -->
<div class="col-md-4">
<?php
// $type = $_SESSION['calendar_fd_user']['type'];
// if($type == 'admin' || $type == 'teacher') {
    echo $this->include(config('Auth')->views['event_form']);
// }
// else {
// 	echo "&nbsp;";
// }
?>
</div>
<!-- /.col -->
<?= $this->endSection() ?>

