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
                'txt-studyyear': {
                  required: true,
									number: true,
                  minlength: 4,
                  range: [$stdYearStart, $budYear]
                },
                'txt-stdid': {
                  required: true,
									number: true,
                  minlength: 10
                },
                'txt-photo': {
                  required: true
                },
                'txt-name-th': {
                  required: true
                },
                'txt-name-eng': {
                  required: true
                },
                'txt-dob': {
                  required: true
                },
                'txt-age': {
                  required: true,
									number: true
                },
                'txt-rel': {
                  required: true
                },
                'txt-nation': {
                  required: true
                },
                'txt-race': {
                  required: true
                },
                'txt-phone': {
                  required: true,
                  number: true,
                  minlength: 10
                },
                'txt-email': {
                  required: true,
                  email: true
                },
                'txt-address': {
                  required: true
                },
                'txt-ptherperson': {
                  required: true
                },
                'txt-relation': {
                  required: true
                },
                'txt-ptherperson-phone': {
                  required: true
                },
                'txt-gpa': {
                  required: true,
                  range: [0, 4]
                },
                'txt-startdate': {
                  required: true
                },
                'txt-enddate': {
                  required: true
                },
                'val-terms2': {
                    required: true
                }
            },
            messages: {
                'txt-studyyear': {
                  required: 'กรุณากรอกปีการศึกษา!',
									number: 'กรุณากรอกเฉพาะตัวเลข',
                  minlength: 'กรอกตัวเลข 4 หลัก',
                  range: 'กรอกปีการศึกษาให้ถูกต้อง'
                },
                'txt-stdid': {
                  required: 'กรุณากรอกรหัสนักศึกษา!',
									number: 'กรุณากรอกเฉพาะตัวเลข',
                  minlength: 'กรอกรหัสนักศึกษา 10 หลัก'
                },
                'txt-photo': {
                  required: 'กรุณาเลือกรูปประจำตัว'
                },
                'txt-name-th': {
                  required: 'กรุณากรอกชื่อ-นามสกุล (ภาษาไทย)'
                },
                'txt-name-eng': {
                  required: 'กรุณากรอกชื่อ-นามสกุล (ภาษาอังกฤษ)'
                },
                'txt-dob': {
                  required: 'กรุณากรอกวัน/เดือน/ปี เกิด'
                },
                'txt-age': {
                  required: 'กรุณากรอกอายุ',
                  number: 'กรุณากรอกเฉพาะตัวเลข'
                },
                'txt-rel': {
                  required: 'กรุณาเลือกศาสนา'
                },
                'txt-nation': {
                  required: 'กรุณากรอกสัญชาติ'
                },
                'txt-race': {
                  required: 'กรุณากรอกเชื้อชาติ'
                },
                'txt-phone': {
                  required: 'กรุณากรอกหมายเลขโทรศัพท์',
                  number: 'กรุณากรอกเฉพาะตัวเลข',
                  minlength: 'กรอกตัวเลข 10 หลัก'
                },
                'txt-email': {
                  required: 'กรุณากรอกอีเมลให้ถูกต้อง',
                  email: 'กรุณากรอกอีเมลให้ถูกต้อง'
                },
                'txt-address': {
                  required: 'กรุณากรอกที่อยู่'
                },
                'txt-ptherperson': {
                  required: 'กรุณากรอกชื่อบุคคลที่สามารถติดต่อได้กรณีเร่งด่วน'
                },
                'txt-relation': {
                  required: 'กรุณากรอกความเกี่ยวข้อง'
                },
                'txt-ptherperson-phone': {
                  required: 'กรุณากรอกหมายเลขโทรศัพท์บุคคลที่สามารถติดต่อได้กรณีเร่งด่วน'
                },
                'txt-gpa': {
                  required: 'กรุณากรอกเกรดเฉลี่ย',
                  range: 'กรุณากรอกค่าเกรดเฉลี่ย 0.00 - 4.00'
                },
                'txt-startdate': {
                  required: 'กรุณากรอกวันที่เริ่มฝึกงาน'
                },
                'txt-enddate': {
                  required: 'กรุณากรอกวันสิ้นสุดการฝึกงาน'
                },
                'val-terms2': 'กรุณายืนยันข้อมูล!'
            }
        });
    };


    return {
        init: function () {
            initValidation();
        }
    };
}();
