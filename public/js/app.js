     $(function () {

        /* Login and Registration */

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $( "#regForm" ).submit(function( event ) {    
          event.preventDefault();
          var $form = $( this ),
            data = $form.serialize(),
            url = $form.attr( "action" );
          var posting = $.post( url, { formData: data } );
          posting.done(function( data ) {
            if(data.fail) {
                // associate_errors(data['errors'], $( "#regForm" ))
              $.each(data.errors, function( index, value ) {
                var errorDiv = '#'+index+'_error';
                var errorField = $form.find('.'+index+'-group');
                var input = errorField.find('input');
                errorField.addClass('has-error').find('.help-block').text(value);
                input.keyup(function(event) {
                    errorField.removeClass('has-error');
                    var text = errorField.find('.help-block');
                    console.log(text);
                    text.text('');
                });
              });
              $('#successMessage').empty();          
            } 
            if(data.success) {
                $('#modal_register').modal('hide'); //hiding Reg form
                var successContent = '<div class="message"><h3>Registration Completed Successfully</h3><h4>Please Login With the Following Details</h4><div class="userDetails"><p><span>Email: </span>'+data.email+'</p><p><span>Password: ********</span></p></div></div>';
              $('#successMessage').html(successContent);
            } //success
          }); //done
        });

        // Login submition
        $("#logForm").submit(function(e) {
            e.preventDefault();
            var loginForm = $(this);
            var formData = loginForm.serialize();
            $('#form-errors-email').html("");
            $('#form-errors-password').html("");
            $('#form-login-errors').html("");
            $("#email-div").removeClass("has-error");
            $("#password-div").removeClass("has-error");
            $("#login-errors").removeClass("has-error");
            $.ajax({
                url: '/login',
                type: 'POST',
                data: formData,
                success: function(data) {
                    $('#modal_login').modal('hide');
                    location.reload(true);
                },
                error: function(data) {
                    console.log(data.responseText);
                    var obj = jQuery.parseJSON(data.responseText);
                    if (obj.email) {
                        $("#logForm .email-group").addClass("has-error");
                        $('#logForm .email-group .help-block').html(obj.email);
                    }
                    if (obj.password) {
                        $("#logForm .password-group").addClass("has-error");
                        $('#logForm .password-group .help-block').html(obj.password);
                    }
                    if (obj.error) {
                        $("#login-errors").addClass("has-error");
                        $('#form-login-errors').html(obj.error);
                    }
                }
            });
        });
        
/* Checkbox urgent */

        $('#urgent-checkbox').click(function(){
            if($(this).is(':checked')){
                $('#urgent').show();
            } else {
                $('#urgent').hide();
            }
        });
        $('#pickup_time').datetimepicker();
        $('#form_contact').validator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
          	$('select').parent('.form-group').addClass('has-error');
          } else {
          	e.preventDefault();
            $('#routine').slideDown();
          }
        })
        // $('#routine_table').tablesorter();

/* Modals */

        $(".modalRegister").click(function() {
            $('#modal_register').modal('show');
            $('#modal_login').modal('hide');
        });

        $(".modalLogin").click(function() {
            $('#modal_register').modal('hide');
            $('#modal_login').modal('show');
        });
        $(".modalRegPartner").click(function() {
            $('#partnerReg').modal('show');
            $('#partnerLog').modal('hide');
        });
        $(".partnerModalLogin").click(function() {
            $('#partnerReg').modal('hide');
            $('#partnerLog').modal('show');
        });
        var options = [];

$( '.dropdown-menu a' ).on( 'click', function( event ) {

   var $target = $( event.currentTarget ),
       val = $target.attr( 'data-value' ),
       $inp = $target.find( 'input' ),
       idx;

   if ( ( idx = options.indexOf( val ) ) > -1 ) {
      options.splice( idx, 1 );
      setTimeout( function() { $inp.prop( 'checked', false ) }, 0);
   } else {
      options.push( val );
      setTimeout( function() { $inp.prop( 'checked', true ) }, 0);
   }

   $( event.target ).blur();
      
   console.log( options );
   return false;
});
    });