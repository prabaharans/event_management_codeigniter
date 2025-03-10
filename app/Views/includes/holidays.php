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

function holidayEdit(id) {
  $.ajax({
    url: '<?= base_url('holiday/ajaxGet/'); ?>'+id,
    type: 'GET',
    dataType:"json",
    beforeSend:function(){
        $('#addHoliday').text('<?= lang('EventManagement.update_holiday') ?>');
        $('#addHoliday').attr('disabled', true);
    },
    success: function(response){
        console.log(response);
        $('#addHoliday').attr('disabled', false);
        $('#hdate').focus();
        $('#hdate').val(moment(response.hdate).format('YYYY-MM-DD'));
        $('#reason').val(response.reason);
        $('#id').val(response.id);
    }
  });
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
            },
            order: [],
            columns: [
                {data: 'no', orderable: false},
                {data: 'hdate'},
                {data: 'reason'},
                {data: 'action', orderable: false},
            ]
        });
    });


});

</script>
<?= $this->endSection() ?>
