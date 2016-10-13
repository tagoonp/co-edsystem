/*
Document: base_forms_wizard.js
Author: Rustheme
Description: Custom JS code used in Form Wizard Page
 */

var BaseFormWizard = function() {
	// Init simple wizard: http://vadimg.com/twitter-bootstrap-wizard-example/
	var initWizardSimple = function() {
		jQuery( '.js-wizard-simple' ).bootstrapWizard({
			'tabClass': '',
			'firstSelector': '.wizard-first',
			'previousSelector': '.wizard-prev',
			'nextSelector': '.wizard-next',
			'lastSelector': '.wizard-last',
			'onTabShow': function( $tab, $navigation, $index ) {
				var	$total				= $navigation.find( 'li' ).length,
						$current			= $index + 1,
						$percent			= ( $current/$total ) * 100,

						// Get core wizard elements
						$wizard			= $navigation.parents( '.card' ),
						$progress		= $wizard.find( '.wizard-progress > .progress-bar' ),
						$btnPrev			= $wizard.find( '.wizard-prev' ),
						$btnNext		= $wizard.find( '.wizard-next' ),
						$btnFinish		= $wizard.find( '.wizard-finish' );

				// Update progress bar if there is one
				if ( $progress ) {
					$progress.css({ width: $percent + '%' });
				}

				// If it's the last tab then hide the last button and show the finish instead
				if ( $current >= $total ) {
					$btnNext.hide();
					$btnFinish.show();
				} else {
					$btnNext.show();
					$btnFinish.hide();
				}
			}
		});
	};

	// Init wizards with validation: http://vadimg.com/twitter-bootstrap-wizard-example/
	var initWizardValidation = function() {
		// Get forms
		var $form1 = jQuery( '.js-form1' );
		var $form2 = jQuery( '.js-form2' );

		// Prevent forms from submitting on enter key press
		$form1.add( $form2 ).on( 'keyup keypress', function (e) {
			var code = e.keyCode || e.which;

			if ( code === 13 ) {
				e.preventDefault();
				return false;
			}
		});

		// Init form validation on classic wizard form
		var $validator1 = $form1.validate({
			errorClass: 'help-block animated fadeInDown',
			errorElement: 'div',
			errorPlacement: function( error, e ) {
				jQuery(e).parents( '.form-group > div' ).append( error );
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
				'validation-classic-firstname': {
					required: true,
					minlength: 2
				},
				'validation-classic-lastname': {
					required: true,
					minlength: 2
				},
				'validation-classic-email': {
					required: true,
					email: true
				},
				'validation-classic-details': {
					required: true,
					minlength: 5
				},
				'validation-classic-city': {
					required: true
				},
				'validation-classic-skills': {
					required: true
				},
				'validation-classic-terms': {
					required: true
				}
			},
			messages: {
				'validation-classic-firstname': {
					required: 'Please enter a firstname',
					minlength: 'Your firtname must consist of at least 2 characters'
				},
				'validation-classic-lastname': {
					required: 'Please enter a lastname',
					minlength: 'Your lastname must consist of at least 2 characters'
				},
				'validation-classic-email': 'Please enter a valid email address',
				'validation-classic-details': 'Let us know a few thing about you',
				'validation-classic-skills': 'Please select a skill!',
				'validation-classic-terms': 'You must agree with the service terms!'
			}
		});

		// Init form validation on the other wizard form
		var $validator2 = $form2.validate({
			errorClass: 'help-block text-right animated fadeInDown',
			errorElement: 'div',
			errorPlacement: function(error, e) {
				jQuery(e).parents( '.form-group .form-material' ).append(error);
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
					},
					'txt-startdate2': {
						required: true
					},
					'txt-enddate2': {
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
					'val-terms2': {
						required: 'กรุณายืนยันข้อมูล!'
					},
					'txt-startdate2': {
						required: 'กรุณากรอกวันที่เริ่มฝึกงาน'
					},
					'txt-enddate2': {
						required: 'กรุณากรอกวันสิ้นสุดการฝึกงาน'
					}
			}
	});

		// Init classic wizard with validation
		jQuery( '.js-wizard-classic-validation' ).bootstrapWizard({
			'tabClass': '',
			'previousSelector': '.wizard-prev',
			'nextSelector': '.wizard-next',
			'onTabShow': function( $tab, $nav, $index ) {
				var $total			= $nav.find( 'li' ).length;
				var $current		= $index + 1;

				// Get core wizard elements
				var $wizard		= $nav.parents( '.card' );
				var $btnNext		= $wizard.find( '.wizard-next' );
				var $btnFinish	= $wizard.find( '.wizard-finish' );

				// If it's the last tab then hide the last button and show the finish instead
				if ( $current >= $total ) {
					$btnNext.hide();
					$btnFinish.show();
				} else {
					$btnNext.show();
					$btnFinish.hide();
				}
			},
			'onNext': function( $tab, $navigation, $index ) {
				var $valid = $form1.valid();

				if(!$valid) {
					$validator1.focusInvalid();

					return false;
				}
			},
			onTabClick: function( $tab, $navigation, $index ) {
		return false;
			}
		});

		// Init wizard with validation
		jQuery( '.js-wizard-validation' ).bootstrapWizard({
			'tabClass': '',
			'previousSelector': '.wizard-prev',
			'nextSelector': '.wizard-next',
			'onTabShow': function( $tab, $nav, $index ) {
				var $total			= $nav.find( 'li' ).length;
				var $current		= $index + 1;

				// Get core wizard elements
				var $wizard		= $nav.parents( '.card' ),
					$btnNext		= $wizard.find( '.wizard-next' ),
					$btnFinish		= $wizard.find( '.wizard-finish' );

				// If it's the last tab then hide the last button and show the finish instead
				if ( $current >= $total ) {
					$btnNext.hide();
					$btnFinish.show();
				} else {
					$btnNext.show();
					$btnFinish.hide();
				}
			},
			'onNext': function( $tab, $navigation, $index ) {
				var $valid = $form2.valid();

				if ( ! $valid ) {
					$validator2.focusInvalid();

					return false;
				}
			},
			onTabClick: function( $tab, $navigation, $index ) {
				return false;
			}
		});
	};

	return {
		init: function () {
			// Init simple wizard
			initWizardSimple();

			// Init wizards with validation
			initWizardValidation();
		}
	};
}();

// Initialize when page loads
jQuery( function() {
	BaseFormWizard.init();
});
