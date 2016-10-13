// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation = function() {
        jQuery( '.js-validation-material' ).validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents( '.form-group .form-material' ).append( error );
            },
            highlight: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' ).addClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            success: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            rules: {
                'txt-username': {
                  required: true
                },
                'txt-password': {
                  required: true
                }
            },
            messages: {
                'txt-username': {
                  required: 'กรุณากรอกชื่อบัญชีผู้ใช้'
                },
                'txt-password': {
                  required: 'กรุณากรอกรหัสผ่าน'
                }
            }
        });
    };


    return {
        init: function () {
            initValidation();
        }
    };
}();
