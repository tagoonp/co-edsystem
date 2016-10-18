// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
		// Init Material Forms Validation: https://github.com/jzaefferer/jquery-validation
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
                'val-fname': {
                    required: true
                },
								'val-lname': {
                    required: true
                },
                'val-email': {
                    required: true,
                    email: true
                },
                'val-prefix': {
                    required: true
                },
                'val-role': {
                    required: true
                },
                'val-username': {
                    required: true
                },
                'val-password': {
                    required: true
                }
            },
            messages: {
							'val-fname': {
									required: 'กรุณากรอกชื่อ..'
							},
							'val-lname': {
									required: 'กรุณากรอกนามสกุล'
							},
							'val-email': {
									required: 'กรุณากรอกอีเมล',
									email: 'กรุณากรอกอีเมลให้ถูกต้อง'
							},
							'val-prefix': {
									required: 'กรุณาเลือกคำนำหน้าชื่อ'
							},
							'val-role': {
									required: 'กรุณาเลือกปรเภทบัญชีผู้ใช้'
							},
							'val-username': {
									required: 'กรุณากรอกชื่อบัญชีผู้ใช้'
							},
							'val-password': {
									required: 'กรุรากำหนดรหัสผ่าน'
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
