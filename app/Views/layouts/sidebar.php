<!-- sidebar: style can be found in sidebar.less -->
<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="<?= base_url('calendar') ?>" class="nav-link"><i class="nav-icon fas fa-calendar"></i><p>Events Calendar</p></a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('booking') ?>" class="nav-link"><i class="nav-icon fas fa-calendar-days"></i><p>Event Booking</p></a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('users') ?>" class="nav-link"><i class="nav-icon fas fa-users"></i><p>User Details</p></a>
				</li>
				<?php
				if(auth()->user()->inGroup('admin')) {
					?>
					<li class="nav-item">
						<a href="<?= base_url('holidays') ?>" class="nav-link"><i class="nav-icon fas fa-plane"></i><p>Holidays</p></a>
					</li>
				<?php
				}
				?>
			</ul>
		</nav>
	</div>
  <!-- /.sidebar -->