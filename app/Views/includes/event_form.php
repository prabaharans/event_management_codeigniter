

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
		<span id="tf_phone_code">
			<select name="phone_code" id="phone_code" class="form-control form-control-sm input-sm">
				<option value="">--select phone code--</option>
				<?php foreach ($countries as $country) : ?>
					<option class="option-image" value="<?= $country['id']; ?>" data-image="<?= base_url('img-country-flag/'.$country['iso2'].'.png') ?>">+<?= $country['phonecode']; ?> (<?= $country['name']; ?>)</option>
				<?php endforeach; ?>
			</select>
		</span>
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

	// $('.option-image').each(function() {
	// 	var dataImage = $(this).attr('data-image');
	// 	$(this).css({'background-image':'url("'+dataImage+'")'});
	// });

	function formatOption(option) {
        if (!option.id) {
            return option.text;
        }
		// console.log('option.data_text');
		// console.log(option);


		// if(typeof option.data_text !== 'undefined') {
		// 	$(option).attr('data-iso2',option.data_text);
		// 	console.log('option.data_text1');
		// 	console.log(option.data_text);
		// 	console.log($(option).attr('data-iso2'));
		// } else {
		// 	option.data_text = $(option).attr('data-iso2');
		// 	console.log('option.data_text2');
		// 	console.log(option.data_text);
		// 	console.log($(option).attr('data-iso2'));
		// }
        // // var imageUrl = 'path/' + option.data_text + '.png';
		// var imageUrl = '<?= base_url('img-country-flag/') ?>'+option.data_text+'.png';
        // var optionWithImage = $(
        //     '<span><img src="' + imageUrl + '" class="img-flag" /> ' + option.text + '</span>'
        // );
        // return optionWithImage;

		var baseUrl = "<?= base_url('img-country-flag/') ?>";
		var $state = $(
			'<span><img class="img-flag" /> <span></span></span>'
		);

		// Use .text() instead of HTML string concatenation to avoid script injection issues
		$state.find("span").text(option.text);
		$state.find("img").attr("src", baseUrl + option.id + ".png");

		return $state;
    }
	$("#phone_code").select2({
		theme: "bootstrap4 ",
		templateResult: formatOption,
        templateSelection: formatOption,
        // minimumResultsForSearch: Infinity,
		ajax: {
			url: "<?=site_url('countries/getPhoneCodes')?>",
			type: "post",
			dataType: 'json',
			delay: 250,
			data: function (params) {
				// CSRF Hash
				var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
				var csrfHash = $('.txt_csrfname').val(); // CSRF hash

				return {
				searchTerm: params.term, // search term
				page: params.page || 1,
				[csrfName]: csrfHash // CSRF Token
				};
			},
			processResults: function (response, params) {
				params.page = params.page || 1;

				// Update CSRF Token
				$('.txt_csrfname').val(response.token);

				return {
					results: response.data,
					pagination: {
						more: response.pagination.more
					}
				};
			},
			cache: true
		}
	});
	$('select').on('change', function() {
	 	var id = this.value;

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
		// $("#mobile").inputmask("+99-9999999999");
		$("#mobile").inputmask("9999999999");
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
					maxlength:10,
					// maxlength:17,
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
					maxlength: langEventFormJSON.eventMobile.maxlength.replace('##REQUIREREPLACE##',10),
					// maxlength: langEventFormJSON.eventMobile.maxlength,
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
