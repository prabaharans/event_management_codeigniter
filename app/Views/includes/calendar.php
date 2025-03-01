
<div class="card card-primary">
  <div class="card-body p-0">
    <!-- THE CALENDAR -->
    <div id="calendar"></div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /. box -->
<style>
.fc-disabled {
    background-color: #F0F0F0 !important;
    color: #000;
    cursor: default;
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size:10px;
}
.fc .fc-col-header-cell-cushion, .fc-daygrid-day-number, .fc-list-day-text, .fc-list-day-side-text {
	color:#1A252F !important;
}
.fc .fc-toolbar-title {
    font-size: 1.15em;
}
</style>
<script language="javascript">
$(function () {
	var calendarEl = document.getElementById('calendar');

	// $('#calendar').fullCalendar({
	var calendar = new FullCalendar.Calendar(calendarEl, {

		//timeFormat: 'H(:mm)t',
		headerToolbar: {
        	left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
		},
        buttonText: {
            today: 'Today',
            month: 'Month',
            week: 'Week',
            day: 'Day',
            listMonth: 'List',
        },
		//hiddenDays: [ 2, 4 ],
        events: function(info, successCallback, failureCallback) {
			var start = info.start.valueOf();
			var end = info.end.valueOf();
			$.ajax({
				url	: '<?= base_url('api/process.php?cmd=calview') ?>',
				dataType: 'json',
				type	: 'POST',
				data	: {
					start	: moment(start).format('YYYY-MM-DD'),
					end		: moment(end).format('YYYY-MM-DD')
				},
				success: function(doc) {
					var events = [];
					successCallback(doc);
				}
			});
		},
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (date, allDay) { },
		eventClick: function(calEvent, jsEvent, view) {
		},
		dayRender: function(date, cell){
			 $(cell).css('opacity', 1);
		},
		viewRender: function(view, element) {},
		eventRender: function(ev, element, view) {
		},
		eventAfterRender : function(ev, element, view) {
			if(ev.block == true) {
				var start = ev.start.format();
				$("td.fc-day[data-date='"+ start +"']").addClass('fc-disabled');
			}
		}
	});
	calendar.render();
});//off
</script>