// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation = function() {
        jQuery( '.changepwdform' ).validate({
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
                'register2-email': {
                  required: true,
                  email: true
                },
                'register2-password': {
                  required: true
                },
                'register2-password2': {
                  required: true
                },
                'register2-password3': {
                  required: true,
									equalTo: '#register2-password2'
                }
            },
            messages: {
							'register2-email': {
								required: 'กรุณากรอกอีเมลแอดเดรสที่ได้ลงข้อมูลไว้',
								email: 'กรุณากรอกอีเมลให้ถูกต้อง'
							},
							'register2-password': {
								required: 'กรุณากรอกรหัสผ่านเดิม'
							},
							'register2-password2': {
								required: 'กรุณากรอกรหัสผ่านใหม่'
							},
							'register2-password3': {
								required: 'กรุณายืมยันรหัสผ่านใหม่',
								equalTo: 'รหัสผ่านไม่ตรงกัน'
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
