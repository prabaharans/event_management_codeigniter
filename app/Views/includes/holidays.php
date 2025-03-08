<?= $this->section('pageStyles') ?>
<link rel="stylesheet" href="<?= base_url(relativePath: 'datatables/dataTables.bootstrap4.min.css') ?>">

<?= $this->endSection() ?>

<div class="card">
  <div class="card-header with-border">
    <h3 class="card-title"><?= lang('EventManagement.holiday_list') ?></h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="table" class="table table-bordered text-nowrap text-small">
    <thead>
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Reason</th>
        <th>Action</th>
      </tr>
    </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<?= $this->section('pageScripts') ?>
<script src="<?= base_url('datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('datatables/dataTables.bootstrap4.min.js') ?>"></script>
<script language="javascript">
function deleteHoliday(hid) {
	if(confirm('Deleting holiday will allows user to book that date.\n\nAre you sure you want to proceed ?')) {
		window.location.href = '<?php //echo WEB_ROOT; ?>api/process.php?cmd=hdelete&hId='+hid;
	}
}

document.addEventListener("DOMContentLoaded", (event) => {

    $(document).ready(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            // ajax:"<?= base_url('holidays/ajaxHolidaysDataTables') ?>",
            ajax: {
                dataSrc: 'data',
                // cache:false,
                url: "<?= base_url('holidays/ajaxHolidaysDataTables') ?>",
                type: "POST",
                // headers: { Authorization: 'Bearer <?= $token ?>' },
                // error: function(err) {
                //     switch (err.status) {
                //     case "400":
                //         // bad request
                //         break;
                //     case "401":
                //         // unauthorized
                //         break;
                //     case "403":
                //         // forbidden
                //         break;
                //     default:
                //         //Something bad happened
                //         break;
                //     }
                // },
                // before: function(obj) {
                //     // clearValues();
                // },
                // success: function(data) {

                // }
            }
        });
    });
});

</script>
<?= $this->endSection() ?>
