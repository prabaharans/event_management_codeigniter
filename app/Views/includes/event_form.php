

<?= $this->section('pageStyles') ?>
	<link href="<?= base_url('spry/textfieldvalidation/SpryValidationTextField.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('spry/textareavalidation/SpryValidationTextarea.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('spry/selectvalidation/SpryValidationSelect.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>


<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title"><b>Book Event</b></h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form role="form" action="<?= base_url('api/process.php?cmd=book') ?>" name="frmBookEvent" id="frmBookEvent" method="post">
    <div class="card-body p-2">
      <div class="form-group">
        <label for="exampleInputEmail1" class="text-small">Name</label>
		<input type="hidden" name="userId" value=""  id="userId"/>
        <span id="tf_name">
			<select name="name" id="name" class="form-control form-control-sm input-sm">
				<option value="">--select user--</option>
				<?php foreach ($users as $user) : ?>

					<option value="<?= $user->id; ?>"><?= $user->username; ?></option>

				<?php endforeach; ?>
			</select>
		</span>
      </div>

	  <div class="form-group">
        <label for="exampleInputEmail1" class="text-small">Address</label>
		<span id="tf_address">
        	<textarea name="address" class="form-control form-control-sm input-sm" placeholder="Address" id="address"></textarea>
		</span>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1" class="text-small">Mobile</label>
		<span id="tf_mobile">
        	<input type="mobile" name="mobile" class="form-control form-control-sm input-sm"  placeholder="Mobile number" id="mobile">
		</span>
      </div>
	  <div class="form-group">
        <label for="exampleInputEmail1" class="text-small">Email address</label>
		<span id="tf_email">
			<input type="email" name="email" class="form-control form-control-sm input-sm" placeholder="Enter email" id="email" data-inputmask-alias="email">
		</span>
      </div>

      <div class="form-group">
      <div class="row">
      	<div class="col-6">
			<label class="text-small">Reservation Date</label>
			<span id="tf_rdate">
				<input type="date" name="rdate" class="form-control form-control-sm" placeholder="YYYY-mm-dd">
			</span>
        </div>
        <div class="col-6">
			<label class="text-small">Reservation Time</label>
			<span id="tf_rtime">
				<input type="time" name="rtime" class="form-control form-control-sm" placeholder="HH:mm">
			</span>
       </div>
      </div>
	  </div>

	  <div class="form-group">
        <label for="exampleInputPassword1" class="text-small">No of Peoples</label>
		<span id="tf_ucount">
			<input type="number" name="ucount" min="1" max="100" class="form-control form-control-sm input-sm" placeholder="No of peoples">
		</span>
      </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn bg-gradient-info">Submit</button>
    </div>
  </form>
</div>
<!-- /.box -->

<?= $this->section('pageScripts') ?>
	<script src="<?= base_url('jquery.validate/jquery.validate.min.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('jquery.validate/additional-methods.min.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('jquery.inputmask/jquery.inputmask.min.js') ?>" type="text/javascript"></script>
	<!-- <script src="<?= base_url('jquery.mask/jquery.mask.min.js') ?>" type="text/javascript"></script> -->
	<script type="text/javascript">
		var langEventFormJSON = <?php echo $line = json_encode(lang('EventManagement.validation.messages.eventForm', [], 'english'));
; ?>;
	$('select').on('change', function() {
	 	//alert( this.value );
	 	var id = this.value;
	 	// $.get('<?= base_url('api/user-info/') ?>'+id, function(data, status){
	 	// 	var obj = $.parseJSON(data);
	 	// 	$('#userId').val(obj.user_id);
	 	// 	$('#email').val(obj.email);
	 	// 	$('#address').val(obj.address);
	 	// 	$('#phone').val(obj.phone_no);
		// });

		$.ajax({
			url: "<?= base_url('api/user-info/') ?>"+id,
			type: "GET",
			headers: { Authorization: 'Bearer <?= $token ?>' },
			error: function(err) {
				switch (err.status) {
				case "400":
					// bad request
					break;
				case "401":
					// unauthorized
					break;
				case "403":
					// forbidden
					break;
				default:
					//Something bad happened
					break;
				}
			},
			success: function(obj) {
				console.log("Success!");
				// var obj = $.parseJSON(data);
				$('#userId').val(obj.user_id);
				$('#email').val(obj.email);
				$('#address').val(obj.details.address1+' '+obj.details.address2);
				$('#mobile').val(obj.mobile);
			}
			});

	})

	$.validator.addMethod("regxEmail", function(value, element) {
		return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
	}, langEventFormJSON.eventEmail.regxEmail);


   if ($("#frmBookEvent").length > 0) {
		$("#mobile").inputmask("+99-9999999999");
      	$("#frmBookEvent").validate({
			errorClass: "invalid-feedback",
			errorElement: "span",
			rules: {
				name: {
					required: true,
				},
				address: {
					required: true,
					minlength:10,
				},
				mobile: {
					required: true,
					minlength:10,
					maxlength:17,
				},
				email: {
					required: true,
					maxlength: 50,
					// email: true,
					regxEmail: true
				},
				rdate: {
					required: true,
				},
				rtime: {
					required: true,
				},
				ucount: {
					required: true,
					maxlength: 3,
				},
			},
			messages: {
				name: {
					required: langEventFormJSON.eventName.required,
				},
				address: {
					required: langEventFormJSON.eventAddress.required,
				},
				email: {
					required: langEventFormJSON.eventEmail.required,
					// email: langEventFormJSON.eventEmail.isValid,
					maxlength: langEventFormJSON.eventEmail.maxlength.replace('##REQUIREREPLACE##',50),
					regxEmail: langEventFormJSON.eventEmail.regxEmail,
				},
				mobile: {
					required: langEventFormJSON.eventMobile.required,
					number: langEventFormJSON.eventMobile.number,
					minlength: langEventFormJSON.eventMobile.minlength,
					maxlength: langEventFormJSON.eventMobile.maxlength,
				},
				rdate: {
					required: langEventFormJSON.eventReservationDate.required,
				},
				rtime: {
					required: langEventFormJSON.eventReservationTime.required,
				},

				ucount: {
					required: langEventFormJSON.eventNoOfPeople.required,
					maxlength: langEventFormJSON.eventNoOfPeople.maxlength.replace('##REQUIREREPLACE##',50),
				},
			},
			highlight: function (element) {
				$(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
				$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
			},
			unhighlight: function ( element, errorClass, validClass ) {
				$( element ).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
				$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
			},
			success: function (element) {
				$( element ).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
				$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
			}
			// submitHandler: function(form) {
			// 	$('#btnadd').val('Sending..');
			// 	$.ajax({
			// 		url: "<?php echo site_url('student/store') ?>",
			// 		type: "POST",
			// 		data: $('#frmAddStudent').serialize(),
			// 		dataType: "json",
			// 		success: function(response) {
			// 			console.log(response);
			// 			console.log(response.success);
			// 			$('#btnadd').val('Add');
			// 			$('#res_message').html(response.msg);
			// 			$('#res_message').show();
			// 			$('#res_message').removeClass('d-none');
			// 			$('#frmAddStudent')[0].reset();
			// 			setTimeout(function() {
			// 				$('#res_message').hide();
			// 				$('#res_message').html('');
			// 			}, 3000);
			// 		}
			// 	});
			// }
		})
	}
	</script>

<?= $this->endSection() ?>
