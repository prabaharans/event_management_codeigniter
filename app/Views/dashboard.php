<?= $this->extend(config('Auth')->views['logged_layout']) ?>

<?= $this->section('title') ?><?= lang('EventManagement.dashboard') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="col-md-8">
  <?= $this->include(config('Auth')->views['calendar']) ?>
</div>
<!-- /.col -->
<div class="col-md-4">
<?php
if(auth()->user()->inGroup('admin') ||  auth()->user()->inGroup('teacher')) {
    echo $this->include(config('Auth')->views['event_form'], [$users, $token]);
} else {
	echo "&nbsp;";
}
?>
</div>
<!-- /.col -->
<?= $this->endSection() ?>

