(function($) {
	"use strict";
	if($('input[name="acc_close_the_books"]').is(':checked') == true){
		if($('select[name="acc_allow_changes_after_viewing"]').val() == 'allow_changes_after_viewing_a_warning'){
	      	appValidateForm($('#general-settings-form'), {
		        acc_closing_date: 'required',
		    });
	    }else{
	    	appValidateForm($('#general-settings-form'), {
		        acc_closing_date: 'required',
		        acc_close_book_password: 'required',
		        acc_close_book_passwordr: {
                    required : true,
                    equalTo : "#acc_close_book_password"
                },
		    });
	    }
	}

	$('input[name="acc_close_the_books"]').on('change', function() {
	    if($('input[name="acc_close_the_books"]').is(':checked') == true){
	      	appValidateForm($('#general-settings-form'), {
		        acc_closing_date: 'required',
		        acc_close_book_password: 'required',
		        acc_close_book_passwordr: {
                    required : true,
                    equalTo : "#acc_close_book_password"
                },
		    });
	      	$('#div_close_the_books').removeClass('hide');
	    }else{
	    	appValidateForm($('#general-settings-form'), {
		    });
	      	$('#div_close_the_books').addClass('hide');
	    }
	});

	$('input[name="acc_enable_account_numbers"]').on('change', function() {
	    if($('input[name="acc_enable_account_numbers"]').is(':checked') == true){
	      $('#div_enable_account_numbers').removeClass('hide');
	    }else{
	      $('#div_enable_account_numbers').addClass('hide');
	    }
	});

	$('select[name="acc_allow_changes_after_viewing"]').on('change', function() {
	    if($('select[name="acc_allow_changes_after_viewing"]').val() == 'allow_changes_after_viewing_a_warning'){
	      	appValidateForm($('#general-settings-form'), {
		        acc_closing_date: 'required',
		    });
	      	$('#div_close_book_password').addClass('hide');
	    }else{
	    	appValidateForm($('#general-settings-form'), {
		        acc_closing_date: 'required',
		        acc_close_book_password: 'required',
		        acc_close_book_passwordr: {
                    required : true,
                    equalTo : "#acc_close_book_password"
                },
		    });
	      $('#div_close_book_password').removeClass('hide');
	    }
	});
	
})(jQuery);