<!-- Horizontal Form -->
<div class="card card-info">
  <div class="card-header with-border">
    <h3 class="card-title"><?= lang('EventManagement.holiday_form') ?></h3>
  </div>
  <!-- /.card-header -->

<?php if (session('error') !== null) : ?>
    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
<?php elseif (session('errors') !== null) : ?>
    <div class="alert alert-danger" role="alert">
        <?php if (is_array(session('errors'))) : ?>
            <?php foreach (session('errors') as $error) : ?>
                <?= $error ?>
                <br>
            <?php endforeach ?>
        <?php else : ?>
            <?= session('errors') ?>
        <?php endif ?>
    </div>
<?php endif ?>

<?php if (session('message') !== null) : ?>
    <div class="alert alert-success" role="alert"><?= session('message') ?></div>
<?php endif ?>

    <div id="res_message" class="alert alert-success" style="display:none" role="alert"></div>

  <!-- form start -->
  <form class="form-horizontal" action="<?php echo base_url(); ?>api/holiday/update" name="frmHoliday" id="frmHoliday" method="post">
    <div class="card-body">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend col-3">
                    <label for="inputEmail3" class="control-label text-small"><?= lang('EventManagement.holiday_date') ?></label>
                </div>
                <input type="date" class="form-control form-control-sm input-sm" name="hdate" id="hdate" placeholder="<?= lang('EventManagement.holiday_date_placeholder') ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend col-3">
                    <label for="inputPassword3" class="control-label text-small"><?= lang('EventManagement.holiday_reason') ?></label>
                </div>
                <input type="text" class="form-control form-control-sm input-sm" name="reason" id="reason" placeholder="<?= lang('EventManagement.holiday_reason') ?>">
                <input type="hidden" class="form-control form-control-sm input-sm" name="id" id="id" placeholder="<?= lang('EventManagement.holiday_id') ?>">
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn bg-gradient-info pull-right" id="addHoliday" name="addHoliday"><?= lang('EventManagement.add_holiday') ?></button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->
<?= $this->section('pageScripts') ?>
    <script src="<?= base_url('jquery.validate/jquery.validate.min.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('jquery.validate/additional-methods.min.js') ?>" type="text/javascript"></script>
    <script>
        var langHolidayFormJSON = <?php echo $line = json_encode(lang('EventManagement.validation.messages.holidayForm', [], 'english'));
; ?>;   $('#res_message').hide();
        if ($("#frmHoliday").length > 0) {
            $("#frmHoliday").validate({
                errorClass: "invalid-feedback",
                errorElement: "span",
                errorPlacement: function (error, element) {
                    if(element.attr('id') == 'phone_code') {
                        error.insertAfter(element.parent().parent('.input-group'));
                    } else if(element.parent('.input-group').length) {
                        if(element.parent('.input-group').siblings('.invalid-feedback') && element.attr('id') == 'mobile') {
                            error.insertAfter($('#'+element.parent('.input-group').siblings('.invalid-feedback').attr('id')));
                        } else {
                            error.insertAfter(element.parent());
                        }
                    } else {
                        error.insertAfter(element);
                    }
                },
                rules: {
                    hdate: {
                        required: true,
                    },
                    reason: {
                        required: true,
                        minlength:10,
                    }
                },
                messages: {
                    hdate: {
                        required: langHolidayFormJSON.holidayDate.required
                    },
                    reason: {
                        required: langHolidayFormJSON.holidayReason.required
                    }
                },
                highlight: function (element) {
                    $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
                    $( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                    // console.log('$( element ).has( ".select2" )');
                    // console.log($( element ).closest( ".select2" ));
                    if($(element).siblings('.select2-container')) {
                        console.log($(element).siblings('.select2-container'));
                        $(element).siblings('.select2-container').removeClass('form-control').addClass('form-control');
                        $(element).siblings('.select2-container').removeClass('form-control-sm').addClass('form-control-sm');
                        $(element).siblings('.select2-container').removeClass('is-valid').addClass('is-invalid');
                        $(element).siblings('.select2-container').addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
                    }
                },
                unhighlight: function ( element, errorClass, validClass ) {
                    $( element ).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    if($(element).siblings('.select2-container')) {
                        console.log($(element).siblings('.select2-container'));
                        $(element).siblings('.select2-container').removeClass('form-control');
                        $(element).siblings('.select2-container').removeClass('form-control-sm');
                        $(element).siblings('.select2-container').removeClass('is-invalid').addClass('is-valid');
                        $(element).siblings('.select2-container').addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    }
                },
                success: function (element) {
                    $( element ).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                    $( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    if($(element).siblings('.select2-container')) {
                        console.log($(element).siblings('.select2-container'));
                        $(element).siblings('.select2-container').removeClass('form-control');
                        $(element).siblings('.select2-container').removeClass('form-control-sm');
                        $(element).siblings('.select2-container').removeClass('is-invalid').addClass('is-valid');
                        $(element).siblings('.select2-container').addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
                    }
                },
                submitHandler: function(form) {
                	$('#addHoliday').val('Sending..');
                	$.ajax({
                		url: $('#frmHoliday').attr('action'),
                		type: "POST",
                		data: $('#frmHoliday').serialize(),
                		dataType: "json",
                        headers: { Authorization: 'Bearer <?= $token ?>' },
                        beforeSend:function(){
                            if($('#id').val() != '') {
                                $('#addHoliday').text('<?= lang('EventManagement.update_holiday') ?>');
                            } else {
                                $('#addHoliday').text('<?= lang('EventManagement.add_holiday') ?>');
                            }
                            $('#addHoliday').attr('disabled', true);
                        },
                		success: function(response) {
                			console.log(response);
                			console.log(response.success);
                            if(response.error === false) {
                                $('#addHoliday').val('<?= lang('EventManagement.add_holiday') ?>');
                                $('#addHoliday').text('<?= lang('EventManagement.add_holiday') ?>');
                                $('#res_message').html(response.message);
                                $('#res_message').addClass('alert-success').removeClass('alert-danger');
                                $('#res_message').show();
                                $('#res_message').removeClass('d-none');
                                $('#id').val('');
                                $('#frmHoliday')[0].reset();
                            } else {
                                if(response.message.hdate) {
                                    $('#res_message').html(response.message);
                                } else if (response.message.reason) {
                                    $('#res_message').html(response.message.reason);
                                } else {
                                    $('#res_message').html(response.message);
                                }
                                $('#res_message').show();
                                $('#res_message').removeClass('alert-success').addClass('alert-danger');
                            }
                            setTimeout(function() {
                                $('#res_message').hide();
                                $('#res_message').html('');
                                $('#table').DataTable().ajax.reload();
                                $('#addHoliday').attr('disabled', false);
                            }, 3000);

                		}
                	});
                }
            })
        }
    </script>
<?= $this->endSection() ?>
