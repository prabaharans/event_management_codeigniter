<?= $this->extend(config('Auth')->views['logged_layout']) ?>

<?= $this->section('title') ?><?= lang('EventManagement.holidays') ?> <?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="col-md-8">
  <?= $this->include(config('Auth')->views['holidays']) ?>
</div>
<!-- /.col -->
<div class="col-md-4">
<?php
if(auth()->user()->inGroup('admin') ||  auth()->user()->inGroup('teacher')) {
    echo $this->include(config('Auth')->views['holiday_form'], [$token]);
} else {
	echo "&nbsp;";
}
?>
</div>
<!-- /.col -->
<?= $this->endSection() ?>

